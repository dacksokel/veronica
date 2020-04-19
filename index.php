<?php

$controlador = 'login';

if(!isset($_REQUEST['c'])){
    include_once "controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador).'controlador';
    $controlador = new LoginControlador();
    $controlador->index();
}else{
    // Obtenemos el controlador que queremos cargar
    $controlador = strtolower($_REQUEST['c']);
    // echo $controlador;
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    // echo $accion;
    // Instanciamos el controlador
    include_once "controlador/$controlador.controlador.php";
    $controlador = ucwords($controlador).'Controlador';
    $controlador = new $controlador;
    
    // Llama la accion
    call_user_func( array( $controlador, $accion ) );
}
?>