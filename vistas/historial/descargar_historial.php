<?php
require("core/pdf/fpdf.php");
// require("php/crear_historial.php");
require("config/db.php");
$peticion = "SELECT * FROM historial"; // Peticion que se hara a la Base de Dato
$resultado = $con->query($peticion);
$con->close();
$tablahistorial = "";

// crear_historial($_SESSION["usuario"],"El Usuario: ".$_SESSION["usuario"]." ha descargado el historial",$_SESSION["cedula"]);
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(10);
        // Title
        $this->Cell(0,10,'Historial del Sistema',1,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',9);
foreach ($resultado as $tabla) {        
        # code...
    $pdf->Cell(0,10, $tabla["id_histo"].' '.$tabla["usuario"].' '.$tabla["accion"].' '.$tabla["faccion"].' '.$tabla["hora"].'
    ',0,1);
}

    
$pdf->Output();


echo '
    <script>
        alert("descargar el historial");
        // window.location.href = "historial.php";
    </script>
';
?>