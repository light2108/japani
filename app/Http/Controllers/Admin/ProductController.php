<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\TypeProduct;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        $categories=Category::where('status',1)->get()->toArray();
        $typeproducts=TypeProduct::where('status',1)->get();
        return View('backend.product.index', compact('products', 'typeproducts', 'categories'));
    }
    public function create(Request $request){
        $typeproducts=TypeProduct::where('status',1)->get();
        $categories=Category::where('status',1)->get();
        if($request->isMethod('POST')){
            $data=$request->all();
            $validator=Validator::make($data, [
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', $validator->errors());
            }else{
                if ($request->hasFile('image')) {
                    $images = $request->file('image');
                    $xxx=array();
                    foreach($images as $image){
                        $reimage = 'backend/imgs/'.rand(10, 100000000).time() . '.' . $image->getClientOriginalExtension();
                        $dest = public_path('backend/imgs');
                        $image->move($dest, $reimage);
                        $xxx[]=$reimage;
                    }
                    $data['image']=implode(",",$xxx);
                    Product::create($data);
                    return redirect('/admin/products')->with('success_message', 'Tạo Sản Phẩm Thành Công');
                }
            }
        }
        return View('backend.product.create', compact('typeproducts', 'categories'));
    }
    public function edit(Request $request,$id){
        $product=Product::find($id);
        $categories=Category::where('status',1)->get();
        // dd($catetypes);
        $typeproducts=TypeProduct::where('status',1)->get();
        if($request->isMethod('POST')){
            $data=$request->all();
            $validator=Validator::make($data, [
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($validator->fails()){
                return redirect()->back()->with('error_message', $validator->errors());
            }else{
                if ($request->hasFile('image')) {
                    $images = $request->file('image');
                    $xxx=array();
                    foreach($images as $image){
                        $reimage = 'backend/imgs/'.rand(10, 100000000).time() . '.' . $image->getClientOriginalExtension();
                        $dest = public_path('backend/imgs');
                        $image->move($dest, $reimage);
                        $xxx[]=$reimage;
                    }
                    foreach(explode(",",$product['image']) as $image){
                        File::delete(public_path($image));
                    }
                    $data['image']=implode(",", $xxx);
                    $product->update($data);
                }else{
                    $product->update($data);
                }
                return redirect('/admin/products')->with('success_message', 'Chỉnh Sửa Sản Phẩm Thành Công');
            }
        }
        return View('backend.product.edit', compact('product', 'typeproducts', 'categories'));
    }
    public function delete(Request $request, $id){
        Product::find($id)->delete();
        return redirect()->back()->with('success_message', 'Xóa Sản Phẩm Thành Công');
    }
    public function changeTypeProduct(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $typeproducts=TypeProduct::where('category_id', $data['category_id'])->where('status', 1)->get()->toArray();
            return View('backend.product.change-typeproduct', compact('typeproducts'));
        }
    }
}
