<?php
/* @var $this UsertypeController */
/* @var $model Usertype */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
		//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>


<div class="column1">
	<?php echo $form->textFieldRow($model, 'UserType', array('class'=>'span3','placeholder'=>'UserType','label'=>false)); ?>

	<?php echo $form->textFieldRow($model, 'Description', array('class'=>'span3','placeholder'=>'Description','label'=>false)); ?>

	
   	</div>
  
 <div class="clear"></div>
  	<div class="alert alert-success">
			<b>Privilege Settings</b>
		</div>

<?php $controllers = array('branch'=>'Branch','city'=>'City','loan'=>'Loan','customer'=>'Customer','producttype'=>'Producttype','product'=>'Product','scheme'=>'Scheme','usertype'=>'Usertype','user'=>'User','accountgroup'=>'Accounting/Ledger/LedgerMaster','bank'=>'OD Settings','transaction'=>'OD Payments/Receipts/Statements','voucher'=>'Voucher/Day Book/Cash Book/Bank Book','voucherhead'=>'Voucher Master','financialyear'=>'Fiscal Year')?>



<div id="privilege_settings" style="line-height:30px">

 
<?php

echo CHtml::activeCheckBoxList($privilege,'PrivilegeName',$controllers,array('labelOptions'=>array('style'=>'display:inline')));


?>
</div>
 <br/>
 <br/>
 <br/>
 <br/>
 <?php 
 $this->widget('zii.widgets.jui.CJuiButton',array(
    'buttonType'=>'button',
    'name'=>'btnSave',
    'caption'=>'Create',
    'onclick'=>new CJavaScriptExpression('function(){privilege_assign() }'),
));
?>
<?php 
 $this->widget('zii.widgets.jui.CJuiButton',array(
    'buttonType'=>'button',
    'name'=>'btnUpdate',
    'caption'=>'Update',
    'onclick'=>new CJavaScriptExpression('function(){privilege_assign_update() }'),
));
?>




<?php $this->endWidget(); ?>
<script>


function privilege_assign(){
	$.ajax({
		 dataType: "json",		 
	     type: "POST",
	     data:$("#verticalForm").serialize(),
	     url: "../usertype/create",
	     
	    	success:function(data){
	    	
	    	alert("user type successfully created");
	    	    		 
		    }	   
	});	
}

function privilege_assign_update(){
	$.ajax({
		 dataType: "json",		 
	     type: "POST",
	     data:$("#verticalForm").serialize(),
	     url: "../usertype/update",
	     
	    	success:function(data){
	    	alert(data);
	    	alert("user type successfully updated");
	    	    		 
		    }	   
	});	
}


</script>
