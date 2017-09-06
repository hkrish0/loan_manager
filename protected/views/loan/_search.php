<?php
/* @var $this LoanController */
/* @var $model Loanmaster */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'LoanMasterId'); ?>
		<?php echo $form->textField($model,'LoanMasterId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CustomerId'); ?>
		<?php echo $form->textField($model,'CustomerId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BranchId'); ?>
		<?php echo $form->textField($model,'BranchId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LoanStatusId'); ?>
		<?php echo $form->textField($model,'LoanStatusId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateMasterId'); ?>
		<?php echo $form->textField($model,'DateMasterId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserMasterId'); ?>
		<?php echo $form->textField($model,'UserMasterId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SchemeId'); ?>
		<?php echo $form->textField($model,'SchemeId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LoanNumber'); ?>
		<?php echo $form->textField($model,'LoanNumber',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->