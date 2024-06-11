<?php
session_start();
$user_name = $_SESSION['username'] ?? null;
$temp = array();
include "common/config.php";
//    ini_set('display_errors', 1);
//    ini_set('display_startup_errors', 1);
//    error_reporting(E_ALL);

$sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
$selquery = mysqli_query($db, $sel_rec_tem);
$user = mysqli_fetch_assoc($selquery);

if (mysqli_num_rows($selquery) !== 1) {
    echo "ERROR";
    die;
}

if (isset($_POST["action"]) && $_POST["action"] == 'buyGold') {
    $post = $_POST;
    if ($post['buyingAmount'] < 5000) {
        echo json_encode(['success' => 0, 'error' => 'Min. saving Gold is LKR 5,000']);
        die;
    }
    if (($user['user_savings'] - $post['buyingAmount']) < 0) {
        echo json_encode(['success' => 0, 'error' => 'You dont have enough balance to buy gold']);
        die;
    }
    $sql = "INSERT INTO tb_user_gold_transation(user_id, action, gold_in_grams, buying_amount, current_gold_price_in_lkr, current_gold_price_in_usd) 
            VALUES({$user['user_no']}, 'buy', {$post['buyingGold']}, {$post['buyingAmount']}, {$post['current_gold_price_in_lkr']}, {$post['current_gold_price_in_usd']})";
    $result = mysqli_query($db, $sql);
    if (!$result) {
        echo json_encode(['success' => 0]);
    } else {
        $sql = "UPDATE tb_user set user_savings = user_savings - {$post['buyingAmount']} where user_no = {$user['user_no']}";
        mysqli_query($db, $sql);
        if (!$result) {
//            echo "Error: " . mysqli_error($db);
            echo json_encode(['success' => 0]);
        } else {
            // $name = 'Admin';
            $email = 'digitanzogold@gmail.com';//admin email
            $subject = 'Gold buying request';
            $content = 'One buying request has been submitted for the approval';
            $toEmail = $user['email'];

            // $headers = "From: " . 'Toemail' . "<". 'Toemail' .">\r\n";
            $mailHeaders = "From: " . 'Digitanzo' . "<" . $email . ">\r\n";
            mail($toEmail, $subject, $content, $mailHeaders);
            mail($email, $subject, $content, $mailHeaders);

            echo json_encode(['success' => 1, 'msg' => 'Gold bought successfully! Thank you !']);
        }
        // echo json_encode(['success' => 1, 'msg' => 'Gold bought successfully!']);
    }
}

if (isset($_POST["action"]) && $_POST["action"] == 'sellGold') {
    $post = $_POST;
    $totalGoldQuery = "SELECT
    COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) AS totalBoughtGold,
    COALESCE(SUM(CASE WHEN action = 'withdrawl' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS totalWithdrawlGold,
    COALESCE(SUM(CASE WHEN action = 'sell' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS totalSellGold,
    COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) -
    COALESCE(SUM(CASE WHEN action = 'withdrawl' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) -
    COALESCE(SUM(CASE WHEN action = 'sell' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS netGoldBalance
FROM
    tb_user_gold_transation
WHERE 
    user_id = {$user['user_no']}";
    $gRes = mysqli_query($db, $totalGoldQuery);
    $totalGold = mysqli_fetch_assoc($gRes);

    if ($totalGold['netGoldBalance'] <  $post['sell_gold']) {
        echo json_encode(['success' => 0, 'error' => 'You dont have enough balance to buy gold']);
        die;
    }
    $sql = "INSERT INTO tb_user_gold_transation(user_id, action, gold_in_grams, buying_amount, current_gold_price_in_lkr, current_gold_price_in_usd) 
            VALUES({$user['user_no']}, 'sell', {$post['sell_gold']}, {$post['sell_amount']}, {$post['current_gold_price_in_lkr']}, {$post['current_gold_price_in_usd']})";
    $result = mysqli_query($db, $sql);
    if (!$result) {
        echo json_encode(['success' => 0]);
    } else {
        $sql = "UPDATE tb_user set user_savings = user_savings + {$post['sell_amount']} where user_no = {$user['user_no']}";
        mysqli_query($db, $sql);
        if (!$result) {
//            echo "Error: " . mysqli_error($db);
            echo json_encode(['success' => 0]);
        } else {
            // $name = 'Admin';
            $email = 'digitanzogold@gmail.com';//admin email
            $subject = 'Gold buying request';
            $content = 'One buying request has been submitted for the approval';
            $toEmail = $user['email'];

            // $headers = "From: " . 'Toemail' . "<". 'Toemail' .">\r\n";
            $mailHeaders = "From: " . 'Digitanzo' . "<" . $email . ">\r\n";
            mail($toEmail, $subject, $content, $mailHeaders);
            mail($email, $subject, $content, $mailHeaders);

            echo json_encode(['success' => 1, 'msg' => 'Gold sell successfully! Thank you !']);
        }
        // echo json_encode(['success' => 1, 'msg' => 'Gold bought successfully!']);
    }
}


if (isset($_POST["action"]) && $_POST["action"] == 'withdrawGold') {
    $post = $_POST;
    if (!in_array($post['withdrawingGold'], [8, 40, 80, 320, 400, 600, 1000])) {
        echo json_encode(['success' => 0, 'error' => 'Withdrawing gold is not valid']);
        die;
    }

    $totalGoldQuery = "SELECT
            COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) - COALESCE(SUM(CASE WHEN action = 'withdrawl' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS netGoldBalance
        FROM
            tb_user_gold_transation
        WHERE 
            user_id = {$user['user_no']}";
    $gRes = mysqli_query($db, $totalGoldQuery);
    $totalGold = mysqli_fetch_assoc($gRes);

    if (($totalGold['netGoldBalance'] - $post['withdrawingGold']) < 0) {
        echo json_encode(['success' => 0, 'error' => 'Your gold balance is leser than the requesting gold for withdrawl']);
        die;
    }
    $sql = "INSERT INTO tb_user_gold_transation(user_id, action, gold_in_grams, buying_amount, current_gold_price_in_lkr, current_gold_price_in_usd) 
            VALUES({$user['user_no']}, 'withdrawl', {$post['withdrawingGold']}, 0, {$post['current_gold_price_in_lkr']}, {$post['current_gold_price_in_usd']})";
    $result = mysqli_query($db, $sql);
    if (!$result) {
//            echo "Error: " . mysqli_error($db);
        echo json_encode(['success' => 0]);
    } else {
        $name = 'DIGITANZO';
        $email = 'digitanzogold@gmail.com';//admin email
        //$email1 = $email;
        $subject = 'Gold withdrawl request';
        $content = 'Congratulations!!! We received your Real Gold request, admin will contact you within 2 working days. Thank You.';
        $toEmail = "email";

        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        mail($toEmail, $subject, $content, $mailHeaders);
        mail($email, $subject, $content, $mailHeaders);
        //mail($email, $subject, $content, $mailHeaders);

        echo json_encode(['success' => 1, 'msg' => 'Gold withdrwal successfully! We will update within 2 working Days. Thank you !']);
    }
}

if (isset($_GET["gwa"])) {
    if ($user['user_name'] != 'admin') {
        $_SESSION['gwa_msg'] = 'Invalid request';
        header('location: dashboard.php');
        die;
    }

    $selq = "SELECT * FROM tb_user_gold_transation WHERE md5(id) = '{$_GET["gwa"]}' and is_approved=0 AND action='{$_GET['action']}'";
    $res = mysqli_query($db, $selq);

    if (mysqli_num_rows($res) == 1) {
        $selq = "UPDATE tb_user_gold_transation SET is_approved=1 WHERE md5(id) = '{$_GET["gwa"]}'";
        mysqli_query($db, $selq);
        if($_GET['action'] == 'sell')
            $_SESSION['gwa_msg'] = 'Sell approved.';
        else
        $_SESSION['gwa_msg'] = 'Withdrawal approved.';

        header('location: dashboard.php');
    } else {
        $_SESSION['gwa_msg'] = 'Record not found.';
        header('location: dashboard.php');
    }

}
if (isset($_GET["gwc"])) {
    if ($user['user_name'] != 'admin') {
        $_SESSION['gwa_msg'] = 'Invalid request';
        header('location: dashboard.php');
        die;
    }
    $selq = "SELECT * FROM tb_user_gold_transation WHERE md5(id) = '{$_GET["gwc"]}' and is_approved=0 AND action='{$_GET['action']}'";
    $res = mysqli_query($db, $selq);

    if (mysqli_num_rows($res) == 1) {
        $selq = "UPDATE tb_user_gold_transation SET is_approved=2 WHERE md5(id) = '{$_GET["gwc"]}'";
        mysqli_query($db, $selq);
        if($_GET['action'] == 'sell')
            $_SESSION['gwa_msg'] = 'Sell Canceled.';
        else
            $_SESSION['gwa_msg'] = 'Withdrawal Canceled.';

        header('location: dashboard.php');
    } else {
        $_SESSION['gwa_msg'] = 'Record not found.';
        header('location: dashboard.php');
    }

}
?>