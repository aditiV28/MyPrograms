<?php

//Function to check reverse of string
	function reverse()
	{
		$string = "hello";
		echo "<br>String is:$string";
		$reverse_string = "";
//Calculating length of string
		$length = strlen($string);

//Traversing the string
		for($x=$length-1; $x>=0 ; $x--)
		{
			$reverse_string.=$string[$x];
		}
  
		echo "<br>Reverse is: $reverse_string";
	}

//Call to reverse function
reverse();
?>
