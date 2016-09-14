
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Shopping Cart</a>
		</div>
	<ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="insert.php">Add Product</a></li>
      <li><a href="viewcart.php">Cart Items
      	<span class="badge" id="comparison-count">
      		<?php $cnt=isset($_SESSION['cart_items'])? count($_SESSION['cart_items']):0; echo $cnt;?>
      	</span>
      </a></li>
    </ul>
    </div>
</nav>
</body>
</html>