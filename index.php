<?php
	include 'includes'.DIRECTORY_SEPARATOR.'barra_navegacion_index.php';
	include 'includes'.DIRECTORY_SEPARATOR.'imagen_registrix_index.php';
	require_once("includes/conexion.php");
	require_once("includes/validar_usuario.php");
	require_once("includes/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<link rel="shortcut icon" href="imagenes/favicon.ico">
		<title>Iniciar sesi&oacute;n</title>
		<link rel="stylesheet" type="text/css" href="css/styles_index.css" />
	</head>
	<body>
	<?php
	verificar();
	?>
		<div class="wrapper">
			<div id="wrap">
				<form id="login_de_usuario" name="login_de_usuario" method="post" action="index.php" onsubmit="">
					<fieldset>
					<div id="ingrese_sus_datos">
						<legend>Ingrese sus datos</legend>
					</div>
							<table>
								<tr>
									<td>
									<br />
										<b>Correo:</b>
									</td>
									<td>
									<br />
										<input id="email" type="text" name="email" size="40" maxlength="40" />
									</td>			
								</tr>
								<tr>
									<td>
									<br />
										<b>Contrase&ntilde;a:</b>
									</td>
									<td>
									<br />
										<input id="contrasena" type="password" name="contrasena" size="10" maxlength="10" />
									</td>			
								</tr>
								<tr>
									<td colspan=2>
										<center><?php validarUsuarios(); ?></center>
									</td>
								</tr>
								<tr>
									<td>
									<br />
									</td>
									<td>
									<br />
										<input id="cancelar" type="reset" value="Cancelar"/>
										<input id="ingresar" type="submit" value="Iniciar sesi&oacute;n"/>
									<br />
									</td>
								</tr>
								<tr>
									<td colspan=2>
									<br />
										<a id="registrar_nuevo" href="MI_asistentes/registroAsistentes/registroAsistentes.php">&iquest;No posee una cuenta? </a>
									<br />
									</td>
								</tr>
							</table>
					</fieldset>
					<img class="index_html5" src="imagenes/html5.png" alt="imagen de html5" width="55" height="70"/>
					<img class="index_php" src="imagenes/php.png" alt="imagen de php" width="90" height="70"/>
					<img class="index_mysql" src="imagenes/mysql.png" alt="imagen de mysql" width="100" height="70"/>
					<img class="index_css" src="imagenes/css.png" alt="imagen de css" width="60" height="70"/>
				</form>
			</div>
		</div>
		<div class="footer">
			<p>Registrix - Maximum Intelligence &copy;</p>
		</div>
	</body>
</html>
