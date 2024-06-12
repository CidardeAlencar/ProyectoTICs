<?php
session_start();
require 'fpdf/fpdf.php';
date_default_timezone_set('America/La_Paz');
class PDF extends FPDF
{
    // Cabecera de página
   

    function Header()
{
$this->Image('marcos.png',-1,-1,100);
$this->Image('logona.png',98,15,25);

$this->SetY(40);
$this->SetX(86);
$this->SetFont('Arial','B',12);
$this->SetTextColor(211, 19, 19);
$this->Cell(150, 8, utf8_decode('EMPRESA DE VENTA'),0,1);

$this->SetY(45);
$this->SetX(100);
$this->SetFont('Arial','B',12);
$this->SetTextColor(163, 20, 20);
$this->Cell(150, 10, utf8_decode("REPORTE"),0,1);

// Agregamos los datos del cliente
$this->SetY(65);
$this->SetX(40);
$this->SetFont('Arial','B',12);
$this->SetTextColor(0, 0, 0);   
$this->cell(30,5, utf8_decode('Fecha y Hora:'));
$this->SetFont('Arial','',11);    
$this->Cell(10,5, date('d/m/Y | g:i:a'));

// Agregamos los datos de la factura
$this->SetY(75);
$this->SetX(40);
$this->SetFont('Arial','B',12);    
$this->Cell(30,5, utf8_decode('Usuario:'));
$this->SetFont('Arial','',11);    
$this->Cell(30,5, $_SESSION['nombre']);

$this->SetY(85);
$this->SetX(40);
$this->SetFont('Arial','B',13);
$this->SetTextColor(0, 0, 0);
$this->Cell(145, 8, utf8_decode('LISTADO DE CLIENTES'),0,1,"C");
$this->SetTextColor(30,10,32);

}

function Footer()
{
     $this->SetFont('helvetica', 'B', 8);
        $this->SetY(260);
        $this->SetX( 100 );
        $this->Cell(0,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        //$this->Line(10,287,10, 20);
        $this->SetY(265);
        $this->Cell(0,5,utf8_decode("REPORTE © Todos los derechos reservados."),0,0,"C");
        
}
}

$pdf = new PDF("P", "mm", "Letter");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(500);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$pdf->SetY(95);
$pdf->SetX(30);
$pdf->SetFillColor(211, 19, 19);
$pdf->SetDrawColor(255, 255, 255);
// Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)

$pdf->SetFont('Arial','B',10);
$pdf->Cell(60, 12, utf8_decode('NOMBRE'),1,0,'C',1);
$pdf->Cell(25, 12, utf8_decode('TELEFONO'),1,0,'C',1);
$pdf->Cell(98, 12, utf8_decode('CORREO'),1,1,'C',1);



//$conexion=mysqli_connect("localhost","root","","sistema_escolar")or die("error conexion");
require('../../conexion.php');

//$consulta = "SELECT * FROM period";
//$resultado = mysqli_query($conexion,$consulta);
//$stmt = $connect->prepare("SELECT * FROM rs_history ORDER BY idrsh DESC");
//$stmt->setFetchMode(PDO::FETCH_ASSOC);

$consulta_reporte_alquiler = $conexion->query(" select * from clientes ");

while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   

   

$pdf->SetFont('Arial','',10);

$pdf->SetX(30);

$pdf->SetFillColor(255,255,255);

$pdf->SetDrawColor(65, 61, 61);




$pdf->Cell(58, 8, utf8_decode($datos_reporte->nombre),'B',0,'C',1);

$pdf->Cell(26, 8, utf8_decode($datos_reporte->telefono),'B',0,'C',1);

$pdf->MultiCell(102, 8, utf8_decode($datos_reporte->correo), 'B', 'C', 1);






 

    /*$pdf->Cell(25,9, $row['status'], 0 ,1, 'C',1);*/

 

}

$pdf->Ln(0.5);


$pdf->Output('CLIENTES.pdf', 'D');
?>