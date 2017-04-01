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

  $sql = "SELECT count(*) FROM tb_usertrips WHERE UUID ='$uuid' AND isTripLive='true'";

  if($sql==0) {
    $sql = "UPDATE tb_usertrips SET longitude = $longitude , latitude = $latitude WHERE UUID ='$uuid' AND isTripLive='true'" ;
    $stmt = mysqli_prepare($con,$sql);
    mysqli_stmt_execute($stmt);
  }
  else {
    $sql = "insert into location values('$vehicle_id','$latitude','$longitude')";
    $stmt = mysqli_prepare($con,$sql);
    mysqli_stmt_execute($stmt);
  }

  mysqli_close($con);

?>
