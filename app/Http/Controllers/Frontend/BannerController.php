<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class BannerController extends Controller
{
    public function second($banner_id, $category_id){
        session_start();
        $agent = new Agent();
        $typeproducts=TypeProduct::with('product')->where('status',1)->where('category_id', $category_id)->get()->toArray();
        // dd($typeproducts);
        return View('frontend.banner.second', compact('typeproducts', 'agent'));
    }
    public function first($banner_id, $category_id){
        session_start();
        $agent = new Agent();
        $banner=Banner::find($banner_id);
        $products=Product::where('category_id', $category_id)->where('status',1)->get()->toArray();
        $typeproducts=TypeProduct::with('product')->where('category_id', $category_id)->where('status',1)->get()->toArray();
        $products6=Product::where('category_id', $category_id)->inRandomOrder()->limit(6)->get()->toArray();
        $productsrandom=Product::inRandomOrder()->get()->toArray();
        // dd($productsrandom);
        $category=Category::find($category_id);
        // dd($productsrandom);
        return View('frontend.banner.first', compact('banner', 'agent', 'products', 'typeproducts', 'products6', 'productsrandom', 'category'));
    }
    public function third($banner_id, $category_id){
        session_start();
        $agent = new Agent();
        $banner=Banner::find($banner_id);
        $products=Product::where('category_id',1)->where('status',1)->get()->toArray();
        $products6=Product::inRandomOrder()->where('category_id', 1)->limit(6)->get()->toArray();
        $typeproducts=TypeProduct::with('product')->where('category_id',1)->get()->toArray();
        // dd($productsrandom);
        return View('frontend.banner.third', compact('products', 'banner', 'typeproducts', 'products6'));
    }
    public function fifth($banner_id, $category_id){
        session_start();
        $agent = new Agent();
        $banner1s=Banner::where('type',1)->where('status',1)->get();
        $banner=Banner::find($banner_id);
        $category=Category::find($category_id);
        $categories=Category::all();
        $products=Product::where('category_id', $category_id)->where('status',1)->paginate(6);
        $typeproducts=TypeProduct::all();
        // dd($products);
        return View('frontend.banner.fifth', compact('banner','agent', 'category', 'products', 'categories', 'typeproducts', 'banner1s'));
    }
}
