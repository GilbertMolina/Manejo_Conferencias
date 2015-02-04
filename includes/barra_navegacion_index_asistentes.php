<?php
session_start();
?>
<div class="menu">
	<ul>
		<li><a href="index.php" target="_self" >Inicio</a></li>
        <li><a href="charlas/informacionCharlas.php" target="_self" >Charlas disponibles</a></li>
		<li><a href="charlas/itinerarioAsistente.php" target="_self" >Mi itinerario</a></li>
		<?php
		if(isset($_SESSION['nombre'])) {
			$nombre=$_SESSION['nombre'];
			echo "<li><a href='' target='_self' >".$nombre."</a>
					  <ul>		
						  <li><a href='../includes/cerrar_sesion.php' target='_self'>Cerrar sesi&oacuten</a></li>
					  </ul>
				  </li>";
		}
		?>
	</ul>
</div>
