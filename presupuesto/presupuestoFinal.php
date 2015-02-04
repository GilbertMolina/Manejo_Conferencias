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
						<legend id='principal'>Presupuesto</legend>

						<?php
switch($_SESSION['busqueda'])
{
	case 1:
		echo "<div id='descripcionGasto'>
		La siguiente tabla muestra el presupuesto para la charla. Este valor est&aacute; compuesto &uacute;nicamente por los gastos relacionados con la charla.</div>";
	break;
	case 2:
		echo "<div id='descripcionGasto'>
		La siguiente tabla muestra el presupuesto para la conferencia. Este valor est&aacute; compuesto por los gastos relacionados con las charlas de esta conferencia
		y los gastos de la conferencia.</div>";
	break;
	case 3:
		echo "<div id='descripcionGasto'>
		La siguiente tabla muestra el presupuesto para el conferencista. Este valor est&aacute; compuesto &uacute;nicamente por los gastos relacionados con este conferencista.</div>";
	break;
}
						mostrarPresupuesto();
						?>
						<br />
						<a href="muestraPresupuestos.php"><input id="enviar" type="button" value="Atr&aacute;s"></a>
					</fieldset>
					
				</form>
			</div>
		</div>
		<div class="footer">
			<p>Registrix - Maximum Intelligence &copy;</p>
		</div>
	</body>
</html>
