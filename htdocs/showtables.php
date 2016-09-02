<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<h1 align="center"> PHP MyAdmin Application </h1>
	<h3 align="center"> List Of Tables in Database </h3> 
</head>
<body>


<?php session_start(); ?>

<?php
	include 'connection.php';
	$dbname=$_GET['dbname'];
	$_SESSION['dbname']=$dbname;
	$selectDB=mysqli_select_db($conn,$dbname);
	echo "<b>List of tables:</b><br>";
	$tables=mysqli_query($conn,'show tables');
	echo "<table border=2 class='table table hover'> <tr>";
	while($table= mysqli_fetch_array($tables))
	{
		echo "<td>" .$table["Tables_in_$dbname"] . "</td>";
		echo "<td> <a href='tableInfo.php?tableName=" . $table["Tables_in_$dbname"] . "' class ='btn btn-primary'> Show Records </a></button></td>";

	}

?>




</body>
</html>