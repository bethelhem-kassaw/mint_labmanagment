<?php
    session_start();
    include('database/db.php');
    if(!isset($_SESSION['username'])) header('Location:login.php');
//    $_SESSION['user']='users';
    // $user = $_SESSION['user'];
    // $users= include('database/showusers.php');
    // var_dump($users);die;
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
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <form action="database/addroom.php" method="POST">
            <div class="modal-body">
                <div class="form-group">
                        <label for="roomname">Room Number</label>
                        <input
                            id="roomname"
                            name="roomname"
                            type="text"
                            required
                            class="form-control validate"
                        />
                        </div>
                        
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="save_room" class="btn btn-primary">Save</button>
            </div>
      </form>
    </div>
  </div>
</div>

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
                                <!-- <a class="dropdown-item" href="#">borrowed items</a>
                                <a class="dropdown-item" href="#">returned items</a>
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
                            </div>
                        </li> -->
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

        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, 
                        <!-- <b> <?= $users['username']?></b> -->
                    </p>
                    <button class="btn btn-primary btn-block text-uppercase mb-3"data-toggle="modal" data-target="#roomModal" >
                            Add Room
                        </button>
                        <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">ROOMS</h2>
                        <?php
                            $query = "SELECT * FROM room";
                            $query_run = mysqli_query($conn,$query);
                                if(mysqli_num_rows($query_run)>0) {
                         ?>
                            <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                    <th scope="col">ROOM Name</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                                    
                                
                                </tr>
                            </thead>
                            <tbody>
                                     <?php
                                     while ($row= mysqli_fetch_assoc($query_run))
                                     {?>
                                    <tr>
                                        <td><b><?php echo $row['id']?></b></td>
                                        <td><b class="name"><?php echo $row['rm_name']?></b></td>
                                        
                                        
                                        <td>
                                            
                                                    <form action="addroom.php"method="POST">
                                                        <P>
                                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
                                                            <button type="submit"  name="edit_room_data"class="btn-group btn-group-xs">EDIT</button>
                                                        </P>
                                                    </form>
                                                    </td>
                                            <td>
                                                    <form action="database/deleteuser.php"method="POST">
                                                        <input type="hidden" name="delete_id"value="<?php echo $row['id']; ?>">
                                                        <button type="submit"name="delete_btns" class="btn-group btn-group-xs">DELETE</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    
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
</div>
<script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>
</html>