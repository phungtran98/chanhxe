@extends('users.template.masters')
@push('title')
    Ước tính cước phí
@endpush
@push('css')
    <style>
       
        .table_thead{
    background: #075f5b;
    color: white;
}

tr.table_thead> th {
    text-align: center;
}
    </style>
@endpush
@section('content')
@include('users.template.slider')   
<div class="popular_places_area">
    <div class="container">
        
        <div class="row justify-content-center" style="margin-top:-100px ">
            
            <div class="col-lg-6">
                <a href="javascript: history.go(-1)" style=" color: #075f5b; margin-left:-300px">Trở về</a>
                <div class="section_title text-center ">
                    <h3 style="margin-bottom: 23px;/* margin-left: 4px; */color: #075f5b;font-weight: bold;font-size: 26px;text-align: center;margin-top: -10px;">Tra cứu tuyến</h3>
                </div>
            </div>
        </div>
        <div class="row">
            
            @foreach ($chanhxe as $item)
                @if($item->active !=0)
                <div class="col-lg-3 ">
                    <div class="single_place">
                        <div class="thumb">
                            <img src="{{asset('upload/chanhxe/tai7.png')}}" alt="">
                        </div>
                        <div class="place_info">
                            {{-- <a href="{{ route('kh-thong-tin-chanh-xe', ['id'=>$item->cx_id]) }}"><h3>{{$item->cx_tenchanhxe}}</h3></a> --}}
                            <a href="{{ route('chi-tiet-chanh-xe', ['id'=>$item->cx_id]) }}"><h4>{{$item->cx_tenchanhxe}}</h4></a>
                            <p>Việt Nam</p>
                            <div class="rating_days d-flex justify-content-between">
                                <span class="d-flex justify-content-center align-items-center">
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i> 
                                     <i class="fa fa-star"></i>
                                     <?php $i=0;?>
                                     @foreach ($binhluan as $bl)
                                     <a href="#">
                                        @if ($item->cx_id == $bl->cx_id)
                                            <?php $i++;?>
                                        @endif
                                    </a>
                                     @endforeach
                                     <a href="#"> {{$i}} Đánh giá </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4 style="color: #075f5b;"><span style="color: red">{{count($chanhxe)}}</span> kết quả được tìm thấy!</h4>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
    <script>
        // alert('ok');
    </script>
@endpush