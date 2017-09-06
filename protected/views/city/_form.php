<?php
/* @var $this CityController */
/* @var $model Citymaster */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
		//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	

	<div class="column1">
	<?php echo $form->textFieldRow($model, 'City', array('class'=>'span3','placeholder'=>'City','label'=>false)); ?>
	<br/>
	
	<?php echo $form->dropDownListRow($model,'DistrictMasterId',CHtml::listData(Districtmaster::model()->findAll(),'DistrictMasterId', 'District'),array('class'=>'span3','label'=>false,'empty'=>'Select District'));?>
	
	</div>
	<div class="clear"></div>
	<br/>
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?>	
		
	

<?php $this->endWidget(); ?>

