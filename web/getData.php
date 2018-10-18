<?php

error_reporting(0);

$userid=$_POST['uid'];
$os=$_POST['os'];

$host = "";
$port = "";
$dbname = "";
$user = "";
$password = "";

$db = dbconnect("host=$host port=$port dbname=$dbname user=$user password=$password");

$sql = "";
$result = dbquery($db, $sql);
if($result!=false) {
    $config = dbfetch($result);
    $deadline = $config["deadline"];
    $enabled = $config["enabled"];
    $limitcount = $config["limitcount"];
    $uhp = $config["uhp"];
    $uatk = $config["uatk"];
    $tdlv5 = $config["tdlv5"];
    $skilllv10 = $config["skilllv10"];
    $skillid1 = $config["skillid1"];
    $skillid2 = $config["skillid2"];
    $skillid3 = $config["skillid3"];
    $ehplimit = $config["ehplimit"];
    $ehp = $config["ehp"];
    $eatk = $config["eatk"];
    $friendlyid = $config["friendlyid"];
    $equipid = $config["equipid"];
    $battlecancel = $config["battlecancel"];
}

dbclose($db);

if(!$config){
    echo "false";
}else{
    $array = [
        "deadline" => $deadline,
        "mainSwitch" => $enabled,
        "limitcountSwitch" => $limitcount,
        "uhp" => $uhp,
        "uatk" => $uatk,
        "tdLvSwitch" => $tdlv5,
        "skillLvSwitch" => $skilllv10,
        "skillId1" => $skillid1,
        "skillId2" => $skillid2,
        "skillId3" => $skillid3,
        "ehplimit" => $ehplimit,
        "ehp" => $ehp,
        "eatk" => $eatk,
        "friendlyid" => $friendlyid,
        "equipid" => $equipid,
        "battleCancelSwitch" => $battlecancel
    ];
    echo json_encode($array);
}


