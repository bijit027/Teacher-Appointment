<?php
//addserver_page.php
include("data_class.php");



$teachername=$_POST['teachername'];
$department=$_POST['department'];
$subject   =$_POST['subject'];
$email   =$_POST['email'];
$password   =$_POST['password'];
$id      = $_POST['id'];






$obj=new data();
$obj->setconnection();
$obj->adminUpdateTeacher($teachername,$department,$subject,$email,$password,$id);
