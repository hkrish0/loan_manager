<?php
/* @var $this BranchController */
/* @var $model Branch */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>

<div class="clear"></div>
<div class="column1">

	<?php 
		echo "BranchCode  ";
	$this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'inverse', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$branchcode,
)); ?>


<?php echo $form->hiddenField($model, 'BranchCode', array('class'=>'span3','value'=>$branchcode)); ?>
	
<?php //echo $form->textFieldRow($model, 'BranchCode', array('class'=>'span3','placeholder'=>'Branch Code','label'=>false)); ?>
<?php echo $form->textFieldRow($model, 'BranchName', array('class'=>'span3','placeholder'=>'Branch Name','label'=>false)); ?>
<?php echo $form->textAreaRow($address, 'AddressLine1', array('class'=>'span3','placeholder'=>'Address Line1','label'=>false)); ?>
<?php echo $form->textAreaRow($address, 'AddressLine2', array('class'=>'span3','placeholder'=>'Address Line2','label'=>false)); ?>
<?php echo $form->dropDownListRow($address,'DistrictMasterId',CHtml::listData(Districtmaster::model()->findAll(),'DistrictMasterId', 'District'), array(
								'empty'=>'Select District','class'=>'span3','label'=>false));?>
<?php echo $form->dropDownListRow($address,'CityMasterId',CHtml::listData(Citymaster::model()->findAll(),'CityMasterId', 'City'), array(
								'empty'=>'Select City','class'=>'span3','label'=>false));?>

<br/>
<br/>
<?php  echo $form->textFieldRow($user, 'UserName', array('class'=>'span3','placeholder'=>'Username','label'=>false)); ?>


</div>
<div class="column2">
<br/>


<?php echo $form->dropDownListRow($address,'StateMasterId',CHtml::listData(Statemaster::model()->findAll(),'StateMasterId', 'State'),array('class'=>'span3','label'=>false));?>
<?php echo $form->textFieldRow($address, 'Pincode', array('class'=>'span3','placeholder'=>'Pincode','label'=>false)); ?>
<?php echo $form->dropDownListRow($address,'CountryMasterId',CHtml::listData(Countrymaster::model()->findAll(),'CountryMasterId', 'Country'),array('class'=>'span3','label'=>false));?>
<?php echo $form->textFieldRow($model, 'Telephone', array('class'=>'span3','placeholder'=>'Telephone','label'=>false)); ?>
<?php echo $form->textFieldRow($model, 'Mobile', array('class'=>'span3','placeholder'=>'Mobile','label'=>false)); ?>
<?php echo $form->textFieldRow($model, 'EmailId', array('class'=>'span3','placeholder'=>'Email','label'=>false)); ?>
<?php //echo $form->hiddenField($model, 'EmailId', array('class'=>'span3','placeholder'=>'Email','label'=>false)); ?>

<br/>
<br/>

<?php echo $form->passwordFieldRow($user, 'Password', array('class'=>'span3','placeholder'=>'Password','label'=>false)); ?>


</div>
<div class="clear"></div>
<br/>
<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Create')); ?> 
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?>
<?php $this->endWidget(); ?>
<script>

$('#Address_Pincode').change(function(){

var pin=$('#Address_Pincode').val();
var t=isNaN(pin);



if(t==true)
{

	alert("Please enter a valid Pincode");
	$('#Address_Pincode').val("");
}

});

$('#Branch_Telephone').change(function(){

var tel=$('#Branch_Telephone').val();
var t=isNaN(tel);



if(t==true)
{

	alert("Please enter a valid telephone number");
	$('#Branch_Telephone').val("");
}

});


$('#Branch_Mobile').change(function(){


	var mob=$('#Branch_Mobile').val();
	var t=isNaN(mob);
	if(t==true)
	{
	alert("Please enter a valid mobile number");
	$('#Branch_Mobile').val("");
	}

	else if (/^\d{10}$/.test(mob)) {
	    
	} else {
	    alert("Invalid number; must be ten digits")
	    $('#Branch_Mobile').val("");
	    $('#Branch_Mobile').focus();
	    return false
	}
});



</script>

