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
    $this->Cell(70,10,'Lista de Articulos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(17,10, 'IdArt',1,0, 'C',0);
    $this->Cell(23,10, 'Cat',1,0, 'C',0);
    $this->Cell(20,10, 'Codigo',1,0, 'C',0);
    $this->Cell(50,10, 'Descripcion',1,0, 'C',0);
    $this->Cell(30,10, 'Precio_C',1,0, 'C',0);
    $this->Cell(30,10, 'Precio_V',1,0, 'C',0);
    $this->Cell(30,10, 'Stock',1,1, 'C',0);
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
$consulta = 'SELECT  id_art, Categorias.nombre_cat,codigo,descripcion,precio_compra,precio_venta,existencia FROM Articulos,Categorias WHERE Articulos.id_cat=Categorias.id_cat';
$resultado = $mysqli->query($consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(17,10, $row['id_art'],1,0, 'C',0);
    $pdf->Cell(23,10, $row['nombre_cat'],1,0, 'C',0);
    $pdf->Cell(20,10, $row['codigo'],1,0, 'C',0);
    $pdf->Cell(50,10, $row['descripcion'],1,0, 'C',0);
    $pdf->Cell(30,10, $row['precio_compra'],1,0, 'C',0);
    $pdf->Cell(30,10, $row['precio_venta'],1,0, 'C',0);
    $pdf->Cell(30,10, $row['precio_compra'],1,1, 'C',0);
}
$pdf->Output('', 'articulos_completo.pdf');
?>