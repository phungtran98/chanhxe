<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .control-left-wrapper {
    position: absolute;
    /* width: 200px; */
    top: 50px;
    left: 20px;
    height: 200px;
}
div#zoom-in,
div#zoom-out,
div#current-loaction{
   background: #7ca4e0;
   padding: 8px;
   font-size: 18px;
   margin-bottom: 5px;
   color: white;
}
    </style>
  </head>
  <body>
      {{-- autocomplte --}}
      {{-- <input class="form-control" type="text" name="" id="auto_search"> --}}
      
      <div id="map"></div>
      <div class="control-left-wrapper">
        <div class="zoom" id="zoom-in"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
        <div class="zoom" id="zoom-out"><i class="fa fa-minus" aria-hidden="true"></i></div>
        <div class="zoom" id="current-loaction"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
      </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&libraries=places&callback=initMap"
    
    ></script>
    
    <script>
    "use strict";
    let map, marker;

    function initMap()
    {
      let myLatLng = new google.maps.LatLng(10.0259158,105.7639028);
        
        map = new google.maps.Map(document.getElementById("map"), {
          center:myLatLng ,
          zoom: 15,
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
          url:"http://localhost:8080/chanhxe/public/vendor/users/images/logo/1.png ",
          scaledSize:{
            width:50,
            height:50
          }
        },
        //Cho phép kéo thả icon trên bản đồ
        draggable:true,      
      });


      //Tao zoom
      function ZoomControl(){

        let zoomInButton = document.getElementById('zoom-in');
        let zoomOutButton = document.getElementById('zoom-out');

        google.maps.event.addDomListener(zoomInButton,'click',function(){
          map.setZoom(map.getZoom()+1);
          console.log('ok');
        })

        google.maps.event.addDomListener(zoomOutButton,'click',function(){
          map.setZoom(map.getZoom()-1);
          console.log('ok');
        })

      };

      // Lay vi tri hien tai
      function GeolocationControl() {
        let geoButton = document.getElementById('current-loaction');
        google.maps.event.addDomListener(geoButton,'click',geoLocation);
      };

      function geoLocation(position)
      {
        console.log('Ok');
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            (position) => {
              console.log(position);
              const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
              };
              map.setCenter(pos);
              marker.setPosition(pos);
            }
          );
        } 
          else{
            alert('bị lỗi rồi');
          }
      }


      
      // Kéo thả incon trên map
      google.maps.event.addDomListener(marker,'dragstart' , function(event){
        console.log('bat dau',event.latLng.lat(),event.latLng.lng());
       
      });
      google.maps.event.addDomListener(marker,'dragend' , function(event){
        console.log('ket thuc',event.latLng.lat(),event.latLng.lng());
        getNewMarker();
      });


      let markers  = [
        {'lat':10.022678823009876 ,'lng':105.75530472479245},
        {'lat':10.020692577622789 ,'lng':105.78431549749753},
        {'lat':10.024791836658192,'lng':105.76504650793454},

      ];

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
            url:"http://localhost:8080/chanhxe/public/vendor/users/images/logo/1.png ",
            scaledSize:{
              width:50,
              height:50
            }
          },
          animation: google.maps.Animation.BOUNCE,
        });
      };


      //chi đường A va B
      const directionsService = new google.maps.DirectionsService();
      const directionsRenderer = new google.maps.DirectionsRenderer();

      //Khoang cach
      // const geocoder = new google.maps.Geocoder();
      const service = new google.maps.DistanceMatrixService();

      function calculateAndDisplayRoute(newMarker) {

        directionsRenderer.setMap(map);

          directionsService.route(
            {
              origin: {lat:10.022678823009876 ,lng:105.75530472479245},
              destination:newMarker.getPosition(),
              travelMode: google.maps.TravelMode.DRIVING,
            },
            (response, status) => {
              if (status === "OK") {
                directionsRenderer.setDirections(response);
                console.log(response);
                 //tinh khoang cach
                 service.getDistanceMatrix(
                  {
                    origins: ['Vinh long'],
                    destinations: [newMarker.getPosition()],
                    travelMode: google.maps.TravelMode.DRIVING,
                  },
                  (response, status) => {
                    if (status !== "OK") {
                      alert("Error was: " + status);

                    }
                    else{
                      var originList=response.originAddresses;
                      var destinationAddresses=response.destinationAddresses;
                      for (let i = 0; i < originList.length; i++) {
                          const results = response.rows[i].elements;
                            console.log(results);

                          for (let j = 0; j < results.length; j++) {
                            var element = results[j];
                            var dt =element.distance.text;
                            var dr =element.duration.text;
                            console.log(dt + dr);
                          }
                      } 






                    }
                  } 
                 );












              } else {
                window.alert("Directions request failed due to " + status);
              }
            }
          );
      }
      
      

      calculateAndDisplayRoute(marker);
      ZoomControl();
      GeolocationControl();
      
    } //end intMap   
    
    </script>
  </body>
</html>

