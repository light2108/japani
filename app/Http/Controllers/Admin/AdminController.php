<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cart;
use App\Models\Ordered;
use App\Models\Order;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        // dd(Hash::make(1));
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/admin');
            }
        }
        return View('backend.login');
    }
    public function dashboard()
    {
        return View('backend.dashboard');
    }
    public function account(Request $request)
    {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            // if ($request->hasFile('image')) {
            $image = $request->file('image');
            $reimage = time() . '.' . $image->getClientOriginalExtension();
            $dest = public_path('backend/imgs');
            $image->move($dest, $reimage);
            $data['image'] = 'backend/imgs/'.$reimage;

            if (!empty($data['new_password']) && !empty($data['confirm_password'])) {
                if ($data['new_password'] == $data['confirm_password']) {
                    $data['password'] = Hash::make($data['new_password']);
                    $admin->update($data);
                    return redirect()->back()->with('success_message', 'Cập Nhật Thông Tin Thành Công');
                } else {
                    return redirect()->back()->with('error_message', 'Cập Nhật Thông Tin Thất Bại');
                }
            } else {
                $admin->update(['name' => $data['name'], 'email' => $data['email'], 'image'=>$data['image']]);
                return redirect()->back()->with('success_message', 'Cập Nhật Thông Tin Thành Công');
            }
        }
        return View('backend.account', compact('admin'));
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
    public function ordered(){
        $carts=Cart::with('ordered')->where('status',1)->orWhere('status',2)->get()->toArray();
        // dd($carts);
        return View('backend.ordered.index', compact('carts'));
    }
    public function editOrdered(Request $request, $id){
        $ordered=Ordered::find($id);
        $orders=Order::where('cart_id', $ordered['cart_id'])->get()->toArray();
        if($request->isMethod('post')){
            $data=$request->all();
            Cart::find($ordered['cart_id'])->update(['status'=>2]);
            return redirect()->back();
        }
        return View('backend.ordered.edit', compact('ordered', 'orders'));
    }
}
