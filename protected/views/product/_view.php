<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProductCode')); ?>:</b>
	<?php echo CHtml::encode($data->ProductCode); ?>
	<br />
	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ProductTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->productType->ProductTypeName); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProductName')); ?>:</b>
	<?php echo CHtml::encode($data->ProductName); ?>
	<br />

	

</div>