<?php
$t=date("H");
if($t < "20")
{
  echo "Have a good day!";
}
else
{
  echo "Have a good night!";
}

$favcolor="red";
switch($favcolor)
{
case "blue": 
echo "Blue is fav color<br>";
break;
case "red": 
echo "Red is fav color<br>";
break;
default: "No fav color<br><br>";
}

$x=1;
while($x<=5)
{
  echo "The number is:$x<br>";
  $x++;
}

$y=5;
do
{
  echo "The no is:$y<br>";
  $y--;
}while($y>=1);

for($a=0;$a<=10;$a++)
{
  echo "The Numbers are:$a<br>";
}

$colors=array("red","blue","greeen","yellow");
foreach($colors as $value)
{
  echo "$value <br>";
}



?>