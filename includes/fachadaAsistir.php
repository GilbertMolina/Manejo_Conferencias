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
		$idAsistente=$_SESSION["id"];
		$consultaLista="SELECT titulo_charla 'Nombre', concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'Conferencista', DATE_FORMAT(ch.fecha,'%d-%m-%Y') 'Fecha', duracion 'Duracion', 
						DATE_FORMAT(hora,'%r') 'Hora', c.capacidad_charlas 'Cupo', ch.id_charla 'ID'
						FROM tcharla ch, tcupo c, tcupo_tcharla cha, tpersona p
						WHERE ch.esta_aprobada=1
						AND ch.es_charla=1
						AND ch.id_charla= cha.id_charla
						AND c.id_cupo= cha.id_cupo
						AND ch.id_persona= p.id_persona
						AND ch.id_charla not in (SELECT pch.id_charla 'idCharla'
						FROM tpersona p, tcharla ch, tpersona_tcharla pch 
						WHERE p.id_persona=pch.id_persona 
						AND pch.id_charla=ch.id_charla 
						AND p.id_persona='$idAsistente' )
						ORDER BY Conferencista, Nombre";
						
		//Realiza la consulta para mostrar la lista
		$aResultado=$this->query($consultaLista);
		
		/*Se utiliza una variable $color para alternar
		el color de las filas en la lista*/
		$color='#DBF1F7';
		
		echo "<table width='900' cellpadding='6'>";
		echo "<tr>
				  <td colspan='7' align='center'>Elija las charlas a las que desea asistir, y adem&aacute;s puede descargar la informaci&oacute;n de la charla que desee</td>
              </tr>";
		echo "<tr>";
		echo "<th align=center width='300px'>Nombre charla</th>";
		echo "<th align=center width='300px'>Conferencista</th>";
		echo "<th align=center width='110px'>Fecha</td>";
		echo "<th align=center width='150px'>Hora</td>";
		echo "<th align=center width='70px'>Duracion</td>";
		echo "<th align=center width='70px'>Imprimir</td>";
		echo "<th align=center width='80px'>Asistir</td>";
		echo "<br />";
		echo "</tr>";
			
		//Ciclo para mostrar los datos
		
		foreach ($aResultado as $aValor)
		{
			//Alterna los colores en las líneas de datos
			$color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
				
			$nombre=$aValor['Nombre'];
			$conferencista=$aValor['Conferencista'];
			$id=$aValor['ID'];
			$fecha=$aValor['Fecha'];
			$hora=$aValor['Hora'];
			$duracion=$aValor['Duracion'];
				
			echo "<tr bgcolor=\"$color\" align=left>";
			echo "<td  align=center>".$nombre."</td>";
			echo "<td  align=center>".$conferencista."</td>";
			echo "<td  align=center>".$fecha."</td>";
			echo "<td  align=center>".$hora."</td>";
			if ($duracion==1){
				echo "<td  align=center>".$duracion." hora"."</td>";
			}else{
				echo "<td  align=center>".$duracion." horas"."</td>";
			}
			echo "<td align='center'><a href='DescargarCharla.php?id_charla=$id' title='Imprimir la informaci&oacute;n de esta charla'><img src='../../imagenes/imprimir.png' alt='Imprimir informacion de esta charla' width='30' height='30' /></a></td>";
			
			echo "<td align='center'><a href='asistirCharla.php?idcharla=$id&nombre=$nombre' title='Asistir a la charla'><img src='../../imagenes/asistir.png' alt='asistir a la charla' width='30' height='30' /></a></td>";
		}
		echo "</table>";
	}

function asistirCharla()
{
	$idcharla=$_GET['idcharla'];
	//Variable para almacenar la consulta para generar la lista de opciones
	$consultaLista ="";
	
	$consultaLista="SELECT ch.titulo_charla 'Nombre', c.capacidad_charlas - c.ocupados 'Disponibles', ch.id_charla
					FROM tcharla ch, tcupo c, tcupo_tcharla cha
					WHERE ch.esta_aprobada=1
					AND ch.es_charla=1
					AND ch.id_charla= cha.id_charla
					AND c.id_cupo= cha.id_cupo
					AND ch.id_charla=$idcharla";
	//Realiza la consulta para mostrar la lista
	$aResultado=$this->query($consultaLista);			

	/*Se utiliza una variable $color para alternar el color de las filas en la lista*/
	$color='#DBF1F7';
	
	echo "<table width='700' cellpadding='6'>";
	echo "<tr>
			  <td colspan='7' align='center'>Verifique si la charla posee cupo disponible</td>
		  </tr>";
	echo "<tr>";
	echo "<th align=center width='120px'>Nombre</th>";
	echo "<th align=center width='110px'>Cupo disponible</th>";
	echo "</tr>";			
	
	//Ciclo para mostrar los datos
	foreach ($aResultado as $aValor)
	{			
		//Alterna los colores en las líneas de datos
		$color=('#F0F0F0'==$color)?'#DBF1F7':'#F0F0F0';
		
		$nombre=$aValor['Nombre'];
		$cupo=$aValor['Disponibles'];
		
		echo "<tr bgcolor=\"$color\" align=left>";
		echo "<td  align=center>".$nombre."</td>";
		if ($cupo==1){
			echo "<td  align=center>".$cupo." lugar"."</td>";
		}else{
			echo "<td  align=center>".$cupo." lugares"."</td>";
		}
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "</td>";
		echo "<td>";
		echo "<input id='volver' type='button' name='volver' value='Atr&aacute;s' onClick='volverCharlas();' />";
		echo "<input id='enviar' type='button' name='enviar' value='Asistir a la charla' onclick='asistirCharlas($idcharla,$cupo);' />";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
function registroCharla($idcharla,$idpersona)
{
		$cupo=$this->query("SELECT id_cupo FROM tcupo_tcharla WHERE id_charla=$idcharla");
		foreach ($cupo as $cupo1)
		{
			$id_cupo=$cupo1['id_cupo'];
		}
		
		$ocupados=$this->query("SELECT ocupados FROM tcupo WHERE id_cupo=$id_cupo");
		foreach ($ocupados as $ocupados1)
		{
			$cant_ocupados=$ocupados1['ocupados'];
		}
		
		$capacidad=$this->query("SELECT capacidad_charlas FROM tcupo WHERE id_cupo=$id_cupo");
		foreach ($capacidad as $capacidad1)
		{
			$cant_capacidad=$capacidad1['capacidad_charlas'];
		}
		
		if ($cant_ocupados>=$cant_capacidad){
			echo "No hay cupo disponible para esta charla";
			$insertar_cola=$this->query("insert into tcola (id_persona,id_charla) values ($idpersona,$idcharla)");
			
		}else{
			$insert_tpersona_tcharla=$this->query("insert into tpersona_tcharla (id_persona,id_charla) values ($idpersona,$idcharla)");
			$update_ocupados=$this->query("update tcupo set ocupados=ocupados+1 WHERE id_cupo=$id_cupo");
					echo "Su registro a la charla fue exitoso";
		}
		header('location: informacionCharlas.php');
	}
}
?>