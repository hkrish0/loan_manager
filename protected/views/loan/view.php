<?php
/* @var $this LoanController */
/* @var $model Loanmaster */

$this->breadcrumbs=array(
	'Loanmasters'=>array('index'),
	$model->LoanMasterId,
);

$this->menu=array(
	array('label'=>'List Loanmaster', 'url'=>array('index')),
	array('label'=>'Create Loanmaster', 'url'=>array('create')),
	array('label'=>'Update Loanmaster', 'url'=>array('update', 'id'=>$model->LoanMasterId)),
	array('label'=>'Delete Loanmaster', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->LoanMasterId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Loanmaster', 'url'=>array('admin')),
);
?>

<h1>View Loanmaster #<?php echo $model->LoanMasterId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'LoanMasterId',
		'CustomerId',
		'BranchId',
		'LoanStatusId',
		'DateMasterId',
		'UserMasterId',
		'SchemeId',
		'LoanNumber',
	),
)); ?>
