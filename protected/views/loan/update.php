<?php
/* @var $this LoanController */
/* @var $model Loanmaster */



/*$this->menu=array(
	array('label'=>'List Loanmaster', 'url'=>array('index')),
	array('label'=>'Create Loanmaster', 'url'=>array('create')),
	array('label'=>'View Loanmaster', 'url'=>array('view', 'id'=>$model->LoanMasterId)),
	array('label'=>'Manage Loanmaster', 'url'=>array('admin')),
);*/
?>

<h1>Loan Renewal <?php //echo $model->LoanMasterId; ?></h1>

<?php $this->renderPartial('findpledge', array('model'=>$model,'customer'=>$customer,'address'=>$address,
		'loannum'=>$loannum,'date'=>$date,'dataProvider1'=>$dataProvider1,'product'=>$product,'flag'=>$flag,'newloan'=>$newloan,'user'=>$user,
'unit'=>$unit,'renewal'=>$renewal,'producttype'=>$producttype,'sample'=>$sample,'customer'=>$customer,'address'=>$address)); ?>