<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return View('backend.category.index', compact('categories'));
    }
    public function create(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();
            $validator=Validator::make($data, [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', 'Ảnh không hợp lệ');
            }else{
                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $reimage = 'backend/imgs/'.time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('backend/imgs');
                    $image->move($dest, $reimage);
                    $data['image'] = $reimage;
                    Category::create($data);
                    return redirect()->back()->with('success_message', 'Tạo Danh Mục Sản Phẩm Thành Công');
                }
            }
        }
        // return View('backend.category.create');
    }
    public function edit(Request $request,$id){
        $category=Category::find($id);
        if($request->isMethod('POST')){
            $data=$request->all();
            $validator=Validator::make($data, [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', 'Ảnh không hợp lệ');
            }else{
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $reimage = 'backend/imgs/'.time() . '.' . $image->getClientOriginalExtension();
                    $dest = public_path('backend/imgs');
                    $image->move($dest, $reimage);
                    File::delete(public_path($category['image']));
                    $data['image']=$reimage;
                    $category->update($data);
                }else{
                    $category->update($data);
                }
                return redirect()->back()->with('success_message', 'Chỉnh Sửa Danh Mục Sản Phẩm Thành Công');
            }
        }

        // return View('backend.category.edit', compact('category'));
    }
    public function delete(Request $request, $id){
        Category::find($id)->delete();
        return redirect()->back()->with('success_message', 'Xóa Danh Mục Sản Phẩm Thành Công');
    }
}
