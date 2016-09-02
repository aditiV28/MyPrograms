<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
	/*$sql = "CREATE DATABASE IF NOT EXISTS Employee";
	$conn->exec($sql);
	echo "<br> DATABASE created successfully!"; */
	
	$sql1 = "CREATE TABLE IF NOT EXISTS emp_detail(emp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, fname VARCHAR(25),mname VARCHAR(20),lname VARCHAR(25),city VARCHAR(30),salary INT(7))";
	$conn->exec($sql1);
	echo "<br> table created<br>";
	
	
	
	$stmt = $conn->prepare("INSERT INTO emp_detail (fname,mname,lname,city,salary) VALUES (:fname,:mname,:lname,:city,:salary)");
	$stmt->bindParam(':fname',$firstname);
	$stmt->bindParam(':mname',$middtname);
	$stmt->bindParam(':lname',$lastname);
	$stmt->bindParam(':city',$city);
	$stmt->bindParam(':salary',$salary);
	
	$firstname = "John";
	$middtname = "Martin";
	$lastname = "Black";
	$city = "New York";
	$salary = 25000;
	$stmt->execute();
	
	$sql2 = "SELECT CONCAT(fname, '  ' ,mname, '  ' ,lname) AS RESULT FROM emp_detail WHERE fname='John' ";
	foreach ($conn->query($sql2) as $row) {
        print $row['RESULT'] . "\t\n";
       
    }
	
	
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	

?>
