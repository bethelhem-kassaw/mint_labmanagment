<?php
session_start();
include('db.php');
if(isset($_POST['delete_btn'])){

$id=$_POST['delete_id'];

$query="DELETE FROM `user` WHERE id='$id'";
$query_run=mysqli_query($conn,$query);

if($query_run){
    $_SESSION['status']="user deleted";
        $_SESSION['status_code']="success";
                header('Location:../user.php');
}
else{
    $_SESSION['status']="user Not deleted";
        $_SESSION['status_code']="error";
                header('Location:../user.php');
}

}
if(isset($_POST['delete_btns'])){

    $id=$_POST['delete_id'];
    
    $query="DELETE FROM `room` WHERE id='$id'";
    $query_run=mysqli_query($conn,$query);
    
    if($query_run){
        $_SESSION['status']="room deleted";
            $_SESSION['status_code']="success";
                    header('Location:../room.php');
    }
    else{
        $_SESSION['status']="room Not deleted";
            $_SESSION['status_code']="error";
                    header('Location:../room.php');
    }
    
    }

    if(isset($_POST['delete_btnp'])){

        $id=$_POST['delete_id'];
        
        $query="DELETE FROM `item` WHERE id='$id'";
        $query_run=mysqli_query($conn,$query);
        
        if($query_run){
            $_SESSION['status']="item deleted";
                $_SESSION['status_code']="success";
                        header('Location:../products.php');
        }
        else{
            $_SESSION['status']="item Not deleted";
                $_SESSION['status_code']="error";
                        header('Location:../products.php');
        }
        
        }

?>