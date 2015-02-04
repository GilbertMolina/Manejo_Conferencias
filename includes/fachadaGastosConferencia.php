<?php
/*Se importa el archivo de conexion de la base de datos*/
require_once ("conexion.php");

/*Clase que maneja los DMLs de los gastos de las conferencias*/
class fachadaGastosConferencia {
    
/*Se declara la variable "$consultas" de tipo private*/
    private $consultas;
    
/*Funcion constructor*/
    public function __construct() {
        $this->consultas = array();
    }
        
/*Funcion que muestra los gastos de las conferencias*/
    public function mostrarGastosConferencia() {
        $sql = "SELECT c.id_conferencia, g.id_tipo_gasto, g.id_gasto, c.titulo_conferencia, tg.nombre_tipo_gasto, tg.descripcion_tipo_gasto, g.costo, 
				CASE g.esta_aprobado WHEN 1 THEN 'Aprobado' ELSE 'No Aprobado' END esta_aprobado 
				FROM tconferencia c
				JOIN tconferencia_tgasto cg
				ON c.id_conferencia=cg.id_conferencia
				JOIN tgasto g
				ON cg.id_gasto=g.id_gasto
				JOIN ttipo_gasto tg
				ON g.id_tipo_gasto=tg.id_tipo_gasto 
				ORDER BY c.titulo_conferencia";
	$mostrarGastos = mysql_query($sql, ConectarMySQL::conexion());
	while ($resultadoGastos = mysql_fetch_assoc($mostrarGastos)) {
            $this->consultas[] = $resultadoGastos;
	}
        return $this->consultas;
    }
    
/*Funcion que muestra los datos del gasto que se selecciono para editar*/
    public function mostrarGastosPorId($idgasto) {
        $sql = "SELECT g.id_tipo_gasto, g.id_gasto,c.id_conferencia,c.titulo_conferencia, tg.nombre_tipo_gasto, tg.descripcion_tipo_gasto, g.costo, g.esta_aprobado
				FROM tconferencia c
				JOIN tconferencia_tgasto cg
				ON c.id_conferencia=cg.id_conferencia 
				JOIN tgasto g
				ON cg.id_gasto=g.id_gasto
				JOIN ttipo_gasto tg
				ON g.id_tipo_gasto=tg.id_tipo_gasto
				WHERE g.id_gasto = '$idgasto' ";		
	$editarGastoPorId = mysql_query($sql, ConectarMySQL::conexion());
	while ($resultadoGasto = mysql_fetch_assoc($editarGastoPorId)) {
		$this->consultas[] = $resultadoGasto;
	}
	return $this->consultas;
    }
    
/*Funcion que hace las inserciones de los gastos de las conferencias*/
    public function registroGastosConferencia($idConferencia, $nombre, $descripcion, $costoGasto, $estado) {
        $sql = "INSERT INTO ttipo_gasto (nombre_tipo_gasto, descripcion_tipo_gasto) 
                VALUES ('$nombre', '$descripcion') ";
        $registroGasto = mysql_query($sql, ConectarMySQL::conexion());
		$id_tipo_gasto = mysql_insert_id();
		
		$sql = "INSERT INTO tgasto (costo, descripcion, id_tipo_gasto, esta_aprobado) 
                VALUES ('$costoGasto', '$descripcion', '$id_tipo_gasto', '$estado')";
		$registroGasto = mysql_query($sql, ConectarMySQL::conexion());
		$id_gasto = mysql_insert_id();
		
		$sql = "INSERT INTO tconferencia_tgasto (id_conferencia, id_gasto) 
                VALUES ('$idConferencia', '$id_tipo_gasto')";
		$registroGasto = mysql_query($sql, ConectarMySQL::conexion());
		
	header("location: ../gastosConferencia/mostrarGastosConferencia.php");
	}
    
/*Funcion que permite editar los datos de los gastos de las conferencias*/
    public function editarGastosConferencia($nombre, $descripcion, $costo_gasto, $estado, $idgasto, $idconferencia, $idtipogasto) {
		$sql = "UPDATE ttipo_gasto SET 
				nombre_tipo_gasto='$nombre', descripcion_tipo_gasto='$descripcion'
				WHERE id_tipo_gasto='$idtipogasto' ";
		$editarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
		$sql = "UPDATE tgasto SET 
				costo='$costo_gasto', descripcion='$descripcion', esta_aprobado='$estado'
				WHERE id_gasto='$idgasto' ";
		$editarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
		$sql = "UPDATE tconferencia_tgasto SET 
				id_conferencia='$idconferencia', id_gasto='$idgasto'
				WHERE id_gasto='$idgasto' ";
		$editarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
       header("location: ../gastosConferencia/mostrarGastosConferencia.php");
    }
    
/*Funcion que permite eliminar un gasto seleccionado*/
    public function eliminarGastosConferencia($idgasto) {
		$sql = "SELECT id_tipo_gasto 
				FROM tgasto
				WHERE id_gasto = '$idgasto' ";
		$queIdGasto = mysql_query($sql, ConectarMySQL::conexion());
		$resultadoIdGasto = mysql_fetch_assoc($queIdGasto);
		$id_tipo_gasto = $resultadoIdGasto["id_tipo_gasto"];
		
		$sql = "SELECT id_conferencia 
				FROM tconferencia_tgasto
				WHERE id_gasto = '$idgasto' ";
		$queIdConferencia = mysql_query($sql, ConectarMySQL::conexion());
		$resultadoConferencia = mysql_fetch_assoc($queIdConferencia);
		$id_conferencia = $resultadoConferencia["id_conferencia"];	
		
		$sql = "DELETE FROM ttipo_gasto 
				WHERE id_tipo_gasto = '$id_tipo_gasto' ";
		$eliminarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
		$sql = "DELETE FROM tgasto 
				WHERE id_gasto = '$idgasto' ";
		$eliminarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
		$sql = "DELETE FROM tconferencia_tgasto 
				WHERE id_gasto = '$idgasto' 
				AND id_conferencia='$id_conferencia' ";
		$eliminarGasto = mysql_query($sql, ConectarMySQL::conexion());
		
       header("location: ../gastosConferencia/mostrarGastosConferencia.php");
    }
    
    public function mostrarConferencias(){
        $sql = "SELECT id_conferencia, titulo_conferencia 
                FROM tconferencia";
        $conferencias = mysql_query($sql, ConectarMySQL::conexion());
    }
}
?>