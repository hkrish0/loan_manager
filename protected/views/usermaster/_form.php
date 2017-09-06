<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */
/* @var $form CActiveForm */
?>



<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true
)); ?>

<div class="column1">

<?php echo $form->dropDownListRow($model,'UserTypeId',CHtml::listData(Usertype::model()->findAll(),'UserTypeId', 'UserType'), array(
								'required'=>'required',
								'empty'=>'Select User type','class'=>'span3','label'=>false));?>
								
	<?php echo $form->textFieldRow($model, 'UserName', array('class'=>'span3','placeholder'=>'Username','label'=>false)); ?>
<?php echo $form->passwordFieldRow($model, 'Password', array('class'=>'span3','placeholder'=>'Password','label'=>false)); ?>
<?php //echo $form->dropDownListRow($model,'BranchId',CHtml::listData(Branch::model()->findAll(),'BranchId', 'BranchName'), array(
								
								//'empty'=>'Select Branch','class'=>'span3','label'=>false));?>
								
								<?php echo $form->dropDownListRow($model,'BranchId',CHtml::listData(Branch::model()->findAll(),'BranchId', 'BranchName'), array(
								'class'=>'span3','label'=>false ));?>
<?php echo $form->textAreaRow($model, 'Description', array('class'=>'span3','placeholder'=>'Description','label'=>false)); ?>
</br>
<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Create')); ?> 
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?>
</div>
<div class="clear"></div>

<?php $this->endWidget(); ?>
	





<?php /*$form=$this->beginWidget('CActiveForm', array(
	'id'=>'usermaster-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'UserTypeId'); ?>
		<?php echo $form->textField($model,'UserTypeId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'UserTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserName'); ?>
		<?php echo $form->textField($model,'UserName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'UserName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CreatedDate'); ?>
		<?php echo $form->textField($model,'CreatedDate'); ?>
		<?php echo $form->error($model,'CreatedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->*/