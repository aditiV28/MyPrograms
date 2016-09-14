<?php
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";

if(!$_SESSION['cart_items'])
{
	$_SESSION['cart_items']=[];
}

if(array_key_exists($id, $_SESSION['cart_items'])){
	header('Location:viewcart.php?action=exists&id='.$id.'&name='.$name);
}
else
{
	$_SESSION['cart_items'][$id]=$name;
	header('Location:viewcart.php?action=added&id='.$id.'&name='.$name);
}
?>