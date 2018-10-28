<?php
session_start();
   if(isset($_POST['login']))
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
   $email=$_POST['email'];
   $password2=md5($_POST['password2']);
   echo($password2);
      
      $sql = "SELECT emailid,password FROM signup  WHERE emailid = '$email' and password = '$password2'";
      $result1=mysqli_query($conn,$sql);
      $count=mysqli_num_rows($result1);
      echo $conn->error;
      //echo conn->error;
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        echo("successfully");
        $_SESSION['email']=$email;
         header("location: area_details.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>