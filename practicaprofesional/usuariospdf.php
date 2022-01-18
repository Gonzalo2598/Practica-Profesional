<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('C:\AppServ\www\practicaprofesional/inst.PNG',5,8,25);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Lista de Usuarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(30,10, 'Id User',1,0, 'C',0);
    $this->Cell(30,10, 'Usuario',1,0, 'C',0);
    $this->Cell(40,10, utf8_decode('Contraseña'),1,1, 'C',0);
   
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
$consultausua = 'SELECT * FROM usuarios';
$resultadousua = $mysqli->query($consultausua);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($rowusua =$resultadousua->fetch_assoc()){
    $pdf->Cell(30,10, $rowusua['id_user'],1,0, 'C',0);
    $pdf->Cell(30,10, $rowusua['usuario'],1,0, 'C',0);
    $pdf->Cell(40,10, $rowusua['contraseña'],1,1, 'C',0);
    
}
$pdf->Output('', 'lista_usuarios.pdf');
?>