<?php
/* @var $this HeadMasterController */
/* @var $model HeadMaster */

$this->breadcrumbs=array(
	'Head Masters'=>array('index'),
	$model->hm_id,
);

$this->menu=array(
	array('label'=>'List HeadMaster', 'url'=>array('index')),
	array('label'=>'Create HeadMaster', 'url'=>array('create')),
	array('label'=>'Update HeadMaster', 'url'=>array('update', 'id'=>$model->hm_id)),
	array('label'=>'Delete HeadMaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->hm_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HeadMaster', 'url'=>array('admin')),
);
?>

<h1>View HeadMaster #<?php echo $model->hm_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'hm_id',
		'hm_name',
	),
)); ?>
