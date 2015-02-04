<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../../includes/fachadaCharlasDelAsistente.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../../imagenes/favicon.ico">
		<title>Mi itinerario</title>
		<link rel="stylesheet" type="text/css" href="../../css/charlas/styles_charlasAsistente.css" />
		<script type="text/javascript" src="../../js/scripts.js"></script>
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix*/
		include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_charlas.php';
		include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix_asistentes.php';
		/*Se almacena el id de la session en la variable "$idAsistente"*/
		$idAsistente = $_SESSION['id'];
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Charlas del Asistente
				</div>
				<br>
				<form id="mostrarCharlasDelAsistente" name="mostrarCharlasDelAsistente" method="post" action="itinerarioAsistente.php">
					<fieldset>
						<legend>Charlas a las que va a asistir</legend>
						<div id="descargarItinerario">Descargar su itinerario</div>
						<?php
						/*Se envia el id de la persona y se hace la instancia del objeto de la fachada*/
						$charlasDelAsistente = new fachadaCharlasDelAsistente();
						$mostrarCharlas = $charlasDelAsistente->mostrarCharlasDelAsistente($idAsistente);
						for ($i=0; $i<count($mostrarCharlas); $i++){}
						
						if ($i==0){ ?>
							<a title="No hay ninguna charla en su itinerario"><img align="right" src="../../imagenes/no_imprimir.png" alt="descargar lista de charlas" width="35" height="35"/></a>
						<?php }else{ ?>
							<a href="DescargarItinerarioAsistente.php?id_persona=<?php echo $idAsistente; ?>" title="Descargar la lista de las charlas a las cuales va a asistir"><img align="right" src="../../imagenes/imprimir.png" alt="descargar lista de charlas" width="35" height="35"/></a>
						<?php } ?>
						<table width="400" cellpadding="6">
							<?php echo "<br>"; ?>
							<tr>
								<th width="395" align="center">Nombre charla</th>
								<th width="5" align="center">Cancelar</th>
							</tr>
							<?php
							/*Se define una variable con un color determinado para cambiar los colores de las filas de la tabla*/
							$color='#DBF1F7';
							  
							/*Se realiza un ciclo para llenar la tabla de la consulta de las charlas del asistentes*/
							for ($i=0; $i<count($mostrarCharlas); $i++){
							
							/*Condicional para que las filas de la tabla tengan dos colores*/
							$color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
							?>
							<tr bgcolor="<?php echo $color ?>">
								<td align="center"><?php echo $mostrarCharlas[$i]['Charla']; ?></td>
								<td align="center"><a href="#" onclick="cancelarAsistenciaCharla(<?php echo $mostrarCharlas[$i]['idPersona'].",".$mostrarCharlas[$i]['idCharla']; ?>)" title="Cancelar asistencia a la charla" ><img src="../../imagenes/borrar.png" alt="cancelar asistencia a la charla" width="25" height="25"/></a></td>
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
										echo "En este momento no hay ninguna charla en su itinerario";
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
