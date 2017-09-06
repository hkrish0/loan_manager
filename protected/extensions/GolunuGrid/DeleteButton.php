<?php

Yii::import('ext.GolunuGrid.BaseColumn');


class DeleteButton extends BaseColumn
{

	public $imageUrl;

	public $Confirmation;


	public function init()
	{
		$Confirmation="js:'The Item will be deleted! Continue?'";

	}


	protected function renderHeaderCellContent()
	{
		echo "Delete";
	}

	protected function renderDataCellContent($row,$data)
	{
		
		$htmlOptions['class']="delete";
		if(isset($this->imageUrl))
			echo CHtml::link(CHtml::image($this->imageUrl,'delete'),'#',$htmlOptions);
		else
			echo CHtml::link('delete','#',$htmlOptions);	


	}

	public function renderHeaderCell()
	{

		$this->headerHtmlOptions['data-type']='button';
		$this->headerHtmlOptions['class']='delete';

		if(isset($this->imageUrl))
			$this->headerHtmlOptions['data-img']=$this->imageUrl;

		echo CHtml::openTag('th',$this->headerHtmlOptions);
		$this->renderHeaderCellContent();
		echo "</th>";
	}

	public function renderDataCell($row)
	{
		$data=null;
		$options=$this->htmlOptions;
		$options['class']='delete';
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
		echo CHtml::openTag('td',$options);
		$this->renderDataCellContent($row,$data);
		echo '</td>';
		
	}


}
