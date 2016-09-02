<?php
	$dir = 'Upload';
	if(!file_exists($dir))
	{
		mkdir($dir);
	}
	$dir.='/';

	$File = basename($_FILES['file1']['name']);
	if(file_exists($File))
	{
		echo "Sorry file already exists!!";
	}

	else if(move_uploaded_file($_FILES['file1']['tmp_name'],$File))
	{
		echo $File.' uploaded successfully';
	}
	else
	{
		echo "<br> Error uploading file";
	}

	fopen($File,'r');
	$arr=file($File);
	echo "<br><br><table border=\"1\">";
	for($i=0;$i<count($arr);$i++)
	{
		$Row = explode(',',$arr[$i]);
		echo "<tr>";
		for($j=0;$j<count($Row);$j++)
		{
			if($i==0)
			{
				echo "<th>".$Row[$j].'</th>';
			}
			else
			{
				echo "<td>".$Row[$j].'</td>';
			}
		}
		
		echo "</tr>";
	}

	echo "</table>";

?>