


<td>
	<?php $this->widget('ext.autocomplete.XJuiAutoComplete', array(
		'model'=>Product::model(),
		'attribute'=>"[$index]ProductName",
		'source'=>$this->createUrl('loan/product'),
		'htmlOptions'=>array('class'=>'span2')
	)); ?>
</td>
	
	
	
	<td>	
	
	<?php $this->widget('ext.autocomplete.XJuiAutoComplete', array(
		'model'=>Producttype::model(),
		'attribute'=>"[$index]ProductTypeName",
		'source'=>$this->createUrl('loan/producttype'),
		 'options'=>array('select'=>'js:function(event,ui){
		 			$this=$(this); 		
		 		//product_change(event,ui);
				var producttype_id=ui.item["id"];
				$.ajax({
				dataType: "json",
	       		"type": "POST",
				"data":{value:producttype_id},
	        	"url" : "gettopscheme",
		 		"success": function (data) {		 	
				
		 		  var duration=parseInt(data[2]);
	    			var time = new Date();
					var d = new Date();
			
					time.setDate(d.getDate()+duration);
			
			
			
					$("#repayment_date").val(time);
	    	
		 		
		 		
		 		$this.closest("tr").children("td:nth-child(3)").find("input").val(data[3]);	
				$this.closest("tr").children("td:nth-child(4)").find("input").val(data[0]);
				$this.closest("tr").children("td:nth-child(5)").find("input").val(data[1]);
		 		
		 		$("#scheme_values").val(data[4]);
				 		
		 		},		 		
		 		});	
		 		}'),
		'htmlOptions'=>array('class'=>'span2')
	)); ?>
	
	
					
	</td>
	
	
	<td>	
	<?php echo CHtml::textField("[$index]currentrate",'',array('class'=>'span1','size'=>10)); ?>						
	</td>
	

	<td>
	<?php echo CHtml::textField("[$index]MaxAmountper",'', array('class'=>'span1')); ?>							
	</td>	
	
	<td>
	<?php echo CHtml::textField("[$index]MaxAmount",'', array('class'=>'span1')); ?>							
	</td>
	
	<td>
	<?php echo CHtml::textField("[$index]Weight",'', array('class'=>'span1')); ?>
	</td>
	
	<td>
	<?php echo CHtml::textField("[$index]StoneWeight", '',array('class'=>'span1')); ?>
	</td>
	
	<td>
	<?php echo CHtml::dropDownList('','UnitMasterId',CHtml::listData(Unitmaster::model()->findAll(),'UnitMasterId', 'Unit'), array('class'=>'span1','label'=>false ));?>
	</td>
	
	
	<td>
	<?php echo CHtml::textField("[$index]Number",'', array('class'=>'span1')); ?>
	</td>
	
	<td>
	<?php echo CHtml::textField("[$index]netweight",'', array('class'=>'span1')); ?>							
	</td>	
	<td>
	<?php echo CHtml::textField("[$index]netamount",'', array('class'=>'span2')); ?>							
	</td>
	

	
	<td>
	
	
	
	<?php /* $this->widget('ext.autocomplete.XJuiAutoComplete', array(
		'model'=>Scheme::model(),
		'attribute'=>"[$index]SchemeName",
		'source'=>$this->createUrl('loan/scheme'),
		 'options'=>array('select'=>'js:function(event,ui){
								
			}'),
		'htmlOptions'=>array('class'=>'span1')

	)); */?>

</td>
	

	
<script>



sum=0;	
$('#yw0 tbody tr').on('change','td:nth-child(6)',function(e){ 
var weight=$(this).closest("tr").children("td:nth-child(6)").find("input").val();
var stoneweight=$(this).closest("tr").children("td:nth-child(7)").find("input").val();
var number=$(this).closest("tr").children("td:nth-child(8)").find("input").val();
netweight=parseInt(weight)-parseInt(stoneweight);

if(stoneweight!="" && weight!="")
{
$(this).closest("tr").children("td:nth-child(10)").find("input").val(netweight);	
var maxamt=$(this).closest("tr").children("td:nth-child(5)").find("input").val();
var netweigh=$(this).closest("tr").children("td:nth-child(10)").find("input").val();
totalamt=parseInt(maxamt) * parseInt(netweigh);
$(this).closest("tr").children("td:nth-child(11)").find("input").val(totalamt);		
}
});


$('#yw0 tbody tr').on('change','td:nth-child(7)',function(e){ 
var weight=$(this).closest("tr").children("td:nth-child(6)").find("input").val();
var stoneweight=$(this).closest("tr").children("td:nth-child(7)").find("input").val();
var number=$(this).closest("tr").children("td:nth-child(8)").find("input").val();
netweight=parseInt(weight)-parseInt(stoneweight);

if(weight!="" && stoneweight!="")
{
$(this).closest("tr").children("td:nth-child(10)").find("input").val(netweight);	
var maxamt=$(this).closest("tr").children("td:nth-child(5)").find("input").val();
var netweigh=$(this).closest("tr").children("td:nth-child(10)").find("input").val();
totalamt=parseInt(maxamt) * parseInt(netweigh);
$(this).closest("tr").children("td:nth-child(11)").find("input").val(totalamt);	
}

});


$('#yw0 tbody tr').on('change','td:nth-child(5)',function(e){ 
var maxamt=$(this).closest("tr").children("td:nth-child(5)").find("input").val();
var netweigh=$(this).closest("tr").children("td:nth-child(10)").find("input").val();
totalamt=parseInt(maxamt) * parseInt(netweigh);
if(netweigh!="")
{
$(this).closest("tr").children("td:nth-child(11)").find("input").val(totalamt);	
}
});

$('#yw0 tbody tr').on('change','td:nth-child(4)',function(e){ 

var maxamtper=$(this).closest("tr").children("td:nth-child(4)").find("input").val();
var currentrate=$(this).closest("tr").children("td:nth-child(3)").find("input").val();     
maxamt=(parseInt(maxamtper)/100) * currentrate;
if(currentrate!="")
{
$(this).closest("tr").children("td:nth-child(5)").find("input").val(maxamt);
}

});
$('#yw0 tbody tr').on('change','td:nth-child(5)',function(e){ 
sum=0;
var maxamt=$(this).closest("tr").children("td:nth-child(5)").find("input").val();
var currentrate=$(this).closest("tr").children("td:nth-child(3)").find("input").val(); 

$('#yw0 .tabular-input-container tr').each(function(){  
var totalamount=$(this).closest("tr").children("td:nth-child(11)").find("input").val();
var pledgeweight=$(this).closest("tr").children("td:nth-child(10)").find("input").val();

sum=sum+parseInt(totalamount);	
if(pledgeweight!="")
{
	 $('#total_details #total_span').next().next().next().next().text(sum);
}

});

maxamtper=(parseInt(maxamt))/currentrate * 100;
if(currentrate!="")
{
$(this).closest("tr").children("td:nth-child(4)").find("input").val(maxamtper);
}

});


$('#yw0 .tabular-input-container tr').on('change','td:nth-child(6)',function(e){ 
sum=0;
sum1=0;
sum2=0;
$('#yw0 .tabular-input-container tr').each(function(){


var maxamount=$(this).closest("tr").children("td:nth-child(5)").find("input").val();
var netweight=$(this).closest("tr").children("td:nth-child(6)").find("input").val();
var pledgeweight=$(this).closest("tr").children("td:nth-child(10)").find("input").val();
var stoneweight=$(this).closest("tr").children("td:nth-child(7)").find("input").val();	
var totalamount=$(this).closest("tr").children("td:nth-child(11)").find("input").val();		

sum=sum+parseInt(netweight);
sum1=sum1+parseInt(pledgeweight);

sum2=sum2+parseInt(totalamount);
 $('#total_details #total_span').next().text(sum);

 
	if(stoneweight!=""){
 $('#total_details #total_span').next().next().next().text(sum1);
	}

if(maxamount!="" && pledgeweight!="")
{
	$('#total_details #total_span').next().next().next().next().text(sum2);
}

   
});
});

$('#yw0 .tabular-input-container tr').on('change','td:nth-child(7)',function(e){ 
sum=0;
sum1=0;
	$('#yw0 .tabular-input-container tr').each(function(){

	
	var pledgeweight=$(this).closest("tr").children("td:nth-child(10)").find("input").val();	
	var netamount=$(this).closest("tr").children("td:nth-child(11)").find("input").val();
	sum1=sum1+parseInt(netamount);
	sum=sum+parseInt(pledgeweight);
	 $('#total_details #total_span').next().next().next().text(sum);
	 $('#total_details #total_span').next().next().next().next().text(sum1);
	   
});
});

$('#yw0 .tabular-input-container tr').on('change','td:nth-child(11)',function(e){ 
sum1=0;
	$('#yw0 .tabular-input-container tr').each(function(){


	var netamount=$(this).closest("tr").children("td:nth-child(11)").find("input").val();	

	sum1=sum+parseInt(netamount);
	 $('#total_details #total_span').next().next().next().next().text(sum1);
	   
});
});

$('#yw0 .tabular-input-container tr').on('blur','td:nth-child(6)',function(e){ 

var netweight=$(this).closest("tr").children("td:nth-child(6)").find("input").val();	
 if(netweight=="")
 {
 alert("please fill the netweight");
 }

 if(netweight!="")
  if(!($.isNumeric(netweight)))
 {
	alert("please enter a numeric value");
	$(this).closest("tr").children("td:nth-child(6)").find("input").val("");
 }	
});

$('#yw0 .tabular-input-container tr').on('blur','td:nth-child(7)',function(e){ 

var stoneweight=$(this).closest("tr").children("td:nth-child(7)").find("input").val();	
 if(stoneweight=="")
 {
 alert("please fill the stone deduction");
 }

  if(stoneweight!="")
		 if(!($.isNumeric(stoneweight)))
		 {
	alert("please enter a numeric value");
	$(this).closest("tr").children("td:nth-child(7)").find("input").val("");
 }	
	 

 
});


$("#scheme").change(function(){
sum=0;
scheme=$("#scheme").val();	
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
	$('#yw0 .tabular-input-container tr').each(function(e){  
       $(this).closest("tr").children("td:nth-child(5)").find("input").val(data[1]);
       var maxamt= $(this).closest("tr").children("td:nth-child(5)").find("input").val(data[1]);
       var pledgeweight=$(this).closest("tr").children("td:nth-child(10)").find("input").val();
      netamount=parseInt(pledgeweight) * parseInt(data[1]);
      if(pledgeweight!="" && maxamt!="")
	      {
			
    	  $(this).closest("tr").children("td:nth-child(11)").find("input").val(netamount);
	      }

  		
  		var netamount=$(this).closest("tr").children("td:nth-child(11)").find("input").val();
      	sum=sum+parseInt(netamount);
      	 $('#total_details #total_span').next().next().next().next().text(sum);

  	});

	$('#mygrid1_table tbody').each(function(){

		$(this).closest('tr').children('td:nth-child(3)').text("hii");		



	});


  	
},
 dataType: 'json'
});


});

$('#amountissued').blur(function(){
	
var amountissu=$('#amountissued').val();
var net=$('#total_details #total_span').next().next().next().next().text();


if(parseInt(amountissu)>parseInt(net))
{

alert("Ammount issued should be less then Net amount");
}


});
	</script>	
	