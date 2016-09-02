<?php
include 'connect.php';

echo '<h1>phpMyAdmin</h1>';
echo '<h3>List of Databases</h3>';

$sql='show DATABASES';
$output=mysqli_query($conn,$sql);

while($row= mysqli_fetch_array($output))
{
	echo "<a href='showtables.php?dbname=".$row['Database']."'>".$row['Database'].'</a><br/>';
}
?>
