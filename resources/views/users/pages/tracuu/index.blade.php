@extends('users.template.masters')
@push('title')
    Tra cứu đơn hàng
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
<div class="" style="margin-top: 50px ;margin-bottom: 150px">
    <div class="container">
     <div class="row">
        <a href="javascript: history.go(-1)" style="margin-top: -33px;margin-bottom: 10px; color: #075f5b;">Trở về</a>
         <div class="col-md-12">

             <h5 style="color: #075f5b;font-weight: bold;font-size: 20px;">Tra cứu đơn hàng <i> {{$ctdvc->dvc_madon}} </i></h5> 
             <table id="example" class="table table-striped table-bordered" style="width:120%">
                <thead>
                    <tr class="table_thead">    
                        {{-- <th>Thao tác</th> --}}
                        <th>Trạng thái</th>
                        <th>Hàng hóa</th>
                        <th>Kích thước</th>
                        <th>Khối lượng</th>
                        <th>Ngày lập</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($ctdvc))
                        {{-- @foreach ($ctdvc as $item) --}}
                            <tr>
                                {{-- <td>
                                    <a href="{{ route('kh-ql-don-hang-chi-tiet', ['id'=>$item->ctdvc_id]) }}" style="text-decoration:none; color:red"> Xem chi tiết</a>
                                </td> --}}
                                <td> 
                                    @if ($ctdvc->ctdvc_trangthaidon==0)
                                        <span class="badge badge-warning">Chờ duyệt</span>
                                    @elseif ($ctdvc->ctdvc_trangthaidon==1)
                                        <span class="badge badge-primary">Đã duyệt</span>
                                    @elseif ($ctdvc->ctdvc_trangthaidon==2)
                                        <span class="badge badge-info">Đang giao hàng</span>
                                    @elseif ($ctdvc->ctdvc_trangthaidon==3)
                                        <span class="badge badge-success">Đã giao</span>
                                    @elseif ($ctdvc->ctdvc_trangthaidon==4)
                                        <span class="badge badge-danger">Hủy đơn</span>
                                    @endif
                                </td>
                                <td> {{$ctdvc->hh_ten .' x '. $ctdvc->hh_soluong}} </td>
                                <td> {{$ctdvc->hh_kichthuoc}} </td>
                                <td> {{$ctdvc->hh_khoiluong}} Kg</td>
                                <td>{{ date('d-m-Y h:m:s', strtotime($ctdvc->dvc_ngaylap))}}</td>
                                <?php $str=explode(" ",$ctdvc->ctdvc_km)?>
                                {{-- <td> {{ number_format((int)$item->ctdvc_km * $item->hh_soluong * $item->hh_khoiluong * 30000)}} VNĐ</td> --}}
                            </tr>
                        {{-- @endforeach --}}
                    @else
                     <p><strong style="color: red">Không có đơn hàng nào!</strong></p>
                    @endif
                </tbody>
                    
            </table>
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