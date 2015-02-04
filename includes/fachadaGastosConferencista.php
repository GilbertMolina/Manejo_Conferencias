<?php
/*Se importa el archivo de conexion de la base de datos*/
require_once ("conexion.php");

/*Clase que maneja los DMLs de los gastos de los conferencista*/
class fachadaGastosConferencista {
    
/*Se declara la variable "$consultas" de tipo private*/
    private $consultas;
    
/*Funcion constructor*/
    public function __construct() {
        $this->consultas = array();
    }
        
/*Funcion que muestra los gastos de los conferencistas*/
    public function mostrarGastosConferencista() {
        $sql = "SELECT concat( p.nombre, ' ', p.apellido1, ' ', p.apellido2 ) 'Nombre', p.id_persona 'id_persona', g.costo 'costo', g.id_tipo_gasto,
				g.descripcion 'nombre_gasto', tpg.nombre_tipo_gasto 'Tipo', cg.id_gasto, tpg.descripcion_tipo_gasto 'descripcion',
				CASE g.esta_aprobado WHEN 1 THEN 'Aprobado' ELSE 'No Aprobado' END esta_aprobado
				FROM tpersona p, tpersona_tnivel_persona tp, tnivel_persona n, tgasto g, tconferencista_tgasto cg, ttipo_gasto tpg
				WHERE cg.id_persona = p.id_persona
				AND g.id_gasto = cg.id_gasto
				AND tp.id_nivel_persona =1
				AND n.id_nivel_persona = tp.id_nivel_persona
				AND g.id_tipo_gasto = tpg.id_tipo_gasto
				GROUP BY g.id_gasto 
				ORDER BY p.nombre ";
	$mostrarGastos = mysql_query($sql, ConectarMySQL::conexion());
	while ($resultadoGastos = mysql_fetch_assoc($mostrarGastos)) {
            $this->consultas[] = $resultadoGastos;
	}
        return $this->consultas;
    }
    
/*Funcion que muestra los datos del gasto que se selecciono para editar, por Id*/
    public function mostrarGastosParaEditar($id_gasto) {
        $sql = "SELECT concat( p.nombre, ' ', p.apellido1, ' ', p.apellido2 ) 'Nombre', p.id_persona, g.costo 'costo', 
				g.descripcion 'nombre_gasto', tpg.nombre_tipo_gasto 'Tipo', cg.id_gasto, tpg.descripcion_tipo_gasto 'descripcion',
				g.esta_aprobado, g.id_tipo_gasto 
				FROM tpersona p, tpersona_tnivel_persona tp, tnivel_persona n, tgasto g, tconferencista_tgasto cg, ttipo_gasto tpg
				WHERE cg.id_persona = p.id_persona
				AND g.id_gasto = cg.id_gasto
				AND g.id_gasto=$id_gasto
				AND tp.id_nivel_persona =1
				AND n.id_nivel_persona = tp.id_nivel_persona
				AND g.id_tipo_gasto = tpg.id_tipo_gasto";		
	$editarGastoParaEditar = mysql_query($sql, ConectarMySQL::conexion());
	while ($resultadoGasto = mysql_fetch_assoc($editarGastoParaEditar)) {
		$this->consultas[] = $resultadoGasto;
	}
	return $this->consultas;
    }
    
/*Funcion que hace las inserciones de los gastos de los conferencistas*/
    public function registroGastosConferencista($id_persona, $nombre, $descripcion, $costo, $esta_aprobado) {
		$sql = "INSERT INTO ttipo_gasto (nombre_tipo_gasto, descripcion_tipo_gasto) 
				VALUES ('$nombre', '$descripcion') ";
		$registroGasto = mysql_query($sql, ConectarMySQL::conexion());
		$id_tipo_gasto = mysql_insert_id();
		
		$sql = "INSERT INTO tgasto (costo, descripcion, id_tipo_gasto, esta_aprobado) 
				VALUES ('$costo', '$descripcion', '$id_tipo_gasto', '$esta_aprobado') ";
		$registroGasto = mysql_query($sql, ConectarMySQL::conexion());
		$id_gasto = mysql_insert_id();
		
		$sql = "INSERT INTO tconferencista_tgasto (id_persona, id_gasto) 
			    VALUES ('$id_persona', '$id_gasto') ";
		$registroGasto = mysql_query($sql, ConectarMySQL::conexion());		
	header("location: ../gastosConferencista/mostrarGastosConferencista.php");
	}
    
/*Funcion que permite editar los datos de los gastos de los conferencistas*/
    public function editarGastosConferencista($nombre, $descripcion_tipo, $costo_gasto, $estado, $idgasto, $id_persona, $tipo_gasto) {
		$sql = "UPDATE ttipo_gasto SET 
				nombre_tipo_gasto='$nombre', descripcion_tipo_gasto='$descripcion_tipo' 
				WHERE id_tipo_gasto='$tipo_gasto' ";
		$editarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
		$sql = "UPDATE tgasto SET 
				costo='$costo_gasto', descripcion='$descripcion_tipo', id_tipo_gasto='$tipo_gasto', esta_aprobado='$estado' 
				WHERE id_gasto='$idgasto' ";
		$editarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
		$sql = "UPDATE tconferencista_tgasto SET 
				id_persona='$id_persona', id_gasto='$idgasto' 
				WHERE id_gasto='$idgasto' ";
		$editarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
       header("location: ../gastosConferencista/mostrarGastosConferencista.php");
    }
    
/*Funcion que permite eliminar un gasto seleccionado*/
    public function eliminarGastosConferencista($idgasto) {
		$sql = "SELECT id_tipo_gasto 
				FROM tgasto 
				WHERE id_gasto = '$idgasto' ";
		$queTipoGasto = mysql_query($sql, ConectarMySQL::conexion());
		$resultTipoGasto = mysql_fetch_assoc($queTipoGasto);
		$id_tipo_gasto = $resultTipoGasto["id_tipo_gasto"];
		
		$sql = "SELECT id_persona 
				FROM tconferencista_tgasto 
				WHERE id_gasto = '$idgasto' ";
		$queId	= mysql_query($sql, ConectarMySQL::conexion());
		$resultId = mysql_fetch_assoc($queId);
		$id_persona	= $resultId["id_persona"];	
		
		$sql = "DELETE FROM ttipo_gasto 
				WHERE id_tipo_gasto = '$id_tipo_gasto' ";
		$eliminarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
		$sql = "DELETE FROM tgasto 
				WHERE id_gasto = '$idgasto' ";
		$eliminarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
		$sql = "DELETE FROM tconferencista_tgasto 
				WHERE id_gasto = '$idgasto' 
				AND id_persona='$id_persona' ";
		$eliminarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
       header("location: ../gastosConferencista/mostrarGastosConferencista.php");
    }
    
    public function mostrarConferencistas(){
       $sqlConsulta = "SELECT p.id_persona, concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'nombre'
					   FROM tpersona p, tpersona_tnivel_persona tp, tnivel_persona n
					   WHERE p.id_persona=tp.id_persona 
					   AND tp.id_nivel_persona=1
					   AND n.id_nivel_persona=tp.id_nivel_persona
					   GROUP BY p.id_persona;";
        $conferencista = mysql_query($sql, ConectarMySQL::conexion());
    }
}	
?>
