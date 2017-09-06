

<h1>Receipts</h1>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>


<div class="column1">
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
													'class' => 'span2',
													'placeholder'=>'Date',
													'value'=>CTimestamp::formatDate('Y-m-d'),
													'autocomplete'=>false,
													'label'=>false
													//'required'=>'required'                             
                                )
									));					
					?>
	<?php echo CHtml::label('Voucher No',''); ?>
	<?php echo $form->textFieldRow($model,'VoucherNo',array('size'=>45,'maxlength'=>45,'label'=>false,'value'=>$voucher)); ?>
	<?php echo CHtml::textField('fromrec','',array('size'=>45,'maxlength'=>45,'label'=>false,'value'=>'')); ?>
		
	<?php echo CHtml::label('Ledger Master',''); ?>
	<?php echo $form->dropDownListRow($model,'AccountGroupId',CHtml::listData(Accountgroup::model()->findAll(),'AccountGroupId', 'AccountName'), array(
								'empty'=>'Select Ledger Type','class'=>'span3','label'=>false));?>
	
		
	<?php $branch=CHtml::listData(Branch::model()->findAll(),'BranchId', 'BranchName');?>
	<?php $bank=CHtml::listData(Bank::model()->findAll(),'BankId', 'BankName');?>
	
			<?php echo CHtml::label('From',''); ?>
		<?php echo CHtml::dropDownList('FromAccount','',$bank + $branch, array(
								'class'=>'span3','label'=>false,'empty'=>'Select Bank/branch'));?>
								
		
<?php echo CHtml::label('To',''); ?>
	<?php echo CHtml::dropDownList('ToAccount','',$headoffice, array(
								'class'=>'span3','label'=>false));?>
	
	
	
					
								
	<?php echo CHtml::label('Amount',''); ?>
	<?php echo $form->textFieldRow($model,'Debit',array('size'=>12,'maxlength'=>12,'label'=>false)); ?>
	<?php echo CHtml::label('InterestRate',''); ?>
	<?php echo $form->textFieldRow($model,'InterestRate',array('size'=>10,'maxlength'=>10,'label'=>false)); ?>
	<?php echo CHtml::label('Remarks',''); ?>
	<?php echo $form->textAreaRow($model,'Remarks',array('size'=>45,'maxlength'=>45,'label'=>false)); ?>
	
	
	
<?php $this->widget('zii.widgets.jui.CJuiButton',array(
    'buttonType'=>'button',
    'name'=>'btnSave',
    'caption'=>'Create',
    'onclick'=>new CJavaScriptExpression('function(){payments() }'),
));?>
	
	
</div>
<div class="clear"></div>
<?php $this->endWidget(); ?>

<script>

$('#FromAccount').change(function(){
	var fromaccount=$('#FromAccount :selected').text();
		$('#fromrec').val(fromaccount);

		
	});

function payments(){

$.ajax({
	 
    type: "POST",
    url: "<?php echo Yii::app()->createUrl('transaction/receipt');?>",
    data:$("#verticalForm").serialize(),
   success:function(data){
   	alert("successfuly saved");

   	
	    }	   
});	


}
</script>