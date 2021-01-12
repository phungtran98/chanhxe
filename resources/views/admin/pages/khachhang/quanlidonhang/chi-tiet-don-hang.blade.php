@extends('admin.template.masters')
@section('title')
    | Quản lí đơn hàng
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Quản lí đơn hàng</a>
    </li>
    <li>
        <a href="#" class="active">Thông tin chi tiết đơn hàng</a>
    </li>
@endsection
@push('css')
<style>
.dh_detail {
    box-shadow: 1px 3px 5px 3px #cecccc;
    background: white;
    margin-left: 30px;
    height: 850px;
}

.content-detail {
    margin: 16px;
}

.content-detail > p {
    font-size:15px;
}
p._title_send {
    color: #00857f;
    font-weight: bold;
    text-transform: initial;
    font-size: 18px;
}
._float_right{
    float:right;
}
._float_right_color{
    color: #6dc5a3;
    font-size: 15px;
    font-weight: 700;
}
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12" style="margin-bottom:10px">
        <h4  style="float: left;margin-left: 63px;color: #075f5b;font-weight: bold;">Thông tin chi tiết đơn hàng</h4>
        <a onclick="return XoaDonHang()" href="{{ route('kh-ql-don-hang-xoa', ['id'=>$ctdvc->ctdvc_id]) }}" class="btn btn-danger" style="float: right;margin-left: 10px;margin-right: 60px;"  >Xóa đơn</a>
        <a href="#" id="HuyDon" class="btn " style="float: right;background: #424f63;color: white;margin: 0 10px;" data-donhang="{{$ctdvc->ctdvc_id}} ">Hủy đơn</a>
        <a href="#" class="btn btn-success" style="float: right" id="ClickSendVNPAY">Thanh Toán Cước Phí</a>
        <form action=" {{ route('kh-thanh-toan-cuoc') }}" method="post" id="SendVNPAY">
            @csrf

            <input type="hidden" name="cuocphi"  value="{{(int)$ctdvc->ctdvc_km  * $ctdvc->hh_khoiluong * $cuoc}}">
            <input type="hidden" name="ctdvc_id" id="chiTietDonHang" value="{{$ctdvc->ctdvc_id}}">
        </form>
    </div>
    
    <div class="col-md-5 dh_detail" style="margin-left: 80px">
        <div class="content-detail">
            <p>Mã đơn hàng: <span class="_float_right">  {!! QrCode::size(90)->color(7, 95, 91)->generate($ctdvc->dvc_madon) !!}  </span></p>
            <p style="color:black;font-size: 26px;font-weight: 600;font-style: italic;margin-top: 28px;"> {{$ctdvc->dvc_madon}} </p>
            <p style="margin-top: 40px;">Ngày tạo: <span class="_float_right">{{ date('d-m-Y h:m:s', strtotime($ctdvc->dvc_ngaylap))}}</span></p>
            <p>Trạng thái: <span class="_float_right" id="insert_status">
                @if ($ctdvc->ctdvc_trangthaidon==0)
                    <span class="badge badge-warning">Chờ duyệt</span>
                @elseif ($ctdvc->ctdvc_trangthaidon==1)
                    <span class="badge badge-primary">Đã duyệt</span>
                @elseif ($ctdvc->ctdvc_trangthaidon==2)
                    <span class="badge badge-primary">Đang giao</span>
                @elseif ($ctdvc->ctdvc_trangthaidon==3)
                    <span class="badge badge-primary">Đã giao</span>
                @elseif ($ctdvc->ctdvc_trangthaidon==4)
                    <span class="badge badge-danger">Đã hủy đơn</span>
                @endif
            </span></p>
            <p>Đơn vị vận chuyển <span class="_float_right _float_right_color"> {{$ctdvc->cx_tenchanhxe}} </span></p>
            <p>Quãng đường dự kiến  <span class="_float_right"> {{$ctdvc->ctdvc_km}} Km</span></p>
            <p>Thời gian dự Kiến: <span class="_float_right"> {{$ctdvc->ctdvc_thoigian}} </span></p>
            <hr>


            <p class="_title_send">Người gửi</p>
            <p><strong> {{$ctdvc->kh_hoten}}</strong></p>
            <p>Địa chỉ <span class="_float_right"> <strong>{{$ctdvc->kh_diachi}}</strong> </span></p>
            <br>
            <p>Số điện thoại <span class="_float_right">{{$ctdvc->kh_sdt}}</span></p>
            <hr>
            <p class="_title_send">Hình ảnh hàng hóa</p>
            <p>
                {{-- {{dd($hinhanh)}} --}}
                @if ($hinhanh == [])
                    <strong>Không có hình!</strong>
                @endif
                @foreach ($hinhanh as $hinh)
                    <img src=" {{asset('upload/khachhang/hanghoa/').'/'.$hinh->hhhh_hinhanh}} " alt="" style="width:40%; margin:10px">
                @endforeach
            </p><hr>
            <p class="_title_send">Tiền thu hộ</p>
            <p>Tổng tiền thu hộ<span class="_float_right _float_right_color">{{number_format($ctdvc->hh_tienthuho)}} vnđ</span></p>
            
        </div>
    </div>
    <div class="col-md-5 dh_detail"  >
        <div class="content-detail">
            <p class="_title_send">Người nhận</p>
            <p><strong> {{$ctdvc->ctdvc_hotennhan}}</strong></p>
            <p>Địa chỉ <span class="_float_right"> <strong>{{$ctdvc->ctdvc_diachinhan}}</strong>  </span></p>
            <br>
            <p>Số điện thoại <span class="_float_right">{{$ctdvc->ctdvc_sdtnhan}}</span></p>
            <hr>
            <p class="_title_send">Thông tin hàng hóa</p>
            <p>Tên hàng hóa<span class="_float_right _float_right_color">{{$ctdvc->hh_ten}}</span></p>
            <p>Số lượng <span class="_float_right">{{$ctdvc->hh_soluong}}</span></p>
            <p>Khối lượng <span class="_float_right">{{ number_format($ctdvc->hh_khoiluong)}} KG</span></p>
            <p>Giá trị<span class="_float_right _float_right_color">{{number_format($ctdvc->hh_giatri)}} vnđ</span></p>
            <hr>

            <p class="_title_send">Ghi chú đơn hàng</p>
            <p style="font-weight:600">Yêu cầu khi lấy hàng </p>
                <p style="margin-left: 28px;font-style: italic;">{{$ctdvc->hh_mota}}</p>
            <p style="font-weight:600">Yêu cầu khi nhận hàng </p>
                <p style="margin-left: 28px;font-style: italic;">{{$ctdvc->ctdvc_mota}}</p>
            <hr>
            
            <p class="_title_send">Phí và tiền thu hộ <span class="_float_right" style="font-size:14px">Đơn vị tính (VNĐ)</span></p>
            <?php $p1= (int)$ctdvc->ctdvc_km  * $ctdvc->hh_khoiluong * $cuoc ;  ?>
            <p>Cước vận chuyển(1) <span class="_float_right _float_right_color">{{ number_format($p1)}}</span></p>
            <p>Tiền thu hộ (2) <span class="_float_right _float_right_color">{{number_format($ctdvc->hh_tienthuho)}}</span></p>
            @if ($ctdvc->ctdvc_phigui !=0)
            <p style=" font-weight:bold "> Đã thanh toán cước phí (3) <span class="_float_right _float_right_color">-{{ number_format($p1)}}</span></p>
            <hr>
                <p>Tổng cước (1)+(2)+(3) <span class="_float_right _float_right_color">{{number_format($ctdvc->hh_tienthuho)}}</span></p>
            @else
            <hr>
            <p>Tổng cước (1)+(2) <span class="_float_right _float_right_color">{{number_format($p1+$ctdvc->hh_tienthuho)}}</span></p>
            
            @endif
            
        </div>
    </div>
    
</div>
@endsection
@push('script')

<script>


        $('#ClickSendVNPAY').click(function (e) { 
            e.preventDefault();
            $("#SendVNPAY").submit();
        });




        var id=$('#chiTietDonHang').val();

        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: "post",
            url: " {{route('kh-ql-don-hang-kiem-tra-don')}} ",
            data: {id:id},
            dataType: "json",
            success: function (response) {
            //   console.log(response);
                if(response.ctdvc_trangthaidon == 4)
                {

                $('#HuyDon').addClass('disabled');
                }
            }
        });


    $('#HuyDon').click(function (e) { 
        e.preventDefault();
        var ctdvc_id = $(this).attr('data-donhang');
        var st4 ='<span class="badge badge-danger">Đã hủy đơn</span>';
        if(confirm('Bạn có muốn hủy đơn không ?'))
        {

            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });


            $.ajax({
                type: "post",
                url: " {{route('kh-ql-don-hang-huy-don')}} ",
                data: {ctdvc_id:ctdvc_id},
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('#insert_status').empty();
                    $('#insert_status').append(st4);
                    $('#HuyDon').addClass('disabled');
                }
            });
         



        }
        else
        {
            
        }   
    });


    function XoaDonHang()
    {
        if(confirm("Bạn có muốn xóa đơn hàng này ?"))
            return true;
        return false;
    }
</script>
@endpush