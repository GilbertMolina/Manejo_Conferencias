<?php
/*Se importa el archivo de la fachada del asistente*/
require_once("../../includes/fachadaAsistentes.php");

if ($_POST) {
    /*Se hace la instancia del objeto de la fachada*/
    $registrarAsistente = new fachadaAsistentes();

    /*Se le pasan los parametros a la fachada*/
    $registrarAsistente->registrarAsistentes($_POST["nombre"], $_POST["apellido1"], $_POST["apellido2"], $_POST["contrasena1"], $_POST["correo_electronico"], 
                                             $_POST["id_pais"], $_POST["id_profesion"], $_POST["genero"], $_POST["fecha_nacimiento"], 
                                             $_POST["telefono"], $_POST["es_discapacitado"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../../imagenes/favicon.ico">
		<title>Registrar asistentes</title>
		<link rel="stylesheet" type="text/css" href="../../css/asistentes/styles.css" />
		<link rel="stylesheet" type="text/css" href="../../css/calendario/jscal2.css" />
		<link rel="stylesheet" type="text/css" href="../../css/calendario/border-radius.css" />
		<link rel="stylesheet" type="text/css" href="../../css/calendario/steel/steel.css" />
		<script type="text/javascript" src="../../js/scripts.js"></script>
		<script type="text/javascript" src="../../js/calendario/jscal2.js"></script>
		<script type="text/javascript" src="../../js/calendario/lang/es.js"></script>
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix*/
		include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_registro_asistentes.php';
		include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix_asistentes.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Registrar asistentes
				</div>
				<br>
				<form id="registro_de_asistentes" name="registro_de_asistentes" method="post" action="registroAsistentes.php" onsubmit="return validarAsistentes();">
					<fieldset>
						<legend>Registro de asistentes</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre:
									</td>
									<td>
									<br />
										<input id="nombre" name="nombre" type="text" size="30" maxlength="30"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Primer apellido:
									</td>
									<td>
									<br />
										<input id="apellido1" name="apellido1" type="text" size="30" maxlength="30"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Segundo apellido:
									</td>
									<td>
									<br />
										<input id="apellido2" name="apellido2" type="text" size="30" maxlength="30"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Contrase&ntilde;a:
									</td>
									<td>
									<br />
										<input id="contrasena1" name="contrasena1" type="password"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Confirmar contrase&ntilde;a:
									</td>
									<td>
									<br />
										<input id="contrasena2" name="contrasena2" type="password"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Correo electr&oacute;nico:
									</td>
									<td>
									<br />
										<input id="correo_electronico" name="correo_electronico" type="text" value="Ej: juan@gmail.com" onblur="ponerCorreo()" onfocus="quitarCorreo()" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Pa&iacute;s:
									</td>
									<td>
									<br />
										<select id="id_pais" name="id_pais">
											<option value="0">--Seleccione el pa&iacute;s</option>
											<?php
												$sqlPais = "select * from tpais";
												$resConsulta = mysql_query($sqlPais, ConectarMySQL::conexion());
												while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
													$id_pais=$rowConsulta['id_pais'];
													$nombre_pais=$rowConsulta['nombre_pais'];
											?>
											<option value="<?php echo $id_pais ?>"><?php echo $nombre_pais ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>
									<br />
										Profesi&oacute;n:
									</td>
									<td>
									<br />
										<select id="id_profesion" name="id_profesion">
											<option value="0">--Seleccione su profesi&oacute;n</option>
											<?php
												$sqlProfesion = "select * from tprofesion";
												$resConsulta = mysql_query($sqlProfesion, ConectarMySQL::conexion());
												while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
													$id_profesion=$rowConsulta['id_profesion'];
													$nombre_profesion=$rowConsulta['nombre_profesion'];
											?>
											<option value="<?php echo $id_profesion ?>"><?php echo $nombre_profesion ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>
									<br />
										G&eacute;nero:
									</td>
									<td>
									<br />
										<select id="genero" name="genero">
											<option value="0">--Seleccione su g&eacute;nero</option>
											<option value="F">Femenino</option>
											<option value="M">Masculino</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
									<br />
										Fecha de nacimiento:
									</td>
									<td>
									<br />
										<input id="fecha_nacimiento" name="fecha_nacimiento" style="width:70px; heigth:90px; text-align:center;" /><a id="fecha_nacimiento-trigger" title="Seleccione su fecha de nacimiento"><img src="../../imagenes/agregar_fecha.png" alt="seleccionar fecha de nacimiento" width="55" height="55"/></a>
										<script>Calendar.setup({trigger:"fecha_nacimiento-trigger",inputField:"fecha_nacimiento"});</script>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Tel&eacute;fono:
									</td>
									<td>
									<br />
										<input id="telefono" name="telefono" type="text" size="20" maxlength="20" value="Ej: 87618695" onblur="ponerTelefono()" onfocus="quitarTelefono()"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Discapacidad:
									</td>
									<td>
									<br />
										<input id="es_discapacitado" name="es_discapacitado" type="radio" value="1">S&iacute;<br/>
										<input id="es_discapacitado" name="es_discapacitado" type="radio" value="0">No
									</td>
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" name="volver" type="button" value="Atr&aacute;s" onClick="volverIndex();">
										<input id="enviar" name="enviar" type="submit" value="Registrarme"/>
									<br />
									</td>
								</tr>
							</table>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="footer">
			<p>Registrix - Maximum Intelligence &copy;</p>
		</div>
	</body>
</html>