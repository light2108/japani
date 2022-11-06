<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Ordered;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
class OrderController extends Controller
{
    public function index(){
        session_start();
        $session_id=session_id();
        $agent = new Agent();
        if(!Auth::check()){
            $alls=Cart::with('order')->where('session_id', $session_id)->where('status',0)->first()->toArray();
        }else{
            $alls=Cart::with('order')->where('user_id', Auth::user()->id)->where('status',0)->first()->toArray();
        }
        if(!empty($alls)){
            return View('frontend.order.index', compact('alls', 'agent'));
        }else{
            return redirect('/cart');
        }


    }
    public function create(Request $request){
        $data=$request->all();
        session_start();
        $session_id=session_id();
        if(!Auth::check()){
            $cart_id=Cart::where('session_id', $session_id)->where('status',0)->first()->id;
            $data['cart_id']=$cart_id;
            Ordered::create($data);
            Cart::where('session_id', $session_id)->where('status',0)->update(['status'=>1]);
        }else{
            $cart_id=Cart::where('user_id', Auth::user()->id)->where('status',0)->first()->id;
            $data['cart_id']=$cart_id;
            Ordered::create($data);
            Cart::where('user_id', Auth::user()->id)->where('status',0)->update(['status'=>1]);
        }
        return redirect('/thanks');
        // return response()->json(['status'=>1]);
    }
    public function thanks(){
        $agent = new Agent();
        session_start();
        return View('frontend.order.thank', compact('agent'));
    }
    public function tracking(){
        $agent = new Agent();
        session_start();
        return View('frontend.order.tracking',compact('agent'));
    }
}
