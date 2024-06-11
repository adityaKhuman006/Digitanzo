<?php
$currentpage="withdrawalad";
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
                        $sql = "SELECT * FROM tb_wd WHERE state = '0' or state = '1' order by admin_permission asc";
                        if($result = mysqli_query($db, $sql))
                        {
                            
                            if(mysqli_num_rows($result) > 0){
                                echo "<table  class='table table-bordered table-striped' id='example1'>";
                                    echo "<thead><tr>";
                                        echo "<th>No</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Curent Value</th>";
                                        echo "<th>Real Value</th>";
                                        echo "<th>Wd Count</th>";
                                        echo "<th>WD Date</th>";                                        
                                        
                                        echo "<th>Pmn</th>";
                                      
                                        echo "<th style = 'text-align:center'>Edit <br></th>";
                                    echo "</tr></thead>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr style = 'text-align:center'>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['cur_val'] . "</td>";
                                        echo "<td>" . $row['real_val'] . "</td>";
                                        echo "<td>" . $row['wd_count'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";                                        
                                        
                                        echo "<td>" . $row['admin_permission'] . "</td>";
                                      //  echo "<td>" . $row['user_rec_name'] . "</td>";
                                       // echo "<td>" . $row['user_payment'] . "</td>";
                                       // echo "<td>" . $row['regist_date'] . "</td>";
                                        echo "<td>  <a href  = 'Withdrawalc.php?id=". $row['id']."' class = 'btn btn-info btn-sm'  name='add'  title = 'ADD'>Edit</a> </td>";
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

