<?php
/* @var $this LoanController */
/* @var $data Loanmaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LoanMasterId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LoanMasterId), array('view', 'id'=>$data->LoanMasterId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CustomerId')); ?>:</b>
	<?php echo CHtml::encode($data->CustomerId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BranchId')); ?>:</b>
	<?php echo CHtml::encode($data->BranchId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LoanStatusId')); ?>:</b>
	<?php echo CHtml::encode($data->LoanStatusId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->DateMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->UserMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SchemeId')); ?>:</b>
	<?php echo CHtml::encode($data->SchemeId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('LoanNumber')); ?>:</b>
	<?php echo CHtml::encode($data->LoanNumber); ?>
	<br />

	*/ ?>

</div>