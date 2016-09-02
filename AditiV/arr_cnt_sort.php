<?php

$a=['a',2,3,1,3,2,1,1,1,2,'b','b','c','a','b'];
sort($a);
print_r($a);
$uni=array_unique($a);
echo "<br>";
$b=[];
$counter=1;
for($x=0;$x<count($a);$x++)
{
	$y=$x+1;
	if($a[$x]==$a[$y])
	{
		$counter++;
	}
	else
	{
		array_push($b,$counter);
		$counter=1;
	}
}

print_r($b);
echo "<br>";
print_r($a);
echo "<br>";
$cmb=array_combine($uni,$b);
print_r($cmb);

?>
