  <?php include('common/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>How to Fetch Data by ID in Textbox using PHP MySQL</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="user_nic" value="<?php if(isset($_GET['user_nic'])){echo $_GET['user_nic'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="user_name" value="<?php if(isset($_GET['user_name'])){echo $_GET['user_name'];} ?>" class="form-control">
                                </div>
                                 <div class="col-md-8">
                                    <input type="text" name="user_phone" value="<?php if(isset($_GET['user_phone'])){echo $_GET['user_phone'];} ?>" class="form-control">
                                </div>
                                 <div class="col-md-8">
                                    <input type="text" name="user_rec_name" value="<?php if(isset($_GET['user_rec_name'])){echo $_GET['user_rec_name'];} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","digitanzo");

                                    if(isset($_GET['user_nic']))
                                    {
                                        
                                        $user_nic = $_GET['user_nic'];
                                        $user_name = $_GET['user_name'];
                                        $user_phone = $_GET['user_phone'];
                                        $user_rec_name = $_GET['user_rec_name'];

                                        $query = "SELECT * FROM tb_user WHERE  user_nic ='$user_nic' && user_name='$user_name' && user_phone='$user_phone' && user_rec_name='$user_rec_name' ";
                                        echo $user_nic;
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {

                                                ?>
                                               
                                                      <form action="update_query.php" method="post">

                                                 <div class="form-group mb-3">
                                                    <label for="" >User Number</label>
                                                    <input type="text" value="<?= $row['user_no']; ?>" class="form-control" disabled>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Password</label>
                                                    <input type="password" value="<?= $row['user_pwd']; ?>" class="form-control" name="lastname">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Confirm Password</label>
                                                    <input type="password"  class="form-control">
                                                </div>

                                                <button class="btn btn-primary" type="Submit" name="update">Submit</button>
                                            </form>



                                                
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>