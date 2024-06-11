<?php 

   include "common/config.php";
    $user_no=$_REQUEST['id'];

    $edit_tem = "SELECT * FROM tb_user WHERE user_no = '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
    $rec_id = $editrow['user_rec_id'];
    $reg_id = $editrow['user_reg_id'];
    $user_name = $editrow['user_name'];
    $user_payment = $editrow['user_payment'];
    $user_country = $editrow['user_country'];
    $user_city = $editrow['user_city'];
    $user_street = $editrow['user_district'];
    $Payments = $editrow['user_payment'];
    $get_rec_name = "SELECT user_rec_name,user_rec_id  FROM tb_user WHERE user_no = '$user_no'";
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];
	$user_rec_id= $rec_row['user_rec_id'];
$user_rec_id= $rec_row['user_rec_id'];
    
?>

<?php
$currentpage="payments";
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             
  <!--  <section>
        <div class="col-xs-12 text-center">
  <div class="link">
    <strong>Referral Link:-  </strong>
<input type="text" class="form-control" value="https://digitanzo.com/jss/registerform.php?id=<?= $row['user_rec_id']; ?>" id="myInput"  readonly>
      <a href="registerform.php?id=<?= $rec_row['user_rec_id']; ?>" id="txt" >registerform.php?id=<?= $rec_row['user_rec_id']; ?></a>
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

  <input type="text" class="form-control" value="https://digitanzo.lk/jss/registerform.php?id=<?= $rec_row['user_rec_id']; ?>" id="myInput"  readonly>

       

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
              <button type="submit" class="btn btn-success" name="edit_payment">EDIT</button>
            <input type="hidden" name="id"  value = "<?php echo $user_no ?>"  />
            <div class=" w3l-form-group" >
                <label>Rec Userid  *:</label>
                <div class="group">
                    <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $user_rec_id ?>" required="required"  />
                </div>
            </div>
        <!--    <div class=" w3l-form-group" >
                <label>Rec Userid *:</label>
                <div class="group">
                    <input type="text" name="oldrecid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $user_rec_id ?>"  />
                </div>
            </div> -->
            <div class=" w3l-form-group">
                <label>Recomend UserName:</label>
                <div class="group">
                    <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $rec_name ?>"  />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>User Payments</label>
                <div class="group">
                    <input type="text" name="phonenum" class="form-control" placeholder="Phone Number"  value="1" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>UserName *:</label>
                <div class="group">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user_name; ?>"  />
                </div>
            </div>
        
         
            <br>
            
            

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