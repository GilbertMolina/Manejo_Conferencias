<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../includes/fachadaProveedor.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Mostrar proveedores</title>
		<link rel="stylesheet" type="text/css" href="../css/proveedores/styles_query.css" />
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
					Mostrar proveedores
				</div>
				<br>
				<form id="registro_de_proveedor" name="registro_de_proveedor" method="post" action="mostrarProveedor.php">
					<fieldset>
						<legend>Lista de Proveedores</legend>
							<table width="800" cellpadding="6">
							  <tr>
								<td colspan="7" align="center">
									<div id="descripcionProveedor">
										La siguiente tabla muestra los proveedores registrados en el sistema, donde el campo costo est&aacute; relacionado a cada proveedor individualmente
									</div>
									<div id="nuevoProveedor">
										Registrar proveedor
									</div>
									<a href="registroProveedor.php" title="Agregar un nuevo proveedor"><img align="right" src="../imagenes/agregar.png" alt="registrar proveedor" width="35" height="35"/></a>
								</td>
							  </tr>
							  <tr>
								<th width="140" align="center">Nombre</th>
								<th width="220" align="center">Raz&oacute;n social</th>
								<th width="400" align="center">C&eacute;dula</th>
								<th width="200" align="center">Costo</th>
								<th width="400" align="center">Descripci&oacute;n</th>
								<th width="5" align="center">Editar</th>
								<th width="5" align="center">Eliminar</th>
							  </tr>
							  <?php
							  /*Se define una variable con un color determinado para cambiar los colores de las filas de la tabla*/
							  $color='#DBF1F7';
                                                          
							  /*Se hace la instancia del objeto de la fachada*/
							  $mostrarProveedor = new fachadaProveedor();
							  $registro = $mostrarProveedor->mostrarProveedores();
							  
							  /*Se realiza un ciclo para llenar la tabla de la consulta de los proveedores*/
							  for ($i=0;$i<count($registro);$i++) {
							  
							  /*Condicional para que las filas de la tabla tengan dos colores*/
							  $color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
							  ?>
							  <tr bgcolor="<?php echo $color ?>">
								<td align="center"><?php echo $registro[$i]['nombre_proveedor']; ?></td>
								<td align="center"><?php echo $registro[$i]['razon_social']; ?></td>
								<td align="center"><?php echo $registro[$i]['cedula']; ?></td>
								<td align="center"><?php echo "$ ".$registro[$i]['costo']; ?></td>
								<td align="center"><?php echo $registro[$i]['descripcion_servicio']; ?></td>
								<td align="center"><a href="editarProveedor.php?id_proveedor=<?php echo $registro[$i]['id_proveedor']; ?>" title="Editar proveedor"><img src="../imagenes/editar.png" alt="editar proveedor" width="25" height="25"/></a></td>
								<td align="center"><a href="#" onclick="borrarProveedor(<?php echo $registro[$i]['id_proveedor']; ?>);" title="Borrar proveedor"><img src="../imagenes/borrar.png" alt="borrar proveedor" width="25" height="25"/></a></td>
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
