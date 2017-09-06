<?php
/* @var $this BranchController */
/* @var $data Branch */
?>

<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('BranchId')); ?></b>
	<?php // echo CHtml::link(CHtml::encode($data->BranchId), array('view', 'id'=>$data->BranchId)); ?>


	<b><?php //echo CHtml::encode($data->getAttributeLabel('AddressId')); ?></b>
	<?php //echo CHtml::encode($data->AddressId); ?>


	<b><?php //echo CHtml::encode($data->getAttributeLabel('DateMasterId')); ?></b>
	<?php //echo CHtml::encode($data->DateMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BranchCode')); ?>:</b>
	<?php echo CHtml::encode($data->BranchCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BranchName')); ?>:</b>
	<?php echo CHtml::encode($data->BranchName); ?>
	<br />


</div>