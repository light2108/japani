<?php
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
$categories=Category::with('typeproduct')->where('status', 1)->get()->toArray();

$session_id=session_id();
if(count(Cart::where('session_id', $session_id)->get())==0){
    Cart::create(['session_id'=>$session_id]);
    $count_quantities=0;
}else{
    if(!Auth::check()){
        $count_quantities=Cart::count_quantity(Cart::where('session_id', $session_id)->where('status',0)->first()->id);
        // dd($count_quantities);
    }else{
        // dd(Auth::user()->id);
        if(!empty(Cart::where('user_id', Auth::user()->id)->where('status',0)->first()->id)){
            $count_quantities=Cart::count_quantity(Cart::where('user_id', Auth::user()->id)->where('status',0)->first()->id);
        }else{
            $count_quantities=0;
        }
    }
}
// dd($session_id);
?>

<header class="site-header" data-hide-during-focus="false">
    <a class="banner-header"
        href="javascript:void(0)"
        title="Tải App Nhanh, Tích Điểm Ngay">
        <img src="https://japana.vn/uploads/banner/1666059721-topbar-new-mb(-chinh).gif"
            alt="Tải App Nhanh, Tích Điểm Ngay">
    </a>
    <div class="top-header search-transform">
        <div class="container">
            <div class="icon-nav">
                <div class="icon_menu"></div>
            </div>
            <div class="logo">
                <a rel="nofollow"
                    href="{{url('/')}}"
                    title="Siêu thị Nhật Bản Japavi.vn">
                    <img src="https://japana.vn/uploads/system/1648857290-asset-1@4x.png"
                        alt="Siêu thị Nhật Bản Japana.vn">
                </a>
            </div>
            <div class="other-top">
                <a class="number-cart" rel="nofollow" href="{{url('/cart')}}" title="giỏ hàng">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="18">
                        <path
                            d="M 20.11 5.397 L 15.753 5.397 L 13.309 0.344 C 13.174 0.063 12.811 -0.066 12.499 0.057 C 12.188 0.18 12.046 0.507 12.182 0.789 L 14.411 5.397 L 6.589 5.397 L 8.818 0.789 C 8.954 0.507 8.812 0.18 8.501 0.057 C 8.189 -0.066 7.826 0.063 7.691 0.344 L 5.247 5.397 L 0.89 5.397 C 0.32 5.397 -0.103 5.863 0.022 6.353 L 2.316 15.377 C 2.407 15.735 2.768 15.99 3.184 15.99 L 17.816 15.99 C 18.232 15.99 18.593 15.735 18.684 15.377 L 20.978 6.353 C 21.103 5.863 20.68 5.397 20.11 5.397 Z M 5.362 7.101 C 5.28 7.101 5.197 7.086 5.117 7.054 C 4.805 6.931 4.663 6.604 4.799 6.323 L 5.261 5.367 L 6.604 5.367 L 5.927 6.767 C 5.826 6.976 5.6 7.101 5.362 7.101 Z M 7.424 13.027 C 7.424 13.333 7.148 13.582 6.809 13.582 C 6.469 13.582 6.193 13.333 6.193 13.027 L 6.193 8.953 C 6.193 8.646 6.469 8.397 6.809 8.397 C 7.148 8.397 7.424 8.646 7.424 8.953 Z M 11.115 13.027 C 11.115 13.333 10.84 13.582 10.5 13.582 C 10.16 13.582 9.885 13.333 9.885 13.027 L 9.885 8.953 C 9.885 8.646 10.16 8.397 10.5 8.397 C 10.84 8.397 11.115 8.646 11.115 8.953 Z M 14.807 13.027 C 14.807 13.333 14.531 13.582 14.191 13.582 C 13.852 13.582 13.576 13.333 13.576 13.027 L 13.576 8.953 C 13.576 8.646 13.852 8.397 14.191 8.397 C 14.531 8.397 14.807 8.646 14.807 8.953 Z M 15.883 7.054 C 15.803 7.086 15.72 7.101 15.638 7.101 C 15.4 7.101 15.174 6.976 15.073 6.767 L 14.396 5.367 L 15.739 5.367 L 16.201 6.323 C 16.337 6.604 16.195 6.931 15.883 7.054 Z"
                            fill="hsl(0, 0%, 100%)"></path>
                    </svg>
                    <span class="count-item count-giohang">{{$count_quantities}}</span>
                </a>
            </div>
            <form method="GET" name="frm" id="frm" action="https://japana.vn/search.jp?q=" enctype="multipart/form-data"
                class="form-search">
                <div class="header-search">
                    <span class="material-icons">search</span>
                    <input class="form-control ipt-search" type="text" placeholder="Tìm kiếm sản phẩm..." id="search"
                        name="search">
                </div>
            </form>
            <div id="showsearch" class="top-search"></div>
        </div>
    </div>
</header>
<nav class="nav-primary">
    <div class="bg-nav">&nbsp;
        <button type="button" class="closed-mb closed-search">
            <span class="icon-m icon-close-m"></span>
        </button>
    </div>
    <div class="custom-tab">
        <ul class="tab-menu">
            <li class="active"><a id="m-menu" href="javascript:void(0);">Danh mục</a></li>
            <li><a id="m-user" href="javascript:void(0);">Tài khoản</a></li>
        </ul>
        <div class="box-tab">
            <div class="menu-mobile">
                @foreach($categories as $category)
                <div class="item">
                    <h4 class="title">
                        <a href="{{url('/category/'.$category['id'])}}" title="{{$category['name']}}">
                            <img src="{{$category['image']}}"
                                alt="{{$category['name']}}">
                            {{$category['name']}} </a>
                        <span class="expand-menu">

                            <i class="icon-m icon-arrow-m"  aria-hidden="true" @if(empty($category['typeproduct'])) style="visibility: hidden"@endif></i>

                        </span>
                    </h4>
                    <ul class="sub-nav">
                        @foreach($category['typeproduct'] as $typeproduct)
                        <li>
                            <a title="{{$typeproduct['name']}}" href="{{url('/type-product/'.$typeproduct['id'])}}"
                                class="sub-nav-item">
                                <i class="icon-m icon-child-m"></i>
                                {{$typeproduct['name']}} </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
            <div class="side-header-info">
                @if(!empty(Auth::user()))
                <div class="box-item">
                        <ul>
                            <li><a rel="nofollow" href="{{url('/profile')}}" title="Quản lý tài khoản"><i class="icon-m icon-acc-m1"></i><span>Quản lý tài khoản</span></a></li>
                            <li><a rel="nofollow" href="{{url('/order')}}" title="Đơn hàng của tôi"><i class="icon-m icon-acc-m3"></i><span>Đơn hàng của tôi</span></a></li>
                            <li><a rel="nofollow" href="{{url('/logout')}}" title="Đăng xuất"><i class="icon-m icon-acc-m2"></i><span>Đăng xuất</span></a></li>
                        </ul>
                    </div>
                @else
                <div class="box-item">
                    <ul>
                        <li><a id="register-btn" href="javascript:void(0);" title="title"><i
                                    class="icon-m icon-acc-m1"></i><span>Đăng ký tài khoản</span></a></li>
                        <li><a id="login-btn" href="javascript:void(0);" title="title"><i
                                    class="icon-m icon-acc-m2"></i><span>Đăng nhập</span></a></li>
                        <li><a href="https://japana.vn/theo-doi-don-hang.jp" title="title"><i
                                    class="icon-m icon-acc-m3"></i><span>Tra cứu đơn hàng</span></a></li>
                    </ul>
                </div>
                <div id="login">
                    <div class="title-login">
                        <button type="button" class="back-menu" id="back1">
                            <i class="icon-m icon-arrowback-m"></i>
                        </button>
                        Đăng nhập
                    </div>
                    <div class="box-login">
                        <div class="box-input form-group">
                            <div class="icon-form"><i class="icon-m icon-user-1"></i></div>
                            <input id="username-login" type="text" name="username"
                                placeholder="Email hoặc số điện thoại" class="form-control ipt-text">
                        </div>
                        <div class="box-input form-group">
                            <div class="icon-form"><i class="icon-m icon-user-2"></i></div>
                            <input id="password-login" type="password" name="password" placeholder="Mật khẩu"
                                class="form-control ipt-text">
                        </div>
                        <button type="button" class="btn-regis-log login-click"><span>Đăng nhập</span>
                        </button>
                        <p aria-hidden="true" style="margin-top: 10px;color: red;" id="error-login"></p>
                        <div class="box-check login-popup">
                            <div class="item-login"><a href="javascript:void(0);" title="title"
                                    class="register-btn2">&gt;&gt;
                                    Đăng ký</a></div>
                            <div class="item-login">
                                <label class="check-custom">
                                    Ghi nhớ tài khoản<input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="javascript:void(0);" title="title" class="forgot-pass">Quên mật khẩu?</a>
                            </div>
                        </div>
                        <input value="https://japana.vn/" type="hidden" name="url">
                    </div>
                </div>
                <div id="register">
                    <div class="title-login">
                        <button type="button" class="back-menu" id="back2"><i class="icon-m icon-arrowback-m"></i>
                        </button>
                        Đăng ký
                    </div>
                    <div class="box-login">
                        <div class="box-input form-group">
                            <div class="icon-form"><i class="icon-m icon-user-1"></i></div>
                            <input id="name" type="text" name="name" placeholder="Họ và tên"
                                class="form-control ipt-text">
                        </div>
                        <div class="box-input form-group">
                            <div class="icon-form"><i class="icon-m icon-user-3"></i></div>
                            <input id="email" type="email" name="email" placeholder="Email"
                                class="form-control ipt-text">
                        </div>
                        <div class="box-input form-group">
                            <div class="icon-form"><i class="icon-m icon-user-4"></i></div>
                            <input id="mobile" type="tel" name="mobile" placeholder="Số điện thoại"
                                class="form-control ipt-text">
                        </div>
                        <div class="box-input form-group">
                            <div class="icon-form"><i class="icon-m icon-user-2"></i></div>
                            <input id="password" type="password" name="password" placeholder="Mật khẩu"
                                class="form-control ipt-text">
                        </div>
                        <div class="box-input form-group">
                            <div class="icon-form"><i class="icon-m icon-user-2"></i></div>
                            <input id="re_password" type="password" name="re-password" placeholder="Xác nhận mật khẩu"
                                class="form-control ipt-text">
                        </div>
                        <p style="display: none" id="warning-register" class="warning">Số điện thoại hoặc email đã
                            tồn
                            tại</p>
                        <div class="box-check">
                            <label class="check-custom">Bạn đã đọc và đồng ý với điều khoản sử dụng, mua bán và bảo
                                mật của
                                <a href="https://japana.vn/chinh-sach-bao-mat-static-7.jp" title="japana">Japana.vn</a>
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
                        <button type="button" class="btn-regis-log register_frontend">
                            <span>Đăng ký</span>
                        </button>
                    </div>
                    <input value="http://japana.vn/" type="hidden" name="url">
                </div>
                <div id="forgotpw">
                    <div class="title-login">
                        <button type="button" class="back-menu" id="backpw">
                            <i class="icon-m icon-arrowback-m"></i>
                        </button>
                        Quên mật khẩu
                    </div>
                    <div class="box-login">
                        <h3 class="title-log">Lấy lại mật khẩu</h3>
                        <form method="GET">
                            <p class="intro-log">Vui lòng nhập địa chỉ email của bạn vào ô bên dưới. Bạn
                                sẽ nhận được một liên kết để thiết lập lại mật khẩu.</p>
                            <div class="box-input form-group">
                                <div class="icon-form"><i class="icon-m icon-user-3"></i></div>
                                <input type="email" name="email" id="email_loss" placeholder="Nhập email của bạn"
                                    class="form-control ipt-text">
                            </div>
                            <button onclick="funcuser.losspass('https://japana.vn/');" type="button" class="btn-red">Lấy
                                lại mật khẩu
                            </button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</nav>
<div class="toolbar2">
    <ul>
        <li><a class="show-account" href="javascript:void()" title="Tài khoản">
                <span>
                    <!-- Group -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21">
                        <g transform="translate(0.032 0.02)">
                            <path
                                d="M 8.864 10.116 C 10.292 10.116 11.528 9.617 12.538 8.634 C 13.548 7.651 14.06 6.448 14.06 5.058 C 14.06 3.668 13.548 2.465 12.538 1.482 C 11.528 0.498 10.291 0 8.864 0 C 7.436 0 6.2 0.498 5.19 1.482 C 4.179 2.465 3.667 3.668 3.667 5.058 C 3.667 6.448 4.179 7.651 5.19 8.634 C 6.2 9.617 7.436 10.116 8.864 10.116 Z"
                                fill="#888"></path>
                            <path
                                d="M 17.956 16.148 C 17.927 15.739 17.868 15.292 17.782 14.821 C 17.694 14.346 17.581 13.897 17.446 13.487 C 17.307 13.063 17.117 12.644 16.883 12.243 C 16.64 11.826 16.354 11.463 16.033 11.165 C 15.698 10.853 15.287 10.602 14.813 10.418 C 14.339 10.236 13.815 10.144 13.254 10.144 C 13.034 10.144 12.821 10.232 12.41 10.493 C 12.157 10.653 11.86 10.839 11.53 11.045 C 11.247 11.22 10.865 11.384 10.392 11.533 C 9.93 11.678 9.462 11.752 8.999 11.752 C 8.537 11.752 8.069 11.678 7.607 11.533 C 7.135 11.384 6.752 11.22 6.469 11.045 C 6.142 10.841 5.846 10.655 5.589 10.492 C 5.178 10.232 4.965 10.144 4.744 10.144 C 4.183 10.144 3.659 10.236 3.187 10.418 C 2.712 10.601 2.301 10.852 1.966 11.165 C 1.645 11.464 1.359 11.826 1.116 12.243 C 0.882 12.644 0.693 13.063 0.553 13.487 C 0.418 13.897 0.305 14.346 0.218 14.821 C 0.131 15.292 0.072 15.738 0.043 16.148 C 0.014 16.55 0 16.967 0 17.389 C 0 18.485 0.358 19.372 1.064 20.027 C 1.761 20.672 2.684 21 3.806 21 L 14.194 21 C 15.316 21 16.238 20.673 16.936 20.027 C 17.642 19.373 18 18.485 18 17.388 C 18 16.965 17.985 16.548 17.956 16.148 Z"
                                fill="#888"></path>
                        </g>
                    </svg>
                </span>

                <span>Tài khoản</span></a>
        </li>
        <li><a id="home_menu" href="{{url('/')}}" title="Trang chủ">
                <span>
                    <!-- Graphic -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20">
                        <path
                            d="M 20.45 8.894 L 11.211 0.297 C 10.806 -0.08 10.194 -0.08 9.789 0.297 L 0.55 8.894 C 0.225 9.196 0.118 9.662 0.277 10.08 C 0.435 10.499 0.822 10.769 1.261 10.769 L 2.737 10.769 L 2.737 19.382 C 2.737 19.723 3.008 20 3.342 20 L 8.406 20 C 8.741 20 9.012 19.723 9.012 19.382 L 9.012 14.152 L 11.988 14.152 L 11.988 19.382 C 11.988 19.723 12.259 20 12.594 20 L 17.657 20 C 17.992 20 18.263 19.723 18.263 19.382 L 18.263 10.769 L 19.739 10.769 C 20.178 10.769 20.565 10.499 20.723 10.08 C 20.882 9.662 20.775 9.196 20.45 8.894"
                            fill="#888"></path>
                    </svg>
                </span>

                <span>Trang chủ</span>
            </a>
        </li>
        <li>
            <a id="hot_menu" class="hot_menu" href="https://japana.vn/top-san-pham-ban-chay/" title="Ưu đãi">
                <div class="hot_menu_icon">
                    <div class="icon_hot"></div>
                </div>
                <span class="text-red">Ưu đãi</span>
            </a>
        </li>
        <li><a id="contact_menu" href="javascript:showContactHome();" title="Liên hệ">
                <div class="group_svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="18">
                        <path
                            d="M 18.211 0.589 L 2.898 0.589 C 1.551 0.589 0 1.784 0 2.94 L 0 12.218 C 0 13.28 1.312 14.05 2.574 14.167 L 1.754 17.28 L 7.008 14.19 L 18.211 14.19 C 19.555 14.19 20.801 13.37 20.801 12.218 L 20.801 2.94 C 20.801 1.784 19.555 0.589 18.211 0.589 Z M 5.234 8.421 C 4.469 8.421 3.852 7.8 3.852 7.038 C 3.852 6.276 4.472 5.655 5.234 5.655 C 5.996 5.655 6.617 6.272 6.617 7.038 C 6.617 7.804 5.999 8.421 5.234 8.421 Z M 10.398 8.421 C 9.637 8.421 9.016 7.8 9.016 7.038 C 9.016 6.276 9.632 5.655 10.398 5.655 C 11.164 5.655 11.781 6.272 11.781 7.038 C 11.781 7.804 11.159 8.421 10.398 8.421 Z M 15.566 8.421 C 14.805 8.421 14.184 7.8 14.184 7.038 C 14.184 6.276 14.804 5.655 15.566 5.655 C 16.328 5.655 16.949 6.272 16.949 7.038 C 16.949 7.804 16.327 8.421 15.566 8.421 Z"
                            fill="#888"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="15">
                        <path
                            d="M 16.867 0.733 L 16.195 0.733 L 16.195 8.136 C 16.195 9.292 15.523 10.331 14.176 10.331 L 0.996 10.331 L 0.996 10.686 C 0.996 11.706 2.152 12.733 3.344 12.733 L 13.426 12.733 L 17.281 14.999 L 16.719 12.733 L 16.867 12.733 C 18.059 12.733 18.594 11.706 18.594 10.686 L 18.594 2.491 C 18.594 1.472 18.059 0.733 16.867 0.733 Z"
                            fill="#888"></path>
                    </svg>
                </div>

                <span>Liên hệ</span>
            </a>
        </li>

        <!--<li><a id="goidien" href="javascript:callme('tel:(028) 7108 8889')" title="phone"><i class="icon-2020 icon-phone-2020"></i><br><span>Gọi điện</span></a></li>
        <li><a id="chatzalo" href="javascript:callme('https://zalo.me/1360579267495118428')" title="zalo"><i class="icon-2020 icon-zalo-2020"></i><br><span>Chat zalo</span></a></li>
        <li><a id="chatfb" href="javascript:callme('https://www.messenger.com/t/japana.sieuthinhat')" title="facebook"><i class="icon-2020 icon-facebook-2020"></i><br><span>Chat facebook</span></a></li>-->
    </ul>
</div>
<div class="modal_menu_home modal_contact_menu">
    <div class="menu_call">
        <ul>
            <li>
                <a id="chatzalo" href="javascript:callme('https://zalo.me/1360579267495118428')" title="zalo">
                    <span class="image_icon">
                        <img src="https://japana.vn/assets/frontend/assets/images/zalo.png" alt="" width="30px">
                    </span>
                    <span class="text_call">Zalo chat</span>
                </a>
            </li>
            <li>
                <a id="chatfb" href="javascript:callme('https://www.messenger.com/t/japana.sieuthinhat')"
                    title="facebook">
                    <span class="image_icon">
                        <img src="https://japana.vn/assets/frontend/assets/images/messenger.png" alt="" width="30px">
                    </span>
                    <span class="text_call">Messenger</span>
                </a>
            </li>
            <li>
                <a id="goidien" href="javascript:callme('tel:0975800600')" title="phone">
                    <span class="image_icon">
                        <img src="https://japana.vn/assets/frontend/assets/images/hotline.png" alt="" width="30px">
                    </span>
                    <span class="text_call">Hotline</span>
                </a>
            </li>
        </ul>
    </div>

</div>
