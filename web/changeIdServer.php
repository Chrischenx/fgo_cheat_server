<?php

error_reporting(0);

$rawData=$_POST['data'];
$json=json_decode($rawData);

$oldUid = $json->oldUid;
$os = $json->os;
$newUid = $json->newUid;

$os=strtolower($os);

$data=array(
    "userid"=>$newUid
);

$condition=array(
    "userid"=>$oldUid
);

$host = "";
$port = "";
$dbname = "";
$user = "";
$password = "";

$db = dbconnect("host=$host port=$port dbname=$dbname user=$user password=$password");

$result = dbupdate($db, "tablename", $data, $condition);

dbclose($db);

if(!$result){
    echo "error";
}else{
    echo "success";
}
