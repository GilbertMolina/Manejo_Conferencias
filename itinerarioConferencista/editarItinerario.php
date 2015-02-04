<?php
/*Se importa el archivo de la fachada del itinerario del conferencista*/
require_once("../includes/fachadaItinerarioConferencista.php");

/*Se hace la instancia del objeto de la fachada*/
$editarItinerario = new fachadaItinerarioConferencista();

/*Se verifica que venga "editar" en el post y entra a la condicion*/
if (isset($_POST["editar"]) and $_POST["editar"]=="si") {
	$editarItinerario->editarItinerario($_POST['transporte'], $_POST['lugar_de_hospedaje'], $_POST['duracion_de_hospedaje'], $_POST['id_persona'], $_POST['id_itinerario']);
	exit;
}

/*Se le pasa el id del itinerario a la fachada para que se efectue la actualización*/
$actualizarItinerario = $editarItinerario->mostrarItinerarioPorId($_GET['id_itinerario']);

/*Se optiene el id de la persona, el transporte y la duracion del hospedaje*/
$id_persona_select = $_GET["id_persona"];
$transporte = $_GET["medio_transporte"];
$duracion_hospedaje = $_GET["duracion_hospedaje"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	    <link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Editar Itinerario</title>
		<link rel="stylesheet" type="text/css" href="../css/itinerarioConferencista/styles_edit.css" />
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
					Editar itinerario de conferencista
				</div>
				<br>
				<form id="registro_de_itinerario" name="registro_de_itinerario" method="post" action="editarItinerario.php" onsubmit="return validarItinerario()">
					<fieldset>
						<legend>Editar itinerario</legend>
							<table>
								<tr>
									<td>
									<br />
										Nombre:
									</td>
									<td>
									<br />
										<select id="id_persona" name="id_persona">
											<option value="0">--Seleccione un conferencista</option>
											<?php
											$sqlConsulta = "SELECT p.id_persona, concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'nombre', pnp.id_nivel_persona 
															FROM tpersona p, tpersona_tnivel_persona pnp
															WHERE p.id_persona=pnp.id_persona 
															AND pnp.id_nivel_persona=1 ";
											$resConsulta = mysql_query($sqlConsulta, ConectarMySQL::conexion());
											while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
												$id_persona=$rowConsulta['id_persona'];
												$nombre=$rowConsulta['nombre'];
											?>
											<option value="<?php echo $id_persona ?>" <?php if($id_persona_select==$id_persona){ echo "selected='selected' ";} ?>><?php echo $nombre ?></option>
											<?php } ?>
										</select>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Transporte:
									</td>
									<td>
									<br />
										<select id="transporte" name="transporte">
											<option value="0">--Seleccione el medio de transporte</option>
											<option value="Autobus" <?php if($transporte=="Autobus"){ echo "selected";} ?>>Autobus</option>
											<option value="Avi&oacute;n" <?php if($transporte=="Avión"){ echo "selected";} ?>>Avi&oacute;n</option>
											<option value="Tren" <?php if($transporte=="Tren"){ echo "selected";} ?>>Tren</option>
											<option value="Autom&oacute;vil" <?php if($transporte=="Automóvil"){ echo "selected";} ?>>Autom&oacute;vil</option>
											<option value="Otro" <?php if($transporte=="Otro"){ echo "selected";} ?>>Otro</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
									<br />
										Lugar de hospedaje:
									</td>
									<td>
									<br />
										<input id="lugar_de_hospedaje" name="lugar_de_hospedaje" type="text" size="50" maxlength="50" value="<?php echo $actualizarItinerario[0]["lugar_hospedaje"]; ?>" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										Duraci&oacute;n de hospedaje en d&iacute;as:
									</td>
									<td> 
									<br />
										<select id="duracion_de_hospedaje" name="duracion_de_hospedaje">
											<option value="0">--Seleccione la duraci&oacute;n del hospedaje</option>
											<option value="1" <?php if($duracion_hospedaje==1){ echo "selected";} ?>>1</option>
											<option value="2" <?php if($duracion_hospedaje==2){ echo "selected";} ?>>2</option>
											<option value="3" <?php if($duracion_hospedaje==3){ echo "selected";} ?>>3</option>
											<option value="4" <?php if($duracion_hospedaje==4){ echo "selected";} ?>>4</option>
											<option value="5" <?php if($duracion_hospedaje==5){ echo "selected";} ?>>5</option>
											<option value="6" <?php if($duracion_hospedaje==6){ echo "selected";} ?>>6</option>
											<option value="7" <?php if($duracion_hospedaje==7){ echo "selected";} ?>>7</option>
											<option value="8" <?php if($duracion_hospedaje==8){ echo "selected";} ?>>8</option>
											<option value="9" <?php if($duracion_hospedaje==9){ echo "selected";} ?>>9</option>
											<option value="10" <?php if($duracion_hospedaje==10){ echo "selected";} ?>>10</option>
											<option value="11" <?php if($duracion_hospedaje==11){ echo "selected";} ?>>11</option>
											<option value="12" <?php if($duracion_hospedaje==12){ echo "selected";} ?>>12</option>
											<option value="13" <?php if($duracion_hospedaje==13){ echo "selected";} ?>>13</option>
											<option value="14" <?php if($duracion_hospedaje==14){ echo "selected";} ?>>14</option>
											<option value="15" <?php if($duracion_hospedaje==15){ echo "selected";} ?>>15</option>
											<option value="16" <?php if($duracion_hospedaje==16){ echo "selected";} ?>>16</option>
											<option value="17" <?php if($duracion_hospedaje==17){ echo "selected";} ?>>17</option>
											<option value="18" <?php if($duracion_hospedaje==18){ echo "selected";} ?>>18</option>
											<option value="19" <?php if($duracion_hospedaje==19){ echo "selected";} ?>>19</option>
											<option value="20" <?php if($duracion_hospedaje==20){ echo "selected";} ?>>20</option>
											<option value="21" <?php if($duracion_hospedaje==21){ echo "selected";} ?>>21</option>
											<option value="22" <?php if($duracion_hospedaje==22){ echo "selected";} ?>>22</option>
											<option value="23" <?php if($duracion_hospedaje==23){ echo "selected";} ?>>23</option>
											<option value="24" <?php if($duracion_hospedaje==24){ echo "selected";} ?>>24</option>
											<option value="25" <?php if($duracion_hospedaje==25){ echo "selected";} ?>>25</option>
											<option value="26" <?php if($duracion_hospedaje==26){ echo "selected";} ?>>26</option>
											<option value="27" <?php if($duracion_hospedaje==27){ echo "selected";} ?>>27</option>
											<option value="28" <?php if($duracion_hospedaje==28){ echo "selected";} ?>>28</option>
											<option value="29" <?php if($duracion_hospedaje==29){ echo "selected";} ?>>29</option>
											<option value="30" <?php if($duracion_hospedaje==30){ echo "selected";} ?>>30</option>
											<option value="31" <?php if($duracion_hospedaje==31){ echo "selected";} ?>>31</option>
										</select>
									</td>			
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" name="volver" type="button" value="Atr&aacute;s" onclick="volverMostrarItinerario()"/>
										<input id="enviar" name="enviar" type="submit" value="Guardar" />
										<input name="editar" type="hidden" value="si" />
										<input id="id_itinerario" name="id_itinerario" type="hidden" value="<?php echo $_GET["id_itinerario"]; ?>" />
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
