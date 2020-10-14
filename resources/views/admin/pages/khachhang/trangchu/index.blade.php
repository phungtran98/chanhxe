@extends('admin.template.masters')
@section('title')
    | Trang chủ
@endsection
@push('css')
    
@endpush
@section('content')
<div class="row states-info">
    <div class="col-md-3">
        <div class="panel red-bg">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="col-xs-8">
                        <span class="state-title"> Tổng tiền đã gửi hàng </span>
                        <h4>$ 23,232</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel blue-bg">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-tag"></i>
                    </div>
                    <div class="col-xs-8">
                        <span class="state-title">  Tổng đơn hàng  </span>
                        <h4>2,980</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel green-bg">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-gavel"></i>
                    </div>
                    <div class="col-xs-8">
                        <span class="state-title"> Bưu kiện đang gửi </span>
                        <h4>5980</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel yellow-bg">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div class="col-xs-8">
                        <span class="state-title">  Số lượng khách hàng  </span>
                        <h4>10,000</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{-- <h4 class="text-center">Chành Xe</h4> --}}
    </div>
    @foreach ($chanhxe as $item)
        <div class="col-md-4 max-height-cx">
             <div class="panel widget-info-one">
                <div class="avatar-img">
                    <a href="{{ route('kh-thong-tin-chanh-xe', ['id'=>$item->cx_id]) }}"><img src="{{asset('vendor/admin/images/gallery/image3.jpg')}}" alt=""/></a>
                </div>
                <div class="inner">
                    <div class="avatar"><a href="{{ route('kh-thong-tin-chanh-xe', ['id'=>$item->cx_id]) }}"><img alt="" src="{{asset('vendor/admin/images/photos/userprofile.png')}}"></a></div>
                    <h5> {{$item->cx_tenchanhxe}}</h5>
                    <span class="subtitle">
                        Praesent magna nunc, tincidunt pretium.
                    </span>
                </div>
                <div class="panel-footer">
                    <ul class="post-view">
                        <li>
                            <a href="{{ route('kh-thong-tin-chanh-xe', ['id'=>$item->cx_id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            109
                        </li>
                        <li class="active">
                            <a href="{{ route('kh-thong-tin-chanh-xe', ['id'=>$item->cx_id]) }}">
                                <i class="fa fa-comment"></i>
                            </a>
                            233
                        </li>
                        <li>
                            <a href="{{ route('kh-thong-tin-chanh-xe', ['id'=>$item->cx_id]) }}">
                                <i class="fa fa-star"></i>
                            </a>
                            3.5/5
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    
</div>
@endsection
@push('scritt')
    
@endpush