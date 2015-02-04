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
		<title>Charlas disponibles</title>
		<link rel="stylesheet" type="text/css" href="../../css/charlas/styles_charlas.css" />
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
					Charlas disponibles
				</div>
				<br>
				<form id="asistirCharlas" action="asistirCharlas.php" method="get" name="asistirCharlas" >
					<fieldset>
						<legend>Lista de charlas disponibles</legend>
						<?php
						listaDatos();
						?>
						<input id="enviar" type="button" value="Volver a consultar">
					</fieldset>
				</form>
			</div>
		</div>
		<div class="footer">
			<p>Registrix - Maximum Intelligence &copy;</p>
		</div>
	</body>
</html>