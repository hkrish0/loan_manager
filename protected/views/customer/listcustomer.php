
<div class="grid-head">
    <div class="image-existing-item"></div>
    <h2>Customer List</h2>
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
                      		array('name'=>'CustomerCode',
                      				'header'=>'Customer Code',),    
                      		array(
                      				'name'=>'FirstName',
                      				'header'=>'First Name' ,
                      				), 

                      		array(
                      				'name'=>'LastName',
                      				'header'=>'Last Name' ,
                      		),

                      		
                      		array(
                      				'name'=>'Telephone',
                      				'header'=>'Telephone' ,
                      		),
                      		
                      		array(
                      				'name'=>'Mobile',
                      				'header'=>'Mobile' ,
                      		),
                      		
                      		
                      		array(
                      				'name'=>'EmailId',
                      				'header'=>'Email' ,
                      		),
                      		/*array(
                      				//'header'=>'Identificationproofdetails::model()->findByAttributes($data->CustomerId)',
                      				'value'=>'Identificationproofdetails::model()->findByAttributes(array("CustomerId"=>$data->CustomerId))->IdentificationNum',
                                      ),*/
                      		),
                      
  ));
  ?>
