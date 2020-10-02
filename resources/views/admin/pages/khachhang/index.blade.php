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
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Bar Chart
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div id="graph-bar"></div>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Line Chart
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
            </header>
            <div class="panel-body">
                <div id="graph-line"></div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('scritt')
    
@endpush