<?php
	$con=mysqli_connect("localhost","root","","lids");

$licenseid=$_POST("licenseid");
$currentCF=$_POST("currentCF");
$startDate=$_POST("startDate");
$EstimatedExpiry=$_POST("EstimatedExpiry");
$AvailableCF=$_POST("AvailableCF");
$statement =mysqli_prepare($con,"Insert INTO tb_pollutionquotient(licenseid,currentCF,EstimatedExpiry,AvailableCF) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($statement,"sissi",$licenseid,$currentCF,$EstimatedExpiry,$AvailableCF);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
mysqli_close($con);
?>
