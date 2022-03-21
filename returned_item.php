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
                                <a class="dropdown-item" href="borrowed_items.php">borrowed items</a>
                                <a class="dropdown-item" href="#">returned items</a>
                                <!-- <a class="dropdown-item" href="#">project reservation</a> --> -->
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
                    
                    
                        <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Returned Items</h2>
                        <?php
                        
                            $query = "SELECT *
                            FROM borrow
                            INNER JOIN member ON borrow.member_id =member.id
                            INNER JOIN item ON borrow.item_id = item.id
                                            INNER JOIN room ON borrow.room_assigned = room.id
                                            WHERE borrow.status=0";
                             
                             
                            $query_run = mysqli_query($conn,$query);
                                if(mysqli_num_rows($query_run)>0) {
                                    
                         ?>
                            <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Borrower Name</th>
                                    <th scope="col">Borrowed Date</th>
                                    <th scope="col">items borrowed</th>
                                    <th scope="col">Room</th>
                                    <!-- <th scope="col">Action</th> -->
                                
                                </tr>
                            </thead>
                            <tbody>
                                     <?php
                                    
                                     while ($row= mysqli_fetch_assoc($query_run))
                                     {?>
                                    <tr>
                                        <td><b><?php echo $row['bid']?></b> </td>
                                        <td><b><?php echo $row['m_fname']?> <?php echo $row['m_lname']?></b></td>
                                        
                                        <td><b><?php echo $row['date_borrow']?></b> </td>
                                        <td><b class="name"><?php echo $row['i_brand']?></b></td>
                                        <td><b class="name"><?php echo $row['rm_name']?></b></td>
                                       <!-- <td>
                                           <form action="retrun.php" method="POST" >
                                           <input type="hidden"name="return_id"value="<?php echo $row['bid']?>"/>
                                            <button type="submit" name="return_btn" class="btn btn-info">RETURN</button> 
                                            </form>
                                        </td> -->
                                    
                                    </tr>
                                    
                                <?php 
                                
                            } ?>
                       
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