<?php
/* @var $this VoucherheadController */
/* @var $model Voucherhead */

$this->breadcrumbs=array(
	'Voucherheads'=>array('index'),
	$model->VoucherHeadId,
);

$this->menu=array(
	array('label'=>'List Voucherhead', 'url'=>array('index')),
	array('label'=>'Create Voucherhead', 'url'=>array('create')),
	array('label'=>'Update Voucherhead', 'url'=>array('update', 'id'=>$model->VoucherHeadId)),
	array('label'=>'Delete Voucherhead', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->VoucherHeadId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Voucherhead', 'url'=>array('admin')),
);
?>

<h1>View Voucherhead #<?php echo $model->VoucherHeadId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'VoucherHeadId',
		'VoucherMasterId',
		'AccountGroupId',
		'VoucherHead',
		'Number',
	),
)); ?>
