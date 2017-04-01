<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

$con = mysqli_connect(HOST,USER,PASS,DB);

$vehicleID=107;
//$sql = "select TripLocation from location where vehicle_id in('107');"; 

$sql = "select TripLocation from tb_usertrips where vehicleID in('".$vehicleID."');"; 
$res = mysqli_query($con,$sql);
 
$result = array();
 
$data = json_decode($res);

echo $data;
 
mysqli_close($con);
?>
