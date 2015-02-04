<?php
/*Se importa el archivo de la fachada de los gastos de las charlas*/
require_once("../includes/fachadaGastosCharla.php");

if ($_POST) {
    /*Se hace la instancia del objeto de la fachada*/
    $registroGastos= new fachadaGastosCharla();

    /*Se le pasan los parametros a la fachada*/
    $registroGastos->registroGastosCharla($_POST["id_charla"], $_POST["nombre_tipo_gasto"], $_POST["costo_del_gasto"], $_POST["descripcion_tipo_gasto"], $_POST["esta_aprobado"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Registro de los Gastos de la Charla</title>
		<link rel="stylesheet" type="text/css" href="../css/registrarGastosCharla/styles.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>
	</head>
	<body>
		<?php
			/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
			include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_registrar_gastos_charla.php';
			include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Registrar Gastos de las Charlas
				</div>
				<br>
				<form id="gastos_charla" name="gastos_charla" method="post" action="registroGastosCharla.php" onsubmit="return validarRegistroGastosCharla()">
					<fieldset>
						<legend>Registrar Gastos</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre de la charla:
									</td>
									<td>
									<br />
									<select id="id_charla" name="id_charla">
										<option value="0">--Seleccione una charla</option>
										<?php
										$sqlConsulta = "SELECT id_charla, titulo_charla FROM tcharla";
										
										$resConsulta = mysql_query($sqlConsulta, ConectarMySQL::conexion());
										while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
											$charla=$rowConsulta['id_charla'];
											$titulo=$rowConsulta['titulo_charla'];
											echo "<option value=$charla>$titulo</option>";
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
										 Descripci&oacute;n del gasto:
									</td>
									<td>
									<br />
										<textarea id="descripcion_tipo_gasto" name="descripcion_tipo_gasto" cols="23" rows="3" onblur="ponerDescripcionGastosCharla()" onfocus="quitarDescripcionGastosCharla()">Escriba aqu&iacute; la descripci&oacute;n del gasto</textarea>
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
										<input id="esta_aprobado" name="esta_aprobado" type="radio" value="1"> S&iacute;<br/>
										<input id="esta_aprobado" name="esta_aprobado" type="radio" value="0"> No<br/>
									</td>
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" type="button" value="Atr&aacute;s" onClick="volverMostrarGastosCharla();">
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
