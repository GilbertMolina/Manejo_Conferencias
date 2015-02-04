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
				<form id="presupuesto" action="muestraPresupuestos.php" method="get" name="presupuesto" >
					<fieldset>
						<legend>Lista de opciones</legend>

								<?php
								listaDatos();
								?>
								<br />
					<a href="consulta.php"><input id="enviar" type="button" value="Atr&aacute;s"></a>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="footer">
			<p>Registrix - Maximum Intelligence &copy;</p>
		</div>
	</body>
</html>
