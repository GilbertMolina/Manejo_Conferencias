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
	<link rel="shortcut icon" href="../../imagenes/favicon.ico">
		<title>Consulta de Charlas</title>
		<link rel="stylesheet" type="text/css" href="../../css/charlas/styles_asistir.css" />
		<script type="text/javascript" src="../../js/scripts.js"></script>
	</head>
	<body>
		<?php
		/*Se incluye la barra de navegacion, la imagen de registrix*/
		include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_charlas.php';
		include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'imagen_registrix_asistentes.php';
		require_once '../../includes/conexion.php';
		require_once '../../includes/fachadaAsistir.php';
		require_once '../../includes/funciones_asistentes.php';
		?>
		<div class="wrapper">
			<div id="wrap">
				<div id="titulo">
					Charlas
				</div>
				<br />
				<form id="asistirCharla" action="asistirCharla.php" method="post" name="asistirCharla" >
					<fieldset>
						<legend>Asistencia a la charlas</legend>
						<?php
						asistirCharlas();
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