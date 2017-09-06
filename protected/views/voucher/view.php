<?php
/* @var $this VoucherController */
/* @var $model Voucher */

$this->breadcrumbs=array(
	'Vouchers'=>array('index'),
	$model->VoucherId,
);

$this->menu=array(
	array('label'=>'List Voucher', 'url'=>array('index')),
	array('label'=>'Create Voucher', 'url'=>array('create')),
	array('label'=>'Update Voucher', 'url'=>array('update', 'id'=>$model->VoucherId)),
	array('label'=>'Delete Voucher', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->VoucherId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Voucher', 'url'=>array('admin')),
);
?>

<h1>View Voucher #<?php echo $model->VoucherId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'VoucherId',
		'VoucherMasterId',
		'DateMasterId',
		'FromLedgerId',
		'ToLedgerId',
		'VoucherHead',
		'VoucherNumber',
		'Amount',
		'Description',
	),
)); ?>
