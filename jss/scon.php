<!DOCTYPE html>
<!DOCTYPE html>
<?php
$currentpage="addmyfriend";
include "common/header.php";?>

<?php

    include "common/config.php";
    $user_no=$_REQUEST['id'];
    $edit_tem = "SELECT * FROM tb_user WHERE user_rec_id= '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
    


    

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
                                    <td>Commercial Bank</td>
                                    <th>Bank ACCNo</th>
                                    <td>8100060590</td>
                                </tr>
                                <tr>
                                    <th>Acc Holder Name</th>
                                    <td>P C Theipanaathan</td>
                                    <th>Branch</th>
                                    <td>Wellawatte</td>
                                </tr>
                                 <tr>
                                    <th>EZ Cash</th>
                                    <td>0771571665</td>
                                    <th>Frimi</th>
                                    <td>0771571665</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>    
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
<div class="col-12 my-auto" >
          <div class="card">
            
            <!-- /.card-header -->
               
                      </div>
               
                
  
 <form>
                <input type="hidden" name="id"  value=""  />
                <input type="hidden" name="search"  value="Search By Id"  />
              </form>

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
                <a href  = "registerform.php?id=<?= $row['user_rec_id']; ?>" class = 'btn btn-info btn-info'  name=''  title = '' align="center">ADD MY FRIEND</a> 

                          </td>
                          </tr>
                        </table>  
 


         
     
    </div>
    <!-- /.form-box -->
  </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

         
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

