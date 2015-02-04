<?php
/*Se importa el archivo de la fachada de los gastos de las conferencista*/
require_once("../includes/fachadaGastosConferencista.php");

/*Se hace la instancia del objeto de la fachada*/
$editarGastoConferencista = new fachadaGastosConferencista();

/*Se verifica que venga "editar" en el post y entra a la condicion*/
if (isset($_POST["editar"]) and $_POST["editar"]=="si") {
	$editarGastoConferencista->editarGastosConferencista($_POST["nombre_tipo_gasto"], $_POST["descripcion_tipo_gasto"], $_POST["costo_del_gasto"], 
														 $_POST["esta_aprobado"], $_POST["id_gasto"], $_POST["id_persona"], $_POST["id_tipo_gasto"] );
	exit;
}
/*Se optiene el id del gasto que se quiere modificar*/
$actualizarGastosConferencista = $editarGastoConferencista->mostrarGastosParaEditar($_GET['id_gasto']);

$id_persona = $_GET['id_persona'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Editar Gastos</title>
		<link rel="stylesheet" type="text/css" href="../css/registrarGastosConferencista/styles_edit.css" />
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
					Editar gastos de los Conferencistas
				</div>
				<br>
				<form id="gastos_conferencista" name="gastos_conferencista" method="post" action="editarGastosConferencista.php" onsubmit="return validarRegistroGastosConferencista()">
					<fieldset>
						<legend>Editar gastos</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre del Conferencista:
									</td>
									<td>
									<br />
										<select name="id_persona" name="id_persona">
											<option value="0">--Seleccione un conferencista</option>
											<?php
											$sqlConferencista = "SELECT p.id_persona, concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'nombre'
																 FROM tpersona p, tpersona_tnivel_persona tp, tnivel_persona n
																 WHERE p.id_persona=tp.id_persona 
																 AND tp.id_nivel_persona=1
																 AND n.id_nivel_persona=tp.id_nivel_persona
																 GROUP BY p.id_persona";
											$resConsulta = mysql_query($sqlConferencista, ConectarMySQL::conexion());
											while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
												$id=$rowConsulta['id_persona'];
												$nombre=$rowConsulta['nombre'];
											?>
											<option value="<?php echo $id ?>" <?php if($id_persona==$id){ echo "selected='selected' ";} ?>><?php echo $nombre ?></option>
											<?php } ?>
										</select>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Nombre del gasto:
									</td>
									<td>
									<br />
										<input id="nombre_tipo_gasto" type="text" name="nombre_tipo_gasto" size="28" maxlength="28" value="<?php echo $actualizarGastosConferencista[0]["Tipo"]; ?>" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Costo del gasto:
									</td>
									<td>
									<br />
									<input id="costo_del_gasto" type="text" name="costo_del_gasto" size="28" maxlength="28" value="<?php echo $actualizarGastosConferencista[0]["costo"]; ?>"/>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										 Descripci&oacute;n del gasto:
									</td>
									<td>
									<br />
										<textarea id="descripcion_tipo_gasto" name="descripcion_tipo_gasto" cols="23" rows="3"><?php echo $actualizarGastosConferencista[0]["descripcion"]; ?></textarea>
									<br />
									</td>
								</tr>
								<tr>
									<td>
									<br />
										Esta aprobado:
									</td>
									<td>
									<br />
										<?php
											if($actualizarGastosConferencista[0]["esta_aprobado"] == "1"){  ?>
												<input id="esta_aprobado" name="esta_aprobado" type="radio" value="1" checked> S&iacute; <br/>
												<input id="esta_aprobado" name="esta_aprobado" type="radio" value="0"> No <br/>
										<?php } else { ?>
												<input id="esta_aprobado" name="esta_aprobado" type="radio" value="1"> S&iacute; <br/>
												<input id="esta_aprobado" name="esta_aprobado" type="radio" value="0" checked> No <br/>
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" type="button" value="Atr&aacute;s" onClick="volverMostrarGastosConferencista();">
										<input name="editar" type="hidden" value="si"/>
										<input id="enviar" type="submit" value="Guardar"/>
										<input type="hidden" id="id_gasto" name="id_gasto" value="<?php echo $_GET['id_gasto']; ?>" />
										<input type="hidden" id="id_tipo_gasto" name="id_tipo_gasto" value="<?php echo $_GET["idtipogasto"]; ?>" />
									<br />
									</td>
								</tr>
							</table>
					</fieldset>
				</form>
					<div id="registro">
						<table>
							<tr>
								<td>
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
