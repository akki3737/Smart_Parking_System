<!DOCTYPE html>
<html>
<head>
  <title>Manager Login</title>
  <link rel="stylesheet"  href="../css/area_details.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
$(function () {
    $("#fileupload").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#dvPreview");
            dvPreview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "height:200px;width: 200px");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    dvPreview.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});
</script>
</head>
<body>
  <div class="header">
     <div class="container" style="background-color: white;">
        <div class="content">
          <font size="20px">Easy</font>
          <font size="20px" style="color: green">parking</font>
        </div>
        <div class="logo">
          <img src="../img/logo.jpg" alt="logo" height="90px" width="80px">
        </div>
        <div class="tagline">
          <font size="4px">Smart. Beautiful. Parking</font>
        </div>
        <div class="button">
          <a href="./img.html" class="linked-button">Home</a>
          <a href="./img.html" class="linked-button">Help</a>
          <button class="linked-button"><a href="logout.php"style="text-decoration: none;">Logout</a></button>
          <?php
      session_start();
        $email=$_SESSION["email"];
        $_SESSION['email']=$email;
        echo($email);
        //echo "welcome " . $_SESSION["email"] . ".";
      ?>

        </div>
      </div>
  </div>

  <div class="body1">
    <img src="../img/car20.jpg" height="530px" width="100%">
  
    <div class="body1-content">
        <form action="area.php" method="POST">
    <input type="text" name="name" placeholder="Area Name"  style="width: 400px; background-color: rgba(85, 91, 117, 0.1);color: white;" /><br>
    
    <input type="text" name="add" placeholder="Address"  style="width: 400px;  font-size: 20px;" /><br>
    <input type="text" name="office_no" placeholder="Office_no." style="width: 400px;"/>
    <!--<label for="time" style="font-size: 25px;font-family: ROBOTO;left:150px; color: white;position: absolute; ">Timings</label><br>
    <label for="from" style="font-size: 20px;top: 290px;position: absolute;color: white;">From</label>
    <input type="text" name="timing" placeholder="Timing" style="width: 170px;position: absolute;top: 320px;" />
    <label for="to" style="font-size: 20px;top: 290px;position: absolute;left: 250px;color: white;">To</label>
    <input type="time" name="timing2" placeholder="Timing" style="width: 170px;position: absolute;top: 320px;left: 250px;" />-->
    <!--<label for="o_car" style="font-size: 25px;position: absolute;top: 280px;left: 150px;">Car Occupancy</label>-->
    <!--<input type="text" name="timing" placeholder="enter your timings" style="width: 300px;"/>-->
    <input type="number" name="o_car" placeholder="Occupancy-car" min="1" max="100" style="position: absolute;top: 400px;width: 170px;"/>
    <input type="number" name="o_bike" placeholder="Occupancy-Bike" min="5" max="200" style="position: absolute;top: 400px;width: 170px; left: 250px;">
    <input type="text" name="lat" placeholder="enter latitude"  style="width: 400px;  font-size: 20px;" /><br>
    <input type="text" name="lon" placeholder="enter longitude"  style="width: 400px;  font-size: 20px;" /><br>
    <input type="text" name="timing" placeholder="enter your timings" style="position: absolute;top:500px;width: 400px;"/>

    <!--<input type="text" name="o_bike" placeholder="Occupancy-Bike" />-->  
    
    
   
 
       
    </div>
    <div id="body1-content_right">
      <label style="position: absolute;top: 20px; font-size: 30px;left: 30px;color: white;">Area Images</label>

     <input type="file" id="fileupload" multiple="multiple" style="position: absolute;top: 50px;left: 30px;color: white;top: 80px;">
        <div id="dvPreview" style="position: absolute;top: 130px;left: 30px;">
        </div> 
        <input type="submit" name="area_submit" value="Add Details" / style="position: absolute;font-size: 20px;width:150px;left: 70px;top: 400px;"> 
        </form>
   </div>
  </div>

</body>
</html>
