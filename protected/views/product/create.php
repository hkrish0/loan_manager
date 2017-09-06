<?php
/* @var $this ProductController */
/* @var $model Product */


/*
$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
*/

?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar')); ?>
<div  id="existing-item" class="grid-container">
    <?php echo $this->renderPartial('_list', array('dataProvider'=>$dataProvider)); ?>
  </div>
  <br/>
  
  
<?php $this->endWidget();?>


<h1>Product</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>