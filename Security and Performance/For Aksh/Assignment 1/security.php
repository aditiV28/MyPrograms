<?php 
	
	
		if(!(preg_match("/[a-zA-Z]$/",$_POST['name']))){
			echo "<br>Invalid name";
		}
		else{
			echo '<br>Name: '.$_POST['name'];
		}
		
		if(!(preg_match("/[0-9a-zA-Z]$/",$_POST['address']))){
			echo "<br>Invalid Address";
		}
		else{
			echo '<br>Address: '.$_POST['address'];
		}
		
		if(!(preg_match("/[a-zA-Z]$/",$_POST['city']))){
			echo "<br>Invalid City name";
		}
		else{
			echo '<br>City: '.$_POST['city'];
		}
		
		if(!(preg_match("/^[0-9]{5}$/",$_POST['zcode']))){
			echo "<br>Invalid Zip code";
		}
		else{
			echo '<br>ZipCode: '.$_POST['zcode'];
		}
		
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			echo "<br>Invalid email";
		}
		else{
			echo '<br>Email: '.$_POST['email'];
		}
    
	
		$directory = "Upload_dir";

		if(!file_exists($directory)){
        //Create Directory
			mkdir($directory);
		}

		$directory .= "/";
 
		$file = $directory . basename($_FILES['image1']['name']);

		$File_Type = pathinfo($file,PATHINFO_EXTENSION);

			if( $File_Type != 'jpg' && $File_Type != 'jpeg' && $File_Type != 'png'){
    
				echo '<br>It is not an image file.';
			}
   
			else if(file_exists($file)){
        
				echo '<br>File is already present.';
			}

			else if(move_uploaded_file($_FILES["image1"]["tmp_name"],$file)){

					echo '<br>File Uploaded Successfully..';

			}

			else{

					echo '<br>Error Occurred in uploading file';
			}
?>