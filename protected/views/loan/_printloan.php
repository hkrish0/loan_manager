
<div id="print_content">
<div class="column1">


Branch:<?php echo $branchname;

echo "<br/>";

?>



Customercode:<?php echo $customercode;

echo "<br/>";

?>

Name :<?php echo $customername;

echo "<br/>";
?>

Address:<?php echo $addressline1;

echo "<br/>";

echo $addressline2;


echo "<br/>";

echo $city_name;


echo "<br/>";

echo $district_name;

echo "<br/>";

echo $state_name;

echo "<br/>";

?>

Selected scheme:<?php echo $schemename;

echo "<br/>";

?>

Total Weight(in grams):<?php echo $total_weight;

echo "<br/>";
?>

Stone Weight(in grams):<?php echo $stone_weight;

echo "<br/>";
?>

</div>



<div class="column2">

Date:<?php echo $loan_date;

echo "<br/>";
?>

Loan Number:<?php echo $loannum;

echo "<br/>";
?>

Loan Amount:<?php echo $loanamount;

echo "<br/>";
?>

Interest Rate(in %):<?php echo $interest;

echo "<br/>";
?>

Duration(in months):<?php echo $duration;

echo "<br/>";
?>

<?php //echo $duration;

echo "<br/>";
?>


</div>

</div>

<script>
	function  printDiv(divid){
		var popupWin = window.open('', '_blank', 'width=920px,height=890px');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="<?php echo Yii::app()->request->baseUrl?>/css/mtm.css" rel="stylesheet" type="text/css"/></head><body onload="window.print()">' + document.getElementById("print_content").innerHTML + '</html>');
        popupWin.document.close();
        loan_save();
        }    
</script>
