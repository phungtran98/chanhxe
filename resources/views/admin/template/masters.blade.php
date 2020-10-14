<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminex.themebucket.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Sep 2018 06:51:16 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href=" {{asset('vendor/users/images/logo/1.png')}} " type="image/png">
    <style>
        .star-red{
            color:red;
        }
    </style>
  <title> Dashboard @yield('title')</title>
  @include('admin.template.css')
  @stack('css')
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    @include('admin.template.nav')
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        @include('admin.template.menusearch')
        <!-- header section end-->


         <!-- page heading start-->
         <div class="page-heading">
            <ul class="breadcrumb">
                <li>
                    <a href="#">Trang chủ</a>
                </li>
                @yield('breadcrumb')
               
            </ul>
        </div>
        <!-- page heading end-->
        <!--body wrapper start-->
        <div class="wrapper">
            @yield('content')
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

@include('admin.template.js')

@stack('script')
</body>

<!-- Mirrored from adminex.themebucket.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Sep 2018 06:51:54 GMT -->
</html>
