<?php
require_once '../includes/conexion.php';
require_once '../includes/fachada_moviles.php';
require_once '../includes/funciones_moviles.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Charlas disponibles</title>
		<link rel="shortcut icon" href="../imagenes/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="jquerymobile/jquery.mobile-1.0.min.css">
		<script type="text/javascript" src="jquerymobile/jquery-1.6.4.min.js"></script>
		<script type="text/javascript" src="jquerymobile/jquery.mobile-1.0.min.js"></script>
	</head>
	<body>
		<?php
			include '../includes/barra_navegacion_moviles.php';
		?>
		<center><h3>Charlas disponibles</h3></center>
		<hr>
		<center><img class="imagen_registrix" src="../imagenes/registrix.png" alt="imagen de registrix" width="220" height="100"/></center>
		<br>
		<?php
			listaDatos();
		?>
		<!--Footer-->
		<div data-role="footer" data-theme="e" data-position="fixed">
			<h1>Registrix - Maximum Intelligence &copy;</h1>
		</div>
		<!--Fin del Footer-->
	</body>
</html>
