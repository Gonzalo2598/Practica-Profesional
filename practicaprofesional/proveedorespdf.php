<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('C:\AppServ\www\practicaprofesional/img/inst.PNG',5,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Lista de Proveedores',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(30,10, 'Id Prov',1,0, 'C',0);
    $this->Cell(50,10, 'Nombre',1,0, 'C',0);
    $this->Cell(50,10, utf8_decode('Teléfono'),1,1, 'C',0);
   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexionpdf.php';
$consultaprov = 'SELECT * FROM proveedores';
$resultadoprov = $mysqli->query($consultaprov);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($rowprov =$resultadoprov->fetch_assoc()){
    $pdf->Cell(30,10, $rowprov['id_prov'],1,0, 'C',0);
    $pdf->Cell(50,10, $rowprov['nombre_empresa'],1,0, 'C',0);
    $pdf->Cell(50,10, $rowprov['telefono'],1,1, 'C',0);
    
}
$pdf->Output('', 'lista_proveedores.pdf');
?>