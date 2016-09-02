<?php session_start(); ?>
<?php
echo '<h1>phpMyAdmin</h1>';
include 'connect.php';
$db=$_SESSION['dbname'];
mysqli_query($conn,"use $db");
echo "<a href='phpmyadmin.php'>List of Databases</a><br/>";
echo "<a href='showtables.php?dbname=".$db."'>List of Tables</a><br/>";

$tname=$_GET['tablename'];

$sql="SELECT * FROM `{$tname}`";
$temp=[];
$result=mysqli_query($conn,$sql);
$sqlc="show COLUMNS from ".$tname;
$columns=mysqli_query($conn,$sqlc);


$struct=mysqli_query($conn,"describe $tname");
echo "<h3>$tname Table Structure</h3>";
echo '<table border="1">';
echo '<tr>';
		echo '<th>Field</th>';
		echo '<th>Type</th>';
		echo '<th>Null</th>';
		echo '<th>Key</th>';
		echo '<th>Default</th>';
echo '</tr>';
while($row=$struct->fetch_assoc())
	{
		echo '<tr>';
		echo '<td>'.$row['Field'].'</td>';
		echo '<td>'.$row['Type'].'</td>';
		echo '<td>'.$row['Null'].'</td>';
		echo '<td>'.$row['Key'].'</td>';
		echo '<td>'.$row['Default'].'</td>';
		echo '</tr>';
	}
echo '</table>';


echo "<h3>$tname Table Information</h3>";

if(mysqli_num_rows($columns)>0)
{
	while($col=mysqli_fetch_assoc($columns))
	{
		array_push($temp,$col['Field']);
	}
}

$i=0;
echo '<table border="1"><tr>';
foreach($temp as $k)
{
	echo "<td>$k</td>";
}
echo "</tr>";

while($row=$result->fetch_assoc())
	{
		echo '<tr>';
		foreach ($temp as $key) 
		{
			echo '<td>'.$row[$key].'</td>';
		}
		echo '</tr>';
	}
echo "</table>";
	

?>