<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

$licenseid=$_POST["licenseid"];
$sql = "SELECT CurrentCF FROM tb_pollutionquotient WHERE LicenseID='".$licenseid."';";

$con = mysqli_connect(HOST,USER,PASS,DB);
$res = mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$ans=$row['CurrentCF'];
echo $ans;
mysqli_close($con);

?>
