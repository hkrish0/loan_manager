<?php
/* @var $this FinancialyearController */
/* @var $model Financialyearmaster */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',	
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
		
	//'enableClientValidation'=>true,
		//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>
<div class="column1">






<?php 
echo "Loan Number   ";
 $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'inverse', // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>$value,
)); ?>

<br/>
<?php //echo CHtml::label('Amount','Amount'); ?>


<?php echo CHtml::textField('amount',"",array('class'=>'span2','placeholder'=>'Amount')); ?>
<br/>
<br/>
<input type="checkbox" name="receipt_org" value="1">original receipt<br>
                                        
                                       
                           
<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
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
					
					</div>
<div class="clear"></div>

<?php $this->endWidget(); ?>
</div><!-- form -->