<?php
include('db.php');
session_start();
// var_dump($_SESSION);

if(isset($_POST['save_user']))
{
    
    $name=$_POST['name'];
    $username=$_POST['username'];
    $encrypted=md5($_POST['password']);
    $type=$_POST['type'];

    
    
    
            $query = "INSERT INTO user(`name`,`username`,`password`,`type`) VALUE ('$name','$username','$encrypted','$type')";
            $query_run=mysqli_query($conn,$query);


            if ($query_run) {
                
                $_SESSION['status']="user Added";
                $_SESSION['status_code']="success";
                header('Location:../user.php');
            }else{
                $_SESSION['success']="user Not Added";
                $_SESSION['status_code']="error";
                header('Location:../user.php');
            }
}


if(isset($_POST['update_user'])){
    $edit_id=$_POST['edit_id'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    // $encrypted=md5($_POST['password']);
    $type=$_POST['type'];


    $query="UPDATE user SET name='$name',username='$username',type='$type' WHERE id='$edit_id'";
    $query_run=mysqli_query($conn,$query);

    if ($query_run) {
        # code...
        $_SESSION['status']="user Updated";
        $_SESSION['status_code']="success";
                header('Location:../user.php');
    }else {
        # code...
        $_SESSION['status']="user Not updated";
        $_SESSION['status_code']="error";
                header('Location:../user.php');
    }
}


