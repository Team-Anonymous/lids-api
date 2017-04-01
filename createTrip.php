<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$con = mysqli_connect('localhost',USER,PASS,DB);

$uuid= mysqli_real_escape_string($con, $_POST['uuid']);
$tripid= mysqli_real_escape_string($con, $_POST['tripid']);
$duration = mysqli_real_escape_string($con, $_POST['duration']);
$vehicleid= mysqli_real_escape_string($con, $_POST['vehicleid']);
$triplocation= mysqli_real_escape_string($con, $_POST['triploaction']);
$istriplive= mysqli_real_escape_string($con, $_POST['istriplive']);

$sql = "INSERT INTO tb_usertrips (UUID,TripID,Duration,VehicleID,TripLocation,isTripLive) VALUES('$uuid',$tripid,$duration,$vehicleid,'$triplocation',$istriplive)"

$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_execute($stmt);

mysqli_close($con);

?>
