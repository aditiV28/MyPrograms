<?php

function Replace()
{
	#Input String
	$string = "Jack & Jill";
	
	#Converting input string into array
	$arr = explode(" ",$string);
	echo "<br> The input string in the form of array is:<br>";
	print_r($arr);
	
	
	for($x=0;$x<count($arr);$x++)
	{
		#Check the string value and replace accordingly
		if($arr[$x] == "Jack")
		{
			$arr[$x] = "Black";
		}
		if($arr[$x] == "Jill")
		{
			$arr[$x] = "Bill";
		}
  
	}
	
	#Converting array into string
	echo "<br> The replaced string is:<br>";
	print_r(implode(" " ,$arr));
}

Replace();

?>