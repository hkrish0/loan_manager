<?php
/* @var $this AccountgroupController */
/* @var $model Accountgroup */

$this->breadcrumbs=array(
	'Accountgroups'=>array('index'),
	$model->AccountGroupId=>array('view','id'=>$model->AccountGroupId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Accountgroup', 'url'=>array('index')),
	array('label'=>'Create Accountgroup', 'url'=>array('create')),
	array('label'=>'View Accountgroup', 'url'=>array('view', 'id'=>$model->AccountGroupId)),
	array('label'=>'Manage Accountgroup', 'url'=>array('admin')),
);
?>

<h1>Update Accountgroup <?php echo $model->AccountGroupId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>