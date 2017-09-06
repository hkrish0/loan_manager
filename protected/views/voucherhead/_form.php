<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>
	
	<div class="column1">
	<?php echo $form->textFieldRow($model,'VoucherHead',array('size'=>45,'maxlength'=>45,'label'=>false,'placeholder'=>'Voucher Head')); ?>	
	
	<?php echo $form->dropDownListRow($model,'VoucherMasterId',CHtml::listData(Vouchermaster::model()->findAll(),'VoucherMasterId', 'VoucherMaster'), array(
								'empty'=>'Select Voucher Master','class'=>'span3','label'=>false));?>	
	
	
<?php $account=CHtml::listData(Accountgroup::model()->findAllByAttributes(array('IsDefault'=>0)),'AccountGroupId', 'AccountName');?>
	
	
<?php echo $form->dropDownListRow($model,'AccountGroupId',$account, array(
								'empty'=>'Select Ledger Account','class'=>'span3','label'=>false));?>
	
	
	
	
	<?php echo $form->textFieldRow($model,'Number',array('size'=>45,'maxlength'=>45,'label'=>false,'placeholder'=>'Number')); ?>	
	
	
	<br/>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	
</div>

<div class="clear"></div>
<?php $this->endWidget(); ?>
