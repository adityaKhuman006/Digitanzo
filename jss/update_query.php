<?php
	require_once 'common/config.php';
	
	if(ISSET($_POST['update'])){
		$user_no = $_POST['user_no'];
		//echo  $user_no;
		$user_pwd =md5($_POST['lastname']);
	//	$user_pwd = $_POST['user_pwd'];
		

		//echo $user_no;
		//echo $firstname;
		//echo $lastname;
		//echo $address;
		
		mysqli_query($db, "UPDATE `tb_user` SET `user_pwd` = '$user_pwd' WHERE `user_no` = '$user_no'") or die(mysqli_error());

	$message = "Congratulations !!!";
//echo "<script type='text/javascript'>alert('$message');</script>";

		header("Refresh: 1; url=pwchanged.php");
	}
?>