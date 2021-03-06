
<div class="grid-head">
    <div class="image-existing-item"></div>
    <h2>Existing Item</h2>
  </div>

  <?php

  
  $this->widget('zii.widgets.grid.CGridView', 
                array(
                      'id' => 'sidebar',
                      'dataProvider' => $dataProvider,
                      'selectableRows' => 1,
                      'ajaxUpdate'=>false,
                      'hideHeader'=>false,
                		'template'=>"{items}\n{pager}",
                       'enableHistory'=>false,
                		'enableSorting'=>false,
                      'cssFile' => Yii::app()->baseUrl . '/css/grid.css',
                      'htmlOptions' => array('class' => 'grid-view'),
                      'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/grid.css',
                                        'maxButtonCount'=>4,
                                        'nextPageLabel'=>'>',
                                        'prevPageLabel'=>'<',
                                        'firstPageLabel'=>'<<',
                                        'lastPageLabel'=>'>>',
                                        'header'=>'',
                                        ),
                      'columns'=>array(
                                       // 'OrderRefNo',
                      		array('name'=>'ProductTypeName',
                      				'header'=>'Product Type',),    
                      		array(
                      				'name'=>'CurrentRate',
                      				'header'=>'Current Rate' ,
                      				),                    		
                      					
                                        array(
                                            'class' => 'CButtonColumn',
                                            'template'=>'{update}',
                                            'updateButtonImageUrl' => Yii::app()->baseUrl . '/images/edit.png',
                                         
                                            //'afterDelete'=>'function(link,success,data){ if(success) $("#statusMsg").html("Succes"); }',
                                            )
                                      )
                      )
  );
  ?>
