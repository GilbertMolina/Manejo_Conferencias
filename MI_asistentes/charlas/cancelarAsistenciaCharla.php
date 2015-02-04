<?php
/*Se importa el archivo de la fachada de las charlas del asistente*/
include ("../../includes/fachadaCharlasDelAsistente.php");

/*Se hace la instancia del objeto de la fachada*/
$cancelarAsistenciaCharla = new fachadaCharlasDelAsistente();

/*Se obtiene el id de la persona y el id de la charla para enviarselo a la fachada*/
$cancelarAsistenciaCharla->cancelarAsistenciaCharla($_GET["id_persona"], $_GET["id_charla"]);
?>