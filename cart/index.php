<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<?php 
	session_start();
		include 'header.php'; 
		include 'connect.php'; 

		
		$action=isset($_GET['action'])?$_GET['action']:"";

		if($action=="added")
		{
			echo "<div class='alert alert-info'>";
	        echo "<strong>".$_GET['name']."</strong> was added to your Website!";
	   	 	echo "</div>";
		}

		$sql = "select * from product";
		$products = mysqli_query($conn,$sql);
		echo "<div class='container-fluid'>";
		while($row=mysqli_fetch_array($products))
		{
			echo "<a href='viewproduct.php?id=".$row['id']."'>";
			echo "<div style='float:left;border:1px solid black;margin:10px;padding:10px;'><center>";
			echo '<img src="'.$row['image'].'" width="250px" height="250px" alt="">';
			echo '<br>'.$row['name'];
			echo '<br><b>Rs.'.$row['price'].'</b>';
			echo "<br><a href='addtocart.php?id={$row['id']}&name={$row['name']}' class='btn btn-info btn-lg'>
				<span class='glyphicon glyphicon-shopping-cart'></span>
				Add to Cart</a>";
			echo "</center></div>";
			echo "</a>";
		}
		echo '</div>';

	?>


</body>
</html>