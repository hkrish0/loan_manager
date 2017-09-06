<?php
/* @var $this CustomerController */
/* @var $model Customer */


$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'Update Customer', 'url'=>array('update', 'id'=>$model->CustomerId)),
	array('label'=>'Delete Customer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CustomerId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
);
?>


<?php
$loan=Loanmaster::model()->findByAttributes(array('CustomerId'=>$model->CustomerId));


$loandetails=Loandetails::model()->findAllByAttributes(array('LoanMasterId'=>$loan->LoanMasterId));


$netweight=0;

foreach($loandetails as $value)
{
	$netweight=$netweight+(($value->Weight)-($value->StoneWeight));
	}
	?>
	
	<?php 
	echo $model->FirstName." ".$model->LastName;
	
	echo CHtml::image(Yii::app()->baseUrl . "/upload/" . $model->CustomerPhoto,"customer",array("height" =>100,"width"=>100));
	
	
	$identity=Identificationproofdetails::model()->findByAttributes(array('CustomerId'=>$model->CustomerId));
	
	
	
	
	echo $identity->identificationProofMaster->IdentificationProofName;
	
	echo $identity->IdentificationNum;
	?>
	
	
	
	
	<div class="details_table">
<table class="tabular-container" id="yw0"><tbody>
<tr id="productdetails">

<td>Pledge Date</td>
<td>Loan Number</td>

<td>Loan Branch</td>
<td>Net Wt</td>
<td>Gram Rate</td>
<td>Due Date</td>
<td>Scheme Excess</td>
<td>Pledge Amount</td>
<td>Interest</td>
	
</tr>

<tr>
<td><?php echo $loan->dateMaster->TransactionDate ?></td>
<td><?php echo $loan->LoanNumber ?></td>
<td><?php echo $loan->branch->BranchName ?></td>
<td><?php echo $netweight ?></td>
<td></td>
<td></td>
<td><?php echo $loan->scheme->SchemeName ?></td>
<td><?php echo $loan->AmountIssued ?></td>
<td><?php echo $loan->LoanNumber ?></td>

</tr>
</tbody>
</table>
</div>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CustomerId',
		'AddressId',
		'CustomerStatusId',
		'DateMasterId',
		'CustomerName',
		'CustomerPhoto',
		'Telephone',
		'Mobile',
		'EmailId',
	),
));*/ ?>
