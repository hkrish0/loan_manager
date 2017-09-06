<?php
/* @var $this VoucherheadController */
/* @var $model Voucherhead */

$this->breadcrumbs=array(
	'Voucherheads'=>array('index'),
	$model->VoucherHeadId=>array('view','id'=>$model->VoucherHeadId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Voucherhead', 'url'=>array('index')),
	array('label'=>'Create Voucherhead', 'url'=>array('create')),
	array('label'=>'View Voucherhead', 'url'=>array('view', 'id'=>$model->VoucherHeadId)),
	array('label'=>'Manage Voucherhead', 'url'=>array('admin')),
);
?>

<h1>Update Voucherhead <?php echo $model->VoucherHeadId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>