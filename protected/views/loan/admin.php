

<h1>Loan List</h1>




</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'loanmaster-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(


array('name'=>'LoanNumber',
		'header'=>'Loan Number',),
array(
		'header'=>'Customer Name',
		'value'=>'$data->customer->FirstName'),

		array(
		'header'=>'Branch',
		'value'=>'$data->branch->BranchName'),

array('name'=>'AmountIssued',
		'header'=>'AmountIssued'),




			
		
		


		
		/*
		'SchemeId',
		'LoanNumber',
		*/
		
	),
)); ?>
