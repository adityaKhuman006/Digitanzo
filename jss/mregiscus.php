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

?>


<?php

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
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.container {
    height: 50px;
    width: 50%;
}

.container_img {
    height: 50%;
    width: 50%;
    object-fit: cover;
} 
</style>
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
   <div>
      <div class="row">
         <div class="col" style="text-align: center; margin-bottom: 10px;">
    <img src="img/logo.png">
    <hr style="border: 1px solid red;  margin-bottom: -5px;margin-top: -2px;">
  </div>
  
      </div>
      <div style="text-align: center; margin-bottom: 20px" class="row">
        <div class="col-2"><a href="home.php">Home</a></div>
        <div class="col-4"><a href="business-plan.php">Business Plan</a></div>
        <div class="col-3"><a href="contact.php">Contact</a></div>
        <div class="col-2"><a href="login.php">Login</a></div>
        
        
      </div>
      <hr style="border: 1px solid red; margin-bottom: -2px; margin-top: -10px;">
      </div>
      <div class="col" style="text-align: center; margin-bottom: 20px; color: #008080; font-size: 20px; font-weight: 600;"> Register a new account </div>

 <form>
                <input type="hidden" name="id"  value=""  />
                <input type="hidden" name="search"  value="Search By Id"  />
              </form>

              

<form class="md-form">

</form>


        <form action="server.php"  id="digit_form" method="post"  enctype='multipart/form-data'>
                <input type="hidden" name="id"  value="<?php echo $user_no ?>"  />
        <div class="row">
                       <div class="col - 4"> 
                        <div class=" w3l-form-group">
                          
                            <div class="group">
                               <a href="payment-methods" class="btn btn-outline-success" role="button" aria-pressed="true">Pay Now</a>


                            </div>
                         
                        </div>
                        </div>
                 <div class="col-8" > 

         
                        <div class=" w3l-form-group" >
                                                       <div class="group">
                               <div class="custom-file mb-3">
      <input type="file" class="custom-file-input"  name="file"
       id="customFile" onchange="return fileValidation()"  required="reruired" >
      <label class="custom-file-label" name="custom-file-label" for="customFile" >Your Payment Proof</label>

      <hr>
      <div class="group">
        <input type="number" name="refnum" id="" class="form-control" placeholder="Ref. Number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length>=15) return false;" required="required"/>

         
                            </div>
                            
                        </br>
    </div>
                            </div>
                        </div>
                      </div>

                             </div>
     
                <div class="row">
                    <div class="col">                        
                         <div class=" w3l-form-group" >
                            <label>Sponsor ID</label>
                            <div class="group">
                                <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $rec_id ?>" readonly/>
                            </div>
                        </div>
                        </div>
                         <div class="col"> 
                        <div class=" w3l-form-group">
                           <label>Sponsor Name</label>
                            <div class="group">
                                <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $user_name ?>" readonly/>
                            </div>
                         
                        </div>
                        </div>
                             </div>
                    <div class="row">
                      
                        <div class="col-sm-6"> 
                        <div class=" w3l-form-group">
                           </br>
                            <div class="group">
                                <input type="text" name="username" class="form-control" placeholder="Username" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length>=15) return false;" required="required"/>
                            </div>
                        </div>
                      </div>
                     
                    
                          <div class="col-sm-3"> 

                        <div class=" w3l-form-group">
                            </br>
                            <div class="group">
                                <input type="text" name="nic" class="form-control" placeholder="NIC/Pasport" required="required"/>
                            </div>
                        </div>
                      </div>
                       <div class="col-sm-3"> 
                        <div class=" w3l-form-group">
                           </br>
                            <div class="group">
    <input type="number" name="phonenum" class="form-control" placeholder="Phone Number"  value="" id="" required="required" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" />
                            </div>
                        </div>
                        </div>
                      </div>
                        
                  


                   <div class="row">
                   <div class="col-sm-6">  
                       
                        
                     
                       <div class=" w3l-form-group">
                            </br>
                            <div class="group">
                                <input type="text" name="city" class="form-control" placeholder="Street"  value=""  required="required" />
                            </div>
                        </div>
                      </div>
                       <div class="col-sm-6"> 
                        <div class=" w3l-form-group">
                           </br>
                            <div class="group">
                                <input type="text" name="street" class="form-control" placeholder="City"  value=""  required="required"/>
                            </div>
                        </div>
                         </div>
                       

                  </div>
                       
              <div class="row">
                
                          <div class="col-sm-12"> 
                          <div class=" w3l-form-group">
                          </br>
                            <div class="group">
                                <input type="text" class="email white col-7 col-md-4 col-lg-7 ml-3 form-control" name="country" class="form-control" placeholder="E-Mail" value="" id="country" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  required="required"/>
                            </div>
                        </div>

                    </div>  

                  </div>
                       


               
                <br>
                
     
                    <div>
                    <input type="checkbox" name="checkbox" value="check" id="agree" required="reruired" /> I have read and agree to the <a href="termsandservices"> Terms and Conditions</a> and <a href="localhost/digitanzo/jss/termsandservices"> Privacy Policy</a>
                    </div>
                    <div class="row">
                         <div class="col-2">
                <button type="submit" class="btn btn-info" name="user_re" >Register</button>
            </div>
            <div class="col-8">
            </div>
                <div class="col-2">
                      <button type="submit" id="myButton" class="btn btn-success" name="logout" >Exit</button>

                  
            </div>
             </div>
 


 
            </form>
         

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

        <div class="row">
                  
                    <div class="container">
    <div id="imagePreview" class="container_img"></div>

</div>
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

<script type="text/javascript">
    
    $(document).ready(function() {
    $('#customFile').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            avatar: {
                validators: {
                    file: {
                        extension: 'jpeg,png,jpg,pdf',
                        type: 'image/jpeg,image/png',
                        max: 300 * 300,
                        message: 'The selected file is not valid'
                    }
                }
            }
        }
    });
});
</script>
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "home.php";
    };
</script>
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
          minlength:10,
          maxlength:10

        },
        refnum: {
          required: true,          
          maxlength:15

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
        country: "Please enter your Email",
      }
    });
});
</script>

<script type="text/javascript">
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif/ only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();


            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>' ;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

</script>

</body>
</html>



 