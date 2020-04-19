<?php
require_once 'modelos/historial.php';
class HistorialControlador{

    private $modeloHistorial;


   function __construct(){
    session_start();
    $this->modeloHistorial = new Historial();
   }
    public function index(){
        $datosH = $this->modeloHistorial->getDatosH();
        $tbody = "";
        $contador = 0;
        foreach ($datosH as $historial) {
            $contador++;
                $tbody .='
                <tr>
                    <th scope="row">'.$contador.'</th>
                    <td>'.$historial->usuario.'</td>
                    <td>'.$historial->accion.'</td>
                    <td>'.$historial->faccion.'</td>
                    <td>'.$historial->hora.'</td>
                </tr>';
            }
        include 'vistas/layout/head.php';
        include 'vistas/historial/index.php';
        include 'vistas/layout/footer.php';
    }

    public function descargar(){
        include 'vistas/historial/descargar_historial.php';
    }



}


?>