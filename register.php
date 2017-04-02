<?php
	$con=mysqli_connect("localhost","root","","lids");
//$uuid=$_POST['uuid'];
//$username=$_POST['username'];
//$licenseno=$_POST('licenseno');
//$vehicleid=$_POST('vehicleid');
//$password=$_POST('password');
$uuid=mysqli_real_escape_string($con,$_POST['uuid']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$licenseno=mysqli_real_escape_string($con,$_POST['licenseno']);
$vehicleid=mysqli_real_escape_string($con,$_POST['vehicleid']);
$password=mysqli_real_escape_string($con,$_POST['password']);

$statement =mysqli_prepare($con,"Insert INTO tb_userinfo(uuid,username,password,licensenumber,vehicleid) VALUES (?, ?, ?, ?,?)");
mysqli_stmt_bind_param($statement,"sssss",$uuid,$username,$password,$licenseno,$vehicleid);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);

$statement =mysqli_prepare($con,"Insert INTO tb_vehiclecommand(vehicleid,licenseid) VALUES (?,?)");
mysqli_stmt_bind_param($statement,"ss",$vehicleid,$licenseno);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
echo $uuid;
echo "hello";
mysqli_close($con);
?>
