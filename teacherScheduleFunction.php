<?php

include("data_class.php");

$date=$_POST['date'];
$teacher_id=$_POST['teacherSelect'];
$time_from=$_POST['time_from'];
$time_to=$_POST['time_to'];






$obj=new data();
$obj->setconnection();
$obj->teacherSchedule($teacher_id,$date,$time_from,$time_to);