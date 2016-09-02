<?php

for($i=0;$i<5;$i++)
{
   for($j=0;$j<5-$i;$j++)
   {
     echo "&nbsp;";
   } 
   for($k=1;$k<$i;$k++)
   {
     echo "*";
   }
   for($l=0;$l<$i;$l++)
   {
     echo "*";
   }
   
   echo "<br>";
}

for($i=5;$i>=1;$i--)
{
  for($j=0;$j<5-$i;$j++)
   {
     echo "&nbsp;";
   } 
   for($k=1;$k<$i;$k++)
   {
     echo "*";
   }
   for($l=0;$l<$i;$l++)
   {
     echo "*";
   }
   
   echo "<br>";
}










/*for($i=0;$i<=5;$i++){
for($j=5-$i;$j>=1;$j--){
echo "*&nbsp;";
}
echo "<br>";
}*/


?>