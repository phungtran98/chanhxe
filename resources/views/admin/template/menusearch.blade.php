<div class="header-section">

    <!--toggle button start-->
    <a class="toggle-btn"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->

    <!--search start-->
    {{-- <form class="searchform" action="" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm..." />
    </form> --}}
    <!--search end-->

    <!--notification menu start -->
    <div class="menu-right">
        <ul class="notification-menu">
           @if (auth::guard('chanhxe')->check())
           <li>
            <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="badge" id="SoThongbao">  {{count($Neworder)}} </span>
            </a>
            <div class="dropdown-menu dropdown-menu-head pull-right">
                <h5 class="title">Thông báo</h5>
                <ul class="dropdown-list normal-list" id="NoiDungThongBao">
                  @foreach ($Neworder as $item)
                    <li class="new">
                        <a href="{{ route('cx-ql-don-hang-thong-bao', ['ctdvc_id'=>$item->ctdvc_id,'dvc_id'=>$item->dvc_id]) }}" >
                            <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                            <span class="name">Đơn mới từ <strong> {{$item->kh_hoten}} </strong></span>
                            <em class="small"> {{\Carbon\Carbon::parse($item->dvc_ngaylap)->diffForHumans($thoigianhientai) }} </em>
                        </a>
                    </li>
                  @endforeach
                </ul>
            </div>
        </li>
           @endif
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
                        @if (Auth::guard('chanhxe')->user()->cx_hinhanh == null)
                        <img src="{{asset('upload/khachhang/user-placeholder.png')}}" alt="" > 
                        @endif
                        <img src="{{asset('upload/chanhxe/'.Auth::guard('chanhxe')->user()->cx_hinhanh)}}" alt="" />
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