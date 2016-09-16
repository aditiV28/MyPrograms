<?php

$servername='localhost';
$username = 'root';
$password='';
$dbname = 'employee';
$table = 'emp_detail';

$link = mysqli_connect($servername,$username,$password,$dbname);


$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
	case 'GET':
		$sql = "select* from `$table` ORDER by emp_id ASC";
		break;

	case 'POST':
		$data = json_decode(file_get_contents("php://input"));
		$emp_id = mysqli_real_escape_string($link,$data->emp_id);
		$fname = mysqli_real_escape_string($link,$data->fname);
		$mname = mysqli_real_escape_string($link,$data->mname);
		$lname = mysqli_real_escape_string($link,$data->lname);
		$city = mysqli_real_escape_string($link,$data->city);
		$salary = mysqli_real_escape_string($link,$data->salary);

		$sql = "INSERT into `$table` (emp_id,fname,mname,lname,city,salary) VALUES ('$emp_id','$fname','$mname','$lname','$city','$salary')";
		break;
	
	default:
		echo 'In default';
		break;
}

$result = mysqli_query($link,$sql);
if(!$result)
{
	http_response_code(404);
	
}

$records = array();
if($method == 'GET')
{
	if(mysqli_num_rows($result)!=0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$records[] = $row;
		}
	}

	echo $json_info = json_encode($records);
}

if($method == 'POST')
{
	echo true;
}

?>