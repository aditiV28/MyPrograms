<?php

//Function to check palindrome
	function palindrome()                            	
	{
		$string = "noon";
//Calculating length of string 
		$length = strlen($string);  

//Create new empty string		
		$new_string = "";                          	

//Traversing the original string in reverse order
		for($x=$length-1;$x>=0;$x--)              	 
		{
			$new_string.=$string[$x];
		}
// Check if the original and new string are equal                                                
		if($string == $new_string)
		{
			echo 'String is a palindrome';
		}
		else
		{
			echo 'String is not palindrome';
		}
	}

// Call to palindrome function.
palindrome();                               


?>