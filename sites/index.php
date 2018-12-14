<?php
  session_start();
  include('config.php');
    if(isset($_SESSION['login_user'])){
        header("location:dashboard.php");
    }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.login.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body>
    <div class="row">
      <!--background-modal-->
      <div class="mx-auto col-md-4 mt-5 border border-muted">
        <div class="mt-5">
          <img src="img/logo.jpg" class=" lg-welcome float-left"/>
          <div class="ft-sistem pt-4">SISTEM INFORMASI</div>
          <span class="ft-akademik">AKADEMIK</span>
        </div>
        <form method="post" action="" class="form-group mx-5 mt-5">
          <input type="text" id='un' class="form-control p-3 mb-3 input-text" placeholder="Username" name="username">
          <input type="password" class="form-control p-3 input-text" placeholder="Password" name="password">
          <button type="submit" class="btn btn-primary mt-5 mb-5 px-4 py-2 w-100" name="login">Login</button>
        </form>
          <?php
          if(isset($_POST['login'])){
              if(isset($_POST['username']) && isset($_POST['password'])){
                  $user= $_POST['username'];
                  $password= $_POST['password'];

                  $db = mysqli_select_db($mysql,DB_Table);
                  $sql ="SELECT * FROM id where username='$user' AND pwd=md5('$password')";
                  $query = mysqli_query($mysql, $sql);
                  $row = mysqli_num_rows($query);
                  if($row == 1 ){
                      $_SESSION['login_user']=$user; // Initializing Session
                      header("location: dashboard.php"); // Redirecting To Other Page
                  }else{
                      ?>
                      <p class="text-danger text-center">
                          Login GAGAL
                      </p>
                      <?php
                  }
              }
          }
          ?>
      </div>
    </div>
  </body>
</html>
