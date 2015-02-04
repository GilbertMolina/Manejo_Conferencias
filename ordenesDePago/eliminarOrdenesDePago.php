<?php
/*Se importa el archivo de la fachada de las ordenes de pago*/
require_once("../includes/fachadaOrdenesDePago.php");

/*Se hace la instancia del objeto de la fachada*/
$eliminarOrdenesDePago = new fachadaOrdenesDePago();

/*Se obtiene el id de la orden que se selecciono para eliminar*/
$eliminarOrdenesDePago->eliminarOrdenesDePago($_GET['id_orden']);
?>