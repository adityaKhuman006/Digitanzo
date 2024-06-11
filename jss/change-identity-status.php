<?php
include_once "common/config.php";
session_start();
$id = $_GET['id'] ?? '';
$status = $_GET['status'] ?? '';

if($id != '' && $status != ''){
    $updateStatusSql = "UPDATE user_identity SET status = '$status' WHERE id = $id";
    mysqli_query($db,$updateStatusSql);
}

header("Location:approve-identity.php");
?>