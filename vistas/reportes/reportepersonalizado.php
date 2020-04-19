<?php
require("../php/pdf/fpdf.php");
require("../php/crear_historial.php");
require("../config/db.php");
$peticion = "SELECT * FROM estudiante"; // Peticion que se hara a la Base de Dato
$resultado = $con->query($peticion);
$con->close();
session_start();

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
        $this->Cell(0,10,'Reporte Personalizado del Sistema',1,0,'C');
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
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',9);
foreach ($resultado as $tabla) {        
        # code...
        if(isset($_POST["masculino"])){
            if($tabla["sexo"] == "M"){
                $pdf->Cell(0,10, $tabla["nom1_estu"].' '.$tabla["nom2_estu"].' '.$tabla["ape1_estu"].' '.$tabla["ape2_estu"].' '.$tabla["ci_esco"].'
                '.$tabla["fnacimiento"].' '.$tabla["discapacidad"].' '.$tabla["espe_discapacidad"].' '.$tabla["grado"].' '.$tabla["seccion"].' '.$tabla["estado_estu"],0,1);
            }
            
        }
        if(isset($_POST["femenino"])){
            if($tabla["sexo"] == "F"){
                $pdf->Cell(0,10, $tabla["nom1_estu"].' '.$tabla["nom2_estu"].' '.$tabla["ape1_estu"].' '.$tabla["ape2_estu"].' '.$tabla["ci_esco"].'
                '.$tabla["fnacimiento"].' '.$tabla["discapacidad"].' '.$tabla["espe_discapacidad"],0,1);
            }
        }
        if(isset($_POST["grados"])){
           // echo empty($_POST["grados_e"]);
            // if($tabla["grados"] == $_POST["gradosE"]){
            //     $pdf->Cell(0,10, $tabla["nom1_estu"].' '.$tabla["nom2_estu"].' '.$tabla["ape1_estu"].' '.$tabla["ape2_estu"].' '.$tabla["ci_esco"].'
            //     '.$tabla["fnacimiento"].' '.$tabla["discapacidad"].' '.$tabla["espe_discapacidad"].' '.$tabla["grado"].' '.$tabla["seccion"].' '.$tabla["estado_estu"],0,1);
            // }
        }
    
}

    
$pdf->Output();


echo'
    <script>
        //alert("Descarga reporte personal");
        //window.location.href = "../vistareportes.php";
    </script>
';
?>