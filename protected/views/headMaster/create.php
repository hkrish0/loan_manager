<?php
/* @var $this HeadMasterController */
/* @var $model HeadMaster */

$this->breadcrumbs=array(
	'Head Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HeadMaster', 'url'=>array('index')),
	array('label'=>'Manage HeadMaster', 'url'=>array('admin')),
);
?>

<h1>Create HeadMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>