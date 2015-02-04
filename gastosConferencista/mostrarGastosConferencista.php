<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../includes/fachadaGastosConferencista.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Mostrar Gastos</title>
		<link rel="stylesheet" type="text/css" href="../css/registrarGastosConferencista/styles_query.css" />
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
					Mostrar Gastos de Conferencistas
				</div>
				<br>
				<form id="gastos_conferencista" name="gastos_conferencista" method="post" action="mostrarGastosConferencista.php">
					<fieldset>
						<legend>Lista de los Gastos del Conferencista</legend>
							<table width="810" cellspacing="2" cellpadding="6">
							  <tr>
								<td colspan="7" align="center">
									<div id="descripcionGastoConferencista">
										La siguiente tabla muestra los gastos registrados para los conferencistas, donde el campo costo est&aacute; relacionado a cada gasto del conferencista individualmente
									</div>
									<div id="nuevoGastoConferencista">
										Registrar gasto del conferencista
									</div>
									<a href="registroGastosConferencista.php" title="Agregar un nuevo gasto del conferencista"><img align="right" src="../imagenes/agregar.png" alt="registrar gasto conferencista" width="35" height="35"/></a>
								</td>
							  </tr>
							  <tr>
								<th width="200" align="center">Nombre conferencista</th>
								<th width="100" align="center">Nombre Gasto</th>
								<th width="100" align="center">Descripci&oacute;n</th>
								<th width="100" align="center">Costo</th>
								<th width="100" align="center">Estado</th>
								<th width="5" align="center">Editar</th>
								<th width="5" align="center">Eliminar</th>
							  </tr>
							  <?php
							  /*Se define una variable con un color determinado para cambiar los colores de las filas de la tabla*/
							  $color='#DBF1F7';
                                                          
							  /*Se hace la instancia del objeto de la fachada*/
							  $mostrarGastos = new fachadaGastosConferencista();
							  $registro = $mostrarGastos->mostrarGastosConferencista();

							 /*Se realiza un ciclo para llenar la tabla de la consulta de los gastos de los conferencistas*/
							  for ($i=0;$i<count($registro);$i++) {
							  
							  /*Condicional para que las filas de la tabla tengan dos colores*/
							  $color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
                              ?>
							  <tr bgcolor="<?php echo $color ?>">
								<td align="center"><?php echo $registro[$i]['Nombre']; ?></td>
								<td align="center"><?php echo $registro[$i]['Tipo']; ?></td>
								<td align="center"><?php echo $registro[$i]['descripcion']; ?></td>
								<td align="center"><?php echo "$ ".$registro[$i]['costo']; ?></td>
								<td align="center"><?php echo $registro[$i]['esta_aprobado']; ?></td>
								<td align="center"><a href="editarGastosConferencista.php?id_gasto=<?php echo $registro[$i]['id_gasto'];?>&id_persona=<?php echo $registro[$i]['id_persona'];?>&idtipogasto=<?php echo $registro[$i]['id_tipo_gasto'];?>" title="Editar gasto"><img src="../imagenes/editar.png" alt="editar gasto" width="25" height="25"/></a></td>
								<td align="center"><a href="#" onclick="borrarGastoConferencista(<?php echo $registro[$i]['id_gasto']; ?>);" title="Eliminar gasto"><img src="../imagenes/borrar.png" alt="borrar gasto" width="25" height="25"/></a></td>
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
								/*Si la variable $numeroDeFilasGastos es igual a 0, que se muestra el siguiente mensaje*/
								if ($i == 0) {
									echo "Nota: <br>";
									echo "En este momento no hay ning&uacute;n gasto registrado para las conferencias";
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
