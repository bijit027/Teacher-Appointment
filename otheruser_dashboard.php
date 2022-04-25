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
    float: left;
    width: 25%;
}

.rightinnerdiv {
    float: right;
    width: 75%;
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
           <div class="container">
            <div class="innerdiv">
            <div class="row"><h1 style="margin-left:40%">APPOINTMENT SYSTEM</h1></div>
            <div class="leftinnerdiv">
                <Button class="greenbtn" >Welcome</Button>
                <Button class="greenbtn" onclick="openpart('myaccount')"> My Account</Button>
                
                
                
                <Button class="greenbtn" onclick="openpart('editProfile')"> Edit Profile</Button>
                <Button class="greenbtn" onclick="openpart('viewDepartment')"> View Department</Button>
                <Button class="greenbtn" onclick="openpart('getAppoinment')"> Get Appoinment</Button>
                <Button class="greenbtn" onclick="openpart('appointmentHistory')"> Appointment History</Button>
              

                <Button class="greenbtn" onclick="openpart('upcomingAppointmentStudent')"> Appointment In 7 Days  </Button>
               

                <Button class="greenbtn" onclick="openpart('studentTodayAppointmnet')"> Today's Appointment  </Button>
                

                
                <a href="index.php"><Button class="greenbtn" > LOGOUT</Button></a>
            </div>

            


            <div class="rightinnerdiv">   
            <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
            <Button class="greenbtn" >My Account</Button>

            <?php

            $u=new data;
            $u->setconnection();
            $u->userdetail($userloginid);
            $recordset=$u->userdetail($userloginid);
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
            <form action="studentUpdateFunction.php" method="post" enctype="multipart/form-data">

            <?php

                    $u=new data;
                    $u->setconnection();
                    $u->studentDetail($userloginid);
                    $recordset=$u->studentDetail($userloginid);
                    foreach($recordset as $row){

                    $id= $row[0];
                    $name= $row[1];
                    $email= $row[2];
                    $password= $row[3];
                    $department= $row[5];
                    $student_id=$row[6];
                 
                    }
              
    ?>
            <label>Name:</label><input type="text" value="<?php echo $name?>" name="name"/>
            </br>
            <label>Department:</label><input  type="text" value="<?php echo $department?>" name="department"/></br>
            <label>Student_ID:</label><input type="text" value="<?php echo $student_id?>" name="student_id"/></br>
            <label>email</label><input type="email" value="<?php echo $email?>" name="email"/></br>
            <label>password</label><input type="password" value="<?php echo $password?>" name="password"/></br>
            <input  type="hidden" value="<?php echo $userloginid?>" name='id'/>
            
   
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>


            
            <!--Get Appoinment-->

            <div class="rightinnerdiv">   
            <div id="getAppoinment" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Get Appointment</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->getAppoinment();
            $recordset=$u->getAppoinment();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Date</th><th>Time_from</th><th>Time_to</th><th>Get Appoinment</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";

                if($row[6]==0){
                $table.="<td><a href='requestAppoinment.php?teacherid=$row[1]&userid=$userloginid'><button type='button' class='btn btn-primary'>Get Appoinment</button></a></td>";
                }
                else{
                    $table.="<td><button type='button' class='btn btn-secondary'>Booked</button></td>";
                }
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <!--Appoinment History-->
            <div class="rightinnerdiv">   
            <div id="appointmentHistory" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" >Appointment History</Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->appointmentHistory($userloginid);
            $recordset=$u->appointmentHistory($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Teacher</th><th>Date</th><th>Time From</th><th>Time To</th><th>Approve</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                
               
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
               
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


             <!--Subject List-->
<!--
             <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($subject=$_REQUEST['viewsubject'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >BOOK DETAIL</Button>
</br>
<?php /*
            $u=new data;
            $u->setconnection();
            $u->getSubject() ;
            $recordset=$u->getSubject();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Department Name</th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
    
                $table.="<td><a href='otheruser_dashboard.php?viewsubject=$row[2]'><button type='button' class='btn btn-primary'>View Subject</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
         */   ?>



          


            </div>
            </div>

        -->


        <!--View Department-->


        <div class="rightinnerdiv">   
            <div id="viewDepartment" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Department</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getTeacher() ;
            $recordset=$u->getTeacher();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Department Name</th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
    
                $table.="<td><a href='subjectList.php?viewsubject=$row[2]&userid=$userloginid'><button type='button' class='btn btn-primary'>View Subject</button></a></td>";
                
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
            <div id="upcomingAppointmentStudent" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" > Appointment In 7 Days </Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->upcomingStudent($userloginid);
            $recordset=$u->upcomingStudent($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Teacher</th><th>Date</th><th>Time From</th><th>Time To</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                
                $table.="<td>$row[4]</td>";
                
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
            <div id="studentTodayAppointmnet" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
            <Button class="greenbtn" > Appointment In 7 Days </Button>

            <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new data;
            $u->setconnection();
            $u->studentTodayAppointmnet($userloginid);
            $recordset=$u->studentTodayAppointmnet($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Teacher</th><th>Date</th><th>Time From</th><th>Time To</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                
                $table.="<td>$row[4]</td>";
                
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