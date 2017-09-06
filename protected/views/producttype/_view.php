<?php
/* @var $this ProducttypeController */
/* @var $data Producttype */
?>

<div class="view">

	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProductTypeName')); ?>:</b>
	<?php echo CHtml::encode($data->ProductTypeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CurrentRate')); ?>:</b>
	<?php echo CHtml::encode($data->CurrentRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Unit')); ?>:</b>
	<?php echo CHtml::encode($data->Unit); ?>
	<br />


</div>