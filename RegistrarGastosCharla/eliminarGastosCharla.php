<?php
/*Se importa el archivo de la fachada de los gastos de la cahrla*/
require_once("../includes/fachadaGastosCharla.php");

/*Se hace la instancia del objeto de la fachada*/
$eliminarGasto = new fachadaGastosCharla();

/*Se obtiene el id del gasto que se selecciono para eliminar*/
$eliminarGasto->eliminarGastosCharla($_GET["id_gasto"]);
?>

