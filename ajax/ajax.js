function fajax(EtiquetaDiv,Pagina,MultiValores){
	var xmlhttp;
	try{xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");}
	catch(e){try{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	catch(E){if(!xmlhttp && typeof XMLHttpRequest!='undefined') 
	xmlhttp=new XMLHttpRequest();}}
	if (MultiValores.length==0){
		document.getElementById(EtiquetaDiv).innerHTML="";
		return;
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById(EtiquetaDiv).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST",Pagina+"?v="+MultiValores,true);
	xmlhttp.send(null);
}
