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
		$this->Cell(0,4,'Charlas disponibles',0,1,'C');
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
	$idcharla = $_GET["id_charla"];
	
	$sql = "SELECT ch.id_charla, ch.titulo_charla 'charla', c.titulo_conferencia 'conferencia', 
			concat(p.nombre,' ',p.apellido1,' ',p.apellido2) 'conferencista', c.localidad 'localidad',
			DATE_FORMAT(ch.fecha,'%d-%m-%Y') 'fecha', DATE_FORMAT(hora,'%r') 'hora', ch.duracion 'duracion'
			FROM tcharla ch, tcharla_tgasto cg, tgasto g, tconferencia c, tpersona p 
			WHERE ch.esta_aprobada = 1 
			AND ch.es_charla = 1 
			AND ch.id_charla=cg.id_charla 
			AND cg.id_gasto=g.id_gasto 
			AND ch.id_conferencia=c.id_conferencia 
			AND ch.id_persona=p.id_persona 
			AND ch.id_charla='$idcharla' ";
        
	$queCharlas = mysql_query($sql, ConectarMySQL::conexion());
	
	$numeroDeFilas = mysql_num_rows($queCharlas);
	
		$fila = mysql_fetch_array($queCharlas);
		
		/*Se dan los parametros de configuracion del PDF*/
		$pdf=new PDF('P','mm','Letter');
		$pdf->Open();
		$pdf->AddPage();
		$pdf->SetMargins(20,20,20);
		$pdf->Ln(12);
		
		/*Se se ponen los datos de la charla*/
		$pdf->SetFont('Arial','B',14);
		/*Datos de la charla*/
		$pdf->Cell(0,8,'DATOS DE LA CHARLA',0,0,'L');
		$pdf->Ln(20);
		
		/*Charla*/
		$pdf->SetFont('Arial','B',12);
		$pdf->SetFillColor(100,180,50);
		$pdf->SetTextColor(255);
		$pdf->Cell(0,8,'Charla:',1,0,'L', true);
		$pdf->Cell(-130);
		/*Nombre de la charla*/
		$pdf->SetFont('Arial','',12);
		$pdf->SetFillColor(240);
		$pdf->SetTextColor(10);
		$pdf->Cell(0,8,$fila['charla'],1,1,'L', true);
		
		/*Conferencia*/
		$pdf->SetFont('Arial','B',12);
		$pdf->SetFillColor(100,180,50);
		$pdf->SetTextColor(255);
		$pdf->Cell(0,8,'Conferencia:',1,0,'L', true);
		$pdf->Cell(-130);
		/*Nombre de la conferencia*/
		$pdf->SetFont('Arial','',12);
		$pdf->SetFillColor(240);
		$pdf->SetTextColor(10);
		$pdf->Cell(0,8,$fila['conferencia'],1,1,'L', true);
		
		/*Conferencista*/
		$pdf->SetFont('Arial','B',12);
		$pdf->SetFillColor(100,180,50);
		$pdf->SetTextColor(255);
		$pdf->Cell(0,8,'Conferencista:',1,0,'L', true);
		$pdf->Cell(-130);
		/*Nombre del conferencista*/
		$pdf->SetFont('Arial','',12);
		$pdf->SetFillColor(240);
		$pdf->SetTextColor(10);
		$pdf->Cell(0,8,$fila['conferencista'],1,1,'L', true);
		
		/*Localidad de la charla*/
		$pdf->SetFont('Arial','B',12);
		$pdf->SetFillColor(100,180,50);
		$pdf->SetTextColor(255);
		$pdf->Cell(0,8,'Lugar:',1,0,'L', true);
		$pdf->Cell(-130);
		/*Localidad*/
		$pdf->SetFont('Arial','',12);
		$pdf->SetFillColor(240);
		$pdf->SetTextColor(10);
		$pdf->Cell(0,8,$fila['localidad'],1,1,'L', true);
		
		/*Fecha de la charla*/
		$pdf->SetFont('Arial','B',12);
		$pdf->SetFillColor(100,180,50);
		$pdf->SetTextColor(255);
		$pdf->Cell(0,8,'Fecha de realizacion:',1,0,'L', true);
		$pdf->Cell(-130);
		/*Fecha*/
		$pdf->SetFont('Arial','',12);
		$pdf->SetFillColor(240);
		$pdf->SetTextColor(10);
		$pdf->Cell(0,8,$fila['fecha'],1,1,'L', true);
		
		/*Hora de la realizacion de la charla*/
		$pdf->SetFont('Arial','B',12);
		$pdf->SetFillColor(100,180,50);
		$pdf->SetTextColor(255);
		$pdf->Cell(0,8,'Hora de inicio:',1,0,'L', true);
		$pdf->Cell(-130);
		/*Hora*/
		$pdf->SetFont('Arial','',12);
		$pdf->SetFillColor(240);
		$pdf->SetTextColor(10);
		$pdf->Cell(0,8,$fila['hora'],1,1,'L', true);
		
		if ($fila['duracion'] ==1) {
			/*Duracion estimada*/
			$pdf->SetFont('Arial','B',12);
			$pdf->SetFillColor(100,180,50);
			$pdf->SetTextColor(255);
			$pdf->Cell(0,8,'Duracion estimada:',1,0,'L', true);
			$pdf->Cell(-130);
			/*Horas*/
			$pdf->SetFont('Arial','',12);
			$pdf->SetFillColor(240);
			$pdf->SetTextColor(10);
			$pdf->Cell(0,8,$fila['duracion'].' hora',1,1,'L', true);
		} else {
			/*Horas de duracion*/
			$pdf->SetFont('Arial','B',12);
			$pdf->SetFillColor(100,180,50);
			$pdf->SetTextColor(255);
			$pdf->Cell(0,8,'Duracion estimada:',1,0,'L', true);
			$pdf->Cell(-130);
			/*Horas*/
			$pdf->SetFont('Arial','',12);
			$pdf->SetFillColor(240);
			$pdf->SetTextColor(10);
			$pdf->Cell(0,8,$fila['duracion'].' horas',1,1,'L', true);
		}
		
		/*Se envia el PDF la navegador*/
		$pdf->Output();
		
?>