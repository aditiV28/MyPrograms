<?php
$servername="localhost";
$hostname="root";
$password="";
$dbname="cart";

$conn=mysqli_connect($servername,$hostname,$password);
if($conn->connect_error)
{
	die('Connection Failed: '.$conn->maxdb_connect_error);
}
mysqli_query($conn,"use $dbname");

?>