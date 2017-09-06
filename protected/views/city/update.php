<?php
/* @var $this CityController */
/* @var $model Citymaster */

$this->breadcrumbs=array(
	'Citymasters'=>array('index'),
	$model->CityMasterId=>array('view','id'=>$model->CityMasterId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Citymaster', 'url'=>array('index')),
	array('label'=>'Create Citymaster', 'url'=>array('create')),
	array('label'=>'View Citymaster', 'url'=>array('view', 'id'=>$model->CityMasterId)),
	array('label'=>'Manage Citymaster', 'url'=>array('admin')),
);
?>

<h1>Update Citymaster <?php echo $model->CityMasterId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>