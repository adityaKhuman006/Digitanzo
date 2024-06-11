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
    $user_phone = $editrow['user_phone'];


    $get_rec_name = "SELECT user_rec_name FROM tb_user WHERE user_rec_id = '$rec_id'";
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];

?>
<?php
$currentpage="users";
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
            <h1>Edit User</h1>
          </div>
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
              <h3 class="card-title">Edit User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="server.php" method="post">
                <input type="hidden" name="id"  value="<?php echo $user_no ?>"  />
                <div class="row">
                    <div class="col-sm-6">
                        <div class=" w3l-form-group" >
                            <label>Recomend Userid *:</label>
                            <div class="group">
                                <input type="text" name="rec_id" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $reg_id ?>" readonly/>
                            </div>
                        </div>
                        <div class=" w3l-form-group">
                            <label>UserName *:</label>
                            <div class="group">
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user_name; ?>" />
                            </div>
                        </div>
                        <div class=" w3l-form-group">
                            <label>Password *:</label>
                            <div class="group">
                                <input type="password" name="password_1" class="form-control" placeholder="Password" required="required"/>
                            </div>
                        </div>
                        <div class=" w3l-form-group">
                            <label>City:</label>
                            <div class="group">
                                <input type="text" name="city" class="form-control" placeholder="Select the City"  value="<?php echo $user_city; ?>" />
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
                            <label>Phone Number:</label>
                            <div class="group">
                                <input type="text" name="phonenum" class="form-control" placeholder="Phone Number"  value="<?php echo $user_phone; ?>" />
                            </div>
                        </div>
                     
                        <div class=" w3l-form-group">
                            <label>Confirm Password *:</label>
                            <div class="group">
                                <input type="password" name="password_2" class="form-control" placeholder="Password" required="required" />
                            </div>
                        </div>
                        <div class=" w3l-form-group">
                            <label>Country:</label>
                            <div class="group">
                                <input type="text" name="country" class="form-control" placeholder="Select the Country" value="<?php echo $user_country; ?>"  />
                            </div>
                        </div>
                        
                    </div>  
                    <div class="col-sm-12">
                        <div class=" w3l-form-group">
                            <label>Street:</label>
                            <div class="group">
                                <input type="text" name="street" class="form-control" placeholder="Select the Street"  value="<?php echo $user_street; ?>" />
                            </div>
                        </div>
                    </div>    
                </div>    
       
               
                <br>
                <button type="submit" class="btn btn-info" name="edit_user">EDIT</button>
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