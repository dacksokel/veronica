<?php

if($_POST["peticion"] == "crear_periodo_escolar"){
    echo crear_periodo_escolar($_POST["inicio"], $_POST["final"]);
}else if($_POST["peticion"] == "obtener_periodo_escolar"){
    echo obtener_periodo();
}

function crear_periodo_escolar($inicio,$final){
    require("../config/db.php");
    //require("../php/crear_historial.php");
    $peticion = "SELECT * FROM periodo_escolar"; // Peticion que se hara a la Base de Dato
    $peticion2 = "INSERT INTO periodo_escolar (inicio,final) VALUES ('$inicio','$final')"; 
    $resultado = $con->query($peticion);
    $mensaje = "no existe";
    foreach ($resultado as $tabla) {
        $mensaje =  $tabla["inicio"];
        if($tabla["inicio"] != $inicio || $tabla["inicio"] == "" || $tabla["inicio"] == Null){
            if($con->query($peticion2) === True){
                $mensaje = "creado Exitosamente";
            }else{
                $mensaje = "error al Crear Periodo Escolar";
            }            
        }else{
            $mensaje="Este Periodo Escolar ya esta registrado";
        }
     
    }
    $con->close();
    return $mensaje;
}

function obtener_periodo(){
    require("../config/db.php");
    //require("../php/crear_historial.php");
    $peticion = "SELECT * FROM periodo_escolar"; // Peticion que se hara a la Base de Dato    
    $resultado = $con->query($peticion);
    $con->close();
    $mensaje = "no existe";
    foreach ($resultado as $tabla) {
        $mensaje = '
        {
            "inicio":"'.$tabla["inicio"].'",
            "final":"'.$tabla["final"].'"
        }';
    }
    
    return $mensaje;
}

?>