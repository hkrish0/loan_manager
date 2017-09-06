<?php
/* @var $this UsermasterController */
/* @var $model Usermaster */


?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar')); ?>
<div  id="existing-item" class="grid-container">
    <?php echo $this->renderPartial('_list', array('dataProvider'=>$dataProvider)); ?>
  </div>
<?php $this->endWidget();?>


<h1>User</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'user'=>$user)); ?>