<?php

session_start();

require 'fpdf/fpdf.php';

date_default_timezone_set('America/La_Paz');

class PDF extends FPDF

{

    // Cabecera de página

   




    function Header()

{

//include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      
 //$dato_info = $consulta_info->fetch_object();

$this->Image('marcos.png',0,0,85);

$this->Image('logona.png',228,10,25);




$this->SetY(35);

$this->SetX(215);

$this->SetFont('Arial','B',12);

$this->SetTextColor(211, 19, 19);

$this->Cell(150, 8, utf8_decode('EMPRESA DE VENTAS'),0,1);

$this->SetY(40);

$this->SetX(228);

$this->SetFont('Arial','B',12);

$this->SetTextColor(163, 20, 20);

$this->Cell(150, 10, utf8_decode("REPORTE"),0,1);




// Agregamos los datos del cliente

$this->SetY(55);

$this->SetX(30);

$this->SetFont('Arial','B',12);

$this->SetTextColor(0, 0, 0);  

$this->cell(30,5, utf8_decode('Fecha y Hora:'));

$this->SetFont('Arial','',11);    

$this->Cell(10,5, date('d/m/Y | g:i:a'));




// Agregamos los datos de la factura

$this->SetY(60);

$this->SetX(30);

$this->SetFont('Arial','B',12);    

$this->Cell(30,5, utf8_decode('Usuario:'));

$this->SetFont('Arial','',11);    

$this->Cell(30,5, $_SESSION['nombre']);




$this->SetY(70);

$this->SetX(30);

$this->SetFont('Arial','B',15);

$this->SetTextColor(0, 0, 0);

$this->Cell(225, 8, utf8_decode('LISTADO DE USUARIOS'),0,1,"C");

$this->SetTextColor(30,10,32);




}




function Footer()

{

     $this->SetFont('helvetica', 'B', 8);

     $this->SetX(100);

     $this->SetY(200);

     $this->Cell(70,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'C');

     $this->Cell(190,5,date('d/m/Y | g:i:a') ,0,1,'R');

     $this->Line(33,205,270,205);

     $this->Cell(280,5,utf8_decode("REPORTE S.R.L. © Todos los derechos reservados."),0,0,"C");

       

}

}




$pdf = new PDF("L", "mm", "Letter");

$pdf->AliasNbPages();

$pdf->AddPage();

$pdf->SetAutoPageBreak(true, 20);

$pdf->SetTopMargin(500);

$pdf->SetLeftMargin(10);

$pdf->SetRightMargin(10);

$pdf->SetX(30);

$pdf->SetFillColor(211, 19, 19);

$pdf->SetDrawColor(255, 255, 255);

// Cell(ancho , alto,texto,borde(0/1),salto(0/1),alineacion(L,C,R),rellenar(0/1)




$pdf->SetFont('Arial','B',10);

$pdf->Cell(35, 12, utf8_decode('NOMBRE'),1,0,'C',1);

$pdf->Cell(90, 12, utf8_decode('CORREO'),1,0,'C',1);

$pdf->Cell(60, 12, utf8_decode('USUARIO'),1,0,'C',1);

$pdf->Cell(60, 12, utf8_decode('ROL'),1,1,'C',1);






//$conexion=mysqli_connect("localhost","root","","sistema_escolar")or die("error conexion");

require('../../conexion.php');




//$consulta = "SELECT * FROM period";

//$resultado = mysqli_query($conexion,$consulta);

$consulta_reporte_alquiler = $conexion->query(" SELECT u.nombre, u.correo, u.usuario, r.rol AS nombre_rol
FROM usuario u LEFT JOIN rol r ON u.rol = r.idrol ");

while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   

   

$pdf->SetFont('Arial','',10);

$pdf->SetX(30);

$pdf->SetFillColor(255,255,255);

$pdf->SetDrawColor(65, 61, 61);




$pdf->Cell(35, 8, utf8_decode($datos_reporte->nombre),'B',0,'C',1);

$pdf->Cell(100, 8, utf8_decode($datos_reporte->correo),'B',0,'C',1);

$pdf->Cell(45, 8, utf8_decode($datos_reporte->usuario),'B',0,'C',1);

$pdf->Cell(68, 8, utf8_decode($datos_reporte->nombre_rol),'B',1,'C',1);



 

    /*$pdf->Cell(25,9, $row['status'], 0 ,1, 'C',1);*/

 

}





$pdf->Ln(0.5);





$pdf->Output('USUARIOS.pdf', 'D');

?>