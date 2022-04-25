<?php

include("data_class.php");




$id=$_GET['id'];



$obj=new data();
$obj->setconnection();
$obj->approveRegisterTeacher($id);