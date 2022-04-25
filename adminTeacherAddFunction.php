<?php
//addserver_page.php
include("data_class.php");



$teachername=$_POST['teachername'];
$department=$_POST['department'];
$subject   =$_POST['subject'];
$email   =$_POST['email'];
$password   =$_POST['password'];
$type= $_POST['type'];





$obj=new data();
$obj->setconnection();
$obj->adminTeacherAdd($teachername,$department,$subject,$email,$password);
