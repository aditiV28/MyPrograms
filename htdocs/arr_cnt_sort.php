<?php
$arr = array(5,3,2,5,9,9);
$cnt = count($arr);
echo "Array is:<br>";
print_r($arr);
sort($arr);
echo "<br> Sorted array is:<br>";
print_r($arr);
$arr_unique = array_unique($arr);
$b = [];
$counter = 1;
for($x=0;$x<$cnt;$x++)
{
  $y=$x+1;
  if($arr[$x]==$arr[$y])
  {
    $counter = $counter+1;
  }
  else
  {
    array_push($b,$counter);
	$counter=1;
  }
}
$arr_combine = array_combine($array_unique,$b);
echo "<br> Array with count is:<br>";
print_r($arr_combine);

?>
