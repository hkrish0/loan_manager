<?php
/* @var $this GoldrateController */
/* @var $model Goldrate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goldrate-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ProductTypeId'); ?>
		<?php echo $form->textField($model,'ProductTypeId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ProductTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateMasterId'); ?>
		<?php echo $form->textField($model,'DateMasterId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'DateMasterId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PreviousRate'); ?>
		<?php echo $form->textField($model,'PreviousRate',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'PreviousRate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CurrentRate'); ?>
		<?php echo $form->textField($model,'CurrentRate',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'CurrentRate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->