<?php
	$con=mysqli_connect("localhost","root","","lids");
	$requestJSONData = file_get_contents('php://input');
	$requestArray = json_decode($requestJSONData,true);
	$licenseid=$requestArray['licenseid'];
	$cf=$requestArray['cf'];
	$cf=(int)$cf;
	$startdate=$requestArray['startdate'];
$current =  date("Y-m-d");
$days_between = floor((strtotime($current)- strtotime($startdate))/24/3600/60/60);
if($days_between==0)$days_between=1;
$cfpday=$cf / $days_between;
$expire=floor((10000 - $cf)/$cfpday);
$EstimateExpiry= date('Y-m-d', strtotime($current. ' + '.$expire.' days'));
echo $EstimateExpiry;
	$stget = mysqli_query($con, "SELECT * FROM tb_pollutionquotient WHERE LicenseID= '$licenseid'");
	if(mysqli_num_rows($stget)>0){
		$row=mysqli_fetch_assoc($stget);
		$oldcf=$row["CurrentCF"];
		$updatecf=$oldcf+$cf;
		$query="update tb_pollutionquotient set CurrentCF='$updatecf', EstimateExpiry='".$EstimateExpiry."' where licenseid='$licenseid'";
		$result=mysqli_query($con,$query);

	}
	else {
		$query="insert into tb_pollutionquotient values ($licenseid,$cf,'".$startdate."','".$EstimateExpiry."',10000)";
		mysqli_query($con,$query);
		echo mysqli_error($con);
	}
	mysqli_close($con);
?>
