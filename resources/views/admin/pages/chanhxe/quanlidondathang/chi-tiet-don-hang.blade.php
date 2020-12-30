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
._color_font_ {
    font-size: 14px;
    font-family: 'FontAwesome';
    color: black;
    margin: 6px;
}
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12" style="margin-bottom:10px">
        <h4  style="float: left;margin-left: 63px;color: #075f5b;font-weight: bold;">Thông tin chi tiết đơn hàng</h4>
        <a data-toggle="modal" data-target="#InDonHangHH"   class="btn bg-primary " style="float: right;/* margin: 0 10px; */margin-left: 10px;margin-right: 60px;"> <img src=" {{asset('vendor/users/images/print.png')}} " alt="" style="width:18px"> In đơn</a>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#UpdateSatus" style="float: right;: white;margin: 0 10px;" >Thao tác</a>
        
    </div>
    
    <div class="col-md-5 dh_detail" style="margin-left: 80px">
        <div class="content-detail">
            <p>Mã đơn hàng: <span class="_float_right _float_right_color"> {{$ctdvc->dvc_madon}} </span></p>
            <p>Ngày tạo: <span class="_float_right">{{ date('d-m-Y h:m:s', strtotime($ctdvc->dvc_ngaylap))}}</span></p>
            <p>Trạng thái: <span class="_float_right" id="insert_status">
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
            </span></p>
            <p>Đơn vị vận chuyển <span class="_float_right _float_right_color"> {{$ctdvc->cx_tenchanhxe}} </span></p>
            <p>Quãng đường dự kiến  <span class="_float_right"> {{$ctdvc->ctdvc_km}} Km</span></p>
            <p>Thời gian dự Kiến: <span class="_float_right"> {{$ctdvc->ctdvc_thoigian}} </span></p>
            <p>Hình thức gửi hàng: <span class="_float_right _float_right_color"> {{$ctdvc->dvc_hinhthucgui}} </span></p>
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
            </p>
            <hr>
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
            <p>Khối lượng <span class="_float_right">{{$ctdvc->hh_khoiluong}} kg</span></p>
            <p>Giá trị<span class="_float_right _float_right_color">{{number_format($ctdvc->hh_giatri)}} vnđ</span></p>
            <hr>

            <p class="_title_send">Ghi chú đơn hàng</p>
            <p style="font-weight:600">Yêu cầu khi lấy hàng </p>
                <p style="margin-left: 28px;font-style: italic;">{{$ctdvc->hh_mota}}</p>
            <p style="font-weight:600">Yêu cầu khi nhận hàng </p>
                <p style="margin-left: 28px;font-style: italic;">{{$ctdvc->ctdvc_mota}}</p>
            <hr>
            
            <p class="_title_send">Phí và tiền thu hộ <span class="_float_right" style="font-size:14px">Đơn vị tính (VNĐ)</span></p>
            <?php $p1= (int)$ctdvc->ctdvc_km * $ctdvc->hh_khoiluong * 1000 ;  ?>
            <p>Phí vận chuyển(1) <span class="_float_right _float_right_color">{{ number_format($p1)}}</span></p>
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


  
  <!-- Modal -->
  <div class="modal fade" id="UpdateSatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cập nhật trạng thái đơn hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container" style="width:100%">
              <div class="row">
                <input type="hidden" name="" value=" {{$ctdvc->ctdvc_id}} " id="Ctdvc_id">
                  <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Trạng thái đơn hàng</label>
                            <select class="form-control" name="" id="Bill_Status">
                                <option disabled selected> ---Chọn trạng thái-- </option>
                                <option value="0">Chờ duyệt</option>
                                <option value="1">Đã duyệt</option>
                                <option value="2">Đang giao hàng</option>
                                <option value="3">Đã giao</option>
                                <option value="4">Hủy đơn</option>
                            </select>
                        </div>
                  </div>
                  <div class="col-md-6">
                    <h5>Các trạng thái đơn hàng</h5>
                    <span class="badge badge-warning _color_font_">Chờ duyệt</span>
                    <span class="badge badge-primary _color_font_">Đã duyệt</span>
                    <span class="badge badge-info _color_font_">Đang giao hàng</span>
                    <span class="badge badge-success _color_font_">Đã giao</span>
                    <span class="badge badge-danger _color_font_">Hủy đơn</span>
                
                    
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="InDonHangHH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">In Đơn Hàng</h5>
        </div>
        <div class="modal-body">
         <a target="_blank" class="btn btn-warning" style="margin:0 20px;"  href="{{ route('cx-ql-don-in-don-word', ['id'=>$ctdvc->ctdvc_id]) }}">Định dạng WORD</a>
         <a target="_blank" class="btn btn-warning"  href="{{ route('cx-ql-don-in-don-pdf', ['id'=>$ctdvc->ctdvc_id]) }}">Định dạng PDF</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('script')
<script>
  $(document).ready(function () {


        var st0='<span class="badge badge-warning">Chờ duyệt</span>';

        var st1 ='<span class="badge badge-primary">Đã duyệt</span>';

        var st2 ='<span class="badge badge-info">Đang giao hàng</span>';

        var st3 ='<span class="badge badge-success">Đã giao</span>';

        var st4 ='<span class="badge badge-danger">Hủy đơn</span>';

               
      $('#Bill_Status').change(function (e) { 
        e.preventDefault();
        var id = $("#Ctdvc_id").val();
        var status= $(this).val();

        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "post",
            url: " {{route('cx-ql-don-hang-trang-thai')}} ",
            data: {id:id,status:status},
            dataType: "json",
            success: function (response) {
                console.log(response);
                if(response ==0){
                    $('#insert_status').empty();
                    $('#insert_status').append(st0);
                    $('#UpdateSatus').modal('toggle');
                }
                else if(response ==1){
                    $('#insert_status').empty();
                    $('#insert_status').append(st1);
                    $('#UpdateSatus').modal('toggle');
                }
                else if(response ==2){
                    $('#insert_status').empty();
                    $('#insert_status').append(st2);
                    $('#UpdateSatus').modal('toggle');
                }
                else if(response ==3){
                    $('#insert_status').empty();
                    $('#insert_status').append(st3);
                    $('#UpdateSatus').modal('toggle');
                }
                else if(response ==4){
                    $('#insert_status').empty();
                    $('#insert_status').append(st4);
                    $('#UpdateSatus').modal('toggle');
                }
            }
        });

        //   console.log(id + status);
      });
  });  

</script>
@endpush