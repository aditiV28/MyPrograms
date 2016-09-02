<?php
$numbers = array("7","4","12","6","0","32");
sort($numbers);
echo "Array in ascending order:";
print_r($numbers);
echo "<br>";
rsort($numbers);
echo "Array in descending order:";
print_r($numbers);
echo "<br>";
$asso_arr = array("First" => 43,"Second" =>1,"Third"=>78,"Fourth" =>0);
asort($asso_arr); #Sorts associative array according to values
echo "Associative array in ascending order according to values:";
print_r($asso_arr); 
echo "<br>";
ksort($asso_arr); #Sorts associative array according to key
echo "Associative array in ascending order according to key:";
print_r($asso_arr);
echo "<br>";
arsort($asso_arr);
echo "Associative array in descending order according to values:";
print_r($asso_arr);
echo "<br>";
krsort($asso_arr);
echo "Associative array in descending order according to keys:";
print_r($asso_arr);
?>
