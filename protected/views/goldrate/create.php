<?php
/* @var $this GoldrateController */
/* @var $model Goldrate */

$this->breadcrumbs=array(
	'Goldrates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Goldrate', 'url'=>array('index')),
	array('label'=>'Manage Goldrate', 'url'=>array('admin')),
);
?>

<h1>Create Goldrate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>