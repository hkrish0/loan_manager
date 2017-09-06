<?php
/* @var $this BankController */
/* @var $data Bank */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('BankId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->BankId), array('view', 'id'=>$data->BankId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BankName')); ?>:</b>
	<?php echo CHtml::encode($data->BankName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Branch')); ?>:</b>
	<?php echo CHtml::encode($data->Branch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IFSCCODE')); ?>:</b>
	<?php echo CHtml::encode($data->IFSCCODE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />


</div>