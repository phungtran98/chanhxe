<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
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
    </style>
  </head>
  <body>
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
          zoom: 16,
          //không cho scroll trên web
        //   scrollwheel:false
        });

        //marker là icon gắn lên map
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
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaaygZT7_LyyyK1fE9Wf9nsBHfJXgzXXY&callback=initMap"
    
    ></script>
  </body>
</html>