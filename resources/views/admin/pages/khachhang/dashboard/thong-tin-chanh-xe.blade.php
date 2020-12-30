@extends('admin.template.masters')
@section('title')
    | Thông tin Chành xe
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Thông tin Chành xe</a>
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


</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="profile-pic text-center">
                            <img alt="" src=" {{asset('upload/chanhxe/'.$chanhxe->cx_hinhanh)}} ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
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
                        <div id="expense" class="chart-bar"></div>
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
                            <h1>{{$chanhxe->cx_tenchanhxe}}</h1>
                            <span class="designation"> </span>
                            <p>
                                {{$chanhxe->cx_mota}}
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
                        Các tuyến xe chạy
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                               <table class="table ">
                                   <thead class="thead-inverse">
                                       <tr>
                                           <th>STT</th>
                                           <th>Tên tuyến</th>
                                           <th>Thao tác</th>
                                       </tr>
                                       </thead>
                                       <tbody>
                                           <?php $i=1?>
                                          @foreach ($tuyen as $item)
                                              <tr>
                                                  <td>{{$i++}}</td>
                                                  <td>{{$item->t_tentuyen}}</td>
                                                  <td><a href="#" class="Detail_CX" data-toggle="modal" data-target="#ChiTietTuyen{{$i}}">Xem chi tiết</a></td>
                                                  {{-- Chi tiết thông tin tuyến xe --}}
                                                    <div class="modal fade" id="ChiTietTuyen{{$i}}" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tuyến {{$item->t_tentuyen}}</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p>Tài xế: {{$item->x_tentaixe}} </p>
                                                                        <p>Biển số xe:  {{$item->x_bienso}} </p>
                                                                        <p>Vị trí kho:  </p>
                                                                        <p> Mô tả: <br/>{!!$item->t_mota !!}</p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        @foreach ($kho as $k)
                                                                                    @if ($k->t_id == $item->t_id)
                                                                                        <p> {{$k->k_ten}} </p>
                                                                                        <p>{{$k->k_diachi}} </p> 
                                                                                @endif
                                                                                @endforeach
                                                                                    
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <?php $str = explode('|',$item->x_hinhanhxe) ?>
                                                                        {{-- @for ($i = 0; $i < count($str); $i++)                                 --}}
                                                                                <img class="" src="{{asset('upload/chanhxe/').'/'.$str[0] }}" alt="" width="100%">
                                                                        {{-- @endfor --}}
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <a href="{{ route('kh-don-hang-2',['id'=>$item->t_id]) }}" class="btn btn-success">Tạo đơn hàng</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                        <li style="padding-bottom:0">
                                            <div class="avatar">
                                                <img src="http://localhost:8080/chanhxe/public/upload/khachhang/user-placeholder.png" alt=""/>
                                            </div>
                                            <div class="activity-desk">
                                                <h5><a href="#"> {{$bl->kh_hoten}} </a><span style="float: right; color:#aba4a4;font-size:14px;">{{date('d-m-Y H:i:s', strtotime($bl->bl_created))}}</span></h5>
                                                <p class="noidung"> {{$bl->bl_noidung}} </p> 
                                                <a class="showform-rep" data-id="{!! $bl->bl_id!!}"><i class="fa fa-reply"></i> </a>Trả lời 
                                                <a href="#"><i class="fa fa-flag"></i></a>Báo cáo
                                                @if ($bl->kh_id == Auth::guard('khachhang')->id())
                                                <a  data-toggle="modal" data-target="#UpdateComment" data-com_id=" {{$bl->bl_id}} " class="UpComment"><i class="fa fa-pencil-square-o"></i></a>Sửa
                                                <a href="{{ route('kh-binh-luan-xoa', ['id'=>$bl->bl_id]) }}" onclick="return XoaBinhLuan()"><i class="fa fa-trash-o"></i> </a>Xóa
                                                @endif
                                            </div>
                                             {{-- Trả lời bình luận --}}
                                            <div class="row reply-comment" id="showrep{!!$bl->bl_id!!}">
                                                <form action="{{ route('kh-binh-luan-tl', ['id'=>$bl->bl_id]) }}" method="post">
                                                    @csrf
                                                    <div class="col-md-8 " style="margin: 10px 0; padding-left:95px;">
                                                        <input type="text" class="form-control" name="bl_noidung">
                                                        <input type="hidden" name="cx_id" value=" {{$chanhxe->cx_id}} ">
                                                    </div>
                                                    <div class="col-md-4" style="margin-top: 10px">
                                                        <button type="submit" class="btn btn-success">Bình luận</button>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- Hiện thị nội dung được trả lời bình luận --}}
                                            @foreach ($binhluan as $bl2)
                                                @if ($bl->bl_id == $bl2->bl_idtraloi)
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
                                            @endforeach
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- Viết bình luận + đánh giá --}}
                           <form action="{{ route('kh-binh-luan') }}" method="post">
                               @csrf
                               <div class="col-md-12">
                                    <h4>Đánh giá</h4>
                                    <div class=rate>
                                        <input type="radio" id="star5" name="rate" value="5" onclick="postToController();" /><label for="star5" title="Super !!">5 stars</label>    
                                        <input type="radio" id="star4" name="rate" value="4" onclick="postToController();" /><label for="star4" title="Geil">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" onclick="postToController();" /><label for="star3" title="Gut">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" onclick="postToController();" /><label for="star2" title="So gut wie">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" onclick="postToController();" /><label for="star1" title="Schlecht">1 star</label>
                                    </div>
                               </div>
                               <div class="col-md-8">
                                      <input type="text"
                                        class="form-control" name="bl_noidung" id="" aria-describedby="helpId" placeholder="">
                                        {{-- thông tin của bình luận --}}
                                        <input type="hidden" name="cx_id" value=" {{$chanhxe->cx_id}} ">
                                        <input type="hidden" name="bl_danhgia" id="danhgia" value="" >
                               </div>
                               <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Bình luận</button>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Chỉnh sửa bình luận  -->
<div class="modal fade" id="UpdateComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa bình luận</h5>
        </div>
        <div class="modal-body">
         <form action="{{ route('kh-binh-luan-cap-nhat') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Nội dung</label>
              <input type="text"
                class="form-control" name="bl_noidung" id="bl_noidung">
              <input type="hidden"
                class="form-control" name="bl_id" id="bl_id">
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

@endsection
@push('script')
<script>


    //lấy đánh giá
    function postToController() {
        for (i = 0; i < document.getElementsByName('rate').length; i++) {
                if(document.getElementsByName('rate')[i].checked == true) {
                    var rateValue = document.getElementsByName('rate')[i].value;
                    break;
                }
        }
        document.getElementById("danhgia").value = rateValue;
    }
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

</script>
@endpush