<?php

    include "common/config.php";
?>

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->
  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HOME | DIGITANZO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/jpg" href="img/favicon.jpg"/>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />
    <script data-ad-client="ca-pub-8531292746452198" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    
    <style>

.top-header {
  overflow: hidden;
margin-top:0px;

  margin-left: 20px;
  border: 1px solid #fff;
  background-color: #fff;
}
.lo {
  overflow: hidden;
  margin-right: 30px;
}


.a {
  float: left;
  color: #4b0082;
  text-align: left;
  padding:0px;
  text-decoration: none;
  font-size: 15px;
}

.a:hover {
 color: red;
   padding:0px;
   margin: -20;
}

.a.active {
  background-color: #fff;
  color: red;
}

.navbar-wd {
  float: right;
   padding: 10px 10px;
  text-decoration: none;
  font-size: 17px;
  color: #4b0082;
}


.img-responsive2 {
    display: inline-block;
    margin-top:-15px;
    max-width: 100%;
    height: auto;
}

a.ex1:hover, a.ex1:active {color: red;}

</style>
    
</head>
<body id="about" class="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">



     <?php
       include_once('server.php');
        if(isset($_SESSION['message'])){
          $message = $_SESSION['message'];
          echo '<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>';
          echo "<script> swal('$message'); </script>";
          unset($_SESSION['message']);
        }
      ?>
  <div class="topbar">
<header class="#top-header">
	<nav class="navbar header-nav navbar-expand-lg">
		<div class="container-fluid">
		
			<div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span ></span>
                    <span></span>
                    <span></span>
				</button>
					<a class="navbar-brand" href="home.php"><img class="img-responsive2"  src="img/logo.png" alt="image"></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-wd">
			    <div class="top-header">
				<ul class="nav navbar-nav">
					<li ><a class="ex1" href="home.php">Home</a></li>
					<li ><a class="ex1" href="business-plan.php" class="dropdown-item">Business Plan</a></li>
					<li ><a class="ex1" href="payment-methods.php"class="dropdown-item">Buy Now</a></li>  
					<li ><a class="ex1" href="contact.php">Contact</a></li>
					<li ><a class="ex1" href="requirment.php">Join Now</a></li>
				
				</ul>
					<div class="lo">
				<ul class="nav navbar-nav navbar-right">
					<li ><a class="ex1" href="login.php">Login</a></li>
				</ul>
					<div>
				</div>
			</div>
			
		</div>
	</nav>
</header>
</div>
    <!-- End header -->

    <!-- Start Banner -->
    <div class="section inner_page_header" style="background-color: #4b0082">
       <div class="container">
        <div class="row">
              <div class="col-lg-12">
           <div class="full">
            <h3>welcome to the <u>D</u> gold network</h3>
         </div>
        </div>
      </div>
     </div>
    </div>
    <!-- end Banner -->
    
  <!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
               <div class="left">
                 <p class="section_count"></p>
               </div>
               <div class="right">
                <p class="small_tag">DIGITANZO Power of three</p>
                            <h2><span class="theme_color">JSG & SMG </span> Network Power Starts Here</h2>
                           <p class="large"><u>D</u>  Gold changes to more Real 24K Gold</p>
              </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- end section -->
 
    <!-- section -->
    <div >
        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-6 col-md-12 text_align_center padding_0" >
                    <div class="full">
                        <img class="img-responsive" src="img/what-bg.png" alt="DIGITANZO" />
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 white_fonts  padding_left_right" style="background-color: #008080">
                   
                    <h4 class="small_heading">Savings made easy with Digitanzo</h4>
                    <p>
Plan, save & grow your gold to achieve your life goals! Invest in 100% secure 24k Gold. Save in Digital 24k Gold and get almost 
more than 800g. Set goals and start small Saving plans made to help you reach your goals. Your Savings are 100% safe & secure.</p>
<h4>What is digital gold?</h4>
 <p>Digital gold is a new age investment instrument that allows you to invest in 24k 999 pure gold. 
It is real gold which is just securely stored in insured vaults for you. The minimum amount you can buy is as low as Rs.5000. </p>
 <h4 class="small_heading">Our Vision</h4>
                    <p>
A revolutionary financial movement that is shifting the power and profits from big business to the individual. Through the power of the JSS (Join-Share-Save)gold network we are able to leverage exclusive savings and drive greater income for all who wish to participate.</p>


                </div>

            </div>
        </div>
    </div>
    <!-- end section -->

  
  <!-- section -->
    <section>
  <h1></h1>
  </section>
  <!-- end section -->

    <!-- Start Footer -->
    
    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© <script>document.write( new Date().getFullYear() );</script>
 DIGITANZO (PVT) LTD. All Rights Reserved.</p>
                    <ul class="bottom_menu">
                        <li><a href="termsandservices.php">Term of Service</a></li>
                        <li><a href="policy.php">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
  <script>
  /* counter js */

(function ($) {
  $.fn.countTo = function (options) {
    options = options || {};
    
    return $(this).each(function () {
      // set options for current element
      var settings = $.extend({}, $.fn.countTo.defaults, {
        from:            $(this).data('from'),
        to:              $(this).data('to'),
        speed:           $(this).data('speed'),
        refreshInterval: $(this).data('refresh-interval'),
        decimals:        $(this).data('decimals')
      }, options);
      
      // how many times to update the value, and how much to increment the value on each update
      var loops = Math.ceil(settings.speed / settings.refreshInterval),
        increment = (settings.to - settings.from) / loops;
      
      // references & variables that will change with each update
      var self = this,
        $self = $(this),
        loopCount = 0,
        value = settings.from,
        data = $self.data('countTo') || {};
      
      $self.data('countTo', data);
      
      // if an existing interval can be found, clear it first
      if (data.interval) {
        clearInterval(data.interval);
      }
      data.interval = setInterval(updateTimer, settings.refreshInterval);
      
      // initialize the element with the starting value
      render(value);
      
      function updateTimer() {
        value += increment;
        loopCount++;
        
        render(value);
        
        if (typeof(settings.onUpdate) == 'function') {
          settings.onUpdate.call(self, value);
        }
        
        if (loopCount >= loops) {
          // remove the interval
          $self.removeData('countTo');
          clearInterval(data.interval);
          value = settings.to;
          
          if (typeof(settings.onComplete) == 'function') {
            settings.onComplete.call(self, value);
          }
        }
      }
      
      function render(value) {
        var formattedValue = settings.formatter.call(self, value, settings);
        $self.html(formattedValue);
      }
    });
  };
  
  $.fn.countTo.defaults = {
    from: 0,               // the number the element should start at
    to: 0,                 // the number the element should end at
    speed: 1000,           // how long it should take to count between the target numbers
    refreshInterval: 100,  // how often the element should be updated
    decimals: 0,           // the number of decimal places to show
    formatter: formatter,  // handler for formatting the value before rendering
    onUpdate: null,        // callback method for every time the element is updated
    onComplete: null       // callback method for when the element finishes updating
  };
  
  function formatter(value, settings) {
    return value.toFixed(settings.decimals);
  }
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
  formatter: function (value, options) {
    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
  }
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
  var $this = $(this);
  options = $.extend({}, options || {}, $this.data('countToOptions') || {});
  $this.countTo(options);
  }
});
  </script>
</body>
</html>


 