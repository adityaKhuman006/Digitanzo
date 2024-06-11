  <?php include('common/config.php'); ?>
    <?php include('common/config.php'); ?>
<?php
$currentpage="resetpwd";
include "common/header.php";?>
  <?php include('common/sidebar.php'); ?>

 <?php
                       include "common/config.php";
                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $row = mysqli_fetch_assoc($selquery);

         
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
                        <h4>Password Reset</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET" >
                            <div class="row">
                                <div class="col-md-8">
                                    <label>User NIC</label>
                                    <input type="text" name="user_nic" value="<?php if(isset($_GET['user_nic'])){echo $_GET['user_nic'];} ?>" class="form-control">
                                </div>
                                
                                <div class="col-md-8">
                                    <label>User Phone</label>
                                    <input type="text" name="user_phone" value="<?php if(isset($_GET['user_phone'])){echo $_GET['user_phone'];} ?>" class="form-control">
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
                                    $con = mysqli_connect("localhost","root","","digitanzo");

                                    if(isset($_GET['user_nic']))
                                    {
                                        $user_nic = $_GET['user_nic'];
                                       
                                        $user_phone = $_GET['user_phone'];
                                        

$query = "SELECT * FROM tb_user WHERE user_nic ='$user_nic'  && user_phone ='$user_phone' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                               
                                              
 <input type="hidden" name="user_no" value="<?= $row['user_no']; ?>" >
                                                </div>
                           
                           
                        </div>
                        <div class="form-group mb-3">
                                                    <label for="">Temporary Code</label>
                                                    <input type="text" value="<?= $row['user_pwd']; ?>" class="form-control" id="tcode" name="tcode" required="required" disabled>
                                                </div>
                         
                                    <div class="form-group">
                                         <label for="">Temporary Password</label>
                                    <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php $a=rand(1000,9999); $c=rand(100,999); echo "$a"."$c"; ?>" disabled  />                 
                </div>
                                               
                        <div class="form-group">
                           
                            <input type="password" name="lastname" value="" id="password"  name="password_1" class="form-control validate" placeholder="Password" minlength="6" required="required" />
                             
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>