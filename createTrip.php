<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);

// print_r($requestArray);

$con = mysqli_connect('localhost',USER,PASS,DB);

$vehicleid = $requestArray["vehicleid"];
$uuid = $requestArray["uuid"];

$triplocation = $requestArray["triplocation"];
$triplocation=json_encode($triplocation);
// $newtriplocation = array();
// array_push($newtriplocation, $triplocation);
// $newtriplocation = json_encode($newtriplocation);

// echo $newtriplocation;

$stmt = $con->query("SELECT * FROM tb_usertrips WHERE uuid='$uuid';");
$tripid=$stmt->num_rows;
// echo "tripid:".$tripid;
$tripid=$tripid+1;


mysqli_close($con);
$con = mysqli_connect('localhost',USER,PASS,DB);

$sql="INSERT INTO tb_usertrips VALUES ('".$uuid."',$tripid,0,$vehicleid,'".$triplocation."',1)";

// print "\n";
// print $sql;

$result= $con->query($sql);
// if($result)
// 	// print "db insert success";
// else
// {
// 	// print mysqli_error($con);
// 	// print "db insert fail\n";
// 	// print $con->error;

// }



mysqli_close($con);

echo $tripid;

?>
