<?php
$currentpage="paynow";
include "common/header.php";?>

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
            <h1>Bank Account Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Bank Account Details</h3>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Bank Name</th>
                                    <td>Bank of India</td>
                                    <th>Bank ACCNo</th>
                                    <td>330120012010</td>
                                </tr>
                                <tr>
                                    <th>Acc Holder Name</th>
                                    <td>Bharathi Raja</td>
                                    <th>IFSC</th>
                                    <td>SBI1212010</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>    
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Epin Request Form</h3>
            </div>
            <!-- /.card-header -->
                <div class="card">
    <div class="card-body register-card-body">
         <table>
                          <tr>
                            <td>
                          </td>
                          <td>
                           </br>
                             <?php
                       include "common/config.php";
                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $row = mysqli_fetch_assoc($selquery);
                    ?>  
                <a href  = "paynow.php?id=<?= $row['user_rec_id']; ?>" class = 'btn btn-info btn-info'  name=''  title = '' align="center">ADD MY BANK DETAILS</a> 

                          </td>
                          </tr>
                        </table>  
 <form>
                <input type="hidden" name="id"  value=""  />
                <input type="hidden" name="search"  value="Search By Id"  />
              </form>

              
 


          <form action="server.php" method="post">
                <input type="hidden" name="id"  value="<?php echo $user_no ?>"  />

          <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" required="required">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>

                <div class="row">

                  
                    <div class="col-sm-6">
                        <div class=" w3l-form-group" >
                            <label>Sponsor Id *:</label>
                            <div class="group">
                                <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $rec_id ?>" readonly/>
                            </div>
                        </div>
                        <div class=" w3l-form-group">
                            <label>UserName *:</label>
                            <div class="group">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="" />
                            </div>
                        </div>
                        <div class=" w3l-form-group">
                            <label>NIC *:</label>
                            <div class="group">
                                <input type="text" name="nic" class="form-control" placeholder="NIC/Pasport" required="required"/>
                            </div>
                        </div>
                       
                        <div class=" w3l-form-group">
                            <label>Phone Number:</label>
                            <div class="group">
                                <input type="text" name="phonenum" class="form-control" placeholder="Phone Number"  value="" />
                            </div>
                        </div>
                        
                   </div>
                   <div class="col-sm-6">  
                       <div class=" w3l-form-group">
                            <label>Sponsor Name:</label>
                            <div class="group">
                                <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $user_name ?>" readonly/>
                            </div>
                        </div>  
                        
                     
                       <div class=" w3l-form-group">
                            <label>Street:</label>
                            <div class="group">
                                <input type="text" name="city" class="form-control" placeholder="Select the City"  value="" />
                            </div>
                        </div>
                      
                        <div class=" w3l-form-group">
                            <label>City:</label>
                            <div class="group">
                                <input type="text" name="street" class="form-control" placeholder="Select the Street"  value="" />
                            </div>
                        </div>
                         
                          <div class=" w3l-form-group">
                            <label>District:</label>
                            <div class="group">
                                <input type="text" name="country" class="form-control" placeholder="Select the Country" value=""  />
                            </div>
                        </div>
                    </div>  
                       
                </div>    
       
               
                <br>
                <button type="submit" class="btn btn-info" name="user_re">Step 1</button>
            </form>
     
    </div>
    <!-- /.form-box -->
  </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Requested Epin Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>UserID</th>
                                <th>No OF Epin</th>
                                <th>Amount</th>
                                <th>Bank</th>
                                <th>Status</th>
                            </tr>
                        </tbody>
                    </table>
                </div>    
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

