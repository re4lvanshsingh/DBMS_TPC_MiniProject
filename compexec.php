<?php
            $con = mysqli_connect("localhost","root","","projmini");

            if(!$con)die("connection to database failed due to" . mysqli_connect_error());
        
            $compname =  $_POST['compname'];
            $qualify= $_POST['minqual'];
            $role = $_POST['field'];
            $type= $_POST['type'];
            $conduct= $_POST['conduct'];
            $salary = $_POST['salary'];
            
            session_start();
            $email = $_SESSION['mail'];

            $sql = "update `companyupd` set `compname` = '$compname',`field`='$role',`minqual`= '$qualify',`type`= '$type',`mode` = '$conduct',`package` = '$salary' where `email` = '$email';";
            
            if($con->query($sql)==true)echo "Update Successful";
            else echo "ERROR: $sql <br> $con->error";
        
            $con->close();
?>