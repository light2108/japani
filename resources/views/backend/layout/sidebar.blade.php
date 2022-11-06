<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">

    <div class="brand-logo">
        <img src="backend/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">Dashtreme Admin</h5>
        <div class="close-btn"><i class="zmdi zmdi-close"></i></div>
    </div>

    <ul class="metismenu" id="menu">
        <li>
            <a href="{{url('/admin/dashboard')}}">
                <div class="parent-icon"><i class="zmdi zmdi-view-dashboard"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-layers'></i></div>
                <div class="menu-title">Danh Mục Sản Phẩm</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/categories')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Danh sách</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-widgets'></i></div>
                <div class="menu-title">Loại Sản Phẩm</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/type-products')}}"><i class="zmdi zmdi-dot-circle-alt"></i>Danh sách</a></li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-card-travel'></i></div>
                <div class="menu-title">Sản Phẩm</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/products')}}"><i class="zmdi zmdi-dot-circle-alt"></i>Danh sách</a></li>
                <li><a href="{{url('/admin/add/product')}}"><i class="zmdi zmdi-dot-circle-alt"></i>Tạo</a></li>

            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-chart'></i></div>
                <div class="menu-title">Ảnh Bìa</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/banners')}}"><i class="zmdi zmdi-dot-circle-alt"></i>Danh sách</a></li>

            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='fa fa-user'></i></div>
                <div class="menu-title">Đặt Hàng</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/user-ordered')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Danh sách</a>
                </li>
            </ul>
        </li>

        
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-format-list-bulleted'></i></div>
                <div class="menu-title">Bài Viết</div>
            </a>
            <ul>
                <li><a href="{{url('/admin/posts')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Danh sách</a></li>
                <li><a href="{{url('/admin/add/post')}}"><i class="zmdi zmdi-dot-circle-alt"></i> Tạo</a>
                </li>
            </ul>
        </li>

        <!-- <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-lock'></i></div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                <li><a href="authentication-signin.html" target="_blank"><i
                            class="zmdi zmdi-dot-circle-alt"></i> SignIn 1</a></li>
                <li><a href="authentication-signup.html" target="_blank"><i
                            class="zmdi zmdi-dot-circle-alt"></i> SignUp 1</a></li>
                <li><a href="authentication-signin2.html" target="_blank"><i
                            class="zmdi zmdi-dot-circle-alt"></i> SignIn 2</a></li>
                <li><a href="authentication-signup2.html" target="_blank"><i
                            class="zmdi zmdi-dot-circle-alt"></i> SignUp 2</a></li>
                <li><a href="authentication-lock-screen.html" target="_blank"><i
                            class="zmdi zmdi-dot-circle-alt"></i> Lock Screen</a></li>
                <li><a href="authentication-reset-password.html" target="_blank"><i
                            class="zmdi zmdi-dot-circle-alt"></i> Reset Password 1</a></li>
                <li><a href="authentication-reset-password2.html" target="_blank"><i
                            class="zmdi zmdi-dot-circle-alt"></i> Reset Password 2</a></li>
            </ul>
        </li>

        <li><a href="calendar.html">
                <div class="parent-icon"><i class='zmdi zmdi-calendar-check'></i></div>
                <div class="menu-title">Calendar</div>
                <div class="badge badge-light ml-auto">New</div>
            </a></li>

        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-invert-colors'></i></div>
                <div class="menu-title">UI Icons</div>
            </a>
            <ul>
                <li><a href="icons-font-awesome.html"><i class="zmdi zmdi-dot-circle-alt"></i> Font Awesome</a>
                </li>
                <li><a href="icons-material-designs.html"><i class="zmdi zmdi-dot-circle-alt"></i> Material
                        Design</a></li>
                <li><a href="icons-themify.html"><i class="zmdi zmdi-dot-circle-alt"></i> Themify Icons</a></li>
                <li><a href="icons-simple-line-icons.html"><i class="zmdi zmdi-dot-circle-alt"></i> Line
                        Icons</a></li>
                <li><a href="icons-flags.html"><i class="zmdi zmdi-dot-circle-alt"></i> Flag Icons</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-grid'></i></div>
                <div class="menu-title">Tables</div>
            </a>
            <ul>
                <li><a href="table-simple-tables.html"><i class="zmdi zmdi-dot-circle-alt"></i> Simple
                        Tables</a></li>
                <li><a href="table-data-tables.html"><i class="zmdi zmdi-dot-circle-alt"></i> Data Tables</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-map'></i></div>
                <div class="menu-title">Maps</div>
            </a>
            <ul>
                <li><a href="maps-google.html"><i class="zmdi zmdi-dot-circle-alt"></i> Google Maps</a></li>
                <li><a href="maps-vector.html"><i class="zmdi zmdi-dot-circle-alt"></i> Vector Maps</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"> <i class='zmdi zmdi-collection-folder-image'></i></div>
                <div class="menu-title">Sample Pages</div>
            </a>
            <ul>
                <li><a href="pages-invoice.html"><i class="zmdi zmdi-dot-circle-alt"></i> Invoice</a></li>
                <li><a href="pages-user-profile.html"><i class="zmdi zmdi-dot-circle-alt"></i> User Profile</a>
                </li>
                <li><a href="pages-blank-page.html"><i class="zmdi zmdi-dot-circle-alt"></i> Blank Page</a></li>
                <li><a href="pages-coming-soon.html" target="_blank"><i class="zmdi zmdi-dot-circle-alt"></i>
                        Coming Soon</a></li>
                <li><a href="pages-403.html" target="_blank"><i class="zmdi zmdi-dot-circle-alt"></i> 403
                        Error</a></li>
                <li><a href="pages-404.html" target="_blank"><i class="zmdi zmdi-dot-circle-alt"></i> 404
                        Error</a></li>
                <li><a href="pages-500.html" target="_blank"><i class="zmdi zmdi-dot-circle-alt"></i> 500
                        Error</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:void();">
                <div class="parent-icon"><i class='fa fa-share'></i></div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li><a class="has-arrow" href="javascript:void();"><i class='zmdi zmdi-dot-circle-alt'></i>Level
                        One</a>
                    <ul>
                        <li><a class="has-arrow" href="#"><i class='zmdi zmdi-dot-circle-alt'></i>Level Two</a>
                            <ul>
                                <li><a href="#"><i class='zmdi zmdi-dot-circle-alt'></i>Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="menu-label">Labels</li>
        <li><a href="javascript:void();">
                <div class="parent-icon"><i class='zmdi zmdi-coffee'></i></div>
                <div class="menu-title">Important</div>
            </a></li>
        <li><a href="javascript:void();">
                <div class="parent-icon"><i class='zmdi zmdi-chart-donut'></i></div>
                <div class="menu-title">Warning</div>
            </a></li>
        <li><a href="javascript:void();"> -->
                <!-- <div class="parent-icon"><i class='zmdi zmdi-share'></i></div>
                <div class="menu-title">Information</div>
            </a></li>  -->
    </ul>

</div>
