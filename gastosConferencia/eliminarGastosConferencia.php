<?php
/*Se importa el archivo de la fachada de los gastos de la conferencia*/
require_once("../includes/fachadaGastosConferencia.php");

/*Se hace la instancia del objeto de la fachada*/
$eliminarGasto = new fachadaGastosConferencia();

/*Se obtiene el id del gasto que se selecciono para eliminar*/
$eliminarGasto->eliminarGastosConferencia($_GET["id_gasto"]);
?>
