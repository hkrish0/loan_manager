<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>

	<div class="column1">
<?php echo $form->textFieldRow($model,'AccountName',array('size'=>45,'maxlength'=>45,'label'=>false,'placeholder'=>' Ledger Account')); ?>	



<?php echo $form->dropDownListRow($model,'GroupUnder',CHtml::listData(AccountGroup::model()->findAll(),'AccountGroupId', 'AccountName'), array(
								'empty'=>'Ledger Sub','class'=>'span3','label'=>false));?>
	
	
	<br/>

	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	<div class="clear"></div>

<?php $this->endWidget(); ?>

