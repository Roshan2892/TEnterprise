<?php
   	$host = "localhost";
	$dbname = "Test";
	$user = "root";
	$password = "";
   	try{
		$conn=  new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully"; 
	}
	catch(PDOException $e)
	{
	    //echo "Connection failed: " . $e->getMessage();
	}
?>