<?php

 function Route()
{
$str = $_SERVER['REQUEST_URI'];
echo $str;
$arr = explode('/',$str);
echo "<br>";
print_r($arr);
$method=$arr[2];
switch($method)
{
case 'add': add($arr[3],$arr[4]);
	
	break;
case 'sub':sub($arr[3],$arr[4]);
	
	break;
case 'multiply':multiply($arr[3],$arr[4]);
	
	break;
default:
	echo "no method";


}
}
function add($a,$b)
{
	echo "Addition:" .($a+$b);
}

function sub($a,$b)
{
	echo "<br>Subtraction:" .($a-$b);
}

function multiply($a,$b)
{
	echo "<br>Multiply:" .($a*$b);
}

Route();

?>