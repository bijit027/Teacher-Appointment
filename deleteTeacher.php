<?php
include("data_class.php");

$deleteTeacher=$_GET['teacheriddelete'];


$obj=new data();
$obj->setconnection();
$obj->delteTeacherdata($deleteTeacher);