<?php
/* @var $this VoucherController */
/* @var $model Voucher */

$this->breadcrumbs=array(
	'Vouchers'=>array('index'),
	$model->VoucherId=>array('view','id'=>$model->VoucherId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Voucher', 'url'=>array('index')),
	array('label'=>'Create Voucher', 'url'=>array('create')),
	array('label'=>'View Voucher', 'url'=>array('view', 'id'=>$model->VoucherId)),
	array('label'=>'Manage Voucher', 'url'=>array('admin')),
);
?>

<h1>Update Voucher <?php echo $model->VoucherId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>