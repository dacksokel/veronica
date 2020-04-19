<?php

if($_POST["peticion"] == "obtener_todos_datos_persona"){
require("../config/db.php");
$peticion_2 = "SELECT * FROM personal"; // Peticion que se hara a la Base de Dato
$resultado_2 = $con->query($peticion_2);
$con->close();

$datos_persona = "";

foreach ($resultado_2 as $tabla) {
    $datos_persona .='
    "'.$tabla["id_perso"].'":{"nombre":"'.$tabla["nom_perso"].'","apellido":"'.$tabla["ape_perso"].'","cedula":"'.$tabla["ci_perso"].'","fecha":"'.$tabla["fnacimiento"].'","direccion":"'.$tabla["direccion"].'"},';
}


echo '{'.$datos_persona.'"vacio":{}}';

}else if($_POST["peticion"] == "obtener_todos_datos_usuarios"){
    require("../config/db.php");
    $peticion_1 = "SELECT * FROM usuario"; // Peticion que se hara a la Base de Dato
    $resultado_1 = $con->query($peticion_1);
    $con->close();
    
    $datos_usuario = "";

    foreach ($resultado_1 as $tabla) {
        $datos_usuario .= '
            "'.$tabla["id_usu"].'" : 
            {  "usuario":"'.$tabla["nom_usu"].'",
                "pass":"'.$tabla["pass"].'",
                "tipo":"'.$tabla["tipo_usu"].'",
                "estado":"'.$tabla["estado_usu"].'",
                "pregunta":"'.$tabla["pregunta"].'",
                "respuesta":"'.$tabla["respuesta"].'",
                "cedula":"'.$tabla["ci_perso"].'"    
            },';
    }
    
echo '{'.$datos_usuario.'"vacio":{}}';

}else if($_POST["peticion"] == "obtener_todos_estudiantes"){
    require("../config/db.php");
    $peticion_1 = "SELECT * FROM estudiante"; // Peticion que se hara a la Base de Dato
    $resultado_1 = $con->query($peticion_1);
    $con->close();
    
    $datos_estudiantes = "";

    foreach ($resultado_1 as $tabla) {
        $datos_estudiantes .= '
            "'.$tabla["id_estu"].'" : 
            {  "nom1_estu":"'.$tabla["nom1_estu"].'",
                "nom2_estu":"'.$tabla["nom2_estu"].'",
                "ape1_estu":"'.$tabla["ape1_estu"].'",
                "ape2_estu":"'.$tabla["ape2_estu"].'",
                "ci_esco":"'.$tabla["ci_esco"].'",
                "c_identi":"'.$tabla["c_identi"].'",
                "sexo":"'.$tabla["sexo"].'",
                "fnacimiento":"'.$tabla["fnacimiento"].'",
                "discapacidad":"'.$tabla["discapacidad"].'",
                "espe_discapacidad":"'.$tabla["espe_discapacidad"].'",
                "grado":"'.$tabla["grado"].'",
                "seccion":"'.$tabla["seccion"].'",
                "id_periodo":"'.$tabla["id_periodo"].'",
                "estado_estu":"'.$tabla["estado_estu"].'",
                "ci_repre":"'.$tabla["ci_repre"].'"
            },';
    }
    
echo '{'.$datos_estudiantes.'"vacio":{}}';

}else if($_POST["peticion"] == "obtener_todos_representante"){
    require("../config/db.php");
    $peticion_1 = "SELECT * FROM representante"; // Peticion que se hara a la Base de Dato
    $resultado_1 = $con->query($peticion_1);
    $con->close();
    
    $datos_representante = "";

    foreach ($resultado_1 as $tabla) {
        $datos_representante .= '
            "'.$tabla["id_repre"].'" : 
            {  "nom1_repre":"'.$tabla["nom1_repre"].'",
                "nom2_repre":"'.$tabla["nom2_repre"].'",
                "ape1_repre":"'.$tabla["ape1_repre"].'",
                "ape2_repre":"'.$tabla["ape2_repre"].'",
                "ci_repre":"'.$tabla["ci_repre"].'",
                "direccion":"'.$tabla["direccion"].'",
                "telefono":"'.$tabla["telefono"].'"                
            },';
    }
    
echo '{'.$datos_representante.'"vacio":{}}';

}
    
?>
