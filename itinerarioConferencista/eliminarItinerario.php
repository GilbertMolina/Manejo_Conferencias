<?php
/*Se importa el archivo de la fachada del itinerario del conferencista*/
require_once("../includes/fachadaItinerarioConferencista.php");

/*Se hace la instancia del objeto de la fachada*/
$eliminarItinerario = new fachadaItinerarioConferencista();

/*Se le pasa el id del itinerario que se selecciono para eliminar*/
$eliminarItinerario->eliminarItinerario($_GET['id_itinerario']);
?>
