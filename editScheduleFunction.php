<?php

include("data_class.php");

$date=$_POST['date'];
$appointmentId=$_POST['teacherSelect'];
$time_from=$_POST['time_from'];
$time_to=$_POST['time_to'];






$obj=new data();
$obj->setconnection();
$obj->editAppointment($appointmentId,$date,$time_from,$time_to);