<?php
//session_start();
$conn=require("database.php");
$flag=0;
/*$servername="localhost";
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
    //$_SESSION['conn'] = $conn;
} */
//$conn = $_SESSION['conn'];
//$userlon=73.1926;
//$userlat=19.3425;
//$latitude2=19.1668;
//$longitude2=73.2368;
    // extract($_POST);
$lat =(isset($_GET['lat']))?$_GET['lat']:'';
$lat=(float)$lat;
//echo("got lat");
//echo($lat);
$lon=(isset($_GET['lon']))?$_GET['lon']:'';
$lon=(float)$lon;
//echo("got lon");
//echo($lon);

//echo ($lon);
function getDistance($lat,$lon,$latitude2,$longitude2)
{
	$earthRadius=6371;
	$latFrom= deg2rad($lat);
	$lonFrom= deg2rad($lon);
	$latTo= deg2rad($latitude2);
	$lonTo= deg2rad($longitude2);
	$latDelta=$latTo -$latFrom;
	$lonDelta=$lonTo -$lonFrom;
	$angle=2*asin(sqrt(pow(sin($latDelta/2),2)+ cos($latFrom)*cos($latTo)*pow(sin($lonDelta/2),2)));
	return $angle*$earthRadius;
}
//$dist=getDistance($userlat,$userlon,$latitude2,$longitude2);
//echo($dist);
$sql="select pid,latitude,longitude from manager_park_lot where pid in(select pid from slot_park_rel where book_status='unreserve')";
//echo($sql);
$result1=mysqli_query($conn,$sql);
$resultCheck1=mysqli_num_rows($result1);
if($resultCheck1>0)
{
while($row=mysqli_fetch_assoc($result1))
{
//echo("hi heko\n");
$i=0;
//echo($row['latitude']);
//echo($row['longitude']);
$distance[$i]=getDistance($lat,$lon,$row['latitude'],$row['longitude']);
$try=$distance[$i];

//echo("try");
//echo($try);
$sql2="Insert into dist(pid,distance) values($row[pid],$try)";
mysqli_query($conn, $sql2); 
$i++;
}
}
$d=5;//km
do{
    echo '
<!DOCTYPE html>
<html>
<head>
    <title>Find Parking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main_class{
            width: 40vw;
            height: auto;
            background-color: white;
            padding: 1vw;
            margin: 1vw;
            border-radius: 1vw;
        }

        .child_class{
            border-radius: 1vw;
            display: flex;
            width: 40vw;
            height: 20vh;
            background-color: gray;
            margin-bottom: 1vw;
            border: 1px solid black;
            left: 0;
        }

        .images{
            margin: 1vw;
            display: inline-block;
            width: 6vw;
            height: 6vw;
            margin-right: 4vw;
        }

        .content{
            display: inline;
            margin-top: -2.5vw;
            top: 200px;
        }

        .content2{
            display: inline;
            margin-top: -2.5vw;
            margin-left: 4vw;
        }

        .content>p, .content2>p{
            font-size:12px;
        }

        .child_class:nth-child(odd){
            background-color: white;
        }

        .child_class:nth-child(even){
            background-color: gray;
        }

        button{
            padding: 1.5vh 2vh;
            margin-top: 7vh;
            margin-left: 6vh;
            border-radius: 2vh;
        }
        #iframe{
        top: 30px;
        right: 30px;
        position: absolute;
        border-radius: 20px;

    }
    </style>
</head>
<body>   <div class="main_class">';


    $sql3="select * from manager_park_lot where pid in(select pid from dist where distance<=$d);";
    //echo($sql);
    $result3=mysqli_query($conn, $sql3);
    $resultCheck3=mysqli_num_rows($result3);
    if($resultCheck3>0)
    {
      while($row=mysqli_fetch_assoc($result3))
        {
            //echo("ss13");
            //echo $row["name"];
            //echo $row["address"];
            //echo "end";
            //echo '<h1>'.$row["address"].'</h1>';
           echo '  
        <div class="child_class">
            <div>
                <img class="images" src="park.png">
            </div>
            <div class="content">;
                
                <h5>'.$row["name"].'</h5>
                <p>'.$row["address"].'</p>
                <p>'.$row["titming"].'</p>
                <p>office_no:'.$row["office_no"].'</p>


            </div>
           <div class="content2">;
                
                <h5>occupancy_bike:'.$row["occupancy_bike"].'</h5>
                <h5>occupancy_car:'.$row["occupancy_car"].'</h5>


            </div>
            <div>
                <button type="submit" onclick="">Book</button> 
            </div>
        </div>';
                   }   
        $flag=1;
        break;
    }
      else{
        $d++;
      }
}while($d<=15.000);
if ($flag==0) {
    echo("did not found");
}

echo '</div>
<div id="iframe">
<iframe src="plot.php" width="700px" height="600px" frameborder="0"></iframe>
</div>
</body>
</html>';
//$sql4="select "
//$address="ambernath";
// function to geocode address, it will return false if unable to geocode address
/*function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyA38HWPy9tYbRaFvP6psEZ37A-hyFMT_ZE&callback";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
         echo($lati);
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}
geocode($address);
//echo(data_arr[0]);
$address="ambernath";
$address = urlencode($address);//properly encode the url
echo($address);
// google map geocode api url
$url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyB6YuVBiECVUTFsNYB8qL7itN3IkUzELIk&callback";
 // get the json response
$resp_json = file_get_contents($url);
// decode the json
$resp = json_decode($resp_json, true);
//the  response status would  be 'OK', if are able to geocode the given address 
if($resp['status']=='OK'){
// get the longtitude and latitude data
$lat = $resp['results'][0]['geometry']['location']['lat'];
$long = $resp['results'][0]['geometry']['location']['lng'];
echo($lat);
}
else{
	echo("error");
}*/
?>