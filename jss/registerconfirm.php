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
    $email = $editrow['email'];
    $user_city = $editrow['user_city'];
    $user_street = $editrow['user_district'];
    $user_phone = $editrow['user_phone'];
    $user_nic = $editrow['user_nic'];
     $refnum = $editrow['refnum'];



    $get_rec_name = "SELECT user_rec_name FROM tbl_reg WHERE user_reg_id = '$reg_id'";
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];  


    $sql = "SELECT user_nic FROM tb_user WHERE user_name = '$user_name'";
  $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name']; 
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    header('location: login');
  }
} else {

  echo "";
}

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
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <style type="text/css">
    label
{
    width: 100%;
}

.alert
{
    display: none;
}

.requirements
{
    list-style-type: none;
}

.wrong .fa-check
{
    display: none;
}

.good .fa-times
{
    display: none;
}
  </style>

</head>

<body class="hold-transition register-page">
<div class="register-box" >
<div >
<div style="text-align: center; margin-top: 20px; background-color: #008080; color: #ffffff; padding: 5px;">

    <strong>Information !</strong>  Please verify your following information and create your account password.
    
    </div>
</div>
     <div class="card">
    <div class="card-body register-card-body">
      <div class="row" style="text-align: center; margin-top: 10px"></div>
        <div>

          
      <div class="row">
         <div class="col" style="text-align: center; margin-bottom: 10px">
    <img src="img/logo.png">
    <hr style="border: 1px solid red;  margin-bottom: -5px;margin-top: -2px;">
  </div>
  
      </div>
      <div style="text-align: center; margin-bottom: 10px" class="row" >
        <div class="col-4"><a href="home">Home</a></div>
        <div class="col-4"><a href="business-plan"></a></div>
        
        
        <div class="col-4"><a href="login">Login</a></div>
      </div>
      <hr style="border: 1px solid red; margin-bottom: 02px; margin-top: 0px;">
      </div>
      
  <form action="server.php" method="post" oninput='password_2.setCustomValidity(password_2.value != password_1.value ? "Passwords do not match." : "")' >
                <input type="hidden" name="id"  value="<?php echo $user_no ?>"  />
                
                    
                        <div class="row">
                    <div class="col-sm-6">
                        <div class=" w3l-form-group" >
                            <label>Sponsor id:</label>
                            <div class="group">
                               <input type="text" name="refnum" class="form-control" placeholder="Select the City"  value="<?php echo $refnum; ?>" readonly />
                            </div>
                        </div>
                      </div>

                        <div class="col-sm-6">  
                       <div class=" w3l-form-group">
                            <label>Sponsor Name:</label>
                            <div class="group">
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
<div class="col-sm-6"> 
                         <div class=" w3l-form-group">
                            <label>City:</label>
                            <div class="group">
                                <input type="text" name="street" class="form-control" placeholder="Select the Street"  value="<?php echo $user_street; ?>" readonly/>
                            </div>
                        </div>
                      </div>

                    </div>
                    
                         <div class="row">
                          <div class="col-sm-6"> 
                             <div class=" w3l-form-group">
                            <label>E-Mail:</label>
                            <div class="group">
                                <input type="text" name="country" class="form-control" placeholder="Select the Country" value="<?php echo $email; ?>" readonly />
                            </div>
                        </div>
                      
                      </div>
                      
                     
                       <div class="col-sm-6">

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
                            <label>Password:</label>
                            <div class="group">
                                <input type="password" id="inputValidationEx2"  name="password_1" class="form-control validate" placeholder="Password" minlength="6" required="required" />
                                <label for="inputValidationEx2" data-error="wrong" data-success="right" style="width:200px;">Type your password</label>
                            </div>
                        </div>
                      
                      </div>
                      <div class="col-sm-6"> 
                         <div class=" w3l-form-group">
                            <label>Confirm Password:</label>
                            <div class="group">
                                <input type="password" name="password_2" class="form-control" placeholder="Password" minlength="6" required="required" />
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
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
<!-- <script type="text/javascript">
  $(function () {
    var $password = $(".form-control[type='password']");
    var $passwordAlert = $(".password-alert");
    var $requirements = $(".requirements");
    var leng, bigLetter, num, specialChar;
    var $leng = $(".leng");
    var $bigLetter = $(".big-letter");
    var $num = $(".num");
    var $specialChar = $(".special-char");
    var specialChars = "!@#$%^&*()-_=+[{]}\\|;:'\",<.>/?`~";
    var numbers = "0123456789";

    $requirements.addClass("wrong");
    $password.on("focus", function(){$passwordAlert.show();});

    $password.on("input blur", function (e) {
        var el = $(this);
        var val = el.val();
        $passwordAlert.show();

        if (val.length < 4) {
            leng = false;
        }
        else if (val.length >5) {
            leng=true;
        }
        

        if(val.toLowerCase()==val){
            bigLetter = false;
        }
        else{bigLetter=true;}
        
        num = false;
        for(var i=0; i<val.length;i++){
            for(var j=0; j<numbers.length; j++){
                if(val[i]==numbers[j]){
                    num = true;
                }
            }
        }
        
        specialChar=false;
        for(var i=0; i<val.length;i++){
            for(var j=0; j<specialChars.length; j++){
                if(val[i]==specialChars[j]){
                    specialChar = true;
                }
            }
        }

        //console.log(leng, bigLetter, num, specialChar);
        console.log(leng, bigLetter, num);

       // if(leng==true&&bigLetter==true&&num==true&&specialChar==true){
          if(leng==true&&bigLetter==true&&num==true){
            $(this).addClass("valid").removeClass("invalid");
            $requirements.removeClass("wrong").addClass("good");
            $passwordAlert.removeClass("alert-warning").addClass("alert-success");
        }
        else
        {
            $(this).addClass("invalid").removeClass("valid");
            $passwordAlert.removeClass("alert-success").addClass("alert-warning");

            if(leng==false){$leng.addClass("wrong").removeClass("good");}
            else{$leng.addClass("good").removeClass("wrong");}

            if(bigLetter==false){$bigLetter.addClass("wrong").removeClass("good");}
            else{$bigLetter.addClass("good").removeClass("wrong");}

            if(num==false){$num.addClass("wrong").removeClass("good");}
            else{$num.addClass("good").removeClass("wrong");}

          //  if(specialChar==false){$specialChar.addClass("wrong").removeClass("good");}
           // else{$specialChar.addClass("good").removeClass("wrong");}
        }
        
        
        if(e.type == "blur"){
                $passwordAlert.hide();
            }
    });
});
</script>-->
</body>
</html>


 