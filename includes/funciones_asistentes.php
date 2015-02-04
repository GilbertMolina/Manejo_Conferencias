<?php
//Elimina las variables de la sesión
function salirDeSesion(){
    session_unset();
}


/*
Función que muestra la lista de charlas, conferencias o conferencistas
de las cuales se pueden mostrar los presupuestos.
*/

function listaDatos()
{
	//Se crea el objeto de la fachadaAsistir
	$oFachadaLista=new fachadaAsistir();
	
	//Se llama a la función que muestra la lista de datos
	$oFachadaLista->muestraLista();
}
function asistirCharlas()
{
	//Se crea el objeto de la fachadaAsistir
	$oFachadaLista=new fachadaAsistir();
	
	//Se llama a la función que muestra la lista de datos
	$oFachadaLista->asistirCharla();
}

?>