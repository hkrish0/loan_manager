<?php
/* @var $this FinancialyearController */
/* @var $model Financialyearmaster */

$this->breadcrumbs=array(
	'Financialyearmasters'=>array('index'),
	$model->FinancialYearMasterId,
);

$this->menu=array(
	array('label'=>'List Financialyearmaster', 'url'=>array('index')),
	array('label'=>'Create Financialyearmaster', 'url'=>array('create')),
	array('label'=>'Update Financialyearmaster', 'url'=>array('update', 'id'=>$model->FinancialYearMasterId)),
	array('label'=>'Delete Financialyearmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->FinancialYearMasterId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Financialyearmaster', 'url'=>array('admin')),
);
?>

<h1>View Financialyearmaster #<?php echo $model->FinancialYearMasterId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'FinancialYearMasterId',
		'FinancialYearName',
		'FromDate',
		'ToDate',
	),
)); ?>
