<?php
$name = $address = $city = $zipcode = $email = $comments = '';
if(isset($_POST['submit']))
{

		if(empty($_POST["name"]))
		{
			echo 'Name is missing<br>';
		}
		else
		{
			
			//$name = strip_tags($_POST['name']);
			$name = htmlspecialchars($_POST['name']);
		}
		if(!preg_match('/[A-Za-z]$/',$name))
		{
			echo 'Name is invalid!!<br>';
		}
		
		
		if(empty($_POST['address']))
		{
			echo 'Address is missing<br>';
		}
		else
		{
			$address = htmlentities($_POST['address']);
		}
		if(!preg_match('/[A-Za-z0-9]$/',$address))
		{
			echo 'Invalid address!!<br>';
		}
		
		
		if(empty($_POST['city']))
		{
			echo 'city is missing<br>';
		}
		else
		{
			$city = htmlentities($_POST['city']);
		}
		if(!preg_match('/[A-Za-z]$/',$city))
		{
			echo 'Invalid city<br>';
		}

		
		if(empty($_POST['zipcode']))
		{
			echo 'zipcode is missing<br>';
		}
		else
		{
			$zipcode = htmlentities($_POST['zipcode']);
		}
		if(!preg_match('/^[1-9][0-9]{5}$/',$zipcode))
		{
			echo 'Invalid zipcode<br>';
		}

		
		if(empty($_POST['email']))
		{
			echo 'Email is missing<br>';
		}
		else
		{
			$email = htmlentities($_POST['email']);
		}
		if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',$email))
		{
			echo 'Invalid email <br>';
		}
		
		if(empty($_POST['comments']))
		{
			echo 'Missing';
		
		}
		else{
		
				$comments = ($_POST['comments']);
				 $comments = strip_tags($comments);

		}

	
}

echo 'Your form data is:<br>';
echo $name . '<br>';
echo $address . '<br>';
echo $city . '<br>';
echo $zipcode . '<br>';
echo $email . '<br>'; 
echo $comments . '<br>';


?>
