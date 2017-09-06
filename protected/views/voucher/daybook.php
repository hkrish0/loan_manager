
<div class="grid-head">
    <div class="image-existing-item"></div>
    <h2><?php echo $name;?></h2>
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
                                       
                      		array(
                      				'header'=>' Date',
                      				'value'=>'$data->dateMaster->TransactionDate'),
                      		
                      		
                      		array(
                      				'header'=>' Particulars',
                      				'value'=>'$data->accountGroup->AccountName'),
                      		
                      		
                      		
                      		array(
                      				'header'=>' Voucher',
                      				'value'=>'$data->voucherMaster->VoucherMaster'),
                      		
                      		
                      		array('name'=>'VoucherNumber',
                      				'header'=>'Sl No',),
                      		
                      		
                      		
                      		array('name'=>'Description',
                      				'header'=>'Description',),
                      		
                      		array('name'=>'Debit',
                      				'header'=>'Debit',),    
                      		
                      		array('name'=>'Credit',
                      				'header'=>'Credit',),
                      		
                      		
                      	                 		
                      					
                      	
                      		
                      		
                                      )
                      )
  );
  ?>
