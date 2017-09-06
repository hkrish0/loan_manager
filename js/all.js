

$("#scheme_renewal").change(function(){

		sum=0;
		sum1=0;
		sum2=0;
		scheme=$("#scheme_renewal").val();	
		$("#scheme_values").val(scheme);
		
		$.ajax({
		'data':{value:scheme},
	    'type': 'POST',
	     'url' : "../loan/scheme_details",
	    success: function (data) {
	        var duration=parseInt(data[2]);
	    	var time = new Date();
			var d = new Date();
			
			time.setDate(d.getDate()+duration);
			
			
			
			$("#repayment_date").val(time);
	    	
			$('#mygrid1_table tbody tr').each(function(){

				$(this).closest('tr').children('td:nth-child(4)').text(data[1]);		
				var weight=$(this).closest('tr').children('td:nth-child(5)').text();
				var stoneweight=$(this).closest('tr').children('td:nth-child(6)').text();

				var pledgeweight=parseInt(weight)-parseInt(stoneweight);

				if(weight!="" && stoneweight!="")
				{
				$(this).closest('tr').children('td:nth-child(9)').text(pledgeweight);
				}

				var maxamt=$(this).closest('tr').children('td:nth-child(4)').text();
				var pledgeweight=$(this).closest('tr').children('td:nth-child(9)').text();

				totalamt=parseInt(maxamt) * parseInt(pledgeweight);	


				if(maxamt!="" && pledgeweight!="")
				{
				$(this).closest('tr').children('td:nth-child(10)').text(totalamt);
				}

					
				var netamount=$(this).closest("tr").children("td:nth-child(10)").text();
				sum1=sum1+parseInt(netamount);
				sum=sum+parseInt(pledgeweight);
				sum2=sum2+parseInt(weight);
				$('#total_details #total_span').next().text(sum2);
				 $('#total_details #total_span').next().next().next().text(sum);
				 $('#total_details #total_span').next().next().next().next().text(sum1);


				
				});

				    	
		  	
	    },
	     dataType: 'json'
	 });


	});


function newcustomerform(){

	window.location.href = 'customer_create'; 		  
}

function customer_autocomplete(event,ui){
	value1=ui.item['attribute5'];
	
	$.ajax({
		 dataType: "json",
		 
	     type: "POST",
	     data:{value:value1},
	     url: "../loan/getcustomerform",
	     
	    	success:function(data){
	    	$('#Address_AddressLine1').text(data[0]);
	    	$('#Address_AddressLine2').text(data[1]);
	    	$('#Address_Pincode').val(data[2]);
	    	$('#Address_DistrictMasterId').val(data[3]);  
	    	
	    	    		 
		    }	   
	});	
}

var TableData = new Array();
function loan_form(){
	
	
	var customer=$('#customer').val();
	var customer1=$('#customer1').val();
	var customer2=$('#customer2').val();
	var amountissue=$('#amountissued').val();
	
	if(customer=="" || customer1=="" || customer2=="" || amountissue==""){
		
		
		
		alert("please complete the form to continue");
	}
	else
		{
	
	 $('.details_table #yw0 .tabular-input-container .tabular-input').each(function(row,tr){
	TableData[row]={ 
	 "value1":$(this).children('td:nth-child(1)').find("input").val(),
	 "value2":$(this).children('td:nth-child(2)').find("input").val(),
	 "value3":$(this).children('td:nth-child(3)').find("input").val(),
	 "value4":$(this).children('td:nth-child(4)').find("input").val(),
	 "value5":$(this).children('td:nth-child(5)').find("input").val(),
	 "value6":$(this).children('td:nth-child(6)').find("input").val(),
	 "value7":$(this).children('td:nth-child(7)').find("input").val(),
	 "value8":$(this).children('td:nth-child(8)').find("select").val(),
	 "value9":$(this).children('td:nth-child(9)').find("input").val(),
	 "value10":$(this).children('td:nth-child(10)').find("input").val()
	}
 });
	 loandetails =JSON.stringify(TableData);
	 $("#table_datas").val(loandetails);
	 $.ajax({
		 
	     type: "POST",
	     url: "../loan/create",
	     data:$("#verticalForm,#scheme_values,#amountissued,#table_datas").serialize(),
	     dataType:"json",
	    	success:function(data){
	    	if (data.status == 'failure')
            {
	    	$("#loan_receipt").dialog("open");
	    	
	    	$('#loan_receipt div.divForForm').html(data.div);
            }
	    	
	    	else{
	    		
	    		alert("Loan Successfully issued");  
	    		
	    	}
	    	//window.location.href="create";
		    }	   
	});	
		}
}


function loan_save(){
	
	
	var customer=$('#customer').val();
	var customer1=$('#customer1').val();
	var customer2=$('#customer2').val();
	var amountissue=$('#amountissued').val();
	
	if(customer=="" || customer1=="" || customer2=="" || amountissue==""){
		
		
		
		alert("please complete the form to continue");
	}
	else
		{
	
	 $('.details_table #yw0 .tabular-input-container .tabular-input').each(function(row,tr){
	TableData[row]={ 
	 "value1":$(this).children('td:nth-child(1)').find("input").val(),
	 "value2":$(this).children('td:nth-child(2)').find("input").val(),
	 "value3":$(this).children('td:nth-child(3)').find("input").val(),
	 "value4":$(this).children('td:nth-child(4)').find("input").val(),
	 "value5":$(this).children('td:nth-child(5)').find("input").val(),
	 "value6":$(this).children('td:nth-child(6)').find("input").val(),
	 "value7":$(this).children('td:nth-child(7)').find("input").val(),
	 "value8":$(this).children('td:nth-child(8)').find("select").val(),
	 "value9":$(this).children('td:nth-child(9)').find("input").val(),
	 "value10":$(this).children('td:nth-child(10)').find("input").val()
	}
 });
	 loandetails =JSON.stringify(TableData);
	 $("#table_datas").val(loandetails);
	 $.ajax({
		 
	     type: "POST",
	     url: "../loan/loan_create",
	     data:$("#verticalForm,#scheme_values,#amountissued,#table_datas").serialize(),
	     dataType:"html",
	    	success:function(data){
	    		$( '#loan_receipt').dialog( 'close' );
		    	   window.close();  
	    		
	    		alert("Loan Successfully issued");  
	    		
	    	
	    	window.location.href="create";
		    }	   
	});	
		}
}









var TableDataRenewal = new Array();
function loan_renewal(){	
	var loanmasterdata = $("#verticalForm, #scheme_renewal,#amountissued").serialize();
		
	
	 $('#mygrid1_table tbody tr').each(function(row,tr){
		 TableDataRenewal[row]={ 
	 "value1":$(this).closest('tr').children('td:nth-child(1)').text(),
	 "value2":$(this).closest('tr').children('td:nth-child(2)').text(),
	 "value3":$(this).closest('tr').children('td:nth-child(3)').text(),
	 "value4":$(this).closest('tr').children('td:nth-child(4)').text(),
	 "value5":$(this).closest('tr').children('td:nth-child(5)').text(),
	 "value6":$(this).closest('tr').children('td:nth-child(6)').text(),
	 "value7":$(this).closest('tr').children('td:nth-child(7)').text(),
	 "value8":$(this).closest('tr').children('td:nth-child(8)').text(),
	 "value9":$(this).closest('tr').children('td:nth-child(9)').text(),
	 "value10":$(this).closest('tr').children('td:nth-child(10)').text()
	}
 });
	 loandetails =JSON.stringify(TableDataRenewal);
	 $("#table_datas").val(loandetails);
	
	 $.ajax({
		 
	     type: "POST",
	     url: "<?php echo Yii::app()->createUrl('loan/renewalsave');?>",
	     data:$("#verticalForm,#scheme_values,#amountissued,#table_datas").serialize(),
	    	success:function(data){
	    	alert("success");    	
		    }	   
	});	
}















