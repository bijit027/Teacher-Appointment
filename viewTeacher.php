
<?php

session_start();

$subject= $_GET['viewteacher'];
$userId=$_GET['userid'];
 


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="style.css"> -->
    </head>
    <style>
        .innerright,label {
    color: rgb(16, 170, 16);
    font-weight:bold;
}
.container,
.row,
.imglogo {
    margin:auto;
}

.innerdiv {
    text-align: center;
    /* width: 500px; */
    margin: 100px;
}
input{
    margin-left:20px;
}
.leftinnerdiv {
    float: center;
    width: 25%;
}

.rightinnerdiv {
    float: center;
    width: 50%;
    margin-left:25%;
    margin-top:10%;
}

.innerright {
    background-color: rgb(105, 221, 105);
}

.greenbtn {
    background-color: rgb(16, 170, 16);
    color: white;
    width: 95%;
    height: 40px;
    margin-top: 8px;
}

.greenbtn,
a {
    text-decoration: none;
    color: white;
    font-size: large;
}

th{
    background-color: orange;
    color: black;
}
td{
    background-color: #fed8b1;
    color: black;
}
td, a{
    color:black;
}
    </style>
    <body>
    <?php
   include("data_class.php");
    ?>

    <?php
/*

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

   */ ?>


  <div class="rightinnerdiv">   
            <div id="addTeacher" class="innerright portion" >
            <Button class="greenbtn" >Teacher Name</Button>


            <?php
            $u=new data;
            $u->setconnection();
            $u->getSubjectTeacher($subject);
            $recordset=$u->getSubjectTeacher($subject);


                $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
                padding: 8px;'>Teacher Name</th><th>View</th></tr>";
                foreach($recordset as $row){
                    $table.="<tr>";
                   "<td>$row[0]</td>";
                    $table.="<td>$row[1]</td>";
        
                    $table.="<td><a href='teacherProfile.php?teachername=$row[3]&teacherid=$row[0]&userid=$userId'><button type='button' class='btn btn-primary'>View Teacher</button></a></td>";
                    // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                    $table.="</tr>";
                    // $table.=$row[0];
                }
                $table.="</table>";
    
                echo $table;

                
                
           
                

            ?>
         
            </div>
            </div>


           

</body>

</html>