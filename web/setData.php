<?php

error_reporting(0);

$rawData=$_POST['data'];
$json=json_decode($rawData);

$userid = $json->pycode;
$os = $json->os;
$enabled = $json->mainSwitch;
$limitcount = $json->limitcountSwitch;
$uhp = $json->uhp;
$uatk = $json->uatk;
$tdlv5 = $json->tdLvSwitch;
$skilllv10 = $json->skillLvSwitch;
$skillid1 = $json->skillId1;
$skillid2 = $json->skillId2;
$skillid3 = $json->skillId3;
$ehplimit = $json->ehplimit;
$ehp = $json->ehp;
$eatk = $json->eatk;
$friendlyid = $json->friendlyId;
$equipid = $json->equipId;
$battlecancel = $json->battleCancelSwitch;

$os=strtolower($os);

$data=array(
    "enabled"=>$enabled,
    "limitcount"=>$limitcount,
    "uhp"=>$uhp,
    "uatk"=>$uatk,
    "tdlv5"=>$tdlv5,
    "skilllv10"=>$skilllv10,
    "skillid1"=>$skillid1,
    "skillid2"=>$skillid2,
    "skillid3"=>$skillid3,
    "ehplimit"=>$ehplimit,
    "ehp"=>$ehp,
    "eatk"=>$eatk,
    "friendlyid"=>$friendlyid,
    "equipid"=>$equipid,
    "battlecancel"=>$battlecancel
);

$condition=array(
    "userid"=>$userid
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
