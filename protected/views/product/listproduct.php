
<div class="grid-head">
    <div class="image-existing-item"></div>
    <h2>Product List</h2>
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
                      		array('name'=>'ProductCode',
                      				'header'=>'Product Code',),    
                      		array(
                      				'name'=>'ProductName',
                      				'header'=>'Product' ,
                      				),                    		
                      					
                      	
                      					
                      		
                      		
                                     
                                      )
                      )
  );
  ?>
