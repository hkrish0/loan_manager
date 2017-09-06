<?php
/* @var $this LoanController */
/* @var $model Loanmaster */



$this->menu=array(
	array('label'=>'List Loanmaster', 'url'=>array('index')),
	array('label'=>'Manage Loanmaster', 'url'=>array('admin')),
);
?>

<h1>Loan Manager</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'product'=>$product,'scheme'=>$scheme,'dataProvider1'=>$dataProvider1,
		'customer'=>$customer,'address'=>$address,'date'=>$date,'loannum'=>$loannum,'flag'=>$flag,'user'=>$user,'unit'=>$unit,'producttype'=>$producttype,'loandetails'=>$loandetails,'renewal'=>$renewal)); ?>