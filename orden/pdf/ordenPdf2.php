<?php
$raiz= $_SERVER['DOCUMENT_ROOT'];
date_default_timezone_set('America/Bogota');
require_once($raiz.'/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de p�gina
    function Header()
    {
        
        // Logo
        $this->Image('speeddesign.jpeg',23,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // T�tulo
        $this->Cell(60,10,'ORDEN DE SERVICIO',1,1,'C');
        $this->SetFont('Arial','',10);
        $this->Ln(5);
	$this->Cell(80);
    
	$this->Cell(40,6,'Cliente',1,0,'C');
	$this->Cell(25,6,'Identificacion',1,0,'C');
	$this->Cell(25,6,'Telefono',1,1,'C');
    
	$this->Cell(80);
	$this->Cell(40,6,'Alex Eduardo Rubiano',1,0,'C');
	$this->Cell(25,6,'79566096',1,0,'C');
	$this->Cell(25,6,'3124551226',1,1,'C');
	$this->Cell(80);
	$this->Cell(90,6,'DIreccion',1,1,'C');
	$this->Cell(17);
	$this->Cell(22,6,'  Speed design motolavado taller',0,0,'C');
	$this->Cell(41);
	$this->Cell(90,6,'Cra 30 No 20-65',1,1,'C');
	$this->Cell(17);
	$this->Cell(22,6,'Cll 22 # 96f-35 ',0,1,'C');
	$this->Cell(17);
	$this->Cell(22,6,'Nit: 12345678 ',0,1,'C');
	// Salto de l�nea
	$this->Ln(5);
	$this->Cell(15);
	$this->Cell(22,6,'Fecha',1,0,'C');
	$this->Cell(22,6,'Factura',1,0,'C');
	$this->Cell(20);
	$this->Cell(22,6,'Moto',1,0,'C');
	$this->Cell(22,6,'placa',1,0,'C');
	$this->Cell(22,6,'Kilometraje',1,1,'C');
    $this->Cell(15);
	$this->Cell(22,6,'27-03-2022',1,0,'C');
	$this->Cell(22,6,'F-123',1,0,'C');
	$this->Cell(20);
	$this->Cell(22,6,'Yamaha',1,0,'C');
	$this->Cell(22,6,'ASD123',1,0,'C');
	$this->Cell(22,6,'15.000',1,1,'C');
    
    $this->SetFont('Arial','B',9);
	$this->Ln(5);
	$this->Cell(5);
	$this->Cell(50,6,'Referencia',1,0,'C');
	$this->Cell(50,6,'Descripcion',1,0,'C');
	$this->Cell(20,6,'Cantidad',1,0,'C');
	$this->Cell(22,6,'Vr. Unitario',1,0,'C');
	$this->Cell(22,6,'Total',1,1,'C');
    
    $this->SetFont('Arial','',9);
    for($i=1;$i<=2;$i++)
    {
        $this->Cell(5);
        $this->Cell(50,6,'Referencia',1,0,'C');
        $this->Cell(50,6,'Descripcion',1,0,'C');
        $this->Cell(20,6,'Cantidad',1,0,'C');
        $this->Cell(22,6,'Vr. Unitario',1,0,'C');
        $this->Cell(22,6,'100.000.000',1,1,'C');
    }
    
    $this->Ln(5);
    $this->Cell(5);
    $this->Cell(50,6,'Recibido__',0,0,'C');
    $this->Cell(40,6,'___________________',0,1,'C');
    $this->Cell(5);
    $this->Cell(50,6,'Observaciones______',0,0,'C');
    
    
}
    



// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
// 	$pdf->Cell(0,10,'Imprimiendo l�nea n�mero '.$i,0,1);


$pdf->Output();
?>
