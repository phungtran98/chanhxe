@extends('users.template.masters')
@push('title')
    Chi tiết Chành Xe
@endpush
@push('css')
<style>
   .table_thead{
    background: #075f5b;
    color: white;
}

</style>
@endpush
@section('content')

    <input type="hidden" name="" id="Tuyen_id" value=" {{$tuyen->t_id}} ">
   <section class="blog_area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
              <a href="javascript: history.go(-1)" style="margin-top: 20px;margin-bottom: 10px; color: #075f5b; font-weight:bold"> Trở về</a>  
              @if (Auth::guard('khachhang')->id() ==null)
                
              <p style="font-size: 22px;color:red;margin-top: 10px;font-weight: bold;"> Bạn chưa đăng nhập !</p>
              <a href="{{ route('dang-nhap') }}" style="color: green !important;font-size: 20px;"> Đăng nhập</a>
              @endif
            </div>
            <div class="col-md-12" style="">
    
                 <h5 style="color: #075f5b;font-weight: bold;font-size: 20px; text-align:center"> <i> {{$tuyen->t_tentuyen}}</i> </h5> 
                 @if (Auth::guard('khachhang')->id() !=null)
                    <a  href="{{ route('kh-don-hang-2',['id'=>$tuyen->t_id]) }}" style="float: right" class="btn btn-success"> Lập đơn hàng  </a>
                 @endif
                 
                 <table id="example" class="table table-striped table-bordered" >
                    <thead>
                        <tr class="table_thead">    
                            {{-- <th>Thao tác</th> --}}
                            <th>Địa chỉ của kho hàng</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh xe</th>
                            <th>Tài xế</th>
                            <th>Biến số xe</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd($tuyen)}} --}}
                        {{-- @foreach($tuyen as $tuyen) --}}
                        <tr>
                            <?php $i=1?>
                            <td>  @foreach ($kho as $k)
                                    @if ($k->t_id == $tuyen->t_id)
                                        <p> <strong>{{$i++}}/ </strong> <i>{{$k->k_ten.' ,'.$k->k_diachi}}</i> </p>
                                        <hr>
                                    @endif
                                @endforeach
                            </td>
                            <td> {!!$tuyen->t_mota !!} </td>
                            <td style="width:120px">
                                <?php $str = explode('|',$tuyen->x_hinhanhxe) ?>
                                {{-- @for ($i = 0; $i < count($str); $i++)                                 --}}
                                        <img class="" src="{{asset('upload/chanhxe/').'/'.$str[0] }}" alt="" width="100%">
                                {{-- @endfor --}}
                            </td>
                            <td style="width:150px"> <strong>{{$tuyen->tx_hoten}}</strong> <br>{{$tuyen->tx_sdt}}</td>
                            <td style="width:150px"> <strong>{{$tuyen->x_bienso}}</strong> </td>
                           
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                        
                </table>
            </div>
            <div class="col-md-12 mt-4">
                <h5 style="color: #075f5b;font-weight: bold;font-size: 25px;text-align:center;text-transform: uppercase;"> <i>Vị trí các kho</i> </h5> 
                <div id="map" style="width:100%; height:500px; margin:10px">

                </div>
            </div>
         </div>
    </div>




@endsection
@push('css')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
 function initMap(){
    
    let myLatLng = new google.maps.LatLng(10.0270304,105.7667245);
    
    map = new google.maps.Map(document.getElementById("map"), {
      center:myLatLng ,
      zoom: 14,
      mapTypeId: "terrain",
      //không cho scroll trên web
    //   scrollwheel:false
    });

   
    
  

 

    //Hiển thị danh sách kho trên Map
   

    // Lấy ra vị trí các tuyến của chành xe vừa đăng kí
    function getLocateChanhXe(){
        var t_id = $('#Tuyen_id').val();  
        // console.log(t_id);

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
   
    
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&libraries=places&callback=initMap"

></script>

@endpush