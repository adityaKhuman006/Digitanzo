<?php
$currentpage="userview";
include "common/header.php";?>
  <?php include('common/sidebar.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>User View</title>
</head>
<body>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
              
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-6">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="card mt-">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                               
                            </thead>
                            <tbody>
                                <?php 
                                   // $con = mysqli_connect("localhost","root","","digitanzo");
                                include('common/config.php');

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM tb_user WHERE CONCAT(user_no,user_name,user_member,user_nic,user_phone) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($db, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                           
<div class="container">
       

    
    <div class="row ">
        <div class="col-md-0"></div>
      <div class="col-md-12 ">
        <div class="card md-10 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
       
            <div class = "container">
                             <form id="contact-form" role="form">

            

            <div class="controls">
   <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="form_lastname">Date</label>
                            
                                                            </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['regist_date']; ?>" disabled>
                                                            </div>
                    </div>
                  
                   
                </div>


              
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">User No.</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_no']; ?>" disabled>
                                                            </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">User Name</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_name']; ?>" disabled>
                                                            </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">User NIC</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_nic']; ?>" disabled>
                                                            </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Reg. ID</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_reg_id']; ?>" disabled>
                                                            </div>
                    </div>
                   
                </div>
                  <div class="row">
                  
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Rec. ID</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_rec_id']; ?>" disabled>
                                                            </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Rec. Name</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_rec_name']; ?>" disabled>
                                                            </div>
                    </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Member</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_member']; ?>" disabled>
                                                            </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Dir</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_dir']; ?>" disabled>
                                                            </div>
                    </div>
                   
                </div>
                 
                  <div class="row">
                  
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Level</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_level']; ?>" disabled>
                                                            </div>
                  
                   
                  </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Money</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_money']; ?>" disabled>
                                                            </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Phone</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_phone']; ?>" disabled>
                                                            </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Email</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['email']; ?>" disabled>
                                                            </div>
                    </div>
                    
                   
                </div>
                   
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">City</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_city']; ?>" disabled>
                                                            </div>
                    </div>
                   
                   
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">District</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_district']; ?>" disabled>
                                                            </div>
                    </div>
                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Payment</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_payment']; ?>" disabled>
                                                            </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="form_lastname">Action</label><br>
                            <button type="button" class="btn btn-danger" data-target="#modal_confirm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                                                            </div>
                    </div>
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

                    
                </div>

                   <div class="col-md-8">
                        <div class="form-group">
                            <label for="form_lastname">Tempory Code</label>
                            <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?= $items['user_pwd']; ?>" disabled>
                                                            </div>
                    </div>
             

</div>

         </form>

        </div>
            </div>


    </div>
        <!-- /.8 -->

    </div>
    <!-- /.row-->

</div>
</div>

                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>