<?php

class Flashes extends CWidget {
 
    public function run() {
		
		Yii::app()->clientScript->registerScript(
		   'myHideEffect',
		   '$(".flashes").animate({opacity: 0.9}, 3500).fadeOut("slow");',
		   CClientScript::POS_READY
		);

		$flashMessages = Yii::app()->user->getFlashes();
		if ($flashMessages) {
			echo '<div class="flashes" style="text-align:center;  padding:5px 20px 2px 20px; margin-left:-20px; ">';
			foreach($flashMessages as $key => $message) {
				if ($key=="notice")
				echo '<div class="alert alert-error" style="color:red" class="flash-' . $key . ' shadow">' . $message . "</div>\n";
				else 
					echo '<div class="alert alert-error-yellow" style="color:green" class="flash-' . $key . ' shadow">' . $message . "</div>\n";
			}
			echo '</div>';
		}	
    }
}
?>