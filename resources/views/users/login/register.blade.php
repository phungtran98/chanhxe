<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập |</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="image/png"  href="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="stylesheet" type="text/css" href="{{asset('client/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/line-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/line-awesome-font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('client/css/responsive.css')}}">
</head>


<body class="sign-in">
    <div id="bg"></div>
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo" style="margin-bottom: 0;">
                                    <img src=" {{asset('vendor/users/images/logo/1.png')}} " alt="" width="260px">
                                    <p id="title-logo">Hệ Thống Quản Lí Chành Xe</p>
                                </div>
                                <!--cm-logo end-->
                               
                            </div>
                            <!--cmp-info end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <li data-tab="tab-1" class="current"><a href="#" title="">Đăng nhập</a></li>
                                    <li data-tab="tab-2"><a href="#" title="">Đăng ký</a></li>
                                </ul>
                                <div class="sign_in_sec current" id="tab-1">
                                    <div class="signup-tab">
                                        <i class="fa fa-long-arrow-left"></i>
                                        <h2>Chọn nhóm người dùng</h2>
                                        <ul>
                                            <li data-tab="tab-3" class="current"><a href="#" title="">Khách Hàng</a></li>
                                            <li data-tab="tab-4"><a href="#" title="">Chành Xe</a></li>
                                        </ul>
                                    </div>
                                    <!--Phần này của nông dân-->
                                    <div class="dff-tab current" id="tab-3">
                                        {{-- xử lý nông dân nè --}}
                                        <form action="{{ route('login-khach-hang') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <button type="submit" value="submit">Đăng nhập</button>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </form>
                                    </div>
                                    <!--Phần này của thương lái-->
                                    <div class="dff-tab" id="tab-4">
                                        {{-- xử lý đăng nhập thương lái --}}
                                        <form method="post" action="">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Đăng nhập</button>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--dff-tab end-->
                                </div>
                                <!--sign_in_sec end-->
                                <div class="sign_in_sec" id="tab-2">
                                    <div class="signup-tab">
                                        <i class="fa fa-long-arrow-left"></i>
                                        <h2>Chọn nhóm người dùng</h2>
                                        <ul>
                                            <li data-tab="tab-5" class="current"><a href="#" title="">Khách Hàng</a></li>
                                            <li data-tab="tab-6"><a href="#" title="">Chành Xe</a></li>
                                        </ul>
                                    </div>
                                    <!--Phần này của nông dân-->
                                    <div class="dff-tab current" id="tab-5">
                                        {{-- FORM NÀY DÀNH CHO ĐĂNG KÝ Khách Hàng --}}
                                        <form method="post" action="">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="repeat-password"
                                                            placeholder="Nhập lại mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="nd_hoten" placeholder="Họ tên">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="nd_sdt" placeholder="Số điện thoại">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="nd_diachi" placeholder="Địa chỉ">
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Đăng ký</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Phần này của thương lái-->
                                    <div class="dff-tab" id="tab-6">
                                        {{-- FORM NÀY DÀNH CHO ĐĂNG KÝ Chành xe --}}
                                        <form action="" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="repeat-password"
                                                            placeholder="Nhập lại mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="tl_hoten" placeholder="Họ tên">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="tl_sdt" placeholder="Số điện thoại">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="tl_diachi" placeholder="Địa chỉ">
                                                        <i class="la la-globe"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Đăng ký</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--dff-tab end-->
                                </div>
                            </div>
                            <!--login-sec end-->
                        </div>
                    </div>
                </div>
                <!--signin-pop end-->
            </div>
            <!--signin-popup end-->
            <div class="footy-sec">
                <div class="container">
                    <ul>

                    </ul>
                </div>
            </div>
            <!--footy-sec end-->
        </div>
        <!--sign-in-page end-->


    </div>
    <!--theme-layout end-->



    <script type="text/javascript" src="{{asset('client/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/script.js')}}"></script>
</body>

</html>
