<?php
/* @var $this VoucherController */
/* @var $model Voucher */



$this->menu=array(
	array('label'=>'List Voucher', 'url'=>array('index')),
	array('label'=>'Manage Voucher', 'url'=>array('admin')),
);
?>

<h1>Create Voucher</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'date'=>$date,'voucherno'=>$voucherno)); ?>