<?php
/*Se importa el archivo de conexion de la base de datos*/
require_once ("conexion.php");

/*Clase que maneja los DMLs de las charlas*/
class fachadaAsistentes {
   
/*Se declara la variable "$consultas" de tipo private*/
    private $consultas;
    
/*Funcion constructor*/
    public function __construct() {
        $this->consultas = array();
    }
        
/*Funcion que registra los asistentes*/
    public function registrarAsistentes($nombre,$apellido1,$apellido2,$contraseña,$correo_electronico,$idpais,$idprofesion,$genero,$fecha_nacimiento,$telefono,$es_discapacitado) {
        $contraseña=md5($contraseña);
		$sql = "INSERT INTO tpersona (id_profesion, nombre, apellido1, apellido2, sexo, correo_electronico, fecha_nacimiento, telefono, es_discapacitado, contrasena, id_pais) 
                VALUES ('$idprofesion','$nombre','$apellido1','$apellido2','$genero','$correo_electronico','$fecha_nacimiento','$telefono','$es_discapacitado','$contraseña','$idpais') ";
        $registroAsistente = mysql_query($sql, ConectarMySQL::conexion());
        
		$sql = "INSERT INTO tpersona_tnivel_persona (id_nivel_persona) 
                VALUES (4) ";
        $registroAsistente = mysql_query($sql, ConectarMySQL::conexion());
        header("location: ../../index.php");
	}
}
?>