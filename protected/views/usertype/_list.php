
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
                      		array('name'=>'UserType',
                      				'header'=>'User Type',),    
                      	
                                        array(
                                            'class' => 'CButtonColumn',
                                            'template'=>'{update} {delete}',
                                            'updateButtonImageUrl' => Yii::app()->baseUrl . '/images/edit.png',
                                        	'deleteButtonImageUrl' => Yii::app()->baseUrl . '/images/delete.png',
                                        	'deleteConfirmation'=>"js:'The Item will be deleted! Continue?'",
                                         
                                        		
                                        	'buttons'=>array
                                        		(
                                        				'update' => array
                                        				(
                                        						
                                        						'click'=>"function(){
                                        						
                                  $.ajax({
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                         obj = JSON.parse(data);
                                        						
                                        						$('#Usertype_UserType').val(obj.usertype.UserType);
                                        							$('#Usertype_Description').val(obj.usertype.Description);
                                        					
		
   																for(var a in obj.privilege)
                                        						{ 
                                        						for(var j=0;j<9;j++){
                                        						
                                        						elementname='Privilegemaster_PrivilegeName_'+j;
                                        						
                                        						
                                        						privilege=$('#'+elementname).val();
                                        						
                                        						privilege_assigned=obj.privilege[a].PrivilegeName;
                                        						
                                        						
                                        					
                                        						if(privilege_assigned==privilege)
                                        						{
                                        						$('#'+elementname).attr('checked','checked');
                                        						
                                        						}
                                        						 
                                        						}
                                        						
  }
                                        						
                                        						$('#btnSave').hide();
																	
                                        						
                                        						
                                       
                                        }
                                    })
                                    return false;
                              }",
                                       'url'=>'Yii::app()->controller->createUrl("update1",array("id"=>$data->primaryKey))',
                                        				),
                                        				
  													)
                                        		
                                            //'afterDelete'=>'function(link,success,data){ if(success) $("#statusMsg").html("Succes"); }',
                                            )
                                      )
                      )
  );
  ?>
