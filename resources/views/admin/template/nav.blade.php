{{-- <nav id="nav" class="nav-primary hidden-xs nav-vertical">
    <ul class="nav" data-spy="affix" data-offset-top="50">
      <li class="{{Request::path()== 'khach-hang/dashboard' ? 'active' : '' }}"><a href="{{ route('kh-dashboard') }}"><i class="fa fa-dashboard fa-lg"></i><span>Trang chủ</span></a></li>
       <li class="dropdown-submenu {{Request::path()== 'khach-hang/lap-don-hang' ? 'active' : '' }}">
          <a href="{{ route('kh-don-hang') }}"><i class="fa fa-th fa-lg"></i><span>Tạo đơn hàng</span></a> 
       </li>
       <li class="dropdown-submenu {{Request::path()== 'khach-hang/quan-li-don-hang' ? 'active' : '' }}">
          <a href="{{ route('kh-ql-don-hang') }}"><i class="fa fa-th fa-lg"></i><span>Quản lí đơn hàng</span></a> 
       </li>
       <li class="dropdown-submenu {{ Request::path()== 'khach-hang/tra-cuu-don-hang' ? 'active' : '' }}{{ Request::path()== 'khach-hang/tra-cuu-chanh-xe' ? 'active' : '' }}">
          <a ><i class="fa fa-list fa-lg"></i><span>Tra cứu</span></a> 
          <ul class="dropdown-menu {{Request::path()== 'khach-hang/' ? 'active' : '' }}">
             <li><a href="{{ route('kh-tra-cuu-don') }}" >Đơn hàng</a></li>
             <li><a href="{{ route('kh-tra-cuu-chanh-xe') }}">Chành xe trên địa bàn</a></li>
          </ul>
       </li>
       <li class="{{Request::path()== 'khach-hang/cai-dat' ? 'active' : '' }}"><a href="{{ route('kh-cai-dat') }}"><i class="fa fa-edit fa-lg"></i><span>Cài đặt tài khoản</span></a></li>
    </ul>
 </nav> --}}

 <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index-2.html"><img src="{{asset('vendor/admin/images/logo.png')}}" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index-2.html"><img src="{{asset('vendor/admin/images/logo_icon.png')}}" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            {{-- <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media   ">
                    <img alt="" src="{{asset('vendor/admin/images/photos/user-avatar.png')}}" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                  <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                  <li><a href="#"><i class="fa fa-sign-out"></i> <span></span></a></li>
                </ul>   
            </div> --}}

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                @if (auth::guard('khachhang')->check())
                    <li class="{{Request::path()== 'khach-hang/dashboard' ? 'active' : '' }}"><a href="{{ route('kh-dashboard') }}"><i class="fa fa-home"></i> <span>Trang chủ</span></a>
                    </li>
                    <li class="{{Request::path()== 'khach-hang/lap-don-hang' ? 'active' : '' }}"><a href="{{ route('kh-don-hang') }}"><i class="fa fa-home"></i> <span>Tạo đơn hàng</span></a>
                    </li>
                    <li class="{{Request::path()== 'khach-hang/quan-li-don-hang' ? 'active' : '' }}"><a href="{{ route('kh-ql-don-hang') }}"><i class="fa fa-home"></i> <span>Quản lí đơn hàng</span></a>
                    </li>
                    <li class="menu-list"><a href="#"><i class="fa fa-book"></i> <span>Tra cứu</span></a>
                        <ul class="sub-menu-list">
                            <li class="{{Request::path()== 'khach-hang/uoc-luong-chi-phi' ? 'active' : '' }}"><a href="{{ route('kh-uoc-luong-chi-phi') }}"> Ước lượng chi phí</a></li>
                            <li class="{{Request::path()== 'khach-hang/tra-cuu-chanh-xe' ? 'active' : '' }}"><a href="{{ route('kh-tra-cuu-chanh-xe') }}"> Tra cứu chành xe</a></li>
                            
                        </ul>
                    </li>
                    <li><a href=""><i class="fa fa-sign-in"></i> <span>Đăng xuất</span></a></li>
                @endif

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>