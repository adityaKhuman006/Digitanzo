<?php
session_start();
include "common/config.php";
if(isset($_POST['deduct-amount'])){
    $deductAmount = $_POST['deduct-amount'];
    $updateDeductAmount = "UPDATE `deducted-gold` SET deduct_amount = '$deductAmount' WHERE id = '1'";
    mysqli_query($db,$updateDeductAmount);
}
header('Location: gold-price.php');
?>