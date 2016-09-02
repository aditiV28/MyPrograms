<?php
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"www.w3schools.com");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
echo "$output";
curl_close($ch);

?>