<?php
	//Stack and Queue Implementation	
	$arr_element = array("2","3","5");
	print_r($arr_element);		
	
	echo "<br><br>";

	array_push($arr_element,"4","6");
	print_r($arr_element);	
	
	echo "<br><br>";
	array_pop($arr_element);
	print_r($arr_element);	
	
	#Queue Implementation

	echo "<br><br>";

	array_unshift($arr_element,"9");
	print_r($arr_element);	
	
	echo "<br><br>";
	array_shift($arr_element);
	print_r($arr_element);



?>