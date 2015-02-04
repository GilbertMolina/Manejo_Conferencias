<?php
/*Se importa el archivo de conexion de la base de datos*/
require_once ("conexion.php");

/*Clase que maneja los DMLs de las charlas*/
class fachadaCharlas {
   
/*Se declara la variable "$consultas" de tipo private*/
    private $consultas;
    
/*Funcion constructor*/
    public function __construct() {
        $this->consultas = array();
    }
        
/*Funcion que muestra las charlas disponibles*/
    public function mostrarCharlasDisponibles() {
        $sql = "SELECT ch.id_charla, ch.titulo_charla 'charla', DATE_FORMAT(ch.fecha,'%d-%m-%Y') 'fecha', ch.duracion, truncate((ch.costo_entrada),0) 'entrada' 
                FROM tcharla ch, tcharla_tgasto cg, tgasto g 
                WHERE ch.esta_aprobada = 1 
                AND ch.es_charla = 1 
                AND ch.id_charla=cg.id_charla 
                AND cg.id_gasto=g.id_gasto ";
	$mostrarCharlas = mysql_query($sql, ConectarMySQL::conexion());
	while ($resultadoCharla = mysql_fetch_assoc($mostrarCharlas)) {
            $this->consultas[] = $resultadoCharla;
	}
        return $this->consultas;
    }
}
?>