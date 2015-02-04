<?php
/*Se importa el archivo de la fachada del proveedor*/
require_once("../includes/fachadaGastosConferencia.php");

if ($_POST) {
    /*Se hace la instancia del objeto de la fachada*/
    $registroGastos= new fachadaGastosConferencia();

    /*Se le pasan los parametros a la fachada*/
    $registroGastos->registroGastosConferencia($_POST["id_conferencia"], $_POST["nombre_tipo_gasto"], $_POST["descripcion_tipo_gasto"], $_POST["costo_del_gasto"], $_POST["esta_aprobado"]);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Registro de Gastos de Conferencia</title>
		<link rel="stylesheet" type="text/css" href="../css/gastosConferencia/styles.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>
	</head>
	<body>
		<?php
			/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
			include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_gastosConferencia.php';
			include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Registrar Gastos de las Conferencias
				</div>
				<br>
				<form action="registroGastosConferencia.php" method="post" id="gastos_conferencia" name="gastos_conferencia" onsubmit="return validarRegistroGastosConferencia()">
					<fieldset>
						<legend>Registrar Gastos</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre de la conferencia:
									</td>
									<td>
									<br />
									<select id="id_conferencia" name="id_conferencia">
										<option value="0">--Seleccione una conferencia</option>
										<?php
										$sqlConsulta = "SELECT id_conferencia, titulo_conferencia FROM tconferencia";
										$resConsulta = mysql_query($sqlConsulta, ConectarMySQL::conexion());
										while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
											$conferencia=$rowConsulta['id_conferencia'];
											$titulo=$rowConsulta['titulo_conferencia'];
											echo "<option value=$conferencia>$titulo</option>";
										} ?>
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
										<input id="nombre_tipo_gasto" type="text" name="nombre_tipo_gasto" size="28" maxlength="28"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										 Descripci&oacute;n del gasto:
									</td>
									<td>
									<br />
										<textarea id="descripcion_tipo_gasto" name="descripcion_tipo_gasto" cols="23" rows="3" onblur="ponerDescripcionConferencia()" onfocus="quitarDescripcionConferencia()">Escriba aqu&iacute; la descripci&oacute;n del gasto</textarea>
									</td>
								</tr>
								<tr>
									<td>
									<br />
										Costo del gasto:
									</td>
									<td>
									<br />
										<input id="costo_del_gasto" type="text" name="costo_del_gasto" size="28" maxlength="28" />
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
										<input id="volver" type="button" value="Atr&aacute;s" onClick="volverMostrarGastosConferencia();">
										<input id="enviar" name="enviar" type="submit" value="Guardar">
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
