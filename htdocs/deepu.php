<?php

$myfile=fopen("abc.txt", "r");
$counter=fread($myfile, filesize("abc.txt"));
$counter++;
fclose($myfile);
$myfile=fopen("abc.txt", "w");
fwrite($myfile,$counter);
echo $counter;
fclose($myfile);



?>