<?php
/*Se importa el archivo de la fachada del itinerario del conferencista*/
require_once("../includes/fachadaItinerarioConferencista.php");

if ($_POST) {
    /*Se hace la instancia del objeto de la fachada*/
    $registrarItinerario = new fachadaItinerarioConferencista();

    /*Se le pasan los parametros a la fachada*/
    $registrarItinerario->registroItinerario($_POST["id_persona"], $_POST["transporte"], $_POST["lugar_de_hospedaje"], $_POST["duracion_de_hospedaje"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	    <link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Registrar de Itinerario</title>
		<link rel="stylesheet" type="text/css" href="../css/itinerarioConferencista/styles.css" />
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
					Registrar itinerario
				</div>
				<br>
				<form id="registro_de_itinerario" name="registro_de_itinerario" method="post" action="registroItinerario.php" onsubmit="return validarItinerario()">
					<fieldset>
						<legend>Registrar itinerario de conferencista</legend>
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
											$sqlConsulta = "SELECT p.id_persona, concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'Nombre' 
											                FROM tpersona p, tpersona_tnivel_persona tp, tnivel_persona n 
											                WHERE p.id_persona=tp.id_persona
											                AND tp.id_nivel_persona=1 
											                AND n.id_nivel_persona=tp.id_nivel_persona 
											                GROUP BY p.id_persona ";
											$resConsulta = mysql_query($sqlConsulta, ConectarMySQL::conexion());
											while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
												$id_persona=$rowConsulta['id_persona'];
												$nombre=$rowConsulta['Nombre'];
											?>
											<option value="<?php echo $id_persona ?>"><?php echo $nombre ?></option>
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
											<option value="Autobus">Autobus</option>
											<option value="Avi&oacute;n">Avi&oacute;n</option>
											<option value="Tren">Tren</option>
											<option value="Autom&oacute;vil">Autom&oacute;vil</option>
											<option value="Otro">Otro</option>
										</select>
									<br />
									</td>
								</tr>
								<tr>
									<td>
									<br />
										Lugar de hospedaje:
									</td>
									<td>
									<br />
										<input id="lugar_de_hospedaje" name="lugar_de_hospedaje" type="text" size="50" maxlength="50" />
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
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="volver" name="volver" type="button" value="Atr&aacute;s" onclick="volverMostrarItinerario()" />
										<input id="enviar" name="enviar" type="submit" value="Guardar" />
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