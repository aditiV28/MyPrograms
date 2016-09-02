<!DOCTYPE html>
<html>
<body>

<?php session_start(); ?>

<?php
	include 'connection.php';
	$DB = $_SESSION['dbname'];
	mysqli_query($conn,"use $DB");

	$Table = $_GET['tableName'];

	$desc = mysqli_query($conn,"describe $Table");
	
	echo 
    "<table border='2'>
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
	
	$status=isset($_GET['status'])?$_GET['status']:"";
	$field=isset($_GET['id'])?$_GET['id']:"";
	if($status=='sort'){
		$list = mysqli_query($conn,"SELECT* FROM $Table ORDER BY $field");
	}
	else
	{
		$list = mysqli_query($conn,"SELECT* FROM $Table");
	}
	$columns = mysqli_query($conn,"SHOW COLUMNS FROM $Table");	
	$field=[];
	while($col=mysqli_fetch_array($columns))
	{
		array_push($field,$col['Field']);
	}
	
	echo "<br> Structure of table is:<br>";
	echo "<table border=1> <tr>";
	foreach($field as $key)
	{
		echo "<br> <td><a href='tableinfo.php?status=sort&id=".$key."&tableName=".$Table."'>". $key . "</a></td>";
	}
	echo "</tr>";
	
	
	echo "<br> Records in table are:<br>";
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
	
	
	
	

	
	/* echo "<br> Ascending order by name...<br>";
	echo "<table border=1> <tr>";
	$sort = mysqli_query($conn,"SELECT* FROM $Table ORDER BY $field[1]");
	while($row2=$sort->fetch_assoc())
	{
		
		foreach($field as $key2)
		{
			echo "<td>" . $row2[$key2] . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	echo "<br> Descending order by name...<br>";
	echo "<table border=1> <tr>";
	$sort1 = mysqli_query($conn,"SELECT* FROM $Table ORDER BY $field[1] DESC");
	while($row3=$sort1->fetch_assoc())
	{
		foreach($field as $key3)
		{
			echo "<td>" . $row3[$key3] . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	echo "<br> Descending order by ID...<br>";
	echo "<table border=1> <tr>";
	$sort2 = mysqli_query($conn,"SELECT* FROM $Table ORDER BY $field[0] DESC");
	while($row4=$sort2->fetch_assoc())
	{
		foreach($field as $key4)
		{
			echo "<td>" . $row4[$key4] . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>"; */
	
?>

</body>
</html>