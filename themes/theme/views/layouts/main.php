<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />


    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mtm.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/griid.css" />
	 <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.3.custom.js"></script>
	
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.core.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.widget.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.position.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.menu.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.autocomplete.js"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
		
		'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
            	
            		
            		
         		
            		array('label' => 'Loan',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            						array(
            								'label' => 'New Pledge',
            								'url' => Yii::app()->createUrl('/loan/create')
            		
            						),
            						array(
            								'label' => 'Find Pledge',
            								'url' => Yii::app()->createUrl('/loan/renewal')
            		
            						),)),
            		
            		array('label' => 'Customer',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            						array(
            								'label' => 'New Customer',
            								'url' => Yii::app()->createUrl('/customer/create')
            		
            						),
            						array(
            								'label' => 'Find Customer',
            								'url' => Yii::app()->createUrl('/customer/findcustomer')
            		
            						),)),
            		
            		
            		array('label' => 'Accounting',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            		
            							
            						array(
            								'label' => 'Ledger',
            								'url' => Yii::app()->createUrl('/accountgroup/create')
            									
            						),
            		
            						array(
            								'label' => 'Voucher',
            								'url' => Yii::app()->createUrl('/voucher/create')
            									
            						),
            		
            						array(
            								'label' => 'Day Book',
            								'url' => Yii::app()->createUrl('/voucher/daybook')
            		
            						),
            						
            						array(
            								'label' => 'Cash Book',
            								'url' => Yii::app()->createUrl('/voucher/cashbook')
            						
            						),
            						
            						
            						array(
            								'label' => 'Bank Book',
            								'url' => Yii::app()->createUrl('/voucher/bankbook')
            		
            						),
            		
            		
            		
            						array(
            								'label' => 'Balance Sheet',
            								'url' => Yii::app()->createUrl('#')
            		
            						),
            						
            						)),
            		
            		array('label' => 'OverDraft',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            		
            						 
            						array(
            								'label' => 'OD Settings',
            								'url' => Yii::app()->createUrl('/bank/create')
            								 
            						),
            		
            						array(
            								'label' => 'OD Payments',
            								'url' => Yii::app()->createUrl('/transaction/create')
            								 
            						),
            		
            						array(
            								'label' => 'OD Receipts',
            								'url' => Yii::app()->createUrl('/transaction/receipt')
            		
            						),
            						array(
            								'label' => 'OD Statements',
            								'url' => Yii::app()->createUrl('/transaction/listdata')
            		
            						),
            		
            				)),
            		
            		array('label' => 'Reports',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            		
            						 
            						array(
            								'label' => 'Issued Loans',
            								'url' => Yii::app()->createUrl('/bank/create')
            								 
            						),
            		
            						array(
            								'label' => 'Amount received',
            								'url' => Yii::app()->createUrl('/transaction/create')
            								 
            						),)),
            		
            						
            		array('label' => 'Masters',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            						array(
            								'label' => 'Branch',
            								'url' => Yii::app()->createUrl('/branch/create')
            		
            						),
            						array(
            								'label' => 'Product',
            								'url' => Yii::app()->createUrl('/product/create')),
            						array(
            								'label' => 'Scheme',
            								'url' => Yii::app()->createUrl('/scheme/create')),
            		
            						array(
            								'label' => 'Ledger Master',
            								'url' => Yii::app()->createUrl('/accountgroup/create')),
            		
            						array(
            								'label' => 'Voucher Master',
            								'url' => Yii::app()->createUrl('/voucherhead/create')),
            		
            						array(
            								'label' => 'Fiscal Year',
            								'url' => Yii::app()->createUrl('/financialyear/create')),
            		
            						array(
            								'label' => 'Statutory',
            								'url' => Yii::app()->createUrl('/financialyear/create')),
            		
            						array(
            								'label' => 'Add City',
            								'url' => Yii::app()->createUrl('/city/create')),
            		
            						array(
            								'label' => 'Usertype',
            								'url' => Yii::app()->createUrl('/usertype/create')),
            		
            						array(
            								'label' => 'User',
            								'url' => Yii::app()->createUrl('/usermaster/create')),
            		
            						array(
            								'label' => 'Product Type',
            								'url' => Yii::app()->createUrl('/producttype/create')),
            				)),
            		
            		
            		
            		
            		
            		
            		
            		
            		
            		/*
            		
            		array('label'=>'Branch', 'url'=>array('/branch/create')),
            		array('label' => 'Product',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            						array(
            								'label' => 'Add Product',
            								'url' => Yii::app()->createUrl('/product/create')
            		
            						),
            						array(
            								'label' => 'List Products',
            								'url' => Yii::app()->createUrl('/product/listproduct')
            		
            						),)),
            		
            		
            		
            		//array('label'=>'Product', 'url'=>array('/product/create')),
				array('label'=>'Schemes', 'url'=>array('/scheme/create')),
            	//array('label'=>'Customer', 'url'=>array('/customer/create')),
            	
            		array('label' => 'Customer',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            						array(
            								'label' => 'Add Customer',
            								'url' => Yii::app()->createUrl('/customer/create')
            		
            						),
            						array(
            								'label' => 'List Customer',
            								'url' => Yii::app()->createUrl('/customer/listcustomer')
            		
            						),)),
            		
            		
            	//array('label'=>'LoanManager', 'url'=>array('/loan/create')),
            		
            		array('label' => 'Loan',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            						array(
            								'label' => 'New Pledge',
            								'url' => Yii::app()->createUrl('/loan/create')
            		
            						),
            						array(
            								'label' => 'Repledge',
            								'url' => Yii::app()->createUrl('/loan/renewal')
            		
            						),
            						array(
            								'label' => 'Defaulter',
            								'url' => Yii::app()->createUrl('#')
            								),
            						
            								array(
            										'label' => 'Weavers',
            										'url' => Yii::app()->createUrl('#')
            										),
            						
            						array(
            								'label' => 'Write Offs',
            								'url' => Yii::app()->createUrl('#')
            								
            								
            								
            						),
            						
            						array(
            								'label' => 'Loan List',
            								'url' => Yii::app()->createUrl('/loan/admin')
            						),
            						
            						)),
            		
            		
            		
            		
				//array('label'=>'Goldrate', 'url'=>array('/producttype/admin')),
            	//array('label'=>'Loan Renewal', 'url'=>array('/loan/renewal')),
            		
            		array('label' => 'Accounting',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            		
            							
            						array(
            								'label' => 'Ledger',
            								'url' => Yii::app()->createUrl('/accountgroup/create')
            									
            						),
            		
            						array(
            								'label' => 'Voucher',
            								'url' => Yii::app()->createUrl('/voucher/create')
            									
            						),
            		
            						array(
            								'label' => 'Day Book',
            								'url' => Yii::app()->createUrl('/voucher/daybook')
            		
            						),
            						
            						array(
            								'label' => 'Cash Book',
            								'url' => Yii::app()->createUrl('/voucher/cashbook')
            						
            						),
            						
            						
            						array(
            								'label' => 'Bank Book',
            								'url' => Yii::app()->createUrl('/voucher/bankbook')
            		
            						),
            		
            		
            		
            						array(
            								'label' => 'Balance Sheet',
            								'url' => Yii::app()->createUrl('#')
            		
            						),
            						
            						)),
            		
            		array('label' => 'OverDraft',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(
            		
            						 
            						array(
            								'label' => 'OD Settings',
            								'url' => Yii::app()->createUrl('/bank/create')
            								 
            						),
            		
            						array(
            								'label' => 'OD Payments',
            								'url' => Yii::app()->createUrl('/transaction/create')
            								 
            						),
            		
            						array(
            								'label' => 'OD Receipts',
            								'url' => Yii::app()->createUrl('/transaction/receipt')
            		
            						),
            						array(
            								'label' => 'OD Statements',
            								'url' => Yii::app()->createUrl('/transaction/listdata')
            		
            						),
            		
            				)),
            		
            		
            		
            	array('label' => 'Admin Settings',
            				'url' => '#',
            				'active' =>Yii::app()->controller->module==NULL? false: Yii::app()->controller->module->id == 'master',
            				'items' => array(

											
											array(
													'label' => 'Ledger Master',
													'url' => Yii::app()->createUrl('/accountgroup/index')
											
											),

												array(
														'label' => 'Voucher Master',
														'url' => Yii::app()->createUrl('/voucherhead/create')
															
												),

													array(
															'label' => 'Fiscal Year',
															'url' => Yii::app()->createUrl('/financialyear/create')
																
													),
														array(
																'label' => 'Statutory',
																'url' => Yii::app()->createUrl('')
														
														),

												

												array(
														'label' => 'Add City',
														'url' => Yii::app()->createUrl('/city/create')
														
														),
												array(
												'label' => 'User Type',
												'url' => Yii::app()->createUrl('/usertype/create')
												
												),
                                                array(
												'label' => 'User',
												'url' => Yii::app()->createUrl('/usermaster/create')
											  ),
												
												array(
												'label' => 'Product Type',
												'url' => Yii::app()->createUrl('/producttype/create')
												),

												array(
														'label' => 'Gold Rate',
														'url' => Yii::app()->createUrl('/producttype/admin')
												),
												)),
*/

                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
		'htmlOptions'=>array('class'=>'navdec')
)); ?>
<br/>
<br/>

<?php $this->widget('Flashes'); ?>
<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<center>Copyright &copy; <?php echo date('Y'); ?> by Glossymob pvt Ltd.<br/>
		All Rights Reserved.</center><br/>
		<?php// echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
