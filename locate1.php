<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

$con = mysqli_connect(HOST,USER,PASS,DB);

$vehicle_id=mysqli_real_escape_string($con, $_POST['vehicle_id']);

$sql = "select TripLocation from location where vehicle_id in('1');"; 
$res = mysqli_query($con,$sql);
 
$result = array();
 
while($row = mysqli_fetch_array($res)){
array_push($result,
array('latitude'=>$row[0],
'longitude'=>$row[1]
));
}
 
echo json_encode(array("result"=>$result));
 
mysqli_close($con);
?>
