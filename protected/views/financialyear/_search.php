<?php
/* @var $this FinancialyearController */
/* @var $model Financialyearmaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'FinancialYearMasterId'); ?>
		<?php echo $form->textField($model,'FinancialYearMasterId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FinancialYearName'); ?>
		<?php echo $form->textField($model,'FinancialYearName',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FromDate'); ?>
		<?php echo $form->textField($model,'FromDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ToDate'); ?>
		<?php echo $form->textField($model,'ToDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->