<?php
session_start();
include "common/config.php";
$user_name = $_SESSION['username'];

if($user_name != 'admin') {
    header('location: dashboard.php');
}

$sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
$selquery = mysqli_query($db, $sel_rec_tem);
$user = mysqli_fetch_assoc($selquery);

$commission_config_value = json_encode($_POST['commission']);
$selq = "UPDATE tb_admin_config SET value = '{$commission_config_value}', updating_user_id = {$user['user_no']} WHERE config_name = 'commission'";
$res = mysqli_query($db, $selq);
if (!$res) {
    echo "Error: " . mysqli_error($db);
    die;
} else {
    $_SESSION['success_msg'] = 'Config updated';
}
header('location: adminconfig.php');

?>