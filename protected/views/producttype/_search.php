<?php
/* @var $this ProducttypeController */
/* @var $model Producttype */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ProductTypeId'); ?>
		<?php echo $form->textField($model,'ProductTypeId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProductTypeName'); ?>
		<?php echo $form->textField($model,'ProductTypeName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CurrentRate'); ?>
		<?php echo $form->textField($model,'CurrentRate',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Unit'); ?>
		<?php echo $form->textField($model,'Unit',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->