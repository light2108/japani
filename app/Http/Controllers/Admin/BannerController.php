<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class BannerController extends Controller
{
    public function index(){
        $banners=Banner::all();
        $categories=Category::where('status',1)->get();
        $types=array('Ảnh bìa 1', 'Ảnh bìa 2', 'Ảnh bìa 3', 'Ảnh bìa 4', 'Ảnh bìa 5');
        return View('backend.banner.index', compact('banners', 'categories', 'types'));
    }
    public function create(Request $request){
        
        if($request->isMethod('POST')){
            $data=$request->all();
            $validator=Validator::make($data, [
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', $validator->errors());
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $reimage = 'backend/imgs/'.time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('backend/imgs');
                    $image->move($dest, $reimage);
                    $data['image']=$reimage;
                    $image1 = $request->file('mimage');
                    $reimage1 = 'backend/imgs/'.rand(10,1000000).time() . '.' . $image1->getClientOriginalExtension();
                    $dest1 = public_path('backend/imgs');
                    $image1->move($dest1, $reimage1);
                    $data['mimage']=$reimage1;
                    Banner::create($data);
                    return redirect()->back()->with('success_message', 'Tạo Ảnh Bìa Thành Công');
                }
            }
        }
    }
    public function edit(Request $request,$id){
        $banner=Banner::find($id);
        if($request->isMethod('POST')){
            $data=$request->all();
            $validator=Validator::make($data, [
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', $validator->errors());
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $reimage = 'backend/imgs/'.time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('backend/imgs');
                    $image->move($dest, $reimage);
                    File::delete(public_path($banner['image']));
                    $image1 = $request->file('mimage');
                    $reimage1 = 'backend/imgs/'.rand(10,1000000).time() . '.' . $image1->getClientOriginalExtension();
                    $dest1 = public_path('backend/imgs');
                    $image1->move($dest1, $reimage1);
                    File::delete(public_path($banner['mimage']));
                    $data['mimage']=$reimage1;
                    $banner->update($data);
                }else{
                    $image1 = $request->file('mimage');
                    $reimage1 = 'backend/imgs/'.rand(10,1000000).time() . '.' . $image1->getClientOriginalExtension();
                    $dest1 = public_path('backend/imgs');
                    $image1->move($dest1, $reimage1);
                    File::delete(public_path($banner['mimage']));
                    $data['mimage']=$reimage1;
                    $banner->update($data);
                }
                return redirect()->back()->with('success_message', 'Chỉnh Sửa Ảnh Bìa Thành Công');
            }
        }
    }
    public function delete(Request $request, $id){
        Banner::find($id)->delete();
        return redirect()->back()->with('success_message', 'Xóa Ảnh Bìa Thành Công');
    }
}
