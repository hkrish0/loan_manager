<?php
/* @var $this CityController */
/* @var $data Citymaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityMasterId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CityMasterId), array('view', 'id'=>$data->CityMasterId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DistrictMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->DistrictMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />


</div>