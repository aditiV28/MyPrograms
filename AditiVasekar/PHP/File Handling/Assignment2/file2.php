<?php
	$myFile = file("hello.txt");                            // Reading file into array
	print_r($myFile);
	array_push($myFile,'Welcome to Cybage');               // Adding new element in array
	echo '<br>';
	print_r($myFile);
	$f1 = fopen("hello.txt","a");
	file_put_contents("hello.txt",$myFile);               //Adding/Updating file's nth line                           
	echo '<br>';
	echo file_get_contents("hello.txt");                //Printing file contenets
	fclose($myFile);
?>