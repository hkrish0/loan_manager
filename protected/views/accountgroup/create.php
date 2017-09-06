<?php
/* @var $this AccountgroupController */
/* @var $model Accountgroup */



$this->menu=array(
	array('label'=>'List Accountgroup', 'url'=>array('index')),
	array('label'=>'Manage Accountgroup', 'url'=>array('admin')),
);
?>

<h1>Create Accountgroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>