<?php
/* @var $this BankController */
/* @var $model Bank */

$this->breadcrumbs=array(
	'Banks'=>array('index'),
	$model->BankId,
);

$this->menu=array(
	array('label'=>'List Bank', 'url'=>array('index')),
	array('label'=>'Create Bank', 'url'=>array('create')),
	array('label'=>'Update Bank', 'url'=>array('update', 'id'=>$model->BankId)),
	array('label'=>'Delete Bank', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->BankId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bank', 'url'=>array('admin')),
);
?>

<h1>View Bank #<?php echo $model->BankId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'BankId',
		'BankName',
		'Branch',
		'IFSCCODE',
		'Address',
	),
)); ?>
