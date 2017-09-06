<?php
/* @var $this AccountgroupController */
/* @var $model Accountgroup */

$this->breadcrumbs=array(
	'Accountgroups'=>array('index'),
	$model->AccountGroupId,
);

$this->menu=array(
	array('label'=>'List Accountgroup', 'url'=>array('index')),
	array('label'=>'Create Accountgroup', 'url'=>array('create')),
	array('label'=>'Update Accountgroup', 'url'=>array('update', 'id'=>$model->AccountGroupId)),
	array('label'=>'Delete Accountgroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->AccountGroupId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Accountgroup', 'url'=>array('admin')),
);
?>

<h1>View Accountgroup #<?php echo $model->AccountGroupId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'AccountGroupId',
		'AccountName',
		'GroupUnder',
		'IsDefault',
	),
)); ?>
