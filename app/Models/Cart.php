<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable=[
        'user_id',
        'session_id',
        'status'
    ];
    public function order(){
        return $this->hasMany('App\Models\Order', 'cart_id', 'id');
    }
    public function ordered(){
        return $this->hasMany('App\Models\Ordered', 'cart_id', 'id');
    }

    public static function count_quantity($cart_id){
        $count_quantities=Order::where('cart_id', $cart_id)->get();
        $sum=0;
        foreach($count_quantities as $count){
            $sum+=$count['quantity'];
        }
        return $sum;
    }
    public static function sum_price($cart_id){
        $alls=Order::where('cart_id', $cart_id)->get();
        $sum=0;
        foreach($alls as $all){
            $sum+=$all['price']*$all['quantity'];
        }
        return $sum;
    }
}
