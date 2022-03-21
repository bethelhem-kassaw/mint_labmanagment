<?php

if(isset($_GET['DEL'])){
    $id = $_GET['DEL'];
    $query=" delete * from item where id='".$id."'";
    $result= mysqli_query($conn,$query);
    
    if($result){
        echo "item deleted";
        header('Location:../products.php');
    }else{
        header('Location:../products.php');
    }
}

?>