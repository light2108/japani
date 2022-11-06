<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeProduct;
use App\Models\Category;
class TypeProductController extends Controller
{
    public function index(){
        $typeproducts=TypeProduct::all();
        $categories=Category::where('status',1)->get();
        return View('backend.typeproduct.index', compact('typeproducts', 'categories'));
    }
    public function create(Request $request){
        if($request->isMethod('POST')){
            $data=$request->all();
            
                    TypeProduct::create($data);
                    return redirect()->back()->with('success_message', 'Tạo Loại Sản Phẩm Thành Công');
        }
    }
    public function edit(Request $request,$id){
        $typeproduct=TypeProduct::find($id);
        if($request->isMethod('POST')){
            $data=$request->all();
            
           
                    $typeproduct->update($data);
               
                return redirect()->back()->with('success_message', 'Chỉnh Loại Sản Phẩm Thành Công');
        }
    }
    public function delete(Request $request, $id){
        TypeProduct::find($id)->delete();
        return redirect()->back()->with('success_message', 'Xóa Loại Sản Phẩm Thành Công');
    }
}
