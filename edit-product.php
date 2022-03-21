<?php
session_start();
include('database/db.php');
if(!isset($_SESSION['username'])) header('Location:login.php');
// $_SESSION['item']=['item'];


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
                            <a class="nav-link" href="dashboard.php">
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
                                <!-- <a class="dropdown-item" href="#">borrowed items</a>
                                <a class="dropdown-item" href="#">returned items</a>
                                <a class="dropdown-item" href="#">project reservation</a> -->
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="products.php">
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
                        <li class="nav-item">
                            <a class="nav-link" href="user.php">
                                <i class="far fa-user"></i>
                               user
                            </a>
                        </li>
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
                                <a class="dropdown-item" href="logout.php">LOGOUT</a>
                            </div>
                        </li> -->
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
        <div class="container-fluid ">
            <div class="card shadow mb-4">
                <div class="header">
                      <h4 class="m-0 font-weight-bold text-primary">EDIT ITEM</h4>   
                </div>
            </div>
            <div class="card-body">
<?php
if(isset($_POST['edit_item_data']))
{
    $id = $_POST['edit_id'];

    $query="SELECT * FROM item WHERE id='$id'";
    $query_run=mysqli_query($conn,$query);
?>


<form action=""method="POST">
<?php
    foreach($query_run as $row){
?>
                    <input type="hidden" name="edit_id"value="">
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Device_id</label>
                        <input type="text"name="i_deviceID"value="" class="form-control">
                    </div>
                </form>

<?php
    }

}
                
?>
                
            </div>
        </div>
</div>
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