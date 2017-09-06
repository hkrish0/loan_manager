<?php
/* @var $this TransactionController */
/* @var $model Transaction */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TransactionId'); ?>
		<?php echo $form->textField($model,'TransactionId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hm_id'); ?>
		<?php echo $form->textField($model,'hm_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TransactionType'); ?>
		<?php echo $form->textField($model,'TransactionType',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VoucherNo'); ?>
		<?php echo $form->textField($model,'VoucherNo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Credit'); ?>
		<?php echo $form->textField($model,'Credit',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Debit'); ?>
		<?php echo $form->textField($model,'Debit',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FromAccount'); ?>
		<?php echo $form->textField($model,'FromAccount',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ToAccount'); ?>
		<?php echo $form->textField($model,'ToAccount',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateMasterId'); ?>
		<?php echo $form->textField($model,'DateMasterId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'InterestRate'); ?>
		<?php echo $form->textField($model,'InterestRate',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Preference'); ?>
		<?php echo $form->textField($model,'Preference',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Remarks'); ?>
		<?php echo $form->textField($model,'Remarks',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->