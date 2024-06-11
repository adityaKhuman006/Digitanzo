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



    $get_rec_name = "SELECT user_rec_name FROM tb_user WHERE user_rec_id = '$rec_id'";
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];

    include_once('server.php');
?>


  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->
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
  <link rel="stylesheet" href="../assets/dist/css/adminlte.css">
  <link rel="stylesheet" href="../css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
   <script type="text/javascript">
    <?php

    if(isset($_SESSION['message'])){
      $message = $_SESSION['message'];
      ?>
      swal("<?php echo $message; ?>");
      <?php
      unset($_SESSION['message']);
    }
    ?>
   </script>
  </div>
  
           <div class="alert alert-warning alert-dismissible fade show">
    <strong>Warning!</strong> Please enter a valid value in all the required fields before proceeding.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>


  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new account</p>
 <form>
                <input type="hidden" name="id"  value=""  />
                <input type="hidden" name="search"  value="Search By Id"  />
              </form>

              



        <form action="server.php" id="digit_form" method="post" enctype='multipart/form-data'>
                <input type="hidden" name="id"  value="<?php echo $user_no ?>"  />

                 <div class="col" > 
                        <div class=" w3l-form-group" >
                            <label>Proof *:</label>
                            <div class="group">
                               <input type='file' name='file'  required="required" />
                            </div>
                        </div>
                      </div>
     
                <div class="row">
                    <div class="col">                        
                         <div class=" w3l-form-group" >
                            <label>Sponsor Id *:</label>
                            <div class="group">
                                <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $rec_id ?>" readonly/>
                            </div>
                        </div>
                        </div>
                         <div class="col"> 
                        <div class=" w3l-form-group">
                            <label>Sponsor Name:</label>
                            <div class="group">
                                <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $user_name ?>" readonly/>
                            </div>
                         
                        </div>
                        </div>
                             </div>
                    <div class="row">
                      
                        <div class="col-sm-6"> 
                        <div class=" w3l-form-group">
                            <label>UserName *:</label>
                            <div class="group">
                                <input type="text" name="username" class="form-control" placeholder="Username" value=""  required="required" />
                            </div>
                        </div>
                      </div>
                     
                    
                          <div class="col-sm-3"> 

                        <div class=" w3l-form-group">
                            <label>NIC :</label>
                            <div class="group">
                                <input type="text" name="nic" class="form-control" placeholder="NIC/Pasport" required="required"/>
                            </div>
                        </div>
                      </div>
                       <div class="col-sm-3"> 
                        <div class=" w3l-form-group">
                            <label>Phone :</label>
                            <div class="group">
                                <input type="text" name="phonenum" class="form-control" placeholder="Phone Number"  value="" id="" required="required" />
                            </div>
                        </div>
                        </div>
                      </div>
                        
                  


                   <div class="row">
                   <div class="col-sm-6">  
                       
                        
                     
                       <div class=" w3l-form-group">
                            <label>Street:</label>
                            <div class="group">
                                <input type="text" name="city" class="form-control" placeholder="Select the Street"  value=""  required="required" />
                            </div>
                        </div>
                      </div>
                       <div class="col-sm-3"> 
                        <div class=" w3l-form-group">
                            <label>City:</label>
                            <div class="group">
                                <input type="text" name="street" class="form-control" placeholder="Select the City"  value=""  required="required"/>
                            </div>
                        </div>
                         </div>
                          <div class="col-sm-3"> 
                          <div class=" w3l-form-group">
                            <label>District:</label>
                            <div class="group">
                                <input type="text" name="country" class="form-control" placeholder="Select the District" value=""   required="required"/>
                            </div>
                        </div>
                    </div>  
                  </div>
                       
              

     
               
                <br>
                
     
                
                <button type="submit" class="btn btn-info" name="user_re">Register</button>
            </form>
     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</body>
</html>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>


<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
$(document).on("click",".btn-info",function(){
  $("#digit_form").validate({
      rules: {
        recname: "required",
        file: "required",
        recid: "required",
        username: "required",
        nic: "required",
        phonenum: {
          required: true,
          minlength:10
        },
        city: "required",
        street: "required",
        country: "required",
      },
      messages: {
        recname: "Please enter your recname",
        file: "Please Select File",
        recid: "Please enter your recname",
        username: "Please enter your Name",
        nic: "Please enter your nic",
        phonenum: {
          required: "Please enter your Phone Number",
          minlength: "Plese enter 10 Digit"
        },
        city: "Please enter your Street",
        street: "Please enter your City",
        country: "Please enter your District",
      }
    });
});
</script>
</body>
</html>



 