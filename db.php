<?php
/**
 * 
 */
class db
{
	private $host = "localhost";
	private $dbname= "parking";
	private $user = "root";
	private $pass = "";
	public function connect()
	{
		try{
			$conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			echo "data done";
			return $conn;
		}catch(PDOException $error){
			$error->getMessage();
    die();
		}
	}
}
?>