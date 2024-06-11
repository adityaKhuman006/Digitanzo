<?php
$currentpage="registerview";
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
            <h1>Payments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payments</li>
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
              <h3 class="card-title">Payments</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
            <?php
                    $user_name = $_SESSION['username'];
                    include "common/config.php";

                    if($user_name == 'admin')
                    {
                        $sql = "SELECT * FROM tbl_reg WHERE status = '0'";
                        if($result = mysqli_query($db, $sql))
                        {
                            
                            if(mysqli_num_rows($result) > 0){
                                echo "<table  class='table table-bordered table-striped' id='example1'>";
                                    echo "<thead><tr>";
                                        echo "<th>No</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>";
                                       // echo "<th>Level</th>";
                                       // echo "<th>Member</th>";
                                       // echo "<th>Money</th>";                                        
                                        echo "<th>Reg_ID</th>";
                                        echo "<th>Rec_ID</th>";
                                        echo "<th>Rec_Name</th>";
                                        echo "<th>User_Payment</th>";
                                        echo "<th>Regsit_Date</th>";
                                        echo "<th style = 'text-align:center'>Edit <br></th>";
                                    echo "</tr></thead>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr style = 'text-align:center'>";
                                        echo "<td>" . $row['user_no'] . "</td>";
                                        echo "<td>" . $row['user_name'] . "</td>";
                                        echo "<td>" . $row['user_phone'] . "</td>";
                                    //    echo "<td>" . $row['user_level'] . "</td>";
                                    //    echo "<td>" . $row['user_member'] . "</td>";
                                     //   echo "<td>" . $row['user_money'] . "</td>";                                        
                                        echo "<td>" . $row['user_reg_id'] . "</td>";
                                        echo "<td>" . $row['user_rec_id'] . "</td>";
                                        echo "<td>" . $row['user_rec_name'] . "</td>";
                                        echo "<td>" . $row['user_payment'] . "</td>";
                                        echo "<td>" . $row['regist_date'] . "</td>";
                                        echo "<td>  <a href  = 'paidinfoc.php?id=". $row['user_no']."' class = 'btn btn-info btn-sm'  name='add'  title = 'ADD'>Payment</a> </td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } 
                    }
                    else
                    {
                        echo "There is no member!";
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

