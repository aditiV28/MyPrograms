<?php
$myFile = fopen("myfile.txt","r");

while(!feof($myFile))
{
	$myString = fgets($myFile);
	echo "File contents are:<br> $myString"; 
	
	$pattern1 = '/Indian/';
	$replacement1 = 'Pak';
	echo '<br>';
	
	if(preg_match($pattern1,$myString))
	{
		$replace1 = preg_replace($pattern1,$replacement1,$myString);
	}

	$pattern2 = '/Munnaf Patel/';
	$replacement2 = 'IMohammad Amir';
	echo '<br>';
	if(preg_match($pattern2,$myString))
	{
		$replace2 = preg_replace($pattern2,$replacement2,$replace1);
	}
	
	$pattern3 = '/Zaheer Khan/';
	$replacement3 = 'Mohammad Asif';
	echo '<br>';
	if(preg_match($pattern3,$myString))
	{
		$replace3 = preg_replace($pattern3,$replacement3,$replace2);
	} 

}

fclose($myFile);

$myFile = fopen("myFile","a");
file_put_contents("myfile.txt",$replace3);
echo "<br>" . file_get_contents("myfile.txt");
fclose($myFile);



?>