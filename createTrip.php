<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);

print_r($requestArray);

$con = mysqli_connect('localhost',USER,PASS,DB);


$vehicleid = $requestArray["vehicleid"];
$uuid = $requestArray["uuid"];

$triplocation = $requestArray["triplocation"];

$triplocation=json_encode($triplocation);

echo $triplocation;

$stmt = mysqli_prepare($con,"SELECT COUNT(*) FROM tb_usertrips WHERE uuid='$uuid';");
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$tripid);


$tripid=$tripid+1;

echo "tripid:".$tripid;

$sql = "INSERT INTO tb_usertrips VALUES('$uuid',$tripid,0,$vehicleid,'$triplocation',true);";

print $sql;

if(mysqli_query($con,$sql)===TRUE)
  print "db insert success";
else
{
  // print mysqli_error($con);
  print "db insert fail";
}



mysqli_close($con);

// echo $tripid;

?>
