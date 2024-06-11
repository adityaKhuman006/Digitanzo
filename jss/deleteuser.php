<?php
$currentpage="deleteuser";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('common/sidebar.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<div id="wrap">
			<div class="container">

	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Delete Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Delete Paid User</li>
            </ol>
          </div>
			
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Ref No</th>
						<th>User No</th>
						<th>Name</th>
						<th>Rec Name</th>
						<th>NIC</th>
						<th>PMT</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

						include "common/config.php";
						$count=0;
						$query = mysqli_query($db, "SELECT * FROM tbl_reg ORDER BY user_no DESC") or die(mysqli_error());
						while($fetch = mysqli_fetch_array($query)){
						$count++;
					?>
					<tr class="del_mem<?php echo $fetch['user_no']?>">
							<td><?php echo $fetch['refnum']?></td>
						<td><?php echo $fetch['user_no']?></td>
						<td><?php echo $fetch['user_name']?></td>	
						<td><?php echo $fetch['user_rec_name']?></td>	
						<td><?php echo $fetch['user_nic']?></td>	
						<td><?php echo $fetch['user_payment']?></td>	
						<td><?php echo $fetch['user_phone']?></td>
						

						<td><button type="button" class="btn btn-danger" data-target="#modal_confirm<?php echo $count?>" data-toggle="modal"><span class="fa fa-trash" id="boot-icon"></span> </button>
			</td>				
					</tr>
					
						<div class="modal fade" id="modal_confirm<?php echo $count?>" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title">System</h3>
								</div>
								<div class="modal-body">
									<center><h4>Are you sure you want to delete this data?</h4></center>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
									<a type="button" class="btn btn-success" href="delete.php?id=<?php echo $fetch['user_no']?>">Yes</a>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save.php">
					<div class="modal-header">
						<h3 class="modal-title">Add Member</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="firstname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lastname" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" required="required"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
					</div>
				</form>
			</div>
		</div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>	
</html>