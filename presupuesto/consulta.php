<?php
/*Se incluyen los archivos necesarios:
conexion.php: contiene las variables para conectarse a la BD.
fachadaUno.php: contiene varias funciones necesarias para mi pantalla.
funciones.php: contiene la función que utiliza a la fachada para realizar la
lógica de la página.
*/
?>
<html>
	<head>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<title>Consulta de Presupuestos</title>
		<link rel="stylesheet" type="text/css" href="../css/presupuesto/styles_presupuestos.css" />
		<script type="text/javascript" src="../js/scripts.js"></script>	
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix y el footer*/
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_presupuestos.php';
		include '..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix.php';
		require_once '../includes/conexion.php';
		require_once '../includes/fachadaUno.php';
		require_once '../includes/funciones.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Consulta de presupuestos
				</div>
				<br>
				<form id="busqueda_presupuesto" action="consulta.php" method="post" name="busqueda_presupuesto" >
					<fieldset>
						<legend id='principal'>B&uacute;squeda</legend>
							<table>
								<tr>
									<td>
									<br />
										Desea buscar el presupuesto por:
									</td>
									<td colspan="3">
									<br />
										<select id="busqueda" name="busqueda" onchange="enviarFormulario()" >
											<option value="0">--Elija una opci&oacute;n</option>
											<option value="1">Charla</option>
											<option value="2">Conferencia</option>
											<option value="3">Conferencista</option>
										</select>
									</td>
								</tr>
							</table>
								<?php
								//Función que realiza la lógica
								if ($_POST)
								{
									$_SESSION['busqueda']=$_POST['busqueda'];
									header("Location: muestraPresupuestos.php");
								}
								?>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="footer">
			<p>Registrix - Maximum Intelligence &copy;</p>
		</div>
	</body>
</html>
