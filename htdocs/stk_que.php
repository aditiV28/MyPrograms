<?php
#Stack Implementation
$arr = array("5","8","32");
print_r($arr);
array_push($arr,"76","43");
echo "Array after push:<br>";
print_r($arr);
echo "<br>";
array_pop($arr);
echo "Array after pop:<br>";
print_r($arr);

#Queue Implementation

array_push($arr,"65");
echo "<br> Array after unshift:<br>";
print_r($arr);
echo "<br>";
array_shift($arr);
echo "<br> Array after shift:";
print_r($arr);
?>