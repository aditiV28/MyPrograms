<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";
$tableName = "emp_detail";

try 
{
	$conn = new PDO("mysql:host = $servername;dbname=$dbname;tableName=$tableName", $username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
	/* $sql = "USE employee";
	$conn->exec($sql);
	echo "<br>Database changed<br>"; */
	
	$stmt = $conn->prepare("SELECT fname FROM emp_detail WHERE emp_id=20");
	$stmt->execute();
	echo "<br>";
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	print_r($result);
	print("\n");
	
 	$stmt1 = $conn->prepare("SELECT lname FROM emp_detail");
	$stmt1->execute();
	echo "<br>";
	$result1 = $stmt1->fetchAll();
	print_r($result1);
	
	
	
	
	$sql2 = "SELECT DISTINCT lname AS RESULT FROM emp_detail";
	echo "<br>Distinct last names are:<br><br>";
	foreach($conn->query($sql2) as $column)
	{
		print $column['RESULT'] ."\n";
	}
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



?>