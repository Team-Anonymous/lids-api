<?php
	$con=mysqli_connect("localhost","root","","lids");
	$requestJSONData = file_get_contents('php://input');
	$requestArray = json_decode($requestJSONData,true);
  $vehicle_id=$requestArray["vehicle_id"];
  $sql="SELECT Immobilized FROM tb_vehiclecommand WHERE VehicleID='".$vehicle_id."'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $imm=false;
  if($row["Immobilized"])
  $imm=true;
  echo json_encode($imm);
  ?>
