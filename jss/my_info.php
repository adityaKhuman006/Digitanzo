<?php
$currentpage="my_info";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  $currentpage="my_info";
  include('common/sidebar.php'); ?>

       

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="d-flex justify-content-center">
        <div class="col-12">
          <div class="card">
          				    <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

 My Information
</div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-12">
            <?php
                        include "common/config.php";
                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $row = mysqli_fetch_assoc($selquery);
                        $rec_tmp = $row['user_name'];
                        $rec_member = $row['user_member'];
                        $rec_dir = $row['user_level'];
                            echo "<table  class='table table-bordered table-striped'>";                             
                                echo "<tr id='header'>";
                                    echo "<th style = 'width:5%'>User name</th>";
                                    echo "<th style = 'width:95%' id='verifyAdmin'>". $row["user_name"]."</th>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Full Name</td>";
                                    echo "<td style = 'width:95%' >" . $row['refnum'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>NIC/Passport</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_nic'] . "</td>";
                                echo "</tr>";
                                            echo "<tr'>";
                                    echo "<td style = 'width:5%'>Sponsor Name</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_rec_name'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Sponsor ID</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_rec_id'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Level</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_level'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Total Member</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_member'] . "</td>";
                                echo "</tr>";
                                  echo "<tr'>";
                                    echo "<td style = 'width:5%'>Direct Member</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_dir'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Earning(Gram)</td>";
                                    echo "<td style = 'width:45%' >" . $row['user_money'] . "</td>"; 
                                echo "</tr>";                               
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Phone Number</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_phone'] . "</td>";
                                echo "</tr>";
                                 echo "<tr'>";
                                    echo "<td style = 'width:5%'>Street</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_city'] . "</td>";
                                echo "</tr>";
                                 echo "<tr'>";
                                    echo "<td style = 'width:5%'>City</td>";
                                    echo "<td style = 'width:95%' >" . $row['user_district'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>E-Mail</td>";
                                    echo "<td style = 'width:95%' >" . $row['email'] . "</td>";
                                echo "</tr>";
                               
                                
                        echo "</table>";
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
