<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../includes/fachadaOrdenesDePago.php");

/*Se hace la instancia del objeto de la fachada*/
$registrarOrdenes = new fachadaOrdenesDePago();

/*Se verifica que venga "registrar" en el post y entra a la condicion*/
if (isset($_POST["registrar"]) and $_POST["registrar"]=="si") {
    $registrarOrdenes->registrarOrdenesDePago($_POST["id_proveedor"], $_POST["numero_factura"], $_POST["monto"]);
    exit;
}

/*Se optiene el id del proveedor al que se le quiere emitir una orden de pago*/
$emitirOrden = $registrarOrdenes->mostrarProveedoresRegistradosPorId($_GET['id_proveedor']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Realizar orden de pago</title>
		<link rel="stylesheet" type="text/css" href="../css/ordenesDePago/styles.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_ordenesDePago.php';
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Ordenes de pago a proveedores
				</div>
				<br>
				<form id="ordenes_de_pago_a_proveedor" name="ordenes_de_pago_a_proveedor" method="post" action="registrarOrdenDePago.php" onsubmit="return validarRegistrarOrdenesDePago()">
					<fieldset>
						<legend>Realizar orden de pago</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre proveedor:
									</td>
									<td>
									<br />
										<?php echo $emitirOrden[0]["nombre_proveedor"]; ?>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Raz&oacute;n social:
									</td>
									<td>
									<br />
										<?php echo $emitirOrden[0]["razon_social"]; ?>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										C&eacute;dula f&iacute;sica o j&uacute;ridica:
									</td>
									<td>
									<br />
										<?php echo $emitirOrden[0]["cedula"]; ?>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Ingrese n&uacute;mero de la factura:
									</td>
									<td>
									<br />
										<input id="numero_factura" name="numero_factura" type="text" size="10" maxlength="10" value=""/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Ingrese monto de la factura:
									</td>
									<td>
									<br />
										<input id="monto" name="monto" type="text" size="12" maxlength="12" value=""/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" name="volver" type="button" value="Atr&aacute;s" onClick="volverEmitirOrdenes();">
										<input id="enviar" name="enviar" type="submit" value="Guardar"/>
										<input name="registrar" type="hidden" value="si">
										<input id="id_proveedor" name="id_proveedor" type="hidden" value="<?php echo $_GET["id_proveedor"]; ?>" />
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