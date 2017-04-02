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
$sql = "SELECT * FROM tb_usertrips_loc;";

if(isset($uuid) && isset($tripid))
{
	$sql="SELECT * FROM tb_usertrips_loc WHERE tb_usertrips_loc.TripID IN ( SELECT tb_usertrips.TripID FROM tb_usertrips where tb_usertrips.TripID = $tripid);";

}

if(isset($tripid) && !isset($uuid))
{
	$sql = "select * from tb_usertrips_loc where TripID = ".$tripid.";";
}
if(isset($uuid) && !isset($tripid))
{
	$sql="SELECT * FROM tb_usertrips_loc WHERE tb_usertrips_loc.TripID IN ( SELECT tb_usertrips.TripID FROM tb_usertrips where tb_usertrips.UUID = $uuid);";
}

$con = mysqli_connect(HOST,USER,PASS,DB);
$res = mysqli_query($con,$sql);
$nrows = mysqli_num_rows($res);
$fin=array();
while($nrows--)
{
	$row=mysqli_fetch_assoc($res);
	array_push($fin,$row);
  //print($data[0]);
}
echo json_encode($fin);
// print(json_encode($row));
mysqli_close($con);
?>
