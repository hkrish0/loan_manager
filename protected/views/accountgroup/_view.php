<?php
/* @var $this AccountgroupController */
/* @var $data Accountgroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccountGroupId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->AccountGroupId), array('view', 'id'=>$data->AccountGroupId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AccountName')); ?>:</b>
	<?php echo CHtml::encode($data->AccountName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupUnder')); ?>:</b>
	<?php echo CHtml::encode($data->GroupUnder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsDefault')); ?>:</b>
	<?php echo CHtml::encode($data->IsDefault); ?>
	<br />


</div>