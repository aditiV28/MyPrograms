<?php
$phone = 5555551212;
if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/",$phone))
{
	echo "Phone number is valid!";	
}

?>