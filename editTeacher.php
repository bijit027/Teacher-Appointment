
<?php

session_start();

$userloginid= $_GET['teacheriddelete'];
 


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
    margin-top:10%;
}

.innerright {
    background-color: white;
}

.greenbtn {
    background-color: rgb(16, 170, 16);
    color: white;
    width: 50%;
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
            <Button class="greenbtn" >Edit Teacher</Button>


            <?php
            $u=new data;
            $u->setconnection();
            $u->teacherDetail($userloginid);
            $recordset=$u->teacherDetail($userloginid);

            foreach($recordset as $row){

                $id= $row[0];
                $name= $row[1];
                $department= $row[2];
                $subject= $row[3];
                $email= $row[4];
                $password = $row[5];

                
                
           
                }

            ?>
            <form action="adminTeacherUpdateFunction.php" method="post" enctype="multipart/form-data">
            <label>Teacher Name:</label></br><input type="text" value="<?php echo $name?>" name="teachername"/>
            </br>
            <label>Department:</label></br><input  type="text" value="<?php echo $department?>" name="department"/></br>
            <label>Subject:</label></br><input type="text" value="<?php echo $subject?>" name="subject"/></br>
            <label>email</label></br><input type="email" value="<?php echo  $email?>" name="email"/></br>
            <label>password</label></br><input type="password" value="<?php echo $password?>" name="password"/></br></br>
            <input  type="hidden" value="<?php echo $userloginid?>" name='id'/>
            
   
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>


           

</body>

</html>