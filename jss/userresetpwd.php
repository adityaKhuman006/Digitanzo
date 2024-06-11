<?php
$currentpage="userresetpwd";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  $currentpage="userresetpwd";
  include('common/sidebar.php'); ?>

<?php

    include "common/config.php";
    $user_no=$_REQUEST['id'];
    $edit_tem = "SELECT * FROM tb_user WHERE user_rec_id= '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-md-3"></div>
            <div class="col-md-8">

                <div class="card mt-5">
                    <div class="card-header text-center">
                       				    <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

RESET PASSWORD
</div>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET" >
                            <div class="row">
                                <div class="col-md-8">
                                    <label>User NIC</label>
                                    <input type="text" name="user_nic" value="<?php if(isset($_GET['user_nic'])){echo $_GET['user_nic'];} ?>" class="form-control">
                                </div>
                                 <div class="col-md-8">
                                    <label>User Name</label>
                                    <input type="text" name="user_name" value="<?php if(isset($_GET['user_name'])){echo $_GET['user_name'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-8">
                                    <label>User Phone</label>
                                    <input type="text" name="user_phone" value="<?php if(isset($_GET['user_phone'])){echo $_GET['user_phone'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-8">
                                    <label>Sponsor Name</label>
                                    <input type="text" name="user_rec_name" value="<?php if(isset($_GET['user_rec_name'])){echo $_GET['user_rec_name'];} ?>" class="form-control">
                                </div>
                                
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Validate</button>
                                </div>
                            </div>
                        </form>

<form method="POST" action="update_query.php" oninput='password_2.setCustomValidity(password_2.value != password_1.value ? "Passwords do not match." : "")'>
                <div class="modal-header">
                   
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                             <div class="form-group mb-3">

                        <div class="row">
                            <div class="col-md-12">



                                
                                
                                <?php 
                                    $con = mysqli_connect('localhost', 'digitsar_theepanathan', 'dt311221@@DT', 'digitsar_digitanzo');

                                    if(isset($_GET['user_nic']))
                                    {
                                        $user_nic = $_GET['user_nic'];
                                        $user_name = $_GET['user_name'];
                                        $user_phone = $_GET['user_phone'];
                                        $user_rec_name = $_GET['user_rec_name'];

$query = "SELECT * FROM tb_user WHERE user_nic ='$user_nic' &&  user_name = '$user_name' && user_phone ='$user_phone' && user_rec_name ='$user_rec_name' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                               
                                              
 <input type="hidden" name="user_no" value="<?= $row['user_no']; ?>" >
                                                </div>
                           
                           
                        </div>
                         <fieldset disabled>
                          <div class="form-group mb-3">
                                                   
                                                    <input type="text" value="<?= $row['user_pwd']; ?>" class="form-control" id="tcode" name="tcode" required="required">
                                                </div>
                                                 </fieldset>
                                                  <div class="form-group mb-3">
                                                    <label for="">Copy and Paste above Temprory Code</label>
                                                    <input type="text"  class="form-control" placeholder="Copy and Paste above Temprory Code" id="ctcode" name="ctcode" required="required">
                                                </div>
                        <div class="form-group">
                           
                            <input type="password" name="lastname" value="" id="password"  name="password_1" class="form-control validate" placeholder="New Password" minlength="6" required="required" />
                             
                        </div>
                          
                                                <div class="form-group mb-3">
                                                    
                                                     
                                                    <input type="password" id="confirm_password" name="password_2" class="form-control" placeholder="Confirm Password" minlength="6" required="required">
                                                </div>

                                                  
                <div class="modal-footer">
                    <button name="update" class="btn btn-warning">Submit<span class="glyphicon glyphicon-edit">
                    <button id="myButton" class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                </div>

                                                <?php

                                            }
                                        }
                                        else
                                        {
                                                $message = "No Record Found !!!";
echo "<script type='text/javascript'>alert('$message');</script>";

        
                                            
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>


                                                    
                                                   
                       
                    </div>
                </div>
               
                </div>
            </form>
        
                 
    <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "home.php";
    };
</script>
<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<script type="text/javascript">
var tcode = document.getElementById("tcode")
  , ctcode = document.getElementById("ctcode");

function validatePassword(){
  if(tcode.value != ctcode.value) {
    ctcode.setCustomValidity("Passwords Don't Match");
  } else {
    ctcode.setCustomValidity('');
  }
}

tcode.onchange = validatePassword;
ctcode.onkeyup = validatePassword;
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>