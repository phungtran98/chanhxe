<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chành xe | Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href=" {{asset('vendor/users/images/logo/1.png')}} " type="image/png">
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
    <style>
        .mystyle {
            border: 1px solid #f90b0b;
        }
        .mystyle1 {
            border: 1px solid yellow;
        }
    </style>
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
                                    <img src=" {{asset('vendor/users/images/logo/1.png')}} " alt="" width="240px">
                                    <p style="font-size: 24px;font-weight: 700;line-height: 38px;color: #007d74;font-family: inherit;float: left;width: 140%;text-align: center;text-transform: uppercase;margin-left: -37px;
                                    ">Nền tảng thông tin PQ logistic Kết nối thông minh các chành xe và khách hàng trực tuyến</p>
                                </div>
                                <!--cm-logo end-->
                               
                            </div>
                            <!--cmp-info end-->
                        </div>
                        <div class="col-lg-6">
                            @if (Session::has('kiemtra'))
                                <div style="position: absolute;left: -21px;top: 24px;" class="alert alert-danger" role="alert">
                                    {{Session::get('kiemtra') }}
                                </div>
                            @endif
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
                                    <!--Phần đăng nhập này của khách hàng-->
                                    <div class="dff-tab current" id="tab-3">
                                        {{-- xử lý khách hàng --}}
                                        <form action="{{ route('login-khach-hang') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="username" placeholder="Tên đăng nhập" id="KHusername">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Mật khẩu" id="KHpassword">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <button type="submit" value="submit" id="KHsubmit" >Đăng nhập</button>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </form>
                                    </div>
                                    <!--Phần  đăng nhập này của chành xe-->
                                    <div class="dff-tab" id="tab-4">
                                        {{-- xử lý đăng nhập chành xe --}}
                                        <form method="post" action="{{ route('login-chanhxe') }}">
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
                                    <a href=" {{ route('login-admin-index') }} ">Đăng nhập bằng tài khoản Admin</a>
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
                                  
                                    <!--Phần này của khách hàng-->
                                    <div class="dff-tab current" id="tab-5">
                                        {{-- FORM NÀY DÀNH CHO ĐĂNG KÝ Khách Hàng --}}
                                        <form method="post" action="{{ route('register-khachhang') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="kh_hoten" placeholder="Họ tên" >
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="kh_username" placeholder="Tên đăng nhập" >
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="kh_password" placeholder="Mật khẩu" >
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="repeat-password" id="repeat-password" onkeyup="checkpass()"
                                                            placeholder="Nhập lại mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Đăng ký</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Phần này của chành xe-->
                                    <div class="dff-tab" id="tab-6">
                                        {{-- FORM NÀY DÀNH CHO ĐĂNG KÝ Chành xe --}}
                                        <form action="{{ route('register-chanhxe') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="cx_hoten" placeholder="Họ tên chủ chành xe">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                    <div class="sn-field">
                                                        <input type="text" name="cx_tenchanhxe" placeholder="Tên chành xe">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="cx_username" placeholder="Tên đăng nhập">
                                                        <i class="la la-user"></i>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="cx_password" id="password" placeholder="Mật khẩu">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="repeat-password"
                                                            placeholder="Nhập lại mật khẩu" id="repeat-password" onkeyup="checkpass()">
                                                        <i class="la la-lock"></i>
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
    <script>
      $(document).ready(function () {

      });
    </script>
</body>

</html>
