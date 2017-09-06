<?php
/* @var $this SchemeController */
/* @var $model Scheme */



 $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar')); ?>
<div  id="existing-item" class="grid-container">
    <?php echo $this->renderPartial('_list', array('dataProvider'=>$dataProvider)); ?>
  </div>
<?php $this->endWidget();?>


<h1>Edit Scheme  </h1>

<?php $this->renderPartial('_form_update', array('model'=>$model,'dataProvider'=>$dataProvider,'goldrate'=>$goldrate,'flag'=>$flag,'date'=>$date)); ?>