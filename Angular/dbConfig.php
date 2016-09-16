<?php
/*
https://www.formget.com/angularjs-crud/
https://www.leaseweb.com/labs/2015/10/creating-a-simple-rest-api-in-php/
http://angularcode.com/demo-of-a-simple-crud-restful-php-service-used-with-angularjs-and-mysql/
*/
$hostname='localhost';
$username='root';
$password='';
$dbname='employee';
$table='emp_info';

$link = mysqli_connect($hostname,$username ,$password ,$dbname);

?>