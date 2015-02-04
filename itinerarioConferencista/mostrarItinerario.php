<?php
/*Se importa el archivo de la fachada del itinerario del conferencista*/
require_once("../includes/fachadaItinerarioConferencista.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Mostrar itinerario</title>
		<link rel="stylesheet" type="text/css" href="../css/itinerarioConferencista/styles_query.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_itinerario_conferencista.php';
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Mostrar itinerario
				</div>
				<br>
				<form id="registro_de_itinerario" name="registro_de_itinerario"  method="post" action="mostrarItinerario.php">
					<fieldset>
						<legend>Itinerario de los Conferencistas</legend>
							<table width="830" cellpadding="6">
							  <tr>
								<td colspan="6" align="center">
									<div id="descripcionItinerarioConferencista">
										La siguiente tabla muestra el itinerario de los conferencistas
									</div>
									<div id="registroItinerarioConferencista">
										Registrar itinerario del conferencista
									</div>
									<a href="registroItinerario.php" title="Agregar nuevo itinerario del conferencista"><img align="right" src="../imagenes/agregar.png" alt="agregar itinerario conferencista" width="35" height="35"/></a>
								</td>
							  </tr>
							  <tr>
								<th width="200" align="center">Nombre conferencista</th>
								<th width="23" align="center">Transporte</th>
								<th width="163" align="center">Lugar de hospedaje</th>
								<th width="130" align="center">Duraci&oacute;n hospedaje</th>
								<th width="5" align="center">Editar</th>
								<th width="5" align="center">Eliminar</th>
							  </tr>
							  <?php
							  /*Se define una variable con un color determinado para cambiar los colores de las filas de la tabla*/
							  $color='#DBF1F7';
							  
							  /*Se hace la instancia del objeto de la fachada*/
							  $mostrarItinerario = new fachadaItinerarioConferencista();
							  $registro = $mostrarItinerario->mostrarItinerario();
							  
							  /*Se realiza un ciclo para llenar la tabla de la consulta de los proveedores*/
							  for ($i=0;$i<count($registro);$i++) {
							  
							  /*Condicional para que las filas de la tabla tengan dos colores*/
							  $color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
							  ?>
							  <tr bgcolor="<?php echo $color ?>">
								<td align="center"><?php echo $registro[$i]['nombre']; ?></td>
								<td align="center"><?php echo $registro[$i]['medio_transporte']; ?></td>
								<td align="center"><?php echo $registro[$i]['lugar_hospedaje']; ?></td>
								<?php if ($registro[$i]['duracion_hospedaje'] == 1) { ?>
									<td align="center"><?php echo $registro[$i]['duracion_hospedaje'].' d&iacute;a'; ?></td>
								<?php } else { ?>
									<td align="center"><?php echo $registro[$i]['duracion_hospedaje'].' d&iacute;as'; ?></td>
								<?php } ?>
								<td align="center"><a href="editarItinerario.php?id_itinerario=<?php echo $registro[$i]['id_itinerario']; ?>&id_persona=<?php echo $registro[$i]['id_persona']; ?>&medio_transporte=<?php echo $registro[$i]['medio_transporte']; ?>&duracion_hospedaje=<?php echo $registro[$i]['duracion_hospedaje']; ?>" title="Editar itinerario del conferencista"><img src="../imagenes/editar.png" alt="editar itinerario" width="25" height="25"/></a></td>
								<td align="center"><a href="#" onclick="borrarItinerarioConferencista(<?php echo $registro[$i]['id_itinerario']; ?>);" title="Borrar itinerario"><img src="../imagenes/borrar.png" alt="borrar itinerario" width="25" height="25"/></a></td>
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
										echo "En este momento no hay ning&uacute;n itinerario registrado";
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
