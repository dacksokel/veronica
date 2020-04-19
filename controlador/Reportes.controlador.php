<?php

class ReportesControlador{

    function __construct(){
        session_start();    
    }
    public function index(){

        include 'vistas/layout/head.php';
        include 'vistas/reportes/index.php';
        include 'vistas/layout/footer.php';
    }

    public function primaria(){
        include 'vistas/reportes/reporteprimari.php';
    }
    public function general(){
        include 'vistas/reportes/reportegeneral.php';
    }
    public function inicial(){
        include 'vistas/reportes/reporteinicial.php';
    }
    public function personalizado(){
        include 'vistas/reportes/reportepersonalizado.php';
    }
    

}



?>