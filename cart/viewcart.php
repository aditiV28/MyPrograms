<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<?php 
	session_start();

	include 'header.php';
	include 'connect.php';

	$action=isset($_GET['action'])?$_GET['action']:"";

	$id = isset($_GET['id']) ? $_GET['id'] : "1";
	$name = isset($_GET['name']) ? $_GET['name'] : "";
	 
	if($action=='added'){
	    echo "<div class='alert alert-info'>";
	        echo "<strong>{$name}</strong> was added to your cart!";
	    echo "</div>";
	}
	 
	if($action=='exists'){
	    echo "<div class='alert alert-info'>";
	        echo "<strong>{$name}</strong> already exists in your cart!";
	    echo "</div>";
	}
	if($action=="removed"){
		echo "<div class='alert alert-info'>";
		        echo "<strong>{$_GET['name']}</strong> was removed from your cart!";
		    echo "</div>";
	}

	$total=count($_SESSION['cart_items']);
	$ids=[];
	if($total>0)
	{
		foreach ($_SESSION['cart_items'] as $k => $v) {
			array_push($ids, $k);
		}

		echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Price (Rs.)</th>";
            echo "<th>Image</th>";
            echo "<th>Action</th>";
        echo "</tr>";
        $total_price=0;
		foreach ($ids as $product_id) 
		{
		 	$sql="SELECT id,name,price,image FROM product WHERE id=".$product_id;
		 	$res=mysqli_query($conn,$sql);

		 	while($p=mysqli_fetch_array($res))
		 	{
			 	echo "<tr>";
		            echo "<td class='textAlignLeft'>".$p['name']."</td>";
		            echo "<td>".$p['price']."</td>";
		            echo '<td><img src="'.$p['image'].'" width="250px" height="250px" alt=""></td>';
		            echo "<td valign='center'><a href='removefromcart.php?id={$p['id']}&name={$p['name']}' class='btn btn-danger btn-lg'>
				<span class='glyphicon glyphicon-remove'></span>
				Remove from Cart</a></td>";
	        	echo "</tr>";
	        	$total_price+=$p['price'];
        	}

        	
		}
		echo "<tr>";
            echo "<td class='textAlignLeft'>Total</td>";
            echo "<td>".$total_price."</td>";
            echo "<td></td>";
        echo "</tr>";

	}



	?>

</body>
</html>