<?php
$this->widget(
    'CTreeView',
    array('url' => array('ajaxFillTree'))
);

$a=Accountgroup::model()->getChildren(1);

echo $a;

?>