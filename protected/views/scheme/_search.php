<?php
/* @var $this SchemeController */
/* @var $model Scheme */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'SchemeId'); ?>
		<?php echo $form->textField($model,'SchemeId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ProductTypeId'); ?>
		<?php echo $form->textField($model,'ProductTypeId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SchemeName'); ?>
		<?php echo $form->textField($model,'SchemeName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'InterestRate'); ?>
		<?php echo $form->textField($model,'InterestRate',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaxAmtInPer'); ?>
		<?php echo $form->textField($model,'MaxAmtInPer',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaximumAmt'); ?>
		<?php echo $form->textField($model,'MaximumAmt',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Duration'); ?>
		<?php echo $form->textField($model,'Duration'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->