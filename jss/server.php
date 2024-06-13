<?php
include_once "common/config.php";

if (isset($_POST['but_upload'])) {
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Convert to base64
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

        // Insert record
        $query = "insert into images(name,image) values('" . $name . "','" . $image . "')";

        mysqli_query($db, $query);

        message("Registration success!");
        //header('location: login.php');

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $name);

    }

}
?>
<?php
session_start();
// variable declaration
$userid = "";
$errors = array();
$_SESSION['success'] = "";
include_once "common/config.php";
//DELETE USER
if (isset($_POST['del'])) {
    $user_no = $_REQUEST['id'];
    message('$user_no');
    $delquery = "UPDATE tb_user SET user_isdel = '1' WHERE user_no='$user_no' and user_isdel = '0'";
    mysqli_query($db, $delquery);

    message("The User is deleted!");
    header('location: edit.php');
}
//EDIT USER
if (isset($_POST['edit_user'])) {
    $user_no = mysqli_real_escape_string($db, $_POST['id']);
    //$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $user_pwd = mysqli_real_escape_string($db, $_POST['user_pwd']);

    $recomend = mysqli_real_escape_string($db, $_POST['rec_id']);
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phonenum = mysqli_real_escape_string($db, $_POST['phonenum']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $street = mysqli_real_escape_string($db, $_POST['street']);

    $user_pwd = md5($user_pwd);//encrypt the password before saving in the database
    //user_rec_id ='$recomend',
    $editquery = "UPDATE tb_user SET   user_name='$username', user_pwd='$user_pwd', user_phone='$phonenum', email = '$country', user_city ='$city', user_district = '$street' WHERE user_no=$user_no";

    mysqli_query($db, $editquery);

    message("The UserInfo is changed!");
    header('location: edit.php');
}

//EDIT payment
if (isset($_POST['edit_payment'])) {
    $user_no = mysqli_real_escape_string($db, $_POST['id']);
    $recomend = mysqli_real_escape_string($db, $_POST['recid']);
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $user_payment = mysqli_real_escape_string($db, $_POST['phonenum']);
    // $country = mysqli_real_escape_string($db, $_POST['country']);
    // $city = mysqli_real_escape_string($db, $_POST['city']);
    // $street = mysqli_real_escape_string($db, $_POST['street']);

    // $password = md5($password_1);//encrypt the password before saving in the database
    $editquery = "UPDATE tb_user SET user_name='$username', 
		              user_payment=(user_payment + $user_payment), user_rec_id = '$recomend', 
		              user_rec_name = '$recname' WHERE user_no='$user_no'";
    mysqli_query($db, $editquery);
    message("The UserInfo is changed!");
    header('location: edit.php');
}

//EDIT paymentc
if (isset($_POST['edit_paymentc'])) {
    $user_no = mysqli_real_escape_string($db, $_POST['id']);
    $recomend = mysqli_real_escape_string($db, $_POST['recid']);
    $regid = mysqli_real_escape_string($db, $_POST['recid']);
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $username = mysqli_real_escape_string($db, $_POST['user_name']);
    $user_payment = mysqli_real_escape_string($db, $_POST['phonenum']);
    //$refnum = mysqli_real_escape_string($db, $_POST['refnum']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    // $city = mysqli_real_escape_string($db, $_POST['city']);
    // $street = mysqli_real_escape_string($db, $_POST['street']);

    // $password = md5($password_1);//encrypt the password before saving in the database
    $query = "SELECT user_reg_id from tbl_reg where user_reg_id='$recomend'";

//	echo($username);
//	exit;

    //$query = "SELECT user_name FROM tbl_reg WHERE user_name = '$username'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        //exit;
        //$_SESSION['message'] = "User Name Already Exists!";
        //$message = "User Name Already Exists!";
        //$_SESSION['message'] = $message;
        message("User ID Already Exists!");
        //header('location: login.php');			//header("location:registerform.php");
    } else {

        $query = "UPDATE tbl_reg SET user_name='$username', 
		              user_payment=$user_payment, user_reg_id = '$regid', 
		              user_rec_name = '$recname' WHERE user_no='$user_no'";
        mysqli_query($db, $query);


        message("The UserInfo is changed!");
        header('location: edit.php');
    }
}

// send payment mail and link


if (isset($_POST['payment_mail'])) {
    $user_no = mysqli_real_escape_string($db, $_POST['id']);
    $recomend = mysqli_real_escape_string($db, $_POST['recid']);
    $regid = mysqli_real_escape_string($db, $_POST['recid']);
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $username = mysqli_real_escape_string($db, $_POST['user_name']);
    $user_payment = mysqli_real_escape_string($db, $_POST['phonenum']);
    $user_rec_id = mysqli_real_escape_string($db, $_POST['oldrecid']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    // $city = mysqli_real_escape_string($db, $_POST['city']);
    // $street = mysqli_real_escape_string($db, $_POST['street']);

    // $password = md5($password_1);//encrypt the password before saving in the database
    $query = "SELECT * from tbl_reg where user_reg_id='$recomend'";

    mysqli_query($db, $query);

    $name = 'DIGITANZO';
    $email = "$email";//admin email
    $subject = "$username";
    $content = "Welcome! \nclick the below link and create your password.: \nhttps://digitanzo.lk/jss/registerconfirm.php?id=$user_rec_id \r\n\nThank you \nDIGITANZO (PVT) LTD.";
    $toEmail = $user['email'];

    $mailHeaders = "From: " . $name . "<" . digitanzo . ">\r\n";
    mail($toEmail, $subject, $content, $mailHeaders);
    mail($email, $subject, $content, $mailHeaders);


    message("The UserInfo is changed!");
    header('location: edit.php');


}

//Update Add Fund

if (isset($_POST['edit_paymentca'])) {
    $user_no = mysqli_real_escape_string($db, $_POST['id']);
    $recomend = mysqli_real_escape_string($db, $_POST['recid']);
    $regid = mysqli_real_escape_string($db, $_POST['recid']);
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $username = mysqli_real_escape_string($db, $_POST['user_name']);
    $user_savings = mysqli_real_escape_string($db, $_POST['user_payment']);
    //$refnum = mysqli_real_escape_string($db, $_POST['refnum']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    // $city = mysqli_real_escape_string($db, $_POST['city']);
    // $street = mysqli_real_escape_string($db, $_POST['street']);
    $h_id = "1";

    // $password = md5($password_1);//encrypt the password before saving in the database
    $query = "SELECT * from payment where  user_name = '$user_name'";

    //$query = "SELECT user_name FROM tbl_reg WHERE user_name = '$username'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
//	echo($username);
//	exit;

    $query = "UPDATE tb_user SET user_savings = user_savings + $user_savings  WHERE  user_name = '$username'";

    mysqli_query($db, $query);
    //	message("The UserInfo is changed!");
    //	header('location: adfundview.php');

    $query = "UPDATE payment SET h_id = $h_id  WHERE  user_no = '$user_no'";


    //	echo($h_id);
    //	echo($user_no);
    //	exit;
    mysqli_query($db, $query);

    $name = 'DIGITANZO';
    $email = "$email";//admin email
    $subject = 'Add Fund Approved.';
    $content = "Congratulation! \nWe added your fund LKR " . $user_savings . " in your save gold account. \r\n\nThank you \nDIGITANZO (PVT) LTD.";
    $toEmail = $user['email'];

    $mailHeaders = "From: " . $name . "<" . digitanzo . ">\r\n";
    mail($toEmail, $subject, $content, $mailHeaders);
    mail($email, $subject, $content, $mailHeaders);


    //	message("The UserInfo is changed!");
    header('location: dashboard.php');
}

//EDIT withdrawalc
if (isset($_POST['edit_wd'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);

    $user_payment = mysqli_real_escape_string($db, $_POST['perm']);
    // $country = mysqli_real_escape_string($db, $_POST['country']);
    // $city = mysqli_real_escape_string($db, $_POST['city']);
    // $street = mysqli_real_escape_string($db, $_POST['street']);

    // $password = md5($password_1);//encrypt the password before saving in the database
    $editquery = "UPDATE tb_wd SET admin_permission=$user_payment WHERE state='0' or state='1'";
    mysqli_query($db, $editquery);
    message("The UserInfo is changed!");
    header('location: edit.php');
}

// Register Payment

if (isset($_POST['edit_payments'])) {

// Escape user inputs for security
    $recname = mysqli_real_escape_string($db, $_POST['username']);
    $regid = mysqli_real_escape_string($db, $_POST['recid']);
    $username = mysqli_real_escape_string($db, $_POST['recname']);


// Attempt insert query execution
//$sql = "INSERT INTO tb_user (user_name, user_reg_id, user_rec_name) VALUES ('$recname', '$regid', '$username')";
//mysqli_query($db, $sql);
//		message("The Registration Payment!");
    //header('location: edit.php');


}
// payment collect money
if (isset($_POST['pay_re'])) {
    // //echo ('1<br>');
    // receive all input values from the form
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $s_id = mysqli_real_escape_string($db, $_POST['s_id']);
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);


//Get the content of the image and then add slashes to it
//$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $query = "SELECT phone from payment where phone='$phone'";

    //$query = "SELECT user_name FROM tbl_reg WHERE user_name = '$username'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {

        //	exit;
        //	echo ('3<br>');
        //  exit;
        //	$_SESSION['message'] = "User Name Already Exists!";
        //	$message = "User Name Already Exists!";
        //$_SESSION['message'] = $message;
        message("The Phone Number Already Exists!");
        header('location: login.php');            //header("location:registerform.php");
        $query = "SELECT phone from payment where fullname='$phone'";

        //$query = "SELECT user_name FROM tbl_reg WHERE user_name = '$username'";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);
    } else {
        //$password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO payment (fullname, address, city, phone) 
						  VALUES( '$fullname', '$address', '$city','$phone')";

        mysqli_query($db, $query);
        //exit();

        $to = 'theipanaathanpc@gmail.com';
        $subject = "$phonen";
        $message = "$fullname, $address,$city,$phone";
        $phone = "$phone";
        $from = 'vicrrampc@gmail.com';

        // Sending email
        if (mail($to, $subject, $message, $phone)) {
            //$_SESSION['message'] = $message;
            // message("We received your payment proof Details! You will receive your REFERRAL ID in 48 - 72 working hours");
            //header('location: login.php');


        } else {
            echo 'Unable to send email. Please try again.';
        }

        //$message = "Registration success!";
        //	$_SESSION['message'] = $message;
        //	Registermessage("We received your payment proof Details! You //will receive your REFERRAL ID in 48 - 72 working hours");


        header('location: thankyou.php');
        exit;
    }
}
// Register First for payment


if (isset($_POST['user_re'])) {
    // //echo ('1<br>');
    // receive all input values from the form
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $regid = mysqli_real_escape_string($db, $_POST['recid']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phonenum = mysqli_real_escape_string($db, $_POST['phonenum']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $street = mysqli_real_escape_string($db, $_POST['street']);
    $nic = mysqli_real_escape_string($db, $_POST['nic']);
    $refnum = mysqli_real_escape_string($db, $_POST['refnum']);
    //if(isset($_POST['but_upload'])){
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Convert to base64
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

        // Insert record
        // $query = "insert into images(name,image) values('".$name."','".$image."')";


        // Upload file
        // move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);
    }


//Get the content of the image and then add slashes to it
//$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

    // //echo ('2<br>');


    // //echo ('3<br>');
    //echo count($errors);exit;

    //register user if there are no errors in the form
// $query = "SELECT user_name, email, user_phone from tbl_reg where email= '$email' || user_name='$username' || user_phone='$phonenum'";
    $query = "SELECT user_name from tbl_reg where user_name='$username";
    //echo($phone up);

    //$query = "SELECT user_name FROM tbl_reg WHERE user_name = '$username'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        //exit;
        //$_SESSION['message'] = "User Name Already Exists!";
        $message = "User Name OR Email OR Phone Already Exists!";
        //$_SESSION['message'] = $message;
        message("User Name or E-Mail Already Exists!");
        header('location: login.php');            //header("location:registerform.php");
    } else {
        //$password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO tbl_reg ( user_nic, refnum, user_rec_id, user_rec_name, user_name, user_phone, email, user_city, user_district, name,image,status) 
						  VALUES( '$nic', '$refnum', '$regid','$recname','$username', '$phonenum','$email','$city', '$street', '$name', '$image',0)";
//echo($email);
//exit;
        mysqli_query($db, $query);
        //exit();

        $name = 'DIGITANZO';
        $email = "$email";//admin email
        $subject = "$username";
        $content = "Welcome to Digital Gold Network. We received your payment proof Details! You will receive your REFERRAL ID in 2 working days. \n\nThank you \nDIGITANZO (PVT) LTD.";
        // $toEmail = "theipanaathanpc@gmail.com";
        $mailHeaders = "From: " . $name . "<" . digitanzo . ">\r\n";
        // mail($toEmail, $subject, $content, $mailHeaders);
        mail($email, $subject, $content, $mailHeaders);


        $name1 = 'DIGITANZO';
        $to = 'theipanaathanpc@gmail.com';
        $subject = "New Registration";
        $message = "$refnum, $regid,$recname,$username, $phonenum,$country,$city, $street";
        //	$nic	= "$nic";
        $mailHeaders1 = "From: " . $name1 . "<" . digitanzo . ">\r\n";

        if (mail($name1, $subject, $message, $mailHeaders1)) {

        } else {
            echo 'Unable to send email. Please try again.';
        }

        header('location: thankyoupay');
        exit();
    }
}


// LOGIN USER
if (isset($_POST['con_spon'])) {
    $username = mysqli_real_escape_string($db, $_POST['recname']);
    $password = mysqli_real_escape_string($db, $_POST['recid']);
    if (empty($username)) {
        array_push($errors, "Userid is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        //	$password = md5($password);
        $sql = "SELECT * FROM tb_user WHERE user_name = '$username' AND user_rec_id = '$password'";
        $result = mysqli_query($db, $sql);
        $logininfo = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        //	$userid = $logininfo['user_rec_id'];
        ////echo ($userid);

        if ($count == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['recid'] = $password;
            if ($userid == '') {
                $userid = 'No payment user!';
            }
            $_SESSION['userid'] = $userid;
            header('location:register.php');
            //header('location: ../livedata_room_layout/index1.html');
        } else {
            //array_push($errors, "Wrong username/password combination");
            //$_SESSION['message'] = 'Incorrect username or password.';
            message("Incorrect username or password.");
            header('location:login.php');
        }
    }
}

// Add Funds

if (isset($_POST['user_res'])) {
    // //echo ('1<br>');
    // receive all input values from the form
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $user_reg_id = mysqli_real_escape_string($db, $_POST['user_reg_id']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phonenum = mysqli_real_escape_string($db, $_POST['phonenum']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $street = mysqli_real_escape_string($db, $_POST['street']);
    $nic = mysqli_real_escape_string($db, $_POST['nic']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $refnum = mysqli_real_escape_string($db, $_POST['refnum']);
    $user_payment = mysqli_real_escape_string($db, $_POST['user_payment']);
    //if(isset($_POST['but_upload'])){
    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    $pq = "SELECT * FROM payment WHERE user_reg_id = '$user_reg_id' AND h_id=0";
    $pd = mysqli_query($db, $pq);
    $pn = mysqli_num_rows($pd);

    if ($pn > 0) {
        $_SESSION['gwa_msg'] = 'Already request is pending for approval';
        header('location: addfund?id=' . $user_reg_id);
        die;
    }

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Convert to base64
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;


    }


//Get the content of the image and then add slashes to it
//$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $query = "SELECT user_name from tbl_reg where user_name='$username'";

    //	$query = "SELECT h_id FROM payment WHERE user_name = '$username'";
    //	$h_id= h_id;
    //	echo($h_id);

    $result = mysqli_query($db, $query);

    $name = "DIGITANZO";
    $email = "$email";//admin email
    $subject = 'Add Fund Request';
    $content = "We received your payment proof. The Admin will aprove your funds within 2 working days !!! \nYou will receive the mail once the admin approved, please check your spam folder if you did not receive in inbox. \n\nThank you \nDIGITANZO (PVT) LTD.";
    $toEmail = $user['email'];

    $mailHeaders = "From: " . $name . "<" . digitanzo . ">\r\n";
    mail($toEmail, $subject, $content, $mailHeaders);
    mail($email, $subject, $content, $mailHeaders);


    {
        //$password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO payment ( user_reg_id, user_nic,  user_name, user_phone, email, user_payment, name,image,status, h_id) 
						  VALUES(  '$user_reg_id','$nic', '$username', '$phonenum','$email', '$user_payment', '$name', '$image',0,0)";

        mysqli_query($db, $query);

//echo ($nic);

//echo ($username);

//echo ($user_phone);

//echo ($user_reg_id);

//echo ($user_no);

//exit;
        //exit();

        //				$name = "DIGITANZO";
        //   $email = "theipanaathanpc@gmail.com";//admin email
        //  $subject = 'Add Fund Request';
        //   $content = "Add Fund Request";
        //   $toEmail = $user['email'];

        //  $mailHeaders = "From: " . $name . "<". digitanzo .">\r\n";
        //  mail($toEmail, $subject, $content, $mailHeaders);
        //  mail($email, $subject, $content, $mailHeaders);

        $to = 'theipanaathanpc@gmail.com';
        $subject = "Add fund request";
        $message = "$nic, $refnum, $regid,$recname,$username, $phonenum,$country,$city, $street, $name";
        $nic = "$nic";
        $from = 'vicrrampc@gmail.com';

        // Sending email
        if (mail($to, $subject, $message, $nic)) {
            //$_SESSION['message'] = $message;
            // message("We received your payment proof Details! You will receive your REFERRAL ID in 48 - 72 working hours");
            //header('location: login.php');


        } else {
            echo 'Unable to send email. Please try again.';
        }

        //	$message = "Registration success!";
        //	$_SESSION['message'] = $message;
        //	message("Thank you! We received your payment proof. The Admin will aprove within 2 working days !!!");
        //header("location:registerform.php");
        //header("location: my_bank.php");
        //header("Refresh: 1; url=addfunds.php");
        header('location: paymentrcd.php');

    }
}


// LOGIN USER
if (isset($_POST['con_spon'])) {
    $username = mysqli_real_escape_string($db, $_POST['recname']);
    $password = mysqli_real_escape_string($db, $_POST['recid']);
    if (empty($username)) {
        array_push($errors, "Userid is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        //	$password = md5($password);
        $sql = "SELECT * FROM tb_user WHERE user_name = '$username' AND user_rec_id = '$password'";
        $result = mysqli_query($db, $sql);
        $logininfo = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        //	$userid = $logininfo['user_rec_id'];
        echo($userid);

        if ($count == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['recid'] = $password;
            if ($userid == '') {
                $userid = 'No payment user!';
            }
            $_SESSION['userid'] = $userid;
            header('location:register.php');
            //header('location: ../livedata_room_layout/index1.html');
        } else {
            //array_push($errors, "Wrong username/password combination");
            //$_SESSION['message'] = 'Incorrect username or password.';
            message("Incorrect username or password.");
            header('location:login.php');
        }
    }
}
// Insert Bank Details

if (isset($_POST['user_bank'])) {
    // //echo ('1<br>');
    // receive all input values from the form
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $regid = mysqli_real_escape_string($db, $_POST['recid']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phonenum = mysqli_real_escape_string($db, $_POST['phonenum']);
    $refnum = mysqli_real_escape_string($db, $_POST['refnum']);
    $nic = mysqli_real_escape_string($db, $_POST['usernic']);
    $fName = mysqli_real_escape_string($db, $_POST['fName']);
    $aNumber = mysqli_real_escape_string($db, $_POST['aNumber']);
    $bName = mysqli_real_escape_string($db, $_POST['bName']);
    $branch = mysqli_real_escape_string($db, $_POST['branch']);


    // //echo ('2<br>');


    // //echo ('3<br>');
    //echo count($errors);exit;
    //register user if there are no errors in the form
    //$password = md5($password_1);//encrypt the password before saving in the database
    $query = "SELECT ac_num from tb_bank where user_name='$username'";

    //$query = "SELECT user_name FROM tbl_reg WHERE user_name = '$username'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        //exit;
        message("User Account Already Exists!");
        header("location:registerform.php");
    } else {
        $query = "INSERT INTO tb_bank ( user_name, user_rec_id, user_rec_name,  user_phone, user_nic, ac_name,  ba_name, ac_num, branch) 
						  VALUES( '$username','$regid','$recname', '$phonenum', '$nic','$fName', '$bName','$aNumber', '$branch')";

        mysqli_query($db, $query);

        message("Thank you!");
        //header("location:registerform.php");
        //header("location: my_bank.php");
        header("Refresh: 1; url=my_bank.php");
    }
}

// Register Final
if (isset($_POST['user_final'])) {
    // //echo ('1<br>');
    // receive all input values from the form
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $regid = mysqli_real_escape_string($db, $_POST['recid']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $refnum = mysqli_real_escape_string($db, $_POST['refnum']);
    $phonenum = mysqli_real_escape_string($db, $_POST['phonenum']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $street = mysqli_real_escape_string($db, $_POST['street']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // //echo ('2<br>');

    // form validation: ensure that the form is correctly filled
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($regid)) {
        array_push($errors, "Id of Recomend is required");
    }
    // //echo ('3<br>');
    //echo count($errors);exit;
    //register user if there are no errors in the form
    //$password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO tb_user ( user_pwd, user_rec_id, user_rec_name, user_name, user_phone, email, user_city, user_district, refnum) 
						  VALUES( '$password_1', '$regid','$recname','$username', '$phonenum','$country','$city', '$street', '$refnum')";

    mysqli_query($db, $query);
    echo($refnum);
    message("Registration success!");
    //header('location: login.php');
}


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // //echo ('1<br>');
    // receive all input values from the form
    $recname = mysqli_real_escape_string($db, $_POST['recname']);
    $regid = mysqli_real_escape_string($db, $_POST['recid']);
    $regid1 = mysqli_real_escape_string($db, $_POST['regid1']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $usernic = mysqli_real_escape_string($db, $_POST['usernic']);
    $refnum = mysqli_real_escape_string($db, $_POST['refnum']);
    $phonenum = mysqli_real_escape_string($db, $_POST['phonenum']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $street = mysqli_real_escape_string($db, $_POST['street']);
    $user_payment = 1;
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // //echo ('2<br>');

    // form validation: ensure that the form is correctly filled
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    if (empty($regid)) {
        array_push($errors, "Id of Recomend is required");

    }

    $query = "SELECT user_name from tb_user where user_name='$username'";

    //$query = "SELECT user_name FROM tbl_reg WHERE user_name = '$username'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        //exit;
        //	$_SESSION['message'] = "User Name Already Exists!";
        function function_alert($message)
        {

            // Display the alert box
            //  echo "<script>alert('$message');</script>";
        }

        function_alert("User Name Already Exists!");
        header("Refresh: 1; url=login.php");
    } else {


        // //echo ('3<br>');
        //echo count($errors);exit;
        //register user if there are no errors in the form
        if (count($errors) == 0) {
            // //echo ('4<br>');
            $password = md5($password_1);//encrypt the password before saving in the database
            $check_rec_id = "SELECT user_no FROM tb_user WHERE user_rec_id ='$regid' and user_name = '$recname' and user_payment = '1' and (user_isdel = '100' or user_isdel = '0') ";
            $rec_user = mysqli_query($db, $check_rec_id);
            $count = mysqli_num_rows($rec_user);


            //echo $count;exit;
            if ($count == 1) {
                $query = "INSERT INTO tb_user ( user_pwd, user_reg_id, user_rec_id, user_rec_name,  user_name, refnum, user_nic, user_phone, email, user_city, user_district, user_payment,status, user_savings, user_money) 
						  VALUES( '$password', '$regid', '$regid1','$recname','$username', '$refnum', '$usernic', '$phonenum','$country','$city', '$street', '$user_payment', 0, 3000, 0.4000)";
                mysqli_query($db, $query);


                $dirquery = "UPDATE tb_user SET user_member=user_member+1, user_dir=user_dir+1 WHERE user_rec_id='$regid' and user_payment = '1' and (user_isdel = '0' or user_isdel = '100')";
                mysqli_query($db, $dirquery);
                //echo("-update-:<br>");
                // del and payment compare don't need
                $sel_rec_tem = "SELECT user_name, user_rec_id, user_reg_id, user_member, user_dir FROM tb_user WHERE user_rec_id = '$regid' and user_payment = '1' and (user_isdel = '0' or user_isdel ='100')";
                // del and payment compare don't need
                $selquery = mysqli_query($db, $sel_rec_tem);
                $row = mysqli_fetch_assoc($selquery);
                $reccount = mysqli_num_rows($selquery); // no need
                $rec_tmp = $row['user_rec_id'];
                $reg_tmp = $row['user_reg_id'];
                $rec_member = $row['user_member'];
                $rec_dir = $row['user_dir'];
                $recname = $row['user_name'];
                $rec_money = 0;
                $rec_level = 0;
                $total_mem = 0;
                $rec_mod = 0;
                //echo ('reg_tmp'.$reg_tmp.'<br>');
                $data = get_level_money($rec_member, $rec_dir);
                $rec_level = $data['level'];
                $rec_money = $data['money'];

                if ($rec_tmp == '33333') {
                    $dirgodquery = "UPDATE tb_user SET user_level='$rec_level', user_money='$rec_money' WHERE user_rec_id='33333'";
                    mysqli_query($db, $dirgodquery);
                }

                //echo('-1-: '.$rec_tmp.'<br>');
                $status = '1';
                $i = 0;
                while ($rec_tmp != '33333') {
                    $i = $i + 1;
                    //echo ("--------------------------".$i."-------------------------<br>");
                    //echo('-2-: '.$rec_tmp.'<br>');
                    //echo('-2-: '.$reg_tmp.'<br>');
                    if ($status == 1) {
                        $dirrecquery = "UPDATE tb_user SET user_level='$rec_level', user_money='$rec_money' WHERE user_rec_id='$rec_tmp' and user_payment = '1' and (user_isdel = '0' or user_isdel = '100')";
                        mysqli_query($db, $dirrecquery);
                        // del and payment compare don't need
                    }

                    $selec_rec_userid = "SELECT * FROM tb_user WHERE user_rec_id ='$reg_tmp' and user_payment = '1' and (user_isdel = '0' or user_isdel = '100')";
                    $selrecquery = mysqli_query($db, $selec_rec_userid);
                    $recrow = mysqli_fetch_assoc($selrecquery);
                    $rec_count = mysqli_num_rows($selrecquery);
                    $rec_tmp = $recrow['user_rec_id'];
                    $reg_tmp = $recrow['user_reg_id'];
                    $rec_member = $recrow['user_member'] + 1;
                    $rec_dir = $recrow['user_dir'];
                    //$rec_id = $recrow['user_id'];
                    $rec_money = 0;
                    $rec_level = 0;
                    $total_mem = 0;
                    $rec_mod = 0;

                    //echo('-3-: '.$rec_tmp.'<br>');
                    //echo('-3-member: '.$rec_member.'<br>');
                    //echo('-3-dir: '.$rec_dir.'<br>');
                    $data = get_level_money($rec_member, $rec_dir);
                    $rec_level = $data['level'];
                    $rec_money = $data['money'];
                    //echo('-4-: '.$rec_tmp.'<br>');
                    //echo('-4-level: '.$rec_level.'<br>');
                    //echo('-4-money: '.$rec_money.'<br>');
                    $dirreccquery = "UPDATE tb_user SET user_member=user_member+1 ,user_level='$rec_level', user_money='$rec_money' WHERE user_rec_id='$rec_tmp' and user_payment = '1' and ( user_isdel = '0' or user_isdel = '100')";
                    mysqli_query($db, $dirreccquery);
                    $status = '0';


                    //echo ($status);
                }


                function function_alert($message)
                {


                }

            }

            header("Location: conguratulations.php");

        } else {
            //echo("There are no registered recommender");
            message('There is no registered recommender.');
        }

    }
}

// ...
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (count($errors) == 0) {
        $password = md5($password);
        $sql = "SELECT * FROM tb_user WHERE user_name = '$username' AND user_pwd = '$password'";
        $result = mysqli_query($db, $sql);
        $logininfo = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        $userid = $logininfo['user_rec_id'];
        if ($count == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            if ($userid == '') {
                $userid = 'No payment user!';
            }
            $_SESSION['userid'] = $userid;
            header('location:dashboard.php');
            //header('location: ../livedata_room_layout/index1.html');
        } else {
            //array_push($errors, "Wrong username/password combination");
            //$_SESSION['message'] = 'Incorrect username or password.';

            message("Incorrect username or password.");
            header('location:login.php');
        }
    }
}
function message($message)
{
    echo("<Script>\n <!--\n window.alert('$message')\n history.go(-1)\n -->\n </Script>\n");
    exit;
}

function Registermessage($message)
{
    echo("<Script>\n <!--\n window.alert('$message')\n -->\n </Script>\n");
}
function get_level_money($member, $dirmember)
{
    //echo ('member: '.$member.'<br>');
    //echo ('dirmember: '.$dirmember.'<br>');
    $sql = "SELECT  cur_val,  SUM(cur_val) AS total_quantity FROM tb_wd GROUP BY username";
    $wd = mysqli_query($db, $sql);
    $wd = mysqli_fetch_assoc($wd);
    $level = 0;
    $money = $dirmember * 0.0835;
    $money = $money - $wd['total_quantity'];
    $tree_member = $member - $dirmember;
    if ($dirmember >= 3) {
        $tree_member = $member - $dirmember + 3;

        for ($i = 1; $i < 12; $i++) {

            if ($tree_member >= 3 and $tree_member <= 11) {
                $rec_mod = $tree_member - 3;
                $level = $i;
                $money = $money + $rec_mod * 0.0833;
                break;
            } else if ($tree_member >= 12 and $tree_member <= 38) {
                $rec_mod = $tree_member - 12;
                $level = $i + 1;
                $money = $money - $wd + $rec_mod * 0.0033 + pow(3, 2) * 0.0833;

                break;
            }
            // else if($tree_member >=39 and $tree_member <=119)
            // {

            // 	$rec_mod = $tree_member - 39;
            // 	$level = $i +2;
            // 	$money = $money + $rec_mod*0.0030  + pow(3,2)*0.0833 + pow(3,3)*0.0033;
            // 	break;
            // }
            else if ($tree_member >= 120 and $tree_member <= 362) {
                $rec_mod = $tree_member - 120;
                $level = $i + 3;
                $money = $money + $rec_mod * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else if ($tree_member >= 363 and $tree_member <= 1091) {
                $rec_mod = $tree_member - 363;
                $level = $i + 4;
                $money = $money + $rec_mod * 0.0025 + pow(3, 5) * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else if ($tree_member >= 1092 and $tree_member <= 3278) {
                $rec_mod = $tree_member - 1092;
                $level = $i + 5;
                $money = $money + $rec_mod * 0.0024 + pow(3, 6) * 0.0025 + pow(3, 5) * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else if ($tree_member >= 3279 and $tree_member <= 9839) {
                $rec_mod = $tree_member - 3279;
                $level = $i + 6;
                $money = $money - $wd + $rec_mod * 0.0020 + pow(3, 7) * 0.0024 + pow(3, 6) * 0.0025 + pow(3, 5) * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else if ($tree_member >= 9840 and $tree_member <= 29522) {
                $rec_mod = $tree_member - 9840;
                $level = $i + 7;
                $money = $money + $rec_mod * 0.0018 + pow(3, 8) * 0.0020 + pow(3, 7) * 0.0024 + pow(3, 6) * 0.0025 + pow(3, 5) * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else if ($tree_member >= 29523 and $tree_member <= 88571) {
                $rec_mod = $tree_member - 29523;
                $level = $i + 8;
                $money = $money + $rec_mod * 0.0015 + pow(3, 9) * 0.0018 + pow(3, 8) * 0.0020 + pow(3, 7) * 0.0024 + pow(3, 6) * 0.0025 + pow(3, 5) * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else if ($tree_member >= 88572 and $tree_member <= 265718) {
                $rec_mod = $tree_member - 88572;
                $level = $i + 9;
                $money = $money + $rec_mod * 0.0010 + pow(3, 10) * 0.0015 + pow(3, 9) * 0.0018 + pow(3, 8) * 0.0020 + pow(3, 7) * 0.0024 + pow(3, 6) * 0.0025 + pow(3, 5) * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else if ($tree_member >= 265719 and $tree_member <= 797159) {
                $rec_mod = $tree_member - 265719;
                $level = $i + 10;
                $money = $money + $rec_mod * 0.0009 + pow(3, 11) * 0.0010 + pow(3, 10) * 0.0015 + pow(3, 9) * 0.0018 + pow(3, 8) * 0.0020 + pow(3, 7) * 0.0024 + pow(3, 6) * 0.0025 + pow(3, 5) * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else if ($tree_member >= 797160 and $tree_member <= 797160) {
                $rec_mod = $tree_member - 797160;
                $level = $i + 11;
                $money = $money + $rec_mod * 0.0009 + pow(3, 11) * 0.0010 + pow(3, 10) * 0.0015 + pow(3, 9) * 0.0018 + pow(3, 8) * 0.0020 + pow(3, 7) * 0.0024 + pow(3, 6) * 0.0025 + pow(3, 5) * 0.0028 + pow(3, 4) * 0.0030 + pow(3, 3) * 0.0033 + pow(3, 2) * 0.0833;
                break;
            } else {
                message("Completed the all levels");

            }

        }

    } else {

        $money = $dirmember * 0.0835;
    }

    $data['level'] = $level;
    $data['money'] = $money;

    //echo('level: '.$level.'<br>');
    //echo('money: '.$money.'<br>');
    return $data;


}

?>