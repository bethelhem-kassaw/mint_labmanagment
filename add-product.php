<?php
session_start();
include('database/db.php');
if(!isset($_SESSION['username'])) header('Location:login.php');
// $_SESSION['item']=['item'];

$id=$_GET['GetID'];

$query= "select * from item where id=$id";
// echo $query;

$result=mysqli_query($conn,$query);



// var_dump($result);die;

while($row=$result->fetch_assoc())
{
  $id=$row['id'];
  $i_deviceID=$row['i_deviceID'];
 
    $I_model = $row['I_model'];
    $i_catagory = $row['i_catagory'];
    $i_brand = $row['i_brand'];
    $i_description = $row['i_description'];
    $i_type = $row['i_type'];
    $item_rowstock = $row['item_rowstock'];
    $i_status = $row['i_status'];
    $i_photo = $row['i_photo'];
}
 
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

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.php">
                    <h1 class="tm-site-title mb-0">MINT</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                   transaction <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="newborrow.php">new</a>
                                <a class="dropdown-item" href="#">borrowed items</a>
                                <a class="dropdown-item" href="#">returned items</a>
                                <a class="dropdown-item" href="#">project reservation</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="products.php">
                                <i class="fas fa-shopping-cart"></i>
                                Item
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="accounts.html">
                                <i class="far fa-user"></i>
                                Borrower
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="borrower.php">
                                <i class="far fa-user"></i>
                                Room
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accounts.html">
                                <i class="far fa-user"></i>
                                Inventory
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user.php">
                                <i class="far fa-user"></i>
                               user
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="accounts.html">
                                <i class="fa fa-history"></i>
                               History
                            </a>
                        </li>
                        
                        <a class="dropdown-item" href="logout.php">LOGOUT</a>
                    </ul>
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="logout.php">
                                 <!-- <?= $user['name']?>  -->
                                 <!-- <b>Logout</b> 
                            <!-- </a> -->
                        <!-- </li> -->
                    <!-- </ul> --> 
                </div>
            </div>

        </nav>
      <div class="row tm-content-row">
        
        <div class="tm-block-col tm-col-account-settings">
          <div class="tm-bg-primary-dark tm-block tm-block-settings">
            <h2 class="tm-block-title"> UPDATE ITEM</h2>
                
          
            
               
                  <form action="additem.php?ID=<?php echo $id ?>" method="POST" enctype="multipart/form-data"class="tm-edit-product-form">
                    <input type="hidden"  value=""/>
                      <div class="form-group col-lg-12">
                        <label
                          for="i_deviceID"
                          >Device ID
                        </label>
                        <input
                          id="i_deviceID"
                          name="i_deviceID"
                          value="<?php echo $i_deviceID?>"
                          type="text"
                          class="form-control validate"
                          required
                        />
                    
                      </div>
                      <div class="form-group col-lg-12">
                        <label
                          for="i_brand"
                          >Brand
                        </label>
                        <input
                          id="i_brand"
                          name="i_brand"
                          value="<?php echo $i_brand?>"
                          type="text"
                          class="form-control validate"
                          required
                        />
                      <div class="form-group col-lg-12">
                        <label
                          for="i_description"
                          >Description</label>
                        
                        <textarea
                          class="form-control validate"
                          rows="2"
                          id="i_description"
                          name="i_description"
                          value=""
                          required
                        ><?php echo $i_description?></textarea>
                      
                        
                      </div>
                      <div class="form-group col-lg-12">
                        <label
                          for="i_category"
                          >Category</label
                        >
                        <select
                          class="custom-select tm-select-accounts" value="<?php echo $i_catagory?>"
                          id="i_catagory" name="i_catagory"
                        >
                          <option disabled  >Select category</option>
                          <option >computer</option>
                          <option >Arduino-kit</option>
                          <option >sensors-kit</option>
                        </select>
                      </div>
                            <div class="form-group col-lg-12">
                              <label
                                for="I_model"
                                >Model
                              </label>
                              <input
                                id="I_model"
                                name="I_model"
                                type="text"
                                class="form-control validate"
                                value="<?php echo $I_model?>"
                                required
                              />
                            </div>
                            <div class="form-group col-lg-12">
                              <label
                                for="item_rowstock"
                                >Quantity
                              </label>
                              <input
                                id="item_rowstock"
                                name="item_rowstock"
                                value="<?php echo $item_rowstock?>"
                                type="text"
                                class="form-control validate"
                                required
                              />
                            </div>
                            <div class="form-group col-lg-12">
                                <label
                                    for="i_type"
                                    >Type
                                </label>
                                  <select
                                    class="custom-select tm-select-accounts"
                                    id="i_type" name="i_type" value="<?php echo $i_type?>"
                                    >
                                    <option disabled >Select category</option>
                                    <option value="new">new</option>
                                    <option value="old">old</option>
                                    <!--<option value="3">Sensors-kit</option> -->
                                </select>
                              </div>
                              <div class="form-group col-lg-12">
                                    <label
                                      for="i_status"
                                      >Status</label
                                    >
                                    <select
                                      class="custom-select tm-select-accounts"
                                      id="i_status" name="i_status" value="<?php echo $i_status?>"
                                    >
                                      <option disabled >Select category</option>
                                      <option value="1">customable</option>
                                      <option value="2">non-customable</option>
                                      <!-- <option value="3">Trending</option> -->
                                    </select>
                                  </div>
                                   <div class="form-group col-lg-12">
                    
                                      <input type="file" name="i_photo" value="<?php echo $i_photo?>"/>
                                      <!-- <input type="button"  value="upload image"/> -->
                                    
                                    </div>

                  
                                    <a href="productinfo.php?id=<?php echo $id?>" class="btn btn-danger">cancel </a>
                                    <button type="submit" name="update_item" class="btn btn-primary btn-block text-uppercase">update Item</button>

                  
            </form>
        
                  
             
                
           </div>
         </div>
       
     </div>
      
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    
  </body>
</html>
