<!DOCTYPE html>
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
Enter email address: <input type="text" name="email"/>
<input type="submit" name="submit"/>
</form>


<?php
	 if(isset($_POST['submit']))
	{ 
		$email = $_POST['email'];
		
		$pattern =  '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/';
		if(!preg_match($pattern,$email))
		{
			echo 'Email address is invalid!!';
		}
		else
		{
			echo 'Email address is valid!';
		}
	 } 

?>
</body>
</html> 