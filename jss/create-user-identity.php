<?php
include_once "common/config.php";
session_start();
$user_name = $_SESSION['username'] ?? null;
$sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
$selquery = mysqli_query($db, $sel_rec_tem);
$user = mysqli_fetch_assoc($selquery);
if (isset($_POST['submit-identity']) && isset($_SESSION['userid'])) {
        $userId = $_SESSION['userid'];
        $target_dir = "identitys/";
        $target_file1 = $target_dir . basename($_FILES['image-1']["name"]);
        $target_file2 = $target_dir . basename($_FILES['image-2']["name"]);

        $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

        $extensions_arr = array("jpg", "jpeg", "png");
        if (in_array($imageFileType1, $extensions_arr) && in_array($imageFileType2, $extensions_arr)) {
            // Generate a unique name for the image
            $unique_name1 = uniqid() . '.' . $imageFileType1;
            $isUploaded = move_uploaded_file($_FILES['image-1']['tmp_name'], 'identitys/' . $unique_name1);

            $unique_name2 = uniqid() . '.' . $imageFileType2;
            $isUploaded = move_uploaded_file($_FILES['image-2']['tmp_name'], 'identitys/' . $unique_name2);
            if ($isUploaded && $_POST['submit-type'] == 'create') {
                $insertSql = "INSERT INTO user_identity(user_rec_id,img1,img2) VALUES('$userId','$unique_name1','$unique_name2')";
                mysqli_query($db, $insertSql);
                $email = 'digitanzogold@gmail.com';
                $subject = 'Gold buying request';
                $content = 'One identity  request has been submitted for the approval';
                $toEmail = $user['email'];

                $mailHeaders = "From: " . 'Digitanzo' . "<" . $email . ">\r\n";
                mail($toEmail, $subject, $content, $mailHeaders);
                mail($email, $subject, $content, $mailHeaders);
            }else if($isUploaded && $_POST['submit-type'] == 'update'){
                $updateId = $_POST['update-id'];
                $updateSql = "UPDATE user_identity SET img1 = '$unique_name1',img2 = '$unique_name2',status = '2'  where id ='$updateId'";
                mysqli_query($db, $updateSql);
                $email = 'digitanzogold@gmail.com';
                $subject = 'Gold buying request';
                $content = 'One identity  request has been submitted for the approval';
                $toEmail = $user['email'];

                $mailHeaders = "From: " . 'Digitanzo' . "<" . $email . ">\r\n";
                mail($toEmail, $subject, $content, $mailHeaders);
                mail($email, $subject, $content, $mailHeaders);
            }

        } else {
            die('Sorry this file is not allowed');
        }
}

header("Location:identicard.php");
?>