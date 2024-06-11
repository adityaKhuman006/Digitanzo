<?php
$currentpage="withdrawals";
include "common/header.php";?>
  <!-- /.navbar -->
<?php
                       include "common/config.php";
                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $row = mysqli_fetch_assoc($selquery);
                    ?> 
  <!-- Main Sidebar Container -->
  <?php
  include('common/sidebar.php'); ?>

     
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
         <div class="card">
          				    <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

WITHDRAWAL
</div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
        <?php if ($_SESSION['username'] == 'admin') {?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">WITHDRAWAL</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">        
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>USER NAME</th>
                          <th>TOTAL EARNING($)</th>
                          <th>UR_AMOUNT($)</th>
                          <th>AVAIL_AMOUNT($)</th>
                          <th>WITHDRAWALED DATE</th>
                          <th>TDS FEE(5%)</th>
                          <th>SERVICE FEE(10%)</th>
                          <th>STATE</th>
                        </tr>
                      </thead>
                      <tbody id="tttbody"> 
                      </tbody>
                  </table>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <?php } else { ?>

            <div class="card">
            <div class="card-header">
              <h3 class="card-title">WITHDRAWAL</h3>
              <div class="card-tools">
                
                <button id="btn_withdr" type="button" class="btn btn-primary chekIdentity" data-toggle="modal" data-target="#exampleModalCenter">
                  NEW WITHDRAWAL
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped" >
                      <tr>
                          <th style = 'width:10%;' >No</th>
                          <th style = 'width:30%;'>WITHDRWAL AMOUNT IN GRAM.</th>
                          <th style = 'width:45%;'>WITHDRWAL DATE</th>
                      </tr>
                      <tbody id="ttbody">
                      </tbody>
                  </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


             <!-- Modal -->
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">WITHDRAWAL REQUESTS IN GRAM</h5>
                          </div>
                          <div class="modal-body">
                            <p>You requested &nbsp;<span id="req_count">0</span>&nbsp;Time(s)</p>
                            <div class="row">
                              <div class="col-sm-6">
                               <div class="form-group">
                                    <label for="tds_fee">YOUR GOLD</label>
                                 <select class="form-control" id="cur_bal" placeholder="Enter the Amount" 
                                    name="cur_bal"  required="required" min="0" >
  <option selected>SELECT</option>
  <option>1</option>
  <option>8</option>
  <option>40</option>
  <option>80</option>
  <option>120</option>
  <option>180</option>
  <option>371</option>
</select>

                                   <!-- <input style="background-color: #fff;" min="0"  class="form-control" id="cur_bal" placeholder="Enter the Amount" 
                                    name="cur_bal"  required="required" >-->
                                </div>
                                 <div class="form-group">
                                    <label for="total_earning">Total Gold</label>

                                    <input style="background-color: #008080; color: #fff;" type="text"  class="form-control" value=" <?php                
                                    echo "" ,' ' . $row['user_money'] . "";
                                     ?>  " id="total_earning" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="minimum_bal">Minimum Balance Gold</label>
                                    <input style="background-color: #008080; color: #fff; font-size: 18px; font-weight: 2px" type="text"  class="form-control" value="1" id="minimum_bal" disabled="true">
                                </div>
                              </div>
                              <div class="col-sm-6">
                               
                              
                                <div class="form-group">
                                    <label for="tds_fee">TDS CHARGES(0.035%)</label>
                                    <input style="background-color: #008080; color: #fff;" type="text"  class="form-control" id="tds_fee" value="0">
                                </div>                                

                                 <div class="form-group">
                                    <label for="srv_fee">SERVICE CHARGES(0.015%)</label>
                                    <input style="background-color: #008080; color: #fff;" type="text"  class="form-control" id="srv_fee" value="0" disabled="true">
                                </div>
                                <div class="form-group">
                                    <label for="av_bal">You will Receive</label>
                                    <input  type="text"  class="form-control" id="av_bal"  style="background: #043b74; color: white; border-radius: 5px;" disabled="true" >
                                </div>
                                
                               </div>  
                            </div>  
                          </div> 
                          <div class="modal-footer">
                
                <button  type="button" class="btn btn-primary" id="send" data-dismiss="modal" requirment="required">WITHDRAWAL</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                          </div>
                        </div>
                      </div>
                </div>


          <?php } ?>
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

<div class="modal fade" id="identiCardErrorModal" tabindex="-1" role="dialog" style="opacity: 0.5 !important;"
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
<?php include('common/footer.php'); ?>

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
$(document).ready(function() {
  $('#send').click(function() {
    var value = document.getElementById('cur_bal').value;
    if (value === '') {
      alert('Enter the amount');
      header('location: withdrawals.php');
    }
     else {
    
  }
  })
});
</script>



<script type="text/javascript" src="../jquery/withdrawal.js"></script>
<script type="text/javascript" src="../jquery/jquery.noty.packaged.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
  //called when key is pressed in textbox
  $("#cur_bal").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>