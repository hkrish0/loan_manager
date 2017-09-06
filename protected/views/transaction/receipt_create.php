<?php

$this->menu=array(
	array('label'=>'List Transaction', 'url'=>array('index')),
	array('label'=>'Manage Transaction', 'url'=>array('admin')),
);
?>

<h1>Receipts</h1>

<?php $this->renderPartial('_receipt', array('model'=>$model,'date'=>$date,'headoffice'=>$headoffice,'voucher'=>$voucher)); ?>