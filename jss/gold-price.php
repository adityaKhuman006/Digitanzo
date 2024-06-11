<?php
$currentpage="gold-price";
include "common/header.php";?>
<!-- /.navbar -->
<?php
include "common/config.php";
?>
<!-- Main Sidebar Container -->
<?php
include('common/sidebar.php'); ?>

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
    <section class="content">
        <div class="d-flex justify-content-center">
            <div class="col-12 ">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="gold-price-backend.php" method="post"
                              style="color:#4b0082; font-weight:400;">
                            <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">
                                Manage Gold Price
                            </div>
                            <div class="row col-12">
                                <div class="col-6">
                                    <div class=" w3l-form-group">
                                        <div class="mb-3">
                                            <?php
                                            $price_24k = get_todays_price();
                                            $prices = getOriginalGoldPrice($price_24k, 'USD', 'USD,LKR,INR,GBP');
                                            ?>
                                            <label>Original Gold Price</label>
                                            <input class="form-control user-balance" type="text" disabled value="<?= format_amount($prices) ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class=" w3l-form-group">
                                        <div class="mb-3">
                                            <label>Deduct Amount</label>
                                            <?php
                                                $selectDeductGoldAmount = "SELECT * FROM `deducted-gold` where id = '1'";
                                                $deductGoldAmountResult  = mysqli_query($db,$selectDeductGoldAmount);
                                                $deductGoldAmountFetch = mysqli_fetch_assoc($deductGoldAmountResult);
                                            ?>
                                            <input class="form-control transfer-balance" type="number" placeholder="Enter amount" min="0.000000001"
                                                   step="0.0000000000000001" required name="deduct-amount" value="<?=$deductGoldAmountFetch['deduct_amount'] ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-info send-conformation chekIdentity">Submit</button>
                                </div>
                            </div>
                    </div>
                    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="errorModalLabel">Deduct Amount</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    are you sure you want to deduct_amount ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit-transfer-balance" class="btn btn-primary">Deduct</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
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

    <!-- Modal -->

    <script>
        $(".send-conformation").click(function (){
          $("#errorModal").modal('show')
        })
    </script>
</div>
</body>