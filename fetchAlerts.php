<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

if(!isset($_GET["count"]))
	die("invalid query string");

$count=$_GET["count"];

$sql = "SELECT * FROM tb_alerts ORDER BY timestampMs DESC LIMIT $count ;";

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