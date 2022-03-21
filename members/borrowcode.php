<?php

session_start();
include('../database/db.php');



if(isset($_POST['confirm_borrow'])){

    $member_id=$_POST['member_id'];
    $item_id=$_POST['item_id'];
    $room_id=$_POST['room_id'];
    $time_limit=$_POST['time_limit'];
    $user_id=$_POST['user_id'];

    $query="INSERT INTO `borrow`(`member_id`, `item_id`,`user_id`, `room_assigned`, `time_limit`) VALUES ('$member_id','$item_id','$user_id','$room_id','$time_limit')";

    $query_run=mysqli_query($conn,$query);
    

    if($query_run){
        
        $query = "UPDATE item SET qty_left=qty_left-1 WHERE id ='".$item_id."'";
            $query_run=mysqli_query($conn,$query);
            if($query_run){
            $_SESSION['success']="successfully borrowed";
        header('Location:borrow.php');
            }
    }else{
        $_SESSION['success']="can't borrow at this time";
        header('Location:borrow.php');
    }
}


?>