@extends('admin.template.masters')
@section('title')
    | Quản lí tuyến
@endsection
@section('breadcrumb')
    <li>
        <a href="#" class="active">Quản lí tuyến</a>
    </li>
@endsection
@push('css')
<style>

</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('error'))
    <div class="alert alert-danger" role="alert">
            {{ session('error') }}
    </div>
@endif

@if (session('mss'))
    <div class="alert alert-success" role="alert">
        {{ session('mss') }}
    </div>
@endif
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        Đăng kí tuyến
                          <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="panel-body">
                      <form action="{{ route('cx-tuyen-xe-dk') }}" method="post">
                        @csrf
                          <div class="row">
                              <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Chọn xe (Biển số xe) </label>
                                        <select class="form-control" name="x_id" id="Xe">
                                            <option selected disabled value="">--- Chọn xe ---</option>
                                            @foreach ($xe as $item)
                                                <option value="{{$item->x_id}} ">{{$item->x_bienso}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Chọn Tuyến</label>
                                        <select class="form-control" name="t_id" id="Tuyen">
                                            <option selected disabled value="">--- Chọn tuyến ---</option>
                                            @foreach ($tuyen as $item)
                                                <option value=" {{$item->t_id}} ">{{$item->t_tentuyen}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                              </div>
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-success btn-block" id="DangKi">Đăng kí</button>
                              </div>
                          </div>
                      </form>
                    </div>
                </section>
            </div>
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                            Các tuyến đã đăng kí
                          <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                    </header>
                    <div class="panel-body">
                      <div class="row">
                          <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Tên tuyến</th>
                                    <th style="width:147px">Thao tác</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($ctt as $item)
                                  <tr>
                                    <td> {{$item->t_tentuyen}} </td>
                                    <td style="width:147px">
                                        <a href="" class="btn btn-warning">Chi tiết</a>
                                        <a href="{{ route('cx-tuyen-xe-xoa', ['id'=>$item->t_id]) }}" class="btn btn-danger" onclick="return Xoatuyen()">Xóa</a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <section class="panel">
            <header class="panel-heading">
                Bản đồ
                  <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <div id="map" class="" style="width:100%; height:500px;"></div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('script')
<script>
    let map, marker;

    function initMap(){
        //Lấy vị trí hiện tại
        var pune ={
            lat:  10.022737,
            lng: 105.764941
        };
    
        map = new google.maps.Map(document.getElementById("map"), {
            center:pune ,
            zoom: 14,
    
        });
        var marker = new google.maps.Marker({
            position:pune,
            map:map,

            // icon roi tu tren xuoong
            // animation: google.maps.Animation.DROP

            //Nhay tung tung
            animation: google.maps.Animation.BOUNCE,


            icon:{
            url:" ",
            scaledSize:{
                width:50,
                height:50
            }
            }

            
        })

         // Lấy ra vị trí các tuyến của chành xe vừa đăng kí
        function getLocateChanhXe(){

            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: " {{route('cx-tuyen-xe-map')}} ",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    for( let i = response.length-1; i>= 0; i--)
                    {
                        // console.log(response[i]);
                        createMarker(response[i]);
                    }
                }
            });
        }
        function createMarker(pos){
            let newMarker = new google.maps.Marker({
            position:pos,
            map:map,
            icon:{
                    url:"http://localhost:8080/chanhxe/public/vendor/users/images/logo/1.png ",
                    scaledSize:{
                        width:50,
                        height:50
                    }
                },
            animation: google.maps.Animation.BOUNCE,
            });
        };

       


        getLocateChanhXe();
    }//end map

   
    //Kiểm tra đăng kí tuyến
    $('#Tuyen').change(function (e) { 
        e.preventDefault();
        // console.log('thay doi');
        var x_id = $('#Xe').val();
        var t_id = $('#Tuyen').val();

    $.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: " {{route('cx-tuyen-xe-kiem-tra')}} ",
        data: {x_id:x_id, t_id:t_id},
        dataType: 'json',
        success: function (response) {
            console.log(response);
            if(response==1)
            {
                alert('Dữ liệu thêm bị trùng!');
                
            }
        }
    });


    });

    //Xóa tuyến
    function Xoatuyen () { 
     
        if(confirm('Bạn có muốn xóa')){
            return true;
        }
        return false;
    };
</script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&libraries=places&callback=initMap"
  
></script>
@endpush