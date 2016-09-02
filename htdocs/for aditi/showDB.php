<?php
	include 'connection.php';
	echo '<br>PHP MyAdmin Application';
	echo '<br> Show Databases...';
	echo "<br><br>Databases on the MySQL server are:<br>";
	$sql = 'show DATABASES';
	$result = mysqli_query($conn,$sql);
		
		
	echo "<table border=1> <tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['Database'] . "<br></td>";
		echo "<td> <button type='button'> <a href='showTables.php?dbname=" . $row["Database"] . "' class ='btn btn-primary btn-lg active'> Show Tables </a></button></td>";
		/* echo "<td> <button type='button'> <a href='showTables.php?tableName=" . $row["Database"] . "' class ='btn btn-primary btn-lg active'> Sort Records </a></button></td>"; */ 
		echo "</tr>";
		/*  echo "<td> <a href='showTables.php?dbname="
		.$row['Database']
		."'>".$row['Database']
		.'</a><br/></td>';  */
		
	}
	echo "</table>";



?>