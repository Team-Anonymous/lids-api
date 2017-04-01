<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);

// print_r($requestArray);
// parse json post request
$vehicleid = $requestArray["vehicleid"];
$uuid = $requestArray["uuid"];
$latitudeE7 = $requestArray["latitudeE7"];
$longitudeE7=$requestArray["longitudeE7"];
$timestampMs=$requestArray["timestampMs"];
$istripalive=$requestArray["istripalive"];
$tripid=$requestArray["tripid"];
$duration=$requestArray["duration"];

$con = mysqli_connect('localhost',USER,PASS,DB);
$sql="INSERT INTO tb_usertrips_loc VALUES($tripid,$latitudeE7,$longitudeE7,$timestampMs);";
// print($sql."\n");
$result=mysqli_query($con,$sql);
// if($result)
// {
// 	echo 'query successfull';
// }
// else 
// {
// 	echo "query fail";
// }

mysqli_close($con);

$con = mysqli_connect('localhost',USER,PASS,DB);
$sql="UPDATE tb_usertrips SET isTripLive=$istripalive,duration=$duration WHERE TripID=$tripid;";
// print($sql."\n");
$result=mysqli_query($con,$sql);
// if($result)
// {
// 	echo 'query successfull';
// }
// else 
// {
// 	echo "query fail";
// }

mysqli_close($con);

?>

