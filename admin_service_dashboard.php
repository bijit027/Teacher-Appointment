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

    ?>



        <div class="container">
        <div class="innerdiv">
        <div class="row"><h1 style="margin-left:40%">APPOINTMENT SYSTEM</h1></div>
            <div class="leftinnerdiv">
                <Button class="greenbtn"> ADMIN</Button>
                
               
                
                
                <Button class="greenbtn" onclick="openpart('addperson')"> ADD STUDENT</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"> STUDENT LIST</Button>
                
                <Button class="greenbtn" onclick="openpart('studentRegisterRequest')"> STUDENT REQUEST</Button>
                

                <Button class="greenbtn" onclick="openpart('teacherRegisterRequest')"> TEACHER REQUEST</Button>
                
                <Button class="greenbtn" onclick="openpart('addTeacher')"> ADD TEACHER</Button>
                
                <Button class="greenbtn" onclick="openpart('teacherData')"> TEACHER LIST</Button>
               
                <a href="index.php"><Button class="greenbtn" > LOGOUT</Button></a>
            </div>

           

            
            

            <!--ADD STUDENT-->
            
<div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none" >
            <Button class="greenbtn" >ADD STUDENT</Button>
            
            <form action="adminRegisterUser.php" method="post" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="addname"/>
            
            </br>
            <label>Email:</label><input  type="email" name="addemail"/>
            </br>
            <label>Department:</label><input  type="text" name="department"/>
            </br>
            <label>Student ID:</label><input  type="text" name="student_id"/>
            </br>
            <label>Password:</label><input type="password" name="addpass"/></br>
            <label for="typw"></label>
            <select name="type"  >
                <option value="student" ></option>
               
            </select>

            <input type="submit" value="SUBMIT"/>

            </form>
            </div>
            </div>

            <!--ADD TEACHER-->

            <div class="rightinnerdiv">   
            <div id="addTeacher" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD Teacher</Button>
            <form action="adminTeacherAddFunction.php" method="post" enctype="multipart/form-data">
            <label>Teacher Name:</label><input type="text" name="teachername"/>
            </br>
            <label>Department:</label><input  type="text" name="department"/></br>
            <label>Subject:</label><input type="text" name="subject"/></br>
            <label>email</label><input type="email" name="email"/></br>
            <label>password</label><input type="password" name="password"/></br>
            
   
            <input type="submit" value="SUBMIT"/>
            </br>
            </br>

            </form>
            </div>
            </div>

             

            <!--Student List-->

            <div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Student List</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Email</th><th>Department</th><th>ID</ht><th></th><th></th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
                $table.="<td><a href='editUser.php?useriddelete=$row[0]'><button type='button' class='btn btn-secondary'>Edit</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

             <!--Teacher List -->

             <div class="rightinnerdiv">   
            <div id="teacherData" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Teacher List</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->teacherData();
            $recordset=$u->teacherData();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'> Name</th><th>Department</th><th>Subject</th><th>Email</th><th><th></th><th</th>></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td><a href='deleteTeacher.php?teacheriddelete=$row[0]'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
                $table.="<td><a href='editTeacher.php?teacheriddelete=$row[0]'><button type='button' class='btn btn-secondary'>Edit</button></a></td>";
                
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

          

       

              <!--Student Register Request-->
              <div class="rightinnerdiv">   
            <div id="studentRegisterRequest" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Student Register Request </Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestRegisterStudent();
            $recordset=$u->requestRegisterStudent();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Student Name</th><th>Department</th><th>ID</th><th>Email</th><th>Approve</th><th>Denie</th><th></th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[1]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[2]</td>";
               
             
                
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><a href='approveRegisterStudent.php?id=$row[0]&status=1'><button type='button' class='btn btn-primary'>Apporoved</button></a></td>";
                 $table.="<td><a href='deleteuser.php?useriddelete=$row[0]><button type='button' class='btn btn-danger'>Denied</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>


             <!--Student Register Request-->
             <div class="rightinnerdiv">   
            <div id="teacherRegisterRequest" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Teacher Register Request </Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->requestRegisterTeacher();
            $recordset=$u->requestRegisterTeacher();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  border: 1px solid #ddd;
            padding: 8px;'>Teacher Name</th><th>Department</th><th>Subject</th><th>Email</th><th>Approve</th><th>Denie</th><th></th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
               
             
                
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><a href='approveRegisterTeacher.php?id=$row[0]&status=1'><button type='button' class='btn btn-primary'>Apporoved</button></a></td>";
                 $table.="<td><a href='deleteteacher.php?teacheriddelete=$row[0]><button type='button' class='btn btn-danger'>Denied</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
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