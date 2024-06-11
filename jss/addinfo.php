
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
                    <div class="row">
                         <div class="col-sm-6">
                            <div class=" w3l-form-group" >
                                <label>Recomend Userid *:</label>
                                <div class="group">
                                    <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $_SESSION['userid'] ?>" readonly />
                                </div>
                            </div>
                            <div class=" w3l-form-group">
                                    <label>UserName *:</label>
                                    <div class="group">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required />
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
                                    <input type="text" name="city" class="form-control" placeholder="Select the City" />
                                </div>
                            </div>

                         </div>   
                         <div class="col-sm-6">
                            <div class=" w3l-form-group">
                                <label>Recomend UserName:</label>
                                <div class="group">
                                    <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $_SESSION['username'] ?>" readonly />
                                </div>
                            </div>
                            <div class=" w3l-form-group">
                                <label>Phone Number:</label>
                                <div class="group">
                                    <input type="text" name="phonenum" class="form-control" placeholder="Phone Number"  />
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
                                    <input type="text" name="country" class="form-control" placeholder="Select the Country"  />
                                </div>
                            </div>

                         </div>
                         <div class="col-sm-12">
                            <div class=" w3l-form-group">
                                <label>Street:</label>
                                <div class="group">
                                    <input type="text" name="street" class="form-control" placeholder="Select the Street"  />
                                </div>
                            </div>

                         </div>
                    </div>    
                      <br>
                    <button type="submit" class="btn btn-success" name="reg_user">ADD</button>
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
