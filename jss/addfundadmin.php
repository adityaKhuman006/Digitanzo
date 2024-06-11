<?php
$currentpage="addfundadmin";
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
                        $sql = "SELECT * FROM payment WHERE h_id = '0'  order by user_no desc";
                        if($result = mysqli_query($db, $sql))
                        {
                            
                            if(mysqli_num_rows($result) > 0){
                                echo "<table  class='table table-bordered table-striped' id='example1'>";
                                    echo "<thead><tr>";
                                    echo "<th>Ref No</th>";
                                        
                                        echo "<th>Name</th>";
                                        echo "<th>Phone</th>"; 
                                        echo "<th>RcName</th>";
                                        echo "<th>PMT</th>";
                                        //echo "<th>Date</th>";
                                        echo "<th style = 'text-align:center'>Edit <br></th>";
                                         echo "<th style = 'text-align:center'>Delete <br></th>";
                                    echo "</tr></thead>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr style = 'text-align:center'>";
                                    echo "<td>" . $row['refnum'] . "</td>";
                                        
                                        echo "<td>" . $row['user_name'] . "</td>";
                                        echo "<td>" . $row['user_phone'] . "</td>";
                                                                        
                                      
                                        echo "<td>" . $row['user_rec_name'] . "</td>";
                                        echo "<td>" . $row['user_payment'] . "</td>";
                                       // echo "<td>" . $row['regist_date'] . "</td>";
                                        echo "<td>  <a href  = 'adfundview.php?id=". $row['user_no']."' class='fa fa-credit-card' style='font-size:36 px;color:blue' name='add'  title = 'ADD'></a> </td>";
                                            echo "<td>  <a href  = 'deleteuser.php?id=". $row['user_no']."' class='fa fa-trash' style='font-size:36 px;color:red' name='add'  title = 'ADD'></a> </td>";
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


