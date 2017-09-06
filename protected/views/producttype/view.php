<?php
/* @var $this ProducttypeController */
/* @var $model Producttype */

$this->breadcrumbs=array(
	'Producttypes'=>array('index'),
	$model->ProductTypeId,
);

$this->menu=array(
	array('label'=>'List Producttype', 'url'=>array('index')),
	array('label'=>'Create Producttype', 'url'=>array('create')),
	array('label'=>'Update Producttype', 'url'=>array('update', 'id'=>$model->ProductTypeId)),
	array('label'=>'Delete Producttype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ProductTypeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Producttype', 'url'=>array('admin')),
);
?>

<h1>View Producttype #<?php echo $model->ProductTypeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ProductTypeId',
		'ProductTypeName',
		'CurrentRate',
		'Unit',
	),
)); ?>
