<?php
	/*
	Función que valida si se ha enviado el formulario
	mediante POST.
	Además, crea una instancia de la fachada
	*/
	function mostrarPresupuesto()
	{
		
			//Asigna los valores del formulario a variables locales
			$busqueda=$_SESSION['busqueda'];
			$codigo=$_GET['codigo'];

			//Crea la instancia de la fachadaUno y la guarda en una variable(objeto)
			$oBaseDatos=new fachadaUno();
			
			/*Utiliza la función consultaPresupuesto que le pertenece
			al objeto que se creó anteriormente y realiza toda la lógica del
			sistema de presupuestos
			*/
			$oBaseDatos->consultaPresupuesto($codigo, $busqueda);
	}

	/*
	Función que muestra la lista de charlas, conferencias o conferencistas
	de las cuales se pueden mostrar los presupuestos.
	*/

	function listaDatos()
	{
		//Se crea el objeto de la fachadaUno
		$oFachadaLista=new fachadaUno();
		
		//Se llama a la función que muestra la lista de datos
		$oFachadaLista->muestraLista();
	}

	function validarUsuarios()
	{
		$oFachadaUsuarios=new validaUsuario();
		$oFachadaUsuarios->validar();
		
	}
	
	function verificar()
	{
		$usuario = $_SERVER['HTTP_USER_AGENT'];

		$usuarios_moviles = array ('Android','iPhone', 'iPod', 'iPad', 'AvantGo', 'BlackBerry', 'Blazer', 'Opera Mini', 'Cellphone', 'Danger', 'DoCoMo', 'EPOC', 'EudoraWeb', 'Handspring', 'HTC', 'Kyocera', 'LG', 'MMP', 'Mot', 'Motorola', 'NetFront', 'Newt', 'Nokia', 'Palm', 'PalmOS', 'PlayStation Portable', 'PSP', 'ProxiNet', 'Samsung', 'Small', 'Smartphone', 'SonyEricsson', 'Symbian','SymbOS', 'SymbianOS', 'WAP', 'webOS', 'hiptop','portalmmm', 'Elaine', 'OPWV');

		$movil=false;
		$salir=false;
		
		$i = 0;
		
		$cant=count($usuarios_moviles); 
 
 
		while($salir!=true && $i<$cant)
		{
			$usuario= $usuarios_moviles[$i];

			if(strpos($_SERVER['HTTP_USER_AGENT'], $usuario) == TRUE)
			{
				$movil=true;
				$salir=true;
			}
			else
			{
				$movil=false;
				$salir=false;
			}
			++$i;
		}
		if ($movil == TRUE) 
		{
			header('Location: frontend/index.php');
		}
	}
?>
