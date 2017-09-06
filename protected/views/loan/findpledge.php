
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',	
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
		
	//'enableClientValidation'=>true,
		//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

<div id="loan_label">

<?php 

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
	<?php 
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


?>
	</div>
	<?php
$this->widget('zii.widgets.jui.CJuiButton',array(
    'buttonType'=>'button',
    'name'=>'btnClose',
    'caption'=>'Loan Close',
    'onclick'=>new CJavaScriptExpression('function(){loan_close() }'),
));
	?>
	
		
	<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'loan_close',
    'options'=>array(
        'title'=>'Loan Close',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>750,
        'height'=>370,
		'buttons'=>array(
		'Submit'=>'js:function(){ printDiv("print_content");}',
		'Cancel'=>'js:function(){ $(this).dialog("close");}',
),


    ),
));?>
<div class="divForClose"></div>
 
<?php $this->endWidget();?>
	
	
	
	
<?php $this->endWidget(); ?>	


<script>

function loan_close(){
	var loannum=$("#Loanmaster_LoanNumber").val();
	alert(loannum);
	$.ajax({		 
	     type: "POST",
	     url: "../loan/loan_close",
	     data:{value:loannum},
	     dataType:"html",   
	    	success:function(data){	
	    	$("#loan_close").dialog("open");
	    	$('#loan_close div.divForClose').html(data);	    		
		  		    }	   
	});	
}
</script>


	



