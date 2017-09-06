<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true
)); ?>



<?php 
//$form=$this->beginWidget('CActiveForm', array(
	//'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>false,
//)); ?>
<div class="column1">
<?php echo $form->textFieldRow($model, 'ProductCode', array('class'=>'span3','placeholder'=>'ProductCode','label'=>false)); ?>

<?php echo $form->textFieldRow($model, 'ProductName', array('class'=>'span3','placeholder'=>'ProductName','label'=>false)); ?>
<?php echo $form->textAreaRow($model, 'Description', array('class'=>'span3','placeholder'=>'Description','label'=>false)); ?>
<br/>
<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','label'=>'Create')); ?> 
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?>
</div>
<div class="clear"></div>
<?php $this->endWidget(); ?>	
</div>
<script>

function listproducts(){

	window.location.href = 'index'; 
		  
}

</script>

