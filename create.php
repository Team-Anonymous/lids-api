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
echo "uuid: " .$uuid;
$triplocation = $requestArray["triplocation"];
$triplocation=json_encode($triplocation);
echo "triplocation:".$triplocation;
$sql = "select COUNT(*) from tb_usertrips where uuid in('".$uuid."');"; 
$res = mysqli_query($con,$sql);
$tripid=$res+1;
echo "tripid:".$tripid;
//$sql = "INSERT INTO tb_usertrips VALUES('106',221,0,2,'sanfbasjf',true);";
$sql = "INSERT INTO tb_usertrips VALUES('".$uuid."','".$tripid."',0,'".$vehicleid."','".$triplocation."',true);";
print $sql;
$result=mysqli_query($con,$sql);
if($result===TRUE)
  print "db insert success";
else
{
  // print mysqli_error($con);
  print "db insert fail";
}
mysqli_close($con);
// echo $tripid;
?>
