<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "parking";
 
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
 
    //Get current date and time
    date_default_timezone_set('Asia/Kolkata');
    $d = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $t = date("H:i:s");
 	//echo("hello");
    if(!empty($_POST['status']) && !empty($_POST['slot']))
    {
    	//echo("helloinside");
    	$status = $_POST['status'];
    	$slot = $_POST['slot'];
 		//echo($slot);
    	if($slot=="A")
    	{
    		$sql="UPDATE slot_park_rel SET pid=1,slot='".$slot."',status='".$status."',date='".$d."',tim='".$t."'
 		WHERE slot='A';";
    	}
    	else
    	{
    	$sql="UPDATE slot_park_rel SET pid=1,slot='".$slot."',status='".$status."',date='".$d."',tim='".$t."'
 		WHERE slot='B';";
    	}
 		
	    //$sql = "INSERT INTO book (slot, status, date, tim)
		
		//VALUES ('".$slot."', '".$status."', '".$d."', '".$t."')";
 
		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		     		echo($slot);

		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();
?>
