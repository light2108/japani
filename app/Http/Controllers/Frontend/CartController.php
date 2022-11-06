<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Agent;
class CartController extends Controller
{
    public function index(){
        session_start();
        $session_id=session_id();
        $agent = new Agent();
        if(!Auth::check()){
            $carts=Cart::with('order')->where('session_id', $session_id)->where('status',0)->first()->toArray();
            // dd($carts);
            return View('frontend.product.cart', compact('carts', 'agent'));
        }else{
            if(!empty(Cart::where('session_id', $session_id)->first()->user_id)){
                $carts=Cart::with('order')->where('user_id', Auth::user()->id)->where('status',0)->first()->toArray();
            // dd($carts);
                return View('frontend.product.cart', compact('carts', 'agent'));
            }else{
                $carts=Cart::with('order')->where('session_id', $session_id)->where('status',0)->first()->toArray();
                // dd($carts);
                return View('frontend.product.cart', compact('carts', 'agent'));
            }
            
        }
    }
    public function addcart(Request $request){
        session_start();
        if($request->ajax()){
            $data=$request->all();
            $id=session_id();
            if(!Auth::check()){
                
                if(count(Cart::where('session_id', $id)->get())==0){
                    $cart=Cart::create(['session_id'=>$id]);
                    Order::create(['cart_id'=>$cart['id'], 'product_id'=>$data['id'], 'quantity'=>$data['sl'], 'price'=>$data['price_market'], 'image'=>$data['image'], 'name'=>$data['name'], 'url'=>$data['url']]);
                    return response()->json(['status'=>1]);
                }else{
                    $cart=Cart::where('session_id', $id)->first();
                    if(count(Order::where('product_id', $data['id'])->where('cart_id', $cart['id'])->get())==0){

                        Order::create(['cart_id'=>$cart['id'], 'product_id'=>$data['id'], 'quantity'=>$data['sl'], 'price'=>$data['price_market'], 'image'=>$data['image'], 'name'=>$data['name'], 'url'=>$data['url']]);
                        return response()->json(['status'=>1]);
                    }else{
                        $order=Order::where('product_id', $data['id'])->where('cart_id', $cart['id'])->first();
                        $order->update(['quantity'=>$data['sl']+$order['quantity'], 'price'=>$data['price_market']]);
                        return response()->json(['status'=>1]);
                    }
                }
            }else{
                if(!empty(Cart::where('session_id', $id)->first()->user_id)){
                    if(count(Cart::where('session_id', $id)->get())==0){
                        $cart=Cart::create(['session_id'=>$id]);
                        Order::create(['cart_id'=>$cart['id'], 'product_id'=>$data['id'], 'quantity'=>$data['sl'], 'price'=>$data['price_market'], 'image'=>$data['image'], 'name'=>$data['name'], 'url'=>$data['url']]);
                        return response()->json(['status'=>1]);
                    }else{
                        $cart=Cart::where('session_id', $id)->first();
                        if(count(Order::where('product_id', $data['id'])->where('cart_id', $cart['id'])->get())==0){
    
                            Order::create(['cart_id'=>$cart['id'], 'product_id'=>$data['id'], 'quantity'=>$data['sl'], 'price'=>$data['price_market'], 'image'=>$data['image'], 'name'=>$data['name'], 'url'=>$data['url']]);
                            return response()->json(['status'=>1]);
                        }else{
                            $order=Order::where('product_id', $data['id'])->where('cart_id', $cart['id'])->first();
                            $order->update(['quantity'=>$data['sl']+$order['quantity'], 'price'=>$data['price_market']]);
                            return response()->json(['status'=>1]);
                        }
                    }
                }else{
                    $cart=Cart::where('user_id', Auth::user()->id)->first();
                        if(count(Order::where('product_id', $data['id'])->where('cart_id', $cart['id'])->get())==0){
                            
                            Order::create(['cart_id'=>$cart['id'], 'product_id'=>$data['id'], 'quantity'=>$data['sl'], 'price'=>$data['price_market'], 'image'=>$data['image'], 'name'=>$data['name'], 'url'=>$data['url']]);
                            return response()->json(['status'=>1]);
                        }else{
                            $order=Order::where('product_id', $data['id'])->where('cart_id', $cart['id'])->first();
                            $order->update(['quantity'=>$data['sl']+$order['quantity'], 'price'=>$data['price_market']]);
                            return response()->json(['status'=>1]);
                        }
                }

            }

        }
    }
    public function addcart1(Request $request){
        session_start();
        if($request->ajax()){
            $data=$request->all();
            // dd($data);
            Order::where('cart_id', $data['cart_id'])->where('product_id', $data['product_id'])->update(['quantity'=>$data['sl']]);
            return response()->json(['status'=>1]);

        }
    }
    public function deleteCart(Request $request){
        session_start();
        // if($request->ajax()){
            $data=$request->all();
            Order::where('cart_id', $data['cart_id'])->where('product_id', $data['id'])->delete();
            return response()->json(['status'=>1]);
        // }
    }
    public function inforItem(){
        session_start();
        return View('frontend.product.infor-item');
    }
}
