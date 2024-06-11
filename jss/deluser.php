<?php 

   include "common/config.php";
    $user_no=$_REQUEST['id'];

    $edit_tem = "SELECT * FROM tb_user WHERE user_no = '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
   
    
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
  


            </div>
            <!-- /.card-header -->
          
         
           
                <nav class="navbar navbar-default">
        <div class="container-fluid">
            
        </div>
    </nav>
    <div class="col-md-"></div>
    <div class="col-md-12 well">
        
        <div class="col-md-12">         
            
            <table class="table table-bordered">
                <thead class="alert-info">
                    <tr>
                        <th>User No</th>
                        <th>User Name</th>
                        <th>Reg ID</th>
                        <th>Rec ID</th>
                        <th>Rec Name</th>
                        <th>Phone</th>
                        <th>NIC</th>
                        <th>City</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'conn.php';
                        $count=0;
                        $query = mysqli_query($conn, "SELECT * FROM tbl_reg ORDER BY `user_no` DESC") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                        $count++;
                    ?>
                    <tr class="del_mem<?php echo $fetch['user_name']?>">
                        <td><?php echo $fetch['user_no']?></td>
                        <td><?php echo $fetch['user_name']?></td>
                        <td><?php echo $fetch['user_reg_id']?></td> 
                        <td><?php echo $fetch['user_rec_id']?></td>
                        <td><?php echo $fetch['user_rec_name']?></td>
                        <td><?php echo $fetch['user_phone']?></td>          
                        <td><?php echo $fetch['user_nic']?></td>    
                        <td><?php echo $fetch['user_city']?></td>   
                        <td><?php echo $fetch['regist_date']?></td>     
                        <td><button type="button" class="btn btn-danger" data-target="#modal_confirm<?php echo $count?>" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</button>
            </td>               
                    </tr>
                    
                    <div class="modal fade" id="modal_confirm<?php echo $count?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">System</h3>
                                </div>
                                <div class="modal-body">
                                    <center><h4>Are you sure you want to delete this data?</h4></center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    <a type="button" class="btn btn-success" href="deleteuser.php?id=<?php echo $fetch['user_no']?>">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>  
    </div>
    <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="save.php">
                    <div class="modal-header">
                        <h3 class="modal-title">Add Member</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Firstname</label>
                                <input type="text" name="firstname" class="form-control" required="required"/>
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" name="lastname" class="form-control" required="required" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" required="required"/>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                        <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
            

       
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