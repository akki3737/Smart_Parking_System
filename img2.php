<!doctype html>
<html>
<head>
<link rel="stylesheet"  href="img2.css">
<link rel="stylesheet" href="cutomerlogin.css">
<link rel="stylesheet" href="data.css">
<link rel="stylesheet" href="style.css">  
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
<script>
$(document).ready(function(){
    $("#mybbtn").click(function(){
        $("#myModal1").modal();
    });
});

</script>


<style>
a:link {
    color:  #14F1EE;
   	}

</style>
<style>
 
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 20px;

  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  .btn {
    background-color:white; /* Green */
    border: none;
    color: green;
    padding: 10px 10px 10px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin:1px 1px;
    cursor: pointer;
    font-size: 20px;
    transition: all 0.5s;
}

  </style>

</head>
<body>
<script  type="text/javascript">
function getLocation()
    {
      console.log("click");
      if(navigator.geolocation)
      {
        navigator.geolocation.getCurrentPosition(redirectToPosition);
      }
      else{
        x.innerHTML="Please update your browser";
      }
  }
  function redirectToPosition(position)
  {
  var x=alert("Share your location");
  window.location='result.php?lat='+position.coords.latitude+'&lon='+position.coords.longitude;
  //document.write(lat);
  //document.write("jijiwdefueffhfifefiuewuifuewi;fuiewfuiregfuigrfuigruifgruifgeuifge");
  }
  
</script>
<!--div--><div class="header">
 <div class="container" style="background-color: white;">
  <!--<img src="car1.jpg" alt="Parking" style="width:100%;">-->
  <div class="content">
    <font size="20px">Easy</font>
    <font size="20px" style="color: green">parking</font>
   
        
    <!--<p>Two and Four wheelers</p>-->
     </div>
     <div class="welcome">
       <?php
      session_start();
        echo "welcome " . $_SESSION["email"] . ".";
      ?>
     </div>
      


<!-- end of div-->

<div class="logo">
  <img src="logo.jpg" alt="logo" height="90px" width="80px">
</div>



<div class="tagline">
<font size="4px">Smart. Beautiful. Parking</font>
</div>

   </div>
   </div>
<!------------------------>
<!-- search conatiner            and div body class starts-->




  
  
 

<!--   body class ends-->



<!--login-->

<div class="fade" id="myModal" role="dialog">
  <div class="modal-dialog2">
 <div id="login-box">
    <h1 style="top: 50px;left: 150px;position: absolute;">Login</h1>
  <div class="left">
    <form action="signup.php" method="POST">
    <input type="text" name="email" placeholder="E-mail" />
    <input type="password" name="password2" placeholder="Password" />
    <input type="submit" name="submit" value="Login" onclick="#" />
    <a href="#" style="position: absolute;right: 80px;top:200px; color: green;"> Forgot Password</a>
  </div>
    </form>
    </div>
</div></div>




<!-- signin-->

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
 

 <div id="login-box">
  <div class="left">
    <h1 style="color: green;">Sign up</h1>
 <form action="signup.php" method="POST">
     <input type="text" name="fname" placeholder="First Name" />
      <input type="text" name="lname" placeholder="Last Name" />
    <input type="text" name="contact" placeholder="Contact" />
    <input type="text" name="email" placeholder="E-mail" />
    <input type="password" name="password" placeholder="Password" />
    <input type="password" name="password2" placeholder="Retype password" />
   
    
    <label style="top: 380px; color:grey ; font-size: 15px;">Male</label>
    <input type="radio" name="sex" value="Male">
    <label style="top: 380px; color:grey ; font-size: 15px;">Female</label>
    <input type="radio" name="sex" value="Female">Female<br>
    
    <input type="submit" name="signup" value="Sign me up" style="font-size: 15px; top: 400px;" />
  </div>
      </form>
 
  <div class="right">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
   <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>

    <a href="mangersign.html" style="position: absolute;top: 500px;right: 50px; color: green;">SignUp Manager</a> 
  </div>
 <div class="or" style="color:green;background-color: white;top: 200px;">OR</div>
</div>
 </div>
</div></div>

 


 
<!-- the second half-->
<div class="body2">
	

<div class="data">

 <h1> <p> Easy parking</p></h1><br><br>
  <section>
  	<div class="data1"> <p style="text-indent: 1em;"><font size="5">Anywhere, Anytime&emsp;&emsp;&emsp;&emsp;&emsp;
  	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Fuel Saving&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  	&emsp;&emsp;&emsp;Seamless Experience</font></p><br>
  	</div>
 

   </section>
 <div id="data-content">
  <p style="line-height: 1.7">&emsp;<font>Choose from so many places across Mumbai&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Save fuel while in search for Parking&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  &emsp;Pay for EasyParking spaces via the website<br>&emsp;
  Find the best option for every journey&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Double your journey with less fuel&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  	&emsp;Follow easy directions and access instructions</font></p> 
 
</div>
</div></div>
<div class="linked">
    <a class="active" href="#" style="color:green">Home</a>
    <a href="img2.php" style="color:green">Help</a>
   </div>
   
   
   <div class="linked-button">
   
   <!--<button class="btn" id="myBtn">Login</button>-->
   
     <!-- <a href="signup.html" style="color: green">signup</a>
     <button class="bbtn" id="mybbtn">Signup</button>-->
   
      <a href="logout.php" style="color: green;text-decoration: none;">Logout</a>
     </div>
<div class="a-body">


<img src="car2.jpg" alt="Smiley face" height="600px" width="100%"> 

<div class="body-content">
<h1><p>Smart Parking is always better Parking.</p>

<p>Connect to Smart cities with Smart Parking.</p></h1>
<div class="body-content2">
  <p>End to end parking digitisation - our technology provides realtime bird's eye view of all <br>parking information to urban commuters, parking management companies, and the city<br> administration.</p>
  </div>

  <button class="reserve" style="position: absolute;top: 340px;background-color:green; font-size: 20px;left: 300px;color:white; border-style: all;border-radius: 30px;" onclick="getLocation()">Search for Parkings</button> 

<!--
<div id ="search1">
 <form>
  <input type="text" name="search" placeholder="Search..">
  <div id="search-button"><button name="button" value="submit" type="button" style="background-color: transparent;"><i class="fa fa-search"></i></button>
</form>
</div>-->
<div class="mobmap">
  <img src="mobilemap.jpg" alt ="mobilemap.jpg" height="500px" width="400px">
  <div class="ifr">
<iframe src="park_home.php" width="200px" height="340px" frameborder="0" scrolling="no" style="position: absolute;right: 265px; top: 142px;"></iframe>
</div>
</div>


<!--<div class="body3">-->
	<!--<div class="img1">
	<img src="car1.jpg" height="400px" width="100%">
	</div>-->
<!--<div class="data2">
	<img src="search1.jpg" alt="search" height="100px" width="120px"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<img src="pointer2.jpg" alt="pointer" height="100px" width="120px" style="border-radius: 20px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
	<img src="park.jpg" alt="park" height="100px" width="120px" style="border-radius: 20px">
</div>

<div class="data-content1">
	<p><font size="5"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Search&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Book&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Park</font></p>
</div>
<div class="data-content2">
	<p style="line-height: 1.1;"><font>&emsp;&emsp;&emsp;Search and compare all available parking options and&emsp;&emsp;&emsp;&emsp;&emsp;Pre-purchase the perfect spot and have a&emsp;&emsp;&emsp;&emsp;&emsp;Redeem your purchase seamlessly at your selected  <br>
	 &emsp;&emsp;&emsp;prices at thousands of parking lots and garages in &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;guaranteed space waiting for you when &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;location! It’s that easy. Save time and money with <br>
	 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Mumbai in real-time.&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;you need it.&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;hassle-free parking.</font></p>
</div>	-->
</div>

</body>
</html> 