<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

if(isset($_GET["count"]))
	$count=$_GET["count"];
if(isset($_GET["alertpriority"]))
	$alertpriority=$_GET["alertpriority"];

if(!isset($count) && !isset($alertpriority))
		die("invalid query parameters");

if(isset($count) && !isset($alertpriority))
{
	$sql = "SELECT * FROM tb_alerts ORDER BY timestampMs DESC LIMIT $count ;";
}
else if(!isset($count) && isset($alertpriority))
{
	$sql = "SELECT * FROM tb_alerts WHERE AlertPriority=$alertpriority ;";
}
else if(isset($count) && isset($alertpriority))
{
	$sql = "SELECT * FROM tb_alerts WHERE AlertPriority=$alertpriority ORDER BY timestampMs DESC LIMIT $count ;";
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