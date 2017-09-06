<?php
/* @var $this ProducttypeController */
/* @var $model Producttype */
/* @var $form CActiveForm */
?>



<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true
)); ?>


<?php //$form=$this->beginWidget('CActiveForm', array(
	//'id'=>'producttype-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>false,
//)); ?>

<div class="column1">
<?php echo $form->textFieldRow($model, 'ProductTypeName', array('class'=>'span3','placeholder'=>'ProductTypeName','label'=>false)); ?>
<?php echo $form->textFieldRow($model, 'CurrentRate', array('class'=>'span3','placeholder'=>'CurrentRate','label'=>false)); ?>
<?php echo $form->dropDownListRow($model,'UnitMasterId',CHtml::listData(Unitmaster::model()->findAll(),'UnitMasterId', 'Unit'),array('class'=>'span3','label'=>false,'empty'=>'Select Unit'));?>

<br/>
<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Create')); ?> 
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?>

</div>
<div class="clear"></div>
<?php $this->endWidget(); ?>






