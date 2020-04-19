<?php

class RecuperarpassControlador {
    public $model;
    public function __construct()
    {

    }

    public function Index(){
        include 'vistas/layout/head.php';
        include 'vistas/login/recuperar_pass.php';
        include 'vistas/layout/footer.php';
    }
}
?>