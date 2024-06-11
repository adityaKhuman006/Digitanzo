<?php
include "common/header.php";
?>
<!-- /.navbar -->
<?php
include "common/config.php";
$user_name = $_SESSION['username'];
$userId = $_SESSION['userid'];
$sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
$selquery = mysqli_query($db, $sel_rec_tem);
$row = mysqli_fetch_assoc($selquery);
$totalGoldQuery = "SELECT
    COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) AS totalBoughtGold,
    COALESCE(SUM(CASE WHEN action = 'withdrawl' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS totalWithdrawlGold,
    COALESCE(SUM(CASE WHEN action = 'buy' THEN gold_in_grams ELSE 0 END), 0) - COALESCE(SUM(CASE WHEN action = 'withdrawl' AND is_approved = 1 THEN gold_in_grams ELSE 0 END), 0) AS netGoldBalance
FROM
    tb_user_gold_transation
WHERE 
    user_id = {$row['user_no']}";
$gRes = mysqli_query($db, $totalGoldQuery);
$totalGoldFrom = mysqli_fetch_assoc($gRes);

$selq= "SELECT * FROM tb_user_gold_transation WHERE is_approved=0 AND action='withdrawl' AND user_id = {$row['user_no']}";
$wres = mysqli_query($db, $selq);
$wdrqno = mysqli_num_rows($wres);
$checkUserIdentitySql = "Select * from user_identity WHERE user_rec_id = '$userId'";
$checkUserIdentityResult = mysqli_query($db,$checkUserIdentitySql);
$checkUserIdentityFetch = mysqli_fetch_assoc($checkUserIdentityResult);
?> 

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
       <img src="img/logo.png" alt="Logo" > 

    <!--  <span class="brand-text font-weight-light">Digitanzo </span>-->
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
<br/>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/dist/img/logo1.PNG" class="img-circle elevation-2" alt="User Image">
        </div>  
        <div class="info">
          <a href="dashboard" class="d-block"><?php echo $_SESSION['username'] ?></a>
        </div>
          <div class="info">
              <?php
              if(isset($checkUserIdentityFetch['status']) && $checkUserIdentityFetch['status'] != null){
                if($checkUserIdentityFetch['status'] ==  1){
                    echo '<i style="font-size: 35px" class="fas fa-check-circle text-success"></i>';
                }else if($checkUserIdentityFetch['status'] ==  3){
                    echo '<img class="img-fluid" src="../assets/dist/img/wrong.png">';
                }else if($checkUserIdentityFetch['status'] ==  2){
                    echo '<i style="font-size: 35px" class="fas fa-clock text-primary"></i>';
                }else{
                    echo '<img class="img-fluid" src="../assets/dist/img/wrong.png">';
                }
              }else{
                  echo '<img class="img-fluid" src="../assets/dist/img/wrong.png">';
              }
              ?>

        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
            <a href="dashboard.php" class="nav-link <?= ($currentpage=='dashboard') ? 'active':''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
            <?php if ($_SESSION['username'] == 'admin') { ?>
            <li class="nav-item has-treeview">
                <a href="approve-identity.php" class="nav-link <?= ($currentpage=='approve-identity') ? 'active':''; ?>">
                    <i class="nav-icon fas fa-solid fa-check"></i>
                    <p>
                        Approve
                    </p>
                </a>
            </li>
            <?php } else {?>
            <li class="nav-item has-treeview">
                <a href="identicard.php" class="nav-link <?= ($currentpage=='identicard') ? 'active':''; ?>">
                    <i class="nav-icon fas fa-solid fa-address-card"></i>
                    <p>
                        Identicard
                    </p>
                </a>
            </li>
            <?php } ?>

            <?php if ($_SESSION['username'] == 'admin') { ?>
                <li class="nav-item has-treeview">
                    <a href="gold-price.php" class="nav-link <?= ($currentpage=='gold-price') ? 'active':''; ?>">
                        <i class="nav-icon fas fa-coins"></i>
                        <p>
                            Gold price
                        </p>
                    </a>
                </li>
            <?php }?>

            <li class="nav-item has-treeview">
                <a href="transfer-balance.php" class="nav-link <?= ($currentpage=='transfer-balance') ? 'active':''; ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Transfer Balance
                    </p>
                </a>
            </li>

             <li class="nav-item has-treeview">
            <a href="addfund.php?id=<?= $row['user_rec_id']; ?>" class="nav-link <?= ($currentpage=='addfund') ? 'active':''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Add Fund               
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="savegold.php" class="nav-link  <?= ($currentpage=='savegold') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>Save More Gold</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="my_info.php" class="nav-link <?= ($currentpage=='my_info') ? 'active':''; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                 My Infomation
                
              </p>
            </a>
          </li> 
          <?php if ($_SESSION['username'] == 'admin') {?>
          <li class="nav-item has-treeview">
            <a href="users.php" class="nav-link <?= ($currentpage=='users') ? 'active':''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
                
              </p>
            </a>
          </li>    
            <li class="nav-item has-treeview">
            <a href="addfundhist.php" class="nav-link  <?= ($currentpage=='addfundhist') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p >
               Add Fund History 
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="paymentsc.php" class="nav-link  <?= ($currentpage=='paymentsc') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p >
               Payment Confirm
                
              </p>
            </a>
          </li>
          
          
          <li class="nav-item has-treeview">
            <a href="payments.php" class="nav-link  <?= ($currentpage=='payments') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               Registration Confirm
                
              </p>
            </a>            
          </li>
           <li class="nav-item has-treeview">
            <a href="deleteuser.php" class="nav-link  <?= ($currentpage=='deleteuser') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               Delete PC User
                
              </p>
            </a>            
          </li>
           <li class="nav-item has-treeview">
            <a href="userview.php" class="nav-link  <?= ($currentpage=='userview') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               User View
                
              </p>
            </a>            
          </li>
           <li class="nav-item has-treeview">
            <a href="deletercuser.php" class="nav-link  <?= ($currentpage=='deletercuser') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               Delete RC User
                
              </p>
            </a>            
          </li>

          <li class="nav-item has-treeview">
            <a href="withdrawaladmin.php" class="nav-link  <?= ($currentpage=='withdrawalad') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p> Withdrawal Admin </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="adminconfig.php" class="nav-link  <?= ($currentpage=='adminconfig') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p> Add amount Config </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="addfundadmin.php" class="nav-link  <?= ($currentpage=='addfundadmin') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p> Add Fund Admin </p>
            </a>
          </li>

            <li class="nav-item has-treeview">
            <a href="resetpwd.php" class="nav-link  <?= ($currentpage=='resetpwd') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>Admin Reset Password </p>
            </a>
          </li>
          <?php } ?>

          
       <!--   <li class="nav-item has-treeview">
            <a href="addmyfriend.php" class="nav-link  <?= ($currentpage=='addmyfriend') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>Add My Friend </p>
            </a>
          </li>-->

          <li class="nav-item has-treeview">
            <a href="withdrawals.php" class="nav-link  <?= ($currentpage=='withdrawals') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               Withdrawal
                
              </p>

            </a>
          </li>
          

          

          <li class="nav-item has-treeview">
            <a href="my_bank.php" class="nav-link  <?= ($currentpage=='my_bank') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                My Bank Details
                
              </p>

            </a>
          </li> 
          
             <li class="nav-item has-treeview">
            <a href="userresetpwd.php" class="nav-link  <?= ($currentpage=='userresetpwd') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p> Reset Password </p>
            </a>
          </li> 

              <li class="nav-item has-treeview">
            <a href="level.php" class="nav-link  <?= ($currentpage=='level') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Level Status
                
              </p>

            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="direct.php" class="nav-link  <?= ($currentpage=='direct') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Direct Member
                
              </p>

            </a>
          </li>
       <!--    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Income Statement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
             <li class="nav-item has-treeview">
            <a href="history.php" class="nav-link  <?= ($currentpage=='history') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Tree Member
                
              </p>

            </a>
          </li>
                
             
             
            </ul>
          </li> -->

         
         
          
               
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


<br>
<br>
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>

   