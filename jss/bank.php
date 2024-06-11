
<?php
$currentpage="bank";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include('common/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>My Bank  </b>Details </h1>

          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <a href  = "my_bank.php" class = 'btn btn-info btn-info'  name=''  title = '' id='' align="center">Go Back</a> 
            </ol>
          </div> 
        </div>
             <div class="alert alert-warning alert-dismissible fade show">
    <strong>Warning!</strong> Please enter a valid value and recheck in all the required fields before proceeding. ** You can't edit once submit your details.
    <button type="button" class="close" data-dismiss="alert">&times;</button>

</div>

      </div><!-- /.container-fluid -->
    </section>

<?php

    include "common/config.php";
    $user_no=$_REQUEST['id'];
    $edit_tem = "SELECT * FROM tb_user WHERE user_rec_id= '$user_no'";
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



    $get_rec_name = "SELECT user_rec_name FROM tb_user WHERE user_rec_id = '$reg_id'";
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
  <title>BANK | DETAILS</title>
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
    
  </div>
 
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"></p>
  <form action="server.php" method="post">
                <input type="hidden" name="id"  value="<?php echo $user_no ?>"  />
                <div class="row">
                   <div class="col-sm-12">
                        <div class=" w3l-form-group" >
                            
                            <div class="group">
                                <input type="text" name="username" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $user_name ?>" readonly/>
                            </div>
                        </div>
                      </div>
                    <div class="col-sm-6">
                        <div class=" w3l-form-group" >
                            <label>Recomend Userid *:</label>
                            <div class="group">
                                <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $rec_id ?>" readonly/>
                            </div>
                        </div>
                        <div class=" w3l-form-group">
                            <label>Phone Number:</label>
                            <div class="group">
                                <input type="text" name="phonenum" class="form-control" placeholder="Username" value="<?php echo $user_phone; ?>" readonly/>
                            </div>
                        </div>
                   </div>
                   <div class="col-sm-6">  
                       <div class=" w3l-form-group">
                            <label>Recomend UserName:</label>
                            <div class="group">
                                <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $rec_name ?>" readonly/>
                            </div>
                        </div>  
                    <div class=" w3l-form-group">
                            <label>NIC:</label>
                            <div class="group">
                                <input type="text" name="usernic" class="form-control" placeholder="Select the City"  value="<?php echo $user_nic; ?>" readonly />
                            </div>
                        </div>
                    </div>  

                       <div class="col-sm-12"> 
                     <div class=" w3l-form-group">
                            </br>
                            <div class="group">
                                <input type="text" name="fName" class="form-control" placeholder="Full Name"  value="" required="required"  />
                            </div>
                        </div>
                         <div class=" w3l-form-group">
                            </br>
                            <div class="group">
                                <input type="text" name="aNumber" class="form-control" placeholder="Account Number" value=""  required="required" />
                            </div>
                        </div>
                         <div class=" w3l-form-group">
                            </br>
                            <div class="group">
                                <input type="text" name="bName" class="form-control" placeholder="Bank Name"  value=""  required="required" />
                            </div>
                        </div>
                         <div class=" w3l-form-group">
                            </br>
                            <div class="group">
                                <input type="text" name="branch" class="form-control" placeholder="Branch" required="required" />
                            </div>
                        </div>

                        

                      </div>
                       
                </div>    
       
               
                <br>
                <button type="submit" class="btn btn-info" name="user_bank">Submit</button>
                
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
</body>
</html>


 