<?php
class fachadaUno{

	/*-------------Función query()---------------------------------*/

	/*Función genérica para realizar consultas
	en la BD.
	Retorna una arreglo asociativo.
	Recibe como parámetro la consulta.
	*/
	public function query($pQuery){
	
		//Se realiza la consulta
    	$oResult = mysql_query($pQuery, ConectarMySQL::conexion());
	   	
		//Arreglo para almacenar el resultado
		$aData=array();
		
		//Se almacenan la cantidad de filas del resultado
		$iFilas=mysql_num_rows($oResult);
		
		if($iFilas>0)
		{
			//Se crea el arreglo asociativo
			while($row = mysql_fetch_array($oResult,MYSQL_ASSOC))
			{
				$aData[]=$row;
			}
			return $aData;
		}	
    }
	
	/*-------------Función consultaPresupuesto()---------------------------------*/
	
	
	/*
	Función para la consulta de presupuestos
	Parámetros: 
		$pCodigo=codigo de charla, conferencista o conferencia elegido(a).
		$pBusqueda=identificador para cada tipo, ya sea charla, conferencista o conferencia.
	*/
	function consultaPresupuesto($pCodigo, $pBusqueda)
	{
	
		/*Variables para almacenar los dos tipos de consulta
		*/
		$consulta ="";
		$consultaDos ="";

		
		//Evalúa el tipo que se eligió en el form y le asigna la consulta a la variable.
		switch($pBusqueda)
		{
			case 1:
			
				//Consulta para los gastos de las charlas
				$consulta="SELECT ch.titulo_charla 'Nombre', sum(g.costo) 'Presupuesto' 
						   FROM tcharla ch, tcharla_tgasto chg, tgasto g
						   WHERE ch.id_charla=$pCodigo
						   AND g.esta_aprobado=1
						   AND ch.id_charla=chg.id_charla
						   AND g.id_gasto=chg.id_gasto ";
				
				//Realiza la consulta
				$aResultado=$this->query($consulta);
				
				
				break;
			case 2:
				
				//Consulta para los gastos de la conferencia
				$consulta="SELECT c.titulo_conferencia 'Nombre', sum(g.costo) 'Presupuesto'
						   FROM tconferencia c, tconferencia_tgasto cg, tgasto g
						   WHERE c.id_conferencia=$pCodigo
						   AND g.esta_aprobado=1
						   AND c.id_conferencia=cg.id_conferencia
						   AND cg.id_gasto=g.id_gasto
						   GROUP by c.id_conferencia;";
				
				//Consulta para los gastos de la conferencia según las charlas que le pertenecen
				$consultaDos="SELECT c.titulo_conferencia 'Nombre', sum(g.costo) 'Presupuesto' 
							  FROM tconferencia c, tcharla ch, tcharla_tgasto chg, tgasto g 
							  WHERE c.id_conferencia=$pCodigo
							  AND c.id_conferencia=ch.id_conferencia 
							  AND g.esta_aprobado=1							
							  AND ch.id_charla=chg.id_charla 
							  AND g.id_gasto=chg.id_gasto
							  GROUP BY c.id_conferencia ";				
				
				//Realiza la primera consulta
				$aResultadoDos=$this->query($consultaDos);
				
				
				//Realiza la segunda consulta
				$aResultado=$this->query($consulta);

				break;
				
			case 3:				

				//Consulta para los gastos del conferencista
				$consulta="SELECT concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'Nombre' , sum(g.costo) 'Presupuesto'
							  FROM tpersona p, tgasto g, tconferencista_tgasto cg
							  WHERE p.id_persona=$pCodigo
							  AND cg.id_persona=p.id_persona
							  AND g.esta_aprobado=1
							  AND g.id_gasto=cg.id_gasto
							  GROUP by p.id_persona";
				
				
				$aResultado=$this->query($consulta);
				$aResultadoDos=NULL;
				break;
		}
		
		
		/*Evalúa el tipo 1=charla, 2=conferencia, 3=conferencista
		para elegir la manera en la que se muestra el prespuesto
		*/
		if($pBusqueda==1)
		{
			
			//Recorre el arreglo y muestra el presupuesto
			foreach ($aResultado as $aValor)
			{
				$nombre=$aValor['Nombre'];
				$presupuesto=$aValor['Presupuesto'];
			}
					
					//Verifica que el arreglo no esté vacío
					if($presupuesto != null)
					{
						$this->muestraArray($aResultado);
					}
					else
					{
						echo "<br />";
						echo "<p align=center>"."No existen presupuestos asociados"."</p>";
					}
		}
		else
		{
			//para la conferencia y conferencistas
			

			//Verifica que el arreglo no esté vacío
			if($aResultadoDos != null)
			{
				//Recorre ambos arreglos para obtener las variables
				foreach ($aResultadoDos as $aValorDos)
				{
					$nombreDos=$aValorDos['Nombre'];
					$presupuestoDos=$aValorDos['Presupuesto'];
				}
					if($aResultado != null)
					{
						foreach ($aResultado as $aValor)
						{
							$nombre=$aValor['Nombre'];
							$presupuesto=$aValor['Presupuesto'];
						}
					}
					else
					{
						$presupuesto=null;
					}

					/*Valida que los campos de los arreglos sean nulos
					y muestra un mensaje, de lo contrario realiza la
					lógica para mostrar el presupuesto
					*/
					if($presupuesto == null && $presupuestoDos == null)
					{
						echo "<br />";
						echo "<p align=center>"."No existen presupuestos asociados"."</p>";
					}
					
					//Si el campo del segundo arreglo es null
					elseif($presupuestoDos == null)
					{
						//Se le asigna un valor de cero para poder sumarlo con el otro
						$presupuestoDos=0;

						$total=$presupuesto+$presupuestoDos;
						
						//Muestra el presupuesto total

						echo "<br />";
						echo "<table>";
						echo "<tr>";
						echo "<th width='80px'>Nombre</th>";
						echo "<th width='80px'>Presupuesto</th>";
						echo "</tr>";
						echo "<tr align=center>";
						echo "<td>".$nombreDos."</td>";
						echo "<td>"."$ ".$total."</td>";
						echo "</tr>";
						echo "</table>";

					}
					//Si el campo del primer arreglo es null
					elseif($presupuesto == null)
					{
						//Se le asigna un valor de cero para poder sumarlo con el otro						
						$presupuesto=0;

						$total=$presupuesto+$presupuestoDos;
						
						//Muestra el presupuesto total

						echo "<br />";
						echo "<table>";
						echo "<tr>";
						echo "<th width='80px'>Nombre</th>";
						echo "<th width='80px'>Presupuesto</th>";
						echo "</tr>";

						echo "<tr align=center>";
						echo "<td>".$nombreDos."</td>";
						echo "<td>"."$ ".$total."</td>";
						echo "</tr>";
						echo "</table>";
					}
					else
					{
						/*Si ninguno de los dos campos es null
						entonces suma ambos valores y muestra
						el presupuesto total
						*/
						$total=$presupuesto+$presupuestoDos;
						echo "<br />";
						echo "<table>";
						echo "<tr>";
						echo "<th width='80px'>Nombre</th>";
						echo "<th width='80px'>Presupuesto</th>";
						echo "</tr>";

						echo "<tr align=center>";
						echo "<td>".$nombreDos."</td>";
						echo "<td>"."$ ".$total."</td>";
						echo "</tr>";
						echo "</table>";
					}
			}
			else
			{
				/*En caso de que el segundo arreglo
				sea null
				*/
				if ($aResultado !=NULL)
				{
					foreach ($aResultado as $aValor)
					{
						$nombre=$aValor['Nombre'];
						$presupuesto=$aValor['Presupuesto'];
					}
			
						/*Si la variable del arreglo
						es null, quiere decir que no
						posee ningún presupuesto asociado
						*/
						if($presupuesto != null)
						{
							//Llama a la función que muestra el resultado
							$this->muestraArray($aResultado);
						}
						else
						{
							echo "<br />";
							echo "<p align=center>"."No existen presupuestos asociados"."</p>";
						}
				}
				else
				{
					echo "<br />";
					echo "<p align=center>"."No existen presupuestos asociados"."</p>";
				}
			}			
		}
	}
	
	
	/*-------------Función muestraArray()---------------------------------*/


	
	/*Función para mostrar el presupuesto
	Recibe como parámetro un arreglo de una
	consulta hecha a la BD
	*/
	function muestraArray($aArreglo)
	{
			//Se crea una tabla para almacenar el resultado
			echo "<br />";
			echo "<table>";
			echo "<tr>";
			echo "<th width='80px'>Nombre</th>";
			echo "<th width='80px'>Presupuesto</th>";
			echo "</tr>";

			/*Ciclo que recorre el arreglo asociativo
			para mostrar los datos, tomando como índices
			los nombres de los campos que retorna la consulta.
			*/
			foreach ($aArreglo as $aValor)
			{
				echo "<tr align=center>";
				echo "<td>".$aValor['Nombre']."</td>";
				echo "<td>"."$ ".$aValor['Presupuesto']."</td>";
				echo "</tr>";
			}
				echo "</table>";
	}

	
	/*-------------Función muestraLista()---------------------------------*/
	

	/*Función para mostrar la lista de opciones
	según sea conferencias, charlas o conferencistas.
	*/
	function muestraLista()
	{
		//Variable para almacenar la consulta para generar la lista de opciones
		$consultaLista ="";
		
		/*Almacena la variable de sesión que posee 
		el tipo elegido (charla, conferencia o conferencista)
		en una variable local
		*/
		$pBusqueda=$_SESSION['busqueda'];
		
		
		//Evalúa el tipo que se eligió en el form y le asigna la consulta a la variable.
		switch($pBusqueda)
		{
			case 1:
				$consultaLista="SELECT titulo_charla 'Nombre', id_charla 'ID'
								FROM tcharla 
								ORDER BY Nombre";
				break;
			case 2:
				$consultaLista="SELECT titulo_conferencia 'Nombre', id_conferencia 'ID'
								FROM tconferencia 
								ORDER BY Nombre";
				break;
			case 3:
				$consultaLista="SELECT concat( p.nombre, ' ', p.apellido1, ' ', p.apellido2 ) 'Nombre', p.id_persona 'ID'
								FROM tpersona p, tpersona_tnivel_persona tp, tnivel_persona n
								WHERE p.id_persona = tp.id_persona
								AND tp.id_nivel_persona =1
								AND n.id_nivel_persona = tp.id_nivel_persona 
								ORDER BY Nombre";
				break;
		}
	
			//Realiza la consulta para mostrar la lista
			$aResultado=$this->query($consultaLista);
			
			
			/*Se utiliza una variable $color para alternar
			el color de las filas en la lista
			*/
			$color='#DBF1F7';
			
			echo "<table>";
			echo "<tr>";
			echo "<th align=center width='80px'>Nombre</th>";
			echo "<th align=center width='5px'>Buscar</td>";
			echo "<br />";
			echo "</tr>";
			

			//Ciclo para mostrar los datos
			
			foreach ($aResultado as $aValor)
			{
			
				//Alterna los colores en las líneas de datos
				$color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
				
				$nombre=$aValor['Nombre'];
				$id=$aValor['ID'];
				
				echo "<tr bgcolor=\"$color\" align=left>";
				echo "<td id='lista' align=center>"; echo $nombre; echo "</td>";
				echo "<td id='lista' align=center><a href='	presupuestoFinal.php?codigo=".$id."'><img src='../imagenes/buscar.png' width='25' height='25'/></a></td>";
				echo "</tr>";
			}
			echo "</table>";
	}
}
?>
