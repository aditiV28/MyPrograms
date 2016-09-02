<?php
$bikes=["r15","yamaha","apache"];
print_r ($bikes);
echo "<br>";
print "count of bikes: ".count($bikes);
echo "<br>";

$employee_id=["sagar"=>"16439","vivek"=>"16447"];
print_r ($employee_id);
echo "<br>";
print "count of employee: ".count($employee_id);
echo "<br>";

$families = ["sagar"=>["vishva","dad","mom"],"hit"=>["dhrumi","dhruv"]];
print_r ($families);
echo "<br>";
print "count of total family members: ".count($families,1);
echo "<br>";
$c=0;
foreach($bikes as $bike){
	$c++;	
}
print "bike count with for loop: ".$c;
echo "<br>";

$c=0;
foreach($employee_id as $emp){
	$c++;	
}
print "employee count with for loop: ".$c;
echo "<br>";

$c=0;
foreach($families as $fm){
	$c++;	
}
print "employee count with for loop: ".$c;
echo "<br>";

$family=array_keys($families);
print_r ($family);
echo "<br>";
foreach( $families["sagar"] as $fm ){
	print $fm;
}
echo "<br>";
echo "<br>";
echo "<br>";
print "Multi dimensional with for loop";
echo "<br>";
for($x=0;$x<count($families);$x++){
	//if($family[$x]=="sagar"){
		$k=count($families[$family[$x]]);
		print $family[$x].": ";
		for($y=0;$y<$k;$y++){
			print $families[$family[$x]][$y]." ";
		}
		echo "<br>";
	//}
}








?>
