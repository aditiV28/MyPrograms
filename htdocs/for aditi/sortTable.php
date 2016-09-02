<?php session_start(); ?>

<?php
	include 'connection.php';
	$DB = $_SESSION['dbname'];
	mysqli_query($conn,"use $DB");

	$Table = $_GET['tableName'];

	$columns = mysqli_query($conn,"SHOW COLUMNS FROM $Table");	
	$field=[];
	while($col=mysqli_fetch_assoc($columns))
	{
		array_push($field,$col['Field']);
	}
	
	

		echo "<table border=1> <tr>";
		foreach($field as $key)
		{
			echo "<br> <td>". $key . "</td>";
		}
		echo "</tr>";
		
		$sort = mysqli_query($conn,"SELECT* FROM $Table");
		while($row2=$sort->fetch_assoc())
		{
			echo "<tr>";
			foreach($field as $key2)
			{
				echo "<td>" . $row2[$key2] . "</td>";
			}
			echo "</tr>";
			
		}
		echo "</table>";
	
		
	
	/* echo "<table border=1> <tr>";
	foreach($field as $key)
	{
		echo "<br> <td>". $key . "</td>";
	}
	echo "</tr>";
	echo "<br> Descending order by name...<br>";
	$sort1 = mysqli_query($conn,"SELECT* FROM $Table ORDER BY $field[1] DESC");
	while($row3=$sort1->fetch_assoc())
	{	echo "<tr>";
		foreach($field as $key3)
		{
			echo "<td>" . $row3[$key3] . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	
	echo "<table border=1> <tr>";
	foreach($field as $key)
	{
		echo "<br> <td>". $key . "</td>";
	}
	echo "</tr>";
	echo "<br> Descending order by ID...<br>";
	$sort2 = mysqli_query($conn,"SELECT* FROM $Table ORDER BY $field[0] DESC");
	while($row4=$sort2->fetch_assoc())
	{	echo "<tr>";
		foreach($field as $key4)
		{
			echo "<td>" . $row4[$key4] . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>"; */
	
?>

