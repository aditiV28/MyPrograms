<?php 

	$uname = $_POST['name'];
	$pass = $_POST['pass'];

	//echo $uname ."   ".$pass;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "users";
	
	$conn = new mysqli($servername,$username,$password,$dbname);
	
	if($conn->connect_error){
		die("Connection Failed.".$conn->connect_error);
	}
	else{
		echo 'Connection established';
	}
	
	$sql = "SELECT * FROM user_details";
	$sql1 =  "SHOW columns from user_details";
	
	$res = mysqli_query($conn,$sql);
	$cols = mysqli_query($conn,$sql1);
		
		
		$temp = [];
		
		while($row = mysqli_fetch_array($cols))
		{
			array_push($temp,$row['Field']);
			
		}
	

		
		$cnt = 1;
		while($row = mysqli_fetch_array($res)){
			echo '<tr>';	
			if($row['uname'] == $uname && $row['upass'] == $pass){
					echo '<br>valid user';
					$cnt = $cnt +1;
					echo '<br><table border=\'1\'><tr>';
						foreach($temp as $key){
							
									echo '<th>'.$key.'</th>';
						}
						echo '</tr>';
						
					foreach($temp as $key1){
				
						echo '<td>'.$row[$key1].'</td>';
						
						
					} 
					break;
			}
			
			echo '</tr>';
		}
			if($cnt != 2){
				echo "<br>Invalid user";
			}
			
		echo '</table>';

?>