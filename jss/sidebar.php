<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
       <img src="dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> 
      <span class="brand-text font-weight-light">Digitanzo </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> 
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username'] ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="dashboard" class="nav-link <?= ($currentpage=='dashboard') ? 'active':''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard               
              </p>
            </a>
          </li>  
          <li class="nav-item has-treeview">
            <a href="my_info" class="nav-link <?= ($currentpage=='my_info') ? 'active':''; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                 My Infomation
                
              </p>
            </a>
          </li> 
          <?php if ($_SESSION['username'] == 'admin') {?>
          <li class="nav-item has-treeview">
            <a href="users" class="nav-link <?= ($currentpage=='users') ? 'active':''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
                
              </p>
            </a>
          </li>     
          <li class="nav-item has-treeview">
            <a href="paymentsc" class="nav-link  <?= ($currentpage=='paymentsc') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               Payment Confirm
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="payments" class="nav-link  <?= ($currentpage=='payments') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               Registration Confirm
                
              </p>
            </a>            
          </li>

          <li class="nav-item has-treeview">
            <a href="withdrawaladmin" class="nav-link  <?= ($currentpage=='withdrawalad') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p> Withdrawal Admin </p>
            </a>
          </li>
          <?php } ?>
          
          <li class="nav-item has-treeview">
            <a href="addmyfriend" class="nav-link  <?= ($currentpage=='addmyfriend') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>Add My Friend </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="withdrawals" class="nav-link  <?= ($currentpage=='withdrawals') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
               Withdrawal
                
              </p>

            </a>
          </li>

           <li class="nav-item has-treeview">
            <a href="my_bank" class="nav-link  <?= ($currentpage=='bank') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                My Bank Details
                
              </p>

            </a>
          </li>
           

              <li class="nav-item has-treeview">
            <a href="level" class="nav-link  <?= ($currentpage=='level') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Level Status
                
              </p>

            </a>
          </li>
            <li class="nav-item has-treeview">
            <a href="direct" class="nav-link  <?= ($currentpage=='direct') ? 'active':''; ?>">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Direct Member
                
              </p>

            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="direct" class="nav-link  <?= ($currentpage=='direct') ? 'active':''; ?>">
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
            <a href="history" class="nav-link  <?= ($currentpage=='history') ? 'active':''; ?>">
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
   url:"fetcht.php",
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

   