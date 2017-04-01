<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

$con = mysqli_connect(HOST,USER,PASS,DB);

$vehicle_id=mysqli_real_escape_string($con, $_POST['vehicle_id']);
//$sql = "select TripLocation from location where vehicle_id in('107');"; 

$sql = "select TripLocation from location where vehicle_id in('".$vehicle_id."');"; 
$res = mysqli_query($con,$sql);
 
$result = array();
 
$data = json_decode($res);

echo $data;
 
mysqli_close($con);
?>
