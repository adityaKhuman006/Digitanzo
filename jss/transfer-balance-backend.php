<?php
include_once "common/config.php";
session_start();
$userId = $_SESSION['userid'];
$getUserCurrentBalanceSql = "SELECT * FROM  tb_user WHERE user_rec_id = '$userId'";
$getUserCurrentBalanceResult = mysqli_query($db, $getUserCurrentBalanceSql);
$getUserCurrentBalanceFetch = mysqli_fetch_assoc($getUserCurrentBalanceResult);
if (isset($_POST['submit-transfer-balance'])) {
    $transferBalance = $_POST['transfer-balance'];
    $transferToRegId = $_POST['transfer_to'];
    $chekToRegIdSql = "SELECT * FROM tb_user WHERE user_rec_id = '$transferToRegId'";
    $chekToRegIdResult = mysqli_query($db,$chekToRegIdSql);
    if ($transferBalance > $getUserCurrentBalanceFetch['user_money']) {
        $_SESSION['error-transfer-balance'] = "You don't have enough balance";
    } elseif(mysqli_num_rows($chekToRegIdResult)  > 0) {
        $transferBalanceFromSql = "UPDATE tb_user SET user_money = user_money - '$transferBalance' WHERE user_rec_id = '$userId'";
        $transferBalanceFromResult = mysqli_query($db, $transferBalanceFromSql);

        $transferBalanceSql = "UPDATE tb_user SET user_money = user_money + '$transferBalance' WHERE user_rec_id = '$transferToRegId'";
        $transferBalanceResult = mysqli_query($db, $transferBalanceSql);

        if ($transferBalanceResult && $transferBalanceFromResult) {
            $_SESSION['error-transfer-balance'] = "Transfer successful";
        }
    }else{
        $_SESSION['error-transfer-balance'] = "User not found";
    }
}
header("Location:transfer-balance.php");
?>