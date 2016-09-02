<?php
$arr = array(5,9,321,0,54,11,76);
$cnt = count($arr);
echo "<br> Array is:<br>";
print_r($arr);

function quick_sort($arr)
{
  if(count($arr) < 2)
  {
    return $arr;
  }
  
  $left = $right = array();       #Create empty arrays for left and right pointers
  reset($arr);                    #Points to first element in array
  $pivot_key = key($arr);         #pivot_key points to first key
  echo "<br> pivot_key is:$pivot_key<br>";
  $pivot_element = array_shift($arr);          #pivot_element takes first value in the array
  echo "<br> pivot_element is:$pivot_element<br>";
  foreach($arr as $key => $value)
  {
    if($value < $pivot_element)
	{
	  $left[$key] = $value;
    }
    else
	{
		$right[$key] = $value;
	}
  }
	return array_merge(quick_sort($left),array($pivot_key=>$pivot_element),quick_sort($right));
}

$arr = quick_sort($arr);
echo "<br> Sorted array is:<br>";
print_r($arr);
?>
