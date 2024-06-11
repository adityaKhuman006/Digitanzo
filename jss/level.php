<?php
$currentpage="level";
include "common/header.php";?>

  <?php include('common/sidebar.php'); ?>

<?php

    include "common/config.php";
    $user_no=$_REQUEST['id'];
    $edit_tem = "SELECT * FROM tb_user WHERE user_rec_id= '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include('common/sidebar.php'); ?>
  
  
  <!-- /.navbar -->
<style type="text/css">
.progress_bar{
    margin-bottom: 15px;
    width: 100%;
    position: relative;
   
}
.pro-bar{
    background:#4b0082;
    display: block;
    width: 100%;
    height: 40px;
    line-height: 40px;

}
.pro-bg {
    display: block;
    height: 40px;
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;

}
.pro-value{
    background: hsla(0, 0%, 0%, 0.24);
    color: hsl(0, 0%, 98%);
    width: 60px;
    height: 40px;
    line-height: 40px;
    padding: 0 15px;
    position: absolute;
    top: 0;
    right: 0;
    text-align: center;
}
.progress_bar_title{
    width: 100%;
    height: 40px;
    line-height: 40px;
    color: #fff;
    text-align: center;
    position: absolute;
    top: 0;
    left: 0;
    padding: 0 15px;
}
 #myProgress{
     
    color: hsl(0, 0%, 98%);
  width: 100%;
    height: 40px;
    line-height: 40px;
    bg-color: #000;
    text-align: center;
    position: absolute;
    top: 0;
    left: 0;
    padding: 0px;
-webkit-appearance: none;
   appearance: none;


 }
 progress {
  /* Reset the default appearance */
  -webkit-appearance: none;
   appearance: none;

 
}
</style>
  <!-- Main Sidebar Container -->

  				    <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">

 Level Status
</div>
   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="container">

 <?php
                       include "common/config.php";
                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT user_member, user_dir FROM tb_user WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $to = mysqli_fetch_assoc($selquery);
                    ?> 
    <br>


<!--Level 1 -->
<div class="container">
    <div class="row">
       <div class="col-md-2" >
            <div class="progress_bar" >
                <div class="pro-bar"></div>
               
                <div class="progress_bar_title"><b>Level 1</b></div>
            </div>
            </div>
<div class="col-md-10" >
            <div class="progress_bar">
                <div class="pro-bar"></div>
<progress class="pro-bg"  id="myProgress"  value="<?php echo $to['user_dir']; ?>" max="3">

</progress>
 <div class="pro-value"> 3
 
 </div>
 <div class="progress_bar_title">
 <?php 

if($to['user_dir'] >=3) {
  echo "Complete";

}
else{
 echo ('Need more  ');
  echo  3 - $to['user_dir'];
  echo ('  Members To Complete');

}
    ?>

 </div>
</div>
   </div>
    </div>
</div>

<!--Level 2 -->
<div class="container">
    <div class="row">
       <div class="col-md-2" >
            <div class="progress_bar" >
                <div class="pro-bar"></div>
               
                <div class="progress_bar_title"><b>Level 2</b></div>
            </div>
            </div>
<div class="col-md-10" >
 
 
            <div class="progress_bar" >
                <div class="pro-bar"></div>
<progress class="pro-bg"  id="myProgress"  value="<?php echo $to['user_member']; ?>" max="12">

</progress>
 <div class="pro-value"> 9
 
 </div>
 <div class="progress_bar_title">
 <?php 

if($to['user_member'] >=12) {
  echo "Complete";

}
else{
  echo ('Need more  ');
  echo  12 - $to['user_member'];
  echo ('  Members To Complete');

}

    ?>

 </div>
</div>
   </div>
    </div>
</div>


<!--Level 3 -->
<div class="container">
    <div class="row">
       <div class="col-md-2" >
            <div class="progress_bar" >
                <div class="pro-bar"></div>
               
                <div class="progress_bar_title"><b>Level 3</b></div>
            </div>
            </div>
<div class="col-md-10" >
            <div class="progress_bar">
                <div class="pro-bar"></div>
<progress class="pro-bg"  id="myProgress"  value="<?php echo $to['user_member']- 12; ?>" max="27">

</progress>
 <div class="pro-value"> 27
 
 </div>
 <div class="progress_bar_title">
 <?php 

if($to['user_member'] >=39) {
  echo "Complete";

}
else{
   echo ('Need more  ');
  echo  39 - $to['user_member'];
  echo ('  Members To Complete');

}
    ?>

 </div>
</div>
   </div>
    </div>
</div>


<!-- Level 4 -->
<div class="container">
    <div class="row">
       <div class="col-md-2" >
            <div class="progress_bar" >
                <div class="pro-bar"></div>
               
                <div class="progress_bar_title"><b>Level 4</b></div>
            </div>
            </div>
<div class="col-md-10" >
            <div class="progress_bar">
                <div class="pro-bar"></div>
<progress class="pro-bg"  id="myProgress"  value="<?php echo $to['user_member']- 39; ?>" max="81">

</progress>
 <div class="pro-value"> 81
 
 </div>
 <div class="progress_bar_title">
 <?php 

if($to['user_member'] >=120) {
  echo "Complete";

}
else{
   echo ('Need more  ');
  echo  120 - $to['user_member'];
  echo ('  Members To Complete');

}
    ?>

 </div>
</div>
   </div>
    </div>
</div>

<!-- Level 5 -->
<div class="container">
    <div class="row">
       <div class="col-md-2" >
            <div class="progress_bar" >
                <div class="pro-bar"></div>
               
                <div class="progress_bar_title"><b>Level 5</b></div>
            </div>
            </div>
<div class="col-md-10" >
            <div class="progress_bar">
                <div class="pro-bar"></div>
<progress class="pro-bg"  id="myProgress"  value="<?php echo $to['user_member']- 120; ?>" max="243">

</progress>
 <div class="pro-value"> 243
 
 </div>
 <div class="progress_bar_title">
 <?php 

if($to['user_member'] >=363) {
  echo "Complete";

}
else{
   echo ('Need more  ');
  echo  363 - $to['user_member'];
  echo ('  Members To Complete');

}
    ?>

 </div>
</div>
   </div>
    </div>
</div>
<script>
function myFunction() {
  document.getElementById("myProgress").max = "600000";
}
</script>

<br>
<br>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
</div>
<!-- ./wrapper -->


<?php include('common/footer.php'); ?>

<script>
function myFunction() {
  document.getElementById("myProgress").max = "600000";
}
</script>