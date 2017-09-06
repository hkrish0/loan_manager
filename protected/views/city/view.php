<?php
/* @var $this CityController */
/* @var $model Citymaster */

$this->breadcrumbs=array(
	'Citymasters'=>array('index'),
	$model->CityMasterId,
);

$this->menu=array(
	array('label'=>'List Citymaster', 'url'=>array('index')),
	array('label'=>'Create Citymaster', 'url'=>array('create')),
	array('label'=>'Update Citymaster', 'url'=>array('update', 'id'=>$model->CityMasterId)),
	array('label'=>'Delete Citymaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CityMasterId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Citymaster', 'url'=>array('admin')),
);
?>

<h1>View Citymaster #<?php echo $model->CityMasterId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CityMasterId',
		'DistrictMasterId',
		'City',
	),
)); ?>
