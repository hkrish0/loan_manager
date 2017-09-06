<?php

Yii::import('ext.GolunuGrid.BaseListView');
Yii::import('ext.GolunuGrid.EditColumn');
Yii::import('ext.GolunuGrid.DeleteButton');

class Grid extends BaseListView {

    const FILTER_POS_HEADER = 'header';
    const FILTER_POS_FOOTER = 'footer';
    const FILTER_POS_BODY = 'body';

    private $_formatter;
    public $columns = array();
    public $rowCssClass;
    public $rowCssClassExpression;
    public $rowHtmlOptionsExpression;
    public $showTableOnEmpty = true;
    public $ajaxUpdate = false;
    public $updateSelector = '{page}, {sort}';
    public $ajaxUpdateError;
    public $ajaxVar = 'ajax';
    public $ajaxUrl;
    public $beforeAjaxUpdate;
    public $afterAjaxUpdate;
    public $selectionChanged;
    public $selectableRows = 1;
    public $baseScriptUrl;
    public $cssFile;
    public $nullDisplay = '&nbsp;';
    public $blankDisplay = '&nbsp;';
    public $loadingCssClass = 'grid-view-loading';
    public $filterSelector = '{filter}';
    public $filterCssClass = 'filters';
    public $filterPosition = 'body';
    public $filter;
    public $hideHeader = false;
    public $enableHistory = false;
    public $columnWidth=array();
    public $displayAddNewRow=true;

    public function init() {
    	if($this->dataProvider===null)
    	{
    		$val=array();
    		$this->dataProvider=new CArrayDataProvider($val);
    	};
    	
        parent::init();

        if (empty($this->updateSelector))
            throw new CException(Yii::t('zii', 'The property updateSelector should be defined.'));
        if (empty($this->filterSelector))
            throw new CException(Yii::t('zii', 'The property filterSelector should be defined.'));

        if (!isset($this->htmlOptions['class']))
            $this->htmlOptions['class'] = 'table-container';

        if ($this->baseScriptUrl === null)
            $this->baseScriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')) . '/gridview';

        if ($this->cssFile !== false) {
            if ($this->cssFile === null)
                $this->cssFile = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/css/jsongrid.css');
            Yii::app()->getClientScript()->registerCssFile($this->cssFile);
        }

        $this->initColumns();
    }

    protected function initColumns() {
        if ($this->columns === array()) {
            if ($this->dataProvider instanceof CActiveDataProvider)
                $this->columns = $this->dataProvider->model->attributeNames();
            elseif ($this->dataProvider instanceof IDataProvider) {
                // use the keys of the first row of data as the default columns
                $data = $this->dataProvider->getData();
                if (isset($data[0]) && is_array($data[0]))
                    $this->columns = array_keys($data[0]);
            }
        }
        $id = $this->getId();
        foreach ($this->columns as $i => $column) {
            if (is_string($column))
                $column = $this->createDataColumn($column);
            else {
                if (!isset($column['class']))
                    $column['class'] = 'EditColumn';
                $column = Yii::createComponent($column, $this);
            }
            if (!$column->visible) {
                unset($this->columns[$i]);
                continue;
            }
            if ($column->id === null)
                $column->id = $id . '_c' . $i;
            $this->columns[$i] = $column;
        }

        foreach ($this->columns as $column) {
            $column->init();
        }
    }

    protected function createDataColumn($text) {
        if (!preg_match('/^([\w\.]+)(:(\w*))?(:(.*))?$/', $text, $matches))
            throw new CException(Yii::t('zii', 'The column must be specified in the format of "Name:Type:Label", where "Type" and "Label" are optional.'));
        $column = new EditColumn($this);
        $column->name = $matches[1];
        if (isset($matches[3]) && $matches[3] !== '')
            $column->type = $matches[3];
        if (isset($matches[5]))
            $column->header = $matches[5];
        return $column;
    }

    public function registerClientScript() {
        $id = $this->getId();

        if ($this->ajaxUpdate === false)
            $ajaxUpdate = false;
        else
            $ajaxUpdate = array_unique(preg_split('/\s*,\s*/', $this->ajaxUpdate . ',' . $id, -1, PREG_SPLIT_NO_EMPTY));
        $options = array(
            'ajaxUpdate' => $ajaxUpdate,
            'ajaxVar' => $this->ajaxVar,
            'pagerClass' => $this->pagerCssClass,
            'loadingClass' => $this->loadingCssClass,
            'filterClass' => $this->filterCssClass,
            'tableClass' => $this->itemsCssClass,
            'selectableRows' => $this->selectableRows,
            'enableHistory' => $this->enableHistory,
            'updateSelector' => $this->updateSelector,
            'filterSelector' => $this->filterSelector
        );
        if ($this->ajaxUrl !== null)
            $options['url'] = CHtml::normalizeUrl($this->ajaxUrl);
        if ($this->enablePagination)
            $options['pageVar'] = $this->dataProvider->getPagination()->pageVar;
        foreach (array('beforeAjaxUpdate', 'afterAjaxUpdate', 'ajaxUpdateError', 'selectionChanged') as $event) {
            if ($this->$event !== null) {
                if ($this->$event instanceof CJavaScriptExpression)
                    $options[$event] = $this->$event;
                else
                    $options[$event] = new CJavaScriptExpression($this->$event);
            }
        }

        $options = CJavaScript::encode($options);
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        $cs->registerCoreScript('bbq');
        if ($this->enableHistory)
            $cs->registerCoreScript('history');
        $cs->registerScriptFile($this->baseScriptUrl . '/jquery.yiigridview.js', CClientScript::POS_END);
        $cs->registerScript(__CLASS__ . '#' . $id, "jQuery('#$id').yiiGridView($options);");
    }

    public function renderColumnWidth() {
        $MyHtml="<colgroup>";
        foreach ($this->columnWidth as $column) {
            $MyHtml=$MyHtml."<col style=\"width:".$column."px\">";
        }
        $MyHtml= $MyHtml."<col style=\"width:10px\">";
        $MyHtml=$MyHtml."</colgroup>";
        echo $MyHtml;
    }

    public function renderItems() {
        if ($this->dataProvider->getItemCount() > 0 || $this->showTableOnEmpty) {
            if ($this->displayAddNewRow==true)
                echo '<input class="w8-button" type="button" value="Add new row"></input>';
            echo "<table id=\"{$this->id}_table\" class=\"table table-striped dataTable\">\n";
            if ($this->columnWidth!=NULL)
                $this->renderColumnWidth();
               
            $this->renderTableHeader();
            ob_start();
            $this->renderTableBody();
            $body = ob_get_clean();
            $this->renderTableFooter();
            echo $body; // TFOOT must appear before TBODY according to the standard.
            echo '</table>';

            echo chtml::hiddenField($this->id, '');

            foreach ($this->columns as $column) {
                if (!$column->model == null && $column->name !== null) {
                    $list = CHtml::listData($column->model->findAll(), $column->keyValue, $column->keyName);
                    echo CHtml::dropDownList($column->keyName . '_menu', '', $list, array('empty'=>'Select ','style' => 'display:none'));
                }
            }

            echo (
            '<script>
        var comboboxID=0;
        var deletedOutput=[];
        var Output= new Array();
		var Count=0;


		function valueExist(id){
			var position=-1;
  			for ( var index=0; index<Output.length; index++ ) {
			    if(Output[index].id==id){
			    	position=index;
			    };
			}
			return(position);
			
		}
		function valueToHiddenField(){
			var data=[];
			var newdata=[];

			newdata=newRowsToArray();
			for (var index=0; index<newdata.length;index++)
			{
				data.push(newdata[index]);
			}
			for (var index=0; index<deletedOutput.length;index++)
			{
				data.push(deletedOutput[index]);
			}
			for (var index=0; index<Output.length;index++)
			{
				data.push(Output[index]);
			}

			
			$("#' . $this->id . '").val(JSON.stringify( data ));
		}

            		
       
            		
		function newRowsToArray(){
			var tmpArr=[];

    		$("#' . $this->id . '_table tbody tr").each(function(){
    			
            		
            		if($(this).data("uid")==null)
    			{
    				var tmpObj= new Object;
					tmpObj.id="";
	    			tmpObj.status="New";
	    			var i=0;
	    			var arr=[];

    				$(this).children("td").each(function(){
						if ($(this).data("type")=="text")
							value=$(this).text();         		
						if ($(this).data("type")=="select")
							value=$(this).data("uid");
						if($(this).data("type")!=null)
						{
							arr[i]=value;
							++i;
						}

    				});
					tmpObj.data=arr;
					tmpArr.push(tmpObj);
				}
    		})
    		return (tmpArr);
		}

        function rowchange(tr){
		    var value;
		    var i=0;
	    	var uid=$(tr).data("uid");
	    	var arr=[];
	    	var obj = new Object();
	    	if (uid!=null)
	    	{
	    		obj.id=uid;
	    		obj.status="Update";
	    		$(tr).children("td").each(function(){
		    		if ($(this).data("type")=="text")
		    			value=$(this).text();
		    		if ($(this).data("type")=="select")
		    			value=$(this).data("uid");
		    		if($(this).data("type")!=null)
		    			arr[i]=value;
					++i;
	    		});
				obj.data=arr;
				var pos=valueExist(uid);
				if (pos==-1)
				{
					Output.push(obj);
				}
				else
				{
					Output[pos]=obj;
				}
			}

			valueToHiddenField();

			
	 	};

	 	$("#' . $this->id . '_table tbody td a.delete").live("click",function() {
	 			if($(this).closest("tr").data("uid")!=null)
	 			{
	 				tmpObj= new Object;
	 				var uid=$(this).closest("tr").data("uid");
	 				tmpObj.id=uid;
	 				tmpObj.status="delete";
	 				tmpObj.data="";
	 				deletedOutput.push(tmpObj);
	 				var pos=valueExist(uid);
	 				if (pos!=-1)
	 				{
	 					Output.splice(pos,1);
	 				}
	 			}
	 			$(this).closest("tr").remove();
	 			valueToHiddenField();
		    	
		});

		$("#' . $this->id . '_container .w8-button").live("click",function() {
		
		    var html="<tr>";
            var emptyTable=$("#' . $this->id . '_table td.empty");
            if(emptyTable!=null)
            {
                emptyTable.parent("tr").remove();
            }
			$("#' . $this->id . '_table thead th").each(function(){
				var dataType=$(this).data("type");
				if (dataType=="button"){
					var img=$(this).data("img");

					if(img!=null)
					{
						html=html+"<td><a href=\"#\" class=\"delete\"><img alt=\"delete\" src=\"" +img+ "\"></a></td>";
					}
					else{
						html=html+"<td><a href=\"#\" class=\"delete\">delete</a></td>";
					}
					
				}else{
					html=html+"<td data-type=\""+dataType+"\" data-editable=\"1\" ></td>";
				}
				
				
			});
			html=html+"</tr>";
			$("#' . $this->id . '_table tbody").prepend(html);
		});

        function resetTd(element){
            element.unbind();
            element.live("focusout", function() {
                var type=element.data("type");
                var value="";
                switch(type){
                    case "text":
                        value=element.children("input").val();
                        break;
                    case "select":
                        var itemval=element.children("select").val();
                        value=element.children("select").children(":selected").text();
                        element.data("uid",itemval);
                }
                element.html(value);
                rowchange($(element).closest("tr"));
            });
        }
        function showTextBox(element,value){

            if (element.children().length==0){
                var txt="<input type=\"text\" value=\"" +$.trim(value)+"\"/>";
                element.html(txt);
                element.children("input").focus();
                element.children("input").select();
                resetTd(element)
            }
        }

        function showComboBox(element,optionbox,value){

            if (element.children().length==0){
                optionbox.attr("id", "id"+(++comboboxID) )
                element.html(optionbox);
                element.children("select").val(value);
                optionbox.show();
                element.children("select").focus();
                resetTd(element)
            }
        }
        

        $("#' . $this->id . '_table td").live("click",function(){
            var td=$(this);
            var type=td.data("type");
            var editable=td.data("editable");
            var value="";
            if (editable)
            {
	            switch(type)
	            {
	            case "text":
	                value=td.text();
	                showTextBox(td,value);
	                break;
	            case "select":
	                value=td.data("uid");
	                var menuid="#"+ $(this).closest("table").find("th").eq($(this).index()).data("role");
	                showComboBox(td,$(menuid).clone(),value);
	                break;
	            }
	        }
        })
    </script>');
        }
        else
            $this->renderEmptyText();
    }

    public function renderTableHeader() {
        if (!$this->hideHeader) {
            echo "<thead>\n";

            if ($this->filterPosition === self::FILTER_POS_HEADER)
                $this->renderFilter();

            echo "<tr>\n";
            foreach ($this->columns as $column)
                $column->renderHeaderCell();
            echo "</tr>\n";

            if ($this->filterPosition === self::FILTER_POS_BODY)
                $this->renderFilter();

            echo "</thead>\n";
        }
        elseif ($this->filter !== null && ($this->filterPosition === self::FILTER_POS_HEADER || $this->filterPosition === self::FILTER_POS_BODY)) {
            echo "<thead>\n";
            $this->renderFilter();
            echo "</thead>\n";
        }
    }

    public function renderFilter() {
        if ($this->filter !== null) {
            echo "<tr class=\"{$this->filterCssClass}\">\n";
            foreach ($this->columns as $column)
                $column->renderFilterCell();
            echo "</tr>\n";
        }
    }

    public function renderTableFooter() {
        $hasFilter = $this->filter !== null && $this->filterPosition === self::FILTER_POS_FOOTER;
        $hasFooter = $this->getHasFooter();
        if ($hasFilter || $hasFooter) {
            echo "<tfoot>\n";
            if ($hasFooter) {
                echo "<tr>\n";
                foreach ($this->columns as $column)
                    $column->renderFooterCell();
                echo "</tr>\n";
            }
            if ($hasFilter)
                $this->renderFilter();
            echo "</tfoot>\n";
        }
    }

    public function renderTableBody() {
        $data = $this->dataProvider->getData();
        $n = count($data);
        echo "<tbody>\n";

        if ($n > 0) {
            for ($row = 0; $row < $n; ++$row)
                $this->renderTableRow($row);
        } else {
            echo '<tr><td colspan="' . count($this->columns) . '" class="empty">';
            $this->renderEmptyText();
            echo "</td></tr>\n";
        }
        echo "</tbody>\n";
    }

    public function renderTableRow($row) {
        $htmlOptions = array();
        if ($this->rowHtmlOptionsExpression !== null) {
            $data = $this->dataProvider->data[$row];
            $options = $this->evaluateExpression($this->rowHtmlOptionsExpression, array('row' => $row, 'data' => $data));
            if (is_array($options))
                $htmlOptions = $options;
        }

        if ($this->rowCssClassExpression !== null) {
            $data = $this->dataProvider->data[$row];
            $class = $this->evaluateExpression($this->rowCssClassExpression, array('row' => $row, 'data' => $data));
        } elseif (is_array($this->rowCssClass) && ($n = count($this->rowCssClass)) > 0)
            $class = $this->rowCssClass[$row % $n];

        if (!empty($class)) {
            if (isset($htmlOptions['class']))
                $htmlOptions['class'].=' ' . $class;
            else
                $htmlOptions['class'] = $class;
        }
        $data = $this->dataProvider->data[$row];
        $htmlOptions['data-uid'] = $data->primaryKey;

        echo CHtml::openTag('tr', $htmlOptions) . "\n";
        foreach ($this->columns as $column)
            $column->renderDataCell($row);
        echo "</tr>\n";
    }

    public function getHasFooter() {
        foreach ($this->columns as $column)
            if ($column->getHasFooter())
                return true;
        return false;
    }

    public function getFormatter() {
        if ($this->_formatter === null)
            $this->_formatter = Yii::app()->format;
        return $this->_formatter;
    }

    public function setFormatter($value) {
        $this->_formatter = $value;
    }

}
