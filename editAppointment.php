
<?php

session_start();

$userloginid= $_GET['userid'];
$appointmentId=$_GET['appointmentId'];
 


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
        <title>Admin Dashboard</title>
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
    width:50%;
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
    float: right;
    width: 75%;
}

.innerright {
    background-color: white;
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
            <Button class="greenbtn" >Edit Schedule</Button>


            <?php
            $u=new data;
            $u->setconnection();
            $u->getAppoinmentById($appointmentId);
            $recordset=$u->getAppoinmentById($appointmentId);

            foreach($recordset as $row){

              
                $date= $row[3];
                $time_from= $row[4];
                $time_to = $row[5];

            

                
                
           
                }

            ?>
           
            <form action="editScheduleFunction.php" method="post" enctype="multipart/form-data">
            <label>Previous Date:<?php echo $date?></label></br>
            <label>Date:</label><input type="date"  name="date"/>
            </br>
           <label>Previous time from: <?php echo $time_from?></label></br>
            <label>Time From:</br></label><input type="time"  name="time_from">
            </br>
            <label>Previous time to:<?php echo $time_to?></label></br>
            <label>Time To: </br>
        </label><input type="time"  name="time_to">
            </br>
            <label for="teacher"></label>
            

           
            </select>

            <label for="Select Student"></label>
            <select name="teacherSelect" >
           
           
                <option value="<?php echo $appointmentId ?>"></option>
           
            </select>
          

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>


           

</body>

</html>