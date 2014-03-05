<?php
require("../conex.php");
$ID_admin_users=6106;
$from_date="2013-03-01";
$to_date="2013-03-31";

$sql="SELECT sl_orders.City, sl_orders.State, sl_orders.Zip
						, rpad(LEFT(Phone1,3),length(Phone1),'*') as Caller_Phone
						, 32 as Call_Code
						, sum(IF(RIGHT(ID_products,6)=606224 AND Shipping=0,1,0)) as Main_Offer
						, 0 as Upsell
						, sum(IF(Shipping=9.99,1,0)) as Upsell_Free_Shp
						, sum(IF(RIGHT(ID_products,6)=236326,1,0)) as Upsell_AstroGel
						, sum(IF(RIGHT(ID_products,6)=137425,1,0)) as Upsell_Sleggins
						, sum(IF (ID_products=600001046,1,0)) as Rush
						, sl_orders.Date
						, sl_orders.Time
						, 'SLEGW' as Product_Code
						, round(OrderNet+OrderTax+OrderShp,2) as Order_Amount
						, 0 as Upsell_7
						, 0 as Upsell_8
						, 0 as Upsell_9
						, 0 as Upsell_10
						, 0 as Upsell_11
						, 0 as Upsell_12
						, 0 as Upsell_13
						FROM sl_orders 
						LEFT JOIN sl_orders_products USING(ID_orders)
						LEFT JOIN sl_customers USING (ID_customers)
						WHERE sl_orders.ID_admin_users='$ID_admin_users'
						AND sl_orders.Date BETWEEN '$from_date' AND '$to_date'
						AND sl_orders.Status <> 'System Error'
						group by sl_orders.ID_orders ASC";
$con=mysql_query($sql,$link) or die(mysql_error());
$nombre="archivo.txt";
$archivo=fopen($nombre, 'w+');
$separador=",";
$salto=chr(13).chr(10);
$titulos=array('City','State','Zip','Caller Home Phone Number','Call Code','Main Offer - Kit of 3 Sleggins - $19.95x3+$9.95','Upsell','Upsell - FREE SHIPPING W/1 PAY','Upsell','Upsell','RUSH - $4.95','Hit/Order Date','Hit/Order Time','Product Code','Order Amoun','Upsell','Upsell','Upsell','Upsell','Upsell','Upsell','Upsell 13');
if(file_exists($nombre)){
	for($x=0; $x<=21; $x++){fwrite($archivo, ($x<21) ? $titulos[$x].$separador : $titulos[$x].$salto); }
	while($row=mysql_fetch_array($con)){
		for($x=0; $x<=21; $x++){ 
			$campo=($x<21) ? $row[$x].$separador : $row[$x].$salto;
			fwrite($archivo, $campo);
			echo $campo;			
		}	
		echo "<br />";	
	}
fclose($archivo);
echo "Archivo creado";}
?>
