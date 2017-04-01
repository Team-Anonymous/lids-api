<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);

print_r($requestArray);



$con = mysqli_connect('localhost',USER,PASS,DB);



$vehicleid = $requestArray["vehicleid"];
$uuid = $requestArray["uuid"];

$triplocation = $requestArray["triplocation"];

$triplocation=json_encode($triplocation);

// echo $triplocation;

$tripid = mysqli_query("SELECT COUNT(*) FROM tb_usertrips WHERE uuid='$uuid';");
$tripid=$tripid+1;


$sql = "INSERT INTO tb_usertrips (UUID,TripID,Duration,VehicleID,TripLocation,isTripLive) VALUES('$uuid',$tripid,0,$vehicleid,'$triplocation',true);";

$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_execute($stmt);

mysqli_close($con);

// echo $tripid;

?>
