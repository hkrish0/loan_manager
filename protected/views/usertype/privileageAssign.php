<div class="form">

	<?php 
	$form=$this->beginWidget('CActiveForm', array(
			'id'=>'privileageAssign-form',
			'enableAjaxValidation'=>true,
			'htmlOptions'=>array(
					'onsubmit'=>"return false;",/* Disable normal form submit */
					'onkeypress'=>" if(event.keyCode == 13){ send(); } " /* Do ajax call when user presses enter key */
			),
    )); ?>

	<div>
		<hr>
	</div>

	<h3>
		<div class="alert alert-success">
			<b>Privilege Settings</b>
		</div>
	</h3>

	<div class="row">

		<?php
		    $list = CHtml::listData(Userrole::model()->findAll(),'UserTypeId', 'UserType'); ?>
		<label style="width: 262px;"> <label class="combo-box"> <?php echo CHtml::dropDownList('usertype',$model->UserType, $list,
				array(
						'class' => 'btn1 green-stripe',
						'empty'=>'UserType',
						'ajax' => array(
								'type'=>'POST', //request type
								'url'=>CController::createUrl('Userrole/LoadControllers'), //url to call.
								'success'=>'js:function(data) {
								var obj = eval ("(" + data + ")");
								for(var i in obj){
								categoryName = obj[i].categoryName;
								update = obj[i].upDate;
								if (categoryName){
								document.getElementById(categoryName).checked=false;
}
								if (update){
								document.getElementById(update).checked=true;
}
}
}',

		    )));

		?>
		</label>
		</label>
	</div>

	<?php
/*
	$tab_list=Yii::app()->metadata->getModules();
	$tabarray=array();
	$i=2;
	foreach ($tab_list as $key=>$value){
        $tabarray["$tab_list[$i]"]=$this->renderPartial('_newpage',
        array('form'=>$form,'value'=>$value,'modulename'=>$tab_list[$i],'RoleName'=>$RoleName),TRUE);
        $i++;
    }
    $this->widget('zii.widgets.jui.CJuiTabs', array(
    'tabs'=> $tabarray,
    'options'=>array(
        'collapsible'=>true,
    ),
         'htmlOptions'=>array(
        'style'=>'width:800px;'
    ),
    'id'=>'categorytabs',
    ));

?>

	<?php $this->endWidget();*/ ?>
	
</div>


