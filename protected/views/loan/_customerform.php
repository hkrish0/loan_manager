
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
	
    'htmlOptions'=>array('class'=>'well','enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>true,
	//'enableClientValidation'=>true,
		//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>
<div class="column1">
 <?php echo "Customer Code   ";
 $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'inverse', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$customercode,
)); ?>

<?php //echo $form->textFieldRow($model, 'CustomerCode', array('class'=>'span3','placeholder'=>'Customer Code','label'=>false)); ?>
<?php echo $form->hiddenField($model, 'CustomerCode', array('class'=>'span3','value'=>$customercode)); ?>
<?php echo $form->textFieldRow($model, 'FirstName', array('class'=>'span3','placeholder'=>'First Name','label'=>false)); ?>
<?php echo $form->textFieldRow($model, 'LastName', array('class'=>'span3','placeholder'=>'Last Name','label'=>false)); ?>
<?php echo $form->textAreaRow($address, 'AddressLine1', array('class'=>'span3','placeholder'=>'Address Line1','label'=>false)); ?>
<?php echo $form->textAreaRow($address, 'AddressLine2', array('class'=>'span3','placeholder'=>'Address Line2','label'=>false)); ?>

<?php echo $form->dropDownListRow($address,'DistrictMasterId',CHtml::listData(Districtmaster::model()->findAll(),'DistrictMasterId', 'District'), array(
								'empty'=>'Select District','class'=>'span3','label'=>false));?>

<?php echo $form->dropDownListRow($address,'CityMasterId',CHtml::listData(Citymaster::model()->findAll(),'CityMasterId', 'City'),array('empty'=>'Select City','class'=>'span3','label'=>false));?>

<?php echo $form->label($address,'StateMasterId');?>
<?php echo $form->dropDownListRow($address,'StateMasterId',CHtml::listData(Statemaster::model()->findAll(),'StateMasterId', 'State'),array('class'=>'span3','label'=>false));?>
<?php echo $form->textFieldRow($address, 'Pincode', array('class'=>'span3','placeholder'=>'Pincode','label'=>false)); ?>

<?php echo $form->label($address,'CountryMasterId');?>
<?php echo $form->dropDownListRow($address,'CountryMasterId',CHtml::listData(Countrymaster::model()->findAll(),'CountryMasterId', 'Country'),array('class'=>'span3','label'=>false));?>









<?php //echo $form->fileField($customer, 'CustomerPhoto'); ?>


</div>
<div class="column2">

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
													'class' => 'span3',
													'placeholder'=>'Date',
													'value'=>CTimestamp::formatDate('Y-m-d'),
													'autocomplete'=>false,
													'label'=>false
													//'required'=>'required',
													
                              
                                )
									));					
					?>

<?php echo $form->dropDownListRow($identitydetails,'IdentificationProofMasterId',CHtml::listData(Identificationproofmaster::model()->findAll(),'IdentificationProofMasterId', 'IdentificationProofName'), array(
								'empty'=>'Select Identity Proof','class'=>'span3','label'=>false));?>
					
					
					
					
<?php echo $form->label($model,'CustomerPhoto');?>
<?php echo $form->fileField($model, 'CustomerPhoto', array('maxlength' => 255)); ?>
<?php echo $form->textFieldRow($identitydetails, 'IdentificationNum', array('class'=>'span3','placeholder'=>'ID Proof Number','label'=>false)); ?>
<?php echo $form->textFieldRow($model, 'Telephone', array('class'=>'span3','placeholder'=>'Telephone','label'=>false)); ?>
<?php echo $form->textFieldRow($model, 'Mobile', array('class'=>'span3','placeholder'=>'Mobile','label'=>false)); ?>
<?php echo $form->textFieldRow($model, 'EmailId', array('class'=>'span3','placeholder'=>'Email','label'=>false)); ?>
	
	</div>
	
	<div class="clear"></div>
	
	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	

<?php $this->endWidget(); ?>

