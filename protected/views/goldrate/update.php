<?php
/* @var $this GoldrateController */
/* @var $model Goldrate */

$this->breadcrumbs=array(
	'Goldrates'=>array('index'),
	$model->GoldRateId=>array('view','id'=>$model->GoldRateId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Goldrate', 'url'=>array('index')),
	array('label'=>'Create Goldrate', 'url'=>array('create')),
	array('label'=>'View Goldrate', 'url'=>array('view', 'id'=>$model->GoldRateId)),
	array('label'=>'Manage Goldrate', 'url'=>array('admin')),
);
?>

<h1>Update Goldrate <?php echo $model->GoldRateId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>