<?php
/*Se importa el archivo de la fachada del proveedor*/
require_once("../includes/fachadaProveedor.php");

if ($_POST) {
    /*Se hace la instancia del objeto de la fachada*/
    $registrarProveedor = new fachadaProveedor();
    
    /*Se le pasan los parametros a la fachada*/
    $registrarProveedor->registroProveedores($_POST["nombre"], $_POST["razon_social"], $_POST["cedula"], $_POST["costo_del_servicio"], $_POST["descripcion_del_servicio"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Registrar proveedor</title>
		<link rel="stylesheet" type="text/css" href="../css/proveedores/styles.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_proveedores.php';
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Registrar proveedores
				</div>
				<br>
				<form id="registro_de_proveedor" name="registro_de_proveedor" method="post" action="registroProveedor.php" onsubmit="return validarProveedores()">
					<fieldset>
						<legend>Registro de proveedor</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre:
									</td>
									<td>
									<br />
										<input id="nombre" name="nombre" type="text" size="30" maxlength="30" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Raz&oacute;n social:
									</td>
									<td>
									<br />
										<input id="razon_social" name="razon_social" type="text" size="100" maxlength="100" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										C&eacute;dula f&iacute;sica o j&uacute;ridica:
									</td>
									<td>
									<br />
										<input id="cedula" name="cedula" type="text" size="20" maxlength="20" value="Ej: 3-0544-0142 / 3-002-45628-04" onblur="ponerCedula()" onfocus="quitarCedula()"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Costo del servicio:
									</td>
									<td>
									<br />
										<input id="costo_del_servicio" name="costo_del_servicio" type="text" size="12" maxlength="12" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Descripci&oacute;n del servicio:
									</td>
									<td>
									<br />
										<textarea id="descripcion_del_servicio" name="descripcion_del_servicio" cols="23" rows="3" onblur="ponerDescripcion()" onfocus="quitarDescripcion()">Escriba aqu&iacute; la descripci&oacute;n del servicio</textarea>
									<br />
									</td>
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" name="volver" type="button" value="Atr&aacute;s" onClick="volverMostrarProveedores();">
										<input id="enviar" name="enviar" type="submit" value="Guardar"/>
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