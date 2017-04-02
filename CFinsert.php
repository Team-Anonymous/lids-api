<?php
	$con=mysqli_connect("localhost","root","","lids");
	$requestJSONData = file_get_contents('php://input');
	$requestArray = json_decode($requestJSONData,true);
	print_r($requestArray);
<<<<<<< HEAD
	$licenseid=$requestArray['licenseid'];
	$cf=$requestArray['cf'];
	$cf=(int)$cf;
	$startdate=$requestArray['startdate'];

	$stget = mysqli_query($con, "SELECT * FROM tb_pollutionquotient WHERE LicenseID= '$licenseid'");
	if(mysqli_num_rows($stget)>0){
		$row=mysqli_fetch_assoc($stget);
		$oldcf=$row["CurrentCF"];
		$updatecf=$oldcf+$cf;
		$query="update tb_pollutionquotient set CurrentCF='$updatecf' where licenseid='$licenseid'";
		$result=mysqli_query($con,$query);

	}
	else {
		$query="insert into tb_pollutionquotient values ($licenseid,$cf,'".$startdate."',0,10000)";
		mysqli_query($con,$query);
		echo mysqli_error($con);
	}
	mysqli_close($con);
=======
$licenseid=$requestArray['licenseid'];
$cf=$requestArray['cf'];
$cf=(int)$cf;
echo $cf;
$startdate=$requestArray['startdate'];
$current =  date("Y-m-d");

$days_between = floor((strtotime($current)- strtotime($start))/24/3600/60/60);
if($days_between==0)$days_between=1;
$cfpday=$cf / $days_between;
$expire=floor((10000 - $cf)/$cfpday);
$EstimateExpiry=date('Y-m-d', strtotime($Date. ' + '.$expire.' days'));
$stget = mysqli_prepare($con, "SELECT * FROM user WHERE licenseid= ?");
mysqli_stmt_bind_param($stget, "s", $licenseid);
mysqli_stmt_execute($stget);
mysqli_stmt_store_result($stget);
    mysqli_stmt_bind_result($stget, $licenseid, $currentCF, $startdate, $Cfquota);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($stget)){
        $response["success"] = true;
        $response["licenseid"] = $licenseid;
	$response["currentCF"] = $currentCF;
        $response["startdate"] = $startdate;
        $response["CFquota"]=$CFquota;
    }
$sql = mysqli_prepare($con, "update tb_pollutionquotient set CurrentCF= ? where licenseid = ?");
$sum=$cf + $CurrentCF;
mysqli_stmt_bind_param($sql, "iis", $CFquota , $sum , $licenseid);
mysqli_stmt_execute($sql);
$statement =mysqli_prepare($con,"Insert INTO tb_pollutionquotient(licenseid,$EstimateExpiry,5,10000) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($statement,"sissi",$licenseid,$currentCF,$EstimatedExpiry,$CFquota);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
mysqli_close($con);
>>>>>>> origin/master
?>
