<?php 
$db = mysqli_connect('localhost', 'root', '', 'digitsar_digitanzo');
if (mysqli_connect_errno()){
    die("Connection failed: " . mysqli_connect_error());
}

require_once 'functions.php';

// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(E_ALL);

?>