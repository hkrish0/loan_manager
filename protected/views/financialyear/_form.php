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

	<?php echo "Select Branch";?>
	
	<br/>
	<?php echo $form->dropDownListRow($model,'BranchId',CHtml::listData(Branch::model()->findAll(),'BranchId', 'BranchName'), array(
								'class'=>'span2','label'=>false));?>

	
	

		<?php echo $form->textFieldRow($model,'FinancialYearName',array('size'=>30,'maxlength'=>30)); ?>
		


	
  <?php echo $form->labelEx($model,'StartDate'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model,
                'attribute'=>'FromDate',
                'value'=>$model->FromDate,

                // additional javascript options for the date picker plugin
                'options'=>array(
                       'changeMonth'=>true,
						'changeYear'=>true,
						'showAnim'=>'fold',
						'showButtonPanel'=>true,
						'autoSize'=>true,
						'dateFormat'=>'yy-mm-dd',
						'defaultDate'=>$model->FromDate,
						                       
                ),
        )); ?>
      

       

	 	<?php echo $form->labelEx($model,'EndDate'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model,
                'attribute'=>'ToDate',
                'value'=>$model->ToDate,

                // additional javascript options for the date picker plugin
                'options'=>array(
                        'changeMonth'=>true,
						'changeYear'=>true,
						'showAnim'=>'fold',
						'showButtonPanel'=>true,
						'autoSize'=>true,
						'dateFormat'=>'yy-mm-dd',
						'defaultDate'=>$model->ToDate,
                       
                ),
        )); ?>
       

	
	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>


<?php $this->endWidget(); ?>

</div><!-- form -->