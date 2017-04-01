<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);


$con = mysqli_connect('localhost',USER,PASS,DB);
// 
$vehicleid = $requestArray["vehicleid"];
$uuid = $requestArray["uuid"];
$triplocation = $requestArray["triplocation"];
$triplocation=json_encode($triplocation);

$locationHistory=mysqli_query("SELECT triplocation FROM tb_usertrips WHERE VehicleID=$vehicleid AND UUID='".$uuid."' AND isTripLive=1;")
$result = mysql_fetch_assoc(locationHistory);
print $result;
// $locationHistory=json_decode($locationHistory);

// locationHistory.push($triplocation);

// triplocation=json_encode($locationHistory);

// $sql = "UPDATE tb_usertrips SET longitude = $longitude , latitude = $latitude WHERE UUID ='$uuid' AND isTripLive='true' AND  vehicleid=$vehicleid;" ;
// $stmt = mysqli_prepare($con,$sql);
// mysqli_stmt_execute($stmt);

mysqli_close($con);

?>

