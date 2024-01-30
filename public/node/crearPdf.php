<?php 
ob_start();
require('fpdf.php');
$datos=[];
$datos=$_POST["datos"]; 

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->SetFont('Arial','B',14);
    $this->setXY(60,15);
    $this->Cell(100,8,'Informe de Diagnostico',0,1,'C',0);
    $this->Image('logo.png',150,10,35); //imagen(archivo, png/jpg || x,y,tamaño)
    $this->Ln(40);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Número de página
    $this->Image('firma.png',90,230,35);
    $this->Cell(150,8,'FIRMA',0,245,'C',0);
    $this->Cell(170,10,'Copia Informe: ' . date('d/m/Y'),0,0,'C',0);
    $this->Cell(25,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));

$pdf->SetFillColor( 253, 254, 255);//color de fondo rgb
$pdf->SetDrawColor(61, 61, 61);//color de linea  rgb
$pdf->SetFont('Arial','',12);
$pdf->Output();
ob_end_flush();
?>
