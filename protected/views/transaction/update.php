<?php
/* @var $this TransactionController */
/* @var $model Transaction */

$this->breadcrumbs=array(
	'Transactions'=>array('index'),
	$model->TransactionId=>array('view','id'=>$model->TransactionId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transaction', 'url'=>array('index')),
	array('label'=>'Create Transaction', 'url'=>array('create')),
	array('label'=>'View Transaction', 'url'=>array('view', 'id'=>$model->TransactionId)),
	array('label'=>'Manage Transaction', 'url'=>array('admin')),
);
?>

<h1>Update Transaction <?php echo $model->TransactionId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>