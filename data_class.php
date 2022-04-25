<?php include("db.php");

class data extends db {

    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookaudor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;

    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;





    function __construct() {
        // echo " constructor ";
        echo "</br></br>";
    }


    function addnewuser($name,$pasword,$email,$type){
        $this->name=$name;
        $this->pasword=$pasword;
        $this->email=$email;
        $this->type=$type;


         $q="INSERT INTO userdata(id, name, email, pass,type)VALUES('','$name','$email','$pasword','$type')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=New Add done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=Register Fail");
        }



    }

    function RegisterUser($name,$pasword,$email,$type,$department,$student_id){
        $this->name=$name;
        $this->pasword=$pasword;
        $this->email=$email;
        $this->type=$type;
        $this->$department=$department;
        $this->$student_id=$student_id;


         $q="INSERT INTO userdata(id, name, email, pass,type,department,student_id,valid)VALUES('','$name','$email','$pasword','$type','$department','$student_id','0')";

        if($this->connection->exec($q)) {
            header("Location:index.php?msg=Register done");
        }

        else {
            header("Location:index.php?msg=Register Fail");
        }



    }

    

    function adminRegisterUser($name,$pasword,$email,$type,$department,$student_id){
        $this->name=$name;
        $this->pasword=$pasword;
        $this->email=$email;
        $this->type=$type;
        $this->$department=$department;
        $this->$student_id=$student_id;


         $q="INSERT INTO userdata(id, name, email, pass,type,department,student_id,valid)VALUES('','$name','$email','$pasword','$type','$department','$student_id','1')";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=Register Done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=Register Fail");
        }



    }
    function userLogin($t1, $t2) {
        $q="SELECT * FROM userdata where email='$t1' and pass='$t2' and valid='1'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: otheruser_dashboard.php?userlogid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    function teacherLogin($t1, $t2) {
        $q="SELECT * FROM teacher where email='$t1' and password='$t2' and valid='1'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: teacher_dashboard.php?userlogid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }

    function adminLogin($t1, $t2) {

        $q="SELECT * FROM admin where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location: admin_service_dashboard.php?logid=$logid");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }



    function addbook($bookpic, $bookname, $bookdetail, $bookaudor, $bookpub, $branch, $bookprice, $bookquantity) {
        $this->$bookpic=$bookpic;
        $this->bookname=$bookname;
        $this->bookdetail=$bookdetail;
        $this->bookaudor=$bookaudor;
        $this->bookpub=$bookpub;
        $this->branch=$branch;
        $this->bookprice=$bookprice;
        $this->bookquantity=$bookquantity;

       $q="INSERT INTO book (id,bookpic,bookname, bookdetail, bookaudor, bookpub, branch, bookprice,bookquantity,bookava,bookrent)VALUES('','$bookpic', '$bookname', '$bookdetail', '$bookaudor', '$bookpub', '$branch', '$bookprice', '$bookquantity','$bookquantity',0)";

        if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }


    function teacherSchedule($teacher_id,$date, $time_from, $time_to) {
        $this->$date=$date;
        $this->teacher=$teacher;
        $this->time_from=$time_from;
        $this->time_to=$time_to;


        $f="SELECT * FROM teacher where id='$teacher_id'";
        $recordSetss=$this->connection->query($f);

        foreach($recordSetss->fetchAll() as $row) {
            $name=$row['name'];

        }


 



       $q="INSERT INTO teacher_schedule (id,teacher_id,name,day, time_from, time_to)VALUES('','$teacher_id','$name', '$date', '$time_from', '$time_to')";

        if($this->connection->exec($q)) {
            header("Location:teacher_dashboard.php?userlogid=$teacher_id");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }

    }


    function addTeacher($teachername,$department,$subject,$email,$password) {
       

      $this->$teachername=$teachername;
      $this->$department=$department;
      $this->$subject   =$subject;
      $this->$email   =$email;
      $this->$password   =$password;

       $q="INSERT INTO teacher (id,name,department, subject, email, password,valid)VALUES('','$teachername', '$department', '$subject', '$email','$password','0')";

       if($this->connection->exec($q)) {
        header("Location:index.php?msg=Register done");
    }

    else {
        header("Location:index.php?msg=Register Fail");
    }

    }

    
    private $id;

    function updateTeacher($teachername,$department,$subject,$email,$password,$id) {
       

        $this->$teachername=$teachername;
        $this->$department=$department;
        $this->$subject   =$subject;
        $this->$email   =$email;
        $this->$password   =$password;
        $this->$id       = $id;

       
  
         $q="UPDATE teacher SET id='$id',name='$teachername',department='$department',subject='$subject',email='$email',password='$password' WHERE id='$id'";
  
          if($this->connection->exec($q)) {
              header("Location:teacher_dashboard.php?userlogid=$id");
          }
  
          else {
              header("Location:teacher_dashboard.php?userlogid=$id");
          }
  
      }

      function adminUpdateTeacher($teachername,$department,$subject,$email,$password,$id) {
       

        $this->$teachername=$teachername;
        $this->$department=$department;
        $this->$subject   =$subject;
        $this->$email   =$email;
        $this->$password   =$password;
        $this->$id       = $id;

       
  
         $q="UPDATE teacher SET id='$id',name='$teachername',department='$department',subject='$subject',email='$email',password='$password' WHERE id='$id'";
  
         if($this->connection->exec($q)) {
            header("Location:admin_service_dashboard.php?msg=done");
        }

        else {
            header("Location:admin_service_dashboard.php?msg=fail");
        }
  
      }

      function adminTeacherAdd($teachername,$department,$subject,$email,$password) {
       

        $this->$teachername=$teachername;
        $this->$department=$department;
        $this->$subject   =$subject;
        $this->$email   =$email;
        $this->$password   =$password;
  
         $q="INSERT INTO teacher (id,name,department, subject, email, password,valid)VALUES('','$teachername', '$department', '$subject', '$email','$password','1')";
  
          if($this->connection->exec($q)) {
              header("Location:admin_service_dashboard.php?msg=done");
          }
  
          else {
              header("Location:admin_service_dashboard.php?msg=fail");
          }
  
      }


      


      


      function updateStudent($name,$email,$password,$id,$department,$student_id) {
       

        $this->$name=$name;
  
        $this->$email   =$email;
        $this->$password   =$password;
        $this->$id       = $id;
        $this->$department = $department;
        $this->$student_id = $student_id;

       
  
         $q="UPDATE userdata SET id='$id',name='$name',email='$email',pass='$password',type='student',department='$department',student_id='$student_id' WHERE id='$id'";
  
          if($this->connection->exec($q)) {
              header("Location:otheruser_dashboard.php?userlogid=$id");
          }
  
          else {
              header("Location:otheruser_dashboard.php?userlogid=$id");
          }
  
      }
      function adminUpdateStudent($name,$email,$password,$id,$department,$student_id) {
       

        $this->$name=$name;
  
        $this->$email   =$email;
        $this->$password   =$password;
        $this->$id       = $id;
        $this->$department = $department;
        $this->$student_id = $student_id;

       
  
         $q="UPDATE userdata SET id='$id',name='$name',email='$email',pass='$password',type='student',department='$department',student_id='$student_id' WHERE id='$id'";
  
         if($this->connection->exec($q)){
    
            
            header("Location:admin_service_dashboard.php?msg=done");
         }
         else{
            header("Location:admin_service_dashboard.php?msg=fail");
         }
  
      }

      
      function editAppointment($appointmentId,$date,$time_from,$time_to) {
       

        $this->$appointmentId=$appointmentId;
  
        $this->$date   =$date;
        $this->$time_from   =$time_from;
        
        $this->$time_to = $time_to;
        

        $f="SELECT * FROM teacher_schedule where id='$appointmentId'";
        $recordSet=$this->connection->query($f);

        foreach($recordSet->fetchAll() as $row) {
            $id=$row['teacher_id'];
            
        }

      

       
  
         $q="UPDATE teacher_schedule SET day='$date',time_from='$time_from',time_to='$time_to' WHERE id='$appointmentId'";
         if($this->connection->exec($q)) {
            header("Location:teacher_dashboard.php?userlogid=$id");
        }

        else {
            header("Location:teacher_dashboard.php?userlogid=$id");
        }
  
         
  
      }


    function getissuebook($userloginid) {

        $newfine="";
        $issuereturn="";

        $q="SELECT * FROM issuebook where userid='$userloginid'";
        $recordSetss=$this->connection->query($q);


        foreach($recordSetss->fetchAll() as $row) {
            $issuereturn=$row['issuereturn'];
            $fine=$row['fine'];
            $newfine= $fine;

            
                //  $newbookrent=$row['bookrent']+1;
        }


        $getdate= date("d/m/Y");
        if($issuereturn<$getdate){
            $q="UPDATE issuebook SET fine='$newfine' where userid='$userloginid'";

            if($this->connection->exec($q)) {
                $q="SELECT * FROM issuebook where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;
            }
            else{
                $q="SELECT * FROM issuebook where userid='$userloginid' ";
                $data=$this->connection->query($q);
                return $data;  
            }

        }
        else{
            $q="SELECT * FROM issuebook where userid='$userloginid'";
            $data=$this->connection->query($q);
            return $data;

        }






    }

    function getbook() {
        $q="SELECT * FROM book ";
        $data=$this->connection->query($q);
        return $data;
    }

    function getTeacher() {
        $q="SELECT * FROM teacher ";
        $data=$this->connection->query($q);
        return $data;
    }
    function getTeacherSubject($department) {
        $q="SELECT * FROM teacher where department='$department'";
        $data=$this->connection->query($q);
        return $data;
    }

    function getSubjectTeacher($subject) {
        $q="SELECT * FROM teacher where subject='$subject'";
        $data=$this->connection->query($q);
        return $data;
    }



    

    function getAppoinment() {
        $q="SELECT * FROM teacher_schedule ";
        $data=$this->connection->query($q);
        return $data;
    }

    function getAppoinmentTeacher($id) {
        $q="SELECT * FROM teacher_schedule where teacher_id='$id' AND status='0' ";
        $data=$this->connection->query($q);
        return $data;
    }

    function getAppoinmentById($id) {
        $q="SELECT * FROM teacher_schedule where id='$id'  ";
        $data=$this->connection->query($q);
        return $data;
    }

    function teacherAppointment($id) {
        $q="SELECT * FROM teacher_schedule where teacher_id='$id'";
        $data=$this->connection->query($q);
        return $data;
    }


    function getbookissue(){
        $q="SELECT * FROM book where bookava !=0 ";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdata() {
        $q="SELECT * FROM userdata ";
        $data=$this->connection->query($q);
        return $data;
    }
    

    function teacherData() {
        $q="SELECT * FROM teacher ";
        $data=$this->connection->query($q);
        return $data;
    }


    function getbookdetail($id){
        $q="SELECT * FROM book where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }


    function getSubject($department){
        $q="SELECT * FROM teacher where department ='$department'";
        $data=$this->connection->query($q);
        return $data;
    }

    function userdetail($id){
        $q="SELECT * FROM userdata where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }
   

    function teacherDetail($id){
        $q="SELECT * FROM teacher where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    function studentDetail($id){
        $q="SELECT * FROM userdata where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }
    

    function upcomingAppointment($id){
        $q="SELECT * FROM appointment_history where teacher_id ='$id' AND status='Approved'";
        $data=$this->connection->query($q);
        return $data;
    }

   

    function upcomingStudent($id){
        $q="SELECT * FROM appointment_history where student_id ='$id' AND status='Approved'   And `date` BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 7 DAY) ORDER BY date ASC";
        $data=$this->connection->query($q);
        return $data;
    }
 
    function studentTodayAppointmnet($id){
        $q="SELECT * FROM appointment_history where student_id ='$id' AND status='Approved' And date=CURDATE()  ORDER BY date ASC";
        $data=$this->connection->query($q);
        return $data;
    }

    

    function upcomingAppointmentTeacher($id){
        $q="SELECT * FROM appointment_history where teacher_id ='$id' AND status='Approved' And `date` BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 7 DAY) ORDER BY date ASC";
        $data=$this->connection->query($q);
        return $data;
    }

    

    function teacherTodayAppointmnet($id){
        $q="SELECT * FROM appointment_history where teacher_id ='$id' AND status='Approved' And date=CURDATE()  ORDER BY date ASC";
        $data=$this->connection->query($q);
        return $data;
    }



    

    function editSchedule($id){
        $q="SELECT * FROM appointment_history where teacher_id ='$id' AND status='Approved'";
        $data=$this->connection->query($q);
        return $data;
    }

    
   



    function requestbook($userid,$teacherid){

        $q="SELECT * FROM book where id='$bookid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where id='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $username=$row['name'];
            $usertype=$row['type'];
        }

        foreach($recordSetss->fetchAll() as $row) {
            $bookname=$row['bookname'];
        }

        if($usertype=="student"){
            $days=7;
        }
        if($usertype=="teacher"){
            $days=21;
        }


        $q="INSERT INTO requestbook (id,userid,bookid,username,usertype,bookname,issuedays)VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

        if($this->connection->exec($q)) {
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        }

        else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }

    }


    function requestAppoinment($userid,$teacherid){

        $q="SELECT * FROM teacher_schedule where teacher_id='$teacherid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where id='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $studentname=$row['name'];
            $usertype=$row['type'];
            $department=$row['department'];
            $student_id = $row['student_id'];
        }

        foreach($recordSetss->fetchAll() as $row) {
            $teachername=$row['name'];
            $date = $row['day'];
            $time_from = $row['time_from'];
            $time_to = $row['time_to'];
        }

       
        $status='0';

        $q="INSERT INTO appoinment (id,student_id,teacher_id,student_name,teacher_name,appointment_date,time_from,time_to,status,department,varsity_id)VALUES('','$userid', '$teacherid', '$studentname','$teachername', '$date', '$time_from', '$time_to','$status','$department','$student_id')";

        if($this->connection->exec($q)) {
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        }

        else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }

    }



    function returnbook($id){
        $fine="";
        $bookava="";
        $issuebook="";
        $bookrentel="";

        $q="SELECT * FROM issuebook where id='$id'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $userid=$row['userid'];
            $issuebook=$row['issuebook'];
            $fine=$row['fine'];

        }
        if($fine==0){

        $q="SELECT * FROM book where bookname='$issuebook'";
        $recordSet=$this->connection->query($q);   

        foreach($recordSet->fetchAll() as $row) {
            $bookava=$row['bookava']+1;
            $bookrentel=$row['bookrent']-1;
        }
        $q="UPDATE book SET bookava='$bookava', bookrent='$bookrentel' where bookname='$issuebook'";
        $this->connection->exec($q);

        $q="DELETE from issuebook where id=$id and issuebook='$issuebook' and fine='0' ";
        if($this->connection->exec($q)){
    
            header("Location:otheruser_dashboard.php?userlogid=$userid");
         }
        //  else{
        //     header("Location:otheruser_dashboard.php?msg=fail");
        //  }
        }
        // if($fine!=0){
        //     header("Location:otheruser_dashboard.php?userlogid=$userid&msg=fine");
        // }
       

    }

    function delteuserdata($id){
        $q="DELETE from userdata where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    

    
    function delteTeacherdata($id){
        $q="DELETE from teacher where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }


    


    function deleteAppointment($appointmnentId,$id){
        $q="DELETE from teacher_schedule WHERE id='$appointmnentId'";
        if($this->connection->exec($q)){
    
            
           header("Location:teacher_dashboard.php?userlogid=$id");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

    function deletebook($id){
        $q="DELETE from book where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=done");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=fail");
        }
    }

        function issuereport(){
            $q="SELECT * FROM issuebook ";
            $data=$this->connection->query($q);
            return $data;
            
        }

        function requestbookdata(){
            $q="SELECT * FROM requestbook ";
            $data=$this->connection->query($q);
            return $data;
        }

        //request appointment
        function requestAppointmentData($id){
            $q="SELECT * FROM appoinment WHERE teacher_id='$id' ";
            $data=$this->connection->query($q);
            return $data;
        }

        function requestRegisterStudent(){
            $q="SELECT * FROM userdata WHERE valid='0'";
            $data=$this->connection->query($q);
            return $data;
        }


        function requestRegisterTeacher(){
            $q="SELECT * FROM teacher WHERE valid='0'";
            $data=$this->connection->query($q);
            return $data;
        }

        //APPROVE APOINTMENT
        function approveAppointment($id,$status){
            $this->$id= $id;
            $this->$status=$status;
           
    
    
            $q="SELECT * FROM appoinment where id='$id'";
            $recordSetss=$this->connection->query($q);
    

    
           
    
    
                    
                
                foreach($recordSetss->fetchAll() as $row) {
                    $id=$row['id'];
                    $student_id=$row['student_id'];
                    $teacher_id=$row['teacher_id'];
                    $student_name=$row['student_name'];
                    $teacher_name=$row['teacher_name'];
                    $appointment_date=$row['appointment_date'];
                    $time_from=$row['time_from'];
                    $time_to=$row['time_to'];
    
                        
                }

                
                 
                $q="INSERT INTO appointment_history(id,student_id,teacher_id,student_name,teacher_name,date,time_from,time_to,status)VALUES('','$student_id','$teacher_id','$student_name','$teacher_name','$appointment_date','$time_from',' $time_to','$status')";
            
               
    
                
    
                if($this->connection->exec($q)) {
    
                    $q="DELETE from appoinment where id='$id'";
                    $this->connection->exec($q);

            

                    $update="UPDATE teacher_schedule SET status='1' where teacher_id='$teacher_id' ";
                    $this->connection->exec($update);
                    header("Location:teacher_dashboard.php?userlogid=$teacher_id");
                }
        
                else {
                    header("Location:teacher_dashboard.php?userlogid=$teacher_id");
                }
               
         
    
        }

        function approveRegisterStudent($id){
            $this->$id= $id;
           
           
    
    
            $q="UPDATE userdata SET valid='1' where id='$id' ";
            if($this->connection->exec($q)){
    
            
                header("Location:admin_service_dashboard.php?msg=done");
             }
             else{
                header("Location:admin_service_dashboard.php?msg=fail");
             }
    
               
         
    
        }

        
        function approveRegisterTeacher($id){
            $this->$id= $id;
           
           
    
    
            $q="UPDATE teacher SET valid='1' where id='$id'";
            if($this->connection->exec($q)){
    
            
                header("Location:admin_service_dashboard.php?msg=done");
             }
             else{
                header("Location:admin_service_dashboard.php?msg=fail");
             }
    
               
         
    
        }

        //APOINTMENT HISTORY

        function appointmentHistory($id){
            $q="SELECT * FROM appointment_history where student_id ='$id'";
            $data=$this->connection->query($q);
            return $data;
        }





      // issue issuebookapprove
      function issuebookapprove($book,$userselect,$days,$getdate,$returnDate,$redid){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookava']-1;
                     $newbookrent=$row['bookrent']+1;
            }

        
            $q="UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {

                $q="DELETE from requestbook where id='$redid'";
                $this->connection->exec($q);
                header("Location:admin_service_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_service_dashboard.php?msg=fail");
            }




        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
    
    // issue book
    function issuebook($book,$userselect,$days,$getdate,$returnDate){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookava']-1;
                     $newbookrent=$row['bookrent']+1;
            }

        
            $q="UPDATE book SET bookava='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {
                header("Location:admin_service_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_service_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_service_dashboard.php?msg=fail");
            }


        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
}