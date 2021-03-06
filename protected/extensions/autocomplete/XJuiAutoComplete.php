<?php
/**
 * XJuiAutoComplete class file.
 *
 * XJuiAutoComplete is replica of CJuiAutoComplete with only difference that XJuiAutoComplete prints javascript directly into
 * HTML code when widget is called via ajax request.
 *
 * @author Erik Uus <erik.uus@gmail.com>
 */

Yii::import('zii.widgets.jui.CJuiInputWidget');

/**
 * XJuiAutoComplete displays an autocomplete field.
 *
 * XJuiAutoComplete encapsulates the {@link http://jqueryui.com/autocomplete/ JUI
 * autocomplete} plugin.
 *
 * To use this widget, you may insert the following code in a view:
 * <pre>
 * $this->widget('zii.widgets.jui.XJuiAutoComplete',array(
 *     'name'=>'city',
 *     'source'=>array('ac1','ac2','ac3'),
 *     // additional javascript options for the autocomplete plugin
 *     'options'=>array(
 *         'minLength'=>'2',
 *     ),
 *     'htmlOptions'=>array(
 *         'style'=>'height:20px;',
 *     ),
 * ));
 * </pre>
 *
 * By configuring the {@link options} property, you may specify the options
 * that need to be passed to the JUI autocomplete plugin. Please refer to
 * the {@link http://api.jqueryui.com/autocomplete/ JUI AutoComplete API}
 * documentation for possible options (name-value pairs) and
 * {@link http://jqueryui.com/autocomplete/ JUI AutoComplete page} for
 * general description and demo.
 *
 * By configuring the {@link source} property, you may specify where to search
 * the autocomplete options for each item. If source is an array, the list is
 * used for autocomplete. You may also configure {@link sourceUrl} to retrieve
 * autocomplete items from an ajax response.
 */
class XJuiAutoComplete extends CJuiInputWidget
{
	/**
	 * @var mixed the entries that the autocomplete should choose from. This can be
	 * <ul>
	 * <li>an Array with local data</li>
	 * <li>a String, specifying a URL that returns JSON data as the entries.</li>
	 * <li>a javascript callback. Please make sure you wrap the callback with
	 * {@link CJavaScriptExpression} in this case.</li>
	 * </ul>
	 */
	public $source=array();
	/**
	 * @var mixed the URL that will return JSON data as the autocomplete items.
	 * CHtml::normalizeUrl() will be applied to this property to convert the property
	 * into a proper URL. When this property is set, the {@link source} property will be ignored.
	 */
	public $sourceUrl;

	/**
	 * Run this widget.
	 * This method registers necessary javascript and renders the needed HTML code.
	 */
	public function run()
	{
		list($name,$id)=$this->resolveNameID();

		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];

		if($this->hasModel())
			echo CHtml::activeTextField($this->model,$this->attribute,$this->htmlOptions);
		else
			echo CHtml::textField($name,$this->value,$this->htmlOptions);

		if($this->sourceUrl!==null)
			$this->options['source']=CHtml::normalizeUrl($this->sourceUrl);
		else
			$this->options['source']=$this->source;

		$options=CJavaScript::encode($this->options);
		$script ="jQuery('#{$id}').autocomplete($options);";

		if(Yii::app()->request->isAjaxRequest)
			echo CHtml::script($script);
		else
			Yii::app()->getClientScript()->registerScript(__CLASS__.'#'.$id, $script);
	}
}
