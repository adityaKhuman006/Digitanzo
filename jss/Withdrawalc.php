<?php 

   include "common/config.php";
    $user_no=$_REQUEST['id'];

    $edit_tem = "SELECT * FROM tb_wd WHERE id = '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
 //   $rec_id = $editrow['user_rec_id'];
 //   $reg_id = $editrow['user_reg_id'];
    $user_name = $editrow['username'];
    $cur_val = $editrow['cur_val'];
    $admin_permission = $editrow['admin_permission'];
    $real_val = $editrow['real_val'];
    $wd_count = $editrow['wd_count'];
    $state = $editrow['state'];
    $date = $editrow['date'];
   // $get_rec_name = "SELECT * FROM tb_wd WHERE user_no = '$user_no'";
 
?>


<?php
$currentpage="paymentsc";
include "common/header.php";?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('common/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form action="server.php" method="post">
            <input type="hidden" name="id"  value = "<?php echo $user_no ?>"  />
         
<div class="row">
<div class="col">
               <div class=" w3l-form-group">
                <label>Date</label>
                <div class="group">
                    <input type="text" name="date" class="form-control" placeholder="Phone Number"  value="<?php echo $date; ?>" />
                </div>
            </div>
          </div>
          <div class="col">
           <div class=" w3l-form-group" >
                <label>User Name</label>
                <div class="group">
                    <input type="text" name="recid" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $user_name ?>"  />
                </div>
            </div>
        </div>
          <div class="col">
            <div class=" w3l-form-group">
                <label>Current Value</label>
                <div class="group">
                    <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $cur_val ?>"  />
                </div>
              </div>
              </div>
          <div class="col">
                 <div class=" w3l-form-group">
                <label>Real Value</label>
                <div class="group">
                    <input type="text" name="recname" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $real_val ?>"  />
                </div>
            </div>
            </div>
          <div class="col">
            
            <div class=" w3l-form-group">
                <label> Permission</label>
                <div class="group">
                    <input type="text" name="perm" class="form-control" placeholder="Phone Number"  value="<?php echo $admin_permission; ?>" />
                </div>
            </div>
            </div>
          <div class="col">
             <div class=" w3l-form-group">
                <label> WD Count</label>
                <div class="group">
                    <input type="text" name="wdcount" class="form-control" placeholder="Phone Number"  value="<?php echo $wd_count; ?>" />
                </div>
            </div>
            </div>
          <div class="col">
             <div class=" w3l-form-group">
                <label> State</label>
                <div class="group">
                    <input type="text" name="state" class="form-control" placeholder="Phone Number"  value="<?php echo $state; ?>" />
                </div>
            </div>
</div>
</div>
         
        
         
            <br>
            <button type="submit" class="btn btn-success" name="edit_wd">Submit</button>
        
        </form>       
         
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->



       
     
      </div>
      <!-- /.row -->
   
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users</h3>
             
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
            <?php
                $user_name = $_SESSION['username'];
                include "common/config.php";

                if($user_name == 'admin')
                {
                    $sql = "SELECT * FROM tb_bank WHERE user_isdel = '0' or user_isdel = '100'";
                    if($result = mysqli_query($db, $sql))
                    {
                        
                        if(mysqli_num_rows($result) > 0){
                            echo "<table  class='table table-bordered table-striped' id='example1'>";
                                echo "<thead><tr>";
                                    echo "<th>NIC</th>";
                                    echo "<th>Name</th>";
                                    echo "<th>Account Name</th>";
                                    echo "<th>Bank Name</th>";
                                    echo "<th>Account Number</th>";
                                    echo "<th>Phone</th>";
                                    echo "<th>branch</th>";
                                    
                                   // echo "<th style = 'text-align:center'>Edit <br> </th>";
                                echo "</tr></thead>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr style = 'text-align:center' id='". $row['user_no'] ."'>";
                                    echo "<td >" . $row['user_nic'] . "</td>";
                                    echo "<td>" . $row['user_name'] . "</td>";
                                    echo "<td>" . $row['ac_name'] . "</td>";
                                    echo "<td>" . $row['ba_name'] . "</td>";
                                    echo "<td>" . $row['ac_num'] . "</td>";
                                    echo "<td>" . $row['user_phone'] . "</td>";
                                    echo "<td>" . $row['branch'] . "</td>";
                                    
                                  //    echo "<td>
                                //   <!--   <div class='btn-group btn-group-xs'>
                                  //          <a href='editinfo.php?id=".$row['user_no']."' title='Edit' class='btn btn-default'><i class='fa fa-edit'></i></a>
                                   //         <a href='delinfo.php?id=". $row['user_no']."' title='Delete' class='btn btn-default'><i class='fa fa-trash'></i></a>
                                   //     </div> -->
                                   //  </td>"; 
                                echo "</tr>";
                            }
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "No records matching your query were found.";
                        }
                    } 
                }
                else
                {
                    echo "There is no member!";
                }
                ?>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
</div>
<!-- ./wrapper -->



<!-- ./wrapper -->
<script type="text/javascript" src="../jquery/jquery.js"></script>
      <script type="text/javascript" src="../jquery/jquery.noty.packaged.min.js"></script>
      <script type="text/javascript">
      var notifyID = 0;
      $(document).ready(function(){
        $("#notifies").ready(function(){
          var myVar  = setInterval(myTimer, 500);
        });
      });
 var tmpuser = new Array();
var tmpTime = new Array();
var tmppayed = "";
var tmpdate = "";
	function myTimer() {
	    $.post(
    		"withdrawal.php", 
    		{
    			getNoty:"getNoty"
    		},
    		function(result)
    		{
    			if (result != false) 
    			{
    				var res = JSON.parse(result);
    				var count = res.length;

    				for(var i = 0; i < count; i ++) 
    				{
						strNotify = res[i]["username"] + " did send $" + res[i]["av_val"] + "USD at " + res[i]["date"];
						if(tmpuser[i] == res[i]["username"] && tmpTime[i] == res[i]["date"])
						{
						   return;
						} else{
						    tmpuser[i] = res[i]["username"];
						    tmpTime[i] = res[i]["date"];
						}
		    			notifyID = res[i]["id"];
		    			currentVal = res[i]["payed"];
						$("#user_id").val(notifyID);
						
		    			noty({ 
		    				   text: strNotify,
							   closeWith: ['click'],
							   killer: false,
							   maxVisible: 10,
							   type: 'success',
							   
							   buttons: [
							    {addClass: 'btn btn-primary', id:notifyID, text: 'Allow', onClick: function($notifyID) {
							        // console.log($noty.$bar.find('input#example').val());
							        //  console.log($notifyID);
							        // $noty.close();
							        var userID = $(this).attr('id');
							        alert(currentVal);
							        $.post(
							        	"withdrawal.php", 
							        	{
							        		updateUser : "updateUser",
							        		tmpState : "y",
							        		userID : userID,
							        		curVal : currentVal
							        	}
							        )

							       location.reload();

							      }
							    },
							    {addClass: 'btn btn-danger', id:notifyID, text: 'Decline', onClick: function($notifyID) {
							        var userID = $(this).attr('id');
								        $.post(
								        	"withdrawal.php", 
								        	{
								        		updateUser : "updateUser",
								        		tmpState : "n",
								        		userID : userID
								        	}
								        )

								       location.reload();
							        }
							    }
							  ]
						});
    				}
    			}
    		}
    	);
	}
        
      </script>


<?php include('common/footer.php'); ?>
