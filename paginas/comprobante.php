<?php
ob_start();
$name = $_POST["txtName"];
$lastName1 = $_POST["txtFirstLastName"];
$lastName2 = $_POST["txtSecondLastName"];
$curp = $_POST["txtCurp"];
$email = $_POST["txtEmail"];
$phone = $_POST["txtTelefono"];
$phone2 = $_POST["txtTelefono2"];
$cp = $_POST["txtCp"];
$state = $_POST["txtState"];
$mun = $_POST["txtMun"];
$folio = $_POST["txtFolio"];
$imp = 'hola si funcione';

include "consulta_municipio_estado.php";

require('../archivos/fpdf/fpdf.php');
$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',16);

$pdf->Image('../imagenes/ri_1.png',10,10,-210);
$pdf->Text(22, 23, $folio);

$pdf->Text(20, 61,  utf8_decode($name) . " ". utf8_decode($lastName1). " ". utf8_decode($lastName2));
$pdf->Text(20, 76, $curp);
$pdf->Text(20, 88, $email);
$pdf->Text(133, 75, $phone);
$pdf->Text(133, 87, $phone2);

$pdf->SetFont('Helvetica','B',12);
// Texto centrado en una celda con cuadro 20*10 mm y salto de línea
$pdf->SetXY(122, 94);
$pdf->Cell(13,10,$cp,0,1,'C');
$pdf->SetXY(135, 94);
$pdf->Cell(30,10,substr(utf8_decode($mun),0,13),0,1,'C');
$pdf->SetXY(167, 94);
$pdf->Cell(33,10,substr(utf8_decode($state),0,15),0,1,'C');

$pdf->SetFont('Helvetica','B',16);
$pdf->Text(20, 187, utf8_decode($name) . " ". utf8_decode($lastName1). " ". utf8_decode($lastName2));
$pdf->Text(20, 200, $curp);
$pdf->Text(123, 200, $folio);
$pdf->Output();
ob_end_flush();
?>