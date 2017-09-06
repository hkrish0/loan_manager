
<div class="grid-head">
    <div class="image-existing-item"></div>
    <h2>OD Statements</h2>
  </div>

  <?php

  
  $this->widget('zii.widgets.grid.CGridView', 
                array(
                      
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
                      		array('name'=>'TransactionId',
                      				'header'=>'Sl No',),    
                      		
                      		array('name'=>'TransactionType',
                      				'header'=>'ref',),
                      		
                      		
                      		array(
                      				'header'=>' Date',
                      				'value'=>'$data->dateMaster->TransactionDate'),                   		
                      					
                      		array('name'=>'FromAccount',
                      				'header'=>'From',),
                      		
                      						
                      		array('name'=>'ToAccount',
                      				'header'=>'To',),
                      		
                      		array('name'=>'InterestRate',
                      				'header'=>'Interest',),
                      		
                      		array('name'=>'Credit',
                      				'header'=>'Credit',),
                      		
                      		array('name'=>'Debit',
                      				'header'=>'Debit',),
                      		
                      		
                                      )
                      )
  );
  ?>
