<?php
$servername='localhost';
$username='root';
$password='';

$conn=new mysqli($servername,$username,$password);
if($conn->connect_error)
{
	die('Connection Failed: '.$conn->maxdb_connect_error);
}

?>