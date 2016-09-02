<!DOCTYPE html>
<html>
<body>

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
	$sql = "USE employee";
	$conn->exec($sql);
	echo "<br>Database changed<br>";
	
	$sql1 = "CREATE TABLE IF NOT EXISTS emp_detail(emp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, fname VARCHAR(25),mname VARCHAR(20),lname VARCHAR(25),city VARCHAR(30),salary INT(7))";
	$conn->exec($sql1);
	echo "<br> table created<br>";
	
	
	$stmt = $conn->prepare("SELECT city,count(*) as cnt FROM emp_detail GROUP BY city");
	$stmt->bindParam(':city',$city,PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetchAll();
		echo 
    "<table border='2'>
    <tr>
    <th>CITY</th>
    <th>COUNT</th>
    </tr>";
	
	
	foreach($result as $row)
	{
		echo "<tr>";
		echo "<td>" . $row['city'] . "</td>";
		echo "<td>" . $row['cnt'] . "</td>";
		echo "</tr>";
	}
	

	
	
	
	
	
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



?>

</body>
</html>