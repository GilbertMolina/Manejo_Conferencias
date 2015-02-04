<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once ("../includes/fachadaOrdenesDePago.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Emitir &oacute;rdenes de Pago</title>
		<link rel="stylesheet" type="text/css" href="../css/ordenesDePago/styles_emitir.css" />
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
					Proveedores registrados
				</div>
				<br>
				<form id="ordenes_de_pago_a_proveedor" name="ordenes_de_pago_a_proveedor" method="post" action="emitirOrdenesDePago.php">
					<fieldset>
						<legend>Lista de proveedores registrados</legend>
							<table width="440" cellpadding="6">
							  <tr>
								<th width="130" align="center">Nombre</th>
								<th width="150" align="center">C&eacute;dula</th>
								<th width="120" align="center">Emitir orden</th>
							  </tr>
							  <?php 
                                                          echo "<br>";
							  /*Se define una variable con un color determinado para cambiar los colores de las filas de la tabla*/
							  $color='#DBF1F7';
							  
							  /*Se hace la instancia del objeto de la fachada*/
							  $mostrarOrdenes = new fachadaOrdenesDePago();
							  $registro = $mostrarOrdenes->mostrarProveedoresRegistrados();
							  
							  /*Se realiza un ciclo para llenar la tabla de la consulta de los proveedores*/
							  for ($i=0;$i<count($registro);$i++) {
							  
							  /*Condicional para que las filas de la tabla tengan dos colores*/
							  $color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
							  ?>
							  <tr bgcolor="<?php echo $color ?>">
								<td align="center"><?php echo $registro[$i]['nombre_proveedor']; ?></td>
								<td align="center"><?php echo $registro[$i]['cedula']; ?></td>
								<td align="center"><a href="registrarOrdenDePago.php?id_proveedor=<?php echo $registro[$i]['id_proveedor']; ?>" title="Emitir orden de pago"><img src="../imagenes/emitir.png" alt="emitir orden" width="30" height="30"/></a></td>
							  </tr>
							  <?php } ?>
							  <tr>
								<td>
								<br />
								<br />
									<input id="volver" name="volver" type="button" value="Atr&aacute;s" onclick="volverMostrarOrdenes();">
									<input id="enviar" type="submit" value="Volver a consultar">
								</td>
							  </tr>
							</table >
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
										echo "En este momento no hay ning&uacute;n proveedor registrado";
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