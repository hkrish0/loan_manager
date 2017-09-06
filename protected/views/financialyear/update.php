<?php
/* @var $this FinancialyearController */
/* @var $model Financialyearmaster */

$this->breadcrumbs=array(
	'Financialyearmasters'=>array('index'),
	$model->FinancialYearMasterId=>array('view','id'=>$model->FinancialYearMasterId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Financialyearmaster', 'url'=>array('index')),
	array('label'=>'Create Financialyearmaster', 'url'=>array('create')),
	array('label'=>'View Financialyearmaster', 'url'=>array('view', 'id'=>$model->FinancialYearMasterId)),
	array('label'=>'Manage Financialyearmaster', 'url'=>array('admin')),
);
?>

<h1>Update Financialyearmaster <?php echo $model->FinancialYearMasterId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>