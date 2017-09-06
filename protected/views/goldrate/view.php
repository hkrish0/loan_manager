<?php
/* @var $this GoldrateController */
/* @var $model Goldrate */

$this->breadcrumbs=array(
	'Goldrates'=>array('index'),
	$model->GoldRateId,
);

$this->menu=array(
	array('label'=>'List Goldrate', 'url'=>array('index')),
	array('label'=>'Create Goldrate', 'url'=>array('create')),
	array('label'=>'Update Goldrate', 'url'=>array('update', 'id'=>$model->GoldRateId)),
	array('label'=>'Delete Goldrate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GoldRateId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Goldrate', 'url'=>array('admin')),
);
?>

<h1>View Goldrate #<?php echo $model->GoldRateId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'GoldRateId',
		'ProductTypeId',
		'DateMasterId',
		'PreviousRate',
		'CurrentRate',
	),
)); ?>
