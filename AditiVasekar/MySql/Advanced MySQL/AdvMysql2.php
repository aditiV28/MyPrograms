<?php
$servername = "localhost";
$username = "root";
$password = "";

try
{
	$conn = new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully!";
	$sql = "CREATE DATABASE IF NOT EXISTS EmployeeRecords";
	$conn->exec($sql);
	echo "<br> Database created!";
	
	$sql1 = "USE EmployeeRecords";
	$conn->exec($sql1);
	echo"<br> Database changed!";
	
	$sql2 = "CREATE TABLE IF NOT EXISTS employee(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(30),department VARCHAR(20),salary FLOAT(10),gender VARCHAR(1))";
	$conn->exec($sql2);
	echo "<br>Table created!"; 
	
	
	
	 $stmt1 = $conn->prepare("SELECT sum(salary) FROM employee WHERE department='QA'");
	$stmt1->execute();
	$result = $stmt1->fetch(PDO::FETCH_ASSOC);
	echo "<br>";
	print_r($result);
	

	
	
	
	
	
	
	

	
}



catch(PDOException $e)
{
	echo "Connection falied". $e->getMessage();
}

?>



