<?php
include "common/config.php";
if(isset($_POST['id']) && $_POST['id'] != ''){
    $id = $_POST['id'];
    $selectUserDetailsSql = "SELECT * FROM tb_user WHERE user_rec_id = '$id'";
    $selectUserDetailsResult =  mysqli_query($db,$selectUserDetailsSql);
    $checkUserExist = mysqli_num_rows($selectUserDetailsResult);
    if($checkUserExist > 0){
        $userDetails = mysqli_fetch_assoc($selectUserDetailsResult);
        echo json_encode($userDetails);
    }else{
        echo json_encode(['error' => 'Please enter the correct reference number']);    }
}else{
    echo json_encode(['error' => 'Please enter a reference number']);
}
?>