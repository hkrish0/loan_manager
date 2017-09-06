<?php
/* @var $this TransactionController */
/* @var $model Transaction */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	$model->TransactionId,
);

$this->menu=array(
	array('label'=>'List Transaction', 'url'=>array('index')),
	array('label'=>'Create Transaction', 'url'=>array('create')),
	array('label'=>'Update Transaction', 'url'=>array('update', 'id'=>$model->TransactionId)),
	array('label'=>'Delete Transaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TransactionId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Transaction', 'url'=>array('admin')),
);
?>

<h1>View Transaction #<?php echo $model->TransactionId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TransactionId',
		'hm_id',
		'TransactionType',
		'VoucherNo',
		'Credit',
		'Debit',
		'FromAccount',
		'ToAccount',
		'DateMasterId',
		'InterestRate',
		'Preference',
		'Remarks',
	),
)); ?>
