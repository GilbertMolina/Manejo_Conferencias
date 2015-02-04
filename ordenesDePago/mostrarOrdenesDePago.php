<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../includes/fachadaOrdenesDePago.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Listado de ordenes de pago</title>
		<link rel="stylesheet" type="text/css" href="../css/ordenesDePago/styles_query.css" />
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
					Listado de ordenes de pago
				</div>
				<br>
				<form id="ordenes_de_pago_a_proveedor" name="ordenes_de_pago_a_proveedor" method="post" action="mostrarOrdenesDePago.php">
					<fieldset>
						<legend>Ordenes de pago</legend>
							<table width="890" cellpadding="6">
							  <tr>
								<td colspan="10" align="center">
									<div id="descripcionOrdenDePago">
										La siguiente tabla muestra los proveedores registrados con ordenes de pago emitidas, donde el campo monto est&aacute; relacionado a cada orden de pago individualmente
									</div>
									<div id="nuevaOrdenDePago">
										Emitir orden de pago
									</div>
									<a href="emitirOrdenesDePago.php" title="Emitir nueva orden de pago"><img align="right" src="../imagenes/agregar.png" alt="emitir orden de pago" width="35" height="35"/></a>
								</td>
							  </tr>
							  <tr>
								<th width="60" align="center">Fecha</th>
								<th width="86" align="center">Factura</th>
								<th width="110" align="center">Proveedor</th>
								<th width="450" align="center">C&eacute;dula</th>
								<th width="400" align="center">Monto</th>
								<th width="60" align="center">Estado</th>
								<th width="5" align="center">Editar</th>
								<th width="5" align="center">Eliminar</th>
								<th width="5" align="center">Pagar</th>
								<th width="5" align="center">Imprimir</th>
							  </tr>
							  <?php
							  /*Se define una variable con un color determinado para cambiar los colores de las filas de la tabla*/
							  $color='#DBF1F7';
							  
							  /*Se hace la instancia del objeto de la fachada*/
							  $mostrarOrdenes = new fachadaOrdenesDePago();
							  $registro = $mostrarOrdenes->mostrarOrdenesDePago();
							  
							  /*Se realiza un ciclo para llenar la tabla de la consulta de los proveedores*/
							  for ($i=0;$i<count($registro);$i++) {
							  
							  /*Condicional para que las filas de la tabla tengan dos colores*/
							  $color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
							  ?>
							  <tr bgcolor="<?php echo $color ?>">
								<td align="center"><?php echo $registro[$i]['fecha']; ?></td>
								<td align="center"><?php echo $registro[$i]['numero_factura']; ?></td>
								<td align="center"><?php echo $registro[$i]['nombre_proveedor']; ?></td>
								<td align="center"><?php echo $registro[$i]['cedula']; ?></td>
								<td align="center"><?php echo "$ ".$registro[$i]['monto']; ?></td>
								<td align="center"><?php echo $registro[$i]['orden']; ?></td>
								<?php if ($registro[$i]['orden'] == 'Pendiente') { ?>
									<td align="center"><a href="editarOrdenesDePago.php?id_orden=<?php echo $registro[$i]['id_orden']; ?>&id_proveedor=<?php echo $registro[$i]['id_proveedor']; ?>" title="Editar orden de pago"><img src="../imagenes/editar.png" alt="editar orden" width="25" height="25"/></a></td>
									<td align="center"><a href="#" onclick="borrarOrdenDePago(<?php echo $registro[$i]['id_orden']; ?>);" title="Borrar orden de pago"><img src="../imagenes/borrar.png" alt="borrar orden" width="25" height="25"/></a></td>
									<td align="center"><a href="#" onclick="pagarOrdenDePago(<?php echo $registro[$i]['id_orden']; ?>);" title="Pagar orden de pago"><img src="../imagenes/pagar.png" alt="pagar orden" width="30" height="30"/></a></td>
									<td align="center"><img src="../imagenes/no_imprimir.png" alt="pagar orden" width="30" height="30"/>
								<?php } else { ?>
									<td align="center"><img src="../imagenes/no_editar.png" alt="no editar orden" width="25" height="25"/></td>
									<td align="center"><img src="../imagenes/no_borrar.png" alt="no borrar orden" width="25" height="25"/></td>
									<td align="center"><img src="../imagenes/no_pagar.png" alt="pagar orden" width="30" height="30"/>
									<td align="center"><a href="FacturaDePagoProveedor.php?id_orden=<?php echo $registro[$i]['id_orden']; ?>&id_proveedor=<?php echo $registro[$i]['id_proveedor']; ?>" title="Imprimir esta orden de pago"><img src="../imagenes/imprimir.png" alt="descargar factura" width="30" height="30"/></a></td>
								<?php }?>
							  </tr>
							  <?php } ?>
							  <tr>
								<td>
								<br />
								<br />
									<input id="enviar" type="submit" value="Volver a consultar">
								</td>
							  </tr>
							</table>
					</fieldset>
				</form>
					<div id="registro">
						<table>
							<tr>
								<td>
									<?php
									/*Si la variable $i es igual a 0, que se muestre el siguiente mensaje*/
									if ($i == 0) {
										echo "Nota: <br>";
										echo "En este momento no hay <br>";
										echo "ning&uacute;na orden registrada";
									} ?>
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
