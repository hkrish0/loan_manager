<?php
/* @var $this SchemeController */
/* @var $model Scheme */

$this->breadcrumbs=array(
	'Schemes'=>array('index'),
	$model->SchemeId,
);

$this->menu=array(
	array('label'=>'List Scheme', 'url'=>array('index')),
	array('label'=>'Create Scheme', 'url'=>array('create')),
	array('label'=>'Update Scheme', 'url'=>array('update', 'id'=>$model->SchemeId)),
	array('label'=>'Delete Scheme', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SchemeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Scheme', 'url'=>array('admin')),
);
?>

<h1>View Scheme #<?php echo $model->SchemeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SchemeId',
		'ProductTypeId',
		'SchemeName',
		'InterestRate',
		'MaxAmtInPer',
		'MaximumAmt',
		'Duration',
	),
)); ?>
