<?php
/*Se incluyen los archivos necesarios:
conexion.php: contiene las variables para conectarse a la BD.
fachadaUno.php: contiene varias funciones necesarias para mi pantalla.
funciones.php: contiene la función que utiliza a la fachada para realizar la
lógica de la página.
*/
require_once '../../includes/conexion.php';
require_once '../../includes/fachadaAsistir.php';
session_start();
//Se crea el objeto de la fachadaAsistir
$oFachadaLista=new fachadaAsistir();
	
//Se llama a la función que realiza los inserts de los datos
$idcharla=$_GET['id_charla'];
$idpersona=$_SESSION["id"];
$oFachadaLista->registroCharla($idcharla,$idpersona);

?>
