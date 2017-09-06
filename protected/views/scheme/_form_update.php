<?php
/* @var $this SchemeController */
/* @var $model Scheme */
/* @var $form CActiveForm */
?>



<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true
)); ?>

	<div class="column1">
	<?php echo $form->textFieldRow($model, 'SchemeName', array('class'=>'span3','placeholder'=>'Scheme Name','label'=>false));?>
	<?php echo $form->dropDownListRow($model,'ProductTypeId',CHtml::listData(Producttype::model()->findAll(),'ProductTypeId', 'ProductTypeName'),array('class'=>'span3','label'=>false,'empty'=>'Select ProductType','ajax' => array(
							'type'=>'POST',
							'url'=>CController::createUrl('scheme/getgoldrate'),
							'success'=>'js:function(data){
								$("#goldrate").val(data);				
													}',
							'data'=>array('ProductTypeId'=>'js:this.value'))));
	
	
 if($flag==1)
	{
	
	 echo CHtml::textField('goldrate','',array('size'=>10,'placeholder'=>'Gold rate'));
	
	}
	else
	{
		echo CHtml::textField('goldrate_update',$goldrate,array('size'=>10,'placeholder'=>'Gold rate'));
	}
	?>
	<?php echo $form->textFieldRow($model, 'InterestRate', array('class'=>'span3','placeholder'=>'Interest rate in Percentage','label'=>false)); ?>
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
													'class' => 'span2',
													'placeholder'=>'Date',
													'value'=>CTimestamp::formatDate('Y-m-d'),
													'autocomplete'=>false,
													'label'=>false
													//'required'=>'required',
													
                              
                                )
									));					
					?>
	
	
	<?php echo $form->textFieldRow($model, 'MaxAmtInPer', array('class'=>'span3','placeholder'=>'Amount in Percentage','label'=>false)); ?>
	<?php echo $form->textFieldRow($model, 'MaximumAmt', array('class'=>'span3','placeholder'=>'Maximum Amt','label'=>false)); ?>
	<?php echo $form->textFieldRow($model, 'DurationInMonths', array('class'=>'span3','placeholder'=>'Duration in Months','label'=>false)); ?>
	<?php echo $form->textFieldRow($model, 'DurationInDays', array('class'=>'span3','placeholder'=>'Duration in Days','label'=>false)); ?>
	
	</div>
	<div class="clear"></div>
	<?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Create')); ?> 
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?>
	

<?php $this->endWidget(); ?>


<script>
$(document).ready(function() {
$( "#Scheme_MaxAmtInPer" ).change(function() {

	var per=$( "#Scheme_MaxAmtInPer").val();
	var rate=$('#goldrate_update').val();

	
	maxamt=parseInt(per)/100 * parseInt(rate);
	
	
	result=Math.round(maxamt*100)/100 
	
	$( "#Scheme_MaximumAmt").val(result);
	
});
});
	</script>
