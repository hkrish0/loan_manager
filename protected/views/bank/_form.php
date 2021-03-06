<?php
/* @var $this BankController */
/* @var $model Bank */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bank-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'BankName'); ?>
		<?php echo $form->textField($model,'BankName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'BankName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Branch'); ?>
		<?php echo $form->textField($model,'Branch',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Branch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IFSCCODE'); ?>
		<?php echo $form->textField($model,'IFSCCODE',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'IFSCCODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Address'); ?>
		<?php echo $form->textField($model,'Address',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->