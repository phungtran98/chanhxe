@extends('admin.template.masters')
@section('title')
    | Quản lí đơn hàng
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Quản lí đơn hàng</a>
    </li>
@endsection
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
<?php $i=1?>
<div class="row">
    <div class="col-md-12">
        <h4  style="color: #075f5b;font-weight: bold;font-size: 26px;text-align: center;margin-top: -16px;margin-bottom: 30px;">Danh sách đơn hàng</h4>
    </div>
    <div class="col-md-12" style="overflow-x: scroll">
        <form action="{{ route('kh-ql-don-tim-kiem') }}" method="post" name="KHDHTK">
            @csrf
           <div class="col-md-3">
               <div class="form-group">
                   <select class="form-control" name="loc_trangthai" id="loc_trangthai">
                       <option disabled selected> --- Lọc trạng thái đơn --- </option>
                       <option value="0">Chờ duyệt</option>
                       <option value="1">Đã duyệt</option>
                       <option value="2">Đang giao hàng</option>
                       <option value="3">Đã giao</option>
                       <option value="4">Hủy đơn</option>
                   </select>
               </div>
           </div>
           {{-- <div class="col-md-3">
               <button type="submit" class="btn btn-success">Lọc trạng thái đơn</button>
           </div> --}}
        </form>
        <form action="{{ route('kh-ql-don-tim-kiem-noi-dung') }}" method="post" name="Form_content">
            @csrf
            <div class="col-md-2">
                <div class="form-group">
                  <select class="form-control" name="kh_luachon" id="">
                      <option value="nguoigui" selected>Người gửi</option>
                      <option value="nguoinhan" >Người nhận</option>
                      <option value="hanghoa" >Hàng hóa</option>
                      
                  </select>
                </div>
            </div>
           <div class="col-md-2">
               <div class="form-group">
                 <input type="text"
                   class="form-control" name="kh_content" id="" style="margin-left: -30px"  placeholder="Từ khóa tìm kiếm...">
               </div>
           </div>
        </form>
        <form action="{{ route('kh-ql-don-tim-kiem-ngay-lap') }}" method="post" name="Form_Date">
            @csrf
           <div class="col-md-2">
               <table style="width:100%">
                   <tr >
                       <td > <input  type="date" id="BDate" class="form-control" name="BDate" placeholder="Ngày bắt đầu" /></td>
                       <td> Đến  </td>
                       <td><input  type="date"  id="EDate" class="form-control" name="EDate" placeholder="Ngày kết thúc" /></td>
                   </tr>
               </table>
            </div>
        </form>
            <table id="example" class="table table-striped table-bordered" style="width:120%">
                <thead>
                    <tr class="table_thead">    
                        <th>Thao tác</th>
                        <th>Trạng thái</th>
                        <th>Người gửi</th>
                        <th>Người nhận</th>
                        <th>Đơn vị vận chuyển</th>
                        <th>Hàng hóa</th>
                        <th>Kích thước</th>
                        <th>Khối lượng</th>
                        <th>Ngày lập</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($ctdvc))
                        @foreach ($ctdvc as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('kh-ql-don-hang-chi-tiet', ['id'=>$item->ctdvc_id]) }}" style="text-decoration:none; color:red"> Xem chi tiết</a>
                                </td>
                                <td> 
                                    @if ($item->ctdvc_trangthaidon==0)
                                        <span class="badge badge-warning">Chờ duyệt</span>
                                    @elseif ($item->ctdvc_trangthaidon==1)
                                        <span class="badge badge-primary">Đã duyệt</span>
                                    @elseif ($item->ctdvc_trangthaidon==2)
                                        <span class="badge badge-info">Đang giao hàng</span>
                                    @elseif ($item->ctdvc_trangthaidon==3)
                                        <span class="badge badge-success">Đã giao</span>
                                    @elseif ($item->ctdvc_trangthaidon==4)
                                        <span class="badge badge-danger">Hủy đơn</span>
                                    @endif
                                </td>
                                <td> {{$item->kh_hoten}} </td>
                                <td> {{$item->ctdvc_hotennhan}} </td>
                                <td> <strong>{{$item->cx_tenchanhxe}}</strong></td>
                                <td> {{$item->hh_ten .' x '. $item->hh_soluong}} </td>
                                <td> {{$item->hh_kichthuoc}} </td>
                                <td> {{$item->hh_khoiluong}} Kg</td>
                                <td>{{ date('d-m-Y h:m:s', strtotime($item->dvc_ngaylap))}}</td>
                                <?php $str=explode(" ",$item->ctdvc_km)?>
                                {{-- <td> {{ number_format((int)$item->ctdvc_km * $item->hh_soluong * $item->hh_khoiluong * 30000)}} VNĐ</td> --}}
                            </tr>
                        @endforeach
                    @else
                    <p><strong style="color: red">Không có đơn hàng nào!</strong></p>
                    @endif
                </tbody>
                    
            </table>
    </div>
    <div class="col-md-6">
        @if ( Request::segment(3) == 'tim-kiem-trang-thai')
            <p style="font-size: 23px;margin-top: 20px;font-weight: bold;color: red;font-style: italic;"> Tìm thấy  {{count($ctdvc)}}  kết quả</p>
        @endif
        @if ( Request::segment(3) == 'tim-kiem-noi-dung')
            <p style="font-size: 23px;margin-top: 20px;font-weight: bold;color: red;font-style: italic;"> Tìm thấy  {{count($ctdvc)}}  kết quả</p>
        @endif
        @if ( Request::segment(3) == 'tim-kiem-ngay-lap')
            <p style="font-size: 23px;margin-top: 20px;font-weight: bold;color: red;font-style: italic;"> Tìm thấy  {{count($ctdvc)}}  kết quả</p>
        @endif
     </div>
</div>
@endsection
@push('script')

<script>
    $(function () {
        'use strict';
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#timeCheckIn').datepicker({
            onRender: function (date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#timeCheckOut')[0].focus();
        }).data('datepicker');
        var checkout = $('#timeCheckOut').datepicker({
            onRender: function (date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function (ev) {
            checkout.hide();
        }).data('datepicker');
    });
</script>
<script>


    $('#loc_trangthai').on('change', function() {
            document.forms['KHDHTK'].submit();
        });
    $('#EDate').on('change', function() {

        var d1 = $('#BDate').val();
        var d2 = $('#EDate').val();
        if(new Date(d1) > new Date(d2))
        {
            alert('Lỗi ngày! Bạn hãy nhập ngày lại');
            $('#BDate').val('');
            $('#EDate').val('');
        }else
        {
             document.forms['Form_Date'].submit();
        }

           
        });
</script>
@endpush