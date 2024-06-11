<?php
$currentpage="dashboard";
include "common/header.php";?>
  <?php include('common/sidebar.php'); ?>

 <?php
                       include "common/config.php";
                        $user_name = $_SESSION['username'];
                        $sel_rec_tem = "SELECT * FROM tb_user WHERE user_name = '$user_name'";
                        $selquery = mysqli_query($db, $sel_rec_tem);
                        $row = mysqli_fetch_assoc($selquery);
                    ?> 



                    <!DOCTYPE html>
                    <html>
                    <head>
                      <title></title>
                  

  <!-- /.navbar -->
<style>

@import "//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css";
@import "http://fonts.googleapis.com/css?family=Roboto:400,500";



h4 {
    text-align: left;
    margin-top: 5px;
    font-size: 30px;    
    padding-top: 20px;
}

.h{
	  margin-top: 5px;
    font-size: 16px;    
    padding-top: 15px;
    padding-left: 5px;
    color: #000;
}

.description
{
	font-size: 15px; 
	color: black;   
    padding-top: 0px;
    
}
#sum_box p {
 text-align: left;
 font-size: 18px;
    margin: 10px;    
    padding-bottom: 5px;
}

#sum_box .db:hover {
    background: #40516f;
    color: #fff;
}




#sum_box .db:hover .icon {
    opacity: 1;
    color: #999999;
}

#sum_box .icon {
    color: #fff;
    font-size: 30px;
    margin-top: 5px;
    margin-bottom: 0px;
    float: right;
    padding-right: 3px;
    padding-top: 10px;
}


.panel.income.db.mbm{
        background-color: #5cb85c;
}

.panel.profit.db.mbm{
        background-color: #5bc0de;
}


.panel.task.db.mbm{
        background-color: #f0ad4e;
}

.alert1{
  
  background-color: #e2d1a8;
   border-radius: 5px;

  
}
.alert2{
  border-radius: 5px;
  background-color: #5bc0de;
   text-align: left;
    margin: 10px;
    font-size: 30px;    
    padding-bottom: 0px;
}

.alert3{
  border-radius: 5px;
  background-color: #f0ad4e;
   
}
.alert4{
  border-radius: 5px;
  background-color: #a8c4e2;
   text-align: left;
    margin: 0px;
    font-size: 30px;    
    padding-bottom: 0px;
}
.alert5{
  border-radius: 5px;
  background-color:  #e2a8df;
   text-align: left;
    margin: 0px;
    font-size: 30px;    
    padding-bottom: 0px;
}
.link{
   border-radius: 5px;

  background-color:   #c1e2a8  ;
  padding: 15px;
font-size: 20px;
  color: #000;
 
}

.panel-body{
 
   margin: 15px;    
    padding-bottom: 25px;
    font-size: 20px;
}


 @media only screen and (min-width: 100px) {
  #txt{
      font-size: 20px;
  }
}

@media screen and (max-width: 100px) {
      #txt{
      font-size: 10px;
  }
  
}

p.a{
  font-size: 10px;
  color: #a35063;

}
.bs-example{
    margin: 20px;
  }

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
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 10px 10px;
  cursor: pointer;
  font-size: 15px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>
  

  </head>
                    <body>
                           

                     <!-- Main Sidebar Container -->

  
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">



    <div class="" >
  <div style="padding: 10px; margin: 10px; border-radius: 5px; background-color: #008080;">
    <div class="row" >
   <div class="col-sm-2">
      <label class=""><span><h5 style="color: #fff; padding-top: 8px;">Referral Link:</h5></span></label>
   </div>

   <div class="col-sm-8">
<div class="">
  <input type="text" style="color: black;" class="form-control" value="https://digitanzo.lk/jss/registerform.php?id=<?= $row['user_rec_id']; ?>" id="myInput"  readonly>

       </div>

   </div>
    <div class="col-sm-2">     
        <button type="button" class="btn btn-primary"  onclick="myFunction()">Copy Now</button>
 </div> 
</div>    

  </div>
</div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
     
    <!-- /.content-header -->
 


    <!-- Main content -->
  
<p >
<!--  <input id="myInput" type="" name=""> 
 <input type="text" value="http://localhost/digitsart/t/registerform.php?id=<?= $row['user_rec_id']; ?>" id="myInput">
<button onclick="myFunction()">Copy text</button>-->
  </p>
 
  

 

  

  <!-- /.content-wrapper -->

  <div id="sum_box" class="row mbl">

   
      
    
             <div class="col-sm-6 col-md-3">
                                <div class="alert1">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fas fa-coins"></i>
                                        </p>
                                        <h4 class="h">
                                            <span >
                                              <?php
                     
                        
                                    echo "<td>" ,' ' . $row['user_money'] ."</td>";
                      
                        ?>  g

                                            </span></h4>
                                        <h6>
                                            <u>D</u> Gold Share</h6>
                                   
                                    </div>
                                </div>
                            </div>

                         
 <div class="col-sm-6 col-md-3">
                                <div class="alert2">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-signal"></i>
                                        </p>
                                        <h4 class="h">
                                            <span >
                                              <?php
                     
                        
                                    echo "<td>" ,' ' . $row['user_level'] . "</td>";
                      
                        ?>  


                                            </span></h4>
                                        <h6>
                                            User Level</h6>
                                   
                                    </div>
                                </div>
                            </div>





                            <div class="col-sm-6 col-md-3">
                                <div class="alert3">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-list"></i>
                                        </p>
                                        <h4 class="h">
                                            <span data-counter="" data-start="10" data-end="50" data-step="1" data-duration="0">
                                              <?php
                     
                        
                                    echo "<td>" ,' ' . $row['user_dir'] . "</td>";
                      
                        ?>  

                                            </span></h4>
                                        <h6>
                                            Direct Referrals</h6>
                                   
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="alert4">
                                    <div class="panel-body">
                                        <p class="icon">
                                            <i class="icon fa fa-signal"></i>
                                        </p>
                                        <h4 class="h" id="bar">
                                            <span>
                                              
                                              <?php
                     
                        
                                    echo "<td>" ,' ' . $row['user_member'] . "</td>";
                      
                        ?>  

                                            </span></h4>
                                        <h6>
                                            Total Members</h6>
                                   
                                    </div>
                                </div>
                            </div>


                            </div>

<div class="row">
     
       
  <br/> <br/> <br/> <br/><br/> 
 </div>


                            <?php if ($_SESSION['username'] == 'admin') {?>
                             
<section class="content" style="border-width: 2px">


      <div class="row">
       
        <!-- /.col -->
      


       <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Payments</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="table-responsive">
            <?php
                    $user_name = $_SESSION['username'];
                    include "common/config.php";

                    if($user_name == 'admin')
                    {
                        $sql = "SELECT * FROM tbl_reg WHERE user_payment = '0'";
                        if($result = mysqli_query($db, $sql))
                        {
                            
                            if(mysqli_num_rows($result) > 0){
                                echo "<table  class='table table-bordered table-striped' id='example1'>";
                                    echo "<thead><tr>";
                                        echo "<th>No</th>";
                                        echo "<th>Name</th>";
                                     //   echo "<th>NIC</th>";
                                       // echo "<th>Level</th>";
                                       // echo "<th>Member</th>";
                                      //  echo "<th>Money</th>";                                        
                                     //   echo "<th>Reg_ID</th>";
                                    //    echo "<th>Rec_ID</th>";
                                     //   echo "<th>Rec_Name</th>";
                                        echo "<th>User_Payment</th>";
                                        echo "<th>Regsit_Date</th>";
                                        echo "<th>Edit</th>";
                                       
                                    echo "</tr></thead>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr style = 'text-align:center'>";
                                        echo "<td>" . $row['user_no'] . "</td>";
                                        echo "<td>" . $row['user_name'] . "</td>";
                                      //  echo "<td>" . $row['user_nic'] . "</td>";
                                    //    echo "<td>" . $row['user_level'] . "</td>";
                                    //    echo "<td>" . $row['user_member'] . "</td>";
                                    //    echo "<td>" . $row['user_money'] . "</td>";                                        
                                      //  echo "<td>" . $row['user_reg_id'] . "</td>";
                                      //  echo "<td>" . $row['user_rec_id'] . "</td>";
                                       // echo "<td>" . $row['user_rec_name'] . "</td>";
                                        echo "<td>" . $row['user_payment'] . "</td>";
                                        echo "<td>" . $row['regist_date'] . "</td>";
                                         echo "<td>  <a href  = 'paidinfoc.php?id=". $row['user_no']."' class = 'btn btn-info btn-sm'  name='add'  title = 'ADD'>Payment</a> </td>";
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
      </div>

      <!-- /.row -->
    </section>

<section>

</section>
                        
<?php } ?>

  <?php include('common/footer.php'); ?>
  <script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery.noty.packaged.min.js"></script>
  <script>
      var notifyID = 0;
      $(document).ready(function(){
        $("#notifies").ready(function(){
            getNotification();
        });
      });
      function getNotification(){
        $.post(
          "withdrawal.php", 
          {
            getCountNotification:"getCountNotification"
          },
          function(result){
            if(result == 0)
              return;
            var notifyTxt = " Total count of Notification is " + result + "!" ;
            noty({ 
                    text: notifyTxt,
                  closeWith: ['click'],
                  killer: false,
                  maxVisible: 10,
                  type: 'success',
                      buttons:[
                            {addClass: 'btn btn-primary', id:notifyID, text: 'Ok', onClick: function($notifyID) {
                              
                                      $.post(
                                        "withdrawal.php", 
                                        {
                                          resetstate : "resetstate",
                                          
                                        }
                                      )
                            }
                          }
                        ]
            });
          }
        );
      }
     
  </script>
<script type="text/javascript">
            function Copy() 
            {
                //var Url = document.createElement("textarea");
                urlCopied.innerHTML = window.location.href;
                //Copied = Url.createTextRange();
                //Copied.execCommand("Copy");
            }



    function getURL() {

        alert("The URL of this page is: " + window.location.href);

    }

    </script>
    <script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}



</script>




 </body>
                    </html>
<script type="text/javascript" src="../jquery/withdrawal.js"></script>
<script type="text/javascript" src="../jquery/jquery.noty.packaged.min.js"></script>