<?php
require_once '../includes/conexion.php';
require_once '../includes/fachada_moviles_conferencistas.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Informaci&oacute;n de conferencista</title>
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
		<?php
		/*Se valora si se recibio un id entonces que muestre esta pantalla*/
		if ($_GET) {
		?>
			<center><h3>Informaci&oacute;n del conferencista</h3></center>
            <hr>
			<center><img class="imagen_registrix" src="../imagenes/registrix.png" alt="imagen de registrix" width="220" height="100"/></center>
            <br>
            <div data-role='collapsible-set'>
                <?php
                $mostrarConferencistaPorId = new fachadaConferencista();
                $registro = $mostrarConferencistaPorId->mostrarListaConferencistasPorId($_GET['id_conferencista']);
                for ($i=0; $i<count($registro); $i++) {
                ?>
                    <div data-role='collapsible' data-collapsed='false' data-theme='a' data-content-theme="c">
                        <h3>Conferencista: <?php echo $registro[$i]['Nombre']; ?></h3>
                        <ul data-role='listview' data-inset='true' data-theme='d'>
                            <li>
                                <p>&nbsp;</p>
                                <p class='ui-li-aside'>
                                <p><h2><b>Datos del conferencista:</b></h2></p>
                                <p class='ui-li-aside'>
                                <p><h2><?php echo "<b>Pa&iacute;s:</b> ".$registro[$i]['Pais']; ?></h2></p>
                                <p class='ui-li-aside'>
                                <p><h2><?php echo "<b>Profesi&oacute;n:</b> ".$registro[$i]['Profesion']; ?></h2></p>
                                <p class='ui-li-aside'>
                                <p><h2><?php echo "<b>Email:</b> ".$registro[$i]['Correo']; ?></h2></p>
                            </li>
                        </ul>
                        <br>
                        <div data-role='collapsible' data-collapsed='true' data-theme='b'>
                            <h1>Charlas del conferencista</h1>
							<ul data-role="listview" data-inset="true" data-theme="d">
							<?php
							$mostrarConferencistaPorId = new fachadaConferencista();
							$registroPorId = $mostrarConferencistaPorId->mostrarListaCharlasConferencistasPorId($registro[$i]['id']);
							for($j=0; $j<count($registroPorId); $j++){
							?>
                                <li><a href="info_charla.php?id_charla=<?php echo $registroPorId[$j]['id_charla']; ?>"><p><h2><strong>Charla: <?php echo $registroPorId[$j]['titulo_charla']; ?></strong></h2></p></a></li>
							<?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
		<?php
		/*Se valora si no se recibio ningun id entonces que muestre esta pantalla*/
		} else {
		?>
			<center><h2>Lista de conferencistas</h2></center>
				<hr>
				<center><img class="imagen_registrix" src="../imagenes/registrix.png" alt="imagen de registrix" width="220" height="100"/></center>
				<br>
				<div data-role='collapsible-set'>
					<?php
					$mostrarConferencista = new fachadaConferencista();
					$registro = $mostrarConferencista->mostrarListaConferencistas();
					for ($i=0; $i<count($registro); $i++) {
					?>
						<div data-role='collapsible' data-collapsed='true' data-theme='a' data-content-theme="c">
							<h3>Conferencista: <?php echo $registro[$i]['Nombre']; ?></h3>
							<ul data-role='listview' data-inset='true' data-theme='d'>
								<li>
									<p>&nbsp;</p>
									<p class='ui-li-aside'>
									<p><h2><b>Datos del conferencista:</b></h2></p>
									<p class='ui-li-aside'>
									<p><h2><?php echo "<b>Pa&iacute;s:</b> ".$registro[$i]['Pais']; ?></h2></p>
									<p class='ui-li-aside'>
									<p><h2><?php echo "<b>Profesi&oacute;n:</b> ".$registro[$i]['Profesion']; ?></h2></p>
									<p class='ui-li-aside'>
									<p><h2><?php echo "<b>Email:</b> ".$registro[$i]['Correo']; ?></h2></p>
								</li>
							</ul>
							<br>
							<div data-role='collapsible' data-collapsed='true' data-theme='b'>
								<h1>Charlas del conferencista</h1>
								<ul data-role="listview" data-inset="true" data-theme="d">
								<?php
								$mostrarCharlasConferencistaPorId = new fachadaConferencista();
								$registroPorId = $mostrarCharlasConferencistaPorId->mostrarListaCharlasConferencistasPorId($registro[$i]['id']);
								for($j=0; $j<count($registroPorId); $j++){
								?>
									<li><a href="info_charla.php?id_charla=<?php echo $registroPorId[$j]['id_charla']; ?>"><p><h2><strong>Charla: <?php echo $registroPorId[$j]['titulo_charla']; ?></strong></h2></p></a></li>
								<?php } ?>
								</ul>
							</div>
						</div>
					<?php } ?>
				</div>
		<?php } ?>	
		<!--Footer-->
		<div data-role="footer" data-theme="e" data-position="fixed">
			<h1>Registrix - Maximum Intelligence &copy;</h1>
		</div>
		<!--Fin del Footer-->
	</body>
</html>
