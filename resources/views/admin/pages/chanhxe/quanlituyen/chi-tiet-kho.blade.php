@extends('admin.template.masters')
@section('title')
    | Quản lí tuyến
@endsection
@section('breadcrumb')
    <li>
        <a href="{{ route('cx-tuyen-xe') }}" class="active">Đăng ký tuyến</a>
    </li>
    <li>
        <a href="#" class="active">Chi tiết Kho</a>
    </li>
@endsection
@push('css')
<style>
 button#Add-address {
    position: absolute;
    left: 515px;
    top: 100px;
    background: #64cca6;
    border-color: #64cca6;
}
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
            Danh sách Kho của tuyến &nbsp;<span style="color: #64cca6; font-size:16px;">{{$tuyen->t_tentuyen}}</span>
                  <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
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
                 <div class="col-md-6">
                     <div class="form-group">
                       <label for="">Tên Kho <span class="star-red">*</span></label>
                       <input type="text"
                         class="form-control" name="" id="Kho_ten" placeholder="Nhập tên kho">
                     </div>
                    <div class="form-group">
                        <label for="">Vị trí kho <span class="star-red">*</span></label>
                        <input type="text"class="form-control" name="" id="start" placeholder="Nhập vào địa chỉ">
                        <button class="btn btn-success" id="Add-address">Thêm</button>
                        <input type="hidden"class="form-control" name="" id="Lat" >
                        <input type="hidden"class="form-control" name="" id="Lng" >
                        <input type="hidden"class="form-control" name="" value=" {{$id}} " id="Tuyen_id" >
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered " id="Location-table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>STT</th>
                                <th>Tên kho</th>
                                <th>Địa chỉ</th>
                                {{-- <th>Vĩ độ</th>
                                <th>Kinh độ</th> --}}
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <?php  $i=1;?>
                            <tbody id="Out_Location">
                                @foreach ($kho as $item)

                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$item->k_ten}} </td>
                                        <td> {{$item->k_diachi}} </td>
                                        {{-- <td> {{$item->lat}} </td>
                                        <td> {{$item->lng}} </td> --}}
                                        <td style="width:82px"> 
                                            <a href="{{ route('cx-chi-tiet-kho-xoa', ['id'=>$item->k_id]) }}" class="btn btn-danger" onclick="return XoaKho()">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
            Bản đồ vị trí các kho tuyến &nbsp;<span style="color: #64cca6; font-size:16px;">{{$tuyen->t_tentuyen}}</span>
                  <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
             <div class="row">
                 <div class="col-md-12" >
                    <p id="map" style="width:100%; height:500px; margin:2px;"></p>
                 </div>
             </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('script')
<script>
    let map, marker;
    
    "use strict";
  
    function initMap(){
    
        let myLatLng = new google.maps.LatLng(10.0270304,105.7667245);
        
        map = new google.maps.Map(document.getElementById("map"), {
          center:myLatLng ,
          zoom: 12,
          mapTypeId: "terrain",
          //không cho scroll trên web
        //   scrollwheel:false
        });

        marker = new google.maps.Marker({
            position:myLatLng,
            map:map,
            title:'Phung xin chao',
            // icon roi tu tren xuoong
            // animation: google.maps.Animation.DROP
            //Nhay tung tung
            animation: google.maps.Animation.BOUNCE,
            icon:{
            // url:"https://www.clker.com//cliparts/U/M/C/p/x/C/google-maps-pin-green-hi.png",
            scaledSize:{
                width:50,
                height:40
            }
            },
            
        });
        
        //Lấy địa điểm trên Map
        const autocomplete = new  google.maps.places.Autocomplete(document.getElementById('start'));
        autocomplete.addListener('place_changed',function(){
        const place = autocomplete.getPlace();
            document.getElementById('Lat').value = place.geometry.location.lat();
            document.getElementById('Lng').value = place.geometry.location.lng();
        });


        //Hiển thị danh sách kho trên Map
       

        // Lấy ra vị trí các tuyến của chành xe vừa đăng kí
        function getLocateChanhXe(){
            var t_id = $('#Tuyen_id').val();  
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          $.ajax({
              type: "POST",
              url: "{{route('cx-chi-tiet-kho-map')}}",
              data: {tuyen:t_id},
              dataType: "json",
              success: function (response) {
                  console.log(response);
                   for( let i = response.length-1; i>= 0; i--)
                    {
                        console.log(response[i]);
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
                    url:"http://localhost:8080/chanhxe/public/vendor/users/images/logo/1.png",
                    scaledSize:{
                        width:60,
                        height:60
                    }
                },
            animation: google.maps.Animation.BOUNCE,
            });
        };

        //chỉ đường nè
        const directionsService = new google.maps.DirectionsService();
    //    function Chiduong(a,b){
    //     directionsService.route({
    //         //Điểm bắt đầu, có dạng truyền tham số
    //         origin:a,
    //         //Điểm kết thúc
    //         destination:b,
    //         travelMode:'DRIVING'
    //     },
    //     function(result, status){
    //         if(status == "OK"){
    //             console.log(result);

    //             const directionsRenderer = new google.maps.DirectionsRenderer({
    //             directions:result,
    //               map:map

    //             });
    //         }
    //     });
    //    }

    //    Chiduong('Hẻm 51, An Khánh, Ninh Kiều, Cần Thơ, Vietnam','Sóc Trăng, Quốc lộ 1A, Châu Thành, Châu Thành District, Sóc Trăng Province, Soc Trang, Vietnam');

        function getNewMarker(){
            for( let i = markers.length-1; i>= 0; i--)
            {
            createMarker(markers[i]);
            }
        };

        function createMarker(pos){
            let newMarker = new google.maps.Marker({
            position:pos,
            map:map,
            icon:{
                url:"http://localhost:8080/chanhxe/public/vendor/users/images/logo/1.png",
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
  
  
  //Lấy tọa độ ra ngoài
  $('#Add-address').click(function (e) { 
      e.preventDefault();
      var data = [];
      // $("#Location-table").empty();
      // $("#Location-table > tbody").html("");
      var vitri = $('#start').val();
      var lat = $('#Lat').val();
      var lng = $('#Lng').val();
      var t_id = $('#Tuyen_id').val();  
      var kho_ten = $('#Kho_ten').val();  
      var object = {vitri:vitri,lat:lat,lng:lng,t_id:t_id};
      // data.push(object);
      console.log(object);
      $.ajaxSetup({
      headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          type: "POST",
          url: " {{route('cx-tuyen-xe-dk')}} ",
          data: {vitri:vitri,lat:lat,lng:lng,t_id:t_id,kho_ten:kho_ten},
          dataType: "json",
          success: function (response) {
              console.log(response);
              location.reload();
            //   for(var i=0; i<response.length; i++){
            //   $('#Out_Location').append('<tr><td>'+response[i].k_diachi+'</td><td> <a href="" class="remove_field"><i class="fa fa-times"></i></a> </td></tr>');
    //   }
              
          }
      });
      $('#start').val('');
      
      // data.forEach(val => {
      //     $('#Out_Location').append('<tr><td>'+val.vitri+'</td><td> <a href="" ><i class="fa fa-times"></i></a> </td></tr>');
      // });
  
      
  });
  
  //  $('#Out_Location').on("click",".remove_field", function(e){ //user click on remove text
  // 		e.preventDefault(); $(this).parents('tr').remove();
  // 	})
  
  function XoaKho(){
      if(confirm('Bạn có muốn xóa Tuyến này ?'))
        return true;
    return false;
  }
  
  
  </script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&libraries=places&callback=initMap"

></script>
@endpush