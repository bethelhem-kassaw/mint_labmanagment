<?php
include('../database/db.php');
session_start();

if(isset($_POST['save_member'])){
    $stu_id=$_POST['stu_id'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['m_gender'];
    $contact=$_POST['contact'];
    $department=$_POST['m_Department'];
    $type=$_POST['type'];


    $query="INSERT INTO member(`m_school_id`, `m_fname`, `m_lname`, `m_gender`, `m_coontact`, `m_department`, `m_type`) 
            VALUES ('$stu_id','$fname','$lname','$gender','$contact','$department','$type')";

    $query_run=mysqli_query($conn,$query);

    if($query_run){
            $_SESSION['success']="member added";
            header('Location:../borrower.php');
    }else{
        $_SESSION['success']="member not added";
        header('Location:../borrower.php');
    }
}

?>