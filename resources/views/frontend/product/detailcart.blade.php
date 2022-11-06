<?php
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
$session_id = session_id();
if(!Auth::check()){
    $sum = Cart::sum_price(Cart::where('session_id', $session_id)->where('status',0)->first()->id);
    $count_quantities=Cart::count_quantity(Cart::where('session_id', $session_id)->where('status',0)->first()->id);
}else{
    if(!empty(Cart::where('user_id', Auth::user()->id)->where('status',0)->first()->id)){
        $sum = Cart::sum_price(Cart::where('user_id', Auth::user()->id)->where('status',0)->first()->id);
        $count_quantities=Cart::count_quantity(Cart::where('user_id', Auth::user()->id)->where('status',0)->first()->id);
    }else{
        $sum=0;
        $count_quantities=0;
    }
}
?>
@if ($sum>0)
    <div class="site-inner">
        <div class="content-sidebar-wrap">
            <main class="cart content">
                <div class="container">
                    <!-- cartCustom -->
                    <link href="https://japana.vn/assets/frontend/assets/css/cartCustom.css" rel="stylesheet"
                        type="text/css">

                    <style>
                        .box-cart {
                            display: inline-block;
                            width: 100%;
                        }

                        .title-cart {
                            font-size: 16px;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 400;
                            color: #2a2a2a;
                            border-bottom: 2px solid #bb0029;
                            padding: 25px 0 8px;
                            margin-bottom: 20px;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center
                        }

                        .title-cart span {
                            text-transform: none;
                            color: #666;
                            margin-left: 5px;
                            font-size: 14px
                        }

                        .title-cart .icon-cart {
                            background: url(../assets/images/box-img.png) no-repeat;
                            background-position: -5px -12px;
                            width: 30px;
                            height: 35px;
                            display: inline-block;
                            margin-right: 5px
                        }

                        .list-cart .item .box-img {
                            width: 120px;
                            height: 120px;
                            display: inline-block;
                            text-align: center;
                            float: left
                        }

                        .list-cart {
                            width: 770px;
                            float: left;
                            margin-bottom: 30px
                        }

                        .list-cart .item {
                            display: inline-block;
                            width: 100%;
                            padding: 18px 0;
                            border-bottom: 1px solid #e3e3e3
                        }

                        .list-cart .item:first-child {
                            margin-top: 0;
                            padding-top: 0
                        }

                        .list-cart .item .box-img img {
                            width: 100%
                        }

                        .list-cart .item .detail {
                            padding-left: 20px;
                            width: 430px;
                            display: inline-block;
                            float: left
                        }

                        .list-cart .item .detail .box-price-cart {
                            margin-top: 10px;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: baseline;
                            -ms-flex-align: baseline;
                            align-items: baseline
                        }

                        .list-cart .item .detail .box-price-cart span {
                            padding-right: 5px
                        }

                        .list-cart .item .detail>.title a,
                        .list-cart .item .detail p,
                        .list-cart .item .detail .box-price-cart span {
                            font-family: 'Roboto', sans-serif;
                            font-size: 14px;
                            font-weight: 400;
                            color: #333;
                            line-height: 1.5
                        }

                        .list-cart .item .detail>.title {
                            margin-bottom: 0;
                            width: 355px
                        }

                        .list-cart .item .detail .box-price-cart .old-price-cart {
                            text-decoration: line-through;
                            color: #666;
                            margin-right: 10px
                        }

                        .count-price {
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            padding-top: 15px
                        }

                        .list-cart .item .detail .count-price .quantity,
                        .other-buy .quantity {
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            -webkit-box-pack: center;
                            -ms-flex-pack: center;
                            justify-content: center;
                            border: 1px solid #cbcbcb;
                            border-radius: 4px
                        }

                        .other-buy .quantity {
                            display: -webkit-inline-box;
                            display: -ms-inline-flexbox;
                            display: inline-flex
                        }

                        .list-cart .item .detail .count-price .quantity .btn,
                        .other-buy .quantity .btn {
                            color: #cbcbcb;
                            width: 31px;
                            height: 28px;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            -webkit-box-pack: center;
                            -ms-flex-pack: center;
                            justify-content: center;
                            background: #fff;
                            border-radius: 0;
                            font-size: 14px;
                            padding: 0
                        }

                        .list-cart .item .detail .count-price .quantity .btn:hover,
                        .other-buy .quantity .btn:hover {
                            color: #fff;
                            background: #cbcbcb
                        }

                        .txtNumPro {
                            width: 40px;
                            height: 28px;
                            font-size: 18px;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 400;
                            color: #2a2a2a;
                            text-align: center;
                            border: 0;
                            padding: 7px 0;
                            border-right: 1px solid #cbcbcb;
                            border-left: 1px solid #cbcbcb
                        }

                        .final-price {
                            margin-left: 44px;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: baseline;
                            -ms-flex-align: baseline;
                            align-items: baseline
                        }

                        .final-price span {
                            padding-right: 5px
                        }

                        .final-price p,
                        .final-price span {
                            font-size: 16px !important;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 400;
                            color: #bb0029 !important;
                            margin-bottom: 0
                        }

                        .final-price span {
                            font-size: 16px !important;
                            color: #333333 !important;
                            font-weight: 500
                        }

                        .delete-item {
                            float: right
                        }

                        .delete-item span {
                            font-size: 14px;
                            color: #cbcbcb
                        }

                        .delete-item a {
                            display: inline-block;
                            -webkit-transition: all .4s ease-in-out;
                            -o-transition: all .4s ease-in-out;
                            transition: all .4s ease-in-out
                        }

                        .delete-item a:hover {
                            -webkit-transform: rotate(25deg);
                            -ms-transform: rotate(25deg);
                            transform: rotate(25deg)
                        }

                        .continue-buy {
                            background: #bb0029;
                            border: 1px solid #bb0029;
                            display: inline-block;
                            width: 100%;
                            height: 46px;
                            text-align: center;
                            color: #fff;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 400;
                            font-size: 16px;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            -webkit-box-pack: center;
                            -ms-flex-pack: center;
                            justify-content: center;
                            cursor: pointer;
                            margin-top: 30px;
                            border-radius: 4px
                        }

                        .continue-buy span {
                            padding-top: 5px;
                            margin-left: 15px
                        }

                        .continue-buy i {
                            font-size: 30px
                        }

                        .continue-buy:hover {
                            color: #bb0029;
                            background: transparent
                        }

                        .final-cart {
                            width: 370px;
                            float: right
                        }

                        .side-cart-final {
                            background: #f9f9f9;
                            padding: 15px;
                            margin-bottom: 15px
                        }

                        .final-cart .info-cart {
                            font-size: 16px;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 500;
                            color: #333;
                            border-bottom: 2px solid #333;
                            padding-bottom: 3px;
                            margin-bottom: 0
                        }

                        .final-cart .total-cart {
                            font-size: 16px;
                            font-family: 'Roboto', sans-serif;
                            padding-top: 15px
                        }

                        .final-cart .total-price {
                            padding-top: 0
                        }

                        .final-cart p span:first-child {
                            font-weight: 400;
                            color: #666
                        }

                        .final-cart p span:last-child {
                            font-weight: 500;
                            color: #bb0029;
                            float: right
                        }

                        .final-cart .sum-price {
                            text-transform: none;
                            font-size: 24px;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 500;
                            color: #bb0029;
                            padding-top: 0
                        }

                        .final-cart .sum-price>span {
                            font-size: 18px;
                            color: #333;
                            text-transform: uppercase
                        }

                        .final-cart hr {
                            margin: 20px 0
                        }

                        .btn-pay,
                        .btn-promo {
                            background: #15b02a;
                            border: 1px solid #15b02a;
                            color: #fff;
                            font-size: 16px;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 400;
                            padding: 13px 0;
                            text-align: center;
                            display: inline-block;
                            width: 100%;
                            margin: 15px 0 0;
                            border-radius: 4px
                        }

                        .btn-pay:hover,
                        .promo-cart .btn-promo:hover {
                            background: #fff;
                            border: 1px solid #15b02a;
                            color: #15b02a
                        }

                        .promo-cart .title-promo {
                            font-size: 16px;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 500;
                            color: #333;
                            display: inline-block;
                            text-align: right;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            -webkit-box-pack: end;
                            -ms-flex-pack: end;
                            justify-content: flex-end;
                            padding-left: 10px
                        }

                        .promo-cart .title-promo img {
                            padding-right: 10px
                        }

                        .promo-cart .ipt-promo {
                            border-radius: 0;
                            padding: 15px;
                            height: 50px;
                            font-style: italic;
                            font-family: 'Roboto', sans-serif;
                            font-weight: 400;
                            color: #333;
                            width: 255px
                        }

                        .promo-cart .btn-promo {
                            width: 100px;
                            margin: 0
                        }

                        .form-promo {
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            -webkit-box-pack: justify;
                            -ms-flex-pack: justify;
                            justify-content: space-between;
                            margin-bottom: 0
                        }

                        .sub-qty {
                            border-radius: 4px 0 0 4px !important
                        }

                        .add-qty {
                            border-radius: 0 4px 4px 0 !important
                        }

                        .content-promo {
                            font-size: 14px;
                            font-family: 'Roboto', sans-serif;
                            color: #666;
                            font-weight: 400;
                            display: inline-block;
                            margin-top: 15px;
                            line-height: 1.5;
                            border: 1px dashed #cbcbcb;
                            border-radius: 4px;
                            padding: 5px 10px
                        }

                        .content-promo span {
                            font-weight: 500;
                            color: #333
                        }

                        .box-gift {
                            position: relative
                        }

                        .gift-icon {
                            position: absolute;
                            top: -15px;
                            left: 0;
                        }

                        .box-promo-info {
                            border: 1px dashed #ccc;
                            padding: 5px 15px;
                            border-radius: 4px;
                            margin-top: 10px;
                            display: block;
                        }

                        .thanks {
                            display: inline-block;
                            text-align: center;
                            width: 100%;
                            padding: 60px 0
                        }

                        .thanks p {
                            padding: 30px 0;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            -webkit-box-pack: center;
                            -ms-flex-pack: center;
                            justify-content: center
                        }

                        .thanks p,
                        .btn-thanks a {
                            font-size: 16px;
                            font-family: 'Roboto', sans-serif;
                            color: #333
                        }

                        .btn-thanks {
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            -webkit-box-pack: center;
                            -ms-flex-pack: center;
                            justify-content: center
                        }

                        .btn-thanks a {
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            align-items: center;
                            -webkit-box-pack: center;
                            -ms-flex-pack: center;
                            justify-content: center;
                            width: 200px;
                            height: 45px;
                            background: #bb0029;
                            border-radius: 4px;
                            color: #fff
                        }

                        .btn-thanks a:last-child {
                            margin-left: 30px;
                            background: #15b02a
                        }

                        .btn-thanks a:hover {
                            background: #ccc;
                            color: #fff
                        }

                    </style>

                    <div id="cart" class="container">
                        <div class="content-product">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="m-0">GIỎ HÀNG <span>- <abbr
                                                class="count-giohang">{{ count($carts['order']) }}</abbr> sản
                                            phẩm</span></h3>
                                    <input type="hidden" value="{{$count_quantities}}" id="totalQuantityx">
                                </div>
                                <div class="card-body">
                                    <ul class="list-item">
                                        @foreach ($carts['order'] as $order)
                                            <li class="item price_market" id="item_{{ $order['product_id'] }}">
                                                <div class="box-img float-left">
                                                    <a href="{{ $order['url'] }}">
                                                        <img src="{{ $order['image'] }}" alt="item">
                                                    </a>
                                                </div>
                                                <div class="detail float-left">
                                                    <h3 class="title">
                                                        <a href="{{ $order['url'] }}" title="{{ $order['name'] }}">
                                                            {{ $order['name'] }} </a>
                                                    </h3>

                                                    <div class="delete-item-cart">
                                                        <a href="javascript:void(0)" title="Xóa"
                                                            class="delete deleteCart" data-cart-id="{{$carts['id']}}"
                                                            data-id="{{ $order['product_id'] }}" data-product-quantity="{{$order['quantity']}}" data-sum-product-price="{{$order['quantity']*$order['price']}}">
                                                            <span class="">Xóa</span>
                                                        </a>
                                                    </div>

                                                </div>

                                                <div class="box-price float-left">
                                                    {{-- <input type="hidden" id="zzz-{{$order['product_id']}}" value="{{$order['price']}}">
                                                    <input type="hidden" id="xxx-{{$order['product_id']}}" value="{{$order['quantity']}}"> --}}
                                                    <input id="sum-final-price-{{ $order['product_id'] }}"
                                                        type="hidden" value="{{ $order['price'] }}">
                                                    <p id="total_{{ $order['product_id'] }}" class="price">
                                                        {{ number_format($order['price'] * $order['quantity'], 0, ',', '.') }}
                                                        đ</p>
                                                </div>

                                                <div class="quantity float-right">
                                                    <button data-cart-id="{{ $order['cart_id'] }}"
                                                        data-product-id="{{ $order['product_id'] }}"
                                                        data-price='{{ $order['price'] }}' data-icon="-" title="bớt"
                                                        class="sub-qty btn edit-quantity"><span
                                                            class="ti-minus"></span></button>
                                                    <input readonly="" id="{{ $order['product_id'] }}" type="text"
                                                        name="qty" value="{{ $order['quantity'] }}"
                                                        class="txtNumPro">
                                                    <button data-cart-id="{{ $order['cart_id'] }}"
                                                        data-product-id="{{ $order['product_id'] }}"
                                                        data-price='{{ $order['price'] }}' data-icon="+"
                                                        title="thêm" class="add-qty btn edit-quantity"><span
                                                            class="ti-plus"></span></button>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                            </div>

                            <div class="promotion">
                                <div class="card">
                                    <div class="card-body list-price">
                                        <p><span>Tạm tính:</span> <span
                                                class="text-sum-price-tong">{{ number_format($sum, 0, ',', '.') }}
                                                đ</span></p>
                                        <hr>
                                        <p class="m-0"><span>Tổng cộng:</span> <span
                                                class="total-order text-sum-price-tong">{{ number_format($sum, 0, ',', '.') }}
                                                đ</span></p>
                                        <input id="sum_price" type="hidden" value="{{ $sum }}">

                                        <p class="order-alert">
                                            Giá trị đơn hàng hiện tại nhỏ hơn 500.000 đ. Để được miễn phí giao hàng Quý
                                            khách vui lòng chọn thêm sản phẩm.<br>
                                        </p>
                                    </div>
                                </div>
                                <a href="{{url('/order')}}" title="ĐẶT HÀNG"
                                    class="continue-checkout convert-background-color-15B02A custom-margin">ĐẶT HÀNG</a>
                            </div>

                        </div>
                    </div>
                @else
                    <div class="site-inner">
                        <div class="content-sidebar-wrap">
                            <main class="cart content">
                                <div class="container">
                                    <!-- cartCustom -->
                                    <link href="https://japana.vn/assets/frontend/assets/css/cartCustom.css"
                                        rel="stylesheet" type="text/css">

                                    <style>
                                        .box-cart {
                                            display: inline-block;
                                            width: 100%;
                                        }

                                        .title-cart {
                                            font-size: 16px;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 400;
                                            color: #2a2a2a;
                                            border-bottom: 2px solid #bb0029;
                                            padding: 25px 0 8px;
                                            margin-bottom: 20px;
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center
                                        }

                                        .title-cart span {
                                            text-transform: none;
                                            color: #666;
                                            margin-left: 5px;
                                            font-size: 14px
                                        }

                                        .title-cart .icon-cart {
                                            background: url(../assets/images/box-img.png) no-repeat;
                                            background-position: -5px -12px;
                                            width: 30px;
                                            height: 35px;
                                            display: inline-block;
                                            margin-right: 5px
                                        }

                                        .list-cart .item .box-img {
                                            width: 120px;
                                            height: 120px;
                                            display: inline-block;
                                            text-align: center;
                                            float: left
                                        }

                                        .list-cart {
                                            width: 770px;
                                            float: left;
                                            margin-bottom: 30px
                                        }

                                        .list-cart .item {
                                            display: inline-block;
                                            width: 100%;
                                            padding: 18px 0;
                                            border-bottom: 1px solid #e3e3e3
                                        }

                                        .list-cart .item:first-child {
                                            margin-top: 0;
                                            padding-top: 0
                                        }

                                        .list-cart .item .box-img img {
                                            width: 100%
                                        }

                                        .list-cart .item .detail {
                                            padding-left: 20px;
                                            width: 430px;
                                            display: inline-block;
                                            float: left
                                        }

                                        .list-cart .item .detail .box-price-cart {
                                            margin-top: 10px;
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: baseline;
                                            -ms-flex-align: baseline;
                                            align-items: baseline
                                        }

                                        .list-cart .item .detail .box-price-cart span {
                                            padding-right: 5px
                                        }

                                        .list-cart .item .detail>.title a,
                                        .list-cart .item .detail p,
                                        .list-cart .item .detail .box-price-cart span {
                                            font-family: 'Roboto', sans-serif;
                                            font-size: 14px;
                                            font-weight: 400;
                                            color: #333;
                                            line-height: 1.5
                                        }

                                        .list-cart .item .detail>.title {
                                            margin-bottom: 0;
                                            width: 355px
                                        }

                                        .list-cart .item .detail .box-price-cart .old-price-cart {
                                            text-decoration: line-through;
                                            color: #666;
                                            margin-right: 10px
                                        }

                                        .count-price {
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            padding-top: 15px
                                        }

                                        .list-cart .item .detail .count-price .quantity,
                                        .other-buy .quantity {
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: center;
                                            -ms-flex-pack: center;
                                            justify-content: center;
                                            border: 1px solid #cbcbcb;
                                            border-radius: 4px
                                        }

                                        .other-buy .quantity {
                                            display: -webkit-inline-box;
                                            display: -ms-inline-flexbox;
                                            display: inline-flex
                                        }

                                        .list-cart .item .detail .count-price .quantity .btn,
                                        .other-buy .quantity .btn {
                                            color: #cbcbcb;
                                            width: 31px;
                                            height: 28px;
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: center;
                                            -ms-flex-pack: center;
                                            justify-content: center;
                                            background: #fff;
                                            border-radius: 0;
                                            font-size: 14px;
                                            padding: 0
                                        }

                                        .list-cart .item .detail .count-price .quantity .btn:hover,
                                        .other-buy .quantity .btn:hover {
                                            color: #fff;
                                            background: #cbcbcb
                                        }

                                        .txtNumPro {
                                            width: 40px;
                                            height: 28px;
                                            font-size: 18px;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 400;
                                            color: #2a2a2a;
                                            text-align: center;
                                            border: 0;
                                            padding: 7px 0;
                                            border-right: 1px solid #cbcbcb;
                                            border-left: 1px solid #cbcbcb
                                        }

                                        .final-price {
                                            margin-left: 44px;
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: baseline;
                                            -ms-flex-align: baseline;
                                            align-items: baseline
                                        }

                                        .final-price span {
                                            padding-right: 5px
                                        }

                                        .final-price p,
                                        .final-price span {
                                            font-size: 16px !important;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 400;
                                            color: #bb0029 !important;
                                            margin-bottom: 0
                                        }

                                        .final-price span {
                                            font-size: 16px !important;
                                            color: #333333 !important;
                                            font-weight: 500
                                        }

                                        .delete-item {
                                            float: right
                                        }

                                        .delete-item span {
                                            font-size: 14px;
                                            color: #cbcbcb
                                        }

                                        .delete-item a {
                                            display: inline-block;
                                            -webkit-transition: all .4s ease-in-out;
                                            -o-transition: all .4s ease-in-out;
                                            transition: all .4s ease-in-out
                                        }

                                        .delete-item a:hover {
                                            -webkit-transform: rotate(25deg);
                                            -ms-transform: rotate(25deg);
                                            transform: rotate(25deg)
                                        }

                                        .continue-buy {
                                            background: #bb0029;
                                            border: 1px solid #bb0029;
                                            display: inline-block;
                                            width: 100%;
                                            height: 46px;
                                            text-align: center;
                                            color: #fff;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: center;
                                            -ms-flex-pack: center;
                                            justify-content: center;
                                            cursor: pointer;
                                            margin-top: 30px;
                                            border-radius: 4px
                                        }

                                        .continue-buy span {
                                            padding-top: 5px;
                                            margin-left: 15px
                                        }

                                        .continue-buy i {
                                            font-size: 30px
                                        }

                                        .continue-buy:hover {
                                            color: #bb0029;
                                            background: transparent
                                        }

                                        .final-cart {
                                            width: 370px;
                                            float: right
                                        }

                                        .side-cart-final {
                                            background: #f9f9f9;
                                            padding: 15px;
                                            margin-bottom: 15px
                                        }

                                        .final-cart .info-cart {
                                            font-size: 16px;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 500;
                                            color: #333;
                                            border-bottom: 2px solid #333;
                                            padding-bottom: 3px;
                                            margin-bottom: 0
                                        }

                                        .final-cart .total-cart {
                                            font-size: 16px;
                                            font-family: 'Roboto', sans-serif;
                                            padding-top: 15px
                                        }

                                        .final-cart .total-price {
                                            padding-top: 0
                                        }

                                        .final-cart p span:first-child {
                                            font-weight: 400;
                                            color: #666
                                        }

                                        .final-cart p span:last-child {
                                            font-weight: 500;
                                            color: #bb0029;
                                            float: right
                                        }

                                        .final-cart .sum-price {
                                            text-transform: none;
                                            font-size: 24px;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 500;
                                            color: #bb0029;
                                            padding-top: 0
                                        }

                                        .final-cart .sum-price>span {
                                            font-size: 18px;
                                            color: #333;
                                            text-transform: uppercase
                                        }

                                        .final-cart hr {
                                            margin: 20px 0
                                        }

                                        .btn-pay,
                                        .btn-promo {
                                            background: #15b02a;
                                            border: 1px solid #15b02a;
                                            color: #fff;
                                            font-size: 16px;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 400;
                                            padding: 13px 0;
                                            text-align: center;
                                            display: inline-block;
                                            width: 100%;
                                            margin: 15px 0 0;
                                            border-radius: 4px
                                        }

                                        .btn-pay:hover,
                                        .promo-cart .btn-promo:hover {
                                            background: #fff;
                                            border: 1px solid #15b02a;
                                            color: #15b02a
                                        }

                                        .promo-cart .title-promo {
                                            font-size: 16px;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 500;
                                            color: #333;
                                            display: inline-block;
                                            text-align: right;
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: end;
                                            -ms-flex-pack: end;
                                            justify-content: flex-end;
                                            padding-left: 10px
                                        }

                                        .promo-cart .title-promo img {
                                            padding-right: 10px
                                        }

                                        .promo-cart .ipt-promo {
                                            border-radius: 0;
                                            padding: 15px;
                                            height: 50px;
                                            font-style: italic;
                                            font-family: 'Roboto', sans-serif;
                                            font-weight: 400;
                                            color: #333;
                                            width: 255px
                                        }

                                        .promo-cart .btn-promo {
                                            width: 100px;
                                            margin: 0
                                        }

                                        .form-promo {
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: justify;
                                            -ms-flex-pack: justify;
                                            justify-content: space-between;
                                            margin-bottom: 0
                                        }

                                        .sub-qty {
                                            border-radius: 4px 0 0 4px !important
                                        }

                                        .add-qty {
                                            border-radius: 0 4px 4px 0 !important
                                        }

                                        .content-promo {
                                            font-size: 14px;
                                            font-family: 'Roboto', sans-serif;
                                            color: #666;
                                            font-weight: 400;
                                            display: inline-block;
                                            margin-top: 15px;
                                            line-height: 1.5;
                                            border: 1px dashed #cbcbcb;
                                            border-radius: 4px;
                                            padding: 5px 10px
                                        }

                                        .content-promo span {
                                            font-weight: 500;
                                            color: #333
                                        }

                                        .box-gift {
                                            position: relative
                                        }

                                        .gift-icon {
                                            position: absolute;
                                            top: -15px;
                                            left: 0;
                                        }

                                        .box-promo-info {
                                            border: 1px dashed #ccc;
                                            padding: 5px 15px;
                                            border-radius: 4px;
                                            margin-top: 10px;
                                            display: block;
                                        }

                                        .thanks {
                                            display: inline-block;
                                            text-align: center;
                                            width: 100%;
                                            padding: 60px 0
                                        }

                                        .thanks p {
                                            padding: 30px 0;
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: center;
                                            -ms-flex-pack: center;
                                            justify-content: center
                                        }

                                        .thanks p,
                                        .btn-thanks a {
                                            font-size: 16px;
                                            font-family: 'Roboto', sans-serif;
                                            color: #333
                                        }

                                        .btn-thanks {
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: center;
                                            -ms-flex-pack: center;
                                            justify-content: center
                                        }

                                        .btn-thanks a {
                                            display: -webkit-box;
                                            display: -ms-flexbox;
                                            display: flex;
                                            -webkit-box-align: center;
                                            -ms-flex-align: center;
                                            align-items: center;
                                            -webkit-box-pack: center;
                                            -ms-flex-pack: center;
                                            justify-content: center;
                                            width: 200px;
                                            height: 45px;
                                            background: #bb0029;
                                            border-radius: 4px;
                                            color: #fff
                                        }

                                        .btn-thanks a:last-child {
                                            margin-left: 30px;
                                            background: #15b02a
                                        }

                                        .btn-thanks a:hover {
                                            background: #ccc;
                                            color: #fff
                                        }

                                    </style>

                                    <div class="thanks">
                                        <p><img src="https://japana.vn/assets/images/icon-cart2.png" alt="hình ảnh"
                                                style="width: 65px; margin-right: 20px;"> Bạn chưa có sản phẩm nào trong
                                            giỏ hàng. Vui lòng quay lại chọn thêm sản phẩm.</p>
                                        <div class="btn-thanks">
                                            <a href="{{ url('/category/1') }}" class="btn-xemkm-custom"
                                                title="Xem khuyến mãi">Xem khuyến mãi</a>
                                            <a href="{{ url('/') }}" class="btn-tieptucmua-custom"
                                                title="Tiếp tục mua sắm">Tiếp tục mua sắm</a>
                                        </div>
                                    </div>


                                    <script>

                                    </script>

                                    <script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true">
                                    </script>
                                    <script type="text/javascript">
                                        window.criteo_q = window.criteo_q || [];
                                        window.criteo_q.push({
                                            event: "setAccount",
                                            account: 72566
                                        }, {
                                            event: "setEmail",
                                            email: "marketing@japana.vn"
                                        }, {
                                            event: "setSiteType",
                                            type: "d"
                                        }, {
                                            event: "viewBasket",
                                            item: []
                                        });

                                    </script>
                                </div>
                            </main>
                        </div>
                    </div>

@endif
