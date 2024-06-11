<?php
session_start();
include "common/config.php";
$userId = $_SESSION['userid'];
$userName = $_SESSION['username'];
if($userName == 'admin'){echo "Done";}else {
    if ($userId) {
        $checkIdentitySql = "SELECT * FROM user_identity where user_rec_id = '$userId' AND status = '1'";
        $checkIdentityResult = mysqli_query($db, $checkIdentitySql);
        $checkIdentityFetch = mysqli_fetch_assoc($checkIdentityResult);
    }
    if ($checkIdentityFetch != null) {
        echo "Done";
    } else {
        echo "Not";
    }
}
?>