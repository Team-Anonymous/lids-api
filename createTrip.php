<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$con = mysqli_connect('localhost',USER,PASS,DB);

$uuid= mysqli_real_escape_string($con, $_POST['uuid']);
$vehicleid= mysqli_real_escape_string($con, $_POST['vehicleid']);
$triplocation= mysqli_real_escape_string($con, $_POST['triplocation']);
$istriplive= mysqli_real_escape_string($con, $_POST['istriplive']);

$sql = "SELECT COUNT(*) FROM tb_usertrips WHERE uuid='$uuid';";

$tripid=$sql+1;

$triplocationJsonarr = array("locations"=>,$triplocation);

triplocation=json_encode($triplocationJsonarr);

$sql = "INSERT INTO tb_usertrips (UUID,TripID,Duration,VehicleID,TripLocation,isTripLive) VALUES('$uuid',$tripid,0,$vehicleid,'$triplocation',$istriplive);";

$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_execute($stmt);

mysqli_close($con);

echo $tripid;

?>
