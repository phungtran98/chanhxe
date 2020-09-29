<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%;
        width: 800px;
        margin: auto;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
      {{-- autocomplte --}}
      {{-- <input class="form-control" type="text" name="" id="auto_search"> --}}
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input class="form-control" type="text" name="" id="start">
              <div class="btn btn-success" id="search" onclick="myclick()">Tìm</div>
            </div>
            
          </div>
        </div>
      </div>
      <div id="map"></div>



    <script>
      "use strict";

      let map;

      function initMap() {

        var pune ={
            lat:  10.022737,
            lng: 105.764941
        };

        map = new google.maps.Map(document.getElementById("map"), {
          center:pune ,
          zoom: 20,
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&libraries=places&callback=initMap"
    
    ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

