<?php
$currentpage="direct";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('common/sidebar.php'); ?>


     
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
               <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

DIRECT REFERRALS
</div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
            <?php
                    $user_name = $_SESSION['username'];
                    include "common/config.php";

                   
                        $sql = "SELECT * FROM tb_user WHERE user_rec_name = '$user_name'";
                        if($result = mysqli_query($db, $sql))
                        {
                            
                            if(mysqli_num_rows($result) > 0){
                                echo "<table  class='table table-bordered table-striped' id='example1'>";
                                    echo "<thead><tr>";
                                        //echo "<th>No</th>";
                                        echo "<th>Name</th>";
                                     //   echo "<th>NIC</th>";
                                        echo "<th>Level</th>";
                                      //  echo "<th>Member</th>";
                                      //  echo "<th>Money</th>";                                        
                                      //  echo "<th>Reg_ID</th>";
                                        echo "<th>Rec. ID</th>";
                                        echo "<th>Total Member</th>";
                                      //  echo "<th>User_Payment</th>";
                                        echo "<th>Reg. Date</th>";
                                       // echo "<th style = 'text-align:center'>Edit <br></th>";
                                    echo "</tr></thead>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr style = 'text-align:center'>";
                                      //  echo "<td>" . $row['user_no'] . "</td>";
                                        echo "<td>" . $row['user_name'] . "</td>";
                                      //  echo "<td>" . $row['user_nic'] . "</td>";
                                        echo "<td>" . $row['user_level'] . "</td>";
                                      //  echo "<td>" . $row['user_member'] . "</td>";
                                      //  echo "<td>" . $row['user_money'] . "</td>";                                        
                                       // echo "<td>" . $row['user_reg_id'] . "</td>";
                                        echo "<td>" . $row['user_rec_id'] . "</td>";
                                        echo "<td>" . $row['user_member'] . "</td>";
                                      //  echo "<td>" . $row['user_payment'] . "</td>";
                                        echo "<td>" . $row['regist_date'] . "</td>";
                                      //  echo "<td>  <a href  = 'paidinfo.php?id=". $row['user_no']."' class = 'btn btn-info btn-sm'  name='add'  title = 'ADD'>Payment</a> </td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } 
                  
                    ?>
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

