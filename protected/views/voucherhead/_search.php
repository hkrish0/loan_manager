<?php
/* @var $this VoucherheadController */
/* @var $model Voucherhead */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'VoucherHeadId'); ?>
		<?php echo $form->textField($model,'VoucherHeadId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VoucherMasterId'); ?>
		<?php echo $form->textField($model,'VoucherMasterId',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AccountGroupId'); ?>
		<?php echo $form->textField($model,'AccountGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VoucherHead'); ?>
		<?php echo $form->textField($model,'VoucherHead',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Number'); ?>
		<?php echo $form->textField($model,'Number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->