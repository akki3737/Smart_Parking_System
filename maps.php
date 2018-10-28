<!DOCTYPE html >
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>Creating a Store Locator on Google Maps</title>
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
 </style>
  </head>
  <body style="margin:0px; padding:0px;" onload="initMap()">
    <div>
         <label for="raddressInput">Search location:</label>
         <input type="text" id="addressInput" size="15"/>
        <label for="radiusSelect">Radius:</label>
        <select id="radiusSelect" label="Radius">
          <option value="50" selected>50 kms</option>
          <option value="30">30 kms</option>
          <option value="20">20 kms</option>
          <option value="10">10 kms</option>
        </select>

        <input type="button" id="searchButton" value="Search"/>
    </div>
    <div><select id="locationSelect" style="width: 10%; visibility: hidden"></select></div>
    <div id="map" style="width: 100%; height: 90%"></div>

    <?php
      require 'edu.php';
      $edu=new edu;
      $data=$edu->getdata();
      print_r($data);
    ?>


    <script>
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;

        function initMap() {
          var ambernath = {lat: 19.200213, lng: 73.1671049};
          map = new google.maps.Map(document.getElementById('map'), {
            center: ambernath,
            zoom: 22,
           
          });
          var marker=new google.maps.Marker({
            position:ambernath,
            map:map
          });


        
        }

  </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6YuVBiECVUTFsNYB8qL7itN3IkUzELIk&callback=initMap">
    </script>
  </body>
</html>