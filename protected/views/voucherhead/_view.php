<?php
/* @var $this VoucherheadController */
/* @var $data Voucherhead */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoucherHeadId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->VoucherHeadId), array('view', 'id'=>$data->VoucherHeadId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoucherMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->VoucherMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccountGroupId')); ?>:</b>
	<?php echo CHtml::encode($data->AccountGroupId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoucherHead')); ?>:</b>
	<?php echo CHtml::encode($data->VoucherHead); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Number')); ?>:</b>
	<?php echo CHtml::encode($data->Number); ?>
	<br />


</div>