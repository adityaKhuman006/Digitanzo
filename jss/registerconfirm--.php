<?php

    include "common/config.php";
    $user_no=$_REQUEST['id'];
    $edit_tem = "SELECT * FROM tbl_reg WHERE user_reg_id= '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
    $rec_id = $editrow['user_rec_id'];
    $reg_id = $editrow['user_reg_id'];
    $user_name = $editrow['user_name'];
    $user_payment = $editrow['user_payment'];
    $user_country = $editrow['user_country'];
    $user_city = $editrow['user_city'];
    $user_street = $editrow['user_district'];
    $user_phone = $editrow['user_phone'];
    $user_nic = $editrow['user_nic'];



    $get_rec_name = "SELECT user_rec_name FROM tbl_reg WHERE user_reg_id = '$reg_id'";
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];

?>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->
  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>REVIEW | PAGE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<meta http-equiv="Refresh" content="0;url=https://www.digitanzo.com">-->
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box" >
  <div class="register-logo">
   
  </div>

 <div style="text-align: center; margin-bottom: 50px">
    <img src="img/logo.png">
  </div>
           <div class="alert alert-info alert-dismissible fade show">
    <strong>Information !</strong>  Please verify your following information and create your account password.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>


  <div class="card">
    <div class="card-body register-card-body">
     
  <form action="server.php" method="post" oninput='password_2.setCustomValidity(password_2.value != password_1.value ? "Passwords do not match." : "")' >
                <input type="hidden" name="id"  value="<?php echo $user_no ?>"  />
                  <div class="row">
                    <div class="col-sm-6">
                        <div class=" w3l-form-group" >
                           <label>Registration Number:</label>
                            <div class="group">
                                
                            </div>
                        </div>
                      </div>
                       <div class="col-sm-2">
                        <div class=" w3l-form-group" >
                          
                            <div class="group" >
                                <input style="text-align: center;" type="text" name="regid1" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $reg_id ?>" readonly/>
                            </div>
                        </div>
                      </div>
                    </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class=" w3l-form-group" >
                            <label>Sponsor id:</label>
                            <div class="group">
                                <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $rec_id ?>" readonly/>
                            </div>
                        </div>
                      </div>

                        <div class="col-sm-6">  
                       <div class=" w3l-form-group">
                            <label>Sponsor Name:</label>
                            <div class="group">
                                <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $rec_name ?>" readonly/>
                            </div>
                        </div> 
                        </div> 
                      
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <div class=" w3l-form-group">
                            <label>User Name:</label>
                            <div class="group">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user_name; ?>" readonly/>
                            </div>
                        </div>
                      </div>
                    <div class="col-sm-3">
                           <div class=" w3l-form-group">
                            <label>NIC:</label>
                            <div class="group">
                                <input type="text" name="usernic" class="form-control" placeholder="Select the City"  value="<?php echo $user_nic; ?>" readonly />
                            </div>
                        </div>
                        </div>
                       <div class="col-sm-3">

                         <div class=" w3l-form-group">
                            <label>Phone :</label>
                            <div class="group">
                                <input type="text" name="phonenum" class="form-control" placeholder="Phone Number"  value="<?php echo $user_phone; ?>"readonly />
                            </div>
                        </div>
                        </div>
                        
                        
                   
                 
                       </div>

                       <div class="row">
                        <div class="col-sm-6"> 
                     <div class=" w3l-form-group">
                            <label>Street:</label>
                            <div class="group">
                                <input type="text" name="city" class="form-control" placeholder="Select the City"  value="<?php echo $user_city; ?>" readonly />
                            </div>
                        </div>
                       </div>
<div class="col-sm-3"> 
                         <div class=" w3l-form-group">
                            <label>City:</label>
                            <div class="group">
                                <input type="text" name="street" class="form-control" placeholder="Select the Street"  value="<?php echo $user_street; ?>" readonly/>
                            </div>
                        </div>
                      </div>
<div class="col-sm-3"> 
                        
                        <div class=" w3l-form-group">
                            <label>District:</label>
                            <div class="group">
                                <input type="text" name="country" class="form-control" placeholder="Select the Country" value="<?php echo $user_country; ?>" readonly />
                            </div>
                        </div>
                      </div>
                    </div>
                        <div class="row">
                          <div class="col-sm-6"> 
                         <div class=" w3l-form-group">
                            <label>Password:</label>
                            <div class="group">
                                <input type="password" id="password" name="password_1" class="form-control" placeholder="Password" required="required" />
                            </div>
                        </div>
                         <div class="col-sm-8 col-sm-offset-2 pt-3">
                        <div class="pwstrength_viewport_progress"></div>
                    </div>
                      </div>
                      <div class="col-sm-6"> 
                         <div class=" w3l-form-group">
                            <label>Confirm Password:</label>
                            <div class="group">
                                <input type="password" name="password_2" class="form-control" placeholder="Password" required="required" />
                            </div>
                        </div>
                         </div>
                    </div>  
                       
                   
       
               
                <br>
                  <div>
                    <input type="checkbox" name="checkbox" value="check" id="agree" required="reruired" /> I have read and agree to the <a href="#"> Terms and Conditions</a> and <a href="#"> Privacy Policy</a>
                    </div>
                <button type="submit" class="btn btn-info" name="reg_user">Confirm and Submit</button>
                <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true"><a href="login.php">Exit</a></span>
</button>
            </form>
     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>


<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script>
  jQuery(document).ready(function () {
    "use strict";
    var options = {};
    options.ui = {
        bootstrap4: true,
        container: "#pwd-container",
        viewports: {
            progress: ".pwstrength_viewport_progress"
        },
        showVerdictsInsideProgressBar: true
    };
    options.common = {
        debug: true,
        onLoad: function () {
            $('#messages').text('Start typing password');
        }
    };
    $(':password').pwstrength(options);
});
</script>

</body>
</html>


 