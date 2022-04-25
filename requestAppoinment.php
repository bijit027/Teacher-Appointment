<?php

include("data_class.php");

$userid=$_GET['userid'];
$teacherid=$_GET['teacherid'];





$obj=new data();
$obj->setconnection();
$obj->requestAppoinment($userid,$teacherid);

?>