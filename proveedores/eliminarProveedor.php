<?php
/*Se importa el archivo de la fachada del proveedor*/
require_once("../includes/fachadaProveedor.php");

/*Se hace la instancia del objeto de la fachada*/
$eliminarProveedor = new fachadaProveedor();

/*Se obtiene el id del proveedor que se selecciono para eliminar*/
$eliminarProveedor->eliminarProveedores($_GET["id_proveedor"]);
?>
