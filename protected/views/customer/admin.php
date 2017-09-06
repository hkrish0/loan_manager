<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Customers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'CustomerCode',
	

		 array(
            'name'=>'CustomerPhoto',
            'type'=>'html',
           'type' => 'raw',
              'value' => 'CHtml::image(Yii::app()->baseUrl . "/upload/" . $data->CustomerPhoto,"customer",array("height" =>100,"width"=>100))'

        ),


		array(
		'header'=>'Name',
		'value'=>'$data->FirstName." ".$data->LastName'),
		array(
		'header'=>'Address',
		'value'=>'$data->address->AddressLine1." ".$data->address->AddressLine2." ".
		$data->address->districtMaster->District." ".$data->address->cityMaster->City." ".
		$data->address->stateMaster->State." ".$data->address->Pincode
		'),
		array(
		'header'=>'Contact',
		'value'=>'$data->Telephone." ".$data->Mobile." ".$data->EmailId'),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
