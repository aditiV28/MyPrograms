<?php
$cars=array("Suzuki","Toyota");
print_r($cars);
echo "<br>";
$ages=array("Peter"=>32,"Quagmire"=>35,"Joe"=>33);
print_r($ages);
echo "<br>";
$ages['James']="22";
print_r($ages);
echo "<br>";
$families=array("Griffin"=>array("Peter","Lois","Megan"),"Quagmire"=>array("Glenn"));
print_r($families);
echo "<br>";
$count1 = count($cars);

print "Count of cars is:$count1 <br>";
$count2 = count($ages);
print "Count of ages is:$count2 <br>";
$count3 = count($families,1);
print "Count of families is:$count3 <br>";

for($i=0;$i<$count1;$i++)
{
	print "Cars array is: $cars[$i] <br>";
}

foreach($ages as $value)
{
	print "Ages array is: $value <br>";
}

$keys = array_keys($ages);
print_r($keys);
$k_count = count($keys);
echo $k_count;
for($j=0;$j<$k_count;$j++)
{
	print "$keys[$j]<br>";
	print $ages[$keys[$j]];
}


echo "<br>";
$a = $families['Griffin'][2];
print "$a";
echo $families['Griffin'][2];
echo "<br>";

$keys_multi = array_keys($families);
print_r($keys_multi);
echo "<br>";






?>