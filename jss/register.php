<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>REGISTER | PAGE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box" style="width:unset;">
  <div class="register-logo">
    <a href="#"><b>Register </b>Here</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new account</p>

      <form action="server.php" method="post">
      <div class="row">
          <div class="col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control"  name="recname" placeholder="Recomend Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="recid" placeholder="Recomend UserID">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                
               
               
        </div>
        <div class="col-sm-6">
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control"  name="phonenum" placeholder="Phone Number">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-mobile"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_1" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_2" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                

        </div>
        <div class="col-sm-12">
            <div class="input-group mb-3">
                    <input type="text" class="form-control" name="street" placeholder="Street">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-street-view"></span>
                        </div>
                    </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="city" placeholder="City">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-city"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="country" placeholder=" 4 DigitSecu Code">
                 
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-flag"></span>
                        </div>
                    </div>
                </div>
        </div>   
</div>
        
      
        <div class="row">
          <div class="col-sm-12">
            <button type="submit" name="reg_user" class="btn btn-primary btn-block">Register</button>
            <a href="login.php" class="text-center">Already having an account? LOGIN</a>
        </div>
      </form>
     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->

</body>
</html>
