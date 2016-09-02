<?php
$url="http://localhost/math.php/add/3/4";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
echo $output;
$info=curl_getinfo($ch);
print "<pre>";
print_r($info);
print "</pre>";
curl_close($ch);

?>