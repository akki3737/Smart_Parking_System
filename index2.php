<html>
<h1>hello</h1>
<body>
<?php
$servername="localhost"
$username="root";
$password="";
$database="parking";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
	echo "Connected successfully";
} 

//$lat=(isset($_GET['lat']))?$_GET['lat']:'';
//$long=(isset($_GET['long']))?$_GET['long']:'';
//echo("$lat");
?>
</body>
</html>
