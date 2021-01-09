<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href=" {{asset('vendor/users/images/logo/1.png')}} " type="image/png">
    <title>Chành Xe |@stack('title')</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->
   
    <!-- CSS here -->
    @include('users.template.css')
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    @stack('css')
</head>

<body style="font-family: arial,sans-serif">
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
  @include('users.template.header')
    <!-- header-end -->

    <!-- slider_area_start -->
    {{-- @include('users.template.slider') --}}
    <!-- slider_area_end -->

    <!-- where_togo_area_start  -->
  
    <!-- where_togo_area_end  -->
    
    <!-- popular_destination_area_start  -->
    @yield('content')


   @include('users.template.footer')

  <!-- Modal -->
  <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="serch_form">
            <input type="text" placeholder="Search" >
            <button type="submit">search</button>
        </div>
      </div>
    </div>
  </div>
    <!-- link that opens popup -->

   @include('users.template.js')
   @stack('script')
</body>

</html>