@extends('admin.template.masters')
@section('title')
    | Tra cứu chành xe
@endsection
@section('breadcrumb')
    <li>
        <a href="#" >Tra cứu</a>
    </li>
    <li>
        <a href="#" class="active">Tra cứu chành xe</a>
    </li>
@endsection
@push('css')
    <style>
        .row.googlemap {
            width: 99%;
            height: 550px;
            /* border: 1px solid #469a2b; */
            padding: 10px;
            margin: auto;
        }
      #map{
          width: 100%;
          height: 500px;
      }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
              </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <input class="form-control" type="text" name="" id="start">
        </div>
      </div>
      <div class="col-md-3">
        <div class="btn btn-success btn-block" id="search" onclick="myclick()">Tìm</div>
      </div>
    </div> --}}
    <div class="row googlemap">
        <div class="col-md-3 " style="padding-left:0; padding-right:0;">
            <div class="panel">
                <div class="panel-body">
                    <div class="dir-info">
                        <div class="row">
                            <div class="col-xs-9">
                                <h5>Wild Awake</h5>
                                <span>
                                    <a href="#" class="small"> katy Perry</a>
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <a class="dir-like" href="#">
                                    <span class="small">434</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-9">
                                <h5>Wild Awake</h5>
                                <span>
                                    <a href="#" class="small"> katy Perry</a>
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <a class="dir-like" href="#">
                                    <span class="small">434</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-9">
                                <h5>Wild Awake</h5>
                                <span>
                                    <a href="#" class="small"> katy Perry</a>
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <a class="dir-like" href="#">
                                    <span class="small">434</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-9">
                                <h5>Wild Awake</h5>
                                <span>
                                    <a href="#" class="small"> katy Perry</a>
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <a class="dir-like" href="#">
                                    <span class="small">434</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-9">
                                <h5>Wild Awake</h5>
                                <span>
                                    <a href="#" class="small"> katy Perry</a>
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <a class="dir-like" href="#">
                                    <span class="small">434</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-9">
                                <h5>Wild Awake</h5>
                                <span>
                                    <a href="#" class="small"> katy Perry</a>
                                </span>
                            </div>
                            <div class="col-xs-3">
                                <a class="dir-like" href="#">
                                    <span class="small">434</span>
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                       
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-9">

            <div id="map"></div>
        </div>
    </div>
@endsection
@push('script')
<script>
    "use strict";

    let map;

    function initMap() {
    //Lấy vị trí hiện tại
    
    var pune ={
        lat:  10.022737,
        lng: 105.764941
    };
  
    map = new google.maps.Map(document.getElementById("map"), {
        center:pune ,
        zoom: 16,
        //không cho scroll trên web
      //   scrollwheel:false
    });
    var marker = new google.maps.Marker({
        position:pune,
        map:map,

        // icon roi tu tren xuoong
        // animation: google.maps.Animation.DROP

        //Nhay tung tung
        animation: google.maps.Animation.BOUNCE,


        icon:{
        url:"https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
        scaledSize:{
            width:50,
            height:50
        }
        },

        
    })
    //Chưc năng chỉ đường
    //client yêu cầu 
    const directionsService = new google.maps.DirectionsService();
        
    // directionsService.route({
    //     //Điểm bắt đầu, có dạng truyền tham số
    //     origin:'Can Tho',
    //     //Điểm kết thúc
    //     destination:'Vinh Long',
    //     travelMode:'DRIVING'
    // },
    // function(result, status){
    //     if(status == "OK"){
    //         console.log(result);

    //         const directionsRenderer = new google.maps.DirectionsRenderer({
    //         directions:result,
    //           map:map

    //         });
    //     }
    // });

    // const autocomplete = new  google.maps.places.Autocomplete(document.getElementById('auto_search'));
    
    // autocomplete.addListener('place_changed',function(){
    //   const place = autocomplete.getPlace();
    //   // map.setCenter(place.geometry.location);

    //   map.fitBounds(place.geometry.viewport);
    //   map.setZoom(16);
    //   marker.setPosition(place.geometry.location);
    //   // console.log(autocomplete.getPlace());
    
    // });


    //chỉ đường nè
    // directionsService.route({
    //     //Điểm bắt đầu, có dạng truyền tham số
    //     origin:'Can Tho',
    //     //Điểm kết thúc
    //     destination:'Vinh Long',
    //     travelMode:'DRIVING'
    // },
    // function(result, status){
    //     if(status == "OK"){
    //         console.log(result);

    //         const directionsRenderer = new google.maps.DirectionsRenderer({
    //         directions:result,
    //           map:map

    //         });
    //     }
    // });

    const autocomplete = new  google.maps.places.Autocomplete(document.getElementById('start'));
    
    autocomplete.addListener('place_changed',function(){
    const place = autocomplete.getPlace();
    // map.setCenter(place.geometry.location);
    // a=place.geometry.location;
    map.fitBounds(place.geometry.viewport);
    map.setZoom(16);
    marker.setPosition(place.geometry.location);
    
    
    });

     
        
     

   
    }
  
  </script>
  {{-- <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&libraries=places&callback=initMap"
  
  ></script> --}}
@endpush