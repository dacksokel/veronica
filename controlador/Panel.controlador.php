<?php

class PanelControlador{

    
    function __construct(){
        session_start();
    }
    public function index(){    
        if($_SESSION["tipo"] == "Administrador"){
            include 'vistas/layout/head.php';
            include 'vistas/panel/admin.php';
            include 'vistas/layout/footer.php';
        }
        else if($_SESSION["tipo"] == "Operador"){
            include 'vistas/layout/head.php';
            include 'vistas/panel/operador.php';
            include 'vistas/layout/footer.php';
        }
        else if($_SESSION["tipo"] == "Director"){
            include 'vistas/layout/head.php';
            include 'vistas/panel/director.php';
            include 'vistas/layout/footer.php';
        }
    }

    public function mision(){
        include 'vistas/layout/head.php';
        include 'vistas/panel/mision.php';
        include 'vistas/layout/footer.php';
    }
    public function vision(){
        include 'vistas/layout/head.php';
        include 'vistas/panel/vision.php';
        include 'vistas/layout/footer.php';
    }
    public function resena(){
        include 'vistas/layout/head.php';
        include 'vistas/panel/resena.php';
        include 'vistas/layout/footer.php';
    }
     
}


?>