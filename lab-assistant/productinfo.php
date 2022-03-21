<?php
session_start();
include('../database/db.php');
if(!isset($_SESSION['username'])) header('Location:login.php');


if (isset($_GET['id'])) {
  # code...
  $id=mysqli_real_escape_string($conn,$_GET['id']);

  $sql="SELECT * FROM item WHERE id='$id'";

  $result=mysqli_query($conn,$sql);
  

  $variable=mysqli_fetch_assoc($result);


  mysqli_free_result($result);
  mysqli_close($conn);
  // print_r($variable);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Edit Product - Dashboard Admin Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
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
                            <a class="nav-link " href="dashboard.php">
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
                                <a class="dropdown-item" href="../borrowed_items.php">borrowed items</a>
                                <a class="dropdown-item" href="../returned_item.php">returned items</a>
                                <a class="dropdown-item" href="#">project reservation</a> -->
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">
                                <i class="fas fa-shopping-cart"></i>
                                Item
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="borrower.php">
                                <i class="far fa-user"></i>
                                Borrower
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="room.php">
                                <i class="far fa-user"></i>
                                Room
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="accounts.html">
                                <i class="far fa-user"></i>
                                Inventory
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="user.php">
                                <i class="far fa-user"></i>
                               user
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="accounts.html">
                                <i class="fa fa-history"></i>
                               History
                            </a>
                        </li> -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">BORROW DUE</a>
                                <a class="dropdown-item" href="#">Notification</a>
                            </div> -->
                        <!-- </li> -->
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="logout.php">
                                <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
      </div>
    </nav>
    
    


            
    <div class="container tm-mt-big tm-mb-big">
    <div class="container">
      <div class ="row"></div>
            <a class="btn btn-info"href="../add-product.php?GetID=<?php echo $id?>">EDIT</a>
            <a href="../addqty.php?GetID=<?php echo $id?>"class="btn btn-info">ADD QUANTITY</a>
            <a href="../changestat.php?MetID=<?php echo $id?>"class="btn btn-info">change status</a>
            <!-- <a href=""class="btn btn-info">CHANGE STATUS</a> -->
            <!-- <form action="database/deleteuser.php"method="POST">
               <input type="hidden" name="delete_id"value="<?php echo $id ?>">
                <button type="submit"name="delete_btnp" class="btn btn-danger">DELETE</button>
            </form>
        <!-- </div> -->
    </div>
      <h2><b>PRODUCT INFORMATION</b></h2>
      <?php
          if(isset($_SESSION['success'])&& $_SESSION['success'] !=''){
            echo '<h2 class="bg-danger text-white">'.$_SESSION['success'].'</h2>';
            unset($_SESSION['success']);
          }
          if(isset($_SESSION['status'])&& $_SESSION['status'] !=''){
            echo '<h2 class= "bg-danger text-white">'.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
          }
        ?>
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                                  
                          <?php if($variable):?>
                            <table class="table table-hover tm-table-small tm-product-table">
                          <input type="hidden" name="edit_id"value="<?php echo($variable['id']);?>" />
                          
                          <tbody>
                              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                <div class="tm-product-img-edit mx-auto"  >
                                  <?php echo'<img src="../add/'.$variable['i_photo'].'" alt="Product image" class="img-fluid d-block mx-auto" />'?>
                                </div>
                                
                              </div>
                          </tr>
                        <tr>
                          <td class="col-xs-6 col-md-4">Device Id</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['i_deviceID']);?></td>
                        </tr>  
                        <tr>
                        <td class="col-xs-6 col-md-4">Model</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['I_model']);?></td>
                        </tr> 
                        <tr>
                        <td class="col-xs-6 col-md-4">Catagory</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['i_catagory']);?></td>
                        </tr> 
                        <tr>
                        <td class="col-xs-6 col-md-4">Brand</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['i_brand']);?></td>
                        </tr> 
                        <tr>
                        <td class="col-xs-6 col-md-4">Description</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['i_description']);?></td>
                        </tr> 
                        <tr>
                        <td class="col-xs-6 col-md-4">Quantity</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['item_rowstock']);?></td>
                        </tr> 
                        <tr>
                        <td class="col-xs-6 col-md-4">Quantity Left</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['qty_left']);?></td>
                        </tr> 
                        <tr>
                        <td class="col-xs-6 col-md-4">Type</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['i_type']);?></td>
                        </tr> 
                        <tr>
                        <td class="col-xs-6 col-md-4">Status</td>
                          <td class="col-xs-12 col-sm-6 col-md-8"><?php echo($variable['i_status']);?></td>
                        </tr> 
                        
                        </tbody>
                  </table>
                  <?php else: ?>

                    <h5 center center> NO SUCH ITEM EXISTS </h5>
                    <?php endif; ?>
                  

                </div>
                
            </div>
            
          </div>
        </div>
      </div>
    </div>


    
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    
  </body>
</html>
