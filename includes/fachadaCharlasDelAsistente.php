<?php
include ("conexion.php");

class fachadaCharlasDelAsistente {

    private $consultas;
    
    function __construct() {
       $this->consultas = array();
    }
    
    public function mostrarCharlasDelAsistente($idAsistente){
        $sql="SELECT pch.id_charla 'idCharla', p.id_persona 'idPersona', ch.titulo_charla 'Charla' 
              FROM tpersona p, tcharla ch, tpersona_tcharla pch 
              WHERE p.id_persona=pch.id_persona 
              AND pch.id_charla=ch.id_charla 
              AND p.id_persona='$idAsistente' 
              ORDER BY Charla";
        $mostrarCharlas = mysql_query($sql, ConectarMySQL::conexion());
        while($charlasDelAsistente = mysql_fetch_assoc($mostrarCharlas)){
            $this->consultas[] = $charlasDelAsistente;
        }
        return $this->consultas;
    }
    
    function cancelarAsistenciaCharla($idPersona, $idCharla){
        $sql="DELETE FROM tpersona_tcharla 
              WHERE id_persona='$idPersona'
              AND id_charla='$idCharla' ";
        $cancelarAsistenciaCharla=mysql_query($sql, ConectarMySQL::conexion());
		
		$sql="SELECT c.id_cupo from tcupo c
			  JOIN tcupo_tcharla cch
			  on cch.id_cupo=c.id_cupo
			  WHERE cch.id_charla='$idCharla' ";
			  
		$queIdCupo=mysql_query($sql, ConectarMySQL::conexion());
		$resultadoIdCupo = mysql_fetch_assoc($queIdCupo);
		$idCupo = $resultadoIdCupo["id_cupo"];
		
		$sql="UPDATE tcupo set ocupados=(ocupados-1)
			  WHERE id_cupo = '$idCupo' ";
			  
		$cancelarAsistenciaCharla=mysql_query($sql, ConectarMySQL::conexion());
			  
        header("location: itinerarioAsistente.php");
    }
}
?>