<?php
	$con=mysqli_connect("localhost","root","","lids");

$licenseid=$_POST("licenseid");
$CF=$_POST("CF");
$startDate=$_POST("startDate");
$CFquota=$_POST("CFquota");


$stget = mysqli_prepare($con, "SELECT * FROM user WHERE licenseno = ?");
mysqli_stmt_bind_param($stget, "s", $licenseid);
mysqli_stmt_execute($stget);
mysqli_stmt_store_result($stget);
    mysqli_stmt_bind_result($stget, $licenseid, $currentCF, $startdate, $EstimatedExpiry, $Cfquota);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["uuid"] = $uuid;
        $response["username"] = $username;
        $response["password"] = $password;
    }
$sql = mysqli_prepare($con, "update tb_pollutionquotient set CFquota = ? , CurrentCF= ? where licenseid = ?");
mysqli_stmt_bind_param($sql, "iis", $CFquota , $CurrentCF , $licenseid);
mysqli_stmt_execute($sql);
$statement =mysqli_prepare($con,"Insert INTO tb_pollutionquotient(licenseid,0,5,10000) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($statement,"sissi",$licenseid,$currentCF,$EstimatedExpiry,$CFquota);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);
mysqli_close($con);
?>
