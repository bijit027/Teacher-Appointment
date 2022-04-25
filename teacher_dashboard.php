<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


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
        <title>Teacher Page</title>
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
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
}

.innerright {
    background-color: RGB(215, 219, 221)
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
           <div class="container">
            <div class="innerdiv">
            <div class="row"><h1 style="margin-left:40%">APPOINTMENT SYSTEM</h1></div>
            <div class="leftinnerdiv">
                <Button class="greenbtn" >Welcome</Button>
                <Button class="greenbtn" onclick="openpart('editProfile')"> Edit Profile</Button>

                <Button class="greenbtn" onclick="openpart('teacherSchedule')">Create Appointment</Button>
                
                <Button class="greenbtn" onclick="openpart('createdAppoinment')">Created Appointment</Button>
                <Button class="greenbtn" onclick="openpart('upcomingAppointment')"> All Appointment</Button>
                
                <Button class="greenbtn" onclick="openpart('upcomingAppointmentTeacher')"> Appointment In 7 Days </Button>
                <Button class="greenbtn" onclick="openpart('appointmentrequestapprove')">REQUESTS LIST</Button>
                
                <Button class="greenbtn" onclick="openpart('teacherTodayAppointmnet')"> Tody's Appointment</Button>
                
                

                <a href="index.php"><Button class="greenbtn" > LOGOUT</Button></a>
            </div>

            


            <div class="rightinnerdiv">   
            <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >My Account</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->teacherDetail($userloginid);
            $recordset=$u->teacherDetail($userloginid);
            foreach($recordset as $row){

            $id= $row[0];
            $name= $row[1];
            $email= $row[2];
            $pass= $row[3];
            $type= $row[4];
            }               
                ?>

            <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
            <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
            <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>
        
            </div>
            </div>


            <!--UPDATE PROFILE-->

    
            <div class="rightinnerdiv">   
            <div id="editProfile" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Edit Profile</Button>
            <form action="teacherUpdateFunction.php" method="post" enctype="multipart/form-data">

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
                    $password= $row[5];
                    }
              
    ?>
            <label>Teacher Name:</label><input type="text" value="<?php echo $name?>" name="teachername"/>
            </br>
            <label>Department:</label><input  type="text" value="<?php echo $department?>" name="department"/></br>
            <label>Subject:</label><input type="text" value="<?php echo $subject?>" name="subject"/></br>
            <label>email</label><input type="email" value="<?php echo $email?>" name="email"/></br>
            <label>password</label><input type="password" value="<?php echo $password?>" name="password"/></br>
            <input  type="hidden" value="<?php echo $userloginid?>" name='id'/>
            
   
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>

            <!--Edit/Delete Schedule-->

            <div class="rightinnerdiv">   
            <div id="editSchedule" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Edit Appoinment </Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->editSchedule($userloginid);
            $recordset=$u->editSchedule($userloginid);

            foreach($recordset as $row){

                $id= $row[0];
                $student_id= $row[1];
                $teacher_id= $row[2];
                $student_name= $row[3];
                $teacher_name= $row[4];
                $date= $row[5];
                $time_from= $row[6];
                $time_to= $row[7];
                }

            ?>

            <form action="teacherScheduleFunction.php" method="post" enctype="multipart/form-data">
            <label>date:</label><input type="date" value="<?php echo $date?>" name="date"/>
            </br>
            <label>time from:</label><input type="time" name="time_from">
            </br>
            <label>time to:</label><input type="time" name="time_to">
            </br>
            <label for="teacher">Choose Teacher:</label>
            

           
            </select>

            <label for="Select Student">:</label>
            <select name="teacherSelect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getTeacher();
            $recordset=$u->getTeacher();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
          

            <input type="submit" value="SUBMIT"/>
            </form>

            </div>
            </div>

            <!--Upcoming Appointment-->
            
            
            <div class="rightinnerdiv">   
            <div id="upcomingAppointment" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Upcoming Appointment </Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->upcomingAppointment($userloginid);
            $recordset=$u->upcomingAppointment($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Student</th><th>Date</th><th>Time From</th><th>Time To</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                
                $table.="<td>$row[3]</td>";
                
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
               
               
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <!-- Appointment in 7dyas-->
            
            
            <div class="rightinnerdiv">   
            <div id="upcomingAppointmentTeacher" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >  Upcoming 7 Days Appointment </Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->upcomingAppointmentTeacher($userloginid);
            $recordset=$u->upcomingAppointmentTeacher($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Student</th><th>Date</th><th>Time From</th><th>Time To</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                
                $table.="<td>$row[3]</td>";
                
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
               
               
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


              <!-- Appointment in Today-->
            
            
              <div class="rightinnerdiv">   
            <div id="teacherTodayAppointmnet" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" > Appointment In 7 Days </Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->teacherTodayAppointmnet($userloginid);
            $recordset=$u->teacherTodayAppointmnet($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Student</th><th>Date</th><th>Time From</th><th>Time To</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                
                $table.="<td>$row[3]</td>";
                
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
               
               
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

             <!-- Teacher Schedule-->

             <div class="rightinnerdiv">   
            <div id="teacherSchedule" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Teacher Schedule</Button>
            <form action="teacherScheduleFunction.php" method="post" enctype="multipart/form-data">
            <label>date:</label><input type="date" name="date"/>
            </br>
            <label>time from:</label><input type="time" name="time_from">
            </br>
            <label>time to:</label><input type="time" name="time_to">
            </br>
            <label for="teacher"></label>
            

           
            </select>

            <label for="Select Student">:</label>
            <select name="teacherSelect" >
           
           
                <option value="<?php echo $userloginid ?>"></option>
           
            </select>
          

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>


            <!--Appointment Request-->
            <div class="rightinnerdiv">   
            <div id="appointmentrequestapprove" class="innerright portion" style="display:none">
            <Button class="greenbtn" >APPOINTMENT REQUEST </Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestAppointmentData($userloginid);
            $recordset=$u->requestAppointmentData($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Student Name</th><th>Department</th><th>ID</th><th>Date</th><th>Time from</th><th>Time to</th><th>Approve</th><th></th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                
               
                 $table.="<td><a href='approveAppointmentRequest.php?id=$row[0]&status=Approved'><button type='button' class='btn btn-primary'>Apporoved</button></a></td>";
                 $table.="<td><a href='approveAppointmentRequest.php?id=$row[0]&status=Denied'><button type='button' class='btn btn-danger'>Denied</button></a></td>";
               
                $table.="</tr>";
                
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


             <!--Created Appoinment-->

             <div class="rightinnerdiv">   
            <div id="createdAppoinment" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Created Appointment</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getAppoinmentTeacher($userloginid);
            $recordset=$u->getAppoinmentTeacher($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Date</th><th>Time_from</th><th>Time_to</th><th>Delete</th><th>Edit</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";

                
                $table.="<td><a href='deleteAppointment.php?appointmentId=$row[0]&userid=$userloginid'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
            
            
                    $table.="<td><a href='editAppointment.php?appointmentId=$row[0]&userid=$userloginid'><button type='button' class='btn btn-secondary'>Edit</button></td>";
            
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>



         


            



            
     


        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }

   
 
        
        </script>
    </body>
</html>