<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<h1 align="center"> PHP MyAdmin Application </h1>
	<h3 align="center"> List Of Databases </h3> 
</head>
<body>
 
 
 <?php
	include 'connection.php';
	$sql = 'show DATABASES';
	$result = mysqli_query($conn,$sql);
		
		
	echo "<table border=2 class='table table hover'> <tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['Database'] . "<br></td>";
		echo "<td ><a href='showTables.php?dbname=" . $row["Database"] . "' class ='btn btn-primary'> Show Tables </a></td>";
		echo "</tr>";
		
	}
	echo "</table>";
?>
</body>
</html>