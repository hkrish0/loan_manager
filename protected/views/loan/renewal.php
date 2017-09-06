<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
)); ?>


<?php echo CHtml::label('Enter the Loan Number',''); ?>
<?php //echo CHtml::textField('Text','',array('class'=>'span2')); 


$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'Text',
	'source'=>$this->createUrl('loan/loan_renewal'),
	//additional javascript options for the autocomplete plugin
	'options'=>array(
			'showAnim'=>'fold',
			'class'=>'span2',
	'select'=>"js: function(event, ui) {
		
}"
),
			'htmlOptions'=>array(
				'class'=>'span2',	
				'placeholder'=>'Loan Number',
			),
));
?>



<br/>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Search')); ?> 
<?php $this->endWidget(); ?>
