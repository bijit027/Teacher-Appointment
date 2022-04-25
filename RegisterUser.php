<?php

include("data_class.php");

$addnames=$_POST['addname'];
$addpass= $_POST['addpass'];
$addemail= $_POST['addemail'];
$department= $_POST['department'];
$student_id= $_POST['student_id'];

$type= $_POST['type'];


$obj=new data();
$obj->setconnection();
$obj->RegisterUser($addnames,$addpass,$addemail,$type,$department,$student_id);