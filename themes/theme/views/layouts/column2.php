<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">

    <div class="span9">
        <div id="content">
     
        
            <?php echo $content; ?>
            
        </div><!-- content -->
    </div>
    
    
    <div class="span3">
        <div id="sidebar">
        <?php
           // $this->beginWidget('zii.widgets.CPortlet', array(
               
           // ));

				echo $this->clips['sidebar']; 
            
            
            /*   $this->widget('bootstrap.widgets.TbMenu', array(
                'type'=>'tabs',
				'stacked'=>true,
				'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'well'),
            ));*/
           // $this->endWidget();
        ?>
        </div><!-- sidebar -->
    </div>
  
</div>
<?php   echo $this->clips['pledgeform']; ?>
<?php $this->endContent(); ?>