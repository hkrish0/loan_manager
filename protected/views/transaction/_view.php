<?php
/* @var $this TransactionController */
/* @var $data Transaction */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TransactionId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TransactionId), array('view', 'id'=>$data->TransactionId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hm_id')); ?>:</b>
	<?php echo CHtml::encode($data->hm_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TransactionType')); ?>:</b>
	<?php echo CHtml::encode($data->TransactionType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VoucherNo')); ?>:</b>
	<?php echo CHtml::encode($data->VoucherNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Credit')); ?>:</b>
	<?php echo CHtml::encode($data->Credit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Debit')); ?>:</b>
	<?php echo CHtml::encode($data->Debit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FromAccount')); ?>:</b>
	<?php echo CHtml::encode($data->FromAccount); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ToAccount')); ?>:</b>
	<?php echo CHtml::encode($data->ToAccount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->DateMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InterestRate')); ?>:</b>
	<?php echo CHtml::encode($data->InterestRate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Preference')); ?>:</b>
	<?php echo CHtml::encode($data->Preference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Remarks')); ?>:</b>
	<?php echo CHtml::encode($data->Remarks); ?>
	<br />

	*/ ?>

</div>