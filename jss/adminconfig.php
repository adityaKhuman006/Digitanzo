<?php
$currentpage = "adminconfig";
include "common/header.php";
?>
<!-- /.navbar -->
<?php
include "common/config.php";
$user_name = $_SESSION['username'];

if($user_name != 'admin') {
    header('location: dashboard.php');
}

$sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
$selquery = mysqli_query($db, $sel_rec_tem);
$user = mysqli_fetch_assoc($selquery);

$selq= "SELECT * FROM tb_admin_config WHERE config_name = 'commission'";
$res = mysqli_query($db, $selq);
$rowc = mysqli_fetch_assoc($res);
$commission_config = json_decode($rowc['value'], true);

?> 
<!-- Main Sidebar Container -->
<?php include('common/sidebar.php'); ?>

<div class="col" style="text-align: center; margin-top: 30px">
    <img src="img/logo.png">
</div>
<style>
fieldset.commissions {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.commissions {
    font-size: 1.2em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0 10px;
    border-bottom:none;
}
</style>
<div class="content-wrapper">
    <section class="content pt-4 col-sm-5">
        <form method="post" action="adminconfigsave.php">
            <fieldset class="commissions">
                <legend class="commissions">Commissions</legend>
                <div class="form-group row">
                    <label for="inputLKR" class="col-sm-2 col-form-label">LKR </label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="inputLKR" name="commission[LKR]" required value="<?= $commission_config['LKR']??0;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputUSD" class="col-sm-2 col-form-label">USD </label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="inputUSD" name="commission[USD]" required value="<?= $commission_config['USD']??0;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputINR" class="col-sm-2 col-form-label">INR </label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="inputINR" name="commission[INR]" required value="<?= $commission_config['INR']??0;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputGBP" class="col-sm-2 col-form-label">GBP </label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="inputGBP" name="commission[GBP]" required value="<?= $commission_config['GBP']??0;?>">
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-12 text-right">
                    <input type="submit" value="save" class="btn btn-primary">
                </div>
            </div>
        </form>
    </section>
</div>

<script>
    <?php if(isset($_SESSION['success_msg'])): ?>
        alert("<?= $_SESSION['success_msg'];?>");
        <?php unset($_SESSION['success_msg']); ?>
    <?php endif;?>
</script>
<?php include('common/footer.php'); ?>

