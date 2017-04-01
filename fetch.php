<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

$con = mysqli_connect(HOST,USER,PASS,DB);

$vehicleID=101;
//$sql = "select TripLocation from location where vehicle_id in('107');"; 

$sql = "select TripLocation from tb_usertrips where vehicleID in('".$vehicleID."');"; 
$res = mysqli_query($con,$sql);
$row=mysqli_fetch_row($res);
echo ("%s (%s)\n", $row[0], $row[1]);
var_dump(json_decode($res,true));
 
mysqli_close($con);
?>
