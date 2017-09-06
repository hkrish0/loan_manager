<?php
/* @var $this GoldrateController */
/* @var $model Goldrate */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'GoldRateId'); ?>
		<?php echo $form->textField($model,'GoldRateId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProductTypeId'); ?>
		<?php echo $form->textField($model,'ProductTypeId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateMasterId'); ?>
		<?php echo $form->textField($model,'DateMasterId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PreviousRate'); ?>
		<?php echo $form->textField($model,'PreviousRate',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CurrentRate'); ?>
		<?php echo $form->textField($model,'CurrentRate',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->