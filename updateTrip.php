<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);


// parse json post request
$vehicleid = $requestArray["vehicleid"];
$uuid = $requestArray["uuid"];
$triplocation = $requestArray["triplocation"];
$triplocation=json_encode($triplocation);
$istripalive=$requestArray["istripalive"];
$tripid=$requestArray["tripid"];


$con = mysqli_connect('localhost',USER,PASS,DB);
$result=mysqli_query($con,"SELECT triplocation FROM tb_usertrips WHERE VehicleID=$vehicleid AND UUID='$uuid' AND isTripLive=1;");

$locationHistory = mysqli_fetch_assoc($result); //associative array
mysqli_close($con);

$con = mysqli_connect('localhost',USER,PASS,DB);
$sql="INSERT INTO tb_usertrips VALUES ('".$uuid."',$tripid,0,$vehicleid,'".$triplocation."',$istripalive)";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_execute($stmt);

mysqli_close($con);

?>

