<?php
/* @var $this GoldrateController */
/* @var $data Goldrate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GoldRateId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GoldRateId), array('view', 'id'=>$data->GoldRateId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProductTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->ProductTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->DateMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PreviousRate')); ?>:</b>
	<?php echo CHtml::encode($data->PreviousRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CurrentRate')); ?>:</b>
	<?php echo CHtml::encode($data->CurrentRate); ?>
	<br />


</div>