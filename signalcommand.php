<?php

define('USER','root');
define('PASS','');
define('DB','lids');

$requestJSONData = file_get_contents('php://input');

$requestArray = json_decode($requestJSONData,true);

// print_r($requestArray);

$con = mysqli_connect('localhost',USER,PASS,DB);
$sql= "SELECT SignalStatus FROM tb_trafficcommand WHERE "
