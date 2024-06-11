<?php
	include "common/config.php";
	mysqli_query($db, "DELETE FROM tbl_reg WHERE user_no='$_REQUEST[id]'") or die(mysqli_error());
	header("location:deleteuser");
?>