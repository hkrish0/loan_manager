<td>

<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'protypeeeeeeeeee',
	'source'=>$this->createUrl('loan/producttype'),
	// additional javascript options for the autocomplete plugin
	'options'=>array(
			'showAnim'=>'fold',
	'select'=>"js:  function(event,ui){	
			$('#goldrate').val(ui.item['attribute2'])
			$('#Protype_hidden').val(ui.item['id']);
}"		
	),
		'htmlOptions'=>array(
				'class'=>'span1',
				'placeholder'=>'Product Type',
		),
));
?>

</td>
	
<td>	
	<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'product',
	'source'=>$this->createUrl('loan/product'),
	// additional javascript options for the autocomplete plugin
	'options'=>array(
			'showAnim'=>'fold',
			'class'=>'span2',
			'select'=>"js: function(event, ui) {
				$('#Product_hidden').val(ui.item['id']);
    
}"
),
			'htmlOptions'=>array(
				'class'=>'span1',	
				'placeholder'=>'Product',
			),
));
?>
	
	</td>
	
	
	<td>
	<?php echo CHtml::textField('Weight','', array('class'=>'span1','placeholder'=>'Weight','label'=>false)); ?>
	</td>
	
	<td>
	<?php echo CHtml::textField('StoneWeight', '',array('class'=>'span1','placeholder'=>'StoneWeight','label'=>false)); ?>
	</td>
	<td>
	<?php echo CHtml::textField('Number','', array('class'=>'span1','placeholder'=>'Number','label'=>false)); ?>
	</td>
	
						
						
	<td>							
	<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'name'=>'scheme',
	'source'=>$this->createUrl('loan/scheme'),
	
	'options'=>array(
			'showAnim'=>'fold',
		'select'=>"js: function(event, ui) {
		
       $('#schemeamount').val(ui.item['attribute2'])
		weight=$('#Loandetails_Weight').val();
		stone_weight=$('#Loandetails_StoneWeight').val();
			
		num=$('#Loandetails_Number').val();
			total=(weight-stone_weight)*num;
			maxamt=ui.item['attribute2'] * total;
			
			$('#Loandetails_MaxAmount').val(maxamt);
			$('#scheme_hidden').val(ui.item['id']);
			

}"
	),
'htmlOptions'=>array(
'class'=>'span1',
'placeholder'=>'Scheme',
),
));
	
?>

</td>
	
	
	<td>	
	<?php echo CHtml::textField('goldrate','',array('class'=>'span1','size'=>10,'placeholder'=>'Gold rate')); ?>						
	</td>
	<?php echo CHtml::textField('schemeamount','',array('class'=>'span1','size'=>10,'placeholder'=>'Scheme Amount')); ?>
	<td>
	<?php echo CHtml::textField('MaxAmount','', array('class'=>'span1','placeholder'=>'MaxAmount')); ?>							
	</td>

	
	
		