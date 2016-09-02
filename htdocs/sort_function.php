<?php
$arr = array(5,9,321,0,54,11,76);
$cnt = count($arr);
echo "<br> Array is:<br>";
print_r($arr);
for($x=0;$x<$cnt;$x++)
{
  for($y=0;$y<$cnt-1;$y++)
  {
    if($arr[$y] > $arr[$y+1])
	{
	  $temp = $arr[$y];
	  $arr[$y] = $arr[$y+1];
	  $arr[$y+1] = $temp;
	}
  }
}
echo "<br>Array in ascending is:<br>";
print_r($arr);

for($x=0;$x<$cnt;$x++)
{
  for($y=0;$y<$cnt-1;$y++)
  {
    if($arr[$y] < $arr[$y+1])
	{
	  $temp = $arr[$y];
	  $arr[$y] = $arr[$y+1];
	  $arr[$y+1] = $temp;
	}
  }
}
echo "<br>Array in descending is:<br>";
print_r($arr);

?>