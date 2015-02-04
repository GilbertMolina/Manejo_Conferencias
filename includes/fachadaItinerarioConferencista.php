<?php
/*Se importa el archivo de conexion de la base de datos*/
require_once ("conexion.php");

/*Clase que maneja los DMLs del itinerario de conferensita*/
class fachadaItinerarioConferencista {
    
/*Se declara la variable "$consultas" de tipo private*/
    private $consultas;
    
/*Funcion constructor*/
    public function __construct() {
        $this->consultas = array();
    }
        
/*Funcion que muestra el itinerario del conferencista*/
    public function mostrarItinerario() {
        $sql = "SELECT i.id_itinerario, i.id_persona, concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'nombre', i.medio_transporte, 
				i.lugar_hospedaje, i.duracion_hospedaje
                FROM titinerario_conferencista i, tpersona p
                WHERE p.id_persona = i.id_persona ";
	$mostrarItinerario = mysql_query($sql, ConectarMySQL::conexion());
	while ($resultadoItinerario = mysql_fetch_assoc($mostrarItinerario)) {
            $this->consultas[] = $resultadoItinerario;
	}
        return $this->consultas;
    }
    
/*Funcion que muestra los datos del itinerario del conferencista que se selecciono para editar*/
    public function mostrarItinerarioPorId($iditinerario) {
        $sql = "SELECT i.id_itinerario, concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'nombre', i.medio_transporte, i.lugar_hospedaje, i.duracion_hospedaje 
				FROM titinerario_conferencista i, tpersona p 
				WHERE p.id_persona = i.id_persona 
				AND i.id_itinerario = '$iditinerario' ";
	$editarItinerarioPorId = mysql_query($sql, ConectarMySQL::conexion());
	while ($resultadoItinerario = mysql_fetch_assoc($editarItinerarioPorId)) {
		$this->consultas[] = $resultadoItinerario;
	}
	return $this->consultas;
    }
    
/*Funcion que hace las inserciones del itinerario del conferencista*/
    public function registroItinerario($id_persona, $Transporte, $Lugar_de_hospedaje, $Duracion_hospedaje) {
       $sql = "INSERT INTO titinerario_conferencista (id_persona, medio_transporte, lugar_hospedaje, duracion_hospedaje) 
			   VALUES ('$id_persona', '$Transporte', '$Lugar_de_hospedaje', '$Duracion_hospedaje')";
        $registroItinerario = mysql_query($sql, ConectarMySQL::conexion());
        header("location: ../itinerarioConferencista/mostrarItinerario.php");
	}
    
/*Funcion que permite editar el itinerario del conferencista*/
    public function editarItinerario($medioTransporte, $lugarHospedaje, $duracionHospedaje, $idPersona, $idItinerario) {
       $sql = "UPDATE titinerario_conferencista SET 
               medio_transporte='$medioTransporte', lugar_hospedaje='$lugarHospedaje', duracion_hospedaje='$duracionHospedaje', id_persona='$idPersona'
               WHERE id_itinerario='$idItinerario' ";
       $editarItinerario = mysql_query($sql, ConectarMySQL::conexion());
       header("location: ../itinerarioConferencista/mostrarItinerario.php");
    }
    
/*Funcion que permite eliminar un itinerario del conferencista*/
    public function eliminarItinerario($idItinerario) {
       $sql = "DELETE FROM titinerario_conferencista 
			   WHERE id_itinerario = '$idItinerario' ";
       $eliminarProveedor = mysql_query($sql, ConectarMySQL::conexion());
       header("location: ../itinerarioConferencista/mostrarItinerario.php");
    }
}
?>