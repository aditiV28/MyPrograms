<?php

	#Open file in read mode if not able to open print error
	$myFile = fopen("abc.txt","r") or die ("Unable to open file!!");
	
	#read the file and collect its value
	$counter = fread($myFile,10);
	fclose($myFile);
	
	#increment the counter as number of times web page is viewed
	$counter++;
	$myFile = fopen("abc.txt","w");
	
	#Write the incremented value in file
	fwrite($myFile,$counter);
	fclose($myFile);
	
	echo "You are visitor number:".$counter."<br>";
?>