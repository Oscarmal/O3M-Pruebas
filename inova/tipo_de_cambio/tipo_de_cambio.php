<?php
/*Todo
$sx = simplexml_load_file('http://www.dof.gob.mx/indicadores.xml');
foreach($sx->channel->item as $val){
	if($val->title=='DOLAR'){$t="->";}else{$t='';}
	$title= $val->title;
	$desc= $val->description;
	$valueDate= $val->valueDate;
	$pubDate= $val->pubDate;
	echo  "$t $title $desc $valueDate $pubDate<br/>";
}
*/
/*SOlo dolar*/


function get_exchagerate_MXP_USD($auth=false){
	if($auth){
		$xml = simplexml_load_file('http://www.dof.gob.mx/indicadores.xml');
		foreach($xml->channel->item as $val){
			if($val->title=='DOLAR'){
				$d=explode('/',$val->valueDate);
				$d[2] = ($d[2]<2000) ? $d[2]+2000 : $d[2];
				$d=implode('-',array_reverse($d));
				$Date_exchange_rate=$d;
				$Exchange_rate=$val->description;	
				$Currency=$val->title;
			}		
		}
		return "$Date_exchange_rate|$Exchange_rate|$Currency";
	}else{return "Acceso no autorizado.";}
}
function update_exchagerate($auth=false){
	if($auth){
		include("conex.php"); 
		$sql="SELECT * FROM sl_exchangerates ORDER BY Date_exchange_rate DESC LIMIT 1";
		$con=mysql_query($sql, $Link)or die(mysql_error());
		$row=mysql_fetch_array($con);
		if($row[1]<date('Y-m-d')){
			#echo get_exchagerate_MXP_USD(1);
			$er=explode('|',get_exchagerate_MXP_USD(1));
			$sql="INSERT INTO sl_exchangerates SET 
					Date_exchange_rate='$er[0]',
					exchange_rate='$er[1]',
					Currency='US$',
					Date=CURDATE(),
					Time=NOW(),
					ID_admin_users=1";
			$con=mysql_query($sql, $Link)or die(mysql_error());
		}
	}else{return "Acceso no autorizado.";}
}
echo update_exchagerate(1);
*/
/*

function get_exchagerate_MXP_USD($auth=false){
# --------------------------------------------------------
# Author: Oscar Maldonado
# Created on: 2013-09-12
# Description : Obtiene el tipo de cambio MXP-USD del Diario Oficial de la Federación
# Parameters : $auth = 1
# Last Modified on: 
# Last Modified by:
    if($auth){
        $xml = simplexml_load_file('http://www.dof.gob.mx/indicadores.xml');
        foreach($xml->channel->item as $val){
            if($val->title=='DOLAR'){
                $d=explode('/',$val->valueDate);
                $d[2] = ($d[2]<2000) ? $d[2]+2000 : $d[2];
                $d=implode('-',array_reverse($d));
                $Date_exchange_rate=$d;
                $Exchange_rate=$val->description;   
                $Currency=$val->title;
            }       
        }
        return "$Date_exchange_rate|$Exchange_rate|$Currency";
    }else{return "get_exchagerate_MXP_USD - Acceso no autorizado.";}
}

function update_exchagerate($auth=false){
# --------------------------------------------------------
# Author: Oscar Maldonado
# Created on: 2013-09-12
# Description : Actualiza la tabla sl_exchangerates con los valores de la funcion get_exchagerate_MXP_USD()
# Parameters : $auth = 1
# Last Modified on: 
# Last Modified by:
    if($auth){
        $Link=mysql_connect('172.20.27.78', 'root', 'HjsLIwhglOPqw1278') or die(mysql_error());
        ##TMK
        $Table="direksys2_e4";
        $sql="SELECT * FROM $Table.sl_exchangerates ORDER BY Date_exchange_rate DESC LIMIT 1";
        $con=mysql_query($sql, $Link)or die(mysql_error());
        $row=mysql_fetch_array($con);
        if($row[1]<date('Y-m-d')){
            $er=explode('|',get_exchagerate_MXP_USD(1));
            $sql="INSERT INTO $Table.sl_exchangerates SET 
                    Date_exchange_rate='$er[0]',
                    exchange_rate='$er[1]',
                    Currency='US$',
                    Date=CURDATE(),
                    Time=NOW(),
                    ID_admin_users=1";
            $con=mysql_query($sql, $Link)or die(mysql_error());
        } $msj='Exchange Rate actualizado '.get_exchagerate_MXP_USD(1);
    }else{$msj="update_exchagerate - Acceso no autorizado.";}
    return $msj;
}
echo "<br/>".update_exchagerate(1);

/**/
?>