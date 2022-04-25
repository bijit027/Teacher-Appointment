<?php
include("data_class.php");

$appointmnentId=$_GET['appointmentId'];
$id=$_GET['userid'];


$obj=new data();
$obj->setconnection();
$obj->deleteAppointment($appointmnentId,$id);