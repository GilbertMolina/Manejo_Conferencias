<?php
/*Se incluyen el archivo de conexion de la base de datos*/
require_once("../../includes/conexion.php");
require_once('fpdf/fpdf.php');

class PDF extends FPDF {
	var $widths;
	var $aligns;

	function SetWidths($w) {
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a) {
		//Set the array of column alignments
		$this->aligns=$a;
	}

	function Row($data) {
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++) {
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			
			$this->Rect($x,$y,$w,$h);

			$this->MultiCell($w,5,$data[$i],0,$a,'true');
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h) {
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
                   $this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt) {
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb) {
			$c=$s[$i];
			if($c=="\n") {
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax) {
				if($sep==-1) {
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function Header() {
		function fecha_actual() {  
				$dias_de_la_semana = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
				$meses_del_anno = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre");  
				$anno_actual = date ("Y");  
				$mes_actual = date ("n");  
				$numero_dia_actual = date ("j");  
				$dia_actual = date ("w");  
				$fecha = $dias_de_la_semana[$dia_actual] . ", " . $numero_dia_actual . " de " . $meses_del_anno[$mes_actual] . " de " . $anno_actual;   
				return $fecha;
		}
		$this->Image('../../imagenes/registrixPDF.jpg',20,10,45,24,'JPG','');
		$this->SetFont('Arial','B',12);
		$this->Ln(6);
		$this->Cell(+187,4,fecha_actual(),0,1,'R');
		$this->Ln(3);
		$this->Cell(+187,4,'Registrix',0,1,'R');
		$this->Ln(15);
		$this->SetFont('Arial','B',16);
		$this->Cell(0,14,'REGISTRIX CONFERENCIAS 2011',0,1,'C');
		$this->SetFont('Arial','B',14);
		$this->Cell(0,4,'Itinerario del asistente',0,1,'C');
		$this->Ln(10);
	}

	function Footer() {
		$this->SetY(-15);
		$this->SetFont('Arial','B',11);
		$this->Cell(0,10,'Registrix',0,0,'L');
		$this->Cell(0,10,'Maximum Intelligence Developers',0,0,'R');
	}

}

/*Se obtiene el valor de "nombre_proveedor" y se almacena en la variable "$proveedor"*/
	$idAsistente = $_GET["id_persona"];
        
    $sql = "SELECT concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'Nombre', pr.nombre_profesion 'Profesion', 
				   pa.nombre_pais 'Pais', DATE_FORMAT(p.fecha_nacimiento,'%d-%m-%Y') 'Fecha nacimiento', p.correo_electronico 'Correo' 
            FROM tpersona p, tprofesion pr, tpais pa 
            WHERE p.id_profesion=pr.id_profesion 
            AND p.id_pais=pa.id_pais 
            AND p.id_persona='$idAsistente' ";
			
	$mostrarAsistente = mysql_query($sql, ConectarMySQL::conexion());
	$resultadoAsistente = mysql_fetch_assoc($mostrarAsistente);
	
    /*Se obtiene el valor de los campos para desplegarlos en el PDF*/
	$nombreAsistente = $resultadoAsistente["Nombre"];
	$profesion = $resultadoAsistente["Profesion"];
	$pais = $resultadoAsistente["Pais"];
	$fechaDeNacimiento = $resultadoAsistente["Fecha nacimiento"];
	$correo = $resultadoAsistente["Correo"];
		
	/*Se dan los parametros de configuracion del PDF*/
	$pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(12);
	
	/*Se se ponen los datos del asistente*/
	$pdf->SetFont('Arial','B',12);
	/*Datos del asistente*/
	$pdf->Cell(0,6,'DATOS DEL ASISTENTE',0,0,'L');
	$pdf->Ln(14);
	/*Asistente*/
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(100,180,50);
	$pdf->SetTextColor(255);
	$pdf->Cell(0,6,'Nombre:',1,0,'L', true);
	$pdf->Cell(-130);
	/*Nombre del asistente*/
	$pdf->SetFont('Arial','',12);
	$pdf->SetFillColor(240);
	$pdf->SetTextColor(10);
	$pdf->Cell(0,6,$nombreAsistente,1,1,'L', true);
	/*Profesion*/
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(100,180,50);
	$pdf->SetTextColor(255);
	$pdf->Cell(0,6,'Profesion:',1,0,'L', true);
	$pdf->Cell(-130);
	/*Titulo de la profesion*/
	$pdf->SetFont('Arial','',12);
	$pdf->SetFillColor(240);
	$pdf->SetTextColor(10);
	$pdf->Cell(0,6,$profesion,1,1,'L', true);
	/*Pais*/
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(100,180,50);
	$pdf->SetTextColor(255);
	$pdf->Cell(0,6,'Pais:',1,0,'L', true);
	$pdf->Cell(-130);
	/*Nombre del pais*/
	$pdf->SetFont('Arial','',12);
	$pdf->SetFillColor(240);
	$pdf->SetTextColor(10);
	$pdf->Cell(0,6,$pais,1,1,'L', true);
	$pdf->SetFont('Arial','B',12);
	/*Fecha de nacimiento*/
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(100,180,50);
	$pdf->SetTextColor(255);
	$pdf->Cell(0,6,'Fecha de nacimiento:',1,0,'L', true);
	$pdf->Cell(-130);
	/*Fecha de nacimiento (fecha)*/
	$pdf->SetFont('Arial','',12);
	$pdf->SetFillColor(240);
	$pdf->SetTextColor(10);
	$pdf->Cell(0,6,$fechaDeNacimiento,1,1,'L', true);
	$pdf->SetFont('Arial','B',12);
	/*Correo*/
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(100,180,50);
	$pdf->SetTextColor(255);
	$pdf->Cell(0,6,'Correo electronico:',1,0,'L', true);
	$pdf->Cell(-130);
	/*Direccion de correo electronico*/
	$pdf->SetFont('Arial','',12);
	$pdf->SetFillColor(240);
	$pdf->SetTextColor(10);
	$pdf->Cell(0,6,$correo,1,1,'L', true);
	$pdf->SetFont('Arial','B',12);
	
	/*Se ponen las charlas a las que va a asistir*/
	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,0,'CHARLAS A LAS QUE DESEA ASISTIR');
	$pdf->Ln(10);
	
	/*Se ponen los parametros para la tabla*/
	$pdf->SetWidths(array(71, 40, 33, 32));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(100,180,50);
	$pdf->SetTextColor(255);
        
	/*Encabezados de la tabla*/
	for($i=0;$i<1;$i++) {
            $pdf->Row(array('Nombre de la charla', 'Duracion estimada', 'Hora', 'Fecha'));
	}
	
	/*Select para llenar la tabla*/
	$sql = "SELECT ch.titulo_charla 'Charla', ch.duracion 'Duracion', 
                   DATE_FORMAT(ch.hora,'%r') 'Hora', DATE_FORMAT(ch.fecha,'%d-%m-%Y') 'Fecha' 
            FROM tpersona p, tcharla ch, tpersona_tcharla pch 
            WHERE p.id_persona=pch.id_persona 
            AND pch.id_charla=ch.id_charla 
            AND p.id_persona='$idAsistente' 
            ORDER BY Charla ";
		
	/*Se envia la consulta a la base de datos*/
	$charlasDelAsistente = mysql_query($sql, ConectarMySQL::conexion());
	
	/*Se consultan el numero de filas de la consulta anterior*/
	$numeroDeFilas = mysql_num_rows($charlasDelAsistente);

        /*Iteracion que inserta los datos en la tabla*/
	for ($i=0; $i<$numeroDeFilas; $i++) {
            $fila = mysql_fetch_array($charlasDelAsistente);
            $pdf->SetFont('Arial','',10);
            /*Condicion hecha con el fin de que se vean de dos colores las filas de la tabla*/
            if($i%2 == 1) {
                /*Se imprime la linea de color gris*/
                    $pdf->SetFillColor(190);
                    $pdf->SetTextColor(0);
					if ($fila['Duracion']==1){
						$pdf->Row(array($fila['Charla'], $fila['Duracion']." hora", $fila['Hora'], $fila['Fecha']));
					}else{
						$pdf->Row(array($fila['Charla'], $fila['Duracion']." horas", $fila['Hora'], $fila['Fecha']));
					}
            } else {
                /*Se imprime la linea de color gris (claro)*/
                    $pdf->SetFillColor(240);
                    $pdf->SetTextColor(0);
                    if ($fila['Duracion']==1){
						$pdf->Row(array($fila['Charla'], $fila['Duracion']." hora", $fila['Hora'], $fila['Fecha']));
					}else{
						$pdf->Row(array($fila['Charla'], $fila['Duracion']." horas", $fila['Hora'], $fila['Fecha']));
					}
            }
        }
	/*Se envia el PDF la navegador*/
	$pdf->Output();     
?>
