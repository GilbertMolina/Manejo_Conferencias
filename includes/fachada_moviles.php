<?php
class fachadaAsistir{

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

	
	function muestraLista()
	{


		//Variable para almacenar la consulta para generar la lista de opciones
		$consultaLista ="";
		
		$consultaLista="select ch.titulo_charla 'Charla', conf.titulo_conferencia 'Conferencia',conf.localidad 'Lugar',
						concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'Nombre', DATE_FORMAT(ch.fecha,'%d-%m-%Y') 'Fecha',
						duracion 'Duracion', hora 'Hora' , p.id_persona 'id_persona', conf.id_conferencia 'id_conferencia',
						truncate((ch.costo_entrada),0) 'Costo', c.capacidad_charlas 'Cupo', ch.id_charla 'ID'
						from tcharla ch, tcupo c, tcupo_tcharla cha, tpersona p, tconferencia conf
						where ch.esta_aprobada=1
						and ch.es_charla=1
						and ch.id_charla= cha.id_charla
						and c.id_cupo= cha.id_cupo
						and p.id_persona=ch.id_persona
						and conf.id_conferencia=ch.id_conferencia
						order by Charla";

			//Realiza la consulta para mostrar la lista
			$aResultado=$this->query($consultaLista);

			echo "<div data-role='collapsible-set'>";

			//Ciclo para mostrar los datos
			foreach ($aResultado as $aValor)
			{
				$nombre=$aValor['Nombre'];
				$charla=$aValor['Charla'];
				$id=$aValor['ID'];
				$fecha=$aValor['Fecha'];
				$costo=$aValor['Costo'];
				$hora=$aValor['Hora'];
				$duracion=$aValor['Duracion'];
				$cupo=$aValor['Cupo'];
				$conferencia=$aValor['Conferencia'];
				$lugar=$aValor['Lugar'];
				$id_persona=$aValor['id_persona'];
				$id_conferencia=$aValor['id_conferencia'];
			
			echo "<div data-role='collapsible' data-collapsed='true' data-theme='a'>
					<h3>$charla</h3>
						<ul data-role='listview' data-inset='true' data-theme='b'>
							<li>
								<p>&nbsp;</p>
								<p class='ui-li-aside'>
								<p><h2><strong>Fecha: $fecha</strong></h2></p>
								<p class='ui-li-aside'>
								<p><h2><strong>Hora: $hora</strong></h2></p>
								<p class='ui-li-aside'>                      
								<p><h2><strong>Duraci&oacute;n: $duracion hora(s)</strong></h2></p>
								<p class='ui-li-aside'>                      
								<p><h2><strong>Cupo: $cupo lugares</strong></h2></p>
								<p class='ui-li-aside'>
								<p><h2><strong>Lugar: $lugar</strong></h2></p>
							</li>
							<li>
								<a href='info_conferencia.php?id_conferencia=$id_conferencia'>Conferencia: $conferencia</a>
							</li>
							<li>
								<a href='info_conferencista.php?id_conferencista=$id_persona'>Conferencista: $nombre</a>
							</li>
						</ul>
				</div>";
			}
		echo "</div>";
	}



function muestraLista_Conferencia()
	{
		$aInformacionConferencia=array();
		$aconferencia=array();
	
		$consultaLista ="";
		
		$consultaLista="select conf.id_conferencia 'id_conf', conf.titulo_conferencia 'titulo' 
						from tconferencia conf 
						order by titulo";

		echo "<div data-role='collapsible-set'>";

		$aInformacionConferencia=$this->query($consultaLista);
		
			
		//Ciclo para mostrar los datos

			foreach ($aInformacionConferencia as $aValorConferencia)
			{
				$id=$aValorConferencia['id_conf'];
				$conferencia=$aValorConferencia['titulo'];
				$aconferencia=$this->query("select id_charla 'ID', titulo_charla 'charla' 
											from tcharla 
											where id_conferencia=$id 
											and esta_aprobada=1 
											and es_charla=1
											order by charla;");

			
				//imprime la informacion 
				echo 
					"<div data-role='collapsible' data-collapsed='true' data-theme='a'>

		                	<h3>$conferencia</h3>
		                    	<ul data-role='listview' data-inset='true' data-theme='b'>";

				    foreach ($aconferencia as $aconferencias1)
				{
					$charla=$aconferencias1['charla'];
					$id_charla=$aconferencias1['ID'];
					echo "<li>
						<a href='info_charla.php?id_charla=$id_charla'><p><h2><strong>Charla: $charla</strong></h2></p></a>
					</li>";
				}	
				
			echo "</ul>
				</div>";
			}
		echo "	</div>";
	}




function muestraListaPorId($id)
	{

		//Variable para almacenar la consulta para generar la lista de opciones
		$consultaLista ="";
		
		$consultaLista="select ch.titulo_charla 'Charla', conf.titulo_conferencia 'Conferencia',conf.localidad 'Lugar',
						concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'Nombre', DATE_FORMAT(ch.fecha,'%d-%m-%Y') 'Fecha',
						duracion 'Duracion', hora 'Hora' , p.id_persona 'id_persona', conf.id_conferencia 'id_conferencia',
						truncate((ch.costo_entrada),0) 'Costo', c.capacidad_charlas 'Cupo', ch.id_charla 'ID'
						from tcharla ch, tcupo c, tcupo_tcharla cha, tpersona p, tconferencia conf
						where ch.esta_aprobada=1
						and ch.id_charla= cha.id_charla
						and c.id_cupo= cha.id_cupo
						and p.id_persona=ch.id_persona
						and ch.id_charla=$id
						and conf.id_conferencia=ch.id_conferencia";

			//Realiza la consulta para mostrar la lista
			$aResultado=$this->query($consultaLista);

			echo "<div data-role='collapsible-set'>";
	
			//Ciclo para mostrar los datos
			foreach ($aResultado as $aValor)
			{
				$nombre=$aValor['Nombre'];
				$charla=$aValor['Charla'];
				$id=$aValor['ID'];
				$fecha=$aValor['Fecha'];
				$costo=$aValor['Costo'];
				$hora=$aValor['Hora'];
				$duracion=$aValor['Duracion'];
				$cupo=$aValor['Cupo'];
				$conferencia=$aValor['Conferencia'];
				$lugar=$aValor['Lugar'];
				$id_persona=$aValor['id_persona'];
				$id_conferencia=$aValor['id_conferencia'];
				
			echo "<div data-role='collapsible' data-collapsed='false' data-theme='a'>
					<h3>$charla</h3>
						<ul data-role='listview' data-inset='true' data-theme='b'>
							<li>
								<p>&nbsp;</p>
								<p class='ui-li-aside'>
								<p><h2><strong>Fecha: $fecha</strong></h2></p>
								<p class='ui-li-aside'>
								<p><h2><strong>Hora: $hora</strong></h2></p>
								<p class='ui-li-aside'>                      
								<p><h2><strong>Duraci&oacute;n: $duracion hora(s)</strong></h2></p>
								<p class='ui-li-aside'>                      
								<p><h2><strong>Cupo: $cupo lugares</strong></h2></p>
								<p class='ui-li-aside'>
								<p><h2><strong>Lugar: $lugar</strong></h2></p>
							</li>
							<li>
								<a href='info_conferencia.php?id_conferencia=$id_conferencia'>Conferencia: $conferencia</a>
							</li>
							<li>
								<a href='info_conferencista.php?id_conferencista=$id_persona'>Conferencista: $nombre</a>
							</li>
						</ul>
				</div>";
			}
		echo "</div>";
	}

function muestraListaPorId_Conferencia($id)
	{
		$aInformacionAutor=array();
		$acharlas=array();
	
		$consultaLista ="";
		
		$consultaLista="select conf.id_conferencia 'ID', conf.titulo_conferencia 'titulo' 
						from tconferencia conf
						where id_conferencia=$id";

		echo "<div data-role='collapsible-set'>";

		$aInformacionAutor=$this->query($consultaLista);
		
			
		//Ciclo para mostrar los datos

			foreach ($aInformacionAutor as $aValorAutor)
			{
				$id=$aValorAutor['ID'];
				$conferencia=$aValorAutor['titulo'];
				$acharlas=$this->query("select id_charla 'ID', titulo_charla 'charla' 
										from tcharla 
										where id_conferencia=$id 
										and esta_aprobada=1 
										and es_charla=1
										order by charla;");
			
				//imprime la informacion 
				echo 
					"<div data-role='collapsible' data-collapsed='false' data-theme='a'>

		                	<h3>$conferencia</h3>
		                    	<ul data-role='listview' data-inset='true' data-theme='b'>";

				    foreach ($acharlas as $acharlas1)
				{
					$charla=$acharlas1['charla'];
					$id_charla=$acharlas1['ID'];
					echo "<li>
						<a href='info_charla.php?id_charla=$id_charla'><p><h2><strong>Charla: $charla</strong></h2></p></a>
					</li>";
				}	
				
					echo "</ul>
				</div>";
			}
		echo "	</div>";
	}
}
?>
