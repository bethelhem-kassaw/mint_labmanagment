<?php
session_start();
include('database/db.php');
if(!isset($_SESSION['username'])) header('Location:login.php');
// $_SESSION['item']=['item'];

$id=$_GET['MetID'];

$query= "SELECT * FROM item WHERE id=$id ";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
    
</head>




<div class="row tm-content-row">
        
        <div class="tm-block-col tm-col-account-settings">
          <div class="tm-bg-primary-dark tm-block tm-block-settings">
            <h2 class="tm-block-title"> add quantity</h2>
                
          
            
               
                  <form action="additem.php?ID=<?php echo $id ?>" method="POST" class="tm-edit-product-form">
                    <input type="hidden"  value=""/>
                    <div class="form-group mb-3">
                                <label
                                    for="i_type"
                                    >Type
                                </label>
                                  <select
                                    class="custom-select tm-select-accounts"
                                    id="i_type" name="i_type"
                                    >
                                    <option selected>Select type</option>
                                    <option value="">LOST</option>
                                    <option value="">DAMAGED</option>
                                    
                                </select>
                              </div>
                        <a href="productinfo.php?id=<?php echo $id?>" class="btn btn-danger">cancel </a>
                     <button type="submit" name="changestat" class="btn btn-primary btn-block text-uppercase">change status</button>
                    </form>