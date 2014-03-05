<?php
function sid_dv($input) {
	$input .= get_ip;
	$lg = strlen($input);
	for ($i = 1; $i <= $lg; $i++) {
		$tot +=  ord(substr($input,$i,1)) + ord(substr($input,$i+1,1)) - 30 - $i;
	}
	$dv = intval(($tot/11-intval($tot/11))*11);
	if ($dv==10){
		$dv='K';
	}
	return $dv;
}
$ck_name="slsid";
srand(time());
$sid = '9'.'-'.(intval(rand(1,100000))) .  time() . (intval(rand(1,1000000000)));
$sid .= sid_dv($sid);
setcookie($ck_name, $sid);
$sid = $_COOKIE[$ck_name];
echo $sid;
?>