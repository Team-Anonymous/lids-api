<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

if(isset($_GET["uuid"]))
	$uuid=$_GET["uuid"];
if(isset($_GET["tripid"]))
	$tripid=$_GET["tripid"];

// echo $tripid;

if(isset($uuid))
	echo "hello";

if(isset($tripid))
	$sql = "select * from tb_usertrips_loc where TripID = ".$tripid.";"; 	

$con = mysqli_connect(HOST,USER,PASS,DB);
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);
$fin=array();
while($data=mysqli_fetch_assoc($res))
{
  array_push($fin,$data);
  //print($data[0]);
}
echo json_encode($fin);
// print(json_encode($row));
mysqli_close($con);
?>
