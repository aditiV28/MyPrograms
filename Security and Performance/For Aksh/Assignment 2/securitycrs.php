<?php

		if(!(preg_match("/[a-zA-Z]$/",$_POST['name']))){
			echo "<br>Invalid name";
		}
		else{
			echo '<br>Name: '.htmlentities($_POST['name']);
		}
		
		if(!(preg_match("/[0-9a-zA-Z]$/",$_POST['address']))){
			echo "<br>Invalid Address";
		}
		else{
			echo '<br>Address: '.html_entity_decode($_POST['address']);
		}
		
		if(!(preg_match("/[a-zA-Z]$/",$_POST['city']))){
			echo "<br>Invalid City name";
		}
		else{
			echo '<br>City: '.strip_tags($_POST['city']);
		}
		
		if(!(preg_match("/^[0-9]{5}$/",$_POST['zcode']))){
			echo "<br>Invalid Zip code";
		}
		else{
			echo '<br>ZipCode: '.htmlspecialchars($_POST['zcode']);
		}
		
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			echo "<br>Invalid email";
		}
		else{
			echo '<br>Email: '.htmlentities($_POST['email']);
		}
		
		if((preg_match("/^[0-9a-zA-Z]$/",$_POST['ta']))){
			echo "<br>Invalid comment";
		}
		else{
			$comment = strip_tags($_POST['ta']);
			$comment1 = htmlspecialchars($_POST['ta']);
 			echo '<br>Comment: '.$comment;
 			echo '<br>Comment1: '.$comment1;
			
		}
?>