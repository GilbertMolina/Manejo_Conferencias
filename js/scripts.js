/* SCRIPTS DE MAXIMUM INTELLIGENCE */

/*---------------------------SCRIPTS PROVEEDORES---------------------------*/

function validarProveedores(){
	
    var v=document.forms["registro_de_proveedor"]["nombre"].value;
    var w=document.forms["registro_de_proveedor"]["razon_social"].value;
    var x=document.forms["registro_de_proveedor"]["cedula"].value;
    var y=document.forms["registro_de_proveedor"]["costo_del_servicio"].value;
    var z=document.forms["registro_de_proveedor"]["descripcion_del_servicio"].value;
	
    /*Validar nombre*/

    if(v==0 || v==""){
        alert("Debe ingresar el nombre del proveedor");
        document.registro_de_proveedor.nombre.select();
        return false;
    }
    if(/^([0-9])*$/.test(v)){
        alert("El nombre no es v\xe1lido, debe ser texto");
        document.registro_de_proveedor.nombre.select();
        return false;
    }
	
    /*Validar razon social*/

    if(w==0 || w==""){
        alert("Debe ingresar la raz\xf3n social del proveedor");
        document.registro_de_proveedor.razon_social.select();
        return false;
    }
    if(/^([0-9])*$/.test(w)){
        alert("La raz\xf3n social no es v\xe1lido, debe ser texto");
        document.registro_de_proveedor.razon_social.select();
        return false;
    }
	
    /*Validar cedula*/

    if(x==0 || x=="" || x=="Ej: 3-0544-0142 / 3-002-45628-04"){ 
        alert("Debe ingresar la c\xe9dula del proveedor");
        document.registro_de_proveedor.cedula.select();
        return false;
    }
    if(/^([0-9])*$/.test(x)){
        alert("La c\xe9dula no es v\xe1lida");
        document.registro_de_proveedor.cedula.select();
        return false;
    }
    
    /*Validar costo*/

    if(y==0 || y==""){
        alert("Debe ingresar el costo del servicio"); 
        document.registro_de_proveedor.costo_del_servicio.select();
        return false;
    }
    if(!/^([0-9.])*$/.test(y)){
        alert("El costo no es v\xe1lido, debe ser un valor n\xfamerico");
        document.registro_de_proveedor.costo_del_servicio.select();
        return false;
    }
	
    /*Validar descripcion*/
	
    if(z==0 || z=="" || z=="Escriba aquí la descripción del servicio"){ 
        alert("Debe ingresar la descripci\xf3n del servicio");
        document.registro_de_proveedor.descripcion_del_servicio.select();
        return false;
    }
    return true;
}

function volverMostrarProveedores(){
    document.location.href = "mostrarProveedor.php";
}

function borrarProveedor(id_proveedor) {
    if (window.confirm("Atenci\xf3n:\n\nEl proveedor ser\xe1 eliminado definitivamente")) {
        window.location = "eliminarProveedor.php?id_proveedor="+id_proveedor;
    }
}

function quitarCedula(){
    if(document.getElementById('cedula').value=='Ej: 3-0544-0142 / 3-002-45628-04') {
        document.getElementById('cedula').value='';
        document.getElementById('cedula').className='noInstruccion'
    }
}

function ponerCedula() {
    if(document.getElementById('cedula').value=='') {
        document.getElementById('cedula').value='Ej: 3-0544-0142 / 3-002-45628-04';
        document.getElementById('cedula').className='instruccion'
    }
}

function quitarDescripcion(){
    if(document.getElementById('descripcion_del_servicio').value=='Escriba aquí la descripción del servicio') {
        document.getElementById('descripcion_del_servicio').value='';
        document.getElementById('descripcion_del_servicio').className='noInstruccion'
    }
}

function ponerDescripcion(){
    if(document.getElementById('descripcion_del_servicio').value=='') {
        document.getElementById('descripcion_del_servicio').value='Escriba aquí la descripción del servicio';
        document.getElementById('descripcion_del_servicio').className='instruccion'
    }
}

/*---------------------------SCRIPTS ORDENES DE PAGO---------------------------*/

function validarRegistrarOrdenesDePago(){
	
    var v=document.forms["ordenes_de_pago_a_proveedor"]["numero_factura"].value;
    var w=document.forms["ordenes_de_pago_a_proveedor"]["monto"].value;
	
    /*Validar numero factura*/

    if(v==0 || v==""){
        alert("Debe ingresar el n\xfamero de la factura");
        document.ordenes_de_pago_a_proveedor.numero_factura.select();
        return false;
    }
    if(!/^([0-9.])*$/.test(v)){
        alert("El n\xfamero no es v\xe1lido, debe ser un valor n\xfamerico");
        document.ordenes_de_pago_a_proveedor.numero_factura.select();
        return false;
    }
	
    /*Validar monto*/

    if(w==0 || w==""){
        alert("Debe ingresar el monto");
        document.ordenes_de_pago_a_proveedor.monto.select();
        return false;
    }
    if(!/^([0-9.])*$/.test(w)){
        alert("El monto no es v\xe1lido, debe ser un valor n\xfamerico");
        document.ordenes_de_pago_a_proveedor.monto.select();
        return false;
    }
    return true;
}

function validarEditarOrdenesDePago(){
	
    var v=document.forms["ordenes_de_pago_a_proveedor"]["nombre"].value;
    var w=document.forms["ordenes_de_pago_a_proveedor"]["numero_factura"].value;
    var x=document.forms["ordenes_de_pago_a_proveedor"]["cedula"].value;
    var y=document.forms["ordenes_de_pago_a_proveedor"]["monto"].value;
	
    /*Validar nombre*/

    if(v==0 || v==""){
        alert("Debe ingresar el nombre del proveedor");
        document.ordenes_de_pago_a_proveedor.nombre.select();
        return false;
    }
    if(/^([0-9])*$/.test(v)){
        alert("El nombre no es v\xe1lido, debe ser texto");
        document.ordenes_de_pago_a_proveedor.nombre.select();
        return false;
    }
	
    /*Validar numero factura*/

    if(w==0 || w==""){
        alert("Debe ingresar el n\xfamero de la factura");
        document.ordenes_de_pago_a_proveedor.numero_factura.select();
        return false;
    }
    if(!/^([0-9.])*$/.test(w)){
        alert("El n\xfamero no es v\xe1lido, debe ser un valor n\xfamerico");
        document.ordenes_de_pago_a_proveedor.numero_factura.select();
        return false;
    }
	
    /*Validar cedula*/

    if(x==0 || x=="" || x=="ej: 3-0544-0142 / 3-002-45628-04"){
        alert("Debe ingresar la c\xe9dula del proveedor");
        document.ordenes_de_pago_a_proveedor.cedula.select();
        return false;
    }
    if(/^([0-9])*$/.test(x)){
        alert("La c\xe9dula no es v\xe1lida");
        document.ordenes_de_pago_a_proveedor.cedula.select();
        return false;
    }
	
    /*Validar monto*/

    if(y==0 || y==""){
        alert("Debe ingresar el monto");
        document.ordenes_de_pago_a_proveedor.monto.select();
        return false;
    }
    if(!/^([0-9.])*$/.test(y)){
        alert("El monto no es v\xe1lido, debe ser un valor n\xfamerico");
        document.ordenes_de_pago_a_proveedor.monto.select();
        return false;
    }
    return true;
}

function volverMostrarOrdenes(){
    document.location.href = "mostrarOrdenesDePago.php";
}

function volverEmitirOrdenes(){
    document.location.href = "emitirOrdenesDePago.php";
}

function borrarOrdenDePago(id_orden) {
    if (window.confirm("Atenci\xf3n:\n\nLa orden ser\xe1 eliminada definitivamente")) {
        window.location = "eliminarOrdenesDePago.php?id_orden="+id_orden;
    }
}

function pagarOrdenDePago(id_orden) {
    if (window.confirm("Atenci\xf3n:\n\nLa orden ser\xe1 pagada"))	{
        window.location = "pagarOrdenes.php?id_orden="+id_orden;
    }
}

/*---------------------------SCRIPTS PRESUPUESTOS---------------------------*/

function enviarFormulario() {
    var formulario= document.getElementById('busqueda_presupuesto');
    formulario.submit();
}

/*---------------------------SCRIPTS GASTOS CONFERENCIA---------------------------*/

function validarRegistroGastosConferencia(){
	
    var a=document.forms["gastos_conferencia"]["id_conferencia"].value;
    var b=document.forms["gastos_conferencia"]["nombre_tipo_gasto"].value;
    var c=document.forms["gastos_conferencia"]["descripcion_tipo_gasto"].value;
    var d=document.forms["gastos_conferencia"]["costo_del_gasto"].value;
    var estado = document.getElementsByName("esta_aprobado");
    var seleccionado = false;
	
    /*Validar identificador de la conferencia*/

    if(a==0 || a==""){
        alert("Debe seleccionar el nombre de la conferencia");
        return false;
    }
	
    /*Validar nombre del gasto*/

    if(b==0 || b==""){
        alert("Debe ingresar el nombre del gasto");
        document.gastos_conferencia.nombre_tipo_gasto.select();
        return false;
    }
    if(/^([0-9])*$/.test(b)){
        alert("El nombre no es v\xe1lido, tiene que ser texto");
        document.gastos_conferencia.nombre_tipo_gasto.select();
        return false;
    }
		
    /*Validar costo del gasto*/

    if(d==0 || d==""){
        alert("Debe ingresar el costo del gasto");
        document.gastos_conferencia.costo_del_gasto.select();
        return false;
    }
    if(!/^([0-9.])*$/.test(d)){
        alert("El costo no es v\xe1lido, tiene que ser un valor n\xfamerico");
        document.gastos_conferencia.costo_del_gasto.select();
        return false;
    }
		
    /*Validar descripcion del gasto*/
	
    if(c==0 || c=="" || c=="Escriba aquí la descripción del gasto"){
        alert("Debe ingresar la descripci\xf3n del gasto");
        document.gastos_conferencia.descripcion_tipo_gasto.select();
        return false;
    }
    if(/^([0-9])*$/.test(c)){
        alert("La descripci\xf3n no es v\xe1lida, tiene que ser texto");
        document.gastos_conferencia.descripcion_tipo_gasto.select();
        return false;
    }
	
    /*Validar el estado del gasto*/
    
    for(var i=0; i < estado.length; i++) {	
        if(estado[i].checked) {
            seleccionado = true;
            break;
        }
    }
    if(!seleccionado) {
        alert("Debe seleccionar un estado del gasto");
        return false;
    }
    return true;
}

function volverMostrarGastosConferencia(){
    document.location.href = "mostrarGastosConferencia.php";
}

function borrarGastosConferencia(id_gasto) {
    if (window.confirm("Atenci\xf3n:\n\nEl gasto ser\xe1 eliminado definitivamente")) {
        window.location = "eliminarGastosConferencia.php?action=del&id_gasto="+id_gasto;
    }
}

function quitarDescripcionConferencia(){
    if(document.getElementById('descripcion_tipo_gasto').value=='Escriba aquí la descripción del gasto') {
        document.getElementById('descripcion_tipo_gasto').value='';
        document.getElementById('descripcion_tipo_gasto').className='noInstruccion'
    }
}

function ponerDescripcionConferencia(){
    if(document.getElementById('descripcion_tipo_gasto').value=='') {
        document.getElementById('descripcion_tipo_gasto').value='Escriba aquí la descripción del gasto';
        document.getElementById('descripcion_tipo_gasto').className='instruccion'
    }
}

/*---------------------------SCRIPTS GASTOS CONFERENCISTA---------------------------*/

function validarRegistroGastosConferencista(){
	
    var a=document.forms["gastos_conferencista"]["id_persona"].value;
    var b=document.forms["gastos_conferencista"]["nombre_tipo_gasto"].value;
    var c=document.forms["gastos_conferencista"]["costo_del_gasto"].value;
    var d=document.forms["gastos_conferencista"]["descripcion_tipo_gasto"].value;
    var estado = document.getElementsByName("esta_aprobado");
    var seleccionado = false;
	
    /*Validar nombre del conferencista*/

    if(a==0 || a==""){  
        alert("Debe seleccionar el nombre del conferencista");
        return false;
    }
	
    /*Validar nombre del gasto*/

    if(b==0 || b==""){
        alert("Debe ingresar el nombre del gasto");
        document.gastos_conferencista.nombre_tipo_gasto.select();
        return false;
    }
    if(/^([0-9])*$/.test(b)){
        alert("El nombre no es v\xe1lido, tiene que ser texto");
        document.gastos_conferencista.nombre_tipo_gasto.select();
        return false;
    }
	
    /*Validar costo*/

    if(c==""){
        alert("Debe ingresar el costo del servicio"); 
        document.gastos_conferencista.costo_del_gasto.select();
        return false;
    }
    if(!/^([0-9.])*$/.test(c)){
        alert("El costo no es v\xe1lido, debe ser un valor n\xfamerico");
        document.gastos_conferencista.costo_del_gasto.select();
        return false;
    }
		
    /*Validar descripcion del gasto*/
	
    if(d==0 || d=="" || d=="Escriba aquí la descripción del gasto"){
        alert("Debe ingresar la descripci\xf3n del gasto");
        document.gastos_conferencista.descripcion_tipo_gasto.select();
        return false;
    }
    if(/^([0-9])*$/.test(d)){
        alert("La descripci\xf3n no es v\xe1lida, tiene que ser texto");
        document.gastos_conferencista.descripcion_tipo_gasto.select();
        return false;
    }
	
    /*Validar el estado del gasto*/
    
    for(var i=0; i < estado.length; i++) {	
        if(estado[i].checked) {
            seleccionado = true;
            break;
        }
    }
    if(!seleccionado) {
        alert("Debe seleccionar un estado del gasto");
        return false;
    }
    return true;
}

function volverMostrarGastosConferencista(){
    document.location.href = "mostrarGastosConferencista.php";
}

function borrarGastoConferencista(id_gasto) {
    if (window.confirm("Atenci\xf3n:\n\nEl gasto ser\xe1 eliminado definitivamente")) {
        window.location = "eliminarGastosConferencista.php?action=del&id_gasto="+id_gasto;
    }
}

function quitarDescripcionConferencista(){
    if(document.getElementById('descripcion_tipo_gasto').value=='Escriba aquí la descripción del gasto') {
        document.getElementById('descripcion_tipo_gasto').value='';
        document.getElementById('descripcion_tipo_gasto').className='noInstruccion'
    }
}

function ponerDescripcionConferencista(){
    if(document.getElementById('descripcion_tipo_gasto').value=='') {
        document.getElementById('descripcion_tipo_gasto').value='Escriba aquí la descripción del gasto';
        document.getElementById('descripcion_tipo_gasto').className='instruccion'
    }
}
/*---------------------------SCRIPTS GASTOS CHARLA---------------------------*/

function validarRegistroGastosCharla(){
	
    var a=document.forms["gastos_charla"]["id_charla"].value;
    var b=document.forms["gastos_charla"]["nombre_tipo_gasto"].value;
    var c=document.forms["gastos_charla"]["descripcion_tipo_gasto"].value;
    var d=document.forms["gastos_charla"]["costo_del_gasto"].value;
    var estado = document.getElementsByName("esta_aprobado");
    var seleccionado = false;

	
    /*Validar identificador de la charla*/

    if(a==0 || a==""){
        alert("Debe seleccionar el nombre de la charla");
        return false;
    }
	
    /*Validar nombre del gasto*/

    if(b==0 || b==""){
        alert("Debe ingresar el nombre del gasto");
        document.gastos_charla.nombre_tipo_gasto.select();
        return false;
    }
    if(/^([0-9])*$/.test(b)){
        alert("El nombre no es v\xe1lido, tiene que ser texto");
        document.gastos_charla.nombre_tipo_gasto.select();
        return false;
    }
		
    /*Validar descripcion del gasto*/
	
    if(c==0 || c=="" || c=="Escriba aquí la descripción del gasto"){
        alert("Debe ingresar la descripci\xf3n del gasto");
        document.gastos_charla.descripcion_tipo_gasto.select();
        return false;
    }
    if(/^([0-9])*$/.test(c)){
        alert("La descripci\xf3n no es v\xe1lida, tiene que ser texto");
        document.gastos_charla.descripcion_tipo_gasto.select();
        return false;
    }
		
    /*Validar costo del gasto*/

    if(d==""){
        alert("Debe ingresar el costo del gasto");
        document.gastos_charla.costo_del_gasto.select();
        return false;
    }
    if(!/^([0-9.])*$/.test(d)){
        alert("El costo no es v\xe1lido, tiene que ser un valor n\xfamerico");
        document.gastos_charla.costo_del_gasto.select();
        return false;
    }
	
    /*Validar el estado del gasto*/
    
    for(var i=0; i < estado.length; i++) {	
        if(estado[i].checked) {
            seleccionado = true;
            break;
        }
    }
    if(!seleccionado) {
        alert("Debe seleccionar un estado del gasto");
        return false;
    }
    return true;
}

function volverMostrarGastosCharla(){
    document.location.href = "mostrarGastosCharla.php";
}

function borrarGastosCharla(id_gasto) {
    if (window.confirm("Atenci\xf3n:\n\nEl gasto ser\xe1 eliminado definitivamente")) {
        window.location = "eliminarGastosCharla.php?action=del&id_gasto="+id_gasto;
    }
}

function quitarDescripcionGastosCharla(){
    if(document.getElementById('descripcion_tipo_gasto').value=='Escriba aquí la descripción del gasto') {
        document.getElementById('descripcion_tipo_gasto').value='';
        document.getElementById('descripcion_tipo_gasto').className='noInstruccion'
    }
}

function ponerDescripcionGastosCharla(){
    if(document.getElementById('descripcion_tipo_gasto').value=='') {
        document.getElementById('descripcion_tipo_gasto').value='Escriba aquí la descripción del gasto';
        document.getElementById('descripcion_tipo_gasto').className='instruccion'
    }
}

/*---------------------------SCRIPTS REGISTRO ITINERARIO---------------------------*/

function validarItinerario(){
	
    var a=document.forms["registro_de_itinerario"]["id_persona"].value;
    var b=document.forms["registro_de_itinerario"]["transporte"].value;
    var c=document.forms["registro_de_itinerario"]["lugar_de_hospedaje"].value;
    var d=document.forms["registro_de_itinerario"]["duracion_de_hospedaje"].value;
	
    /*Validar id de la persona*/

    if(a==0 || a==""){  
        alert("Debe seleccionar el nombre del conferencista");
        return false;
    }
    
    /*Validar transporte*/

    if(b==0 || b==""){  
        alert("Debe seleccionar el medio de transporte");
        return false;
    }
    
    /*Validar lugar hospedaje*/

    if(c==0 || c==""){
        alert("Debe ingresar el lugar del hospedaje");
        document.registro_de_itinerario.lugar_de_hospedaje.select();
        return false;
    }
    if(/^([0-9])*$/.test(c)){
        alert("El lugar de hospedaje no es v\xe1lido, debe ser texto");
        document.registro_de_itinerario.lugar_de_hospedaje.select();
        return false;
    }
    
    /*Validar duración del hospedaje*/

    if(d==0 || d==""){  
        alert("Debe seleccionar la duración del hospedaje");
        return false;
    }
    return true;
}

function volverMostrarItinerario(){
    document.location.href = "mostrarItinerario.php";
}

function borrarItinerarioConferencista(id_itinerario) {
    if (window.confirm("Atenci\xf3n:\n\nEl itinerario ser\xe1 eliminado definitivamente")) {
        window.location = "eliminarItinerario.php?action=del&id_itinerario="+id_itinerario;
    }
}

/*---------------------------SCRIPTS ASISTENTES---------------------------*/

function validarAsistentes(){
	
    var a=document.forms["registro_de_asistentes"]["nombre"].value;
    var b=document.forms["registro_de_asistentes"]["apellido1"].value;
    var c=document.forms["registro_de_asistentes"]["apellido2"].value;
    var d=document.forms["registro_de_asistentes"]["contrasena1"].value;
    var e=document.forms["registro_de_asistentes"]["contrasena2"].value;
    var f=document.forms["registro_de_asistentes"]["correo_electronico"].value;
    var g=document.forms["registro_de_asistentes"]["id_pais"].value;
    var h=document.forms["registro_de_asistentes"]["id_profesion"].value;
    var i=document.forms["registro_de_asistentes"]["genero"].value;
    var j=document.forms["registro_de_asistentes"]["fecha_nacimiento"].value;
    var k=document.forms["registro_de_asistentes"]["telefono"].value;
    var es_discapacitado=document.getElementsByName("es_discapacitado");
    var seleccionado=false;
    
    /*Validar nombre*/

    if(a==0 || a==""){
        alert("Debe ingresar su nombre");
        document.registro_de_asistentes.nombre.select();
        return false;
    }
    if(/^([0-9])*$/.test(a)){
        alert("El nombre no es v\xe1lido, debe ser texto");
        document.registro_de_asistentes.nombre.select();
        return false;
    }
	
    /*Validar apellido1*/

    if(b==0 || b==""){
        alert("Debe ingresar su primer apellido");
        document.registro_de_asistentes.apellido1.select();
        return false;
    }
    if(/^([0-9])*$/.test(b)){
        alert("El apellido no es v\xe1lido, debe ser texto");
        document.registro_de_asistentes.apellido1.select();
        return false;
    }
	
    /*Validar apellido2*/

    if(c==0 || c==""){
        alert("Debe ingresar su segundo apellido");
        document.registro_de_asistentes.apellido2.select();
        return false;
    }
    if(/^([0-9])*$/.test(c)){
        alert("El apellido no es v\xe1lido, debe ser texto");
        document.registro_de_asistentes.apellido2.select();
        return false;
    }
	
    /*Validar contraseña1*/

    if(d==0 || d==""){
        alert("Debe ingresar una contrase\xf1a");
        document.registro_de_asistentes.contrasena1.select();
        return false;
    }
	
    /*Validar contraseña2*/

    if(e==0 || e==""){
        alert("Debe confirmar la contrase\xf1a");
        document.registro_de_asistentes.contrasena2.select();
        return false;
    }
    if(d!=e){
        alert("Las contrase\xf1as no coinciden");
        document.registro_de_asistentes.contrasena2.select();
        return false;
    }
	
    /*Validar correo*/

    if(f==0 || f=="" || f=="Ej: juan@gmail.com"){ 
        alert("Debe ingresar su correo electr\xf3nico");
        document.registro_de_asistentes.correo_electronico.select();
        return false;
    }
    if(!/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/.test(f)){
        alert("El correo electr\xf3nico est\xe1 en formato incorrecto");
        document.registro_de_asistentes.correo_electronico.select();
        return false;
    }
    
    /*Validar pais*/

    if(g==0 || g==""){ 
        alert("Debe seleccionar el pa\xeds");
        return false;
    }
	
    /*Validar profesion*/

    if(h==0 || h==""){  
        alert("Debe seleccionar la profes\xf3n");
        return false;
    }
	
    /*Validar genero*/

    if(i==0 || i==""){ 
        alert("Debe seleccionar el g\xe9nero"); 
        return false;
    }
	
    /*Validar fecha de nacimiento*/

    if(j==0 || j==""){ 
        alert("Debe escoger su fecha de nacimiento"); 
        document.registro_de_asistentes.fecha_nacimiento.select();
        return false;
    }
	
    /*Validar telefono*/
    
    if(k==0 || k=="" || k=="Ej: 87618695"){ 
        alert("Debe ingresar el n\xfamero de t\xe9lefono"); 
        document.registro_de_asistentes.telefono.select();
        return false;
    }

    if(!/^([0-9])*$/.test(k)){
        alert("El n\xfamero de t\xe9lefono no es v\xe1lido, debe ser un valor n\xfamerico");
        document.registro_de_asistentes.telefono.select();
        return false;
    }
	
    /*Validar si es discapacitado*/

    for(var x=0; x<es_discapacitado.length; x++) {
        if(es_discapacitado[x].checked) {
            seleccionado=true;
            break;
        }
    }
    if(!seleccionado) {
        alert("Debe seleccionar la discapacidad");
        return false;
    }
    return true;
}

function quitarCorreo(){
    if(document.getElementById('correo_electronico').value=='Ej: juan@gmail.com') {
        document.getElementById('correo_electronico').value='';
        document.getElementById('correo_electronico').className='noInstruccion'
    }
}

function ponerCorreo() {
    if(document.getElementById('correo_electronico').value=='') {
        document.getElementById('correo_electronico').value='Ej: juan@gmail.com';
        document.getElementById('correo_electronico').className='instruccion'
    }
}

function quitarTelefono(){
    if(document.getElementById('telefono').value=='Ej: 87618695') {
        document.getElementById('telefono').value='';
        document.getElementById('telefono').className='noInstruccion'
    }
}

function ponerTelefono() {
    if(document.getElementById('telefono').value=='') {
        document.getElementById('telefono').value='Ej: 87618695';
        document.getElementById('telefono').className='instruccion'
    }
}

function volverIndex(){
    document.location.href = "../../index.php";
}

function volverCharlas(){
    document.location.href ="informacionCharlas.php";
}

/*--------------------------CHARLAS DEL ASISTENTE-------------------------*/

function asistirCharlas(idcharla,cupo) {
    if (cupo==0){
        if (window.confirm("Atenci\xf3n:\n\nLa charla no posee cupo disponible.\n\u00BFDesea permanecer en lista de espera?")) {
            window.location = "registroCharla.php?action=del&id_charla="+idcharla;
        }
    }else{
        if (window.confirm("Atenci\xf3n:\n\n \u00BFDesea asistir a la charla?")) {
            window.location = "registroCharla.php?action=del&id_charla="+idcharla;
        }
    }
}

function cancelarAsistenciaCharla(idPersona,idCharla){
    if (window.confirm("Atenci\xf3n:\n\n\u00BFDesea cancelar la asistencia a la charla?")) {
        window.location = "cancelarAsistenciaCharla.php?id_persona="+idPersona+"&id_charla="+idCharla;        
    }
}
