<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<script type="text/javascript" src="../src/jquery-1.9.1.js"></script>
<script language="javascript">
function DrawDiv(IdDiv, Width, Float, Clear, Margin){ 
	Margin = Margin.split(",");  
	$("#"+IdDiv).css({
		"width" : Width,
		"float" : Float,
		"clear" : Clear,
		"margin-top" : Margin[0],
		"margin-right" : Margin[1],
		"margin-bottom" : Margin[2],
		"margin-left" : Margin[3]	
	})
}
function ViewDiv(IdDiv,View){
	var Div=document.getElementById(IdDiv);
	var DivView=(View=='false') ? Div.style.display="none" : Div.style.display="display";
}
function HideDiv(Element) {
    item=$("#"+Element);
    if($(item).hasClass('invisible')) {
        $(item).removeClass('invisible');
        $(item).addClass('visible');
        $(item).slideUp('fast');
    } else {
        $(item).removeClass('visible');
        $(item).addClass('invisible');
        $(item).slideDown('fast');
    }
}

function HideDiv2(Element, Class) {
    item=(Element!='') ? $("#"+Element) : $("."+Class);
	$("."+Class).removeClass('visible');
	$("."+Class).addClass('invisible');
    $("."+Class).slideUp('fast');		
    $(item).removeClass('invisible');
    $(item).addClass('visible');
    if(Element!=''){$(item).slideDown('fast');}
}

function HideDiv3(Element, Class, Time) {
	var Tempo=(Time==0)? null : Time;
    item=(Element!='') ? $("#"+Element) : $("."+Class);
    $("."+Class).hide(Tempo);		
    if(Element!=''){$(item).show(Tempo);}
}
</script>
<style type="text/css">
<!--
.fmtDiv {
	color: #CC0000;
	/*border:solid 1px #333;*/
}
.Contenedor {
	background:#F0F0F0;
	width:500px;
	/*border:solid 1px #333;*/
	padding-left:20px;
	padding-right:20px;
	overflow:hidden;
}
-->
</style>
</head>
<body>
<div id="Contenedor" class="Contenedor">
<div id="c1" class="fmtDiv">
<form id="form_pre_registro" name="form_pre_registro" >				
  <h2 id="header_clientdata"	>  
  <font class=acctit> 1 Forma &nbsp;</font> <a id="ideditclient_link" style="display: none;" href="javascript:json_edit_client_data();"  >Editar</a>
  <a href="javascript:HideDiv('paso1');" >Ver</a>
  <form name="fdata" method="post" action="">
  <select id="lstList1" name="lstList1" onchange="javascript: HideDiv2(this.value, 'pane'); ">
  	<option value="" selected="selected">---Size---</option>
  	<option value="paso1">Small</option>
    <option value="paso2">Medium</option>
    <option value="paso3">Large</option>
    <option value="paso4">X Large</option>
    <option value="paso5">XX Large</option>
    <option value="paso6">Uno</option>
    <option value="paso7">Dos</option>
    <option value="paso8">Tres</option>
  </select>
  </form>
  </h2>
  	<div class="pane" style="display:none;" bgcolor="#ffffff" id="paso1">

		<table cellpadding=5 cellspacing=1 bgcolor="#e1e1e1" width=100% border="0">
			<tr>
				<td bgcolor="#ffffff" align=left>
					<!-- celda blanca -->
					<table cellpadding=0   cellspacing=2 style="margin-top:0px;">
						
						 <tr>
							<td align="center">
								 <a href="/reorder_cust.php">	
								<img wi border="0" src="reordenar.png"><br><br>
								</a>
							</td>
						</tr>
						
						<tr>
							<td align=left valign=top><font class=inptxt>
 								 <font class="req">*</font>
								<span class="formerror"><?=$error['firstname'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="firstname" id="firstname" value="<?=$in['firstname'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td align=left ><font class=inptxt>
								 <font class="req">*</font>
								<span class="formerror"><?=$error['lastname1'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="lastname1" id="lastname1" value="<?=$in['lastname1'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt>><font class="req"> *</font>
								<span class="formerror"><?=$error['email'];?></span>
								<br>		
								<input class="inputxlargo" type="email" name="email" id="email" value="<?=$in['email'];	?>"  required="required" title="Debe ser una direccion valida"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt><font class="req"> *</font>
								<span class="formerror"><?=$error['phone'];?></span>
								<br>		
								<input class="inputcorto" type="text" name="phone1" id="phone1" maxlength="20" value="<?=$in['phone1'];	?>" pattern="[\(\)\d- ]{8,}"  required="required" />
							</td>
						</tr>
						<!--
						<tr>
							<td align=left>
								<font class=inptxt>
								<span class="formerror"><?=$error['cellphone'];?></span>
								<br>
								<input class="inputbox" type="text" name="cellphone" id="cellphone" value="<?=$in['cellphone'];	?>" /><br />
							</td>
						</tr>
						-->
						<tr>
							<td align=left ><font class=inptxt>
								<font class="req">*</font>
								<span class="formerror"><?=$error['sex'];?></span>
								&nbsp;&nbsp;		
								<input type="radio" value="Female" name="sex" id="sex" required="required" checked="checked"> <font class=inptxt>&nbsp; &nbsp;
								<input type="radio" value="Male" name="sex" id="sex" required="required"> <font class=inptxt>
							</td>
						</tr>
						<tr>
							<td>
								<img src=mod/linea.jpg style="margin-top:15px; margin-bottom:15px;">
								<font class=dato>
								<input type="button" class="button" id="button_client_data" onclick="javascript:client_data();" value="Continuar">
								<br><br>
								<font class=inptxt>&nbsp;&nbsp; Atenci&oacute;n telef&oacute;nica: <b><font size=3> 1-888-339-2990</b>
								<br>		
							</td>
						</tr>
					</table>
					<!-- celda blanca -->
 				</td>
 			</tr>
 		</table>    
  </div>
</form>
</div>
<div id="c2" class="fmtDiv">
<form id="form_pre_registro" name="form_pre_registro" >				
  <h2 id="header_clientdata">  
  <font class=acctit> 2 Forma &nbsp; </font> <a id="ideditclient_link" style="display: none;" href="javascript:json_edit_client_data();" class=edit >Editar</a>
  <a href="javascript:HideDiv('paso2');" class=edit >Ver</a>
  </h2>
  	<div class="pane" style="display:none;" bgcolor="#ffffff" id="paso2">

		<table cellpadding=5 cellspacing=1 bgcolor="#e1e1e1" width=100% border="0">
			<tr>
				<td bgcolor="#ffffff" align=left>
					<!-- celda blanca -->
					<table cellpadding=0   cellspacing=2 style="margin-top:0px;">
						
						 <tr>
							<td align="center">
								 <a href="/reorder_cust.php">	
								<img wi border="0" src="reordenar.png"><br><br>
								</a>
							</td>
						</tr>
						
						<tr>
							<td align=left valign=top><font class=inptxt>
 								 <font class="req">*</font>
								<span class="formerror"><?=$error['firstname'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="firstname" id="firstname" value="<?=$in['firstname'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td align=left ><font class=inptxt>
								 <font class="req">*</font>
								<span class="formerror"><?=$error['lastname1'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="lastname1" id="lastname1" value="<?=$in['lastname1'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt>><font class="req"> *</font>
								<span class="formerror"><?=$error['email'];?></span>
								<br>		
								<input class="inputxlargo" type="email" name="email" id="email" value="<?=$in['email'];	?>"  required="required" title="Debe ser una direccion valida"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt><font class="req"> *</font>
								<span class="formerror"><?=$error['phone'];?></span>
								<br>		
								<input class="inputcorto" type="text" name="phone1" id="phone1" maxlength="20" value="<?=$in['phone1'];	?>" pattern="[\(\)\d- ]{8,}"  required="required" />
							</td>
						</tr>
						<!--
						<tr>
							<td align=left>
								<font class=inptxt>
								<span class="formerror"><?=$error['cellphone'];?></span>
								<br>
								<input class="inputbox" type="text" name="cellphone" id="cellphone" value="<?=$in['cellphone'];	?>" /><br />
							</td>
						</tr>
						-->
						<tr>
							<td align=left ><font class=inptxt>
								<font class="req">*</font>
								<span class="formerror"><?=$error['sex'];?></span>
								&nbsp;&nbsp;		
								<input type="radio" value="Female" name="sex" id="sex" required="required" checked="checked"> <font class=inptxt>&nbsp; &nbsp;
								<input type="radio" value="Male" name="sex" id="sex" required="required"> <font class=inptxt>
							</td>
						</tr>
						<tr>
							<td>
								<img src=mod/linea.jpg style="margin-top:15px; margin-bottom:15px;">
								<font class=dato>
								<input type="button" class="button" id="button_client_data" onclick="javascript:client_data();" value="Continuar">
								<br><br>
								<font class=inptxt>&nbsp;&nbsp; Atenci&oacute;n telef&oacute;nica: <b><font size=3> 1-888-339-2990</b>
								<br>		
							</td>
						</tr>
					</table>
					<!-- celda blanca -->
 				</td>
 			</tr>
 		</table>    
  </div>
</form>
</div>
<div id="c3" class="fmtDiv">
<form id="form_pre_registro" name="form_pre_registro" >				
  <h2 id="header_clientdata">  
  <font class=acctit> 3 Forma &nbsp; </font> <a id="ideditclient_link" style="display: none;" href="javascript:json_edit_client_data();" class=edit >Editar</a>
  <a href="javascript:HideDiv('paso3');" class=edit >Ver</a>
  </h2>
  	<div class="pane" style="display:none;" bgcolor="#ffffff" id="paso3">

		<table cellpadding=5 cellspacing=1 bgcolor="#e1e1e1" width=100% border="0">
			<tr>
				<td bgcolor="#ffffff" align=left>
					<!-- celda blanca -->
					<table cellpadding=0   cellspacing=2 style="margin-top:0px;">
						
						 <tr>
							<td align="center">
								 <a href="/reorder_cust.php">	
								<img wi border="0" src="reordenar.png"><br><br>
								</a>
							</td>
						</tr>
						
						<tr>
							<td align=left valign=top><font class=inptxt>
 								 <font class="req">*</font>
								<span class="formerror"><?=$error['firstname'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="firstname" id="firstname" value="<?=$in['firstname'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td align=left ><font class=inptxt>
								 <font class="req">*</font>
								<span class="formerror"><?=$error['lastname1'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="lastname1" id="lastname1" value="<?=$in['lastname1'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt>><font class="req"> *</font>
								<span class="formerror"><?=$error['email'];?></span>
								<br>		
								<input class="inputxlargo" type="email" name="email" id="email" value="<?=$in['email'];	?>"  required="required" title="Debe ser una direccion valida"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt><font class="req"> *</font>
								<span class="formerror"><?=$error['phone'];?></span>
								<br>		
								<input class="inputcorto" type="text" name="phone1" id="phone1" maxlength="20" value="<?=$in['phone1'];	?>" pattern="[\(\)\d- ]{8,}"  required="required" />
							</td>
						</tr>
						<!--
						<tr>
							<td align=left>
								<font class=inptxt>
								<span class="formerror"><?=$error['cellphone'];?></span>
								<br>
								<input class="inputbox" type="text" name="cellphone" id="cellphone" value="<?=$in['cellphone'];	?>" /><br />
							</td>
						</tr>
						-->
						<tr>
							<td align=left ><font class=inptxt>
								<font class="req">*</font>
								<span class="formerror"><?=$error['sex'];?></span>
								&nbsp;&nbsp;		
								<input type="radio" value="Female" name="sex" id="sex" required="required" checked="checked"> <font class=inptxt>&nbsp; &nbsp;
								<input type="radio" value="Male" name="sex" id="sex" required="required"> <font class=inptxt>
							</td>
						</tr>
						<tr>
							<td>
								<img src=mod/linea.jpg style="margin-top:15px; margin-bottom:15px;">
								<font class=dato>
								<input type="button" class="button" id="button_client_data" onclick="javascript:client_data();" value="Continuar">
								<br><br>
								<font class=inptxt>&nbsp;&nbsp; Atenci&oacute;n telef&oacute;nica: <b><font size=3> 1-888-339-2990</b>
								<br>		
							</td>
						</tr>
					</table>
					<!-- celda blanca -->
 				</td>
 			</tr>
 		</table>    
  </div>
</form>
</div>
<div id="c4" class="fmtDiv">
<form id="form_pre_registro" name="form_pre_registro" >				
  <h2 id="header_clientdata">  
  <font class=acctit> 4 Forma &nbsp; </font> <a id="ideditclient_link" style="display: none;" href="javascript:json_edit_client_data();" class=edit >Editar</a>
  <a href="javascript:HideDiv('paso4');" class=edit >Ver</a>
  </h2>
  	<div class="pane" style="display:none;" bgcolor="#ffffff" id="paso4">

		<table cellpadding=5 cellspacing=1 bgcolor="#e1e1e1" width=100% border="0">
			<tr>
				<td bgcolor="#ffffff" align=left>
					<!-- celda blanca -->
					<table cellpadding=0   cellspacing=2 style="margin-top:0px;">
						
						 <tr>
							<td align="center">
								 <a href="/reorder_cust.php">	
								<img wi border="0" src="reordenar.png"><br><br>
								</a>
							</td>
						</tr>
						
						<tr>
							<td align=left valign=top><font class=inptxt>
 								 <font class="req">*</font>
								<span class="formerror"><?=$error['firstname'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="firstname" id="firstname" value="<?=$in['firstname'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td align=left ><font class=inptxt>
								 <font class="req">*</font>
								<span class="formerror"><?=$error['lastname1'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="lastname1" id="lastname1" value="<?=$in['lastname1'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt>><font class="req"> *</font>
								<span class="formerror"><?=$error['email'];?></span>
								<br>		
								<input class="inputxlargo" type="email" name="email" id="email" value="<?=$in['email'];	?>"  required="required" title="Debe ser una direccion valida"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt><font class="req"> *</font>
								<span class="formerror"><?=$error['phone'];?></span>
								<br>		
								<input class="inputcorto" type="text" name="phone1" id="phone1" maxlength="20" value="<?=$in['phone1'];	?>" pattern="[\(\)\d- ]{8,}"  required="required" />
							</td>
						</tr>
						<!--
						<tr>
							<td align=left>
								<font class=inptxt>
								<span class="formerror"><?=$error['cellphone'];?></span>
								<br>
								<input class="inputbox" type="text" name="cellphone" id="cellphone" value="<?=$in['cellphone'];	?>" /><br />
							</td>
						</tr>
						-->
						<tr>
							<td align=left ><font class=inptxt>
								<font class="req">*</font>
								<span class="formerror"><?=$error['sex'];?></span>
								&nbsp;&nbsp;		
								<input type="radio" value="Female" name="sex" id="sex" required="required" checked="checked"> <font class=inptxt>&nbsp; &nbsp;
								<input type="radio" value="Male" name="sex" id="sex" required="required"> <font class=inptxt>
							</td>
						</tr>
						<tr>
							<td>
								<img src=mod/linea.jpg style="margin-top:15px; margin-bottom:15px;">
								<font class=dato>
								<input type="button" class="button" id="button_client_data" onclick="javascript:client_data();" value="Continuar">
								<br><br>
								<font class=inptxt>&nbsp;&nbsp; Atenci&oacute;n telef&oacute;nica: <b><font size=3> 1-888-339-2990</b>
								<br>		
							</td>
						</tr>
					</table>
					<!-- celda blanca -->
 				</td>
 			</tr>
 		</table>    
  </div>
</form>
</div>
<div id="c5" class="fmtDiv">
<form id="form_pre_registro" name="form_pre_registro" >				
  <h2 id="header_clientdata">  
  <font class=acctit> 5 Forma &nbsp; </font> <a id="ideditclient_link" style="display: none;" href="javascript:json_edit_client_data();" class=edit >Editar</a>
  <a href="javascript:HideDiv('paso5');" class=edit >Ver</a>
  </h2>
  	<div class="pane" style="display:none;" bgcolor="#ffffff" id="paso5">

		<table cellpadding=5 cellspacing=1 bgcolor="#e1e1e1" width=100% border="0">
			<tr>
				<td bgcolor="#ffffff" align=left>
					<!-- celda blanca -->
					<table cellpadding=0   cellspacing=2 style="margin-top:0px;">
						
						 <tr>
							<td align="center">
								 <a href="/reorder_cust.php">	
								<img wi border="0" src="reordenar.png"><br><br>
								</a>
							</td>
						</tr>
						
						<tr>
							<td align=left valign=top><font class=inptxt>
 								 <font class="req">*</font>
								<span class="formerror"><?=$error['firstname'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="firstname" id="firstname" value="<?=$in['firstname'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td align=left ><font class=inptxt>
								 <font class="req">*</font>
								<span class="formerror"><?=$error['lastname1'];?></span>
								<br>
								<input class="inputxlargo" type="text" name="lastname1" id="lastname1" value="<?=$in['lastname1'];?>"  required="required"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt>><font class="req"> *</font>
								<span class="formerror"><?=$error['email'];?></span>
								<br>		
								<input class="inputxlargo" type="email" name="email" id="email" value="<?=$in['email'];	?>"  required="required" title="Debe ser una direccion valida"/>
							</td>
						</tr>
						<tr>
							<td  align=left>
								<font class=inptxt><font class="req"> *</font>
								<span class="formerror"><?=$error['phone'];?></span>
								<br>		
								<input class="inputcorto" type="text" name="phone1" id="phone1" maxlength="20" value="<?=$in['phone1'];	?>" pattern="[\(\)\d- ]{8,}"  required="required" />
							</td>
						</tr>
						<!--
						<tr>
							<td align=left>
								<font class=inptxt>
								<span class="formerror"><?=$error['cellphone'];?></span>
								<br>
								<input class="inputbox" type="text" name="cellphone" id="cellphone" value="<?=$in['cellphone'];	?>" /><br />
							</td>
						</tr>
						-->
						<tr>
							<td align=left ><font class=inptxt>
								<font class="req">*</font>
								<span class="formerror"><?=$error['sex'];?></span>
								&nbsp;&nbsp;		
								<input type="radio" value="Female" name="sex" id="sex" required="required" checked="checked"> <font class=inptxt>&nbsp; &nbsp;
								<input type="radio" value="Male" name="sex" id="sex" required="required"> <font class=inptxt>
							</td>
						</tr>
						<tr>
							<td>
								<img src=mod/linea.jpg style="margin-top:15px; margin-bottom:15px;">
								<font class=dato>
								<input type="button" class="button" id="button_client_data" onclick="javascript:client_data();" value="Continuar">
								<br><br>
								<font class=inptxt>&nbsp;&nbsp; Atenci&oacute;n telef&oacute;nica: <b><font size=3> 1-888-339-2990</b>
								<br>		
							</td>
						</tr>
					</table>
					<!-- celda blanca -->
 				</td>
 			</tr>
 		</table>    
  </div>
</form>
</div>

</div>

<div class="pane" style="display:none;" id="paso6">1</div>
<div class="pane" style="display:none;"  id="paso7">2</div>
<div class="pane" style="display:none;"  id="paso8">3</div>

</body>
</html>
<script language="javascript">
/*
DrawDiv('c1','100%','left','both','0,0,0,0');
DrawDiv('c2','49.5%','left','','0,0,0,0');
DrawDiv('c3','49.5%','right','','0,0,0,0');
DrawDiv('c4','49.5%','right','right','0,0,0,0');
DrawDiv('c5','100%','right','right','0,0,50px,0');
*/
/*
DrawDiv('c1','100%','left','both','0,0,0,0');
DrawDiv('c2','33%','left','','0,3px,0,0');
DrawDiv('c3','33%','left','','0,0,0,0');
DrawDiv('c4','33%','right','','0,0,0,0');
DrawDiv('c5','100%','right','right','0,0,50px,0');
*/

DrawDiv('c1','100%','left','both','-10px,0,0,0');
DrawDiv('c2','100%','left','both','0,0,0,0');
DrawDiv('c3','100%','left','both','0,0,0,0');
DrawDiv('c4','100%','left','both','0,0,0,0');
DrawDiv('c5','100%','left','both','0,0,50px,0');

</script>