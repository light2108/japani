<?php
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\TypeProduct;
$categories=Category::with('typeproduct')->where('status', 1)->get()->toArray();
$typeproducts=TypeProduct::limit(4)->get();
$session_id=session_id();
if(count(Cart::where('session_id', $session_id)->get())==0){
    Cart::create(['session_id'=>$session_id]);
}
if(!Auth::check()){
    $count_quantities=Cart::count_quantity(Cart::where('session_id', $session_id)->where('status',0)->first()->id);

}else{
    // dd(Auth::user()->id);
    if(!empty(Cart::where('user_id', Auth::user()->id)->where('status',0)->first()->id)){
        $count_quantities=Cart::count_quantity(Cart::where('user_id', Auth::user()->id)->where('status',0)->first()->id);
    }else{
        $count_quantities=0;
    }
}
// dd($session_id);
?>
<input type="hidden" id="totalQuantityCart" value="{{$count_quantities}}">
<div class="group_fixed">
    <div class="img_banner_top">
        <a href="javascript:void(0)"
            title="Tải App Nhanh, Tích Điểm Ngay">
            <img style="width: 100%;" src="https://japana.vn/uploads/banner/1663148515-topbar-new-pc.gif?1664937505"
                alt="Tải App Nhanh, Tích Điểm Ngay" class="img-responsive">
        </a>
    </div>
    <div class="header_top">
        <div class="container">
            <div class="list_box_header">
                <div class="header_box_logo">
                    <a href="{{ url('/') }}">
                        <!-- Group 3 -->
                        <img src="{{url('/frontend/imgs/Logo_White.png')}}" width="100vw" height="80vh" style="position: relative;top:-1vh;left:2vw">

                    </a>
                </div>
                <div class="header_box_menu cate-menu">
                    <div class="menu_nav title-cate">
                        <span class="icons material-icons-round">grid_view</span>
                        <span class="text">Danh mục sản phẩm</span>
                    </div>

                    <ul id="show-cate" class="item-cate">
                        @foreach($categories as $category)
                        <li class="has-sub">
                            <a href="{{url('/category/'.$category['id'])}}" title="{{$category['name']}}">
                                <img src="{{$category['image']}}"
                                    alt="{{$category['name']}}">
                                <span>{{$category['name']}}@if(!empty($category['typeproduct'])) <i class="fa fa-angle-right" aria-hidden="true"></i>@endif
                                </span>
                            </a>

                            <ul>
                                @foreach($category['typeproduct'] as $typeproduct)
                                <li><a href="{{url('/type-product/'.$typeproduct['id'])}}" title="{{$typeproduct['name']}}">
                                        {{$typeproduct['name']}}</a>
                                </li>
                                @endforeach
                            </ul>

                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="header_box_search">
                    <form method="GET" name="frm" id="frm" action="https://japana.vn/search.jp?q="
                        enctype="multipart/form-data">
                        <div class="form-group form-group-search">
                            <button onclick="searchitem.gotolink('/search.jp?q=');" type="button" class="icon-search">
                                <span class="icons material-icons">search</span>
                            </button>
                            <input autocomplete="off" x-webkit-speech_off="" x-webkit-grammar_off="builtin:search"
                                id="search" name="search" class="form-control ipt-search input-search"
                                placeholder="Tìm kiếm sản phẩm ..." type="text" value="">

                            <div id="showsearch">

                            </div>
                        </div>
                    </form>
                    <div class="tags-header tag-top">
                        <ul>
                            @foreach($typeproducts as $typeproduct)
                            <li><a class="text-color-white" href="{{url('/type-product/'.$typeproduct['id'])}}" title="{{$typeproduct['name']}}">{{$typeproduct['name']}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="header_box_tracking">
                    <a rel="nofollow" href="{{url('/order-tracking')}}" title="Theo dõi đơn hàng">
                        <span class="icons material-icons-round">receipt</span>
                        <span>
                            <span class="text-color-white">Tra cứu</span>
                            <span class="text-color-white">đơn hàng</span>
                        </span>
                    </a>
                </div>

                <div class="header_box_user">
                    <div class="list_cart_user">
                        <div class="header_box_cart">
                            <a rel="nofollow" href="{{url('/cart')}}" title="Giỏ hàng">
                                <span class="icons material-icons-round">shopping_basket</span>
                                @if(!empty(Cart::with('order')->where('session_id', $session_id)->first()))
                                    <span class="number-cart"><abbr class="count-giohang">{{$count_quantities}}</abbr></span>
                                @else
                                    <span class="number-cart"><abbr class="count-giohang">0</abbr></span>
                                @endif
                            </a>
                        </div>

                        <div class="content_box_user">
                            @if (!empty(Auth::user()))
                                <div class="div_name">
                                    <span>Chào,</span>
                                    <span>{{ Auth::user()->name }}</span>
                                </div>
                                <div class="div_avatar">
                                    <span class="avatar_header no_avatar"
                                       @if(empty(Auth::user()->image)) style="background-image: url('frontend/assets/images/tuna.jpg');" @else style="background-image: url('{{Auth::user()->image}}');" @endif></span>
                                </div>
                            @else
                                <div class="div_avatar">
                                    <span class="avatar_header no_avatar"
                                        style="background-image: url('frontend/assets/v2/images/no_avatar_round.png');"></span>
                                </div>
                            @endif
                            <div class="header_box_user_dropdown">

                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icons material-icons">arrow_drop_down</i>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="arrow_div">
                                        <div class="popover-arrow">
                                            <div class="popover-arrow-inner"></div>
                                        </div>
                                    </div>
                                    @if (empty(Auth::user()))
                                        <a class="dropdown-item" rel="nofollow" id="register-btn"
                                            href="javascript:void(0);" title="Đăng ký" data-toggle="modal"
                                            data-target="#Register">
                                            Đăng ký
                                        </a>
                                        <a class="dropdown-item" rel="nofollow" id="login-btn"
                                            href="javascript:void(0);" title="Đăng nhập" data-toggle="modal"
                                            data-target="#Register">
                                            Đăng nhập
                                        </a>
                                    @else
                                        <a class="dropdown-item" rel="nofollow" href="{{ url('/profile') }}"
                                            title="Tài khoản của tôi">
                                            Tài khoản của tôi
                                        </a>
                                        <a class="dropdown-item" rel="nofollow" id="login-btn"
                                            href="javascript:void(0);" title="Đăng nhập">
                                            Đơn mua
                                        </a>
                                        <a class="dropdown-item" rel="nofollow" href="{{ url('/logout') }}"
                                            title="Đăng xuất">
                                            Đăng xuất
                                        </a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="custom_modal modal fade" id="Register" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a class="title-log" data-toggle="tab" href="#register">Đăng ký</a></li>
                    <li><a class="title-log" data-toggle="tab" href="#login">Đăng nhập</a></li>
                </ul>
                <div class="tab-content">
                    <div id="register" class="tab-pane fade in active">
                            <div class="box-input form-group">
                                <div class="icon-form">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <input id="name" type="text" name="name" placeholder="Họ và tên" class="form-control ipt-text">
                            </div>

                            <div class="box-input form-group">
                                <div class="icon-form">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <input id="email" type="email" name="email" placeholder="Email" class="form-control ipt-text">
                            </div>
                            <div class="box-input form-group">
                                <div class="icon-form">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <input id="mobile" type="tel" name="mobile" placeholder="Số điện thoại" class="form-control ipt-text">
                            </div>

                            <div class="box-input form-group">
                                <div class="icon-form">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                <input id="password" type="password" name="password" placeholder="Mật khẩu" class="form-control ipt-text">
                            </div>
                            <div class="box-input form-group">
                                <div class="icon-form">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                <input id="re_password" type="password" name="re-password" placeholder="Xác nhận mật khẩu" class="form-control ipt-text">
                            </div>

                            <p style="display: none" id="warning-register" class="warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Số điện thoại hoặc email đã tồn tại</p>
                            <div class="box-check">
                                <label class="check-custom">Bạn đã đọc và đồng ý với điều khoản sử dụng, mua bán và bảo mật của <a href="https://japana.vn/chinh-sach-bao-mat-static-7.jp" title="japana">Japana.vn</a>
                                  <input type="checkbox" id="check-rule" checked="checked">
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="box-check2">
                                <label class="check-custom">Đăng ký nhận khuyến mãi từ chúng tôi
                                  <input type="checkbox" id="check-promo" checked="checked">
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="button" name="regis-btn" class="btn-red register_frontend">Tạo tài khoản</button>
                            <input value="http://japana.vn/?itm_source=homepage&amp;itm_medium=header&amp;itm_campaign=logojapana&amp;itm_content=pc" type="hidden" name="url">

                    </div>
                    <div id="login" class="tab-pane fade">

                            <div class="box-input form-group">
                                <div class="icon-form">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <input id="username-login" type="text" name="username" placeholder="Email hoặc số điện thoại" class="form-control ipt-text">
                            </div>
                            <div class="box-input form-group">
                                <div class="icon-form">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                <input id="password-login" type="password" name="password" placeholder="Mật khẩu" class="form-control ipt-text">
                            </div>

                            <button type="button" class="btn-red login-click">Đăng nhập</button>
                            <p style="margin-top: 10px;color: red;" id="error-login"></p>
                            <div class="box-check login-popup">
                                <label class="check-custom">Ghi nhớ tài khoản <a href="#" title="Quên mật khẩu?" data-toggle="modal" data-target="#ForgotPW" data-dismiss="modal" class="forgot-pass">Quên mật khẩu?</a>
                                  <input type="checkbox" checked="checked">
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                            <input value="http://japana.vn/?itm_source=homepage&amp;itm_medium=header&amp;itm_campaign=logojapana&amp;itm_content=pc" type="hidden" name="url">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Forgot Password -->
<div class="custom_modal modal fade" id="ForgotPW" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-modal">
                    <p class="title-log">Lấy lại mật khẩu</p>
                    <form method="GET">
                        <p class="intro-log">
                            Vui lòng nhập địa chỉ email của bạn vào ô bên dưới. Bạn sẽ nhận được một liên kết để thiết lập lại mật khẩu.
                        </p>
                        <div class="box-input form-group">
                            <div class="icon-form">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <input type="email" name="email" id="email_loss" placeholder="Nhập email của bạn" class="form-control ipt-text">
                        </div>

                        <button onclick="funcuser.losspass('https://japana.vn/');" type="button" class="btn-red btn-loss-pass">Lấy lại mật khẩu</button>
                        <a href="#Login" title="Quay lại trang đăng nhập" data-toggle="modal" data-target="#Register" data-dismiss="modal" class="link-return"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Quay lại trang đăng nhập</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password -->
<div class="custom_modal modal fade" id="ForgotPW2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="box-modal">
                    <p class="title-log">Lấy lại mật khẩu</p>
                    <form method="GET">
                        <p class="intro-log">
                            <i class="fa fa-check" aria-hidden="true"></i> Một địa chỉ email đã được gửi về mail của bạn, vui lòng check mail để tiến hành thay đổi mật khẩu.
                        </p>
                        <button type="submit" class="btn-red btn-loss-pass">OK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
