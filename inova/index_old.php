<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<script type="text/javascript" src="../src/jquery-1.9.1.js"></script>
<script language="javascript">
function DrawDiv(IdDiv,ContentDiv, Width, Height, Float, Clear, More){
	if(Width=='' || Width==0){Width='';}else{Width='width:'+Width+';';}
	if(Height=='' || Height==0){Height='';}else{Height='height:'+Height+';';}
	if(Float==''){Float='';}else{Float='float:'+Float+';';}
	if(Clear==''){Clear='';}else{Clear='clear:'+Clear+';';}
	if(More==''){More='';}
	var Spec = 'style="'+Width+' '+Height+' '+Float+' '+Clear+' '+More+' position:relative; overflow:hidden;"';
	//Limpiar saltos de linea
	/*
	$.ajax({
		type: 'POST',
		url: 'ajaxFormat.php',
		data: {
			txt: ContentDiv
		},
		success:function(data){
			ContentDiv = data;
		}
	});
	*/
	//Dibujar Div
	var Draw = '<div id="'+IdDiv+'" '+Spec+'>'+ContentDiv+'</div>';	
	document.getElementById(IdDiv).innerHTML=Draw;
}
</script>
<style type="text/css">
<!--
.fmtDiv {
	color: #CC0000;
}
-->
</style>
</head>
<body>
<div id="c1" class="fmtDiv"></div>
<div id="c2" class="fmtDiv"></div>
<div id="c3" class="fmtDiv"></div>
<div id="c4" class="fmtDiv"></div>
</div>
</body>
</html>
<script language="javascript">
var Content='<form id="form_pre_registro" name="form_pre_registro" >  <h2 id="header_clientdata">    <font class=acctit> 2 Datos Cliente &nbsp; </font> <a id="ideditclient_link" style="display: none;" href="javascript:json_edit_client_data();" class=edit >Editar</a>  </h2>';

DrawDiv('c1','Caja 5','40%',0,'left','','');
DrawDiv('c2','Caja 2','50%',0,'left','','border:solid 1px #333;');
DrawDiv('c3',Content,'80%',0,'left','both','margin-top:100px; border:solid 1px #333; color:#000000;');
DrawDiv('c4','Contenido','70%','20px','right','both','border:solid 1px #333;');
</script>