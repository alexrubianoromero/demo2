<?php

$raiz= $_SERVER['DOCUMENT_ROOT'];
date_default_timezone_set('America/Bogota');
require_once($raiz.'/fpdf/fpdf.php');
$ruta = dirname(dirname(__FILE__));
require_once($ruta .'/modelo/OrdenesModelo.class.php');
require_once($ruta .'/vehiculos/modelo/VehiculosModelo.php');

$orden = new OrdenesModelo();
$vehiculo = new VehiculosModelo(); 
$datoOrden = $orden->traerOrdenId($_REQUEST['idOrden']);


$pdf=new FPDF();

$pdf->AddPage();
    $pdf->Image('speeddesign.jpeg',23,8,33);

    $pdf->SetFont('Arial','B',15);
    // Movernos a la derecha
    $pdf->Cell(80);
    // T�tulo
    $pdf->Cell(60,10,'ORDEN DE SERVICIO',1,0,'C');
    $pdf->Cell(10,10,$datoOrden['orden'],1,1,'C');

    
    $pdf->SetFont('Arial','',10);
    $pdf->Ln(5);
$pdf->Cell(80);

$pdf->Cell(40,6,'Cliente',1,0,'C');
$pdf->Cell(25,6,'Identificacion',1,0,'C');
$pdf->Cell(25,6,'Telefono',1,1,'C');

$pdf->Cell(80);
$pdf->Cell(40,6,$_REQUEST['nombrecli'],1,0,'C');
$pdf->Cell(25,6,'79566096',1,0,'C');
$pdf->Cell(25,6,'3124551226',1,1,'C');
$pdf->Cell(80);
$pdf->Cell(90,6,'DIreccion',1,1,'C');
$pdf->Cell(17);
$pdf->Cell(22,6,'  Speed design motolavado taller',0,0,'C');
$pdf->Cell(41);
$pdf->Cell(90,6,'Cra 30 No 20-65',1,1,'C');
$pdf->Cell(17);
$pdf->Cell(22,6,'Cll 22 # 96f-35 ',0,1,'C');
$pdf->Cell(17);
$pdf->Cell(22,6,'Nit: 12345678 ',0,1,'C');

$pdf->Output();

?>