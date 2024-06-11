<?php
	$currentpage="addfund";
include "common/header.php";?>
<?php
include('common/sidebar.php'); ?>
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
	$email = $editrow['email'];
		$h_id = $editrow['h_id'];
	
	
	
	
    $get_rec_name = "SELECT user_rec_name FROM tb_user WHERE user_rec_id = '$rec_id'";
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];
    
    $pq = "SELECT * FROM payment WHERE user_reg_id = '$rec_id' AND h_id=0";
    $pd = mysqli_query($db, $pq);
    $pn = mysqli_num_rows($pd);
    
	
	
?> 

       

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="d-flex justify-content-center">
        <div class="col-12 ">
          <div class="card">
     
            <!-- /.card-header -->
            <div class="card-body">
            
                  
           <form action="server.php"  id="digit_form" method="post"  enctype='multipart/form-data' style="color:#4b0082; font-weight:400;">
               	<div>
								<p style="color:#4b0082; font-size:16px;text-align:center;font-weight:400">
									<b> Deposit or online transfer payment to a account and upload the clear photo or screenshot of the slip/receipt with your sponsor link.</b>
								
								</p>
								
								<h4 style="color:#A52A2A;  font-weight:600; text-align:center;">Pay To</h4>
								<p style="color:#4b0082; font-size:18px;text-align:center;font-weight:500">
									<b>Bank: NDB Bank</b>
									<br>
									<b> DIGITANZO (PVT) LTD</b>
									<br>
									
									<b> Account Number - 111000152168</br>Branch - Marine Drive</b>
								</p>
							</div>
							
<div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

	Add Funds
</div>
			  	
			  	
							
							
							
		
					
							<div class="row col-12">
									<div class="col-6">
									<div class=" w3l-form-group" >
										
										<label>AMOUNT</label>
										
										
										<input type="number" name="user_payment" id="" min="5000" class="form-control" placeholder="Min-Amount 5000 In LKR"  required=" required"/>
									</div>
								</div>
								<div class="col-6">
									<div class=" w3l-form-group" >
									<div class="mb-3">
									<label>AMOUNT</label>
								<input class="form-control" type="file" name="file" id="customFile" required=" required"/>
							</div>
									</div>
								</div>
							</div>
							
							
							
							<input type="hidden" name="id"  value="<?php echo $user_no ?>"  />
							<div class="row col-12">
								<div class="col-6">
									<div class=" w3l-form-group" >							
										
										<label>User ID</label>
										
									<input type="text" name="user_reg_id" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $rec_id ?>" readonly/>    </div>
									
								</div>
								<div class="col-6">
									<div class=" w3l-form-group" >
										
										
										<label>Name</label>
										
										<input type="text" name="username" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $user_name ?>" readonly/>
									</div>
									
								</div>
								
							</div>
							
							
							
							<div class="row col-12">
								
								
								<div class="col-6">
									<div class=" w3l-form-group" >
										
										
										<label>NIC/Pasport No.</label>
										<div class="group">
											<input type="text" name="nic" class="form-control" placeholder="NIC/Pasport No." value = "<?php echo $user_nic ?>" required="required"/ readonly>
										</div>
									</div>
								</div>
								
								<div class="col-6">
									
									<div class=" w3l-form-group" >
										
										
										<label>Phone Number</label>
										<div class="group">
											<input type="number" name="phonenum" class="form-control" placeholder="Phone Number"  value = "<?php echo $user_phone ?>" id="" required="required" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" readonly />
										</div>
									</div>
								</div>
							</div>
							
							<div class="row col-12">
								
								
								<div class="col-12">
									<div class=" w3l-form-group" >
										
										
										<label >Email</label>
										<div class="group">
											<input type="text" class="email white form-control" name="email" class="form-control" placeholder="E-Mail" value = "<?php echo $email ?>" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  readonlyrequired="required" readonly / >
										</div>
									</div>
								</div>
								
							</div>
							
							
							<div>
								<input type="checkbox" name="checkbox" value="check" id="agree" required="reruired" /> I have read and agree to the <a href="termsandservices"> Terms and Conditions</a> and <a href="localhost/digitanzo/jss/termsandservices"> Privacy Policy</a>
							</div>
							<div class="row">
								<div class="col-6">
								<button type="<?= ($pn > 0) ? 'button' : 'submit'?>"  class="btn btn-info chekIdentity" name="user_res" <?= ($pn > 0) ? 'disabled' : ''?>>Add Funds</button>
								
							

								</div>
								
								
								
							</div>
							
					

					
		</form>
                          
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
<br>
<br>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
      <div class="modal fade" id="identiCardErrorModal" tabindex="-1" role="dialog"
           aria-labelledby="identiCardErrorModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="identiCardErrorModalLabel">Identity Not Approved</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      Your Identity Is Not Verified Please First Verify Your Identity
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <a href="identicard.php" class="btn btn-primary">Send for review</a>
                  </div>
              </div>
          </div>
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
</div>
<!-- ./wrapper -->

<script>
  $(document).ready(function () {
    chekIdentity()
  })

  function chekIdentity () {
    $.ajax({
      url: 'check-Identity.php',
      method: 'POST',
      success: function (response) {
        if (response != 'Done') {
          $('#identiCardErrorModal').modal('show')
          $('.chekIdentity').prop('disabled', 'disabled');
          $('.chekIdentity').addClass('disabled');
        }
      }
    })
  }
<?php

    if (isset($_SESSION['gwa_msg'])) {
       echo "alert('{$_SESSION['gwa_msg']}');";
       unset($_SESSION['gwa_msg']);
    }

?>
</script>
<?php include('common/footer.php'); ?>
