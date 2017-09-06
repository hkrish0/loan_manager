<?php
/* @var $this SchemeController */
/* @var $data Scheme */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SchemeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SchemeId), array('view', 'id'=>$data->SchemeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProductTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->ProductTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SchemeName')); ?>:</b>
	<?php echo CHtml::encode($data->SchemeName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InterestRate')); ?>:</b>
	<?php echo CHtml::encode($data->InterestRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaxAmtInPer')); ?>:</b>
	<?php echo CHtml::encode($data->MaxAmtInPer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaximumAmt')); ?>:</b>
	<?php echo CHtml::encode($data->MaximumAmt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Duration); ?>
	<br />


</div>