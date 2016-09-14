<?php
			include 'connect.php';
			$name=$_POST["name"];
			$price=$_POST["price"];
			$description=$_POST["description"];
			
			/////////////////////IMAGE_UPLOAD///////////////////////////////////////
			$target_dir = 'img/';
			$target_file = $target_dir.basename($_FILES['imageToUpload']['name']);
			
			//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			$output=0;
			move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)
			
			

			//////////////////////////DATABASE ENTRY////////////////////////////////
			$target_file='/cart/'.$target_file;
			$sql="INSERT INTO product (name,image,description,price) VALUES('$name','$target_file','$description','$price') ";
			$res=mysqli_query($conn,$sql);
			
				header('Location:index.php?action=added&name='.$name);
			
?>