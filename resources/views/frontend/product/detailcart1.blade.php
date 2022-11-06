<?php

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

$session_id = session_id();
if (!Auth::check()) {
    $sum = Cart::sum_price(Cart::where('session_id', $session_id)->where('status', 0)->first()->id);
    $count_quantities = Cart::count_quantity(Cart::where('session_id', $session_id)->where('status', 0)->first()->id);
} else {
    if (!empty(Cart::where('user_id', Auth::user()->id)->where('status', 0)->first()->id)) {
        $sum = Cart::sum_price(Cart::where('user_id', Auth::user()->id)->where('status', 0)->first()->id);
        $count_quantities = Cart::count_quantity(Cart::where('user_id', Auth::user()->id)->where('status', 0)->first()->id);
    } else {
        $sum = 0;
        $count_quantities = 0;
    }
}
?>
@if ($sum>0)
<div class="site-inner">
    <div class="content-sidebar-wrap">
        <main class="cart content">
            <link href="https://japana.vn/assets/mobile/assets/css/cart_v2.css" rel="stylesheet" type="text/css">
            <style>
                header,
                footer.site-footer,
                .toolbar2 {
                    display: none;
                }

                .container_cart .list_group_item {
                    overflow: scroll;
                    margin-bottom: 60px;
                }
            </style>
            <div class="menu_cart_top box_shadow_all">
                <div class="back_menu">
                    <a href="/">
                        <!-- Graphic -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="18">
                            <path d="M 0.353 9.657 L 8.375 17.735 C 8.727 18.088 9.299 18.088 9.651 17.735 C 10.003 17.381 10.003 16.807 9.651 16.453 L 2.265 9.016 L 9.65 1.58 C 10.001 1.226 10.001 0.651 9.65 0.297 C 9.298 -0.057 8.726 -0.057 8.375 0.297 L 0.352 8.375 C 0.006 8.724 0.006 9.308 0.353 9.657 Z" fill="#000"></path>
                        </svg>
                    </a>
                </div>
                <div class="title_menu">
                    <span>Giỏ hàng</span>
                </div>
            </div>
            <script>
                $(function() {
                    var height = screen.height;
                    height = height - 60 px;
                    $(".container_cart .list_group_item").css("height", height);
                });
            </script>
            <div class="container_cart">

                <div class="list_group_item">
                @foreach ($carts['order'] as $order)
                    <div class="item_group" id="item_{{$order['product_id']}}">

                        <div class="item_cart_main">
                            <div class="item_img">
                                <a href="{{$order['url']}}">
                                    <img src="{{$order['image']}}" alt="" width="100" height="100">
                                </a>
                            </div>
                            
                            <div class="content_product">
                                <div class="title_product">
                                    <p>{{$order['name']}}</p>
                                </div>
                                <div class="price">
                                    <p>
                                        <span class="price"> {{number_format($order['price'],'0',',','.')}} đ</span>
                                    </p>
                                </div>

                                <div class="action_item">
                                    <div class="remove_item">
                                        <a href="javascript:void(0)" class="delete deleteCart" data-cart-id="{{$carts['id']}}"
                                                            data-id="{{ $order['product_id'] }}" data-product-quantity="{{$order['quantity']}}" data-sum-product-price="{{$order['quantity']*$order['price']}}">Xóa</a>
                                    </div>
                                    <div class="up_down_item">
                                        <div class="quantity_action">
                                            <button data-cart-id="{{ $order['cart_id'] }}"
                                                        data-product-id="{{ $order['product_id'] }}"
                                                        data-price="{{ $order['price'] }}" data-icon="-" title="giảm" class="sub-qty edit-quantity">
                                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="minus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-minus fa-w-12 fa-2x">
                                                    <path fill="#888888" d="M368 224H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h352c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z" class=""></path>
                                                </svg>
                                            </button>
                                            <input readonly="readonly" id="{{ $order['product_id'] }}" type="text"
                                                        name="qty" value="{{ $order['quantity'] }}" class="txtNumPro">
                                            <button data-cart-id="{{ $order['cart_id'] }}"
                                                        data-product-id="{{ $order['product_id'] }}"
                                                        data-price="{{ $order['price'] }}" data-icon="+" title="tăng" class="add-qty edit-quantity">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-plus fa-w-12 fa-2x">
                                                    <path fill="#ffffff" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z" class=""></path>
                                                </svg>
                                            </button>

                                            <input id="sum-final-price-{{$order['product_id']}}" type="hidden" value="{{$sum}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                           
                        </div>
                        <!-- <div class="item_cart_qt" id="item_qt16229">
                            <div class="item_qt_cart_img">
                                <img src="https://japana.vn/uploads/product/2022/10/19/1666143595-ua-tam-trang-da-yukina-white-body-wash-500ml-0.jpg" alt="" width="100" height="100">
                            </div>
                            <div class="content_product_qt">
                                <div class="title_qt">
                                    <p> Sữa tắm trắng da Yukina White Body Wash 500ml</p>
                                </div>
                                <div class="price_qt">
                                    <span class="price_qt"> 480.000 đ</span>
                                </div>
                                <div class="box_text_qt">
                                    <span class="badge-success">Quà tặng</span>
                                    <span>Số lượng: <span id="item_qt_sl_16229">1</span></span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                @endforeach
                </div>
                <input id="sum_price" type="hidden" value="{{$sum}}">


            </div>


            <div class="menu_cart_bottom">
                <div class="total_menu_bottom custom-total-price">
                    <p>
                        <span>Tạm tính:</span>
                        <span class="price sum-price total text-sum-price-tong">{{ number_format($sum, 0, ',', '.') }} đ</span>
                    </p>
                    <p class="count">(<span class="count-giohang">{{$count_quantities}}</span> sản phẩm)</p>
                </div>
                <input type="hidden" id="total_item_all_cart" value="1">
                <div class="button_menu_bottom">
                    <div class="text_action">
                        <a href="{{url('/order')}}" class="btn btn_dathang">
                            ĐẶT HÀNG
                        </a>
                    </div>
                </div>
            </div>

            <div class="modal_alert_question">
                <div class="content_alert">
                    <p>Bạn muốn xóa sản phẩm này?</p>
                    <div class="group_btn">
                        <input type="hidden" id="id_item_delete">
                        <a href="javascript:hideConfirmModalDelete();" class="btn_yes">
                            <span>Không</span>
                        </a>
                        <a href="javascript:deleteCart();" class="btn_no">
                            <span>Có</span>
                        </a>
                    </div>
                </div>
            </div>
            <script>
                fbq('track', 'AddToCart', {
                    content_type: 'product',
                    content_ids: ['16229,'],
                    value: 3000000,
                    currency: 'VND',
                });
            </script>
        </main>
    </div>
</div>
@else
<div class="site-inner">
    <div class="content-sidebar-wrap">
        <main class="cart content">
            <link href="https://japana.vn/assets/mobile/assets/css/cart_v2.css" rel="stylesheet" type="text/css">
            <style>
                header,
                footer.site-footer,
                .toolbar2 {
                    display: none;
                }

                .container_cart .list_group_item {
                    overflow: scroll;
                    margin-bottom: 60px;
                }
            </style>
            <div class="menu_cart_top box_shadow_all">
                <div class="back_menu">
                    <a href="/">
                        <!-- Graphic -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="18">
                            <path d="M 0.353 9.657 L 8.375 17.735 C 8.727 18.088 9.299 18.088 9.651 17.735 C 10.003 17.381 10.003 16.807 9.651 16.453 L 2.265 9.016 L 9.65 1.58 C 10.001 1.226 10.001 0.651 9.65 0.297 C 9.298 -0.057 8.726 -0.057 8.375 0.297 L 0.352 8.375 C 0.006 8.724 0.006 9.308 0.353 9.657 Z" fill="#000"></path>
                        </svg>
                    </a>
                </div>
                <div class="title_menu">
                    <span>Giỏ hàng</span>
                </div>
            </div>
            <script>
                $(function() {
                    var height = screen.height;
                    height = height - 60 px;
                    $(".container_cart .list_group_item").css("height", height);
                });
            </script>
            <div class="container_cart">
                <div class="final-cart cart-empty-box" style="padding:10px;">
                    <div class="side-cart-final empty-cart" style="margin-top: 80px;">
                        <div class="cart-empty" style="text-align: center;margin-bottom: 24px;">
                            <img src="https://japana.vn/assets/images/empty-sad-shopping-bag.gif" alt="title" style="width: 150px; height: 150px; ">
                        </div>
                        <p class="text-center" style="color: #555;font-size: 13px;letter-spacing: 0px;line-height: 20px;margin-bottom: 77px;">
                            Không có sản phẩm nào trong giỏ hàng của bạn!</p>
                        <div class="btn-thanks text-center">
                            <a href="{{url('/')}}" title="Tiếp tục mua sắm" class="btn_buy_next" style=" width: 200px;height: 40px;background-color: #dc0000;overflow: visible;border-radius: 4px;">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                fbq('track', 'AddToCart', {
                    content_type: 'product',
                    content_ids: [''],
                    value: 0,
                    currency: 'VND',
                });
            </script>
        </main>
    </div>
</div>
@endif