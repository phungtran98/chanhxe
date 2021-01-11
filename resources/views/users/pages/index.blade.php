@extends('users.template.masters')
@push('title')
    Trang chủ
@endpush
@push('css')
    <style>
        .logo {
            width: 80%;
            margin: auto;
        }
        .CheckNum{
            border: 2px solid green;
        }
        .NCheckNum{
            border: 2px solid red;
        }
    </style>
@endpush
@section('content')
@include('users.template.slider')   
<div class="popular_places_area">
    <div class="container">
        <div class="row" style="margin-top: -90px">
            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        <h4 class="card-title" style="margin-bottom: 23px;/* margin-left: 4px; */color: #075f5b;font-weight: bold;font-size: 26px;text-align: center;margin-top: -10px;">Tra cứu đơn hàng</h4>
                        <form action="{{ route('kh.tra-cuu-don-hang') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nhập mã đơn hàng (<span style="color:red ">*</span>) </label><span id="ThongBao"  style="float: right; color:red"></span>
                                <input type="text"
                                  class="form-control" name="madon" placeholder="9878654642543" id="NhapMaDon">
                              </div>
                              <button type="submit" class="btn btn-success">Tra cứu</button>
                        </form>
                    </div>
                </div>
                <div class="card" style="margin-top: 20px">
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        <h4 class="card-title" style="margin-bottom: 23px;/* margin-left: 4px; */color: #075f5b;font-weight: bold;font-size: 26px;text-align: center;margin-top: -10px;">Tra cứu Chành Xe theo Tuyến </h4>
                        <form action="{{ route('kh.tra-cuu-tuyen') }}" method="post" id="TraCuuTuyenNesub">
                            @csrf
                            <div class="form-group">
                                <label for="">Nhập tên tuyến (<span style="color:red ">*</span>)</label>
                                <input type="text"
                                  class="form-control" name="tentuyen" id="TraCuuTuyenNe" placeholder="Cần Thơ.....">
                              </div>
                              <button type="submit" class="btn btn-success">Tra cứu</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        <h4 class="card-title" style="margin-bottom: 23px;/* margin-left: 4px; */color: #075f5b;font-weight: bold;font-size: 26px;text-align: center;margin-top: -10px;">Ước tính cước phí</h4>
                       <form action="{{ route('kh.uoc-tinh-phi') }}" method="post">
                        @csrf
                           <div class="form-group">
                             <label for="">Gửi từ (<span style="color:red ">*</span>)</label>
                             <input type="text" class="form-control" placeholder="Nhập địa điểm gửi" name="noidi" id="DiemTu" />
                           </div>
                           <div class="form-group">
                             <label for="">Gửi đến (<span style="color:red ">*</span>)</label>
                             <input type="text" class="form-control" placeholder="Nhập địa điểm đến" name="noiden" id="DiemDen" />
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tổng khối lượng(KG) (<span style="color:red ">*</span>)</label>
                                    <input type="number" class="form-control" name="tong_khoi_luong" />
                                    <input type="hidden"  name="kh_nhan_km" id="kh_nhan_km_val" />
                                  </div>
                               </div>
                               <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Khoảng cách(KM) </label>
                                    <input type="text" class="form-control" id="kh_nhan_km"  name="" disabled/>
                                    
                                  </div>
                               </div>
                           </div>
                           <button type="submit" class="btn btn-success">Tra cứu</button>
                       </form>
                    </div>
                </div>
            </div>
           
        </div>

        <div class="row justify-content-center" style="margin-top:100px ">
            <div class="col-lg-6">
                <div class="section_title text-center ">
                    <h3 style="margin-bottom: 23px;/* margin-left: 4px; */color: #075f5b;font-weight: bold;font-size: 26px;text-align: center;margin-top: -10px;">Chành xe cho bạn</h3>
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

    </div>
</div>
@endsection
@push('css')
<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
<script>
     $(document).ready(function () {
       
            $('#TraCuuTuyenNe').keypress(function (e) {
            if (e.which == 13) {
                $('form#lTraCuuTuyenNesub').submit();
                return false;    //<---- Add this line
            }
            });
  
        
        $('#NhapMaDon').keyup(function (e) { 
            var num=$(this).val();
            if(/^\d*$/.test(num)){
                // console.log('so');
                $('#NhapMaDon').removeClass('NCheckNum');
                $('#NhapMaDon').addClass('CheckNum');
                $('#ThongBao').append('');
               
            }
            else
            {
                $('#NhapMaDon').removeClass('CheckNum');
                $('#NhapMaDon').addClass('NCheckNum');
                $('#ThongBao').append('Bạn phải nhập số!');
            }
        });
    });
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&libraries=places&callback=initMap"
    
    ></script>  
<script>
  // Ggoogle map
  function initMap() {

    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();

    //Khoang cach
    // const geocoder = new google.maps.Geocoder();
    const service = new google.maps.DistanceMatrixService();

    //---Gới hạn quốc gia ---//
    // var options = {
    //     types: ['(cities)'],
    //     componentRestrictions: {country: "vi"}
    // };

    const autocomplete1 = new  google.maps.places.Autocomplete(document.getElementById('DiemTu'));
    const autocomplete = new  google.maps.places.Autocomplete(document.getElementById('DiemDen'));
    autocomplete.addListener('place_changed',function(){
    
    const DiemTu = document.getElementById('DiemTu').value;
    const DiemDen = document.getElementById('DiemDen').value;
    // place = autocomplete.getPlace();
    // b=place;
    // map.setCenter(place.geometry.location);
    // DiemTu=place.geometry.location;
    // map.fitBounds(place.geometry.viewport);
    // map.setZoom(16);
    // marker.setPosition(place.geometry.location);
    // console.log(a);
    // getaddress(add)
    calculateAndDisplayRoute(DiemTu,DiemDen)

    });


    

    function calculateAndDisplayRoute(add1,add2) {
        console.log(add1);
        console.log(add2);
        directionsService.route(
            {
            origin: {lat:10.022678823009876 ,lng:105.75530472479245},
            destination:{lat:10.022678823009876 ,lng:105.75530472479245},
            travelMode: google.maps.TravelMode.DRIVING,
            },
            (response, status) => {
            if (status === "OK") {
                directionsRenderer.setDirections(response);
                console.log(response);
                //tinh khoang cach
                service.getDistanceMatrix(
                {
                    origins: [add1],
                    destinations: [add2],
                    travelMode: google.maps.TravelMode.DRIVING,
                },
                (response, status) => {
                    if (status !== "OK") {
                    alert("Error was: " + status);

                    }
                    else{
                    var originList=response.originAddresses;
                    var destinationAddresses=response.destinationAddresses;
                    var dt ;
                    var dr ;
                    for (let i = 0; i < originList.length; i++) {
                        const results = response.rows[i].elements;
                            console.log(results);

                        for (let j = 0; j < results.length; j++) {
                            var element = results[j];
                            var dtval =element.distance.value;
                            dt =element.distance.text;
                            dr =element.duration.text;
                        
                        }
                    } 
                    console.log(dt);
                    $('#kh_nhan_km_val').val(dtval);
                    $('#kh_nhan_km').val(dt);
                    // $('#kh_nhan_tgchay').val(dr);
                    }
                } 
                );


            } else {
                window.alert("Directions request failed due to " + status);
            }
            }
        );
    }


}

</script>

@endpush