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
 
    if(!empty($_POST['status']) && !empty($_POST['slot']))
    {
    	$status = $_POST['status'];
    	$slot = $_POST['slot'];
        echo $slot;
        if ($slot="A") {
            $sql = "UPDATE slot_park_rel 

    SET pid= 1,slot=".$slot.",status=".$status.",date=".$d.",tim=".$t."
    WHERE slot='A';";
            
        }
        else{
          $sql = "UPDATE slot_park_rel
            SET pid= 1,slot=".$slot.",status=".$status.",date=".$d.",tim=".$t."
            WHERE slot='B';"; 
        }


		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
            echo($status);
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();
?>
