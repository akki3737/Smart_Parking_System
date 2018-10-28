<?php
session_start();
if(isset($_POST['signup']))
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
	echo "Connected successfully <br>";
	mysqli_select_db($conn,'parking');
	//$lat=$_SESSION['lat'];
	//$long=$_SESSION['long'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$password2=md5($_POST['password2']);
	$sex=$_POST['sex'];
	//$password=md5($_POST['pass']);

	$sql="insert into signup(firstname,lastname,contact,emailid,password,sex) values('$fname','$lname','$contact','$email','$password2','$sex')" or die("Failed to Query database ".mysql_error());
	$res=mysqli_query($conn,$sql);
	echo $conn->error;
	echo "Your data have been entered into database";

    include 'img.html';
	/*$sql="select sid from shopowner where name='$shopname'";
	$result=mysqli_query($conn,$sql);
	$resultCheck=mysqli_num_rows($result);
	if($resultCheck>0)
	{
	while($row=mysqli_fetch_assoc($result))
	{
		$sql="insert into shop_location values($row[sid],$lat,$long)";
		$r=mysqli_query($conn,$sql);
	}
	}*/
}
?>
