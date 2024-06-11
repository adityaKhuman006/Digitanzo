

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN | PAGE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/jpg" href="img/favicon.ico"/>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script data-ad-client="ca-pub-8531292746452198" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body class="hold-transition login-page" style="background-image: url('img/add1.jpg');">

<div class="login-box" >
  <div class="login-logo">
    <!--<a href="#"><b>EARNING</b>MONEY</a>-->
    <div style="text-align: center; margin-bottom: 50px">
    <img src="img/logo.png">
  </div>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php
        include_once('server.php');
        if(isset($_SESSION['message'])){
          $message = $_SESSION['message'];
          echo '<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>';
          echo "<script> swal('$message'); </script>";
          unset($_SESSION['message']);
        }
      ?>
      <form action="server.php"   method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control text-lowercase" name="username" placeholder="Username" required="required">
          <div class="input-group-append">
            <div class="input-group-text"> 
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-6">
            <input type="submit" name="login_user" class="btn btn-success btn-block" value="Sign In">
            </div>
            <div class="col-6">
            <input type="" id="myButton" name="logout" class="btn btn-success btn-block" value="Exit" >
            </div>
        <!--    <button style="" type="button" class="close" aria-label="Close">
  <span aria-hidden="true"><a href="home.php"><h5>Exit</h5></a></span>
</button> -->
          <!-- /.col -->
        </div>
        
        <a href="reset/forgot-password.php" role="">Forgot Password</a>


      </form>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "home.php";
    };
</script>
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>

</body>
</html>


