<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../includes/fachadaOrdenesDePago.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Descargar ordenes de pago</title>
		<link rel="stylesheet" type="text/css" href="../css/ordenesDePago/styles_download.css" />
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
					Provedores registrados
				</div>
				<br>
				<form id="ordenes_de_pago_a_proveedor" name="ordenes_de_pago_a_proveedor" method="post" action="descargarOrdenesDePago.php">
					<fieldset>
						<legend>Imprimir ordenes de pago</legend>
							<table width="440" cellpadding="6">
							  <tr>
								<td colspan="3" align="center">Aqu&iacute; usted puede imprimir todas las ordenes de pago de un proveedor</td>
							  </tr>
							  <tr>
								<th width="130" align="center">Nombre</th>
								<th width="150" align="center">C&eacute;dula</th>
								<th width="120" align="center">Imprimir</th>
							  </tr>
							  <?php
							  /*Se define una variable con un color determinado para cambiar los colores de las filas de la tabla*/
							  $color='#DBF1F7';
							  
							  /*Se hace la instancia del objeto de la fachada*/
							  $descargarOrdenesDePago = new fachadaOrdenesDePago();
							  $registro = $descargarOrdenesDePago->mostrarProveedoresParaDescargarOrdenes();
							  
							  /*Se realiza un ciclo para llenar la tabla de la consulta de los proveedores*/
							  for ($i=0;$i<count($registro);$i++) {
							  
							  /*Condicional para que las filas de la tabla tengan dos colores*/
							  $color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
							  ?>
							  <tr bgcolor="<?php echo $color ?>">
								<td align="center"><?php echo $registro[$i]['nombre_proveedor']; ?></td>
								<td align="center"><?php echo $registro[$i]['cedula']; ?></td>
								<td align="center"><a href="OrdenesDePagoProveedores.php?nombre_proveedor=<?php echo $registro[$i]['nombre_proveedor']; ?>&orden_pagada=<?php echo $registro[$i]['orden_pagada']; ?>" title="Imprimir todas las orden de pago de este proveedor"><img src="../imagenes/imprimir.png" alt="imprimir orden" width="35" height="35"/></a></a></td>
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
									/*Si la variable $numeroDeFilas es igual a 0, que se muestre el siguiente mensaje*/
									if ($i == 0) {
										echo "Nota: <br>";
										echo "En este momento no hay ningún proveedor con ordenes pagadas";
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
