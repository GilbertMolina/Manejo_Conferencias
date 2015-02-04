<?php 
session_start();

class validaUsuario{



/*-------------Función query()---------------------------------*/

	/*Función genérica para realizar consultas
	en la BD.
	Retorna una arreglo asociativo.
	Recibe como parámetro la consulta.
	*/
	public function query($pQuery){
	
		//Se realiza la consulta
    	$oResult = mysql_query($pQuery, ConectarMySQL::conexion());
		
		if($oResult!=false)
		{
			//Arreglo para almacenar el resultado
			$aData=array();
			
			//Se almacenan la cantidad de filas del resultado
			$iFilas=mysql_num_rows($oResult);
			
			if($iFilas>0)
			{
				//Se crea el arreglo asociativo
				while($row = mysql_fetch_array($oResult,MYSQL_ASSOC))
				{
					$aData[]=$row;
				}
				return $aData;
			}
			else
			{
				return null;
			}			
		}
		else
		{
			return null;
		}
    }
	
	public function validar()
	{
	
		if($_POST)
		{
			$aErrores=array('formato_email'=>"",'campos_en_blanco'=>"",'credenciales_incorrectas'=>"");

			$correo_electronico = $_POST["email"];
			$contrasena = md5($_POST["contrasena"]);

			if(strlen($_POST["email"])==0 || strlen($_POST["contrasena"])==0)
			{
				$aErrores['campos_en_blanco']="Debe de proveer tanto el correo electr&oacute;nico como su clave para continuar";
				
				echo "<br />";
				echo "<font color=\"red\">";
				echo $aErrores['campos_en_blanco'];
				echo "</font>";
				$exito = 0;
			}
			else
			{
				$regexp = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";

				if(preg_match($regexp , $_POST["email"]))
				{
					
					$sqlDatos = "select concat (p.nombre,' ', p.apellido1, ' ',p.apellido2) 'nombre', p.id_persona, p.contrasena, 
										n.id_nivel_persona, p.correo_electronico from tpersona p, tpersona_tnivel_persona tp, tnivel_persona n 
										where p.id_persona = tp.id_persona
										and n.id_nivel_persona = tp.id_nivel_persona 
										and p.correo_electronico = '$correo_electronico'
										and p.contrasena = '$contrasena'";

					$resultado = $this->query($sqlDatos);

					if($resultado == NULL)
					{
						$existe=0;
					}
					else
					{
						$existe=1;
					}

					if($existe!=0)
					{

						foreach ($resultado as $resultadoP)
						{
						$nombre=$resultadoP['nombre'];
						$id=$resultadoP['id_persona'];
						$nivel=$resultadoP['id_nivel_persona'];
						}

						$_SESSION["correo_electronico"]=$_POST["email"];
						$_SESSION["nombre"] = $nombre;
						$_SESSION["id"] = $id;
						$_SESSION["id_nivel"] = $nivel; 
						$exito = 1;
						
						
						switch ($nivel) 
						{
							case 1:
								header("Location: MI_asistentes/index.php");
							break;
							case 2:
								header("Location: inicio.php");
							break;
							case 3:
								header("Location: inicio.php");
							break;
							case 4:
								header("Location: MI_asistentes/index.php");
							break;
						}
						
						
					}
					else
					{
						$aErrores['credenciales_incorrectas']="No existe un usuario con las credenciales ingresadas.";
						
						echo "<br />";
						echo "<font color=\"red\">";
						echo $aErrores['credenciales_incorrectas'];
						echo "</font>";
						$exito = 0;
					}
				}
				else
				{
					$aErrores["formato_email"]="El correo electr&oacute;nico est&aacute; en un formato incorrecto.";
					
					echo "<br />";
					echo "<font color=\"red\">";
					echo $aErrores["formato_email"];
					echo "</font>";
					$exito = 0;
				}
			}
		}
	}
}
?>