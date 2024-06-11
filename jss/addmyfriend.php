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


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: 25px ">
	<div class="card">
		<div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">
			
			Add My Friend
		</div>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<?php
							include "common/config.php";
							$user_name = $_SESSION['username'];
							$sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
							$selquery = mysqli_query($db, $sel_rec_tem);
							$row = mysqli_fetch_assoc($selquery);
						?>  
						<a href  = "registerform.php?id=<?= $row['user_rec_id']; ?>" class = 'btn btn-info btn-info'  name=''  title = '' align="center">ADD MY FRIEND</a> 						
						<span style="font-size: 18px"> Payment Methods</span>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<section class="content">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
						</div> 
						<!-- /.card-header -->
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<div class="container">
										
									</div>
								</table>
							</div>    
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					<div class="col-12 my-auto" >
						<div class="card">
						</div>
						<form>
							<input type="hidden" name="id"  value=""  />
							<input type="hidden" name="search"  value="Search By Id"  />
						</form>		
					</div>
					<!-- /.form-box -->
				</div>
				<!-- /.card-body -->
			</div>
	
        <!-- /.col -->

	<!-- /.row -->
</section>
	</div>
	
	</div>
<!-- ./wrapper -->
