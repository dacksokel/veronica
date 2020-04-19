<?php
session_start();
if($_POST["peticion"] == "cedula"){    
    echo verificar_cedula($_POST["cedula"]);
}elseif($_POST["peticion"] == "crear_representante"){
    echo crear_representante($_POST["nombre1"],$_POST["nombre2"],$_POST["apellido1"],$_POST["apellido2"],$_POST["direccion"],$_POST["telefono"],$_POST["cedula"]);
}elseif($_POST["peticion"] == "obtener_datos_representante"){
    echo obtener_datos_representante($_POST["cedula"]);
}elseif ($_POST["peticion"] == "actualizar_datos_representante") {
    echo actualizar_datos_representante($_POST["nombre1"],$_POST["nombre2"],$_POST["apellido1"],$_POST["apellido2"],$_POST["direccion"],$_POST["telefono"],$_POST["cedula"],$_POST["id"]);
}
else{
    $cedula = $nombre = $nombre2 = $apellido1 = $apellido2 = $direccion = $telefono = "";
}
function verificar_cedula($cedula){
    require("../config/db.php");
    //require("../php/crear_historial.php");
    $peticion = "SELECT * FROM representante"; // Peticion que se hara a la Base de Dato
    $resultado = $con->query($peticion);
    $con->close();
    $mensaje = "no existe";
    foreach ($resultado as $tabla) {
        //$mensaje =  $tabla["ci_repre"];
        if($tabla["ci_repre"] == $cedula){
            $mensaje = "existe";
            //crear_historial($_SESSION["usuario"],"El usuario: ".$_SESSION["usuario"]." ha Verificado si existe la Cedula: ".$cedula." de un Representante",$_SESSION["cedula"]);
        }
        # code...
    }
    return $mensaje;
}

function crear_representante($nombre1,$nombre2,$apellido1,$apellido2,$direccion,$telefono,$cedula){
    require("../config/db.php");
    //require("../php/crear_historial.php");
    $peticion = "INSERT INTO representante (nom1_repre,nom2_repre,ape1_repre,ape2_repre,ci_repre, direccion,telefono) VALUES ('$nombre1','$nombre2','$apellido1','$apellido2','$cedula','$direccion','$telefono')"; 
    $mensaje = "";
    if(verificar_cedula($cedula) == "no existe"){
        if($con->query($peticion) === true){
            $mensaje = "exito";
            //crear_historial($_SESSION["usuario"],"El usuario: ".$_SESSION["usuario"]." ha Creado al Representante: ".$nombre1." de Cedula: ".$cedula,$_SESSION["cedula"]);
        }else{
            $mensaje = "el usuario no se a podido crear por esta razon: ".$con->error;
        }
    }
    $con->close();
    return $mensaje;
}

function obtener_datos_representante($cedula){
    require("../config/db.php");
    $peticion = "SELECT * FROM representante"; // Peticion que se hara a la Base de Dato
    $resultado = $con->query($peticion);
    $con->close();
    $representate = "";
    foreach ($resultado as $tabla) {
        if($tabla["ci_repre"] == $cedula){
            $representate = '
                {
                    "id":"'.$tabla["id_repre"].'",
                    "nombre1":"'.$tabla["nom1_repre"].'",
                    "nombre2":"'.$tabla['nom2_repre'].'",
                    "apellido1":"'.$tabla['ape1_repre'].'",
                    "apellido2":"'.$tabla['ape2_repre'].'",
                    "cedula":"'.$tabla['ci_repre'].'",
                    "direccion":"'.$tabla['direccion'].'",
                    "telefono":"'.$tabla['telefono'].'"
                }
            ';
            //crear_historial($_SESSION["usuario"],"El usuario: ".$_SESSION["usuario"]." ha  si existe el Estudiante de Cedula: ".$cedula,$_SESSION["cedula"]);
        }
        # code...
    }
    return $representate;
}

function actualizar_datos_representante($nombre1,$nombre2,$apellido1,$apellido2,$direccion,$telefono,$cedula,$id){
    require("../config/db.php");
    $mensaje = "Error no guardo nada";
    $peticion = "UPDATE representante SET nombre1='$nombre1',nombre2='$nombre2',apellido1='$apellido1',apellido2='$apellido2',ci_repre='$cedula',direccion='$direccion',telefono='$telefono' WHERE id=$id ";
    if($con->query($peticion) === true){
        $mensaje = "exito";
    }else{
        $mensaje = "Error en la actualizacion a la persona";
    }
    $con->close();
    return $mensaje;
}
?>