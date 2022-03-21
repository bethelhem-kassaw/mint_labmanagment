<?php
include('database/db.php');
session_start();
// var_dump($_SESSION);

if(isset($_POST['save_item']))
{
    $i_deviceID = $_POST['i_deviceID'];
    $I_model = $_POST['I_model'];
    $i_catagory = $_POST['i_catagory'];
    $i_brand = $_POST['i_brand'];
    $i_description = $_POST['i_description'];
    $i_type = $_POST['i_type'];
    $item_rowstock = $_POST['item_rowstock'];
    $i_status = $_POST['i_status'];
    $i_photo = $_FILES["item_image"]['name'];

    if(file_exists("add/"  . $_FILES["item_image"]["name"]))
    {
        $store=$_FILES["item_image"]["name"];
        $_SESSION['status']="Image already exists.'.$store.'";
        header('Location: products.php');
    }
    else
    {
            $query = "INSERT INTO `item`(`i_deviceID`, `I_model`, `i_catagory`, `i_brand`, `i_description`, `i_type`, `item_rowstock`, `i_status`, `i_photo`, `qty_left`) VALUES ('$i_deviceID','$I_model','$i_catagory','$i_brand',' $i_description','$i_type','$item_rowstock','$i_status','$i_photo','$item_rowstock')";
            $query_run=mysqli_query($conn,$query);


            if ($query_run) {
                
                if(move_uploaded_file($_FILES["item_image"]["tmp_name"], "add/".$_FILES["item_image"]["name"])){
                    echo "file is uploaded";
                }else {
                    echo "hahahah";
                }
                $_SESSION['success']="Item Added";
                header('Location:products.php');
            }else{
                $_SESSION['success']="Item Not Added";
                header('Location:products.php');
            }
    }
}


if(isset($_POST['update_item'])){
    // $edit_item_id=$_POST['edit_item_id'];
    $id=$_GET['ID'];
    $i_deviceID = $_POST['i_deviceID'];
    $I_model = $_POST['I_model'];
    $i_catagory = $_POST['i_catagory'];
    $i_brand = $_POST['i_brand'];
    $i_description = $_POST['i_description'];
    $i_type = $_POST['i_type'];
    $item_rowstock = $_POST['item_rowstock'];
    $i_status = $_POST['i_status'];
    $i_photo = $_FILES["i_photo"]['name'];


    $query="UPDATE item SET i_deviceID='".$i_deviceID."',I_model='".$I_model."',i_catagory='".$i_catagory."',i_brand='".$i_brand."',i_description='".$i_description."',i_type='".$i_type."',item_rowstock='".$item_rowstock."',i_status='".$i_status."',i_photo='".$i_photo."',qty_left='".$item_rowstock."' WHERE id='".$id."'";
    // echo $query;
    
    $query_run=mysqli_query($conn,$query);

    if ($query_run) {
        # code...
        $_SESSION['success']="item Updated";
                header('Location:products.php');
    }else {
        # code...
        $_SESSION['success']="item Not updated";
                header('Location:products.php');
    }
}


if(isset($_POST['addqty'])){
    $id=$_GET['ID'];
    $qty=$_POST['qty'];
    // $item_id=$_POST['item_id']
    $query="UPDATE item SET item_rowstock=item_rowstock + '".$qty."',qty_left=qty_left+'".$qty."' WHERE id='".$id."'";
    // echo $query;
//   $query=  "UPDATE `item`,`item_stock`
//     SET `item`.`item_rowstock` = `item_rowstock` +'" . $qty . "',
//         `item_stock`.`items_stock` = `items_stock`+'" . $qty . "'
//     WHERE `items`.`id` = '" . $id . "'";

//     $query="UPDATE item 
// JOIN item_stock ON (item.item_rowstock  = item_stock.items_stock ) 
// SET item.item_rowstock = item_rowstock+'" . $qty . "' 
//     item_stock.items_stock = items_stock+ '" . $qty . "' 
//     WHERE item.id = '" . $id . "'";
    $query_run=mysqli_query($conn,$query);
    // echo $query;

    // $query_run=mysqli_query($conn,$query);
    // echo $query;
    if($query_run){

        // $query="UPDATE item SET =items_stock + '".$qty."' WHERE item_id='".$id."'";
        // $query_run=mysqli_query($conn,$query);
        // echo $query;
        if($query_run){
            $_SESSION['success']="quantity added";
            header('Location:products.php');
        }
        
    }else{
        $_SESSION['success']="quantity Not added";
        header('Location:products.php');
    }
}


if(isset($_POST['changestat'])){
    $id=$_GET['ID'];
    $type=$_POST['i_type'];

    $query="UPDATE item SET i_type='".$type."' WHERE id='".$id."'";
    

    $query_run=mysqli_query($conn,$query);

    if($query_run){
        header('Location:products.php');
    
    }else{
        header('Location:products.php');
    }
}