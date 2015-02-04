<?php
/*Se importa el archivo de la fachada del conferencista*/
require_once("../includes/fachadaGastosConferencista.php");

if ($_POST) {
    /*Se hace la instancia del objeto de la fachada*/
    $registroGastos= new fachadaGastosConferencista();

    /*Se le pasan los parametros a la fachada*/
    $registroGastos->registroGastosConferencista($_POST["id_persona"], $_POST["nombre_tipo_gasto"], $_POST["descripcion_tipo_gasto"], $_POST["costo_del_gasto"], $_POST["esta_aprobado"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Registro de Gastos del Conferencista</title>
		<link rel="stylesheet" type="text/css" href="../css/registrarGastosConferencista/styles.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_conferencista.php';
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Registrar Gastos del Conferencista
				</div>
				<br>
				<form id="gastos_conferencista" name="gastos_conferencista" method="post" action="registroGastosConferencista.php" onsubmit="return validarRegistroGastosConferencista()">
					<fieldset>
						<legend>Registro de los Gastos del Conferencista</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre del conferencista:
									</td>
									<td>
									<br />
										<select id="id_persona" name="id_persona">
											<option value="0">--Seleccione un conferencista</option>
											<?php 
											 $sqlConsulta = "select p.id_persona, concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'nombre'
															 from tpersona p, tpersona_tnivel_persona tp, tnivel_persona n
															 where p.id_persona=tp.id_persona 
															 and tp.id_nivel_persona=1
															 and n.id_nivel_persona=tp.id_nivel_persona
															 group by p.id_persona;";
											$resConsulta = mysql_query($sqlConsulta, ConectarMySQL::conexion());
											while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
											$nombre=$rowConsulta['nombre'];
											$id=$rowConsulta['id_persona'];
											echo "<option value=$id>$nombre</option>";
											}
											?>
									</select>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Nombre del gasto:
									</td>
									<td>
									<br />
										<input id="nombre_tipo_gasto" name="nombre_tipo_gasto" type="text" size="28" maxlength="28"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Costo del gasto:
									</td>
									<td>
									<br />
										<input id="costo_del_gasto" name="costo_del_gasto" type="text" size="28" maxlength="28" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										 Descripci&oacute;n del gasto:
									</td>
									<td>
									<br />
										<textarea id="descripcion_tipo_gasto" name="descripcion_tipo_gasto" cols="23" rows="3" onblur="ponerDescripcionConferencista()" onfocus="quitarDescripcionConferencista()">Escriba aqu&iacute; la descripci&oacute;n del gasto</textarea>
									<br />
									</td>
								</tr>
								<tr>
									<td>
									<br />
										Esta aprobado:
									</td>
									<td>
									<br />
										<input id="esta_aprobado" type="radio" name="esta_aprobado" value= "1"> S&iacute;<br/>
										<input id="esta_aprobado" type="radio" name="esta_aprobado" value= "0"> No<br/>
									</td>
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" type="button" value="Atr&aacute;s" onClick="volverMostrarGastosConferencista();">
										<input id="enviar" type="submit" value="Guardar">
									<br />
									</td>
								</tr>
							</table>
					</fieldset>
				</form>
					<div id="registro">
						<table>
							<tr>
								<td>
								</td>
							</tr>
						</table>
					</div>
			</div>
		</div>
		<div class="footer">
			<p>Registrix - Maximum Intelligence &copy;</p>
		</div>
	</body>
</html>
