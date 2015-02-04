<?php
/*
Función que muestra la lista de charlas, conferencias o conferencistas
de las cuales se pueden mostrar los presupuestos.
*/

function listaDatos()
{
	//Se crea el objeto de la fachadaAsistir
	$oFachadaLista=new fachadaAsistir();

	if (isset($_GET['id_charla']))
	{
		$id=$_GET['id_charla'];
		//Se llama a la función que muestra la lista de datos
		$oFachadaLista->muestraListaPorId($id);
	}
	else
	{
		//Se llama a la función que muestra la lista de datos
		$oFachadaLista->muestraLista();
	}
}


function listaDatos_Conferencia()
{
	//Se crea el objeto de la fachadaAsistir
	$oFachadaLista=new fachadaAsistir();

	if (isset($_GET['id_conferencia']))
	{
		$id=$_GET['id_conferencia'];
		//Se llama a la función que muestra la lista de datos
		$oFachadaLista->muestraListaPorId_Conferencia($id);
	}
	else
	{
		//Se llama a la función que muestra la lista de datos
		$oFachadaLista->muestraLista_Conferencia();
	}
}


?>
