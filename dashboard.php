<?php
    session_start();
    include('database/db.php');
    if (!isset($_SESSION['username'])) 
    header('Location: login.php');
        # code...
    
    // $users= $_SESSION['username'];
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
                    <p class="text-white mt-5 mb-5">Welcome back, </p>
                </div>
            </div>
            
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Items List</h2>
                        <?php
                $query = "SELECT * FROM item";
                $query_run = mysqli_query($conn,$query);
                if(mysqli_num_rows($query_run)>0) {
                  ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">MODEL</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">BRAND</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">STATUS</th>
                                    <!-- <th scope="col">START DATE</th>
                                    <th scope="col">EST DELIVERY DUE</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                      while ($row= mysqli_fetch_assoc($query_run))
                       {?>
                                <tr>
                                    <td  class ="I_model"><b><?php echo $row['I_model']?></b></td>
                                    <td class = " i_catagory"><b><?php echo $row['i_catagory']?></b></td>
                                    <td class="i_brand"><b><?php echo $row['i_brand']?></b></td>
                                    <td class ="item_rowstock"><b><?php echo $row['item_rowstock']?></b></td>
                                    <td class = "status"><b><?php echo $row['i_status']?></b></td>
                                </tr>
                                <?php
                                }?>
                            </tbody>
                        </table>
                        <?php
          }else{echo "no record found";}
        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved. 
                    
                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer> -->
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>
</body>
</html>
        