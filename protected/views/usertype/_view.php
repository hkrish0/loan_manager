<?php
/* @var $this UsertypeController */
/* @var $data Usertype */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserTypeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->UserTypeId), array('view', 'id'=>$data->UserTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BranchId')); ?>:</b>
	<?php echo CHtml::encode($data->BranchId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserType')); ?>:</b>
	<?php echo CHtml::encode($data->UserType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />


</div>