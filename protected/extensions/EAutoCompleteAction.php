<?php
class EAutoCompleteAction extends CAction
{
    public $model;
    public $attribute;
    public $attribute1;
    public $attribute2;
    
    private $results = array();
 
    public function run()
    {
        if(isset($this->model) && isset($this->attribute)) {
            $criteria = new CDbCriteria();
            $criteria->compare($this->attribute, $_GET['term'], true);
            $model = new $this->model;
            foreach($model->findAll($criteria) as $m)
            {
                $returnVal[] = array(
                'value'=>$m->{$this->attribute},
                'id'=>$m->{$this->attribute1},
                'attribute2'=>$m->{$this->attribute2},
               
                );
            }
 
        }
        echo CJSON::encode($returnVal);
    }
}
?>