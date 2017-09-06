<?php
if (Yii::app()->user->isGuest)
    $this->redirect(array('site/login'));

$this->breadcrumbs = array(
    'Error',
);
?>

<h2>No Permission to Access Module </h2>

<!--<div class="error">
    Contact Your Administrator to get Module access Privileages.
</div>-->
<!-- BEGIN PAGE CONTENT-->				
<div class="row-fluid">
    <div class="span12">
        <div class="row-fluid page-500">
            <div class="span5 number" style="text-align:left;margin-left:200px;">
                403
            </div>
            <div class="span7 details" style="text-align:left;margin-top: -120px;margin-left:450px;">
                <h7>Opps, Access Forbidden !</h7>
                </br>
                </br>
                </br>
                </br></br>
                </br>
                </br>
                </br>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->