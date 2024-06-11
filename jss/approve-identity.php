<?php
$currentpage = "approve-identity";
include "common/header.php"; ?>
<?php include('common/sidebar.php'); ?>
<!--
status
2.Approve = 1
1.pending = 2
3.disapprove = 3

-->
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- /.navbar -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    .sub-div img {
        max-height: 260px;
        max-width: 411px;
    }
    .tab-nav{
        padding: 10px 40px;
        background: white;
        margin: 8px;
        color: black !important;
        border-radius:10px;
    }
</style>
<body>
<!-- Main Sidebar Container -->
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper border">
    <ul class="nav nav-tabs p-3">
        <li class="active tab-nav"><a data-toggle="tab" class="text-black-50" href="#home">Pending</a></li>
        <li class="tab-nav"><a data-toggle="tab" class="text-black-50" href="#menu1">Approve</a></li>
        <li class="tab-nav"><a data-toggle="tab" class="text-black-50" href="#menu2">Disapprove</a></li>
    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <?php
            $getIdentitySql = "SELECT * FROM user_identity LEFT JOIN  tb_user ON user_identity.user_rec_id = tb_user.user_rec_id WHERE user_identity.status = 2";
            $getIdentityResult = mysqli_query($db, $getIdentitySql);
            foreach ($getIdentityResult as $identity) {
                if (count($identity) > 0) { ?>
                    <div class="main-card p-3 rounded-lg shadow-sm bg-white m-3 overflow-hidden">
                        <h3 class="m-2"><?php echo $identity['user_name'] ?></h3>
                        <div class="row justify-content-around">
                            <div class="col-5 sub-div shadow-sm rounded-lg p-2 d-flex flex-column justify-content-center align-items-center">
                                <span class="m-2">Image 1</span>
                                <img src="identitys/<?php echo $identity['img1'] ?>" class="img-fluid" alt="image 1">
                            </div>
                            <div class="col-5 sub-div shadow-sm rounded-lg p-2 d-flex flex-column justify-content-center align-items-center">
                                <span class="m-2">Image 2</span>
                                <img src="identitys/<?php echo $identity['img2'] ?>" class="img-fluid" alt="image 2">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center p-4">
                            <a href="change-identity-status.php?id=<?php echo $identity['id'] ?>&status=1"
                               class="btn btn-primary m-1">Approve</a>
                            <a href="change-identity-status.php?id=<?php echo $identity['id'] ?>&status=3"
                               class="btn btn-danger m-1">Disapprove</a>
                        </div>
                    </div>
                <?php } else {
                    echo "<h1>No pending data available</h1>";
                }
            } ?>
        </div>
        <div id="menu1" class="tab-pane fade">
            <?php
            $getIdentitySql = "SELECT * FROM user_identity LEFT JOIN  tb_user ON user_identity.user_rec_id = tb_user.user_rec_id WHERE user_identity.status = 1";
            $getIdentityResult = mysqli_query($db, $getIdentitySql);

            foreach ($getIdentityResult as $identity) {
                if (count($identity) > 0) { ?>
                    <div class="main-card p-3 rounded-lg shadow-sm bg-white m-3 overflow-hidden">
                        <h3 class="m-2"><?php echo $identity['user_name'] ?></h3>
                        <div class="row justify-content-around">
                            <div class="col-5 sub-div shadow-sm rounded-lg p-2 d-flex flex-column justify-content-center align-items-center">
                                <span class="m-2">Image 1</span>
                                <img src="identitys/<?php echo $identity['img1'] ?>" class="img-fluid" alt="image 1">
                            </div>
                            <div class="col-5 sub-div shadow-sm rounded-lg p-2 d-flex flex-column justify-content-center align-items-center">
                                <span class="m-2">Image 2</span>
                                <img src="identitys/<?php echo $identity['img2'] ?>" class="img-fluid" alt="image 2">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center p-4">
                            <a href="change-identity-status.php?id=<?php echo $identity['id'] ?>&status=3"
                               class="btn btn-danger m-1">Disapprove</a>
                        </div>
                    </div>
                <?php } else {
                    echo "<h1>No approve data available</h1>";
                }
            } ?>
        </div>
        <div id="menu2" class="tab-pane fade">
            <?php
            $getIdentitySql = "SELECT * FROM user_identity LEFT JOIN  tb_user ON user_identity.user_rec_id = tb_user.user_rec_id WHERE user_identity.status = 3";
            $getIdentityResult = mysqli_query($db, $getIdentitySql);
            foreach ($getIdentityResult as $identity) {
                if (count($identity) > 0) { ?>
                    <div class="main-card p-3 rounded-lg shadow-sm bg-white m-3 overflow-hidden">
                        <h3 class="m-2"><?php echo $identity['user_name'] ?></h3>
                        <div class="row justify-content-around">
                            <div class="col-5 sub-div shadow-sm rounded-lg p-2 d-flex flex-column justify-content-center align-items-center">
                                <span class="m-2">Image 1</span>
                                <img src="identitys/<?php echo $identity['img1'] ?>" class="img-fluid" alt="image 1">
                            </div>
                            <div class="col-5 sub-div shadow-sm rounded-lg p-2 d-flex flex-column justify-content-center align-items-center">
                                <span class="m-2">Image 2</span>
                                <img src="identitys/<?php echo $identity['img2'] ?>" class="img-fluid" alt="image 2">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center p-4">
                            <a href="change-identity-status.php?id=<?php echo $identity['id'] ?>&status=1"
                               class="btn btn-primary m-1">Approve</a>
                        </div>
                    </div>
                <?php } else {
                    echo "<h1>No disapprove data available</h1>";
                }
            } ?>
        </div>
    </div>
</div>
</div>

</body>
</html>