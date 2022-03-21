<?php
    session_start();
    // include('header.php');
    include('../database/db.php');
    if(!isset($_SESSION['username'])) header('Location:login.php');
  //  $_SESSION['item_stock']='userss';
  //  $_SESSION['item']='items';
    // $item = $_SESSION['item'];
    // $item_stock= $_SESSION['item_stock'];
    // $items= include('database/showitem.php');
    // $userss= include('database/showitem.php');
    // var_dump($items);
    $query="SELECT * FROM item";
    $result=mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Tech center</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>
    


<body id="reportsPage">
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
      </div>
    <form action="additem.php" method="POST" enctype="multipart/form-data"class="tm-edit-product-form">
        <div class="modal-body">
                      <div class="form-group">
                        <label for="i_deviceID">Device ID</label>
                        <input id="i_deviceID" name="i_deviceID" type="text" class="form-control validate" required/>
                      </div>
              
                      <div class="form-group mb-3">
                        <label for="i_description">Description</label>
                        <textarea class="form-control validate"rows="2" id="i_description"name="i_description"required></textarea>
                      </div>
                      <div class="form-group mb-3">
                        <label for="i_category">Category</label>
                        <input class="form-control validate" type="text"id="i_catagory" name="i_catagory" required>
                     
                      </div>
                      <div class="form-group ">
                              <label for="i_brand">Brand</label>
                              <input  id="i_brand" name="i_brand"type="text"class="form-control validate"data-large-mode="true"/>
                      </div>
                      <div class="form-group ">
                              <label
                                for="I_model"
                                >Model
                              </label>
                              <input
                                id="I_model"
                                name="I_model"
                                type="text"
                                class="form-control validate"
                                required
                              />
                        </div>
                        <div class="form-group ">
                              <label
                                for="item_rowstock"
                                >Quantity
                              </label>
                              <input
                                id="item_rowstock"
                                name="item_rowstock"
                                type="text"
                                class="form-control validate"
                                required
                              />
                            </div>
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
                                    <option value="1">New</option>
                                    <option value="2">old</option>
                                    
                                </select>
                              </div>
                              <div class="form-group mb-3">
                                    <label
                                      for="i_status"
                                      >Status</label
                                    >
                                    <select
                                      class="custom-select tm-select-accounts"
                                      id="i_status" name="i_status"
                                    >
                                      <option selected>Select category</option>
                                      <option value="1">customable</option>
                                      <option value="2">non-customable</option>
                                      
                                    </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Upload Image</label>
                                      <input type="file" name="item_image"id="item_image" class="form-control" required>
                                  </div>
                                  



             </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="save_item"class="btn btn-secondary">Save </button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<!-- <div class="modal fade" id="catagoryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form action="additem.php" method="POST">
      <div class="modal-body">
      <div class="form-group ">
                              <label
                                for="i_catagory"
                                >catagory
                              </label>
                              <input
                                id="i_catagory"
                                name="i_catagory"
                                type="text"
                                class="form-control validate"
                                required
                              />
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="add_catagory" class="btn btn-primary">Save </button>
      </div>
      </form>
    </div>
  </div>
</div> -->

    <div class="" id="home">
    <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.html">
                    <h1 class="tm-site-title mb-0">MINT</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link " href="labdashboard.php">
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
                                <a class="dropdown-item" href="../newborrow.php">new</a>
                                <a class="dropdown-item" href="borrowed_items.php">borrowed items</a>
                                <a class="dropdown-item" href="returned_item.php">returned items</a>
                                
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
                            <a class="nav-link" href="../user.php">
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
                            </div>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="../logout.php">
                                <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

   </nav>
    
        
        <!-- <button class="btn btn-primary btn-block text-uppercase" data-toggle="modal" data-target="#catagoryModal">
              ADD Catagories
        </button> -->
    
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
        
            
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
          <!-- <button class="btn btn-primary btn-block text-uppercase" data-toggle="modal" data-target="#itemModal">
              ADD items
        </button> -->
            <div class="tm-product-table-container">
            <?php
                $query = "SELECT * FROM item";
                $query_run = mysqli_query($conn,$query);
                
                if(mysqli_num_rows($query_run)>0) {
                  ?>
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">MODEL</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">BRAND</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">QUANTITY LEFT</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                    <!-- <th scope="col">DELETE</th> -->
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                      while ($row= mysqli_fetch_assoc($query_run))
                       {?>
                       <tr>
                            <td class="id"><?php echo $row['id']?> </td> 
                            <td class ="i_photo"><?php echo '<img src="../add/'.$row['i_photo'].'" width="50px;" height="50px;"  alt="i_photo"/>'?> </td>
                            <td class ="I_model"><b><?php echo $row['I_model']?></b></td>
                            <td class = " i_catagory"><b><?php echo $row['i_catagory']?></b></td>
                            <td class="i_brand"><b><?php echo $row['i_brand']?></b></td>
                            <td class ="item_rowstock"><b><?php echo $row['item_rowstock']?></b></td>
                            <td class = "items_stock"><b><?php echo $row['qty_left']?></b></td>
                            <td class = "status"><b><?php echo $row['i_status']?></b></td>
                            <td>
                              
                                <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                                <a href="productinfo.php?id=<?php echo $row['id']?>" name="product_info" >MORE INFO</a>
                                
                            </td>
                    
                        </tr>
                    <?php
                      }
                      
                      ?>
                   
                  
                </tbody>
              </table>
              <?php
          }else{echo "no record found";}
        ?>
            </div>
            <!-- table container -->
            
          </div>
        </div>
        

     <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="../js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="../js/tooplate-scripts.js"></script>
  </body>
</html>