<?php
$currentpage = "identicard";
include "common/header.php"; ?>
<?php include('common/sidebar.php');
$userId = $_SESSION['userid'];
$checkUserIdentitySql = "SELECT * FROM user_identity  WHERE user_rec_id = '$userId' LIMIT 1";
$checkUserIdentityResult = mysqli_query($db, $checkUserIdentitySql);
$checkUserIdentityFetch = mysqli_fetch_assoc($checkUserIdentityResult);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- /.navbar -->
    <style>
        @import "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css";
        @import "http://fonts.googleapis.com/css?family=Roboto:400,500";


        h4 {
            text-align: left;
            margin-top: 5px;
            font-size: 30px;
            padding-top: 20px;
        }

        .h {
            margin-top: 5px;
            font-size: 16px;
            padding-top: 15px;
            padding-left: 5px;
            color: #000;
        }

        .description {
            font-size: 15px;
            color: black;
            padding-top: 0px;

        }

        #sum_box p {
            text-align: left;
            font-size: 18px;
            margin: 10px;
            padding-bottom: 5px;
        }

        #sum_box .db:hover {
            background: #40516f;
            color: #fff;
        }


        #sum_box .db:hover .icon {
            opacity: 1;
            color: #999999;
        }

        #sum_box .icon {
            color: #fff;
            font-size: 30px;
            margin-top: 5px;
            margin-bottom: 0px;
            float: right;
            padding-right: 3px;
            padding-top: 10px;
        }


        .panel.income.db.mbm {
            background-color: #5cb85c;
        }

        .panel.profit.db.mbm {
            background-color: #5bc0de;
        }


        .panel.task.db.mbm {
            background-color: #f0ad4e;
        }

        .alert1 {

            background-color: #e2d1a8;
            border-radius: 5px;


        }

        .alert2 {
            border-radius: 5px;
            background-color: #5bc0de;
            text-align: left;
            margin: 10px;
            font-size: 30px;
            padding-bottom: 0px;
        }

        .alert3 {
            border-radius: 5px;
            background-color: #f0ad4e;

        }

        .alert4 {
            border-radius: 5px;
            background-color: #a8c4e2;
            text-align: left;
            margin: 0px;
            font-size: 30px;
            padding-bottom: 0px;
        }

        .alert5 {
            border-radius: 5px;
            background-color: #e2a8df;
            text-align: left;
            margin: 0px;
            font-size: 30px;
            padding-bottom: 0px;
        }

        .link {
            border-radius: 5px;

            background-color: #c1e2a8;
            padding: 15px;
            font-size: 20px;
            color: #000;

        }

        .panel-body {

            margin: 5px;
            padding-bottom: 0px;
            font-size: 20px;
        }


        @media only screen and (min-width: 100px) {
            #txt {
                font-size: 20px;
            }
        }

        @media screen and (max-width: 100px) {
            #txt {
                font-size: 10px;
            }

        }

        p.a {
            font-size: 10px;
            color: #a35063;

        }

        .bs-example {
            margin: 20px;
        }

        .progress_bar {
            margin-bottom: 15px;
            width: 100%;
            position: relative;

        }

        .pro-bar {
            background: #4b0082;
            display: block;
            width: 100%;
            height: 40px;
            line-height: 40px;

        }

        .pro-bg {
            display: block;
            height: 40px;
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden;

        }

        .pro-value {
            background: hsla(0, 0%, 0%, 0.24);
            color: hsl(0, 0%, 98%);
            width: 60px;
            height: 40px;
            line-height: 40px;
            padding: 0 15px;
            position: absolute;
            top: 0;
            right: 0;
            text-align: center;
        }

        .progress_bar_title {
            width: 100%;
            height: 40px;
            line-height: 40px;
            color: #fff;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
            padding: 0 15px;
        }

        #myProgress {

            color: hsl(0, 0%, 50%);
            width: 100%;
            height: 30px;
            line-height: 20px;
            bg-color: #000;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
            padding: 0px;
            -webkit-appearance: none;
            appearance: none;


        }

        progress {
            /* Reset the default appearance */
            -webkit-appearance: none;
            appearance: none;


        }

        .btn {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 10px 10px;
            cursor: pointer;
            font-size: 15px;
        }

        .btnv {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 8px 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .btna {
            background-color: SeaGreen;
            border: none;
            color: white;
            padding: 8px 8px;
            cursor: pointer;
            font-size: 15px;
        }

        .btnc {
            background-color: Crimson;
            border: none;
            color: white;
            padding: 8px 8px;
            cursor: pointer;
            font-size: 15px;
        }

        /* Darker background on mouse-over */
        .btn:hover {
            background-color: RoyalBlue;
        }

        #h4 {
            font-size: 16px;
            color: DarkRed;
            font-weight: 400;

        }

        #h3 {
            font-size: 16px;
            color: MidnightBlue;
        }

        #h2 {
            font-size: 16px;
            color: Teal;
            font-weight: 900;
        }
         .sub-div img {
             max-height: 260px;
             max-width: 411px;
         }
    </style>


</head>
<body>
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    if (!$checkUserIdentityFetch) { ?>
        <section class="content">
            <div class="d-flex justify-content-center">
                <div class="col-12 ">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="create-user-identity.php" method="post" enctype='multipart/form-data'
                                  style="color:#4b0082; font-weight:400;">
                                <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">
                                    Add Identity Card
                                </div>
                                <div class="row col-12">
                                    <div class="col-6">
                                        <div class=" w3l-form-group">
                                            <div class="mb-3">
                                                <label>Image 1</label>
                                                <input class="form-control" type="file" name="image-1"
                                                       required=" required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class=" w3l-form-group">
                                            <div class="mb-3">
                                                <label>Image 2</label>
                                                <input class="form-control" type="file" name="image-2"
                                                       required=" required"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="submit-type" value="create">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-info" name="submit-identity">Submit
                                        </button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <br>
                <br>
            </div>
            <!-- /.col -->
            <!-- /.row -->
        </section>
    <?php } else { ?>
        <div class="main-card p-3 rounded-lg shadow-sm bg-white m-1 overflow-hidden">
            <?php
            if ($checkUserIdentityFetch['status'] == 1) { ?>
                <div class="alert alert-success p-3" role="alert">
                    Your identity card is approved
                </div>
            <?php } elseif ($checkUserIdentityFetch['status'] == 2) {
                ?>
                <div class="alert alert-primary p-3" role="alert">
                    Your identity card is under review
                </div>
            <?php } elseif ($checkUserIdentityFetch['status'] == 3) { ?>
                <div class="alert alert-danger p-3" role="alert">
                    Your identity card is disapproved
                </div>
            <?php }
            ?>
            <div class="row justify-content-around">
                <div class="col-5 sub-div shadow-sm rounded-lg p-2 d-flex flex-column justify-content-center align-items-center">
                    <span class="m-2">Image 1</span>
                    <img src="identitys/<?php echo $checkUserIdentityFetch['img1'] ?>" class="img-fluid" alt="image 1">
                </div>
                <div class="col-5 sub-div shadow-sm rounded-lg p-2 d-flex flex-column justify-content-center align-items-center">
                    <span class="m-2">Image 2</span>
                    <img src="identitys/<?php echo $checkUserIdentityFetch['img2'] ?>" class="img-fluid" alt="image 2">
                </div>
            </div>
            <?php
            if ($checkUserIdentityFetch['status'] != 1) {
                ?>
                <div class="d-flex justify-content-center align-items-center p-4">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i
                                class="fas fa-edit fa-solid"></i> Edit
                    </button>
                </div>
            <?php }
            ?>
        </div>
    <?php } ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update identity card</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="create-user-identity.php" method="post" enctype='multipart/form-data'>
                    <div class="modal-body">
                        <div class="row col-12">
                            <div class="col-12">
                                <div class=" w3l-form-group">
                                    <div class="mb-3">
                                        <label>Image 1</label>
                                        <input class="form-control" type="file" name="image-1"
                                               required=" required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class=" w3l-form-group">
                                    <div class="mb-3">
                                        <label>Image 2</label>
                                        <input class="form-control" type="file" name="image-2"
                                               required=" required"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="submit-type" value="update">
                    <input type="hidden" name="update-id" value="<?php echo $checkUserIdentityFetch['id'] ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit-identity" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>