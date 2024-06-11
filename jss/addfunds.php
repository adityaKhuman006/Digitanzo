<?php
	$currentpage="addfunds";
include "common/header.php";?>
<?php
include('common/sidebar.php'); ?>
<?php
	
    include "common/config.php";
    $user_no=$_REQUEST['id'];
    $edit_tem = "SELECT * FROM tb_user WHERE user_rec_id= '$user_no'";
    $editquery = mysqli_query($db, $edit_tem);
    $editrow = mysqli_fetch_assoc($editquery);
    $rec_id = $editrow['user_rec_id'];
    $reg_id = $editrow['user_reg_id'];
    $user_name = $editrow['user_name'];
    $user_payment = $editrow['user_payment'];
    $user_country = $editrow['user_country'];
    $user_city = $editrow['user_city'];
    $user_street = $editrow['user_district'];
    $user_phone = $editrow['user_phone'];
	$user_nic = $editrow['user_nic'];
	$email = $editrow['email'];
	
	
	
	
    $get_rec_name = "SELECT user_rec_name FROM tb_user WHERE user_rec_id = '$rec_id'";
    $rec_name_query = mysqli_query($db, $get_rec_name);
    $rec_row = mysqli_fetch_assoc($rec_name_query);
    $rec_name = $rec_row['user_rec_name'];
    
	
	
?> 

<html>
    <style>
        body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
    </style>
    <body>
        
					<form action="server.php"  id="digit_form" method="post" class="p-3 mb-2 bg-light text-dark" enctype='multipart/form-data' style="color:#4b0082; font-weight:400; bg-colr:green;">
				<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-9 auto">
             <div class="card">
          
							<div>
								<p style="color:#4b0082; font-size:16px;">
									<b> Deposit or online transfer payment to a account and upload the clear photo or screenshot of the slip/receipt with your sponsor link.</b>
								
								</p>
								
								<h4 style="color:#A52A2A;  font-weight:600">Pay To</h4>
								<p style="color:#4b0082; font-size:18px;">
									<b>Bank: NDB Bank</b>
									<br>
									<b> DIGITANZO (PVT) LTD</b>
									<br>
									
									<b> Account Number - 111000152168</br>Branch - Marine Drive</b>
								</p>
							</div>
           
               <div class="h4 pb-0 mb-4 text-danger font-weight-bold text-center border-bottom border-top border-info">
								
								Add Funds
							</div>	
                <form class="form-card" onsubmit="event.preventDefault()">
				
				<div class="row justify-content-between text-left">
                        <div class="form-group col-sm-12 flex-column d-flex"> 
								<input class="form-control" type="file" name="file" id="customFile">
						
						</div>
                    </div>
					
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
						<label class="form-control-label px-3">AMOUNT<span class="text-danger"> *</span></label> 
						<input type="number" name="user_payment" id="" class="form-control" placeholder="In LKR" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length>=15) return false;" required="required"/>
						</div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
						<label class="form-control-label px-3">Transation ID<span class="text-danger"> *</span></label> 
						<input type="number" name="refnum" id="" class="form-control" placeholder="Transation ID" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length>=15) return false;" required="required"/>
						</div>
                    </div>
					
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
						<label class="form-control-label px-3">User ID<span class="text-danger"> *</span></label> 
						<input type="text" name="user_reg_id" class="form-control" placeholder="Userid of Recomend"  value = "<?php echo $rec_id ?>" readonly/>
						</div>
                        <div class="form-group col-sm-6 flex-column d-flex">
						<label class="form-control-label px-3">Name<span class="text-danger"> *</span></label> 
					<input type="text" name="username" class="form-control" placeholder="UserName of Recomend" value = "<?php echo $user_name ?>" readonly/>
						</div>
                    </div>
					
                      <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
						<label class="form-control-label px-3">NIC/Pasport No.<span class="text-danger"> *</span></label> 
						<input type="text" name="nic" class="form-control" placeholder="NIC/Pasport No." value = "<?php echo $user_nic ?>" required="required"/ readonly>
						</div>
                        <div class="form-group col-sm-6 flex-column d-flex">
						<label class="form-control-label px-3">Phone Number<span class="text-danger"> *</span></label> 
					<input type="number" name="phonenum" class="form-control" placeholder="Phone Number"  value = "<?php echo $user_phone ?>" id="" required="required" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" readonly />
						</div>
                    </div>
					  <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
						<label class="form-control-label px-3">NIC/Pasport No.<span class="text-danger"> *</span></label> 
						<input type="text" name="nic" class="form-control" placeholder="NIC/Pasport No." value = "<?php echo $user_nic ?>" required="required"/ readonly>
						</div>
                        <div class="form-group col-sm-6 flex-column d-flex">
						<label class="form-control-label px-3">Phone Number<span class="text-danger"> *</span></label> 
					<input type="number" name="phonenum" class="form-control" placeholder="Phone Number"  value = "<?php echo $user_phone ?>" id="" required="required" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" readonly />
						</div>
                    </div>
					
				
					
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="text" class="email white form-control" name="email" class="form-control" placeholder="E-Mail" value = "<?php echo $email ?>" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  readonlyrequired="required" readonly / > </div>
                    </div>
                    	 <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                             <label class="form-control-label px-3"><span class="text-danger"> 
                             *</span>
                              <input type="checkbox" name="checkbox" value="check" id="agree" required="reruired" /> 
                             I have read and agree to the <a href="termsandservices"> Terms and Conditions</a> and <a href="localhost/digitanzo/jss/termsandservices"> 
                             Privacy Policy</a>
                             </div>
                    </div>
                    
					
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn btn-info" name="user_res" >Add Funds</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  
					</form>
	

<!-- /.form-box -->
-- /.card -->
<br>
<br>
<br>
<!-- /.register-box -->

<!-- jQuery -->
  </body>
    </html>

<?php include('common/footer.php'); ?>
<script>
function validate(val) {
    v1 = document.getElementById("fname");
    v2 = document.getElementById("lname");
    v3 = document.getElementById("email");
    v4 = document.getElementById("mob");
    v5 = document.getElementById("job");
    v6 = document.getElementById("ans");

    flag1 = true;
    flag2 = true;
    flag3 = true;
    flag4 = true;
    flag5 = true;
    flag6 = true;

    if(val>=1 || val==0) {
        if(v1.value == "") {
            v1.style.borderColor = "red";
            flag1 = false;
        }
        else {
            v1.style.borderColor = "green";
            flag1 = true;
        }
    }

    if(val>=2 || val==0) {
        if(v2.value == "") {
            v2.style.borderColor = "red";
            flag2 = false;
        }
        else {
            v2.style.borderColor = "green";
            flag2 = true;
        }
    }
    if(val>=3 || val==0) {
        if(v3.value == "") {
            v3.style.borderColor = "red";
            flag3 = false;
        }
        else {
            v3.style.borderColor = "green";
            flag3 = true;
        }
    }
    if(val>=4 || val==0) {
        if(v4.value == "") {
            v4.style.borderColor = "red";
            flag4 = false;
        }
        else {
            v4.style.borderColor = "green";
            flag4 = true;
        }
    }
    if(val>=5 || val==0) {
        if(v5.value == "") {
            v5.style.borderColor = "red";
            flag5 = false;
        }
        else {
            v5.style.borderColor = "green";
            flag5 = true;
        }
    }
    if(val>=6 || val==0) {
        if(v6.value == "") {
            v6.style.borderColor = "red";
            flag6 = false;
        }
        else {
            v6.style.borderColor = "green";
            flag6 = true;
        }
    }

    flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

    return flag;
}
</script>

