<?php
/*Se importa el archivo de la fachada de los gastos de los conferencistas*/
require_once("../includes/fachadaGastosConferencista.php");

/*Se hace la instancia del objeto de la fachada*/
$eliminarGasto = new fachadaGastosConferencista();

/*Se obtiene el id del gasto que se selecciono para eliminar*/
$eliminarGasto->eliminarGastosConferencista($_GET["id_gasto"]);
?>



