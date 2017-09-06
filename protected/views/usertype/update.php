<?php
/* @var $this UsertypeController */
/* @var $model Usertype */

$this->breadcrumbs=array(
	'Usertypes'=>array('index'),
	$model->UserTypeId=>array('view','id'=>$model->UserTypeId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usertype', 'url'=>array('index')),
	array('label'=>'Create Usertype', 'url'=>array('create')),
	array('label'=>'View Usertype', 'url'=>array('view', 'id'=>$model->UserTypeId)),
	array('label'=>'Manage Usertype', 'url'=>array('admin')),
);
?>

<h1>Update Usertype <?php echo $model->UserTypeId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'privilege'=>$privilege,'checklist'=>$checklist)); ?>