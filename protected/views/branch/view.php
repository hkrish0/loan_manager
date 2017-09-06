<?php
/* @var $this BranchController */
/* @var $model Branch */

$this->breadcrumbs=array(
	'Branches'=>array('index'),
	$model->BranchId,
);

$this->menu=array(
	array('label'=>'List Branch', 'url'=>array('index')),
	array('label'=>'Create Branch', 'url'=>array('create')),
	array('label'=>'Update Branch', 'url'=>array('update', 'id'=>$model->BranchId)),
	array('label'=>'Delete Branch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->BranchId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Branch', 'url'=>array('admin')),
);
?>

<h1>View Branch #<?php echo $model->BranchId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'BranchId',
		'AddressId',
		'DateMasterId',
		'BranchCode',
		'BranchName',
	),
)); ?>
