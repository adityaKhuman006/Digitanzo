<?php
$currentpage = "savegold";
include "common/header.php";
?>
<!-- /.navbar -->
<?php
include "common/config.php";
$user_name = $_SESSION['username'];
$sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
$selquery = mysqli_query($db, $sel_rec_tem);
$row = mysqli_fetch_assoc($selquery);
$totalGoldQuery = "SELECT
    COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) AS totalBoughtGold,
    COALESCE(SUM(CASE WHEN action = 'withdrawl' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS totalWithdrawlGold,
    COALESCE(SUM(CASE WHEN action = 'sell' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS totalSellGold,
    COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) - COALESCE(SUM(CASE WHEN action = 'sell' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS netGoldBalance
FROM
    tb_user_gold_transation
WHERE 
    user_id = {$row['user_no']}";
$gRes = mysqli_query($db, $totalGoldQuery);
$totalGold = mysqli_fetch_assoc($gRes);
print_r($totalGold);
$selq= "SELECT * FROM tb_user_gold_transation WHERE is_approved = 0 AND action='withdrawl' AND user_id = {$row['user_no']}";
$wres = mysqli_query($db, $selq);
$wdrqno = mysqli_num_rows($wres);

?> 
<!-- Main Sidebar Container -->
<?php include('common/sidebar.php'); ?>

<style>
    /* Loading overlay */
    .loading {
        pointer-events: none; /* Disable user interactions */
    }
    #loadingOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        color: white;
    }
    
    #h4
    {
        font-size: 16px;
        color: DarkRed;
        font-weight: 400;
    }
     #h3
    {
        font-size: 16px;
        color: MidnightBlue;
         font-weight: 400;
    }
     #h2
    {
        font-size: 18px;
        color: DarkRed;
         font-weight: 400;
    }
       #h5
    {
        font-size: 18px;
        color: #4b0082;
         font-weight: 500;
         text-align: center;
    }

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

 SAVE MORE GOLD
</div>




    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="mx-auto 
            ; max-height: 100%; max-height: 100%; " style="width: 100%; >
                    <label  class="" id="h5">  Today's DIGITANZO gold(24K) Market price</label>
                       

                       
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                       
                        <?php
                        $price_24k = get_todays_price();
                        $prices = convert_currency($price_24k, 'USD', 'USD,LKR,INR,GBP');
                        var_dump($prices);
                        die;
                        ?>
                        <div class="col-lg-3 d-flex align-items-stretch">
                            <h4 id="h4"> LKR <?= format_amount($prices['LKR']) ?>/g</h4>
                        </div>
                        <div class="col-lg-3 d-flex align-items-stretch">
                            <h4 id="h4">USD <?= format_amount($prices['USD']) ?>/g</h4>
                        </div>
                        <div class="col-lg-3 d-flex align-items-stretch">
                            <h4 id="h4">INR <?= format_amount($prices['INR']) ?>/g</h4>
                        </div>
                         <div class="col-lg-3 d-flex align-items-stretch">
                            <h4 id="h4">GBP <?= format_amount($prices['GBP']) ?>/g</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
	
	
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                   
                        <div class="col auto">
                            <h4 id="h3">Total Balance</h4>
                        </div>
                        <div class="col auto">
                            <h4 id="h2"><?= format_amount($row['user_savings']) ?> LKR</h4>
                             
                        </div>
                
                      
                    </div>
                </div>
            </div>
            
            
            
            <div class="col-6">
                <div class="card">
                    <div class="card-body d-flex justify-content-between">
                        <div class="col auto">
                            <h4 id="h3">Gold(24K) Balance</h4>
                        </div>
                        <div class="col auto">
                            <h4 id="h2"><?= format_amount($totalGold['netGoldBalance']) ?> g</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
<div class="h4 pb-2 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

 CALCULATE
</div>
    <form>
	<div class="form-row align-items-center">
		<div class="col-sm-3 my-1 class="mx-auto" style="width: 100%;">
		 
			<input type='text' class="form-controll mt-3 col auto"  maxlength="10" placeholder="Enter Amount In LKR" id="amountEntered">
		</div>
	
		   	<div class="col my-1">
			<h4 class="col" id="h3">Gold(24K)</h4>
				<span id='calculatedGold'>0.0000 g</span>
		</div>
		  <div class="col ">
                                <h4 id="h3">USD</h4>
                                <span id='calculatedUsd'>0.0000</span>/g
                            </div>
                             <div class="col ">
                                <h4 id="h3">INR</h4>
                                <span id='calculatedInr'>0.0000</span>/g
                            </div>
                             <div class="col ">
                               <h4 id="h3">GBP</h4>
                                <span id='calculatedGbp'>0.0000</span>/g
                            </div>
                            
	</div>
</form>
          
	</div>  
	</div>
    
         
        
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                   
                </div>
            </div>
            <div class="col-12">
                <div class="">
                    <div class="">
                        <div class="row">
                             <div class="col-4 auto center">
                         <a href  = "addfund.php?id=<?= $row['user_rec_id']; ?>" class = 'btn btn-primary btn-primary'  name=''  title = '' align="center">ADD FUNDS</a> 
     
                          </div>
                            <div class="col-4 auto center">
                                 <button class="btn btn-primary btn-primary " data-toggle="modal" data-target="#buyModal">Buy Now</button>
                                 </div>
                                 <div class="col-4 auto center">
                                <button class="btn btn-success " data-toggle="modal" data-target="#withdrawModal" <?= $wdrqno?'disabled':'' ?>>Withdraw</button>
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <br><br>
        <?php require_once 'savegoldlist.php';?>

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- Modal -->
<?php require_once 'savegoldbuymodal.php' ?>;
<?php 
    if(!$wdrqno) {
        require_once 'savegoldwithdrawlmodal.php';
    }
?>
<div id="loadingOverlay" style="display: none;">Loading...</div>

<script>
    $(document).ready(function () {
        $('#amountEntered').keyup(function () {
            let amount = $(this).val();
            let goldRateLkr = <?= $prices['LKR'] ?>;
            let goldRateUsd = <?= $prices['USD'] ?>;
            let goldRateInr = <?= $prices['INR'] ?>;
            let goldRateGbp = <?= $prices['GBP'] ?>;
            let goldInGrams = amount / goldRateLkr;
            $('#calculatedGold').text(formatAmount(goldInGrams) + ' g');
            $('#calculatedUsd').text(formatAmount(goldInGrams * goldRateUsd));
            $('#calculatedInr').text(formatAmount(goldInGrams * goldRateInr));
            $('#calculatedGbp').text(formatAmount(goldInGrams * goldRateGbp));
        });

        $('#buyingAmount').keyup(function () {
            let amount = $(this).val();
            let goldRateLkr = <?= $prices['LKR'] ?>;
            let goldInGrams = amount / goldRateLkr;
            $('#buyingGold').val(formatAmount(goldInGrams));
        });

        $('#buyModal').on('show.bs.modal', function (e) {
            $('#buyingAmount').val($('#amountEntered').val()).trigger('keyup');
        });

        $('#buyGoldForm, #withdrawGoldForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('action', $(this).attr('id') == 'buyGoldForm' ? 'buyGold' : 'withdrawGold');
            $('body').addClass('loading');
            $('#loadingOverlay').show();
            $.ajax({
                type: 'POST',
                url: 'handlegoldaction',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {
                    $('body').removeClass('loading');
                    $('#loadingOverlay').hide();
                    $('#buyModal').modal('hide');
                    $('#withdrawModal').modal('hide');
                    console.log(response.success);
                    if (response.success == 1) {
                        if (!alert(response.msg)) {
                            window.location.reload();
                        }
                    } else {
                        if (response.error && response.error != '') {
                            alert(response.error);
                        } else {
                            alert('There is some error!');
                        }
                    }
                },
                error: function (xhr, status, error) {
                    $('body').removeClass('loading');
                    $('#loadingOverlay').hide();
                    $('#buyModal').modal('hide');
                    $('#withdrawModal').modal('hide');
                }
            });
        });

    });

    function formatAmount(balance) {
        var formattedBalance = parseFloat(balance).toString();
        var decimalIndex = formattedBalance.indexOf('.');
        if (decimalIndex !== -1 && formattedBalance.length - decimalIndex > 5) {
            formattedBalance = formattedBalance.slice(0, decimalIndex + 5);
        }
        return formattedBalance;
    }

    $('#buyingAmount, #amountEntered,#withdrawingAmount').keypress(function (event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }

        let maxLength = 15; // Maximum allowed length
        if ($(this).val().length > maxLength) {
            $(this).val($(this).val().slice(0, maxLength));
        }
    });

    $(document).on('click', '.alert-ok', function () {
        window.location.reload();
    });

</script>

<?php include('common/footer.php'); ?>