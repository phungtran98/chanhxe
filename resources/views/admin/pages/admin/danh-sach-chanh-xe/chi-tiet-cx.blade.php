@extends('admin.template.masters')
@section('title')
    | Danh Sách Chành Xe
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
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('admin-xac-thuc', ['id'=>$chanhxe->cx_id]) }}" onclick="return XacThuc()" class="btn btn-success" style="margin: 5px"> <i class="fa fa-check" aria-hidden="true"></i> Xác thực </a>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                       
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
            {{-- <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body p-states">
                        <div class="summary pull-left">
                            <h4>Tổng đơn hàng vận chuyển </h4>
                            <h3>$ 5,600</h3>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                                                {{-- <a class="showform-rep" data-id="{!! $bl->bl_id!!}"><i class="fa fa-reply"></i> </a>Trả lời 
                                                <a ><i class="fa fa-flag"></i></a>Báo cáo
                                                @if ($bl->kh_id == Auth::guard('khachhang')->id())
                                                <a  data-toggle="modal" data-target="#UpdateComment" data-com_id=" {{$bl->bl_id}} " class="UpComment"><i class="fa fa-pencil-square-o"></i></a>Sửa
                                                <a href="{{ route('kh-binh-luan-xoa', ['id'=>$bl->bl_id]) }}" onclick="return XoaBinhLuan()"><i class="fa fa-trash-o"></i> </a>Xóa
                                                @endif --}}
                                            </div>
                                             {{-- Trả lời bình luận --}}
                                            {{-- <div class="row reply-comment" id="showrep{!!$bl->bl_id!!}">
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
                                            </div> --}}
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
@endsection
@push('script')
<script>
    function XacThuc()
    {
        if(confirm("Bạn muốn xác thực cho Chành Xe này ?"))
        return true;
        return false;
    }
</script>
@endpush