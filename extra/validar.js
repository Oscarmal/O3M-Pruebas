function desactivar1(){
parent.frames[1].document.forma1.folio.disabled=true;
parent.frames[1].document.forma1.remesa.disabled=true;
parent.frames[1].document.forma1.cve_elec_baja.disabled=true;
parent.frames[1].document.forma1.cve_elec_vig.disabled=true;
parent.frames[1].document.forma1.ressus.disabled=true;
parent.frames[1].document.forma1.resreh.disabled=true;
parent.frames[1].document.forma1.amp.disabled=true;
parent.frames[1].document.forma1.fns.disabled=true;
parent.frames[1].document.forma1.nin.disabled=true;
parent.frames[1].document.forma1.fecha_recep_ns.disabled=true;
parent.frames[1].document.forma1.juzgado.disabled=true;
parent.frames[1].document.forma1.sede.disabled=true;
parent.frames[1].document.forma1.expediente.disabled=true;
parent.frames[1].document.forma1.delito.disabled=true;
parent.frames[1].document.forma1.fuero.disabled=true;
parent.frames[1].document.forma1.tipo_resol.disabled=true;
parent.frames[1].document.forma1.fecha_resol.disabled=true;
parent.frames[1].document.forma1.fecha_notifica.disabled=true;
parent.frames[1].document.forma1.sancion.disabled=true;
parent.frames[1].document.forma1.fecha_sancion.disabled=true;
parent.frames[1].document.forma1.fun_notifica_nombre.disabled=true;
parent.frames[1].document.forma1.fun_notifica_cargo.disabled=true;
parent.frames[1].document.forma1.fun_auto_nombre.disabled=true;
parent.frames[1].document.forma1.fun_auto_cargo.disabled=true;
parent.frames[1].document.forma1.homonimo.disabled=true;
parent.frames[1].document.forma1.print_sipiex.disabled=true;
parent.frames[1].document.forma1.oficio_sol_cecyrd.disabled=true;
parent.frames[1].document.forma1.fecha_sol_cecyrd.disabled=true;
parent.frames[1].document.forma1.oficio_recep_cecyrd.disabled=true;
parent.frames[1].document.forma1.fecha_recep_cecyrd.disabled=true;
parent.frames[1].document.forma1.sol_oficio.disabled=true;
parent.frames[1].document.forma1.sol_fecha.disabled=true;
parent.frames[1].document.forma1.sol_recep.disabled=true;
parent.frames[1].document.forma1.resp_juez.disabled=true;
parent.frames[1].document.forma1.resp_oficio.disabled=true;
parent.frames[1].document.forma1.resp_fecha.disabled=true;
parent.frames[1].document.forma1.resp_recep.disabled=true;
parent.frames[1].document.forma1.recorda_oficio.disabled=true;
parent.frames[1].document.forma1.recorda_fecha.disabled=true;
parent.frames[1].document.forma1.recorda_recep.disabled=true;
parent.frames[1].document.forma1.resp_recor_juez.disabled=true;
parent.frames[1].document.forma1.resp_recor_oficio.disabled=true;
parent.frames[1].document.forma1.resp_recor_fecha.disabled=true;
parent.frames[1].document.forma1.resp_recor_recep.disabled=true;
parent.frames[1].document.forma1.concerta_oficio.disabled=true;
parent.frames[1].document.forma1.concerta_fecha.disabled=true;
parent.frames[1].document.forma1.concerta_recep.disabled=true;
parent.frames[1].document.forma1.situacion.disabled=true;
parent.frames[1].document.forma1.fun_notifica_situa_nom.disabled=true;
parent.frames[1].document.forma1.fun_notifica_situa_cargo.disabled=true;
parent.frames[1].document.forma1.situacion_fecha.disabled=true;
parent.frames[1].document.forma1.analista.disabled=true;
parent.frames[1].document.forma1.fecha.disabled=true;
parent.frames[1].document.forma1.paso.disabled=true;
parent.frames[1].document.forma1.jodp.disabled=true;
parent.frames[1].document.forma1.vrfe.disabled=true;
parent.frames[1].document.forma1.oficio_rem.disabled=true;
parent.frames[1].document.forma1.fecha_rem.disabled=true;
parent.frames[1].document.forma1.enpadron.disabled=true;
parent.frames[1].document.forma1.otro.disabled=true;
parent.frames[1].document.forma1.admin_oficio.disabled=true;
parent.frames[1].document.forma1.admin_fecha.disabled=true;
parent.frames[1].document.forma1.admin_recep.disabled=true;
parent.frames[1].document.forma1.admin_resp_oficio.disabled=true;
parent.frames[1].document.forma1.admin_resp_fecha.disabled=true;
parent.frames[1].document.forma1.admin_resp_recep.disabled=true;
}

function radio_no(){
forma1.enpadron[0].checked=true;
forma1.enpadron[1].checked=false;
}

function pad_no(){
forma1.enpadron[0].disabled=false;
forma1.enpadron[1].disabled=true;
radio_no();
}

function pad_si(){
forma1.enpadron[0].disabled=false;
forma1.enpadron[1].disabled=false;
radio_no();
}

function cajas_si(){ forma1.nin.checked=false }

function cajas(){
if(forma1.nin.checked!=false){
	forma1.ressus.checked=false;
	forma1.resreh.checked=false;
	forma1.fns.checked=false;
	forma1.amp.checked=false;
	forma1.otro.checked=false;
} else { forma1.nin.checked=false }
}

function imp(){
if(forma1.print_sipiex.value!="SI"){	cecyrd_no() } else { cecyrd_si() }
}

function cecyrd_no(){
forma1.oficio_sol_cecyrd.disabled=true;
forma1.fecha_sol_cecyrd.disabled=true;
forma1.oficio_recep_cecyrd.disabled=true;
forma1.fecha_recep_cecyrd.disabled=true;
forma1.oficio_sol_cecyrd.value="";
forma1.fecha_sol_cecyrd.value="";
forma1.oficio_recep_cecyrd.value="";
forma1.fecha_recep_cecyrd.value="";
forma1.oficio_sol_cecyrd.style.visibility="hidden";
forma1.fecha_sol_cecyrd.style.visibility="hidden";
forma1.oficio_recep_cecyrd.style.visibility="hidden";
forma1.fecha_recep_cecyrd.style.visibility="hidden";
}

function cecyrd_si(){
forma1.oficio_sol_cecyrd.disabled=false;
forma1.fecha_sol_cecyrd.disabled=false;
forma1.oficio_recep_cecyrd.disabled=false;
forma1.fecha_recep_cecyrd.disabled=false;
forma1.oficio_sol_cecyrd.style.visibility="visible";
forma1.fecha_sol_cecyrd.style.visibility="visible";
forma1.oficio_recep_cecyrd.style.visibility="visible";
forma1.fecha_recep_cecyrd.style.visibility="visible";
}

function respu(){
if(forma1.resp_juez.value!="SI"){	respu_no() } else { respu_si() }
}

function respu_no(){
ver();
forma1.resp_oficio.disabled=true;
forma1.resp_fecha.disabled=true;
forma1.resp_recep.disabled=true;
forma1.resp_oficio.value="";
forma1.resp_fecha.value="";
forma1.resp_recep.value="";
forma1.resp_oficio.style.visibility="hidden";
forma1.resp_fecha.style.visibility="hidden";
forma1.resp_recep.style.visibility="hidden";
forma1.resp_recor_juez.value="";
forma1.resp_recor_juez.style.visibility="visible";
}

function respu_si(){
nover();
forma1.resp_oficio.disabled=false;
forma1.resp_fecha.disabled=false;
forma1.resp_recep.disabled=false;
forma1.resp_oficio.style.visibility="visible";
forma1.resp_fecha.style.visibility="visible";
forma1.resp_recep.style.visibility="visible";
forma1.resp_recor_juez.value="";
forma1.resp_recor_juez.style.visibility="hidden";
}


function recorda(){
if(forma1.resp_recor_juez.value!="SI"){	recorda_no() } else { recorda_si() }
}

function recorda_si(){
forma1.resp_recor_oficio.disabled=false;
forma1.resp_recor_fecha.disabled=false;
forma1.resp_recor_recep.disabled=false;
forma1.resp_recor_oficio.style.visibility="visible";
forma1.resp_recor_fecha.style.visibility="visible";
forma1.resp_recor_recep.style.visibility="visible";
forma1.concerta_oficio.disabled=true;
forma1.concerta_fecha.disabled=true;
forma1.concerta_recep.disabled=true;	
forma1.concerta_oficio.dvalue="";
forma1.concerta_fecha.value="";
forma1.concerta_recep.value="";
forma1.concerta_oficio.style.visibility="hidden";
forma1.concerta_fecha.style.visibility="hidden";
forma1.concerta_recep.style.visibility="hidden";
}

function recorda_no(){
forma1.concerta_oficio.disabled=false;
forma1.concerta_fecha.disabled=false;
forma1.concerta_recep.disabled=false;
forma1.concerta_oficio.style.visibility="visible";
forma1.concerta_fecha.style.visibility="visible";
forma1.concerta_recep.style.visibility="visible";
forma1.resp_recor_oficio.disabled=true;
forma1.resp_recor_fecha.disabled=true;
forma1.resp_recor_recep.disabled=true;
forma1.resp_recor_oficio.value="";
forma1.resp_recor_fecha.value="";
forma1.resp_recor_recep.value="";
forma1.resp_recor_oficio.style.visibility="hidden";
forma1.resp_recor_fecha.style.visibility="hidden";
forma1.resp_recor_recep.style.visibility="hidden";
}

function ver(){
forma1.resp_recor_oficio.disabled=false;
forma1.resp_recor_fecha.disabled=false;
forma1.resp_recor_recep.disabled=false;
forma1.resp_recor_oficio.style.visibility="visible";
forma1.resp_recor_fecha.style.visibility="visible";
forma1.resp_recor_recep.style.visibility="visible";
forma1.concerta_oficio.disabled=false;
forma1.concerta_fecha.disabled=false;
forma1.concerta_recep.disabled=false;
forma1.concerta_oficio.style.visibility="visible";
forma1.concerta_fecha.style.visibility="visible";
forma1.concerta_recep.style.visibility="visible";
forma1.recorda_oficio.disabled=false;
forma1.recorda_fecha.disabled=false;
forma1.recorda_recep.disabled=false;
forma1.recorda_oficio.style.visibility="visible";
forma1.recorda_fecha.style.visibility="visible";
forma1.recorda_recep.style.visibility="visible";
forma1.resp_oficio.disabled=false;
forma1.resp_fecha.disabled=false;
forma1.resp_recep.disabled=false;
forma1.resp_oficio.style.visibility="visible";
forma1.resp_fecha.style.visibility="visible";
forma1.resp_recep.style.visibility="visible";
}


function nover(){
forma1.concerta_oficio.disabled=true;
forma1.concerta_fecha.disabled=true;
forma1.concerta_recep.disabled=true;	
forma1.concerta_oficio.dvalue="";
forma1.concerta_fecha.value="";
forma1.concerta_recep.value="";
forma1.concerta_oficio.style.visibility="hidden";
forma1.concerta_fecha.style.visibility="hidden";
forma1.concerta_recep.style.visibility="hidden";
forma1.resp_recor_oficio.disabled=true;
forma1.resp_recor_fecha.disabled=true;
forma1.resp_recor_recep.disabled=true;
forma1.resp_recor_oficio.value="";
forma1.resp_recor_fecha.value="";
forma1.resp_recor_recep.value="";
forma1.resp_recor_oficio.style.visibility="hidden";
forma1.resp_recor_fecha.style.visibility="hidden";
forma1.resp_recor_recep.style.visibility="hidden";
forma1.resp_oficio.disabled=true;
forma1.resp_fecha.disabled=true;
forma1.resp_recep.disabled=true;
forma1.resp_oficio.value="";
forma1.resp_fecha.value="";
forma1.resp_recep.value="";
forma1.resp_oficio.style.visibility="hidden";
forma1.resp_fecha.style.visibility="hidden";
forma1.resp_recep.style.visibility="hidden";
forma1.recorda_oficio.disabled=true;
forma1.recorda_fecha.disabled=true;
forma1.recorda_recep.disabled=true;
forma1.recorda_oficio.value="";
forma1.recorda_fecha.value="";
forma1.recorda_recep.value="";
forma1.recorda_oficio.style.visibility="hidden";
forma1.recorda_fecha.style.visibility="hidden";
forma1.recorda_recep.style.visibility="hidden";
}
	

function act_no(){
forma1.validar1.value="9";
forma1.homonimo[1].checked=true;
// desactiva campos
forma1.ressus.disabled=true;
forma1.resreh.disabled=true;
forma1.fns.disabled=true;
forma1.amp.disabled=true;
forma1.otro.disabled=true;
forma1.nin.disabled=true;
forma1.print_sipiex.disabled=true;
forma1.oficio_sol_cecyrd.disabled=true;
forma1.fecha_sol_cecyrd.disabled=true;
forma1.oficio_recep_cecyrd.disabled=true;
forma1.fecha_recep_cecyrd.disabled=true;
forma1.fecha_recep_ns.disabled=true;
forma1.juzgado.disabled=true;
forma1.ent_juzgado.disabled=true;
forma1.sede.disabled=true;
forma1.expediente.disabled=true;
forma1.delito.disabled=true;
forma1.fuero.disabled=true;
forma1.tipo_resol.disabled=true;
forma1.fecha_resol.disabled=true;
forma1.sancion.disabled=true;
forma1.fecha_sancion.disabled=true;
forma1.fun_notifica_nombre.disabled=true;
forma1.fun_notifica_cargo.disabled=true;
forma1.fun_auto_nombre.disabled=true;
forma1.fun_auto_cargo.disabled=true;
forma1.sol_oficio.disabled=true;
forma1.sol_fecha.disabled=true;
forma1.sol_recep.disabled=true;
forma1.resp_juez.disabled=true;
forma1.resp_oficio.disabled=true;
forma1.resp_fecha.disabled=true;
forma1.resp_recep.disabled=true;
forma1.recorda_oficio.disabled=true;
forma1.recorda_fecha.disabled=true;
forma1.recorda_recep.disabled=true;
forma1.resp_recor_juez.disabled=true;
forma1.resp_recor_oficio.disabled=true;
forma1.resp_recor_fecha.disabled=true;
forma1.resp_recor_recep.disabled=true;
forma1.concerta_oficio.disabled=true;
forma1.concerta_fecha.disabled=true;
forma1.concerta_recep.disabled=true;
forma1.admin_oficio.disabled=true;
forma1.admin_fecha.disabled=true;
forma1.admin_recep.disabled=true;
forma1.admin_resp_oficio.disabled=true;
forma1.admin_resp_fecha.disabled=true;
forma1.admin_resp_recep.disabled=true;

// limpia campos
forma1.enpadron.checked=false;
forma1.ressus.checked=false;
forma1.resreh.checked=false;
forma1.fns.checked=false;
forma1.amp.checked=false;
forma1.otro.checked=false;
forma1.nin.checked=false;
forma1.oficio_sol_cecyrd.value="";
forma1.fecha_sol_cecyrd.value="";
forma1.oficio_recep_cecyrd.value="";
forma1.fecha_recep_cecyrd.value="";
forma1.fecha_recep_ns.value="";
forma1.juzgado.value="";
forma1.ent_juzgado.value="";
forma1.sede.value="";
forma1.expediente.value="";
forma1.delito.value="";
forma1.fuero.value="";
forma1.tipo_resol.value="";
forma1.fecha_resol.value="";
forma1.sancion.value="";
forma1.fecha_sancion.value="";
forma1.fun_notifica_nombre.value="";
forma1.fun_notifica_cargo.value="";
forma1.fun_auto_nombre.value="";
forma1.fun_auto_cargo.value="";
forma1.print_sipiex.value="";
forma1.sol_oficio.value="";
forma1.sol_fecha.value="";
forma1.sol_recep.value="";
forma1.resp_juez.value="";
forma1.resp_oficio.value="";
forma1.resp_fecha.value="";
forma1.resp_recep.value="";
forma1.recorda_oficio.value="";
forma1.recorda_fecha.value="";
forma1.recorda_recep.value="";
forma1.resp_recor_juez.value="";
forma1.resp_recor_oficio.value="";
forma1.resp_recor_fecha.value="";
forma1.resp_recor_recep.value="";
forma1.concerta_oficio.value="";
forma1.concerta_fecha.value="";
forma1.concerta_recep.value="";
forma1.admin_oficio.value="";
forma1.admin_fecha.value="";
forma1.admin_recep.value="";
forma1.admin_resp_oficio.value="";
forma1.admin_resp_fecha.value="";
forma1.admin_resp_recep.value="";
}

function act_si(){
// activa campos
forma1.validar1.value="";
forma1.enpadron.disabled=false;
forma1.ressus.disabled=false;
forma1.resreh.disabled=false;
forma1.fns.disabled=false;
forma1.amp.disabled=false;
forma1.otro.disabled=false;
forma1.nin.disabled=false;
forma1.print_sipiex.disabled=false;
forma1.oficio_sol_cecyrd.disabled=false;
forma1.fecha_sol_cecyrd.disabled=false;
forma1.oficio_recep_cecyrd.disabled=false;
forma1.fecha_recep_cecyrd.disabled=false;
forma1.fecha_recep_ns.disabled=false;
forma1.juzgado.disabled=false;
forma1.ent_juzgado.disabled=false;
forma1.sede.disabled=false;
forma1.expediente.disabled=false;
forma1.delito.disabled=false;
forma1.fuero.disabled=false;
forma1.tipo_resol.disabled=false;
forma1.fecha_resol.disabled=false;
forma1.sancion.disabled=false;
forma1.fecha_sancion.disabled=false;
forma1.fun_notifica_nombre.disabled=false;
forma1.fun_notifica_cargo.disabled=false;
forma1.fun_auto_nombre.disabled=false;
forma1.fun_auto_cargo.disabled=false;
forma1.sol_oficio.disabled=false;
forma1.sol_fecha.disabled=false;
forma1.sol_recep.disabled=false;
forma1.resp_juez.disabled=false;
forma1.resp_oficio.disabled=false;
forma1.resp_fecha.disabled=false;
forma1.resp_recep.disabled=false;
forma1.recorda_oficio.disabled=false;
forma1.recorda_fecha.disabled=false;
forma1.recorda_recep.disabled=false;
forma1.resp_recor_juez.disabled=false;
forma1.resp_recor_oficio.disabled=false;
forma1.resp_recor_fecha.disabled=false;
forma1.resp_recor_recep.disabled=false;
forma1.concerta_oficio.disabled=false;
forma1.concerta_fecha.disabled=false;
forma1.concerta_recep.disabled=false;
forma1.admin_oficio.disabled=false;
forma1.admin_fecha.disabled=false;
forma1.admin_recep.disabled=false;
forma1.admin_resp_oficio.disabled=false;
forma1.admin_resp_fecha.disabled=false;
forma1.admin_resp_recep.disabled=false;
}

function ceros(){
if(this.value=='0000-00-00 00:00:00') { this.value=='';}
}

function val_formatos(){
if(formato.documento.value<1) {
	m1 = "Seleccione un tipo de DOCUMENTO";	
if(formato.op1.value<1) {
	m2 = "Seleccione alguna opción";
if(formato.op1.value=1 && formato.folio_ini.value<0 ) {
	m3 = "Ingrese un rango de folios correcto";
	alert(m1+"\n"+m2+"\n"+m3)
    return 0; 
} } }
}

function enpadron1(){
if(forma1.enpadron.value==1) {
	forma1.situacion.disabled=false; 
	} 
	else {forma1.situacion.value=""; 
		forma1.situacion.disabled=true; 
	}
}


<!--O3M-->