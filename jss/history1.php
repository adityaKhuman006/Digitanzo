<?php
$currentpage="history";
include "common/header.php";
include "common/config.php";
$user_name = $_SESSION['username'];
$user_name = $_SESSION['username'];
$user_data = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
$query = mysqli_query($db, $user_data);
$get_data = mysqli_fetch_assoc($query);
$user_reg_id=$get_data['user_reg_id'];
//echo $user_reg_id;
//die;
if($get_data['user_dir'] >=3) {
  $get_data['user_dir'];
  echo "level one complete";
}
else{
 echo ('Need more  ');
  echo  3 - $to['user_dir'];
  echo ('  Members To Complete');

}

?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include('common/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        

            <div class="card">
            <div class="card-header">
              <h3 class="card-title">History</h3>
              <div class="card-tools">
                
                <!-- <button id="btn_withdr" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  NEW WITHDRAWAL
                </button> -->
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped">
                      <thead> 
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Commission</th>
                            <th>User Name</th>
                            <th>Rec.Id</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $check_user_id=$db->prepare("SELECT GROUP_CONCAT(ga SEPARATOR ',') as ganesh FROM (
                          SELECT @pv:=(SELECT GROUP_CONCAT(user_rec_id SEPARATOR ',') FROM tb_user WHERE user_reg_id IN (@pv)) AS ga FROM tb_user
                          JOIN
                          (SELECT @pv:=$user_reg_id)tmp
                          WHERE user_reg_id IN (@pv)) a");
                          //$check_users->bind_param('s',$user_name);
                          $check_user_id->execute();
                          $check_user_id->store_result();
                          $check_user_id_count=$check_user_id->num_rows;
                          if($check_user_id_count>=0){
                            $check_user_id->bind_result($user_rec_id);
                            $check_user_id->fetch();
                            //echo $user_rec_id;
                          }
                          $check_users=$db->prepare("SELECT user_no,user_reg_id,user_name,user_rec_id,regist_date FROM
                          (SELECT user_no,user_reg_id,user_name,user_rec_id,regist_date,
                          CASE WHEN user_reg_id in ($user_rec_id) THEN @idlist := CONCAT(IFNULL(@idlist,''),',',user_rec_id)
                          WHEN FIND_IN_SET(user_reg_id,@idlist) THEN @idlist := CONCAT(@idlist,',',user_rec_id)
                          END as checkId
                          FROM tb_user
                          ORDER BY user_no ASC) as T
                          WHERE checkId IS NOT NULL");
                          //$check_users->bind_param('s',$user_name);
                          $check_users->execute();
                          $check_users->store_result();
                          $check_users_count=$check_users->num_rows;
                          if($check_users_count>=0){
                          $check_users->bind_result($user_no,$user_reg_id,$user_name,$user_rec_id,$regist_date);
                            $user_data=[];
                            $count=1;
                            while($check_users->fetch()){
                                $tmp=[];
                                if($count<=3){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=333;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                
                                }
                                elseif($count>=3 && $count<=9){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=150;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=9 && $count<=27){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=90;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=27 && $count<=81){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=80;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=81 && $count<=243){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=70;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=243 && $count<=729){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=60;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=729 && $count<=2187){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=40;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=2187 && $count<=6561){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=30;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=6561 && $count<=19683){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=25;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=19683 && $count<=59049){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=25;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=59049 && $count<=177147){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=20;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }elseif($count>=177147 && $count<=531441){
                                  $tmp['user_add']=$count;
                                  $tmp['user_name']=$user_name;
                                  $tmp['commission']=20;
                                  $tmp['add_date']=$regist_date;
                                  $tmp['user_rec_id']=$user_rec_id;
                                }
                                array_push($user_data, $tmp);
                                $count++;
                              } 
                          }else{
                            ?>
                                <tr>
                                  <td>Record not found</td>
                                </tr>
                            <?php
                          }
                          if($user_data){
                            foreach ($user_data as $key => $value) {
                              ?>
                                <tr>
                                  <td><?php  echo  $value['user_add']; ?></td>
                                  <td><?php  echo $newDate = date("d/m/Y h:i:s", strtotime($value['add_date'])); ?></td>
                                  <td><?php  echo $value['commission']; ?></td>
                                  <td><?php  echo $value['user_name']; ?></td>
                                  <td><?php  echo $value['user_rec_id']; ?></td>
                                </tr>
                              <?php
                            }
                          }
                        ?>
                      </tbody>
                  </table>
            </div>
            <!-- /.card-body -->
          </div>
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


<?php include('common/footer.php'); ?>
<!-- <script type="text/javascript" src="../jquery/withdrawal.js"></script> -->
<script type="text/javascript" src="../jquery/jquery.noty.packaged.min.js"></script>

<script>
  $(document).ready(function () {
  //called when key is pressed in textbox
  $("#cur_bal").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>