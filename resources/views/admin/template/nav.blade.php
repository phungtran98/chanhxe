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

                {{-- khách hàng --}}
                @if (auth::guard('khachhang')->check())
                    <li class="{{Request::path()== 'khach-hang/dashboard' ? 'active' : '' }}"><a href="{{ route('kh-dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="{{Request::path()== '/' ? 'active' : '' }}"><a href="{{ route('trang-chu-khach-hang') }}"><i class="fa fa-home"></i> <span>Trang chủ</span></a>
                    </li>
                    {{-- <li class="{{Request::path()== 'khach-hang/lap-don-hang' ? 'active' : '' }}"><a href="{{ route('kh-don-hang') }}"><i class="fa fa-list-alt"></i> <span>Lập đơn hàng</span></a> --}}
                    </li>
                    <li class="{{Request::path()== 'khach-hang/quan-li-don-hang' ? 'active' : '' }}"><a href="{{ route('kh-ql-don-hang') }}"><i class="fa fa-indent"></i> <span>Quản lí đơn hàng</span></a>
                    </li>
                    {{-- <li class="menu-list"><a href="#"><i class="fa fa-search"></i> <span>Tra cứu</span></a>
                        <ul class="sub-menu-list">
                            <li class="{{Request::path()== 'khach-hang/uoc-luong-chi-phi' ? 'active' : '' }}"><a href="{{ route('kh-uoc-luong-chi-phi') }}"> Ước lượng chi phí</a></li>
                            <li class="{{Request::path()== 'khach-hang/tra-cuu-chanh-xe' ? 'active' : '' }}"><a href="{{ route('kh-tra-cuu-chanh-xe') }}"> Tra cứu chành xe</a></li>
                        </ul>
                    </li> --}}
                    <li class="{{Request::path()== 'khach-hang/cai-dat' ? 'active' : '' }}" ><a href="{{ route('kh-cai-dat') }}"><i class="fa fa-cog"></i>  Cài đặt</a></li>
                    <li class="{{Request::path()== 'khach-hang/dang-xuat-khach-hang' ? 'active' : '' }}" ><a href="{{ route('logout-khachhang') }}"><i class="fa fa-sign-in"></i> <span>Đăng xuất</span></a></li>

                {{-- Chành xe --}}
                @elseif(auth::guard('chanhxe')->check())
                    <li class="{{Request::path()== 'chanh-xe/dashboard' ? 'active' : '' }}"><a href="{{ route('cx-dashboard') }}"><i class="fa fa-home"></i> <span>Trang chủ</span></a>
                    </li>
                    <li class="{{Request::path()== 'chanh-xe/tuyen-xe' ? 'active' : '' }}"><a href="{{ route('cx-tuyen-xe') }}"><i class="fa fa-arrows-alt"></i> <span>Quản lí tuyến</span></a>
                    </li>
                    <li class="{{Request::path()== 'chanh-xe/tai-xe' ? 'active' : '' }}"><a href="{{ route('cx-tai-xe') }}"><i class="fa fa-user"></i> <span>Quản lí tài xế</span></a>
                    </li>
                    <li class="{{Request::path()== 'chanh-xe/cx-xe' ? 'active' : '' }}"><a href="{{ route('cx-xe') }}"><i class="fa fa-truck"></i><span>Quản lí xe</span></a>
                    </li>
                    <li class="{{Request::path()== 'chanh-xe/quan-li-don-dat-hang' ? 'active' : '' }}"><a href="{{ route('cx-quan-li-don-dat-hang') }}"><i class="fa fa-list-alt"></i> <span>Quản lí đơn đặt hàng</span></a>
                    </li>
                    <li class="{{Request::path()== 'chanh-xe/quan-li-khach-hang' ? 'active' : '' }}"><a href="{{ route('cx-quan-li-khach-hang') }}"><i class="fa fa-user"></i> <span>Quản lí khách hàng</span></a>
                    </li>
                    <li class="{{Request::path()== 'chanh-xe/chanh-xe/thong-ke-don-hang' ? 'active' : '' }}"><a href="{{ route('cx-thong-ke-don') }}"><i class="fa fa-bar-chart-o"></i> <span>Thống kê đơn - doanh thu</span></a>
                    <li class="{{Request::path()== 'chanh-xe/chanh-xe/thong-ke-don-hang' ? 'active' : '' }}"><a href="{{ route('cx-xem-hoa-don') }}"><i class="fa fa-bar-chart-o"></i> <span>Hóa đơn</span></a>
                    </li>
                    <li class="menu-list"><a href=""><i class="fa fa-cogs"></i> <span>Cài đặt</span></a>
                        <ul class="sub-menu-list">
                            <li class="{{Request::path()== 'chanh-xe/cai-dat/thong-tin-chanh-xe' ? 'active' : '' }}"><a href="{{ route('cx-cai-dat') }}"> Thông tin Chành Xe</a></li>
                            <li class="{{Request::path()== 'chanh-xe/cai-dat/doi-mat-khau' ? 'active' : '' }}"><a href="{{ route('cx-doi-mat-khau') }}"> Đổi mật khẩu</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="{{ route('logout-chanhxe') }}"><i class="fa fa-sign-in"></i> <span>Đăng xuất</span></a></li>
                {{-- Admin --}}
                @elseif(auth::guard('admin')->check())
                    <li class=""><a href="{{ route('admin-dashboard') }}"><i class="fa fa-home"></i> <span>Trang chủ</span></a>
                    </li>
                    <li class=""><a href="{{ route('admin-ds-chanh-xe') }}"><i class="fa fa-home"></i> <span>Danh sách chành xe</span></a>
                    </li>
                    <li class=""><a href="{{ route('admin-gia-cuoc') }}"><i class="fa fa-home"></i> <span>Cập nhật giá cước</span></a>
                    </li>
                    <li class=""><a href="{{ route('admin-thong-ke') }}"><i class="fa fa-home"></i> <span>Thống kê doanh thu</span></a>
                    </li>
                    
                    
                    <li><a href="{{ route('logout-admin') }}"><i class="fa fa-sign-in"></i> <span>Đăng xuất</span></a></li>
                @endif

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>