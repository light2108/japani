<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\TypeProduct;
use Jenssegers\Agent\Agent;
use App\Models\Product;
use App\Models\Post;
use App\Models\Comment;
class UserController extends Controller
{
    public function index(){
        session_start();
        $agent = new Agent();
        $banner1s=Banner::where('type',1)->where('status',1)->get();
        $banner2=Banner::where('type',2)->where('status',1)->first();
        $banner3=Banner::where('type',3)->where('status',1)->first();
        $banner4=Banner::where('type',4)->where('status',1)->first();
        $banner5=Banner::where('type',5)->where('status',1)->first();
        $typeproducts=TypeProduct::with('product')->where('status',1)->inRandomOrder()->limit(4)->get()->toArray();
        $typeproduct1s=TypeProduct::with('product')->where('status',1)->inRandomOrder()->limit(6)->get()->toArray();
        // dd($typeproducts);
        $productrandoms=Product::inRandomOrder()->get();
        $productrandoms1=Product::inRandomOrder()->get();
        $productbestsell=Product::orderBy('sell', 'desc')->limit(6)->get();
        $newproducts=Product::orderBy('id', 'desc')->get();
        // dd($newproduct1s);
        $alls=Product::all();
        $postlast=Post::orderBy('id', 'desc')->where('status',1)->first();
        $postrandom=Post::inRandomOrder()->limit(5)->where('status',1)->get();
        $postbestview=Post::orderBy('view', 'desc')->where('status',1)->paginate(5);
        // dd($postbestview);
        // dd($postlast);
        // dd($typeproducts);
        return View('frontend.index', compact('agent', 'banner1s','productrandoms1','typeproduct1s', 'typeproducts','postrandom','postbestview', 'banner2', 'banner3','postlast', 'banner4', 'banner5', 'productrandoms', 'productbestsell', 'newproducts', 'alls'));
    }
    public function login(Request $request){
        session_start();
        if($request->isMethod('post')){
            $data=$request->all();
            $validator=Validator::make($data,[
                'username'=>'required',
                'password'=>'required'
            ]);
            if($validator->fails()){
                return response()->json(['status'=>"1"]);
            }
            else if(Auth::attempt(['email'=>$data['username'], 'password'=>$data['password']])||Auth::attempt(['mobile'=>$data['username'], 'password'=>$data['password']])){


                $cart=Cart::where('session_id', session_id())->first();
                if(count(Order::where('cart_id', $cart['id'])->get())>0){
                    Cart::where('user_id', Auth::user()->id)->where('status',0)->delete();
                    Cart::where('session_id', session_id())->update(['user_id'=>Auth::user()->id]);
                }else{
                    Cart::where('session_id', session_id())->update(['user_id'=>Auth::user()->id]);
                }
                return response()->json(['status'=>'2']);
            }else{
                return response()->json(['status'=>"-1"]);
            }
        }
    }
    public function changePassword(Request $request){
        session_start();
        if($request->ajax()){
            $data=$request->all();
            $validator=Validator::make($data, [
                'pwd_cur'=>'required',
                'pwd_new'=>'required|same:pwd_confirm|min:6',
                'pwd_confirm'=>'required|min:6',
            ]);
            if($validator->fails()){
                return response()->json(['status'=>-1]);
            }else{
                if(Hash::check($data['pwd_cur'], Auth::user()->password)){
                    User::find(Auth::user()->id)->update(['password'=>Hash::make($data['pwd_new'])]);
                    return response()->json(['status'=>1]);
                }else{
                    return response()->json(['status'=>0]);
                }
            }
        }
        return View('frontend.change_password');
    }
    public function register(Request $request){
        session_start();
        $data=$request->all();
        $validator=Validator::make($data, [
            'email'=>'email|unique:users,email',
            'mobile'=>'unique:users,mobile',
            're-password'=>'same:password'
        ]);
        if($validator->fails()){
            return response()->json(['status'=>"-1"]);
        }
        if($data['password']==$data['re-password']){
            $data['password']=Hash::make($data['password']);
            $user=User::create($data);
            Auth::login($user);
            return response()->json(['status'=>"1"]);
        }else{
            return response()->json(['status'=>"-2"]);
        }
    }
    public function profile(Request $request){
        session_start();
        $agent = new Agent();
        $user=User::find(Auth::user()->id);
        if($request->isMethod('post')){
            $data=$request->all();
            // dd($data);
            $validator=Validator::make($data,[
                'name'=>'required',
                'city'=>'required',
                'district'=>'required',
                'image'=>'mimes:png,jpg,jpeg',
                'ward'=>'required',
                'mobile'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', 'Có gì đó sai');
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $reimage = 'frontend/imgs/'.time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('frontend/imgs');
                    $image->move($dest, $reimage);
                    $data['image']=$reimage;
                    $user->update($data);
                }else{
                    $user->update($data);
                }
                return redirect()->back()->with('success_message', 'Cập nhật thành công');
            }
        }
        return View('frontend.profile', compact('agent'));
    }
    public function logout(){
        session_start();
        Auth::logout();
        return redirect('/')->with('success_message', 'Đăng Xuất Thành Công');
    }
    public function post($post_id){
        session_start();
        $agent = new Agent();
        $post=Post::find($post_id);
        $categories=Category::all();
        $productbestsell=Product::orderBy('sell', 'desc')->limit(6)->get();
        return View('frontend.post', compact('post', 'agent', 'categories', 'productbestsell'));
    }
    public function news(){
        session_start();
        $agent = new Agent();
        $posts=Post::all();
        $categories=Category::all();
        $news=Post::orderBy('id', 'desc')->get();
        $productbestsell=Product::orderBy('sell', 'desc')->limit(6)->get();
        return View('frontend.allpost', compact('posts', 'agent', 'news', 'categories', 'productbestsell'));
    }
    public function comments(Request $request){
        $data=$request->all();
        if(!Auth::check()){
            $validator=Validator::make($data, [
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name'=>'required',
                'mobile'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', $validator->errors());
            }else{
                if ($request->hasFile('image')) {
                    $images = $request->file('image');
                    $xxx=array();
                    foreach($images as $image){
                        $reimage = 'frontend/imgs/'.rand(10, 100000000).time() . '.' . $image->getClientOriginalExtension();
                        $dest = public_path('frontend/imgs');
                        $image->move($dest, $reimage);
                        $xxx[]=$reimage;
                    }
                    $data['image']=implode(",",$xxx);
                    Comment::create($data);
                    return redirect()->back();
                }else{
                    Comment::create($data);
                    return redirect()->back();
                }
            }
        }else{
            $data['name']=Auth::user()->name;
            $data['mobile']=Auth::user()->mobile;
            if ($request->hasFile('image')) {
                $images = $request->file('image');
                $xxx=array();
                foreach($images as $image){
                    $reimage = 'frontend/imgs/'.rand(10, 100000000).time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('frontend/imgs');
                    $image->move($dest, $reimage);
                    $xxx[]=$reimage;
                }
                $data['image']=implode(",",$xxx);
                Comment::create($data);
                return redirect()->back();
            }else{
                Comment::create($data);
                return redirect()->back();
            }
        }
    }
}
