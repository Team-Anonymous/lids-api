<<<<<<< HEAD
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

=======
<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB','lids');

if(isset($_POST["licenseid"]))
	$licenseid=$_POST["licenseid"];
if(!isset($licenseid))
	die("invalid query");
$sql = "SELECT * FROM tb_pollutionquotient WHERE LicenseID='".$licenseid."';";

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

>>>>>>> origin/master
?>