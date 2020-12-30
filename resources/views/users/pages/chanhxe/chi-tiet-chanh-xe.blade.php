@extends('users.template.masters')
@push('title')
    Chi tiết Chành Xe
@endpush
@push('css')
    <style>
        .logo {
            width: 44%;
            margin: auto;
        }
        .section-padding {
            padding-top: 20px !important;
            padding-bottom: 120px;
        }
        .comments-area {
            background: transparent;
            border-top: none !important;
            padding:30px 0;
            margin-top: 0px;
        }


        .comment-form {
            border-top: 1px solid #eee;
            padding-top: 24px;
            margin-top: 25px;
            /* margin-bottom: 20px; */
        }

        .comments-area .comment-list {
            padding-bottom: 30px;
        }



        .comment-list.reppcmt {
            margin-left: 80px;
            margin-top: 25px;
            margin-bottom: 15px;
        }
        .rate {
            float: left;
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

        .comments-area .btn-reply {
        background-color: transparent;
        color: #888888;
        padding: 5px 18px;
        font-size: 14px;
        display: inline-block;
        font-weight: 400;
    }

    ._text_color{
        font-size: 15px;
        font-weight: bold;
    }
    .CheckOrder{
        background: #ececec;
    }
   
    </style>
@endpush
@section('content')
{{-- {{dd(Auth::guard('khachhang')->id())}} --}}
<!--/ bradcam_area  -->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                    {{-- <img class="img-fluid" src="{{asset('vendor/users/img/blog/single_blog_1.png')}}" alt=""> --}}
                    <img class="img-fluid" src="{{asset('upload/chanhxe/'.$hinhanhcx[0]->hacx_hinhanh)}}" alt="">
                    </div>
                    <div class="blog_details">
                    <h2>{{$chanhxe->cx_tenchanhxe}}
                    </h2>
                    <ul class="blog-info-link mt-3 mb-4">
                        <li><a style="color: #ff4a52 !important;" href="#"> <i class="fa fa-envelope"  aria-hidden="true"></i> {{$chanhxe->cx_email}}</a> </li>
                        <li><a style="color: #ff4a52 !important;" href="#"> <i class="fa fa-phone" aria-hidden="true"></i> {{$chanhxe->cx_sdt}}</a> </li>
                    </ul>
                    <p class="excert">
                        {{$chanhxe->cx_mota}}
                    </p>
                    </div>
                </div>
                
        

                <div class="navigation-top">
                    <h3>Hình ảnh liên quan</h3>
                    @for ( $i=1; $i < count($hinhanhcx) ; $i++)
                        
                    <img style="width:40%" class="img-fluid" src="{{asset('upload/chanhxe/'.$hinhanhcx[$i]->hacx_hinhanh)}}" alt="">
                    @endfor
                </div>



                

                {{-- Hiện thị Bình luận --}}
                <div class="comments-area">
                    {{-- {{dd($binhluan)}} --}}
                    @foreach ($binhluan as $bl)
                        {{-- {{dd($bl->blidtraloi) }} --}}
                        @if ($bl->bl_idtraloi == null )   
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                        <img src="http://localhost:8080/chanhxe/public/upload/khachhang/user-placeholder.png" alt=""/>
                                        </div>
                                        <div class="desc">
                                            <p class="comment" style="font-size: 19px;color: #382a2a;">
                                                {{$bl->bl_noidung}}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#" style="color: #075f5b !important;font-weight: 600;font-size: 14px;">{{$bl->kh_hoten}}</a>
                                                    </h5>
                                                    <p class="date"> {{date('d-m-Y H:i:s', strtotime($bl->bl_created))}} </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a class="showform-rep btn-reply " data-id="{!! $bl->bl_id!!}"><i class="fa fa-reply"></i> &nbsp; Trả lời</a>
                                                    @if ($bl->kh_id == Auth::guard('khachhang')->id())
                                                    <a href="{{ route('kh-binh-luan-xoa', ['id'=>$bl->bl_id]) }}" onclick="return XoaBinhLuan()"><i class="fa fa-trash-o"></i> Xóa</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="single-comment justify-content-between d-flex">
                                
                                    {{-- Trả lời bình luận --}}
                                <div class="row reply-comment" id="showrep{!!$bl->bl_id!!}" style="display: flex;margin-left: 90px;width: 487px;margin-top: 11px;">
                                    <form action="{{ route('kh-binh-luan-tl', ['id'=>$bl->bl_id]) }}" method="post">
                                        @csrf
                                        <div class="col-md-12 "  >
                                            <input type="text" class="form-control" name="bl_noidung" style="width: 344px;">
                                            <input type="hidden" name="cx_id" value=" {{$chanhxe->cx_id}} ">
                                        </div>
                                        <div class="col-md-4" style="float: right;left: 98px;top: -38px;">
                                            <button type="submit" class="btn btn-success">Bình luận</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- hiện thị trả lời bình luận --}}
                                @foreach ($binhluan as $bl2)
                                        @if ($bl->bl_id == $bl2->bl_idtraloi)
                                            <div class="comment-list reppcmt">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                        <img src="http://localhost:8080/chanhxe/public/upload/khachhang/user-placeholder.png" alt=""/>
                                                        </div>
                                                        <div class="desc">
                                                            <p class="comment" style="font-size: 19px;color: #382a2a;">
                                                                {{$bl2->bl_noidung}}
                                                            </p>
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex align-items-center">
                                                                    <h5>
                                                                        <a style="color: #075f5b !important;font-weight: 600;font-size: 14px;" href="#">{{$bl2->kh_hoten}}</a>
                                                                    </h5>
                                                                    <p class="date"> {{date('d-m-Y H:i:s', strtotime($bl2->bl_created))}} </p>
                                                                </div>
                                                                <div class="reply-btn">
                                                                    @if ($bl->kh_id == Auth::guard('khachhang')->id())
                                                                    <a href="{{ route('kh-binh-luan-xoa', ['id'=>$bl->bl_id]) }}" onclick="return XoaBinhLuan()"><i class="fa fa-trash-o"></i> Xóa</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>


                <div class="comment-form">
                    <h4 class=""><i class="fa fa-comments"></i>  {{count($binhluan)}}  <span class="align-middle">Bình luận </span> </h4> 
                    <form method="post" class="form-contact comment_form" action="{{ route('kh-binh-luan') }}" id="commentForm">
                        @csrf
                    <div class="row">
                            <div class="col-md-12">
                                    <div class=rate>
                                        <input type="radio" id="star5" name="rate" value="5" onclick="postToController();" /><label for="star5" title="Super !!">5 stars</label>    
                                        <input type="radio" id="star4" name="rate" value="4" onclick="postToController();" /><label for="star4" title="Geil">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" onclick="postToController();" /><label for="star3" title="Gut">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" onclick="postToController();" /><label for="star2" title="So gut wie">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" onclick="postToController();" /><label for="star1" title="Schlecht">1 star</label>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                        <textarea class="form-control w-100" name="bl_noidung" id="comment" cols="20" rows="9" placeholder="Viết bình luận"></textarea>
                                        {{-- thông tin của bình luận --}}
                                        <input type="hidden" name="cx_id" value=" {{$chanhxe->cx_id}} ">
                                        <input type="hidden" name="bl_danhgia" id="danhgia" value="" >
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn" id="BinhLuanCX">Bình luận</button>
                                    <span id="ThongBaoBL" style="color: red"></span>
                                </div>
                            </div>
                    </div>
                    
                    </form>
                </div>

                
            </div>



            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    {{-- <aside class="single_sidebar_widget search_widget">
                    <form action="#">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder='Search Keyword'
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                <div class="input-group-append">
                                <button class="btn" type="button"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">Search</button>
                    </form>
                    </aside> --}}
                    <aside class="single_sidebar_widget post_category_widget">
                    <h4 class="widget_title"> <strong>Các tuyến đường</strong> </h4>
                    <ul class="list cat-list">
                        <?php $i=1; ?>
                        @foreach ($tuyen as $item)
                        <li>
                            {{-- <a href="#" class="d-flex" class="Detail_CX" data-toggle="modal" data-target="#ChiTietTuyen{{$i++}}">
                            <p style="color: #ff4a52 !important;"> <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;{{$item->t_tentuyen}} </p> 
                            </a> --}}
                            <a href="{{ route('chi-tiet-tuyen', ['id'=>$item->t_id]) }}" class="d-flex" >
                            <p style="color: #ff4a52 !important;"> <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;{{$item->t_tentuyen}} </p> 
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    </aside>
                    {{-- hiện thị đánh giá --}}
                    <aside class="single_sidebar_widget popular_post_widget">
                    <h4 class="widget_title">Đánh giá <span style="float: right;margin-right: 61px;font-size: 23px;      margin-bottom: 10px;">{{$rate}}/5</span></h4>
                        <div class="container">
                            <div class="row">
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
                    </aside>
                
                </div>
            </div>
           
       </div>
    </div>

<?php $i=1; ?>
@foreach ($tuyen as $item)
 {{-- Chi tiết thông tin tuyến xe --}}
 <div class="modal fade" id="ChiTietTuyen{{$i++}}" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tuyến {{$item->t_tentuyen}} </h5>
            @if (Auth::guard('khachhang')->id() !=null)
                <span><a  href="{{ route('kh-don-hang-2',['id'=>$item->t_id]) }}"   style="float: right; color:green !important;" > <strong>Lập đơn hàng</strong>   </a></span>
            @endif
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p ><strong>Tài xế:</strong>  {{$item->tx_hoten}} </p>
                        <p> <strong>Biển số xe: </strong>  {{$item->x_bienso}} </p><span></span>
                    
                        <p><strong>Mô tả:</strong>  <br/>{!!$item->t_mota !!}</p>
                    </div>
                    <div class="col-md-6">
                        <p> <strong>Vị trí kho: </strong> </p>
                        @foreach ($kho as $k)
                            @if ($k->t_id == $item->t_id)
                                <p>{{$k->k_ten.' ,'.$k->k_diachi}} </p> 
                            @endif
                        @endforeach

                        
                    </div>
                    <div class="col-md-4">
                        <?php $str = explode('|',$item->x_hinhanhxe) ?>
                        {{-- @for ($i = 0; $i < count($str); $i++)                                 --}}
                                <img class="" src="{{asset('upload/chanhxe/').'/'.$str[0] }}" alt="" width="100%">
                        {{-- @endfor --}}
                    </div>
                    <div class="col-md-8">
                        @if (Auth::guard('khachhang')->id() ==null)
                        
                        <p style="font-size: 16px;color:red;margin-top: 22px;margin-left: 77px;font-weight: bold;"> Bạn chư đăng nhập !</p>
                        <a href="{{ route('dang-nhap') }}" style="color: green !important;margin-left: 77px"> Đăng nhập</a>
                        @endif
                    </div>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

  @csrf
  <input type="hidden" id="checkId" value="{{Auth::guard('khachhang')->id()}} ">
 </section>
 <!--================ Blog Area end =================-->
>
  </div>


@endsection
@push('css')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script>

    //lấy đánh giá
    function postToController() {
        for (i = 0; i < document.getElementsByName('rate').length; i++) {
                if(document.getElementsByName('rate')[i].checked == true) {
                    var rateValue = document.getElementsByName('rate')[i].value;
                    break;
                }
        }
        console.log(rateValue);
        document.getElementById("danhgia").value = rateValue;
    }
    //Xóa bình luận
    function XoaBinhLuan(){
       if( confirm("Bạn có muốn xóa bình luận này!") ){
        return true;
       }
       return false;
    }

$(document).ready(function () {

    var kh_id = $('#checkId').val();
    // console.log(kh_id);
    //kiểm tra khách hàng đó có lập đơn nào hay chưa
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
        type: "post",
        url: " {{route('kh-kiem-tra-lap-don')}} ",
        data: {kh_id:kh_id},
        dataType: "json",
        success: function (response) {
            // console.log(response);
            if( response.length > 0)
            {
                console.log('ok');
            }
            else
            {
               $('#BinhLuanCX').attr('disabled','true');
               $('#BinhLuanCX').addClass('CheckOrder');
               $('#ThongBaoBL').append('Bạn không được bình luận do bạn chưa có lập đơn hàng nào !')

            }
        }
    });

  



    //Bình luận - Ẩn form reply
    $('.reply-comment').hide();

    //Hiện form bình luận
    $('.showform-rep').click(function () { 
        // alert("ok");
        var id = $(this).attr('data-id');
            //   console.log(id);
            $("#showrep"+id).toggle();
    });
});
    
    
</script>
@endpush