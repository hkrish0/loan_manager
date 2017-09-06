<?php
/* @var $this VoucherheadController */
/* @var $model Voucherhead */

$this->breadcrumbs=array(
	'Voucherheads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Voucherhead', 'url'=>array('index')),
	array('label'=>'Manage Voucherhead', 'url'=>array('admin')),
);
?>

<h1>Create Voucherhead</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>