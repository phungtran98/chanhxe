<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chành xe | Admin</title>
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
                            
                            <div class="login-sec">
                                <ul class="sign-control">
                                    <a class="btn btn-default" href="{{ route('dang-nhap') }}" style="color: white;background: #075f5b">Trở về</a>
                                </ul>
                                <div class="sign_in_sec current" id="tab-1">
                                    <div class="signup-tab">
                                        <h2 style="font-family: sans-serif">Admin</h2>
                                        
                                    </div>
                                    <!--Phần đăng nhập này của khách hàng-->
                                    <div class="dff-tab current" id="tab-3">
                                        {{-- xử lý khách hàng --}}
                                        <form action="{{ route('login-admin') }}" method="post">
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
