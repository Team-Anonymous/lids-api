<?php
	$con=mysqli_connect("localhost","root","","lids");

$immobilized=mysqli_real_escape_string($con,$_POST['immobilized']);
$vehicleid=mysqli_real_escape_string($con,$_POST['vehicleid']);
$licenseid=mysqli_real_escape_string($con,$_POST['licenseid']);
$statement =mysqli_prepare($con,"update tb_vehiclecommand set immobilized=$immobilized where vehicleid=$vehicleid and licenseid=$licenseid );
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
mysqli_close($con);
?>