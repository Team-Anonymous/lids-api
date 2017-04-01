<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);


// parse json post request
$vehicleid = $requestArray["vehicleid"];
$uuid = $requestArray["uuid"];
$latitudeE7 = $requestArray["latitudeE7"];
$longitudeE7=$requestArray["longitudeE7"];
$timestampMs=$requestArray["timestampMs"];
$istripalive=$requestArray["istripalive"];
$tripid=$requestArray["tripid"];
$duration=$requestArray["duration"];

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
$sql="INSERT INTO tb_usertrips VALUES ('".$uuid."',$tripid,0,$vehicleid,'".$triplocation."',$istripalive)";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_execute($stmt);

mysqli_close($con);

?>

