<?php

	#Get the name and marks from the form page using _POST 
	$name=$_POST["name"];
	$marks=$_POST["marks"];
	
	echo "Name is:" .$name;
	echo "<br> Marks are:" .$marks;
	echo "<br>";

	#Control Statements to check the range of marks obtained
	if($marks<400)
	{
		echo "User " .$name ." has failed";
	}

	else if($marks>=400 && $marks<500)
	{
		echo "User " .$name ." has got Pass class";
	}

	else if($marks>=500 && $marks<800)
	{
		echo "User " .$name ." has got First class";
	}

	else if($marks>800)
	{
		echo "User " .$name ." has got Distinction";
	}


?>

