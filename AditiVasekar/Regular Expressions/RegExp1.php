<!DOCTYPE html>
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Enter US phone number: <input type="text" name="number"/>
<input type="submit" name="submit"/>
</form>


<?php
	if(isset($_POST['submit']))
	{
		$phoneNo = $_POST['number'];
		$pattern = '/[1-9][0-9]{9}/';
		if(!preg_match($pattern,$phoneNo))
		{
			echo 'Invalid number!!';
		}

		else
		{
			$str = substr($phoneNo,0,3);
			$str1 = '('.$str.')';

			$str2 = substr($phoneNo,3);

			$str1 .= '-';

			$str3 = substr($str2,0,3);
			$str4 = substr($str2,3);
			$str1 .= $str3;
			$str1 .= '-' . $str4;
			$pattern = '/^[0-9]{3}/';
			$new = preg_replace($pattern,$str1,$str);
			echo $new;
		}
	}

?>

</body>
</html>