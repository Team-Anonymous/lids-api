<?php
	$con=mysqli_connect("localhost","root","","lids");

$name=$_POST("uuid");
$age=$_POST("username");
$username=$_POST("licenseno");
$vehicleno=$_POST("vehicleid");
$password=$_POST("password");
$statement =mysqli_prepare($con,"Insert INTO tb_userinfo(uuid,username,licenseno,vehicleid,password) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($statement,"sssi",$uuid,$username,$licenseno,$vehicleid,$password);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
mysqli_close($con);
?>