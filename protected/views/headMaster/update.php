<?php
/* @var $this HeadMasterController */
/* @var $model HeadMaster */

$this->breadcrumbs=array(
	'Head Masters'=>array('index'),
	$model->hm_id=>array('view','id'=>$model->hm_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HeadMaster', 'url'=>array('index')),
	array('label'=>'Create HeadMaster', 'url'=>array('create')),
	array('label'=>'View HeadMaster', 'url'=>array('view', 'id'=>$model->hm_id)),
	array('label'=>'Manage HeadMaster', 'url'=>array('admin')),
);
?>

<h1>Update HeadMaster <?php echo $model->hm_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>