<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'CustomerId'); ?>
		<?php echo $form->textField($model,'CustomerId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AddressId'); ?>
		<?php echo $form->textField($model,'AddressId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CustomerStatusId'); ?>
		<?php echo $form->textField($model,'CustomerStatusId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateMasterId'); ?>
		<?php echo $form->textField($model,'DateMasterId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FirstName'); ?>
		<?php echo $form->textField($model,'FirstName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CustomerPhoto'); ?>
		<?php echo $form->textField($model,'CustomerPhoto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Telephone'); ?>
		<?php echo $form->textField($model,'Telephone',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mobile'); ?>
		<?php echo $form->textField($model,'Mobile',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmailId'); ?>
		<?php echo $form->textField($model,'EmailId',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->