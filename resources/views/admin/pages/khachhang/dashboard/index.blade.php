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
                        <?php  $total=0;?>
                        @foreach ($dvc as $item)
                            @if ($item->ctdvc_trangthaidon ==3)
                            <?php $total+= (int)$item->ctdvc_km  * $item->hh_khoiluong * 30000 ;  ?>
                            @endif
                        @endforeach
                        <h4> {{ number_format($total)}} </h4>
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
                        <h4>  {{count($dvc)}} </h4>
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
                        <span class="state-title"> Tổng đơn đã giao </span>
                        <?php  $sended=0;?>
                        @foreach ($dvc as $item)
                            @if ($item->ctdvc_trangthaidon ==3)
                            <?php $sended++ ?>
                            @endif
                        @endforeach
                        <h4>{{$sended}}</h4>
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
                        <span class="state-title"> Tổng đơn đã hủy </span>
                        <?php  $sended=0;?>
                        @foreach ($dvc as $item)
                            @if ($item->ctdvc_trangthaidon ==4)
                            <?php $sended++ ?>
                            @endif
                        @endforeach
                        <h4>{{$sended}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        
    </div>
   
    
</div>
@endsection
@push('script')
    
@endpush