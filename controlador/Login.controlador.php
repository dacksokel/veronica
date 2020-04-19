<?php
require_once 'modelos/Login.php';

class LoginControlador{
    private $modelo;
    public function __construct(){
        $this->modelo = new LoginModelo();
    }

    public function index(){
        if(isset($_REQUEST["usuario"]) && isset($_REQUEST["pass"]) || isset($_SESSION["usuario"])){
            if($this->modelo->loginOn()){
                header('location:?c=Panel&a=Index');
            }                
        } 
        else{
            include 'vistas/layout/head.php';
            include 'vistas/login/login.php';
            include 'vistas/layout/footer.php';
            

        }
    }
    public function loginout(){
        session_start();
        session_destroy();
        header("Location: /");
    }



}




?>