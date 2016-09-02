<?php

	$servername = "localhost";
	$username = "root";
	$password = "";


	try{

		$conn=new mysqli($servername,$username,$password);
		if($conn->connect_error)
		{
			die('Connection Failed: '.$conn->maxdb_connect_error);
		}
	}
	
	catch(PDOException $e)
	{
		echo "Connection failed!!".$e->getMessage();
	}
?>