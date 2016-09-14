<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New Products</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php include 'header.php';
		$action=isset($_GET['action'])?$_GET['action']:"";
		if($action=='error'){
			echo "<div class='alert alert-info'>";
	        echo "Product was not added";
	   	 	echo "</div>";
		}

	?>
	<div class="container">
	<h1>Add New Products</h1>

	<form  method="POST" action="addproduct.php" enctype="multipart/form-data">
	
	<div class="form-group">
	<label class="control-label">Product Name</label>
	<input type="text" name="name" class="form-control" placeholder="Product name here" />
	</div>

	<div class="form-group">
	<label class="control-label">Price</label>
	<input type="text" name="price" class="form-control" placeholder="Price here" />
	</div>

	<div class="form-group">
	<label class="control-label">Image upload</label>
	<input type="file" id="imageToUpload" name="imageToUpload" class="file" />
	</div>

	<div class="form-group">
	  <label class="control-label">Description</label>
	  <textarea class="form-control" name="description" rows="5" ></textarea>
	</div>

	<input type="submit" name="submit" class="btn btn-default" />

	</form>
	</div>
	
</body>
</html>