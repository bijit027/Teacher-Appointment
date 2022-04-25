<?php
//addserver_page.php
include("data_class.php");



$name=$_POST['name'];
$email   =$_POST['email'];
$password   =$_POST['password'];
$id      = $_POST['id'];
$department= $_POST['department'];
$student_id = $_POST['student_id'];






$obj=new data();
$obj->setconnection();
$obj->updateStudent($name,$email,$password,$id,$department,$student_id);
