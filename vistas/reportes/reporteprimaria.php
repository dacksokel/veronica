<?php
require('core/pdf/fpdf.php');
require("config/db.php");

class PDF extends FPDF
{

    // tabla con colores
    function FancyTable($colorB,$w,$w2,$w3,$header,$header2,$header3,$datos_e,$w_datos)
    {
        // Colors, line width and bold font
        
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Header        
        for($i=0;$i<count($header);$i++){
            $this->SetFillColor($colorB[$i][0],$colorB[$i][1],$colorB[$i][2]);
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        }
        $this->Ln();

        // Colors, line width and bold font
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(0);
        $this->SetFont('');
        //Header 2
        for($i=0;$i<count($header2);$i++){
            if($header2[$i] != ''){
                $this->Cell($w2[$i],7,$header2[$i],1,0,'C',true);
            }else{
                $this->Cell($w2[$i],7,$header2[$i],0,0,'C',true);
            }
        }
            
        $this->Ln();


        //Header 3
        for($i=0;$i<count($header3);$i++){
            if($header3[$i] != ''){
                $this->Cell($w3[$i],7,$header3[$i],1,0,'C',true);
            }else{
                $this->Cell($w3[$i],7,$header3[$i],0,0,'C',true);
            }
            
        }
        $this->Ln();
        //Header 4 datos
        for($i=0;$i<count($datos_e);$i++){
            $this->Cell($w_datos[$i],7,$datos_e[$i],1,0,'C',true);            
        }
         
        $this->Ln();
        $fill = false;
        $this->Cell(array_sum($w),0,'','T');
    }

    function Header()
    {
        date_default_timezone_set('America/New_York');
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $ano = date("Y");
        $mes = $meses[date('n')-1];
        // Logo
        $this->Image('assets/img/logo_ministerio.png',10,0,360,25);
         // Line break
         $this->Ln(10);
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Title
        $this->Cell(130);
        $this->Cell(50,10,'MOVIMIENTO MATRICULAR MENSUAL PRIMARIA '.$ano.' - '.($ano+1),0,0,'C');
        $this->Ln(10);
        $this->Cell(10,10,'MUNICIPIO: Bermudez',0,0);
        // Line break
        $this->Ln(5);
        $this->Cell(10,10,'MES: '.$mes.' '.$ano,0,0);
        //
        $this->Ln(5);
        $this->Cell(10,10,'INSTITUCION: U.E.Boliv Pedro Elias Aristeguieta',0,0);
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
        $this->Cell(0,10,'Pagina '.$this->PageNo().'',0,0,'C');
    }
}
// datos para el pdf


// aqui comienza la creacion del pdf
$pdf = new PDF('L','mm',array(200,370));
// Column headings
$header_0 = array('Matricula Inicial', '1 Nivel', '2 Nivel', '3 Nivel');
$w0 = array(30, 73, 73, 73);

$header_5 = array('M', 'F', 'T','M','F','T','INCORPOR','ABANDONO','TOTAL','M', 'F', 'T','INCORPOR','ABANDONO','TOTAL','M', 'F', 'T','INCORPOR','ABANDONO','TOTAL');
$w_3 = array(10,10,10,5,5,5,22,22,14,5,5,5,22,22,14,5,5,5,22,22,14);

$cabecera3 = array(' ','M','F','M','F','INC','AB',' ','M','F','M','F','INC','AB',' ','M','F','M','F','INC','AB' );
$w3_3 = array(45, 10,12,10,12,8,6, 15, 10,12,10,12,8,6, 15, 10,12,10,12,8,6, 15, );

$header_1 = array('Matricula Inicial', '1ERO', '2DO', '3ER','4TO');
$w = array(30, 73, 73, 73,73);
$header_2 = array('5TO','6TO',' TOTALES GENERALES','MATRICULA FINAL','TOTAL');
$w2 = array(73,73,90,40,20);

$header_3 = array('M', 'F', 'T','M','F','T','INCORPOR','ABANDONO','TOTAL','M', 'F', 'T','INCORPOR','ABANDONO','TOTAL','M', 'F', 'T','INCORPOR','ABANDONO','TOTAL','M', 'F', 'T','INCORPOR','ABANDONO','TOTAL');
$w_1 = array(10,10,10,5,5,5,22,22,14,5,5,5,22,22,14,5,5,5,22,22,14,5,5,5,22,22,14);
$header_4 = array('M', 'F', 'T','INCORPOR','ABANDONO','TOTAL','M','F','T','INCORPOR','ABANDONO','TOTAL','TOTAL', 'T.INC', 'T.ABA','M', 'F', ' ');
$w_2 = array(5,5,5,22,22,14, 5,5,5,22,22,14, 30,30,30, 20,20, 20);

$colores1 = array([255,0,0],[0,255,255],[255,255,0],[0,255,0],[255,0,255]);
$colores2 = array([255,255,153],[0,184,255],[174,207,0],[153,153,255],[255,255,255]);

$cabecera = array(' ','M','F','M','F','INC','AB',' ','M','F','M','F','INC','AB',' ','M','F','M','F','INC','AB',' ','M','F','M','F','INC','AB' );
$w3_1 = array(45, 10,12,10,12,8,6, 15, 10,12,10,12,8,6, 15, 10,12,10,12,8,6, 15, 10,12,10,12,8,6);
$cabecera2 = array(' ','M','F','M','F','INC','AB',' ','M','F','M','F','INC','AB','M','F','T.G','M','F','T.INC','M','F','T.ABA',' ' );
$w3_2 = array(15, 10,12,10,12,8,6, 15, 10,12,10,12,8,6, 10,10,10 ,10,10,10 ,10,10,10,60);

// Data loading
$peticion = "SELECT * FROM estudiante"; // Peticion que se hara a la Base de Dato
$resultado = $con->query($peticion);
$con->close();

//preeescolar
$primernivelF = $segundonivelF = $tercernivelF = 0;
$primernivelM = $segundonivelM = $tercernivelM = 0;
$primernivelT = $segundonivelT = $tercernivelT = 0;

$primernivelFA = $segundonivelFA = $tercernivelFA = 0;
$primernivelMA = $segundonivelMA = $tercernivelMA = 0;
$primernivelTA = $segundonivelTA = $tercernivelTA = 0;


$primernivelFR = $segundonivelFR = $tercernivelFR = 0;
$primernivelMR = $segundonivelMR = $tercernivelMR = 0;
$primernivelTR = $segundonivelTR = $tercernivelTR = 0;

// $primernivel = $segundonivel = $tercernivel = 0;
//primaria
$primerGM = $segundoGM = $tercerGM = $cuartoGM = $quintoGM = $sextoGM = 0;
$primerGF = $segundoGF = $tercerGF = $cuartoGF = $quintoGF = $sextoGF = 0;
$primerGT = $segundoGT = $tercerGT = $cuartoGT = $quintoGT = $sextoGT = 0;

$primerGM_A = $segundoGM_A = $tercerGM_A= $cuartoGM_A= $quintoGM_A= $sextoGM_A= 0;
$primerGF_A = $segundoGF_A = $tercerGF_A = $cuartoGF_A = $quintoGF_A = $sextoGF_A = 0;
$primerGT_A = $segundoGT_A = $tercerGT_A = $cuartoGT_A = $quintoGT_A = $sextoGT_A = 0;

$primerGM_R = $segundoGM_R = $tercerGM_R= $cuartoGM_R= $quintoGM_R= $sextoGM_R= 0;
$primerGF_R = $segundoGF_R = $tercerGF_R = $cuartoGF_R = $quintoGF_R = $sextoGF_R = 0;
$primerGT_R = $segundoGT_R = $tercerGT_R = $cuartoGT_R = $quintoGT_R = $sextoGT_R = 0;


$totalE =$totalF = $totalM = 0;
foreach ($resultado as $tabla) {
    if($tabla["sexo"] == "M"){
        if($tabla["grado"] == "primergrado"){
            $primerGM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $primerGM_A ++ ;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $primerGM_R ++;
            }
        }elseif($tabla["grado"] == "segundogrado"){
            $segundoGM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $segundoGM_A ++ ;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $segundoGM_R ++;
            }
        }elseif($tabla["grado"] == "tercergrado"){
            $tercerGM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $tercerGM_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $tercerGM_R++;
            }
        }elseif($tabla["grado"] == "cuartogrado"){
            $cuartoGM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $cuartoGM_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $cuartoGM_R++;
            }
        }elseif($tabla["grado"] == "quintogrado"){
            $quintoGM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $quintoGM_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $quintoGM_R++;
            }
        }elseif($tabla["grado"] == "sextogrado"){
            $sextoGM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $sextoGM_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $sextoGM_R++;
            }
        }elseif($tabla["grado"] == "primernivel"){
            $primernivelM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $primernivelMA++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $primernivelMR++;
            }
        }
        elseif($tabla["grado"] == "segundonivel"){
            $segundonivelM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $segundonivelMA++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $segundonivelMR++;
            }
        }elseif($tabla["grado"] == "tercernivel"){
            $tercernivelM ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $tercernivelMA++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $tercernivelMR++;
            }
        }
    }elseif($tabla["sexo"] == "F"){
        if($tabla["grado"] == "primergrado"){
            $primerGF ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $primerGF_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $primerGF_R++;
            }
        }elseif($tabla["grado"] == "segundogrado"){
            $segundoGF ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $segundoGF_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $segundoGF_R++;
            }
        }elseif($tabla["grado"] == "tercergrado"){
            $tercerGF ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $tercerGF_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $tercerGF_R++;
            }
        }elseif($tabla["grado"] == "cuartogrado"){
            $cuartoGF ++;
             if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $cuartoGF_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $cuartoGF_R++;
            }
        }elseif($tabla["grado"] == "quintogrado"){
            $quintoGF ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $quintoGF_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $quintoGF_R++;
            }
        }elseif($tabla["grado"] == "sextogrado"){
            $sextoGF ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $sextoGF_A++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $sextoGF_R++;
            }
        }elseif($tabla["grado"] == "primernivel"){
            $primernivelF ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $primernivelFA++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $primernivelFR++;
            }
        }
        elseif($tabla["grado"] == "segundonivel"){
            $segundonivelF ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $segundonivelFA++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $segundonivelFR++;
            }
        }elseif($tabla["grado"] == "tercernivel"){
            $tercernivelF ++;
            if($tabla["estado_estu"] =="Activo" || $tabla["estado_estu"] == "Reingresado"){
                $tercernivelFA++;
            }elseif($tabla["estado_estu"] == "Inactivo" || $tabla["estado_estu"] == "Retirado"){
                $tercernivelFR++;
            }
        }
    }
}


$primerGT = $primerGF +$primerGM;
$segundoGT = $segundoGF+$segundoGM;
$tercerGT = $tercerGF + $tercerGM;
$cuartoGT = $cuartoGF + $cuartoGM;
$quintoGT = $quintoGF+ $quintoGM;
$sextoGT = $sextoGF +$sextoGM;

$primerGT_A = $primerGF_A +$primerGM_A;
$segundoGT_A = $segundoGF_A +$segundoGM_A;
$tercerGT_A = $tercerGF_A + $tercerGM_A;
$cuartoGT_A = $cuartoGF_A + $cuartoGM_A;
$quintoGT_A = $quintoGF_A + $quintoGM_A;
$sextoGT_A = $sextoGF_A + $sextoGM_A;

$primerGT_R = $primerGF_R +$primerGM_R;
$segundoGT_R = $segundoGF_R +$segundoGM_R;
$tercerGT_R = $tercerGF_R + $tercerGM_R;
$cuartoGT_R = $cuartoGF_R + $cuartoGM_R;
$quintoGT_R = $quintoGF_R + $quintoGM_R;
$sextoGT_R = $sextoGF_R + $sextoGM_R;

$primernivelT = $primernivelF + $primernivelM;
$segundonivelT = $segundonivelF +$segundonivelM;
$tercernivelT = $tercernivelF + $tercernivelM;

$primernivelTA = $primernivelFA + $primernivelMA;
$segundonivelTA = $segundonivelFA +$segundonivelMA;
$tercernivelTA= $tercernivelFA + $tercernivelMA;

$primernivelTR = $primernivelFR + $primernivelMR;
$segundonivelTR = $segundonivelFR +$segundonivelMR;
$tercernivelTR = $tercernivelFR + $tercernivelMR;

$total_preescolar = $primernivelT + $segundonivelT + $tercernivelT;
$total_preescolarF = $primernivelF + $segundonivelF + $tercernivelF;
$total_preescolarM = $primernivelM + $segundonivelM + $tercernivelM;


$totalF_primaria = $primerGF +$segundoGF +$tercerGF +$cuartoGF+ $quintoGF+$sextoGF;
$totalM_primaria = $primerGM + $segundoGM + $tercerGM + $cuartoGM +$quintoGM +$sextoGM;

$totalE_primaria = $totalF_primaria + $totalM_primaria;

$datosE_1 = array($totalE_primaria, $totalF_primaria,$totalM_primaria,$primerGM,$primerGF,$primerGT,$primerGM_A,$primerGF_A,$primerGM_R,$primerGF_R,$primerGT_A,$primerGT_R,$segundoGM,$segundoGF,$segundoGT,$segundoGM_A,$segundoGF_A,$segundoGM_R,$segundoGF_R,$segundoGT_A,$segundoGT_R, $tercerGM,$tercerGF,$tercerGT,$tercerGM_A,$tercerGF_A,$tercerGM_R,$tercerGF_R,$tercerGT_A,$tercerGT_R,$cuartoGM,$cuartoGF,$cuartoGT,$cuartoGM_A,$cuartoGF_A,$cuartoGM_R,$cuartoGF_R,$cuartoGT_A,$cuartoGT_R);
$w_datos = array(10,10,10, 5,5,5,10,12,10,12,8,6, 5,5,5,10,12,10,12,8,6, 5,5,5,10,12,10,12,8,6, 5,5,5,10,12,10,12,8,6);

$datosE_2 =array($quintoGM,$quintoGF,$quintoGT,$quintoGM_A,$quintoGF_A,$quintoGM_R,$quintoGF_R,$quintoGT_A,$quintoGT_R,$sextoGM,$sextoGF,$sextoGT,$sextoGM_A,$sextoGF_A,$sextoGM_R,$sextoGF_R,$sextoGT_A,$sextoGT_R,'','','','','','','','','',$totalM_primaria,$totalF_primaria,$totalE_primaria);
$w_datos_2 = array(5,5,5,10,12,10,12,8,6, 5,5,5,10,12,10,12,8,6, 10,10,10 ,10,10,10 ,10,10,10,20,20,20);


$datosE_3 = array($total_preescolarM,$total_preescolarF,$total_preescolar,$primernivelM,$primernivelF,$primernivelT,$primernivelMA,$primernivelFA,$primernivelMR,$primernivelFR,$primernivelTA,$primernivelTR, $segundonivelM,$segundonivelF,$segundonivelT,$segundonivelMA,$segundonivelFA,$segundonivelMR,$segundonivelFR,$segundonivelTA,$segundonivelTR, $tercernivelM,$tercernivelF,$tercernivelT,$tercernivelMA,$tercernivelFA,$tercernivelMR,$tercernivelFR,$tercernivelTA,$tercernivelTR);
$w_datos_3 = array(10,10,10, 5,5,5,10,12,10,12,8,6, 5,5,5,10,12,10,12,8,6, 5,5,5,10,12,10,12,8,6, 5,5,5,10,12,10,12,8,6);

$pdf->SetFont('Arial','',10);
$pdf->AddPage();
// $pdf->BasicTable($header,$data);
// $pdf->AddPage();
// $pdf->FancyTable($colores1,$w0,$w_3,$w3_3,$header_0,$header_5,$cabecera3,$datosE_3,$w_datos_3);
// $pdf->AddPage();
$pdf->FancyTable($colores1,$w,$w_1,$w3_1,$header_1,$header_3,$cabecera,$datosE_1,$w_datos);
$pdf->Ln(10);
$pdf->AddPage();
$pdf->FancyTable($colores2,$w2,$w_2,$w3_2,$header_2,$header_4,$cabecera2,$datosE_2,$w_datos_2);
$pdf->Output();


?>