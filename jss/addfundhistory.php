<?php
$currentpage="paymentsc";
include "common/header.php";?>

<?php 

   include "common/config.php";
    $user_no=$_REQUEST['id'];

    $edit_tem = "SELECT * FROM payment WHERE user_no = '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
    $rec_id = $editrow['user_rec_id'];
    $user_reg_id = $editrow['user_reg_id'];
    $username = $editrow['user_name'];
    $user_payment = $editrow['user_payment'];
    $user_country = $editrow['user_country'];
    $user_phone = $editrow['user_phone'];
    $user_nic = $editrow['user_nic'];
     $email = $editrow['email'];
    $user_payment = $editrow['user_payment'];
    $refnum = $editrow['refnum'];
    $get_rec_name = "SELECT * FROM payment WHERE user_no = '$user_no'";

$images_sql = "SELECT * FROM payment WHERE user_no='$user_no'";

$result = mysqli_query($db,$images_sql);

$row = mysqli_fetch_array($result);
    $filename = $row['name'];
$image = $row['image'];
   // $images_sql = "SELECT image FROM tbl_reg WHERE user_no = '$user_no'";
    //$filename = $row['name'];
   // $image = $row['image'];
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];
    $user_rec_id= $rec_row['user_reg_id'];
    $phonenum= $rec_row['user_phone'];
     $user_name = $editrow['user_name'];
     
     
       echo "<br> id: ". $row["id"]. " - Name: ". $row["user_phone"]. " " . $row["lastname"] . "<br>";

echo ($user_nic);

echo ($username);

echo ($user_phone);

//echo ($user_reg_id);

//echo ($user_no);


//exit;
?>

echo ($user_nic);

echo ($username);

echo ($user_phone);

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
            
echo ($user_nic);

echo ($username);

echo ($user_phone);

            <?php
                    $user_name = $_SESSION['username'];
                    include "common/config.php";

                    if($user_name == '')
                    {
                        $sql = "SELECT user_name FROM payment WHERE user_name = 'username' order by user_no desc";
                        if($result = mysqli_query($db, $sql))
                        {
                            
                            if(mysqli_num_rows($result) > 0){
                                echo "<table  class='table table-bordered table-striped' id='example1'>";
                                    echo "<thead><tr>";
                                        echo "<th>TRANSACTION ID</th>";
                                        echo "<th>PAYMENT</th>"; 
                                        echo "<th>DATE</th>";
                                       
                                    echo "</tr></thead>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr style = 'text-align:center'>";
                                    echo "<td>" . $row['refnum'] . "</td>";
                                        echo "<td>" . $row['user_payment'] . "</td>";
                                        echo "<td>" . $row['regist_date'] . "</td>";
                                       
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


