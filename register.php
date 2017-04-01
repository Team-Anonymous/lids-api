<?php
	$con=mysqli_connect("localhost","root","","lids");

$name=$_POST("uuid");
$username=$_POST("username");
$licenseno=$_POST("licenseno");
$vehicleid=$_POST("vehicleid");
$password=$_POST("password");
$statement =mysqli_prepare($con,"Insert INTO tb_userinfo(uuid,username,password,licenseno,vehicleid) VALUES (?, ?, ?, ?,?)");
mysqli_stmt_bind_param($statement,"ssssi",$uuid,$username,$password,$licenseno,$vehicleid);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
mysqli_close($con);
?>
