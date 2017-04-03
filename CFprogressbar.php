<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

if(isset($_POST["licenseid"]))
	$licenseid=$_POST["licenseid"];
if(!isset($licenseid))
	die("invalid query");
$sql = "SELECT CurrentCF FROM tb_pollutionquotient WHERE LicenseID='".$licenseid."';";

$con = mysqli_connect(HOST,USER,PASS,DB);
$res = mysqli_query($con,$sql);
echo $res;
mysqli_close($con);

?>