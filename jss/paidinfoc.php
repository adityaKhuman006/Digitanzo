<?php 

   include "common/config.php";
    $user_no=$_REQUEST['id'];

    $edit_tem = "SELECT * FROM tbl_reg WHERE user_no = '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
    $rec_id = $editrow['user_rec_id'];
    $reg_id = $editrow['user_reg_id'];
    $username = $editrow['user_name'];
    $user_payment = $editrow['user_payment'];
    $email = $editrow['email'];
    $user_city = $editrow['user_city'];
    $user_street = $editrow['user_district'];
    $Payments = $editrow['user_payment'];
    $refnum = $editrow['refnum'];
    $get_rec_name = "SELECT * FROM tbl_reg WHERE user_no = '$user_no'";

$images_sql = "SELECT * FROM tbl_reg WHERE user_no='$user_no'";

$result = mysqli_query($db,$images_sql);

$row = mysqli_fetch_array($result);
    $filename = $row['name'];
$image = $row['image'];
   // $images_sql = "SELECT image FROM tbl_reg WHERE user_no = '$user_no'";
    //$filename = $row['name'];
   // $image = $row['image'];
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];
    $user_rec_id= $rec_row['user_reg_id'];
    $phonenum= $rec_row['user_phone'];
    
   // echo($user_name);
   // exit;

?>
<?php
$currentpage="paymentsc";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('common/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
      
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  

<section>
    <!-- Image -->
  <!--<img src="upload/<?= $filename ?>" width="300px" height="300px" >-->

  <!-- Base64 image -->
  <img src="<?= $image ?>" width="600px" height="300px"  >
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              
             <!--   <section>
        <div class="col-xs-12 text-center">
  <div class="link">
    <strong>Confirmation Link:-  </strong>  <a href="registerconfirm.php?id=<?= $rec_row['user_reg_id']; ?>" id="txt" >registerconfirm.php?id=<?= $rec_row['user_reg_id']; ?></a>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>      
    </div>
    </section> -->
      <section>
       <div class="link " >
   <div class="form-group">

    <div class="row">
   <div class="col-sm-2">
      <label class="control-label">Referral Link:</label>
   </div>

   <div class="col-sm-8">

  <input type="text" class="form-control" value="https://digitanzo.lk/jss/registerconfirm.php?id=<?= $rec_row['user_reg_id']; ?>" id="myInput"  readonly>

       

   </div>
    <div class="col-sm-2">
     
        <button class="btn btn-success"  onclick="myFunction()">Copy Now</button>
    
     
    
   
 </div> 
</div>      
</div>
    
   </div>
    </section>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="server.php" method="post">
            <input type="hidden" name="id"  value = "<?php echo $user_no ?>"  />
              <div class="row">
            <div class="col-sm-6">
               <div class=" w3l-form-group" >
                <label>Ref. Number *:</label>
               
            </div>
          </div>
            <div class="col-sm-6">
            
             <div class=" w3l-form-group" >
               
                <div class="group">
                    <input type="text" name="refnum" class="form-control" placeholder="
                    Ref. Number"  value = "<?php echo $refnum ?>"  />
                </div>
            </div>
          </div>   
           </div>
           <div class="row">
            <div class="col-sm-6">
               <div class=" w3l-form-group" >
                <label>New Userid *:</label>
               <div class="group">
                    <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php $a=rand(10000,99999); $c=rand(1000,9999); echo "$a"."$c"; ?>"  />
                </div> 
               <!--  <div class="group">
                    <input type="text" name="recid" class="form-control" placeholder="
                    Ref. Number"  value = "<?php echo $refnum ?>"  />
                </div>-->
            </div>
          </div>
            <div class="col-sm-6">
            
             <div class=" w3l-form-group" >
                <label>Registration Userid *:</label>
                <div class="group">
                    <input type="text" name="phone" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $phonenum ?>"  />
                </div>
            </div>
          </div>   
           </div>
            <div class="row">
            <div class="col-sm-6">
            <div class=" w3l-form-group" >
                <label>Registration Userid *:</label>
                <div class="group">
                    <input type="text" name="oldrecid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $user_rec_id ?>"  />
                </div>
            </div>

          </div>
          <div class="col-sm-6">
            <div class=" w3l-form-group">
                <label>Recomend UserName:</label>
                <div class="group">
                    <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $rec_name ?>"  />
                </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
            <div class=" w3l-form-group">
                <label>User Payments</label>
                <div class="group">
                    <input type="text" name="phonenum" class="form-control" placeholder="Phone Number"  value="1" />
                </div>
            </div>
          </div>
          
          <div class="col-sm-6">
            <div class=" w3l-form-group">
                <label>UserName *:</label>
                <div class="group">
                    <input type="text" name="user_name" class="form-control" placeholder="Username" value="<?php echo $username; ?>"  />
                </div>
            </div>
        </div>
         <div class="col-sm-6">
            <div class=" w3l-form-group">
                <label>email *:</label>
                <div class="group">
                    <input type="text" name="email" class="form-control" placeholder="email" value="<?php echo $email; ?>"  />
                </div>
            </div>
        </div>
         </div>
            <br>
            <button type="submit" class="btn btn-success" name="edit_paymentc">ADD</button>
            <button type="submit" class="btn btn-info" name="payment_mail">MAIL</button>
           
        </form>       
         
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
</div>
<!-- ./wrapper -->


<!DOCTYPE html>
<html>
<head></head>
<body>


</body>
</html>

<?php include('common/footer.php'); ?>
 <script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}



</script>
<script>
    // Using ES6 feature.
    let redirect_Page = () => {
        let tID = setTimeout(function () {
            window.location.href = "home";
            window.clearTimeout(tID);       // clear time out.
        }, 5);
    }

    // Using regular methods.
    /* function redirect_Page () {
        var tID = setTimeout(function () {
            window.location.href = "https://www.encodedna.com/javascript/operators/default.htm";
            window.clearTimeout(tID);       // clear time out.
        }, 5000);
    } */
</script>