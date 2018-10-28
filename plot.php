<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "parking";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "<br>Connected successfully<br>";

$sql = "select name,latitude,longitude from manager_park_lot";
$result = $conn->query($sql);
//echo serialize($result);
$row = mysqli_fetch_all($result,MYSQLI_NUM);
//echo serialize($row[0]);

?>

 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>

   <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

  

<!DOCTYPE html>
<html>
<head>
	<title>Map</title>
</head>
<body>

<center>
 <div id="mapid" style="width: 800px; height: 600px;">
 </div>
</center>

<script>
    var mymap = L.map('mapid').setView([19.124937,72.880979], 13);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution:'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoicHJpdGVzaHNzIiwiYSI6ImNqbjR3dW13YTBzdHAza3F5bTF4NXZtamQifQ.T-t-IknczuGvR9eq1R-7Cw'
}).addTo(mymap);

 
    var data = <?php echo JSON_encode($row); ?>;
 for(var i=0;i<data.length;i++)
 {
        var marker = L.marker([data[i][1],data[i][2]]).addTo(mymap);
        marker.bindPopup("<b>"+data[i][0]+"</b>").openPopup();
        //console.log(data);
  }     
</script>
</body>
</html>