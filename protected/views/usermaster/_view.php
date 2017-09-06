<?php
/* @var $this UsermasterController */
/* @var $data Usermaster */
?>

<div class="view">

	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('UserTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->userType->UserType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserName')); ?>:</b>
	<?php echo CHtml::encode($data->UserName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedDate')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedDate); ?>
	<br />

	

</div>