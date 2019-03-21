<?php
session_start();
if(isset($_POST['area_submit']))
{
$servername = "localhost";
  $username = "root";
  $password = "";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password);

  // Check connection
  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }
  //echo "Connected successfully <br>";
  mysqli_select_db($conn,'parking');
  //$lat=$_SESSION['lat'];
  //$long=$_SESSION['long'];
  $email=$_SESSION["email"];
  $name=$_POST['name'];
  $add=$_POST['add'];
  $office_no=$_POST['office_no'];
  $timing=$_POST['timing'];
  $o_car=$_POST['o_car'];
  $o_bike=$_POST['o_bike'];
  $lat=$_POST['lat'];
  $lon=$_POST['lon'];
  echo($o_bike);
  echo($name);

  //$password=md5($_POST['pass']);

  $sql="insert into manager_park_lot(emailid,name,address,office_no,timing,occupancy_car,occupancy_bike,latitude,longitude) values('$email','$name','$add','$office_no','$timing','$o_car','$o_bike','$lat','$lon')" or die("Failed to Query database ".mysql_error());
  $res=mysqli_query($conn,$sql);
  echo $conn->error;
  echo '<script type="text/Javascript">alert("Your data have been entered into database")</script>';
  include("img.html");
  /*$sql="select sid from shopowner where name='$shopname'";
  $result=mysqli_query($conn,$sql);
  $resultCheck=mysqli_num_rows($result);
  if($resultCheck>0)
  $name','$add','$office_no','$o_car','$o_bike'
  {
  while($row=mysqli_fetch_assoc($result))
  {
    $sql="insert into shop_location values($row[sid],$lat,$long)";
    $r=mysqli_query($conn,$sql);
  }
  }*/
}
?>