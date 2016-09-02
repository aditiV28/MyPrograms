<?php
echo "Trying to connect...";

$servername = "localhost";
$username = "root";
$dbName = (isset($_POST['dbName']) ? $_POST['dbName'] : ''); 

try{

	$conn = new PDO("mysql:host=$servername" , $username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	echo "<br>Connected successfully!!";
	
/* 	$stmt = $conn->prepare("SHOW DATABASES");
	echo "<br><br>Databases on the MySQL server are:";
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	foreach($result as $Result)
	{	
		
		echo "<br>" . $Result['Database'] . " " ;
	}
	
	
	$sql = "USE $dbName";
	$stmt1 = $conn->prepare("USE  $dbName" );
	$stmt1->execute();
	$query = $conn->prepare($sql);
	
	echo "<br><br>Changing to database employee.....";
	echo "<br><br> Database changed!!"; 
	
	
	$stmt2 = $conn->prepare("SHOW TABLES");
	$stmt2->execute();
	$result2 = $stmt2->fetchAll();
	echo "<br><br> Tables in the employee database is/are:<br>";
	foreach($result2 as $Result2)
	{
		echo "<br>" . $Result2['Tables_in_employee'];
	}
	$statement = $conn->prepare("DESCRIBE emp_detail");
	$statement->execute();
	$result3 = $statement->fetchAll(PDO::FETCH_ASSOC);
	echo "<br><br>The structure of selected table is:<br>";
 
	foreach($result3 as $column)
	{
		echo $column['Field'] . ' - ' . $column['Type'], '<br>';
	}
	
	$stmt4 = $conn->prepare("SELECT* FROM emp_detail");
	$stmt4->execute();
	$result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
	echo "<br>";
	echo 
    "<table border='2'>
    <tr>
    <th>ID</th>
    <th>FirstName</th>
    <th>MiddleName</th>
    <th>LastName</th>
    <th>City</th>
    <th>Salary</th>
    </tr>";
	foreach($result4 as $row)
	{
		echo "<tr>";
		echo "<td>" . $row['emp_id'] . "</td>";
		echo "<td>" . $row['fname'] . "</td>";
		echo "<td>" . $row['mname'] . "</td>";
		echo "<td>" . $row['lname'] . "</td>";
		echo "<td>" . $row['city'] . "</td>";
		echo "<td>" . $row['salary'] . "</td>";
		echo "</tr>";
	}

	
	$stmt5 = $conn->prepare("SELECT* FROM emp_detail ORDER BY fname");
	$stmt5->execute();
	$result5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
	
	echo 
    "<table border='2'>
    <tr>
    <th>ID</th>
    <th>FirstName</th>
    <th>MiddleName</th>
    <th>LastName</th>
    <th>City</th>
    <th>Salary</th>
    </tr>";
	
	echo "<br><br>Sorting table in ascending according to Name.......<br><br>";
	foreach($result5 as $row)
	{
		echo "<tr>";
		echo "<td>" . $row['emp_id'] . "</td>";
		echo "<td>" . $row['fname'] . "</td>";
		echo "<td>" . $row['mname'] . "</td>";
		echo "<td>" . $row['lname'] . "</td>";
		echo "<td>" . $row['city'] . "</td>";
		echo "<td>" . $row['salary'] . "</td>";
		echo "</tr>";
	}
	
	
	$stmt6 = $conn->prepare("SELECT* FROM emp_detail ORDER BY fname DESC");
	$stmt6->execute();
	$result6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
	
	echo 
    "<table border='2'>
    <tr>
    <th>ID</th>
    <th>FirstName</th>
    <th>MiddleName</th>
    <th>LastName</th>
    <th>City</th>
    <th>Salary</th>
    </tr>";
	
	echo "<br><br>Sorting table in descending according to Name.......<br><br>";
	foreach($result6 as $row)
	{
		echo "<tr>";
		echo "<td>" . $row['emp_id'] . "</td>";
		echo "<td>" . $row['fname'] . "</td>";
		echo "<td>" . $row['mname'] . "</td>";
		echo "<td>" . $row['lname'] . "</td>";
		echo "<td>" . $row['city'] . "</td>";
		echo "<td>" . $row['salary'] . "</td>";
		echo "</tr>";
	}
	
	
	$stmt7 = $conn->prepare("SELECT* FROM emp_detail ORDER BY emp_id DESC");
	$stmt7->execute();
	$result7 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
	
	echo 
    "<table border='2'>
    <tr>
    <th>ID</th>
    <th>FirstName</th>
    <th>MiddleName</th>
    <th>LastName</th>
    <th>City</th>
    <th>Salary</th>
    </tr>";
	
	echo "<br><br>Sorting table in descending according to Name.......<br><br>";
	foreach($result7 as $row)
	{
		echo "<tr>";
		echo "<td>" . $row['emp_id'] . "</td>";
		echo "<td>" . $row['fname'] . "</td>";
		echo "<td>" . $row['mname'] . "</td>";
		echo "<td>" . $row['lname'] . "</td>";
		echo "<td>" . $row['city'] . "</td>";
		echo "<td>" . $row['salary'] . "</td>";
		echo "</tr>";
	}  */
		
	
	
	

	
	
	}
	
catch(PDOException $e)
{
	echo "Connection failed!!".$e->getMessage();
}
?>