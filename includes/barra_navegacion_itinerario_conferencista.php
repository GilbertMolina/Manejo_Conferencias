<?php
session_start();
?>
<div class="menu">
	<ul>
		<li><a href="../inicio.php" target="_self" >Inicio</a></li>
		<li><a href="../proveedores/mostrarProveedor.php" target="_self" >Proveedores</a></li>
		<li><a href="../ordenesDePago/mostrarOrdenesDePago.php" target="_self" >Ordenes de Pago</a>
			<ul>
				<li><a href="../ordenesDePago/mostrarOrdenesDePago.php" target="_self">Mostrar</a></li>
				<li><a href="../ordenesDePago/descargarOrdenesDePago.php" target="_self">Imprimir</a></li>
			</ul>
		</li>
		<li><a href="../presupuesto/consulta.php" target="_self" >Presupuestos</a></li>
		<li><a href="../gastosConferencia/mostrarGastosConferencia.php" target="_self" >Gastos de Conferencia</a></li>
		<li><a href="../gastosConferencista/mostrarGastosConferencista.php" target="_self" >Gastos de Conferencista</a></li>
		<li><a href="../RegistrarGastosCharla/mostrarGastosCharla.php" target="_self" >Gastos de Charla</a></li>
		<li><a href="mostrarItinerario.php" target="_self" >Itinerario</a></li>
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
