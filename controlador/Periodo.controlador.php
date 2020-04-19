<?php
require_once 'modelos/periodo.php';
class PeriodoControlador{

private $modeloPeriodo;
    function __construct(){
        session_start();
        $this->modeloPeriodo = new Periodo();
    
    }

    public function index(){
        $periodo = $this->modeloPeriodo->getALL();
        $tbody = "";
        $contador = 0;

            foreach ($periodo as $tabla) {
                $tbody.='
                    <td>
                    <center>
                    '.$tabla->inicio.' - '.$tabla->final.'
                    </center>
                    
                    </td>
                    <td>
                    <center>
                    Activo 
                    </center></td>
                ';
            }

        include 'vistas/layout/head.php';
        include 'vistas/periodo/index.php';
        include 'vistas/layout/footer.php';

    }






}


?>