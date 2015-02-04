<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../includes/fachadaOrdenesDePago.php");

/*Se hace la instancia del objeto de la fachada*/
$pagarOrdenes = new fachadaOrdenesDePago();
 
/*Se obtiene el id de la orden que se selecciono para pagar*/
$pagarOrdenes->pagarOrdenes($_GET['id_orden']);
?>