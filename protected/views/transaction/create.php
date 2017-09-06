<?php

$this->menu=array(
	array('label'=>'List Transaction', 'url'=>array('index')),
	array('label'=>'Manage Transaction', 'url'=>array('admin')),
);
?>

<h1>Payments</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'date'=>$date,'headoffice'=>$headoffice,'voucher'=>$voucher)); ?>