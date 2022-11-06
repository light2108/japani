<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\TypeProduct;
use Jenssegers\Agent\Agent;
use App\Models\Comment;
use App\Models\Banner;
class ProductController extends Controller
{
    public function detailProduct(Request $request, $id){
        session_start();
        $agent = new Agent();
        $product=Product::find($id);
        // dd($product);
        $count=1;
        $typeproduct=TypeProduct::find($product['typeproduct_id']);
        $category=Category::find($product['category_id']);
        $productrandoms=Product::inRandomOrder()->limit(3)->get();
        // $productrelated=Product::where('category_id', $category['id'])->where('id','!=',$product['id'])->limit(2)->get();
        // dd($productrelated);
        $sum=$product['price'];
        $productrelated=[];
        foreach($productrelated as $product){
            $sum+=$product['price'];
            $count++;
        }
        
        $comments=Comment::where('product_id', 2)->orderBy('id', 'desc')->paginate(5);
        // dd($comments);
        return View('frontend.product.index', compact('product', 'category','productrelated','sum','count','typeproduct', 'agent', 'productrandoms', 'comments', 'id'));
    }
    public function TypeProduct(Request $request, $id){
        session_start();
        $agent = new Agent();
        $banner1s=Banner::where('type',1)->where('status',1)->get();
        $products=Product::where('typeproduct_id', $id)->paginate(12);
        $typeproduct=TypeProduct::find($id);
        $countProducts=count(Product::where('typeproduct_id', $id)->where('status',1)->get());
        return View('frontend.category_typeproduct.index_typeproduct', compact('products','banner1s', 'typeproduct', 'countProducts', 'id', 'agent'));
    }
    public function category(Request $request, $id){
        session_start();
        $agent = new Agent();
        $category=Category::find($id);
        $banner1s=Banner::where('type',1)->where('status',1)->get();
        $typeProducts=TypeProduct::where('category_id', $id)->get()->toArray();
        $countProducts=count(Product::where('category_id', $id)->where('status',1)->get());
        $products=Product::where('category_id', $id)->paginate(12);
        $categories=Category::where('status',1)->get()->toArray();
        return View('frontend.category_typeproduct.index_category', compact('products','banner1s', 'categories', 'category', 'countProducts', 'typeProducts', 'id', 'agent'));
    }
    public function filterCategory(Request $request, $id){
        session_start();
        $agent = new Agent();
        $data=$request->all();
        $category=Category::find($id);
        $banner1s=Banner::where('type',1)->where('status',1)->get();
        $typeProducts=TypeProduct::where('category_id', $id)->get()->toArray();
        $countProducts=count(Product::where('category_id', $id)->where('status',1)->get());
        $categories=Category::where('status',1)->get()->toArray();
        if(isset($data['category'])){
        $products=Product::whereIn('category_id', $data['category'])->paginate(12);
        }
        if(isset($data['id_brand'])){
            $products=Product::whereIn('typeproduct_id', $data['id_brand'])->paginate(12);
            }
        return View('frontend.category_typeproduct.index_category', compact('products','banner1s', 'categories', 'category', 'countProducts', 'typeProducts', 'id', 'agent'));
    }
    public function filterTypeProduct(Request $request, $id){
        $data=$request->all();
        $agent = new Agent();
        session_start();
        $products=Product::where('typeproduct_id', $id)->paginate(12);
        $typeproduct=TypeProduct::find($id);
        $countProducts=count(Product::where('typeproduct_id', $id)->where('status',1)->get());
        $banner1s=Banner::where('type',1)->where('status',1)->get();
        if(isset($data['id_brand'])){
            $products=Product::whereIn('typeproduct_id', $data['id_brand'])->paginate(12);
        }
            return View('frontend.category_typeproduct.index_typeproduct', compact('products','banner1s', 'typeproduct', 'countProducts', 'id', 'agent'));
    }
}
