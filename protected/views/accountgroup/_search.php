<?php
/* @var $this AccountgroupController */
/* @var $model Accountgroup */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'AccountGroupId'); ?>
		<?php echo $form->textField($model,'AccountGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AccountName'); ?>
		<?php echo $form->textField($model,'AccountName',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GroupUnder'); ?>
		<?php echo $form->textField($model,'GroupUnder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IsDefault'); ?>
		<?php echo $form->textField($model,'IsDefault'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->