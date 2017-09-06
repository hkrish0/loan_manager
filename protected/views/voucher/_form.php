
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>

<div class="column1">

<?php 
echo "Voucher No    ";

 $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'inverse', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$voucherno,
));
?>


	<?php 	
							$this->widget('zii.widgets.jui.CJuiDatePicker',
									array(
											'attribute'=>'TransactionDate',
											'name'=>'Date',
											'model'=>$date,
											'value' => $date->TransactionDate,
											'options'=> array(
													'changeMonth'=>true,
													'changeYear'=>true,
													'showAnim'=>'fold',
													'showButtonPanel'=>true,
													'autoSize'=>true,
													'dateFormat'=>'yy-mm-dd',
													'defaultDate'=>$date->TransactionDate,
											),
											'htmlOptions'=>array(
													'class' => 'span3',
													'placeholder'=>'Date',
													'value'=>CTimestamp::formatDate('Y-m-d'),
													'autocomplete'=>false,
													'label'=>false
													//'required'=>'required'                             
                                )
									));					
					?>



					
<?php echo $form->dropDownListRow($model,'VoucherMasterId',CHtml::listData(Vouchermaster::model()->findAll(),'VoucherMasterId', 'VoucherMaster'), array(
								'empty'=>'Select Voucher Master','class'=>'span3','label'=>false));?>						
					

<?php echo $form->dropDownListRow($model,'VoucherHeadId',CHtml::listData(Voucherhead::model()->findAll(),'VoucherHeadId', 'VoucherHead'), array(
								'empty'=>'Select Voucher Head','class'=>'span3','label'=>false));?>					
				

<?php //echo $form->textFieldRow($model,'VoucherNumber',array('size'=>45,'maxlength'=>45,'label'=>false,'placeholder'=>'Voucher Number')); ?>	

<?php echo $form->hiddenField($model, 'VoucherNumber', array('class'=>'span3','value'=>$voucherno));?>


</div>


<div class="column2">
	
	
	<?php $account=CHtml::listData(Accountgroup::model()->findAllByAttributes(array('IsDefault'=>1)),'AccountGroupId', 'AccountName');?>
	
	
<?php echo $form->dropDownListRow($model,'AccountGroupId',$account, array(
								'empty'=>'From Ledger Account','class'=>'span3','label'=>false));?>

<?php echo CHtml::dropDownList('ToAccount','',$account, array(
								'class'=>'span3','label'=>false,'empty'=>'To Ledger Account'));?>

<?php echo $form->textFieldRow($model,'Credit',array('size'=>45,'maxlength'=>45,'label'=>false,'placeholder'=>'Amount')); ?>	

<?php echo $form->textAreaRow($model,'Description',array('size'=>45,'maxlength'=>45,'label'=>false,'placeholder'=>'Narration')); ?>	

<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	
	
</div>	

<div class="clear">
	

<?php $this->endWidget(); ?>


<script>

$('#Voucher_LedgerId').change(function(){

alert($('#Voucher_LedgerId').val());
	
});


</script>
