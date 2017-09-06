<?php
/* @var $this CustomerController */
/* @var $data Customer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CustomerId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CustomerId), array('view', 'id'=>$data->CustomerId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AddressId')); ?>:</b>
	<?php echo CHtml::encode($data->AddressId); ?>
	<br />


	<?php echo CHtml::encode($data->customer->LoanMasterId); 
	$loan=Loanmaster::model()->findByAttributes(array('CustomerId'=>$data->CustomerId));
	echo "hello" .$loan->LoanMasterId;?>

<br/>

	<b><?php echo CHtml::encode($data->getAttributeLabel('CustomerStatusId')); ?>:</b>
	<?php echo CHtml::encode($data->CustomerStatusId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateMasterId')); ?>:</b>
	<?php echo CHtml::encode($data->DateMasterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CustomerName')); ?>:</b>
	<?php echo CHtml::encode($data->CustomerName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CustomerPhoto')); ?>:</b>
	<?php echo CHtml::encode($data->CustomerPhoto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telephone')); ?>:</b>
	<?php echo CHtml::encode($data->Telephone); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Mobile')); ?>:</b>
	<?php echo CHtml::encode($data->Mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmailId')); ?>:</b>
	<?php echo CHtml::encode($data->EmailId); ?>
	<br />

	*/ ?>

</div>