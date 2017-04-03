<?php
define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);
// print_r($requestArray);
$signalid = $requestArray["signalid"];
$signalstatus = $requestArray["signalstatus"];


$sql = "UPDATE  tb_trafficcontrol SET SignalStatus=$signalstatus WHERE SignalID=$signalid;";
// echo $sql;
$con = mysqli_connect('localhost',USER,PASS,DB);
// if($con)
// {
// 	print("connection open");
// }
 
$result = mysqli_query($con,$sql);
if($result)
{
	// echo 'query successfull';
	echo $signalstatus;
}
else 
{
	// echo "query fail";
}
mysqli_close($con);
?>