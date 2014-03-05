<?php
$in['orderpayments']=3;
$in['orderpayment_1']=100;
$in['orderpayment_2']=200;
$in['orderpayment_3']=300;
#for($payments = $in['orderpayments'] ; $payments > 0 ; $payments--){
for($payments=1; $payments<=$in['orderpayments']; $payments++){
	$amount = $in['orderpayment_' . $payments];
	echo $amount."<br />";
}
?>