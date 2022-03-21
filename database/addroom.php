<?php
include('db.php');
session_start();
// var_dump($_SESSION);

if(isset($_POST['save_room']))
{

    $rm_name=$_POST['roomname'];
    

    $query = "INSERT INTO `room`(`rm_name`, `rm_date_added`) VALUES ('$rm_name', now())";
    // echo $query;
    $query_run=mysqli_query($conn,$query);


            if ($query_run) {
                
                $_SESSION['success']="room Added";
                header('Location:../room.php');
            }else{
                $_SESSION['success']="user Not Added";
                header('Location:../room.php');
            }
}



if(isset($_POST['update_room'])){
    $edit_id=$_POST['edit_id'];
    $name=$_POST['rm_name'];

    $query="UPDATE room SET rm_name='$name'WHERE id='$edit_id'";
    $query_run=mysqli_query($conn,$query);



    if ($query_run) {
        # code...
        $_SESSION['success']="user Updated";
                header('Location:../room.php');
    }else {
        # code...
        $_SESSION['success']="user Not updated";
                header('Location:../room.php');
    }
}
    ?>
    