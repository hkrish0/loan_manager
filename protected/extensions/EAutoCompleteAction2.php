<?php
class EAutoCompleteAction2 extends CAction
{
    public $model;
    public $attribute;
    public $attribute1;
    public $attribute2;
    public $attribute3;
    public $attribute4;
    public $attribute5;
    public $attribute6;
    public $attribute7;
    public $attribute8;
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
                'value'=>$m->{$this->attribute}.$m->{$this->attribute2},
                'attribute'=>$m->{$this->attribute},
                'id'=>$m->{$this->attribute1},
                'attribute2'=>$m->{$this->attribute2},
                'attribute3'=>$m->{$this->attribute3},
                'attribute4'=>$m->{$this->attribute4},
                'attribute5'=>$m->{$this->attribute5},
                'attribute6'=>$m->{$this->attribute6},
                'attribute7'=>$m->{$this->attribute7},
                'attribute8'=>$m->{$this->attribute8},
                );
            }
 
        }
        echo CJSON::encode($returnVal);
    }
}
?>