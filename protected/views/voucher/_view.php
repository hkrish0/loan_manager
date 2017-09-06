<?php
/* @var $this VoucherController */
/* @var $data Voucher */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoucherId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->VoucherId), array('view', 'id'=>$data->VoucherId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoucherMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->VoucherMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->DateMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FromLedgerId')); ?>:</b>
	<?php echo CHtml::encode($data->FromLedgerId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ToLedgerId')); ?>:</b>
	<?php echo CHtml::encode($data->ToLedgerId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoucherHead')); ?>:</b>
	<?php echo CHtml::encode($data->VoucherHead); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoucherNumber')); ?>:</b>
	<?php echo CHtml::encode($data->VoucherNumber); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	*/ ?>

</div>