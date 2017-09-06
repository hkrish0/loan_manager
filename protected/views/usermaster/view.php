<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */

$this->breadcrumbs=array(
	'Usermasters'=>array('index'),
	$model->UserMasterId,
);

$this->menu=array(
	array('label'=>'List Usermaster', 'url'=>array('index')),
	array('label'=>'Create Usermaster', 'url'=>array('create')),
	array('label'=>'Update Usermaster', 'url'=>array('update', 'id'=>$model->UserMasterId)),
	array('label'=>'Delete Usermaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->UserMasterId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usermaster', 'url'=>array('admin')),
);
?>

<h1>View Usermaster #<?php echo $model->UserMasterId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'UserMasterId',
		'UserTypeId',
		'UserName',
		'Password',
		'CreatedDate',
		'Description',
	),
)); ?>
