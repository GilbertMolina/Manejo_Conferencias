<?php

/* Se importa el archivo de conexion de la base de datos */
require_once ("conexion.php");

/* Clase que maneja los DMLs de los conferencistas */

class fachadaConferencista {
    /* Se declara la variable "$consultas" de tipo private */

    private $consultas;

    /* Funcion constructor */

    public function __construct() {
        $this->consultas = array();
    }

    /* Funcion que muestra los conferencistas */

    public function mostrarListaConferencistas() {
        $sql = "SELECT distinct concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'Nombre',pr.nombre_profesion 'Profesion', pa.nombre_pais 'Pais', 
                p.correo_electronico 'Correo', p.id_persona 'id' 
				FROM tprofesion pr, tpersona p, tcharla ch, tpais pa 
				WHERE pr.id_profesion=p.id_profesion 
				AND p.id_persona=ch.id_persona 
                AND p.id_pais=pa.id_pais 
				AND ch.esta_aprobada=1 ";
        $mostrarConferencistas = mysql_query($sql, ConectarMySQL::conexion());
        while ($resultadoConferencista = mysql_fetch_assoc($mostrarConferencistas)) {
            $this->consultas[] = $resultadoConferencista;
        }
        return $this->consultas;
    }

    /* Funcion que muestra los conferencistas */

    public function mostrarListaConferencistasPorId($idpersona) {
        $sql = "SELECT distinct concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'Nombre',pr.nombre_profesion 'Profesion', pa.nombre_pais 'Pais', 
                p.correo_electronico 'Correo', p.id_persona 'id' 
				FROM tprofesion pr, tpersona p, tcharla ch, tpais pa 
				WHERE pr.id_profesion=p.id_profesion 
				AND p.id_persona=ch.id_persona 
                AND p.id_pais=pa.id_pais 
				AND ch.esta_aprobada=1 
				AND p.id_persona='$idpersona' ";
        $mostrarConferencistas = mysql_query($sql, ConectarMySQL::conexion());
        while ($resultadoConferencista = mysql_fetch_assoc($mostrarConferencistas)) {
            $this->consultas[] = $resultadoConferencista;
        }
        return $this->consultas;
    }

    /* Funcion que muestra la lista de los conferencistas po ID*/
	
	public function mostrarListaCharlasConferencistasPorId($idpersona){
		$sql="SELECT id_charla, titulo_charla 
			  FROM tcharla 
			  WHERE id_persona='$idpersona'
			  AND esta_aprobada=1 
			  order by titulo_charla";
		$mostrarConferencista = mysql_query($sql, ConectarMySQL::conexion());
		while ($resultadoConferencista = mysql_fetch_assoc($mostrarConferencista)){
			$this->consultas[] = $resultadoConferencista;
		}
		return $this->consultas;
	}
}
?>