<?php
    session_start();
    if ( isset( $_SESSION['username'] ) ) {
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages
    } else {
        // Redirect them to the login page
        header("Location: login");
    }

    if($currentpage == "approve-identity" && $_SESSION['username'] != 'admin'){
        die('Sorry you are not allowed to access this page');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>DIGITANZO</title>
  <link rel="shortcut icon" type="image/jpg" href="img/favicon.ico"/>
  <link rel="stylesheet" href="../assets/dist/css/main.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--<style>-->
  <!--  ul#noty_topRight_layout_container {-->
  <!--       display: none;-->
  <!--  }-->
  <!--</style>-->
  <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script data-ad-client="ca-pub-8531292746452198" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
       

        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" aria-hidden="true"></i>
</a>

      </li>
      <li class="nav-item d-none d-sm-inline-block" style="margin:0px">
       
       
<!--<span><img src="img/logo.png"></span>-->

   

    <!--  <span class="brand-text font-weight-light">Digitanzo </span>-->
   
      <span><p style="font-size: 20px; color: #008080; font-weight: 500" > Join Share and Save Gold(24K)</p></span>
      
      </li>
     
    </ul>
        <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link"  href="logout.php" style="background:unset;border:unset;">
           Sign Out <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
 
  </nav>

  <script type="text/javascript">
        var IdealTimeOut = 300 ; //10 seconds
        var idleSecondsTimer = null;
        var idleSecondsCounter = 0;
        document.onclick = function () { idleSecondsCounter = 0; };
        document.onmousemove = function () { idleSecondsCounter = 0; };
        document.onkeypress = function () { idleSecondsCounter = 0; };
        idleSecondsTimer = window.setInterval(CheckIdleTime, 1000);
 
        function CheckIdleTime() {
            idleSecondsCounter++;
            var oPanel = document.getElementById("timeOut");
            if (oPanel) {
                oPanel.innerHTML = (IdealTimeOut - idleSecondsCounter);
            }
            if (idleSecondsCounter >= IdealTimeOut) {
                window.clearInterval(idleSecondsTimer);
                alert("Your Session has expired. Please login again.");
                window.location = "login.php";
            }
        }
    </script>