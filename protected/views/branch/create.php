<?php
/* @var $this BranchController */
/* @var $model Branch */

/*$this->breadcrumbs=array(
	'Branches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Branch', 'url'=>array('index')),
	array('label'=>'Manage Branch', 'url'=>array('admin')),
);*/

?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar')); ?>
<div  id="existing-item" class="grid-container">
    <?php echo $this->renderPartial('_list', array('dataProvider'=>$dataProvider)); ?>
  </div>
  
 
<?php $this->endWidget();?>
  <h1>Branch</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'address'=>$address,'city'=>$city,'state'=>$state,'country'=>$country,'branchcode'=>$branchcode,'user'=>$user)); ?>
