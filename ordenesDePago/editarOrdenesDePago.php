<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../includes/fachadaOrdenesDePago.php");

/*Se hace la instancia del objeto de la fachada*/
$editarOrdenesDePago = new fachadaOrdenesDePago();

/*Se verifica que venga "editar" en el post y entra a la condicion*/
if (isset($_POST["editar"]) and $_POST["editar"]=="si") {
    $editarOrdenesDePago->editarOrdenesDePago($_POST["numero_factura"], $_POST["monto"], $_POST["id_orden"]);
    exit;
}

/*Se optiene el id de la orden que se quiere modificar*/
$editarOrden = $editarOrdenesDePago->mostrarOrdenesDePagoPorId($_GET["id_orden"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Editar orden de pago</title>
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
				<form id="ordenes_de_pago_a_proveedor" name="ordenes_de_pago_a_proveedor" method="post" action="editarOrdenesDePago.php?action=edit" onsubmit="return validarEditarOrdenesDePago()">
					<fieldset>
						<legend>Editar orden de pago</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre proveedor:
									</td>
									<td>
									<br />
										<?php echo $editarOrden[0]["nombre_proveedor"]; ?>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										C&eacute;dula f&iacute;sica o j&uacute;ridica:
									</td>
									<td>
									<br />
										<?php echo $editarOrden[0]["cedula"]; ?>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										N&uacute;mero de la factura:
									</td>
									<td>
									<br />
										<input id="numero_factura" name="numero_factura" type="text" size="10" maxlength="10" value="<?php echo $editarOrden[0]["numero_factura"]; ?>" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Monto de la factura:
									</td>
									<td>
									<br />
										<input id="monto" name="monto" type="text" size="12" maxlength="12" value="<?php echo $editarOrden[0]["monto"]; ?>" />
									</td>
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" name="volver" type="button" value="Atr&aacute;s" onClick="volverMostrarOrdenes();">
										<input id="enviar" name="enviar" type="submit" value="Guardar"/>
										<input type="hidden" name="editar" value="si">
										<input id="id_orden" name="id_orden" type="hidden" value="<?php echo $_GET["id_orden"]; ?>" />
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