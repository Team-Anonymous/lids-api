<?php
	$con=mysqli_connect("localhost","root","","lids");

$licenseid=mysqli_real_escape_string($con,$_POST['licenseid']);;
$cf=mysqli_real_escape_string($con,$_POST['cf']);
$startdate=mysqli_real_escape_string($con,$_POST['startdate']);


$stget = mysqli_prepare($con, "SELECT * FROM user WHERE licenseid= ?");
mysqli_stmt_bind_param($stget, "s", $licenseid);
mysqli_stmt_execute($stget);
mysqli_stmt_store_result($stget);
    mysqli_stmt_bind_result($stget, $licenseid, $currentCF, $startdate, $EstimatedExpiry, $Cfquota);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($stget)){
        $response["success"] = true;  
        $response["licenseid"] = $licenseid;
	$response["currentCF"] = $currentCF;
        $response["startdate"] = $startdate;
        $response["EstimatedExpiry"] $EstimatedExpiry;
        $response["CFquota"]=$CFquota;
    }
$sql = mysqli_prepare($con, "update tb_pollutionquotient set CurrentCF= ? where licenseid = ?");
mysqli_stmt_bind_param($sql, "iis", $CFquota , $CurrentCF+$cf , $licenseid);
mysqli_stmt_execute($sql);
$statement =mysqli_prepare($con,"Insert INTO tb_pollutionquotient(licenseid,0,5,10000) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($statement,"sissi",$licenseid,$currentCF,$EstimatedExpiry,$CFquota);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
mysqli_close($con);
?>
