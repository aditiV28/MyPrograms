<!DOCTYPE html>
<html>
<body>


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
	
	/* $stmt = $conn->prepare("INSERT INTO employee (name,department,salary,gender) VALUES (:name,:department,:salary,:gender)");
	$stmt->bindParam(':name',$Name);
	$stmt->bindParam(':department',$Department);
	$stmt->bindParam(':salary',$Salary);
	$stmt->bindParam(':gender',$Gender);
	
	$Name = "Shailesh Dhumal";
	$Department = "Development";
	$Salary = 20000.00;
	$Gender = "M";
	$stmt->execute();
	
	$Name = "Shailesh Kumaran";
	$Department = "QA";
	$Salary = 50000.00;
	$Gender = "M";
	$stmt->execute();

	$Name = "Venetha Venkatesh";
	$Department = "QA";
	$Salary = 30000.00;
	$Gender = "F";
	$stmt->execute();
	
	$Name = "Sandip Kulkarni";
	$Department = "Development";
	$Salary = 80000.00;
	$Gender = "M";
	$stmt->execute(); */
	
	
	 $stmt1 = $conn->prepare("SELECT* FROM employee ORDER BY salary DESC");
	$stmt1->execute();
	$result = $stmt1->fetchAll();
	
	   echo 
    "<table border='2'>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Department</th>
    <th>Salary</th>
    <th>Gender</th>
    </tr>";
	
	foreach($result as $row)
	{
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['department'] . "</td>";
		echo "<td>" . $row['salary'] . "</td>";
		echo "<td>" . $row['gender'] . "</td>";
		echo "</tr>";
	
	}
	
	
	
	
	

	
}



catch(PDOException $e)
{
	echo "Connection falied". $e->getMessage();
}

?>

</body>
</html>


