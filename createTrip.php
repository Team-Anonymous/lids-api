<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);

// print_r($requestArray);


$uuid = $requestArray["uuid"];
$vehicleid = $requestArray["vehicleid"];
$latitudeE7 = $requestArray["latitudeE7"];
$longitudeE7=$requestArray["longitudeE7"];
$timestampMs=$requestArray["timestampMs"];


$con = mysqli_connect('localhost',USER,PASS,DB);
$sql="INSERT INTO tb_usertrips (UUID,VehicleID,isTripLive,Duration) VALUES('$uuid',$vehicleid,1,0);";
// print($sql."\n");
$result = mysqli_query($con,$sql);
// if($result)
// {
// 	echo 'query successfull';
// }
// else 
// {
// 	echo "query fail";
// }

$tripid = mysqli_insert_id($con);
// $trip = array("tripid"=>$trip)

// echo json_encode('{ "tripid": '.$tripid.' }');
header('Content-type: application/json');
$result=array();
$result["tripid"]=$tripid;
echo json_encode($result);
mysqli_close($con);
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


?>
