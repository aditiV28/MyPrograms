<?php
$servername = "localhost";
$username = '';
try{
$conn = new PDO("mysql:host=$servername");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully!";
	
	if(empty($_POST['uname']))
	{
		echo 'Username missing';
	}
	$username = $_POST['uname'];
	echo addslashes($username);
	
}

catch(PDOException $e)
{
	echo "Connection falied". $e->getMessage();
}


?>