<?php
/* @var $this HeadMasterController */
/* @var $data HeadMaster */
?>

<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('hm_id')); ?></b>
	<?php //echo CHtml::link(CHtml::encode($data->hm_id), array('view', 'id'=>$data->hm_id)); ?>
	<br />

	<b><?php // echo CHtml::encode($data->getAttributeLabel('hm_name')); ?></b>
	<?php echo CHtml::encode($data->hm_name); ?>
	<br />


</div>