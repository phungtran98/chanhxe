<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="{{ route('trang-chu-khach-hang') }}">
                                    <img src="{{asset('vendor/users/images/logo/3.png')}}" alt="" >
                                    {{-- <span>Chành Xe</span> --}}
                                </a>
                            </div>
                        </div>
                        <div class="col-xl col-lg">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('trang-chu-khach-hang') }}" class="active" href="index.html">Trang chủ</a></li>
                                        <li><a href="#">Dịch vụ</a></li>
                                        <li><a href="#">Tin tức <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                    <li><a href="#">a</a></li>
                                                    <li><a href="#">b</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Liên hệ</a></li>
                                        <li><a href="contact.html">Tìm kiếm</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 d-none d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="number">
                                    <p> <i class="fa fa-phone"></i> HotLine: 1900 1900</p>
                                </div>
                                <div class="social_links d-none d-xl-block">
                                    <ul>
                                        @if (Auth::guard('khachhang')->check())
                                            <li><a href="{{ route('kh-dashboard') }}" ><i class="fa fa-user"></i>&nbsp; {{Auth::guard('khachhang')->user()->kh_hoten}} </a></li>
                                            <li><a href="{{ route('logout-khachhang') }}" ><i class="fa fa-sign-out"></i>&nbsp; Đăng xuất</a></li>
                                        @elseif(Auth::guard('chanhxe')->check())
                                        {{-- <li><a href="{{ route('cx-dashboard') }}" ><i class="fa fa-user"></i> {{Auth::guard('chanhxe')->user()}}</a></li> --}}
                                        <li><a href="{{ route('logout-chanhxe') }}" ><i class="fa fa-sign-out"></i>&nbsp; Đăng xuất</a></li>
                                        @else

                                        <li><a href="{{ route('dang-nhap') }}" ><i class="fa fa-sign-in"></i> &nbsp;Đăng nhập</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </div> --}}
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

 
</header>