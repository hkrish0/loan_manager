<?php


Yii::import('ext.GolunuGrid.BaseColumn');


class EditColumn extends BaseColumn
{

	public $name;

	public $value;

	public $type='text';

	public $sortable=false;

	public $filter;

	public function init()
	{
		parent::init();
		if($this->name===null)
			$this->sortable=false;
		if($this->name===null && $this->value===null)
			throw new CException(Yii::t('zii','Either "name" or "value" must be specified for CDataColumn.'));


	}


	protected function renderFilterCellContent()
	{
		if(is_string($this->filter))
			echo $this->filter;
		elseif($this->filter!==false && $this->grid->filter!==null && $this->name!==null && strpos($this->name,'.')===false)
		{
			if(is_array($this->filter))
				echo CHtml::activeDropDownList($this->grid->filter, $this->name, $this->filter, array('id'=>false,'prompt'=>''));
			elseif($this->filter===null)
				echo CHtml::activeTextField($this->grid->filter, $this->name, array('id'=>false));
		}
		else
			parent::renderFilterCellContent();
	}


	protected function renderHeaderCellContent()
	{
		if($this->grid->enableSorting && $this->sortable && $this->name!==null)
			echo $this->grid->dataProvider->getSort()->link($this->name,$this->header,array('class'=>'sort-link'));
		elseif($this->name!==null && $this->header===null)
		{
			if($this->grid->dataProvider instanceof CActiveDataProvider)
				echo CHtml::encode($this->grid->dataProvider->model->getAttributeLabel($this->name));
			else
				echo CHtml::encode($this->name);
		}
		else
			parent::renderHeaderCellContent();
	}


	protected function renderDataCellContent($row,$data)
	{
		if($this->value!==null)
			$value=$this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
		elseif($this->name!==null)
		{
			if ($this->dataType=="text"){
				$value=CHtml::value($data,$this->name);
			}
			else
			{
				$value=CHtml::value($data,$this->keyValue);
				$value=$this->model->findByAttributes(array($this->keyValue=>$value))->getAttribute($this->keyName);
			}
			
		}
			
		echo $value===null ? $this->grid->nullDisplay : $this->grid->getFormatter()->format($value,$this->type);
		

	}

	public function renderHeaderCell()
	{
		$this->headerHtmlOptions['id']=$this->id;
		$this->headerHtmlOptions['data-role']=$this->keyName.'_menu';
		$this->headerHtmlOptions['data-type']=$this->dataType;
		echo CHtml::openTag('th',$this->headerHtmlOptions);
		$this->renderHeaderCellContent();
		echo "</th>";
	}

	public function renderDataCell($row)
	{
		$data=$this->grid->dataProvider->data[$row];
		$options=$this->htmlOptions;
		if($this->cssClassExpression!==null)
		{
			$class=$this->evaluateExpression($this->cssClassExpression,array('row'=>$row,'data'=>$data));
			if(!empty($class))
			{
				if(isset($options['class']))
					$options['class'].=' '.$class;
				else
					$options['class']=$class;
			}
		}
		
		$options['data-type']=$this->dataType;
		$options['data-editable']=$this->editable;
//                $options['style']="width:200px;height:20px;";
		if ($this->dataType=="select")
			$options['data-uid']=CHtml::value($data,$this->keyValue);
		echo CHtml::openTag('td',$options);
		$this->renderDataCellContent($row,$data);
		echo '</td>';
		
	}
}
