<?php
$currentpage="my_bank";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  $currentpage="my_bank";
  include('common/sidebar.php'); ?>

      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-8">
            <ol class="breadcrumb float-sm-right">
           <!--   <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Information</li>-->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content" margin="auto" style="text-align: left; margin-bottom: -20px; margin-left:5px ">
     <div class="d-flex justify-content-center">
        <div class="col-sm-8 ">
         
             <?php
                       include "common/config.php";
                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT * FROM tb_bank WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $row = mysqli_fetch_assoc($selquery);
                        $result =  mysqli_query($db, $sel_rec_tem);
                        $count = mysqli_num_rows($result);
                       if($count >0)
                       {


 
                                     echo "<tr'>";
                                    echo "<td style = 'width:100%'><h3></h2></td>";
                                   // echo "<td style = 'width:45%' >" . $row['ac_num'] . "</td>";
                                echo "</tr>";
    // the above echo is just for testing
    ?>
     <style type="text/css">
       .hide{

visibility: hidden

}
     </style>
    <?php
                       }
                    ?>    
                     
              </div>
            
          </div>


      </section>
     </br>
    <!-- Main content -->
    <section class="content">
      <div class="d-flex justify-content-center">
        <div class="col-10">
          <div class="card">
                    				    <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

MY BANK DETAILS
</div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php
                       include "common/config.php";


                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT * FROM tb_bank WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $row = mysqli_fetch_assoc($selquery);
                        $result =  mysqli_query($db, $sel_rec_tem);
                        $count = mysqli_num_rows($result);
                       if($count ==1)
                       {
                         echo "<table class='table table-bordered table-striped'>";

                                echo "<tr id='header'>";
                                     echo "<tr'>";
                                    echo "<td style = 'width:25%'>Account Number</td>";
                                    echo "<td style = 'width:45%' >" . $row['ac_num'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Full Name</td>";
                                    echo "<td style = 'width:45%' >" . $row['ac_name'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Banak Name</td>";
                                    echo "<td style = 'width:45%' >" . $row['ba_name'] . "</td>";
                                echo "</tr>";
                                echo "<tr'>";
                                    echo "<td style = 'width:5%'>Branch</td>";
                                    echo "<td style = 'width:45%' >" . $row['branch'] . "</td>";
                                echo "</tr>";


                               
                                echo "</table>";
                       }
                    ?>        
                         

            <!-- /.card-header -->
                        
               <section class="content" margin="auto">
      <div class="row">
        <div class="col-sm-9">
               <table >
                          <tr >
                                                       
                    <td class="hide">
 
     <?php
                       include "common/config.php";
                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $row = mysqli_fetch_assoc($selquery);
                    ?> 


                <a href  = "bank.php?id=<?= $row['user_rec_id']; ?>" class = 'btn btn-info btn-info'  name=''  title = '' id='' align="center">ADD MY BANK DETAILS</a> 

</td>
</tr>
                          
                        </table>  
     </div></div></section>
            
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->

<!-- ./wrapper -->


<?php include('common/footer.php'); ?>





 
