<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'UserMasterId'); ?>
		<?php echo $form->textField($model,'UserMasterId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserTypeId'); ?>
		<?php echo $form->textField($model,'UserTypeId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserName'); ?>
		<?php echo $form->textField($model,'UserName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreatedDate'); ?>
		<?php echo $form->textField($model,'CreatedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->