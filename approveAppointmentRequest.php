<?php

include("data_class.php");




$id=$_GET['id'];
$status=$_GET['status'];


$obj=new data();
$obj->setconnection();
$obj->approveAppointment($id,$status);