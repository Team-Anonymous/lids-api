<?php
	$con=mysqli_connect("localhost","root","","lids");
	$requestJSONData = file_get_contents('php://input');
	$requestArray = json_decode($requestJSONData,true);
	print_r($requestArray);
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
?>
