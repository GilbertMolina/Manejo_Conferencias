<?php
/*Se importa el archivo de la fachada de los gastos de las conferencias*/
require_once("../includes/fachadaGastosConferencia.php");
				
/*Se hace la instancia del objeto de la fachada*/
$editarGastoConferencia = new fachadaGastosConferencia();

/*Se verifica que venga "editar" en el post y entra a la condicion*/
if (isset($_POST["editar"]) and $_POST["editar"]=="si") {
	$editarGastoConferencia->editarGastosConferencia($_POST["nombre_tipo_gasto"], $_POST["descripcion_tipo_gasto"], $_POST["costo_del_gasto"], $_POST["esta_aprobado"], $_POST["id_gasto"], $_POST["id_conferencia"], $_POST["id_tipo_gasto"]);
	exit;
}

/*Se optiene el id del gasto que se quiere modificar*/
$actualizarGastosConferencia = $editarGastoConferencia->mostrarGastosPorId($_GET['idgasto']);

$idconferencia = $_GET['idconferencia'];
$sqlConferencia = "SELECT id_conferencia, titulo_conferencia 
				   FROM tconferencia";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Editar Gastos</title>
		<link rel="stylesheet" type="text/css" href="../css/gastosConferencia/styles_edit.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
			include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_gastosConferencia.php';
			include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Editar Gastos
				</div>
				<br>
				<form id="gastos_conferencia" name="gastos_conferencia" method="post" action="editarGastosConferencia.php" onsubmit="return validarRegistroGastosConferencia()">
			<fieldset>
				<legend>Editar gasto de la conferencia</legend>
					<table>
						<tr>
							<td>
							<br />
								Nombre de la conferencia:
							</td>
							<td>
							<br />
							<select name="id_conferencia" name="id_conferencia">
								<option value="0">--Seleccione una conferencia</option>
                                <?php
								$resConsulta = mysql_query($sqlConferencia, ConectarMySQL::conexion());
								while ($rowConsulta=mysql_fetch_assoc($resConsulta)) {
									$conferencia=$rowConsulta['id_conferencia'];
									$titulo=$rowConsulta['titulo_conferencia'];
								?>
								<option value="<?php echo $conferencia ?>" <?php if($idconferencia==$conferencia){ echo "selected='selected' ";} ?>><?php echo $titulo ?></option>
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
								<input id="nombre_tipo_gasto" type="text" name="nombre_tipo_gasto" size="28" maxlength="28" value="<?php echo $actualizarGastosConferencia[0]["nombre_tipo_gasto"]; ?>" />
							</td>			
						</tr>
						<tr>
							<td>
							<br />
								 Descripci&oacute;n del gasto:
							</td>
							<td>
							<br />
								<textarea id="descripcion_tipo_gasto" name="descripcion_tipo_gasto" cols="23" rows="3"><?php echo $actualizarGastosConferencia[0]["descripcion_tipo_gasto"];  ?></textarea>
							<br />
							</td>
						</tr>
						<tr>
							<td>
							<br />
								Costo del gasto:
							</td>
							<td>
							<br />
								<input id="costo_del_gasto" type="text" name="costo_del_gasto" size="28" maxlength="28" value="<?php echo $actualizarGastosConferencia[0]["costo"]; ?>"/>
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
								if($actualizarGastosConferencia[0]["esta_aprobado"] == "1"){  ?>
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
								<input id="volver" type="button" value="Atr&aacute;s" onClick="volverMostrarGastosConferencia();">
								<input id="enviar" type="submit" value="Guardar"/>
								<input name="editar" type="hidden" value="si"/>
								<input type="hidden" id="id_gasto" name="id_gasto" value="<?php echo $_GET["idgasto"]; ?>" />
								<input type="hidden" id="id_tipo_gasto" name="id_tipo_gasto" value="<?php echo $_GET["idtipogasto"]; ?>" />
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