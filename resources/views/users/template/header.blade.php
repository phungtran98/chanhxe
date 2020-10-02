<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="">
                                    <img src="{{asset('vendor/users/images/logo/1.png')}}" alt="" style="width:80; height: 80px;">
                                    {{-- <span>Chành Xe</span> --}}
                                </a>
                            </div>
                        </div>
                        <div class="col-xl col-lg">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">Trang chủ</a></li>
                                        <li><a href="about.html">Dịch vụ</a></li>
                                        <li><a href="#">Tin tức <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                    <li><a href="destination_details.html">a</a></li>
                                                    <li><a href="elements.html">b</a></li>
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
                                        <li><a href="{{ route('dang-nhap') }}" ><i class="fa fa-user"></i> Đăng nhập</a></li>
                                        
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