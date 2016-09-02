<?php
	$arr  = array("Red","Blue","Oragne","Red","Pink","Black","Oragne");
	echo "Main array:<br>";
	print_r($arr); 
	$arr_unique = array_unique($arr);
	echo "<br>Unique elements in the array:<br>";
	print_r($arr_unique);
	$cnt_unique = count($arr_unique);
	$arr_val = array();
	for($x=0;$x<$cnt_unique;$x++)
	{
	  array_push($arr_val,0);
	}
	echo "<br>Value array:<br>";
	print_r($arr_val);
	$arr_combine = array_combine($arr_unique,$arr_val);
	echo "<br>Converting unique array to an associative array with all values as 0<br>";
	print_r($arr_combine);

	foreach($arr_combine as $key => $value)
	{
	  foreach($arr as $key1 => $value1)
	  {
		if($key==$value1)
		{
		  $arr_combine[$key]++;
		}
	  }
	}
	echo "<br> Final counts of elements are:<br>";
	print_r($arr_combine);
    

?>
