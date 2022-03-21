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
    $query="SELECT * FROM borrow";
    $result=mysqli_query($conn,$query);
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
                                <a class="dropdown-item" href="../borrowed_items.php">borrowed items</a>
                                <a class="dropdown-item" href="../returned_item.php">returned items</a>
                                
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
      </div>
    </nav>
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <form action="members/add.php" method="POST">
      <div class="modal-body">
        
        <div class="form-group">
                <label for="id">Give ID</label>
                <input type="id" class="form-control" id="id" name="stu_id" placeholder="Enter ID"required>
         </div>
         <div class="form-group">
                <label for="first name">Fist Name</label>
                <input type="text" class="form-control" id="first name" name="fname" placeholder="first name" required>
         </div>
         <div class="form-group">
                <label for="Last name">Last Name</label>
                <input type="text" class="form-control" id="Last name" name="lname" placeholder="Last name" required>
         </div>
         <div class="form-group mb-3">
                        <label for="gender">Gender</label>
                        <select class="custom-select tm-select-accounts"id="gender" name="m_gender" required>
                          <option selected>Select Gender</option>
                          <option>FEMALE</option>
                          <option>MALE</option>
                        </select>
                 </div>
         <div class="form-group">
                <label for="contact">contact Number</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="contact" required>
         </div>
         <div class="form-group mb-3">
                        <label for="Department">Department</label>
                        <select class="custom-select tm-select-accounts"id="Department" name="m_Department" required>
                          <option selected>Select Department</option>
                          <option>electrical</option>
                          <option>Mechanical</option>
                          <option>software</option>
                        </select>
                 </div>
                 <div class="form-group mb-3">
                        <label for="type">type</label>
                        <select class="custom-select tm-select-accounts"id="type" name="type" required>
                          <option selected>Select type</option>
                          <option>student</option>
                          <option>faculty</option>
                        </select>
                 </div>
         

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name ="save_member"class="btn btn-primary">Save </button>
      </div>
      </form>
    </div>
  </div>
</div>
    <div class="container tm-mt-big tm-mb-big">
      <div class="container">
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
        <div class= "row">

        <!-- <button class="btn btn-primary btn-block text-uppercase mb-3"data-toggle="modal" data-target="#memberModal" >
                            Add members
                        </button> -->
                
        </div>
        <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Borrower</h2>
                        <?php
                            $query = "SELECT * FROM member ";
                            $query_run = mysqli_query($conn,$query);
                                if(mysqli_num_rows($query_run)>0) {
                         ?>
                            <table class="table">
                            <thead>
                                <tr>
                                <!-- <th scope="col">#</th> -->
                                    <th scope="col">ID Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">type</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                     <?php
                                     while ($row= mysqli_fetch_assoc($query_run))
                                     {?>
                                    <tr>
                                        <td><b><?php echo $row['m_school_id']?></b></td>
                                        <td><b class="name"><?php echo $row['m_fname']?> <?php echo $row['m_lname']?></b></td>
                                        
                                        <td><b><?php echo $row['m_department']?></b></td>    
                                        <td><b><?php echo $row['m_type']?></b></td>          
                                            
                                    
                                    </tr>
                                <?php } ?>
                       
                            </tbody>
                        </table>
                        <?php
                            }else{echo "no record found";}
                        ?>
                    </div>
      </div>
    </div>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    
    
</body>
</html>