<?php
$alert = "";
session_start();

//incluir libreia de fpdf
require("lib/fpdf/fpdf186/fpdf.php");

class PDF extends FPDF
{
    //Creat cabecera de la página

    function Header()
    {
        //agregar logotipo
        $this->Image("imagenes/LOGO.png", 10, 8, 33);
        //tipo de letra
        $this->SetFont("Arial", "B", 16);
        //movemos a la derecha
        $this->Cell(110);
        //titulo
        $this -> SetTextColor(255, 87, 51);//color de texto
        $this->Cell(60, 10, 'REPORTE DE USUARIOS EXISTENTES', 0, 0, 'C');
        //salto de linea
        $this->Ln(30);
        $this -> SetFillColor(255, 87, 51);//color d celda
        $this -> SetTextColor(255, 255, 255);//color de texto
        //tipo de letra
        $this->SetFont("Arial", 'B', 12);
        //Encabezado de la tabla
        $this->Cell(30, 10, 'Nombre', 1, 0, 'C', true);
        $this->Cell(40, 10, 'Paterno', 1, 0, 'C', true);
        $this->Cell(40, 10, 'Materno', 1, 0, 'C', true);
        $this->Cell(100, 10, 'Correo', 1, 0, 'C', true);
        $this->Cell(50, 10, utf8_decode('Teléfono'), 1, 0, 'C', true); //utf8_decode($row['nombre'])
        //salto de linea
        $this->Ln(10);
    }

    function Footer()
    {

        //pocisión 1.5 al final de la hoja
        $this->SetY(-15);
        $this->SetFont("Arial", 'B', 8);
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo(), 0, 0, 'C');
    }
}


//CONSULTA A LA BASE DE DATOS
require("../Servicio/conexion.php");
// Asegurarse de que la conexión se estableció correctamente
if (mysqli_connect_errno()) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Consulta a la base de datos
$consulta = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
    die('Error en la consulta: ' . mysqli_error($conexion));
}

//HACEMOS REFERENCIA A LA BD
$pdf = new PDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

while ($row = mysqli_fetch_assoc($resultado)) {
    $pdf->Cell(30, 10, utf8_decode($row['nom_Usu']) , 1, 0, 'C');//utf8_decode($row['nombre'])  ---- Acentos
    $pdf->Cell(40, 10, utf8_decode($row['ap_Usu']) , 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode($row['am_Usu']) , 1, 0, 'C');
    $pdf->Cell(100, 10, $row['correo_Usu'], 1, 0, 'C');
    $pdf->Cell(50, 10, $row['tel_Usu'], 1, 0, 'C');
    $pdf -> Ln(10);
}

$pdf->Output(); //Permite la salida d elos datos
