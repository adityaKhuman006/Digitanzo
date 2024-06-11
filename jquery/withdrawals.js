var notifyID;
var currentVal;
var requested_count = 0;
var checked_count = 0;

var rowCount = 0;
var getFlag = 0;
var getCount = 0;
var pendingState = "";
$(document).ready(function(){

  $("#btn_withdr").ready(function(){
  	var headerArray = [];
	$('#header').children().each(function(){
	    headerArray.push($(this).text());
	});
  	if(headerArray[1] != 'admin')
  	{
  		setInterval(getData, 500);
  	}
  });


  $("#notifies").ready(function(){
  	var myVar  = setInterval(myTimer, 500);
  	var getHis  = setInterval(getHistory, 500);
  });


  $('#cur_bal').change(function() {
	  	//alert("sdf");
		var wd_count = parseInt($("#req_count").text(	));
		var cur_bal = parseInt($("#cur_bal").val());
		if(wd_count > 0)
		{
			
			var tmpTDS = cur_bal * 0.05;
			var tmpSrc = cur_bal * 0.1;
			var tmpAv = cur_bal - (tmpTDS + tmpSrc);
		} else {
			var tmpTDS = 0;
			var tmpSrc = 0;
			var tmpAv = cur_bal - (tmpTDS + tmpSrc);
		}
		
		$("#av_bal").val(tmpAv.toString());
		$("#tds_fee").val(tmpTDS.toString());
		$("#srv_fee").val(tmpSrc.toString());

  });
  $("#send").click(function(){
  	var total_earn = parseInt($("#total_earning").val()); 
  	var cur_bal = parseInt($("#cur_bal").val());
  	var mini_bal = parseInt($("#minimum_bal").val());
  	var av_bal = parseInt($("#av_bal").val());
  	var date = new Date();
  	var hour = date.getHours();
  	var minutes = date.getMinutes();
  	var seconds = date.getSeconds();
  	var wd_date = date.toDateString() + " - " + hour + " : " + minutes + " : " + seconds;
  	var wd_count = parseInt($("#req_count").text(	)) + 1;
  	if (total_earn < cur_bal) {
  		alert("Your total money is less than current Balance");
  		return;

  	}
  	if (cur_bal < mini_bal) {
  		alert("Your selected money is less than Minimum money");
  		return;
  	}
    if (cur_bal == 0) 
    {
    	alert("Please insert correct value"	);
    }
    else
    {
    	$.post(
    		"withdrawals.php", 
    		{
    			register:"register.php",
    			cur_bal: cur_bal,
    			av_bal: av_bal,
    			wd_date: wd_date,
    			wd_count:wd_count
			},
			function(result){
			
				if(result == "SUCCESS")
					alert("Your request was sent to admin successfully!!! Please wait until when admin allow your withdrawal.");
				else 
					alert("SORRT!!! Your request was not sent to admin.");
					//alert("You had withdrawal already. Before admin response, you cannot request to withdrawal.");
				$("#cur_bal").val("");
				$("#av_bal").val("");
				$("#tds_fee").val("");
				$("#srv_fee").val("");
				$("#total_earning").val("");
				location.reload();
			}
    	);
    	
    }
    
    
  });
var tmpuser = new Array();
var tmpTime = new Array();

var tmppayed = "";
var tmpdate = "";
var cCount = 0;
	function myTimer() {
	    $.post(
    		"withdrawals.php", 
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
						strNotify = res[i]["username"] + " did send " + res[i]["av_val"] + "g at " + res[i]["date"];
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
							        	"withdrawals.php", 
							        	{
							        		updateUser : "updateUser",
							        		tmpState : "y",
							        		userID : userID,
							        		curVal : currentVal
							        	}
							        )

							        getHistory();

							      }
							    },
							    {addClass: 'btn btn-danger', id:notifyID, text: 'Decline', onClick: function($notifyID) {
							        var userID = $(this).attr('id');
								        $.post(
								        	"withdrawals.php", 
								        	{
								        		updateUser : "updateUser",
								        		tmpState : "n",
								        		userID : userID
								        	}
								        )

								        getHistory();
							        }
							    }
							  ]
						});
    				}
    			}
    		}
    	);
	}


	function getData(){
		$.post(
			"withdrawals.php", 
			{
				getDadta:"getDadta"
			},
			function(result){
				var count = 0;
				var res = JSON.parse(result);
				
				if (res.length > 0) 
				{
					count = res.length;
					if (checked_count == 0) 
					{
						checked_count = 1;
						// requested_count = 0;
						if (res[0]["yes"] == "no") 
						{
							console.log("sdf");
							var insertData = "<tr><td style='width:5%;'></td><td style='width:55%;'></td><td style='width:40%;'></td></tr>";
							$('#ttbody').append(insertData);
							$('#req_count').text("0");
							$('#total_earning').val(res[0]["total"]);
							$('#srv_fee').val("");
							$('#tds_fee').val("");
							$('#minimum_bal').val("999");
						}						
					}
					else
					{
						if (res[0]["yes"] == "yes") 
						{
							if (requested_count < count) 
							{

								requested_count = count;
								var withdrawal_count;
								var minimum = "";
								$('#ttbody').empty();
								for (var i = 0; i < count; i++) 
								{
									if(res[i]["permission"] == 1)
									{
										var insertData = "<tr><td style='width:5%;'>" + res[i]["count"]+"</td><td style='width:55%;'>" + res[i]["payed"] + "</td><td style='width:40%;'>" + res[i]["date"] + "</td></tr>";
										$('#ttbody').append(insertData);
									}
									
									withdrawal_count = res[i]["count"];
									if (res[i]["state"] == 1 && res[i]["permission"] == 1) 
									{									
										var notifyTxt = " Congratulation!. Your withdrawal of " + res[i]["payed"] + "g at " + res[i]["date"] + " was successed by allow of admin!"	
										noty({ 
						    				   text: notifyTxt,
											   closeWith: ['click'],
											   killer: false,
											   maxVisible: 10,
											   type: 'success',
                							buttons:[
                								    {addClass: 'btn btn-primary', id:notifyID, text: 'Ok', onClick: function($notifyID) {
                							       
                        							        $.post(
                        							        	"withdrawals.php", 
                        							        	{
                        							        		resetstate : "resetstate",
                        							        		
                        							        	}
                        							        )
                
                							        
                
                							      }
                							    }
								    ]
										});
									}
									
								}
								$("#req_count").text(count);
								console.log(count);
								$("#total_earning").val(res[count-1]["total"]);
								if (count < 5) {
									switch(count-1)
									{
										case 0:
											minimum = "1250";
											break;
										case 1:
											minimum = "5000";
											break;
										case 2:
											minimum = "10000";
											break;
										case 3:
											minimum = "20000";
											break;
										case 4:
											minimum = "50000";
											break;
									}
								}
								else
								{
									minimum = "50000";
								}
								$("#minimum_bal").val(minimum);
							}
						}
					}
					
			    }
			}
		);
		$.post(
			"withdrawals.php",
			{
				getDeclinewd: "getDeclinewd"
			},
			function(result){
				var count = 0;
				var res = JSON.parse(result);
				
				count = res.length;
				for (var i = 0; i < count; i++) 
				{
					if (res[i]["state"] == 1 && res[i]["permission"] == 2) 
					{	
					    console.log(tmppayed, "-", res[i]["payed"]);
                        console.log(tmpdate,"-",res[i]["date"]);
						if(tmppayed == res[i]["payed"] && tmpdate == res[i]["date"])
						{
							return;
						}
						else
						{
							tmppayed = res[i]["payed"];
							tmpdate = res[i]["date"];
						}				
						var notifyTxt = " Sorry!. Your withdrawal of " + res[i]["payed"] + "g at " + res[i]["date"] + " was declined by admin!"	
						noty({ 
								text: notifyTxt,
								closeWith: ['click'],
								killer: false,
								maxVisible: 1,
								type: 'success',
								buttons:[
								    {addClass: 'btn btn-primary', id:notifyID, text: 'Ok', onClick: function($notifyID) {
							       
        							        $.post(
        							        	"withdrawals.php", 
        							        	{
        							        		resetstate : "resetstate",
        							        		
        							        	}
        							        )

							        

							      }
							    }
								    ]
						});
					}
				}
								
			}		
		);
		$.post(
			"withdrawals.php",
			{
				getwaitingwd: "getwaitingwd"
			},
			function(result){
				var count = 0;
				var res = JSON.parse(result);
				
				if(res.length > 0 && res[0]["yes"] == "yes")
					$("#btn_withdr").attr('disabled',true);
				else
					$("#btn_withdr").attr('disabled',false);
								
			}		
		);
	}

	function getHistory(){
		$.post(
			"withdrawals.php", 
			{
				getHistory:"getHistory"
			},
			function(result){
				var res = JSON.parse(result);
				if (res.length > 0) 
				{
					rowCount = res.length;
					if (getFlag == 0) 
					{
						getFlag = 1;
						// requested_count = 0;
						if (res[0]["yes"] == "no") 
						{
							var insertData = "<tr><td style='width:10%;'></td><td style='width:30%;'></td><td style='width:40%;'></td><td style='width:40%;'></td><td style='width:40%;'></td><td style='width:40%;'></td><td style='width:40%;'></td><td style='width:40%;'></td></tr>";
							$('#tttbody').append(insertData);
						}						
					}
					else
					{
						if (res[0]["yes"] == "yes") 
						{
							if (getCount != rowCount) 
							{
								
								getCount = rowCount;
								$('#tttbody').empty();
								var tmpCount = 0;
								var tmpCur = 0;
								var tmpTDS = 0;
								var tmpSrv = 0;
								var per;
								for (var i = 0; i < rowCount; i++) 
								{
									tmpCur = parseInt(res[i]["payed"]);
									
									tmpTDS = tmpCur * 0.05;
									
									tmpSrv = tmpCur * 0.1;
									if(i == 0){
										tmpTDS = 0;
										tmpSrv = 0;
									}
										
									if (parseInt(res[i]["per"]) ==0) 
									{
										per = "Pending";
									}
									else if(parseInt(res[i]["per"]) == 1){
										per = "Allow";
									}
									else if(parseInt(res[i]["per"]) == 2){
										per = "Decline";
									}
									// if(pendingState != per){
										pendingState = per;
										var insertData = "<tr><td style='width:10%;'>" + (i + 1).toString() + 
														 "</td><td style='width:30%;'>"+ res[i]["userNm"]+
														 "</td><td style='width:40%;'>"+ res[i]["total"]+
														 "</td><td style='width:40%;'>"+ res[i]["payed"]+
														 "</td><td style='width:40%;'>"+ res[i]["real"]+
														 "</td><td style='width:40%;'>"+ res[i]["date"]+
														 "</td><td style='width:40%;'>"+ tmpTDS.toString()+
														 "</td><td style='width:40%;'>"+ tmpSrv.toString()+
														 "</td><td style='width:40%;'>"+ per + "</td></tr>";

												 
										$('#tttbody').append(insertData);
								}
							}
						}
					}
					
			    }
			}
		)
	}
});