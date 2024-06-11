<?php
$currentpage="users";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('common/sidebar.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    </head>
<body>
   

     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Member</h1>
          </div>
          <div class="col-sm-10">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member</li>
            </ol>
          </div>
            
            
            <table class="table table-bordered">
                <thead class="alert-info">
                    <tr>
                        
                        <th>User No</th>
                        <th>Name</th>
                        <th>NIC</th>
                        <th>Reg ID</th>
                        <th>Rec ID</th>
                        <th>Rec Name</th>
                        <th>Mbr</th>
                        <th>Dir</th>
                        <th>Lvl</th>                       
                        <th>Money</th>
                        <th>Phone</th>                        
                       
                        
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php

                        include "common/config.php";
                        $count=0;
                        $query = mysqli_query($db, "SELECT * FROM tb_user ORDER BY user_no DESC") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                        $count++;
                    ?>
                    <tr class="del_mem<?php echo $fetch['user_no']?>">
                        
                        <td><?php echo $fetch['user_no']?></td>
                        <td><?php echo $fetch['user_name']?></td>   
                        <td><?php echo $fetch['user_nic']?></td>
                        <td><?php echo $fetch['user_reg_id']?></td>    
                        <td><?php echo $fetch['user_rec_id']?></td>
                        <td><?php echo $fetch['user_rec_name']?></td>                            
                          <td><?php echo $fetch['user_member']?></td>  
                        <td><?php echo $fetch['user_dir']?></td> 
                        <td><?php echo $fetch['user_level']?></td> 
                        <td><?php echo $fetch['user_money']?></td>                         
                        <td><?php echo $fetch['user_phone']?></td> 
                        
                        
                        <td><?php echo $fetch['regist_date']?></td> 

                        

                        <td><button type="button" class="btn btn-danger" data-target="#modal_confirm<?php echo $count?>" data-toggle="modal"> <i class='fa fa-trash'></i></button>
            </td>               
                    </tr>
                    
                    <div class="modal fade" id="modal_confirm<?php echo $count?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">System</h3>
                                </div>
                                <div class="modal-body">
                                    <center><h4>Are you sure you want to delete this data?</h4></center>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    <a type="button" class="btn btn-success" href="delinfo.php?id=<?php echo $fetch['user_no']?>">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>  
    </div>
</section>
</div>

   
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</body> 
</html>