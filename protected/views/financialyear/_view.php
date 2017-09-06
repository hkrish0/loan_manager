<?php
/* @var $this FinancialyearController */
/* @var $data Financialyearmaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('FinancialYearMasterId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->FinancialYearMasterId), array('view', 'id'=>$data->FinancialYearMasterId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FinancialYearName')); ?>:</b>
	<?php echo CHtml::encode($data->FinancialYearName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FromDate')); ?>:</b>
	<?php echo CHtml::encode($data->FromDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ToDate')); ?>:</b>
	<?php echo CHtml::encode($data->ToDate); ?>
	<br />


</div>