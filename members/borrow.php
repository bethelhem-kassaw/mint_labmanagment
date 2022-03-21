<?php
    session_start();
    include('../database/db.php');
    if (!isset($_SESSION['m_school_id'])) 
    header('Location: login.php');
        # code...
    
    // $users= $_SESSION['username'];

    $querys="SELECT * FROM room";
    $results=mysqli_query($conn,$querys);


    $query="SELECT * FROM member";
    $result1=mysqli_query($conn,$query);

    
    $query="SELECT * FROM user";
    $resulta=mysqli_query($conn,$query);

    $sql="SELECT * FROM item";
    $result=mysqli_query($conn, $sql);

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
                            <a class="nav-link " href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-shopping-cart"></i>
                                Item
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="borrow.php">
                                <i class="far fa-user"></i>
                                Borrow
                            </a>
                        </li>
                        
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
        <div class="row tm-content-row">
        
        <div class="tm-block-col tm-col-account-settings">
          <div class="tm-bg-primary-dark tm-block tm-block-settings">
          <h2 class="tm-block-title"> borrow Items</h2>

        


          <form action="borrowcode.php" method="POST">
          
                    <?php $rowa = mysqli_fetch_array($result1);?>
                    <input type="hidden" name="member_id" value="<?php echo $rowa[0]; ?>">
                    <?php $rowo = mysqli_fetch_array($resulta);?>
                    <input type="hidden" name="user_id" value="<?php echo $rowo[0]; ?>">
                    <div class="form-group mb-3">
                      <label for="i_category">Select item</label>
                      <select class="custom-select tm-select-accounts"id="i_catagory" name="item_id">
                      <?php while($row1 = mysqli_fetch_array($result)):;?>
                        <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?>--<?php echo $row1[2];?></option>
                        <?php endwhile;?>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label for="i_category">Select Room</label>
                      <select class="custom-select tm-select-accounts"id="i_catagory" name="room_id">
                      <?php while($row1 = mysqli_fetch_array($results)):;?>
                        <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                        <?php endwhile;?>
                      </select>
                    </div>
                    <div class="form-group ">
                            <label
                              for="item_rowstock"
                              >Time Limit
                            </label>
                            <input
                              id="item_rowstock"
                              name="time_limit"
                              type="datetime-local"
                              class="form-control validate"
                              required
                            />
                          </div>
                       

                          <button  type="submit" name="confirm_borrow"class="btn btn-primary btn-block text-uppercase"> Borrow</button>
                          
          </form>

          
         
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