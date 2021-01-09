@extends('admin.template.masters')
@section('title')
    | Cài đặt
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Thông tin chành xe</a>
    </li>
@endsection
@push('css')
<style>
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}


.activity-desk > a {
    padding: 5px 16px;
    display: inline-block;
    font-size: 16px;
}

.ChangeImg {
    float: right;
    font-size: 16px;
}
.gallery img {
    width: 22%;
    margin: 12px;
    border: 1px solid;
}
</style>    
@endpush
@section('content')
@if (Session::has('OTPS'))
<div class="alert alert-success" role="alert">
    {{ Session::get('OTPS') }}
  </div>
@elseif(Session::has('OTPF'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('OTPF') }}
    </div>
@endif
<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <a href="#" data-toggle="modal" data-target="#Changeimage" title="Thay đổi ảnh đại diện" class="ChangeImg"  ><i class="fa fa-edit "></i></a>
                        </div>
                        <div class="profile-pic text-center">
                            <img alt="" src="{{asset('upload/chanhxe/'.$chanhxe->cx_hinhanh)}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body p-states">
                        <div class="summary pull-left">
                            <h4 >Hình ảnh của chành xe</h4>
                            <div class="" style="margin: 20px 0">
                                @foreach ($hinhanhcx as $img)
                                    <img style="width:40%" src=" {{asset('upload/chanhxe/'.$img->hacx_hinhanh)}} " alt=" {{$img->hacx_hinhanh}} ">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <a href="" data-toggle="modal" data-target="#CapNhatThongTin" title="Cập nhật thông tin" class="ChangeImg" ><i class="fa fa-edit "></i></a>
                        </div>
                        <ul class="p-info">
                            <li>
                                <div class="title">Mã giấy phép</div>
                                @if ($chanhxe->cx_giayphep ==null)
                                <div class="desk">Chưa xác định</div>
                                @elseif($chanhxe->cx_giayphep !=null)
                                <div class="desk">{{$chanhxe->cx_giayphep}}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Số điện thoại</div>
                                @if ($chanhxe->cx_sdt ==null)
                                <div class="desk">Chưa xác định</div>
                                @elseif($chanhxe->cx_sdt !=null)
                                <div class="desk">{{$chanhxe->cx_sdt}}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Gmail</div>
                                @if ($chanhxe->cx_email ==null)
                                <div class="desk">Chưa xác định</div>
                                @elseif($chanhxe->cx_email !=null)
                                <div class="desk">{{$chanhxe->cx_email}}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Mã số thuế</div>
                                @if ($chanhxe->cx_masothue ==null)
                                <div class="desk">Chưa xác định</div>
                                @elseif($chanhxe->cx_masothue !=null)
                                <div class="desk">{{$chanhxe->cx_masothue}}</div>
                                @endif
                            </li>
                            <li>
                                <div class="title">Trạng thái</div>
                                @if ($chanhxe->active == 0)                      
                                <span class="badge badge-danger" style="background-color: red;">Chưa xác thực</span>
                                @elseif($chanhxe->active == 1)
                                <span class="badge badge-success">Đã xác thực</span>
                                @endif
                                <span><a href="" data-toggle="modal" data-target="#XacthucCode" title="Xác thực tài khoản" class="ChangeImg" ><i class="fa fa-pencil "></i></a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body p-states">
                        <div class="summary pull-left">
                            <h4>Tổng đơn hàng vận chuyển </h4>
                            <h3>$ 5,600</h3>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Hiện thị đánh giá --}}
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body p-states">
                        <div class="summary pull-left">
                        <h4>Đánh giá <span style="float: right;margin-right: 61px;font-size: 23px;      margin-bottom: 10px;">{{$rate}}/5</span></h4>
                           <div class="col-md-12 ">
                                <div class="pull-left">
                                    <div class="pull-left" style="width:35px; line-height:1;">
                                        <div style="height:9px; margin:5px 0;">5  <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="pull-left" style="width:180px;">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                                          
                                        </div>
                                        </div>
                                    </div>
                                    <div class="pull-right" style="margin-left:10px;"> {{$star[4]}} </div>
                                </div>
                                <div class="pull-left">
                                    <div class="pull-left" style="width:35px; line-height:1;">
                                        <div style="height:9px; margin:5px 0;">4  <i class="fa fa-star"></i></div>
                                    </div>
                                    <div class="pull-left" style="width:180px;">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                          
                                        </div>
                                        </div>
                                    </div>
                                    <div class="pull-right" style="margin-left:10px;">{{$star[3]}}</div>
                                </div>
                                <div class="pull-left">
                                    <div class="pull-left" style="width:35px; line-height:1;">
                                        <div style="height:9px; margin:5px 0;">3  <i class="fa fa-star"></i></div>
                                    </div>
                                    <div class="pull-left" style="width:180px;">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                          
                                        </div>
                                        </div>
                                    </div>
                                    <div class="pull-right" style="margin-left:10px;">{{$star[2]}}</div>
                                </div>
                                <div class="pull-left">
                                    <div class="pull-left" style="width:35px; line-height:1;">
                                        <div style="height:9px; margin:5px 0;">2  <i class="fa fa-star"></i></div>
                                    </div>
                                    <div class="pull-left" style="width:180px;">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                                          
                                        </div>
                                        </div>
                                    </div>
                                    <div class="pull-right" style="margin-left:10px;">{{$star[1]}}</div>
                                </div>
                                <div class="pull-left">
                                    <div class="pull-left" style="width:35px; line-height:1;">
                                        <div style="height:9px; margin:5px 0;">1  <i class="fa fa-star"></i></div>
                                    </div>
                                    <div class="pull-left" style="width:180px;">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                                          
                                        </div>
                                        </div>
                                    </div>
                                    <div class="pull-right" style="margin-left:10px;">{{$star[0]}}</div>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            {{-- Mô tả về chành xe --}}
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="profile-desk">
                            <h1>{{$chanhxe->cx_tenchanhxe}} </h1>
                            <a href="{{ route('cx-mo-ta') }}"  title="cập nhật mô tả " class="ChangeImg" style="margin-top: -36px;margin-right: 20px; "><i class="fa fa-edit "></i></a>
                            <span class="designation"> </span>
                            @if ($chanhxe->cx_mota == null)
                                <p>Chưa có mô tả</p>
                            @else
                            <p> {{$chanhxe->cx_mota}} </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Thông tin các tuyến xe xủa nhà xe --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <header class="panel-heading">
                        Tuyến xe đã đăng ký
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table  table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Tuyến</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1?>
                                            @foreach ($tuyen as $item)
                                                <tr>
                                                    <td scope="row">{{$i++}}</td>
                                                    <td> <strong>{{$item->t_tentuyen}}</strong></td>
                                                    <td style="width:150px"> <a href="{{ route('cx-tuyen-xe') }}" >Xem chi tiết</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Hiện thị các xe của chành xe --}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <header class="panel-heading">
                        Xe
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table  table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Biển số</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1 ?>
                                            @foreach ($xe as $item)
                                                <tr>
                                                    <td scope="row">{{$i++}}</td>
                                                    <?php  $str = explode('|',$item->x_hinhanhxe)?>
                                                    <td style="width:250px"> <img style="width:40%" src=" {{asset('upload/chanhxe/'.$str[0] )}} " alt=""></td>
                                                    <td > <strong>{{$item->x_bienso}}</strong></td>
                                                    <td style="width:150px"> <a href="{{ route('cx-xe') }}" >Xem chi tiết</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <header class="panel-heading">
                        Bình luận - Đánh giá
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            {{-- Hiện thi nội dung đã bình luận --}}
                            <div class="col-md-12">
                                <ul class="activity-list">
                                    @foreach ($binhluan as $bl)
                                        @if ($bl->bl_idtraloi == null)
                                        <li style="padding-bottom:0">
                                            <div class="avatar">
                                                <img src="http://localhost:8080/chanhxe/public/upload/khachhang/user-placeholder.png" alt=""/>
                                            </div>
                                            <div class="activity-desk">
                                                <h5><a > {{$bl->kh_hoten}} </a><span style="float: right; color:#aba4a4;font-size:14px;">{{date('d-m-Y H:i:s', strtotime($bl->bl_created))}}</span></h5>
                                                <p class="noidung"> {{$bl->bl_noidung}} </p> 
                                                <a class="showform-rep" data-id="{!! $bl->bl_id!!}"><i class="fa fa-reply"></i> </a>Trả lời 
                                                <a ><i class="fa fa-flag"></i></a>Báo cáo
                                                @if ($bl->kh_id == Auth::guard('khachhang')->id())
                                                <a  data-toggle="modal" data-target="#UpdateComment" data-com_id=" {{$bl->bl_id}} " class="UpComment"><i class="fa fa-pencil-square-o"></i></a>Sửa
                                                <a href="{{ route('kh-binh-luan-xoa', ['id'=>$bl->bl_id]) }}" onclick="return XoaBinhLuan()"><i class="fa fa-trash-o"></i> </a>Xóa
                                                @endif
                                            </div>
                                             {{-- Trả lời bình luận --}}
                                            <div class="row reply-comment" id="showrep{!!$bl->bl_id!!}">
                                                <form action="{{ route('cx-binh-luan-tl', ['id'=>$bl->bl_id]) }}" method="post">
                                                    @csrf
                                                    <div class="col-md-8 " style="margin: 10px 0; padding-left:95px;">
                                                        <input type="text" class="form-control" name="bl_noidung">
                                                        <input type="hidden" name="kh_id" value=" {{$bl->kh_id}} ">
                                                    </div>
                                                    <div class="col-md-4" style="margin-top: 10px">
                                                        <button type="submit" class="btn btn-success">Bình luận</button>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- Hiện thị nội dung được trả lời bình luận --}}
                                            @foreach ($binhluan as $bl2)
                                                @if ($bl->bl_id == $bl2->bl_idtraloi && $bl2->cx_rep==0)
                                                    <ul class="activity-list" style="margin-left: 70px">
                                                        <li style="border-bottom:none; padding-bottom:0; margin:10px 0;">
                                                            <div class="avatar">
                                                                <img src="http://localhost:8080/chanhxe/public/upload/khachhang/user-placeholder.png" alt=""/>
                                                            </div>
                                                            <div class="activity-desk">
                                                                <h5><a href="#"> {{$bl2->kh_hoten}} </a> </h5>
                                                                <p class="text-muted"> {{$bl2->bl_noidung}} </p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endif
                                                @if ($bl->bl_id == $bl2->bl_idtraloi && $bl2->cx_rep!=0)
                                                <ul class="activity-list" style="margin-left: 70px">
                                                    <li style="border-bottom:none; padding-bottom:0; margin:10px 0;">
                                                        <div class="avatar">
                                                            <img src="http://localhost:8080/chanhxe/public/upload/khachhang/user-placeholder.png" alt=""/>
                                                        </div>
                                                        <div class="activity-desk">
                                                            <h5 ><a href="#"> <i  style="color: #ab7f7f;font-size: 15px;" class="fa fa-shield"></i> {{$bl2->cx_tenchanhxe}} </a> </h5>
                                                            <p class="text-muted"> {{$bl2->bl_noidung}} </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                @endif
                                            @endforeach
                                        </li>    
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Chỉnh sửa hình đại diện  -->
<div class="modal fade" id="Changeimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thay đổi ảnh đại diện</h5>
        </div>
        <div class="modal-body">
         <form action="{{ route('cx-cap-nhat-hinh-anh') }}" method="post" enctype="multipart/form-data">
            @csrf
                @if ($chanhxe->cx_hinhanh == null)
                <img src="{{asset('upload/chanhxe/user-placeholder.png')}}" alt="" id="blah" style="width: 166px;margin-left: 209px;margin-bottom: 10px;"> 
                @else
                    <img src=" {{asset('upload/chanhxe/'.$chanhxe->cx_hinhanh)}} " alt="" id="blah" style="width: 166px;margin-left: 209px;margin-bottom: 10px;">
                @endif
            <div class="form-group">
                <div class="form-group">
                    <input type="file" class="form-control" name="cx_hinhanh"  onchange="readURL(this)" style="width: 287px;margin: auto;">
                    <label for="">Hình đại diện </label>
                </div>
            </div>
            <h5>Chọn hình ảnh cho chành xe</h5>
            <div class="gallery"></div>
            <div class="form-group">
                <div class="form-group" style="">
                    <input type="file" class="form-control" name="hacx_hinhanh[]" multiple  id="gallery-photo-add" style="width: 287px;margin: auto;">
                    
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-warning">Cập nhật</button>
        </div>
        </form>
      </div>
    </div>
</div>
<!-- Chỉnh sửa thông tin  -->
<div class="modal fade" id="CapNhatThongTin" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h5>
        </div>
        <div class="modal-body">
         <form action="{{ route('cx-cap-nhat-tt') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-md-12 " style="width: 330px;margin: 0 125px;">
                        <div class="form-group">
                          <label for="">Mã giấy phép</label>
                          <input type="text"
                            class="form-control" name="cx_giayphep" id="" >
                         
                        </div>
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="text"
                            class="form-control" name="cx_email" id="" >
                         
                        </div>
                        <div class="form-group">
                          <label for="">Mã số thuế</label>
                          <input type="text"
                            class="form-control" name="cx_masothue" id="" >
                         
                        </div>
                        <div class="form-group">
                          <label for="">Số điện thoại</label>
                          <input type="text"
                            class="form-control" name="cx_sdt" id=""  value=" {{$chanhxe->cx_sdt}} ">
                         
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-warning">Cập nhật</button>
        </div>
        </form>
      </div>
    </div>
</div>
<!-- Xác thực tài khoản -->
<div class="modal fade" id="XacthucCode" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác thực tài khoản</h5>
        </div>
        <div class="modal-body">
         <form action="{{ route('cx-xac-thuc') }}" method="post" enctype="multipart/form-data">
            @csrf
                <a href="#" class="btn btn-success"id="GetCode" >Lấy mã</a>
                <p> Lấy lại mã sau <span id="countdowntimer">30 </span> Giây</p>
                <div class="form-group">
                  <label for="">Nhập mã code</label>
                  <input type="text"
                    class="form-control" name="cx_code1"  >
                  <input type="hidden"
                    class="form-control" name="cx_code2"  value="" id="cx_code2">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-warning">Xác thực</button>
        </div>
        </form>
      </div>
    </div>
</div>


@endsection
@push('script')

<script>

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});





    //Xóa bình luận
    function XoaBinhLuan(){
       if( confirm("Bạn có muốn xóa bình luận này!") ){
        return true;
       }
       return false;
    }

    //Bình luận - Ẩn form reply
    $('.reply-comment').hide();

    //Hiện form bình luận
    $('.showform-rep').click(function () { 
        // alert("ok");
        var id = $(this).attr('data-id');
            //   console.log(id);
            $("#showrep"+id).toggle();
    });
    
    //Ajax sửa bình luận  -- Khúc này bí quá
    $('.UpComment').click(function (e) { 
        e.preventDefault();
        var com_id = $(this).attr('data-com_id');
        // alert(com_id);
        $.ajax({
            type: "GET",
            url: "{{route('kh-binh-luan-lay-tt')}}",
            data: {com_id :com_id },
            dataType: "json",
            success: function (response) {
                // console.log(response);
                $('#bl_noidung').val(response.bl_noidung);
                $('#bl_id').val(response.bl_id);
            }
        });
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    //Đếm ngược khi lấy mã
    $('#GetCode').click(function () { 
        // e.preventDefault();
        $('#GetCode').attr('disabled','disabled');

        $.ajax({
            type: "GET",
            url: " {{route('cx-ma-xac-thuc')}} ",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#cx_code2').val(response);
            }
        });

        var timeleft = 30;
            var downloadTimer = setInterval(function(){
            timeleft--;
            document.getElementById("countdowntimer").textContent = timeleft;
            if(timeleft <= 0)
            {

                clearInterval(downloadTimer);
                $('#GetCode').removeAttr('disabled');
            }
                
            },1000);

    });
</script>
@endpush