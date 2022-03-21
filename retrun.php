<?php 
session_start();

include('database/db.php');




if(isset($_POST['return_btn'])){
    $id = $_POST['return_id'];
    
    
    $query="UPDATE `borrow` SET `status`='0',`date_return`=now() WHERE bid='$id'";
    $query_run=mysqli_query($conn,$query);
        if($query_run){
            $sql="UPDATE item SET qty_left=qty_left-1 WHERE id='$id'";
            $result=mysqli_query($conn,$sql);
            
        }

    }
     
    
    // if($result){
    //     echo "item deleted";
    //     header('Location:borrowed_items.php');
    // }else{
    //     header('Location:borrowed_items.php');
    // }

?>