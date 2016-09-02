<?php session_start(); ?>
<?php

include 'connect.php';

$dbname=$_GET['dbname'];

echo '<h1>phpMyAdmin</h1>';
echo "<a href='phpmyadmin.php'>List of Databases</a><br/>";

$_SESSION['dbname']=$dbname;

$selected_db=mysqli_select_db($conn,$dbname);

if(!$selected_db)
{
	echo 'Database can\'t  selected';
}

echo "List of tables in <strong>$dbname</strong><br/>";

$tables=mysqli_query($conn,'show tables');

while($table= mysqli_fetch_array($tables))
{
	echo "<a href='tableinfo.php?tablename=".$table["Tables_in_$dbname"]."'>".$table["Tables_in_$dbname"].'</a><br/>';
}

?>
