<?php
import_request_variables("g,p","v_");
echo $v_switch;
echo "<br/>";
echo $v_simple;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="../jquery/jquery-1.9.1.min.js"></script>
<script src="jquery.on_off/iphone-style-checkboxes.js"></script>
<link rel="stylesheet" href="jquery.on_off/iphone-style-checkboxes.css">
<script type="text/javascript">
$(document).ready(function() {
  $('#switch:checkbox').iphoneStyle({
	  checkedLabel: 'YES',
	  uncheckedLabel: 'NO'
	});
	
	var checkbox = $('#switch:checkbox');
	checkbox.on('click',function(){
	if(checkbox.attr('checked') == 'checked'){
		this.removeAttr('checked');
	} else {
		this.attr('checked','checked');
		alert('checked');        
	}
	});

});
function Valor(val){
	//$( "div.Sel" ).replaceWith( "<h2>"+Val+"wew</h2>" );
	/*$('#switch').change(function(){
            alert('changed');
      });
	 */
	 var checkbox = $('#switch');
	 if(checkbox.attr('checked') == 'checked'){
		val=1;
	} else {val=6;}
	document.getElementById('Sel').innerHTML=val;
	//alert("WOrk");
}
</script>
</head>
<body>
<form id="fdatos" method="post"	action="<?php $_SERVER['PHP_SELF']; ?>">
<input name="switch" id="switch" checked='checked' class='yesno' type='checkbox' onclick="Valor(this.value);" />
<input name ="simple" id="simple" checked='checked' type='checkbox' value="1" onclick="Valor(this.value);" />
<input type="submit" id="bmanda" value="Enviar" />
</form>
<br/>
<div id="Sel">65756756</div>
</body>
</html>
