<?php
	include('dbConfig.php');
	$method = $_SERVER['REQUEST_METHOD'];
	
	switch ($method) {
		case 'GET':
			$sql = "select * from `$table` ORDER BY id ASC"; break;
		case 'POST':
			$data = json_decode(file_get_contents("php://input"));
			echo $data;
			$id = mysqli_real_escape_string($link, $data->emp_id);
			$fname = mysqli_real_escape_string($link, $data->emp_fname);
			$lname = mysqli_real_escape_string($link, $data->emp_lname);
			$gender = mysqli_real_escape_string($link, $data->emp_gender);
			$department = mysqli_real_escape_string($link, $data->emp_department);
			$query = "INSERT into `$table` (id,fname,lname,gender,department) VALUES ('$id','$fname','$lname','$gender','$department')";
			break;
		
		default:
			echo 'Invalid Request';
			break;
	}
	
	$result = mysqli_query($link,$sql);
	if (!$result) {
	  http_response_code(404);
	  die(mysqli_error());
	}

	$arr = array();
	if($method=='GET')
	{
 	    if(mysqli_num_rows($result) != 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$arr[] = $row;
			}
		}
		// Return json array containing data from the databasecon
		echo $json_info = json_encode($arr);
	}

	if($method=='POST')
	{
		echo true;
	}



?>