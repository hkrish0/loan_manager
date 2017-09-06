
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',	
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
		
	//'enableClientValidation'=>true,
		//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

<div id="loan_label">

<?php 
if($flag==0)
	{
		echo "Old Loan Number   ";
 $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'inverse', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$loannum,
)); ?>
	
	<br/>
New Loan Number
<?php $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'inverse', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$newloan->LoanNumber+1,
)); 
	}
else
	{
		echo "Loan Number    ";

 $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'inverse', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$loannum,
));

}
?>
</div>
<div id="datepick">
<?php 	
							$this->widget('zii.widgets.jui.CJuiDatePicker',
									array(
											'attribute'=>'TransactionDate',
											'name'=>'Date',
											'model'=>$date,
											'value' => $date->TransactionDate,
											'options'=> array(
													'changeMonth'=>true,
													'changeYear'=>true,
													'showAnim'=>'fold',
													'showButtonPanel'=>true,
													'autoSize'=>true,
													'dateFormat'=>'yy-mm-dd',
													'defaultDate'=>$date->TransactionDate,
											),
											'htmlOptions'=>array(
													'class' => 'span2',
													'placeholder'=>'Date',
													'value'=>CTimestamp::formatDate('Y-m-d'),
													'autocomplete'=>false,
													'label'=>false
													//'required'=>'required',
													
                              
                                )
									));					
					?>
</div>
<br/>
<div id="branches">
<?php echo $form->dropDownListRow($model,'BranchId',CHtml::listData(Branch::model()->findAllByAttributes(array('BranchId'=>$user->BranchId)),'BranchId', 'BranchName'), array(
								'class'=>'span2'));?>
</div>
<?php 
 echo $form->hiddenField($customer, 'CustomerCode', array('class'=>'span3','value'=>$customer->CustomerCode));
 ?>
 <div id="newcustomer">
 
 <?php if($renewal==0)
 {?>
 <div class="column1">
 
 <?php echo $form->textFieldRow($customer, 'CustomerCode', array('class'=>'span3','placeholder'=>'CustomerCode','disabled'=>true)); ?>
<?php echo $form->textFieldRow($customer, 'FirstName', array('class'=>'span3','placeholder'=>'First Name','disabled'=>true)); ?>
<?php echo $form->textFieldRow($customer, 'LastName', array('class'=>'span3','placeholder'=>'Last Name','disabled'=>true)); ?>
<?php echo $form->fileField($customer, 'CustomerPhoto'); ?>

<?php echo CHtml::image(Yii::app()->request->baseUrl.'/upload/'.$customer->CustomerPhoto,"CustomerPhoto",array("width"=>200)); ?> 
<?php  echo $form->textAreaRow($address, 'AddressLine1', array('class'=>'span3','placeholder'=>'Address Line1','disabled'=>true)); ?>
<?php  echo $form->textAreaRow($address, 'AddressLine2', array('class'=>'span3','placeholder'=>'Address Line2','disabled'=>true)); ?>
<?php echo $form->dropDownListRow($address,'DistrictMasterId',CHtml::listData(Districtmaster::model()->findAll(),'DistrictMasterId', 'District'), array(
						'empty'=>'Select District','class'=>'span3','disabled'=>true));?>
<?php echo $form->dropDownListRow($address,'CityMasterId',CHtml::listData(Citymaster::model()->findAll(),'CityMasterId', 'City'),array('class'=>'span3','disabled'=>true));?>


</div>
<div class="column2">


<?php echo $form->dropDownListRow($address,'StateMasterId',CHtml::listData(Statemaster::model()->findAll(),'StateMasterId', 'State'),array('class'=>'span3','disabled'=>true));?>
<?php echo $form->textFieldRow($address, 'Pincode', array('class'=>'span3','placeholder'=>'Pincode','disabled'=>true)); ?>
<?php echo $form->dropDownListRow($address,'CountryMasterId',CHtml::listData(Countrymaster::model()->findAll(),'CountryMasterId', 'Country'),array('class'=>'span3','disabled'=>true));?>
<?php echo $form->textFieldRow($customer, 'Telephone', array('class'=>'span3','placeholder'=>'Telephone','disabled'=>true)); ?>
<?php echo $form->textFieldRow($customer, 'Mobile', array('class'=>'span3','placeholder'=>'Mobile','disabled'=>true)); ?>
<?php echo $form->textFieldRow($customer, 'EmailId', array('class'=>'span3','placeholder'=>'Email','disabled'=>true)); ?>

</div>
	
 
 <?php }
 
 else if($renewal==1)
 	
 {?>
 
 	
 	
 	<?php $this->widget('bootstrap.widgets.TbLabel', array(
 			'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
 			'label'=>"Type Customer Code,Name or Mobile",
 	));?>
 	 <br/><br/>
 	 	
 <?php 
 $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'customer',
	'source'=>$this->createUrl('loan/customer'),
	//additional javascript options for the autocomplete plugin
	'options'=>array(
			'showAnim'=>'fold',
			'class'=>'span2',
	'select'=>"js: function(event, ui) {
		customer_autocomplete(event,ui);
		$('#Customer_FirstName').val(ui.item['id']);
		$('#Customer_LastName').val(ui.item['attribute2']);
		$('#Customer_Telephone').val(ui.item['attribute6']);
		$('#Customer_Mobile').val(ui.item['attribute7']);
		$('#customer2').val(ui.item['attribute7']);

		$('#Customer_EmailId').val(ui.item['attribute8']);          
			$('#customer1').val(ui.item['id']+ui.item['attribute2']);
			$('#customer_form1').show();
	    	$('#customer_form2').show();			
}"
),
			'htmlOptions'=>array(
				'class'=>'span2',	
				'placeholder'=>'CustomerCode',
			),
));
?>

<input id="round" type="button" value="" onclick="newcustomerform()"/>

<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'customer1',
	'source'=>$this->createUrl('loan/customer1'),
	// additional javascript options for the autocomplete plugin
	'options'=>array(
			'showAnim'=>'fold',
			'class'=>'span2',
	'select'=>"js: function(event, ui) {
		customer_autocomplete(event,ui);
		$('#Customer_FirstName').val(ui.item['attribute']);
		$('#Customer_LastName').val(ui.item['attribute2']);
		$('#Customer_Telephone').val(ui.item['attribute6']);
		$('#Customer_Mobile').val(ui.item['attribute7']);
		$('#customer2').val(ui.item['attribute7']);
		$('#customer').val(ui.item['id']);
		$('#Customer_EmailId').val(ui.item['attribute8']);
			$('#customer_form1').show();
	    	$('#customer_form2').show();			
}"
),
			'htmlOptions'=>array(
				'class'=>'span2',	
				'placeholder'=>'Customer Name',
			),
));
?>
<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'customer2',
	'source'=>$this->createUrl('loan/customer2'),
	// additional javascript options for the autocomplete plugin
	'options'=>array(
			'showAnim'=>'fold',
			'class'=>'span2',
	'select'=>"js: function(event, ui) {
		customer_autocomplete(event,ui);
		$('#Customer_FirstName').val(ui.item['id']);
		$('#Customer_LastName').val(ui.item['attribute2']);
		$('#Customer_Telephone').val(ui.item['attribute6']);
		$('#customer').val(ui.item['attribute7']);
		$('#customer1').val(ui.item['id']+ui.item['attribute2']);
		$('#Customer_Mobile').hide();
		$('#Customer_EmailId').val(ui.item['attribute8']);
			$('#customer_form1').show();
	    	$('#customer_form2').show();			
}"
),
			'htmlOptions'=>array(
				'class'=>'span2',	
				'placeholder'=>'Mobile',
			),
));

 }
?>
</div>

<div class="column1">

<?php 

 echo $form->hiddenField($model, 'LoanNumber', array('class'=>'span3','value'=>$loannum));

if($renewal==0)
{
	echo CHtml::hiddenField('newloannumber', $newloan->LoanNumber+1, array('class'=>'span3')); 
}

?>



<div id="customer_form1" style="display:none">
<?php echo $form->textFieldRow($customer, 'FirstName', array('class'=>'span3','placeholder'=>'First Name','label'=>false)); ?>
<?php echo $form->textFieldRow($customer, 'LastName', array('class'=>'span3','placeholder'=>'Last Name','label'=>false)); ?>
<?php //echo $form->fileField($customer, 'CustomerPhoto'); ?>

 


<?php echo $form->textAreaRow($address, 'AddressLine1', array('class'=>'span3','placeholder'=>'Address Line1','label'=>false)); ?>
<?php echo $form->textAreaRow($address, 'AddressLine2', array('class'=>'span3','placeholder'=>'Address Line2','label'=>false)); ?>
<?php echo $form->dropDownListRow($address,'DistrictMasterId',CHtml::listData(Districtmaster::model()->findAll(),'DistrictMasterId', 'District'), array(
							'empty'=>'Select District','class'=>'span3','label'=>false));?>
<?php echo $form->dropDownListRow($address,'CityMasterId',CHtml::listData(Citymaster::model()->findAll(),'CityMasterId', 'City'),array('class'=>'span3','label'=>false));?>
</div>

</div>
<div class="column2">

<div id="customer_form2" style="display:none">

<?php echo $form->dropDownListRow($address,'StateMasterId',CHtml::listData(Statemaster::model()->findAll(),'StateMasterId', 'State'),array('class'=>'span3','label'=>false));?>
<?php echo $form->textFieldRow($address, 'Pincode', array('class'=>'span3','placeholder'=>'Pincode','label'=>false)); ?>
<?php echo $form->dropDownListRow($address,'CountryMasterId',CHtml::listData(Countrymaster::model()->findAll(),'CountryMasterId', 'Country'),array('class'=>'span3','label'=>false));?>
<?php echo $form->textFieldRow($customer, 'Telephone', array('class'=>'span3','placeholder'=>'Telephone','label'=>false)); ?>
<?php echo $form->textFieldRow($customer, 'Mobile', array('class'=>'span3','placeholder'=>'Mobile','label'=>false)); ?>
<?php echo $form->textFieldRow($customer, 'EmailId', array('class'=>'span3','placeholder'=>'Email','label'=>false)); ?>

</div>
</div>	
<div class="clear"></div>		
<?php // echo CHtml::button('New Pledge',array('id'=>'form_submit','class'=>'add','success'=>'form_submit')); ?>
	<br/>
	<br/>

	
	<?php $this->endWidget(); ?>
	
	
	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'pledgeform')); ?>
	
	<div class="details_table">
	
	
	
	<div class="tablehead">
	
	<p>Pledge</p>
	
	</div>
	<?php if($renewal==1)
	{
	 $this->widget('ext.tabularinput.XTabularInput',array(
   // 'models'=>$persons2,
    'containerTagName'=>'table ',
   
    'header'=>'

			<tr id=productdetails>
            <td>Product</td>
            <td>ProductType</td>
           	
			<td>Currentrate</td>
			<td>MaxAmount(%)</td>
			<td>MaxAmount</td>
			
			<td>Net Weight</td>
			<td>Stone Weight</td>
			
			<td>Unit</td>
			<td>Pieces</td>			
			
			<td>Pledge Weight</td>
			<td>NetAmount</td>	
			
          
        </tr>
    ',
	
    'inputContainerTagName'=>'tbody',
    'inputTagName'=>'tr',
    'inputView'=>'_pledgeview',
    'inputUrl'=>$this->createUrl('loan/pledgeTable'),
    'addTemplate'=>'<tbody><tr><td colspan="3">{link}</td></tr></tbody>',
	'addLabel'=>Yii::t('ui','New Pledge'),
    'addHtmlOptions'=>array('class'=>'btn btn-small'),
    'removeTemplate'=>'<td>{link}</td>',
    'removeLabel'=>Yii::t('ui','delete'),
    'removeHtmlOptions'=>array('class'=>'delete_row'),
	
));
		
	


}
else if($renewal==0)
{
	$this->widget('ext.GolunuGrid.Grid',
			array('id' => 'mygrid1',
					'columnWidth'=>array(100,80,80,70,50,20,50,50,50),
					'dataProvider' =>$dataProvider1,
					'columns'=>array(
							
								array( // combobox
	
									'name'=>'Product Name',
									'keyValue'=>'ProductId',
									'keyName'=>'ProductName',
									'dataType'=>'select',
									'editable'=>true,
									'model'=>$product,
										
							),

							array( // combobox

											'name'=>'Product Type',
											'keyValue'=>'ProductTypeId',
											'keyName'=>'ProductTypeName',
											'dataType'=>'select',
											'editable'=>true,
											'model'=>$producttype,
									
									),

									array(
									'name'=>'GoldRate',
									'value'=>'$data->productType->CurrentRate',),

									array(
									'name'=>'Max Amount',
									'value'=>'$data->loanMaster->scheme->MaximumAmt',),

								array('name'=>'Net Weight',
										'value'=>'$data->Weight',),
	
									array('name'=>'StoneWeight',
									'model'=> Loandetails::model() ),
	
									
	
									array('name'=>'Unit',
									'keyValue'=>'UnitMasterId',
									'keyName'=>'Unit',
									'dataType'=>'select',
									'editable'=>true,
									'model'=>$unit),


										array('name'=>'Pieces',
										'value'=> '$data->Number', ),

									array('name'=>'Pledge Weight',
											'value'=>'$data->Weight-$data->StoneWeight',

														 ),
								
									
									
									array( //delete button
									'class' => 'DeleteButton',
									'imageUrl' => Yii::app()->baseUrl . '/images/delete.png',
							),
	
	
					)
			)
	);

echo "Issue date:".$model->dateMaster->TransactionDate.

"<br/>";
echo "Amount Issued:
<br/>".
$model->AmountIssued;
}

?>
	</div>
	<br/>
	<br/>
	<div id="secondform">
	<?php echo CHtml::hiddenField('scheme_values', '', array('class'=>'span3')); ?>
	<?php if($renewal==1)
	{
  echo CHtml::dropDownList('scheme','',CHtml::listData(Scheme::model()->findAll(),'SchemeId', 'SchemeName'), array(
								'empty'=>'Change Scheme','class'=>'span2','label'=>false));
	
	}
	else if($renewal==0)
	{
		echo CHtml::dropDownList('scheme_renewal','',CHtml::listData(Scheme::model()->findAll(),'SchemeId', 'SchemeName'), array(
				'empty'=>'Change Scheme','class'=>'span2','label'=>false));
	}
	
		?>
		
	
	<?php echo CHtml::label('Repayment Date',''); ?>
	<?php echo CHtml::textField("repayment_date", '',array('class'=>'span2')); ?>
	</div>
	
<div class="details_total">
	
<table id="net" border="1">

<tr id=total_details>

<td id="total_span">Total</td>
<td>0</td>
<td id="total_span1">0 </td>
<td>0</td>
<td id="total_amount">0</td>
</tr>
<tr id=total_details>
<td colspan="3"></td>

<td>Amount Issued</td>
<td><?php echo CHtml::textField("amountissued",'', array('class'=>'span2')); ?>	 </td>
</tr>



</table>	
	</div>
	<br/>
<?php echo CHtml::hiddenField('table_datas', '', array('class'=>'span3')); ?>
	
	<br/>
	
	<?php if($renewal==1)
	{		
	$this->widget('zii.widgets.jui.CJuiButton',array(
    'buttonType'=>'button',
    'name'=>'btnSave',
    'caption'=>'Create',
    'onclick'=>new CJavaScriptExpression('function(){loan_form() }'),
));
	}
else if($renewal==0)
{
 $this->widget('zii.widgets.jui.CJuiButton',array(
    'buttonType'=>'button',
    'name'=>'btnrenewal',
    'caption'=>'Create',
    'onclick'=>new CJavaScriptExpression('function(){loan_renewalq() }'),
));
}	
	?>
	
	<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'loan_receipt',
    'options'=>array(
        'title'=>'Loan Receipt',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>850,
        'height'=>670,
		'buttons'=>array(
		'Print'=>'js:function(){ printDiv("print_content");}',
		'Cancel'=>'js:function(){ $(this).dialog("close");}',
),


    ),
));?>
<div class="divForForm"></div>
 
<?php $this->endWidget();?>
	
	
<?php $this->endWidget(); ?>	





	



