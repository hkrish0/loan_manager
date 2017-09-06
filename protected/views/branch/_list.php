
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
                      		array('name'=>'BranchCode',
                      				'header'=>'Branch Code',),    
                      		array(
                      				'name'=>'BranchName',
                      				'header'=>'Branch' ,
                      				),                    		
                      					
                                        array(
                                            'class' => 'CButtonColumn',
                                            'template'=>'{update}{delete}',
                                            'updateButtonImageUrl' => Yii::app()->baseUrl . '/images/edit.png',
                                        	'deleteButtonImageUrl' => Yii::app()->baseUrl . '/images/delete.png',
                                        	'deleteConfirmation'=>"js:'The Item will be deleted! Continue?'",
                                         
                                            //'afterDelete'=>'function(link,success,data){ if(success) $("#statusMsg").html("Succes"); }',
                                            )
                                      )
                      )
  );
  ?>
