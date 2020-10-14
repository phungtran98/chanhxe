<div class="header-section">

    <!--toggle button start-->
    <a class="toggle-btn"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->

    <!--search start-->
    <form class="searchform" action="" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm..." />
    </form>
    <!--search end-->

    <!--notification menu start -->
    <div class="menu-right">
        <ul class="notification-menu">
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right">
                    <h5 class="title">G-mail  </h5>
                    <ul class="dropdown-list normal-list">
                        <li class="new">
                            <a href="#">
                                {{-- <span class="thumb"><img src="images/photos/user1.png" alt="" /></span> --}}
                                <span class="desc">
                                  <span class="name">John Doe <span class="badge badge-success">new</span></span>
                                  <span class="msg">Lorem ipsum dolor sit amet...</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right">
                    <h5 class="title">Thông báo</h5>
                    <ul class="dropdown-list normal-list">
                        <li class="new">
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <span class="name">Server #1 overloaded.  </span>
                                <em class="small">34 mins</em>
                            </a>
                        </li>
                </div>
            </li>
            <li>
                @if (auth::guard('khachhang')->check())
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        @if (Auth::guard('khachhang')->user()->kh_hinhanh == null)
                        <img src="{{asset('upload/khachhang/user-placeholder.png')}}" alt="" > 
                        @endif
                        <img src="{{asset('upload/khachhang/'.Auth::guard('khachhang')->user()->kh_hinhanh)}}" alt="" />
                        {{Auth::guard('khachhang')->user()->kh_hoten}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="{{ route('kh-cai-dat') }}"><i class="fa fa-cog"></i>  Cài đặt</a></li>
                        @if (Auth::guard('chanhxe')->check())
                        <li><a href="{{ route('logout-chanhxe') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                        @elseif(Auth::guard('khachhang')->check())
                        <li><a href="{{ route('logout-khachhang') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                        @endif
                    </ul>
                @elseif(auth::guard('chanhxe')->check())
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        @if (Auth::guard('chanhxe')->user()->kh_hinhanh == null)
                        <img src="{{asset('upload/khachhang/user-placeholder.png')}}" alt="" > 
                        @endif
                        <img src="{{asset('upload/chanhxe/'.Auth::guard('chanhxe')->user()->kh_hinhanh)}}" alt="" />
                        {{Auth::guard('chanhxe')->user()->cx_hoten}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="{{ route('kh-cai-dat') }}"><i class="fa fa-cog"></i>  Cài đặt</a></li>
                        @if (Auth::guard('chanhxe')->check())
                        <li><a href="{{ route('logout-chanhxe') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                        @elseif(Auth::guard('khachhang')->check())
                        <li><a href="{{ route('logout-khachhang') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                        @endif
                    </ul>
                @endif
            </li>

        </ul>
    </div>
    <!--notification menu end -->
</div>