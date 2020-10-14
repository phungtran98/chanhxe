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
                        <span class="state-title"> Tổng đơn hàng</span>
                        <h4>01</h4>
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
                        <span class="state-title"> Số đơn đã giao</span>
                        <h4>0</h4>
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
                        <span class="state-title">  Số đơn bị hủy  </span>
                        <h4>0</h4>
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
                        <span class="state-title">  Số đơn chờ duyệt  </span>
                        <h4>0</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    
@endpush