<?php
	$myFile = fopen("url.txt","w");
	$contents = file_get_contents("http://www.google.com");
	echo "$contents";
	fwrite($myFile,$contents);
	echo fread($myFile,30);
	fclose($myFile);

?>
