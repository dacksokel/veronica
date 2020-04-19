<?php
// session_start();
if($_POST["peticion"] == "cedula"){    
    echo verificar_cedula($_POST["cedula"]);
}elseif($_POST["peticion"] == "crear_estudiantes"){
    echo crear_estudiante($_POST["nombre1"],$_POST["nombre2"],$_POST["apellido1"],$_POST["apellido2"],$_POST["cedula_escolar"],$_POST["cedula_personal"],$_POST["sexo"],$_POST["fnacimiento"],$_POST["discapacidad_pregunta"],$_POST["descripcion_discapacidad"],$_POST["grado"],$_POST["seccion"],$_POST["periodo"],$_POST["cedula_representante"]) ;
}elseif($_POST["peticion"] == "obtener_datos_estudiante"){
    echo obtener_datos_estudiante($_POST["cedula"]);
}elseif($_POST["peticion"] == "entrar_modificar_estudiante"){

    echo obtener_datos_estudiante_por_id($_POST["id"]);
}elseif($_POST["peticion"] == "actualizar_datos_estudiante"){
    echo actualizar_datos_estudiante($_POST["nombre1"],$_POST["nombre2"],$_POST["apellido1"],$_POST["apellido2"],$_POST["cedula_escolar"],$_POST["cedula_personal"],$_POST["sexo"],$_POST["fnacimiento"],$_POST["discapacidad_pregunta"],$_POST["descripcion_discapacidad"],$_POST["grado"],$_POST["seccion"],$_POST["periodo"],$_POST["cedula_representante"],$_POST["estado_estudiante"],$_POST["id"]);
}elseif($_POST["peticion"] == "motivo_egreso_estudiante"){
   actualizar_datos_estudiante($_POST["nombre1"],$_POST["nombre2"],$_POST["apellido1"],$_POST["apellido2"],$_POST["cedula_escolar"],$_POST["cedula_personal"],$_POST["sexo"],$_POST["fnacimiento"],$_POST["discapacidad_pregunta"],$_POST["descripcion_discapacidad"],$_POST["grado"],$_POST["seccion"],$_POST["periodo"],$_POST["cedula_representante"],$_POST["estado_estudiante"],$_POST["id"]);
   echo motivo_egreso_estudiante($_POST["cedula_escolar"],$_POST["m_e_e"],$_POST["fecha_actual"],$_POST["periodo"]);
}
else{
    $cedula = $nombre = $nombre2 = $apellido1 = $apellido2 = $direccion = $telefono = "";
}
// function verificar_cedula($cedula){
//     require("../config/db.php");
//     //require("../php/crear_historial.php");
//     $peticion = "SELECT * FROM estudiante"; // Peticion que se hara a la Base de Dato
//     $resultado = $con->query($peticion);
//     $con->close();
//     $mensaje = "no existe";
//     foreach ($resultado as $tabla) {
//         if($tabla["ci_esco"] == $cedula){
//             $mensaje = "existe";
//             //crear_historial($_SESSION["usuario"],"El usuario: ".$_SESSION["usuario"]." ha  si existe el Estudiante de Cedula: ".$cedula,$_SESSION["cedula"]);
//         }
//         # code...
//     }
//     return $mensaje;
// }

// function crear_estudiante($nombre1,$nombre2,$apellido1,$apellido2,$cedula_escolar,$cedula_personal,$sexo,$fnacimiento,$discapacidad,$descrip_discapacidad,$grado,$seccion,$periodo,$ci_repre){
//     require("../config/db.php");
//     //require("../php/crear_historial.php");
//     $estado = "Inactivo";
//     $peticion = "INSERT INTO estudiante (nom1_estu,nom2_estu,ape1_estu,ape2_estu,ci_esco,c_identi,sexo,fnacimiento,discapacidad,espe_discapacidad,grado,seccion,id_periodo,estado_estu,ci_repre) VALUES ('$nombre1','$nombre2','$apellido1','$apellido2','$cedula_escolar','$cedula_personal','$sexo','$fnacimiento','$discapacidad','$descrip_discapacidad','$grado','$seccion','$periodo','$estado','$ci_repre')"; 
//     $mensaje = "";
//     if($con->query($peticion) === true){
//         $mensaje = "exito";
//         //crear_historial($_SESSION["usuario"],"El usuario: ".$_SESSION["usuario"]." ha Creado al Estudiante: ".$nombre1." con Cedula Escolar: ".$cedula_escolar." y Cedula Personal: ".$cedula_personal,$_SESSION["cedula"]);
//     }else{
//         $mensaje = "El Estudiante no se a podido crear por esta razon: ".$con->error;
//     }
//     $con->close();
//     return $mensaje;
// }

function obtener_datos_estudiante($cedula){
    
    return $mensaje;
}

function obtener_datos_estudiante_por_id($id){
    require("../config/db.php");
    //require("../php/crear_historial.php");
    $peticion = "SELECT * FROM estudiante"; // Peticion que se hara a la Base de Dato
    $resultado = $con->query($peticion);
    $con->close();
    $estudiante = "no existe";
    $cedula_representante = "";
    foreach ($resultado as $tabla) {
        if($tabla["id_estu"] == $id){
            $estudiante = '
                {
                    "id":"'.$tabla["id_estu"].'",
                    "nombre1":"'.$tabla["nom1_estu"].'",
                    "nombre2":"'.$tabla['nom2_estu'].'",
                    "apellido1":"'.$tabla['ape1_estu'].'",
                    "apellido2":"'.$tabla['ape2_estu'].'",
                    "cedula_escolar":"'.$tabla['ci_esco'].'",
                    "cedula_persona":"'.$tabla['c_identi'].'",
                    "sexo":"'.$tabla['sexo'].'",
                    "fnacimiento":"'.$tabla['fnacimiento'].'",
                    "discapacidad":"'.$tabla['discapacidad'].'",
                    "espe_discapacidad":"'.$tabla['espe_discapacidad'].'",
                    "grado":"'.$tabla['grado'].'",
                    "seccion":"'.$tabla['seccion'].'",
                    "periodo":"'.$tabla['id_periodo'].'",
                    "estado":"'.$tabla['estado_estu'].'",
                    "ci_representante":"'.$tabla['ci_repre'].'"
                }';
            $cedula_representante = $tabla["ci_repre"];
            //crear_historial($_SESSION["usuario"],"El usuario: ".$_SESSION["usuario"]." ha  si existe el Estudiante de Cedula: ".$cedula,$_SESSION["cedula"]);
        }
        # code...
    }
    
    return $estudiante;
}

// function actualizar_datos_estudiante($nombre1,$nombre2,$apellido1,$apellido2,$cedula_escolar,$cedula_personal,$sexo,$fnacimiento,$discapacidad,$descrip_discapacidad,$grado,$seccion,$periodo,$ci_repre,$estado,$id){
//     require("../config/db.php");
//     $mensaje = "Error no guardo nada";
//     $peticion = "UPDATE estudiante SET nom1_estu='$nombre1',nom2_estu='$nombre2',ape1_estu='$apellido1',ape2_estu='$apellido2',ci_esco='$cedula_escolar',c_identi='$cedula_personal',sexo='$sexo',fnacimiento='$fnacimiento',discapacidad='$discapacidad',espe_discapacidad='$descrip_discapacidad',grado='$grado',seccion='$seccion',id_periodo='$periodo',estado_estu='$estado',ci_repre='$ci_repre' WHERE id_estu=$id ";
//     if($con->query($peticion) === true){
//         $mensaje = "exito";
//     }else{
//         $mensaje = "Error en la actualizacion a la persona ".$con->error;
//     }
//     $con->close();
//     return $mensaje;
// }

// function motivo_egreso_estudiante($cedula_escolar,$motivo,$fecha,$periodo){
//     require("../config/db.php");
//     //require("../php/crear_historial.php");
//     $peticion = "INSERT INTO egresado (ci_esco,motivo,fecha_egre,id_periodo) VALUES ('$cedula_escolar','$motivo','$fecha','$periodo')"; 
//     $mensaje = "";
//     if($con->query($peticion) === true){
//         $mensaje = "exito";
//         //crear_historial($_SESSION["usuario"],"El usuario: ".$_SESSION["usuario"]." ha Creado al Estudiante: ".$nombre1." con Cedula Escolar: ".$cedula_escolar." y Cedula Personal: ".$cedula_personal,$_SESSION["cedula"]);
//     }else{
//         $mensaje = "error: ".$con->error;
//     }
//     $con->close();
//     return $mensaje;
// }



// require("../config/db.php");
// //require("../php/crear_historial.php");
// $peticion = "SELECT * FROM estudiante"; // Peticion que se hara a la Base de Dato
// $resultado = $con->query($peticion);
// $con->close();
// $mensaje = "no existe";
// foreach ($resultado as $tabla) {
//         $mensaje = '
//             {
//                 "id":"'.$tabla["id_estu"].'",
//                 "nombre1":"'.$tabla["nom1_estu"].'",
//                 "nombre2":"'.$tabla['nom2_estu'].'",
//                 "apellido1":"'.$tabla['ape1_estu'].'",
//                 "apellido2":"'.$tabla['ape2_estu'].'",
//                 "cedula_escolar":"'.$tabla['ci_esco'].'",
//                 "cedula_persona":"'.$tabla['c_identi'].'",
//                 "sexo":"'.$tabla['sexo'].'",
//                 "fnacimiento":"'.$tabla['fnacimiento'].'",
//                 "discapacidad":"'.$tabla['discapacidad'].'",
//                 "espe_discapacidad":"'.$tabla['espe_discapacidad'].'",
//                 "grado":"'.$tabla['grado'].'",
//                 "seccion":"'.$tabla['seccion'].'",
//                 "periodo":"'.$tabla['id_periodo'].'",
//                 "estado":"'.$tabla['estado_estu'].'",
//                 "ci_representante":"'.$tabla['ci_repre'].'"
//             }
//         ';
//         //crear_historial($_SESSION["usuario"],"El usuario: ".$_SESSION["usuario"]." ha  si existe el Estudiante de Cedula: ".$cedula,$_SESSION["cedula"]);
//     # code...
// }
// echo $mensaje;
?>