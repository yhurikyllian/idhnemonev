<html>
  <head>
    <title>Geocoding service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <!-- <div id="floating-panel"> -->
  
      <!-- <input  type="button" value="Back" onclick="tes()"> -->
      <!-- <input id="submit2" type="button" value="Get"> -->
    <!-- </div> -->
    <div id="map"></div>
    <script>
    function tes(){
      // http://localhost/indohun/index.php/home?param1=Mampang&param2=Bali
      var param1 = getParamValue('param1');
      // alert(param1);
    }

    function getParamValue(paramName)
      {
          var url = window.location.search.substring(1); //get rid of "?" in querystring
          var qArray = url.split('&'); //get key-value pairs
          for (var i = 0; i < qArray.length; i++) 
          {
              var pArr = qArray[i].split('='); //split key and value
              if (pArr[0] == paramName) 
                  return pArr[1]; //return value
          }
      }

    

    
      
      function tesheatmap(){

        this.heatmapData = [];
      }
      function initMap() {
        var heatmapData = [];
        var langlat;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat: -0.789275, lng: 113.92132700000002},
          draggable: false, 
              zoomControl: false, 
              scrollwheel: false,
          
        });

        // var marker = new google.maps.Marker({
        //   map: map,
        //   position: geocodeAddress(geocoder,map,"Mampang"),
        //   title: 'Hello World!'
        // });

        var geocoder = new google.maps.Geocoder();
        
        var param1 = getParamValue('param1');
        var arrayparam = param1.split(";");
        var lat = []; 
        var lng = [];
        var datas = [];

        for(var i= 0; i<arrayparam.length; i++){
        
        
        var split = arrayparam[i].split(",");
        lat[0] = split[0];
        lng[0] = split[1];

        datas[i] = new google.maps.LatLng(lat[0], lng[0]);
        heatmapData.push(datas[i]);
        // geocodeAddress(geocoder, map, arrayparam[i]);

            var marker = new google.maps.Marker({
                  map: map,
                  position: datas[i],
                  

           });
        }
        // var tes = new google.maps.LatLng(arrayparam[0]);
        // alert(JSON.stringify(heatmapData));

        //  var heatmap = new google.maps.visualization.HeatmapLayer({
        //   data: heatmapData
        //  });
        // heatmap.setMap(map);
        
        // testing(); // var initmap = new tesheatmap();// alert(JSON.stringify(heatmapData));
      // alert(JSON.stringify(initmap.heatmapData));
       
      }

      function testing(){
        var initmap = new tesheatmap();
        for(var i =0; i<10; i++){
        initmap.heatmapData.push("Taik");
        }
        testing2();
        alert(JSON.stringify(initmap.heatmapData));
      }

      function testing2(){
        var initmap = new tesheatmap();
        initmap.heatmapData.push("TESt");
      }

      function geocodeAddress2(geocoder, resultsMap, address) {
        // var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {

            // alert(results[0].geometry.location);
            
            // resultsMap.setCenter(results[0].geometry.location);
            var initmap = new tesheatmap();
            initmap.heatmapData.push(results[0].geometry.location);
            // alert(JSON.stringify(initmap.heatmapData));

            var heatmap = new google.maps.visualization.HeatmapLayer({
              data: heatmapData
            });

            heatmap.setMap(resultsMap);

            // return results[0].geometry.location;

          } else {
            alert('Geocode was not successful for the following reason: ' + status);

          }
        });
        // return results[0].geometry.location;
      }

      function geocodeAddress(geocoder, resultsMap, address) {
        // var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {

            // alert(results[0].geometry.location);
            
            // resultsMap.setCenter(results[0].geometry.location);
            
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
              

            });
            // return results[0].geometry.location;

          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
        // return results[0].geometry.location;
      }

      function geocodeAddress3(geocoder, resultsMap, address,fn) {
        // var TelAviv;
        // var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
        fn(results[0].geometry.location);
        // alert(TelAviv);
        });
        
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZTrBzcrCf0efrgGL2pjZMs3SlLkwm7DA&callback=initMap">
    </script>
  </body>
</html>