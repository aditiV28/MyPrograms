<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Information</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<?php 
		include 'header.php'; 
		include 'connect.php'; 
		$id=$_GET['id'];
		$sql="select * from product where id=".$id;
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
			echo "<div class='container-fluid'>";
			
			

			echo "<div class='col-sm-3' style='border:1px solid #cccccc;float:left;margin:10px;'>";
			echo '<center><img src="'.$row['image'].'" width="250px" height="250px" alt=""></center>';
			echo "</div>";

			echo "<div class='col-sm-8' style='float:left;margin:10px;'>";
			echo "<h1>".$row['name']."</h1>";
			echo "</div>";

			echo "<div class='col-sm-8' style='float:left;margin:10px;'>";
			echo "<h3>Price ₹".$row['price']."</h3>";
			echo "</div>";

			
			echo "<div class='col-sm-4' style='padding:10px;margin:10px;float:left;'>";
			echo "<a href='addtocart.php?id={$row['id']}&name={$row['name']}' class='btn btn-info btn-lg'>
				<span class='glyphicon glyphicon-shopping-cart'></span>
				Add to Cart</a>";
			//echo " <button type='button' class='btn btn-info'>Edit Item</button>";
			echo "</div>";


			echo "<div class='col-sm-8' style='float:left;'>";
			echo "<div style='border:1px solid  #cccccc;padding:10px;'>";
			echo "<h3>Description</h3>";
			echo "</div>";
			echo "<div style='border:1px solid  #cccccc;padding:10px;'>";
			echo $row['description'];
			echo "</div>";
			echo '</div>';

			

			echo "</div>";
		}
		

	?>


</body>
</html>