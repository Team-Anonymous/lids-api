<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);

// print_r($requestArray);


$violation = $requestArray["violation"];
$number = $requestArray["number"];
$action=$requestArray["action"];
$timestampMs=$requestArray["timestampMs"];
$alertpriority=$requestArray["alertpriority"];

$con = mysqli_connect('localhost',USER,PASS,DB);
$sql="INSERT INTO tb_alerts VALUES($timestampMs,$violation,'".$number."',$action,$alertpriority);";
$res = mysqli_query($con,$sql);
if($res)
{
	// print "successfull";
	print $number;
}
else
{
	// print "fail";
}


?>