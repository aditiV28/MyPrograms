<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<h1 align="center"> PHP MyAdmin Application </h1>
	<h3 align="center"> Table Info </h3> 
</head>
<body>

<?php session_start(); ?>

<?php
	include 'connection.php';
	$DB = $_SESSION['dbname'];
	mysqli_query($conn,"use $DB");

	$Table = $_GET['tableName'];

	$desc = mysqli_query($conn,"describe $Table");
	
	echo 
    "<table border='2' class='table table hover'>
    <tr>
    <th>Field</th>
    <th>Type</th>
    <th>Null</th>
    <th>Key</th>
    <th>Default</th>
    <th>Extra</th>
    </tr>";
	echo "<br>";
	
	while($row=$desc->fetch_assoc())
	{
		echo "<tr>";
		echo "<td>" . $row['Field'] . "</td>";
		echo "<td>" . $row['Type'] . "</td>";
		echo "<td>" . $row['Null'] . "</td>";
		echo "<td>" . $row['Key'] . "</td>";
		echo "<td>" . $row['Default'] . "</td>";
		echo "<td>" . $row['Extra'] . "</td>";
		echo "</tr>";
	}
	
	$AscDesc = "";
	$status = isset($_GET['status'])?$_GET['status']:"";
	$col_name = isset($_GET['id'])?$_GET['id']:"";
	$AscDesc = isset($_GET['AscDesc'])?$_GET['AscDesc']:"ASC";

	
	if($status=='sort')
	{
		$list = mysqli_query($conn,"SELECT* FROM $Table ORDER BY $col_name $AscDesc");
	}
	
	
	else
	{
		$list = mysqli_query($conn,"SELECT* FROM $Table");
	}
	
			switch(strtoupper($AscDesc))
		{
		case 'DESC': $AscDesc = 'ASC';break;
		case 'ASC' : $AscDesc = 'DESC';break;
		default: $AscDesc = 'ASC'; break;
		}
	
	$columns = mysqli_query($conn,"SHOW COLUMNS FROM $Table");	
	$field=[];
	while($col=mysqli_fetch_assoc($columns))
	{
		array_push($field,$col['Field']);
	}
	
	echo "<br><strong> Structure of table is:</strong><br>";
	echo "<table border=2 class='table table hover'> <tr>";
	foreach($field as $key)
	{
		echo "<br> <td><a href='tableInfo.php?status=sort&id=". $key ."&tableName=" .$Table. "&AscDesc=" .$AscDesc.  "'>".$key."</a></td>";
	}
	echo "</tr>";
	
	
	echo "<br><b> Records in table are:</b><br>";
	while($row1=$list->fetch_assoc())
	{
		echo "<tr>";
		foreach($field as $key1)
		{
			echo "<td>" . $row1[$key1] . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";

?>

</body>
</html>