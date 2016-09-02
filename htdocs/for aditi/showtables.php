<!DOCTYPE html>
<html>
<body>


<?php session_start(); ?>

<?php
	include 'connection.php';
	$dbname=$_GET['dbname'];
	$_SESSION['dbname']=$dbname;
	$selectDB=mysqli_select_db($conn,$dbname);
	echo "List of tables :<br>";
	$tables=mysqli_query($conn,'show tables');
	echo "<table border=1> <tr>";
	while($table= mysqli_fetch_array($tables))
	{
		echo "<td>" .$table["Tables_in_$dbname"] . "</td>";
		echo "<td> <button type='button' name='showRecords'> <a href='tableInfo.php?tableName=" . $table["Tables_in_$dbname"] . "' class ='btn btn-primary btn-lg active'> Show Records </a></button></td>";
		//echo "<td> <button type='button' name='sortRecods'> <a href='sortTable.php?tableName=" . $table["Tables_in_$dbname"] . "' class ='btn btn-primary btn-lg active'> Sort Records </a></button></td>";
		
		
		/* echo "<th> <a href='tableInfo.php?tableName="
		.$table["Tables_in_$dbname"]
		."'>"
		.$table["Tables_in_$dbname"]
		.'</a><br/></th>'; */
	}

?>

<!--<form action="tableInfo.php" method="post">
<a href='tableInfo.php?tableName="
		.$table["Tables_in_$dbname"]
		."' class='btn btn-primary btn-lg active' role='button'>Show Records</a>
</form> -->


</body>
</html>