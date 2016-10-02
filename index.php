<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../js/jquery.js"></script>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Welcome to Chat App</title>
</head>
<body>

<h2>LOGIN FORM</h2>
	<div id="LoginId">
		<form method="post" action="pages/userLogin.php">
			<table>
				<tr>
					<td>Email:</td><td> <input type="email" name="UserMailLogin" class="form-control"/> </td> </tr>
				</tr>

				<tr>
					<td>Password:</td><td> <input type="password" name="UserPasswordLogin" class="form-control" /> </td>		

				</tr>

				<tr>
					<td></td><td><input type="submit" name="LOG IN" class="btn btn-primary"></td> 
				</tr>

				<?php
				if(isset($_GET['error'])){
					?>

					<tr>
						<td></td><td><span style="color: red">ERROR LOG IN </span></td>
					</tr>

					<?php
				}
				?>

			</table>
		</form>
		
	</div>

	</br></br></br>


<h2>SIGN UP FORM</h2>
	<div id="SignUpId">
		<form method="post" action="pages/insertUser.php">
			<table>
				<tr>
					<td>Enter your name:</td><td><input type="name" name="UserName" class="form-control"></td>
				</tr>
				<tr>
					<td>Enter your email address:</td><td><input type="email" name="UserMail" class="form-control"></td>
				</tr>
				<tr>
					<td>Enter password:</td><td><input type="password" name="UserPassword" class="form-control"></td>
				</tr>

				<tr>
					<td></td><td><input type="submit" name="SIGN UP" class="btn btn-primary"></td>
				</tr>

				<?php 
				if(isset($_GET['success'])){
					?>
					<tr>
						<td></td><td><span style="color: green">User Inserted!!</span></td>
					</tr>
					<?php
				}
				?>

			</table>
		</form>

	</div>

</body>
</html>