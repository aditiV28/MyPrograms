<?php
	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<link href="../style/style.css" type="text/css" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
  
	<title>Chat Application Home Page</title>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#ChatText").keyup(function(e){
			if(e.keyCode==13){
				var ChatText = $("#ChatText").val();
				$.ajax({
					type:'POST',
					url:'insertMessage.php',
					data:{ChatText:ChatText},
					success:function(){
						$("#ChatMessages").load("displayMessages.php");

						$("#ChatText").val("");
					}
				});
			}
		});

		setInterval(function(){//Refresh after every 1500s
			$("#ChatMessages").load("displayMessages.php");

		},1500)
		$("#ChatMessages").load("displayMessages.php");


	});



	</script>
</head>
<body>
	<h2>Welcome <span style="color: green"><?php echo $_SESSION['UserName']?></span></h2>
	</br></br>
	<div id="Chat">
		<div id="ChatMessages">
			
		</div>

		<textarea id="ChatText" name="ChatText"></textarea>
	</div>

	
</body>
</html>