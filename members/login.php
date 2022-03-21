
<?php
include('../database/db.php');
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $stu_id=$_POST['school_id'];

  $sql="select * from member where m_school_id='".$stu_id."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
  if($row["m_school_id"]){
    $_SESSION['m_school_id']=$stu_id;
    header('Location:index.php');
  }else{
    echo "incorrect id ";
    header('Location:login.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="../css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
    
    
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4"> Members Login</h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Given ID</label>
                    <input
                      name="school_id"
                      type="text"
                      class="form-control validate"
                      id="school_id"
                      value=""
                      required
                    />
                  </div>
                  <!-- <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="password"
                      type="password"
                      class="form-control validate"
                      id="password"
                      value=""
                      required
                    />
                  </div> -->
                  <div class="form-group mt-4">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Login
                    </button>
                   
                  </div>
                  <a href="../login.php">TO users Page</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>