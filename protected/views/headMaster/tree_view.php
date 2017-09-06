
<?php 


foreach($ledgermaster as $ledger)
{
	echo("<ul>");
	echo("<li>");
	echo $ledger->hm_name;
	
	$ledgersub1=HeadSub::model()->findAllByAttributes(array('hm_id'=>$ledger->hm_id));
	foreach($ledgersub1 as $ledger1)
		
	{
		
		echo("<ul>");
		echo("<li>");
		echo $ledger1->hs_name;
	$ledgersub2=HeadSubSub::model()->findAllByAttributes(array('hs_id'=>$ledger1->hs_id));
	foreach($ledgersub2 as $ledger2)
	{
	echo("<ul>");
	echo("<li>");
	echo $ledger2->hss_name;
	echo("</li>");
	echo("<ul>");
	
	}
	echo("</li>");
	echo("</ul>");
	}
	echo("</li>");
	echo("</ul>");
	
}
?>