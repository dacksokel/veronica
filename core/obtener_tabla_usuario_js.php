<?php
require("../config/db.php");
$buscar = $_POST["dato"];
$peticion = "SELECT * FROM usuario"; // Peticion que se hara a la Base de Dato
$resultado = $con->query($peticion);
$con->close();
$tablaUsuarios = Array();
foreach ($resultado as $tabla) {        
    # code...
    if($tabla["nom_usu"] == $buscar){
        if($tabla["estado_usu"] == "Activo"){
            $tablaUsuarios[]="<td>".$tabla["id_usu"]."</td><td>".$tabla["nom_usu"]."</td><td>".$tabla["tipo_usu"]."</td><td class='estadoActivo'>".$tabla["estdo_usu"]."</td><td id=".$tabla["id_usu"]." class='modificar_usuario' onclick='modicar_usuario(".$tabla['id_usu'].")'>Modificar</td></tr>";
        }else{
            $tablaUsuarios[]="<td>".$tabla["id_usu"]."</td><td>".$tabla["nom_usu"]."</td><td>".$tabla["tipo_usu"]."</td><td class='estadoInactivo'>".$tabla["estado_usu"]."</td><td id=".$tabla["id_usu"]." class='modificar_usuario' onclick='modicar_usuario(".$tabla['id_usu'].")'>Modificar</td></tr>";
        }
    }
    if($tabla["estado_usu"] == $buscar){
        if($buscar == "Activo"){
            $tablaUsuarios[]="<td>".$tabla["id_usu"]."</td><td>".$tabla["nom_usu"]."</td><td>".$tabla["tipo"]."</td><td class='estadoActivo'>".$tabla["estado_usu"]."</td><td id=".$tabla["id_usu"]." class='modificar_usuario' onclick='modicar_usuario(".$tabla['id_usu'].")'>Modificar</td></tr>";
        }else{
            $tablaUsuarios[]="<td>".$tabla["id_usu"]."</td><td>".$tabla["nom_usu"]."</td><td>".$tabla["tipo"]."</td><td class='estadoInactivo'>".$tabla["estado_usu"]."</td><td id=".$tabla["id_usu"]." class='modificar_usuario' onclick='modicar_usuario(".$tabla['id_usu'].")'>Modificar</td></tr>";
        }
        
    }
    if($tabla["tipo"] == $buscar){
        if($tabla["estado_usu"] == "Activo"){
            $tablaUsuarios[]="<td>".$tabla["id_usu"]."</td><td>".$tabla["nom_usu"]."</td><td>".$tabla["tipo"]."</td><td class='estadoActivo'>".$tabla["estado_usu"]."</td><td id=".$tabla["id_usu"]." class='modificar_usuario' onclick='modicar_usuario(".$tabla['id_usu'].")'>Modificar</td></tr>";
        }else{
            $tablaUsuarios[]="<td>".$tabla["id_usu"]."</td><td>".$tabla["nom_usu"]."</td><td>".$tabla["tipo"]."</td><td class='estadoInactivo'>".$tabla["estado_usu"]."</td><td id=".$tabla["id_usu"]." class='modificar_usuario' onclick='modicar_usuario(".$tabla['id_usu'].")'>Modificar</td></tr>";
        }
    }
    if($buscar == ""){

        if($tabla["estado_usu"] == "Activo"){
            $tablaUsuarios[]="<td>".$tabla["id_usu"]."</td><td>".$tabla["nom_usu"]."</td><td>".$tabla["tipo"]."</td><td class='estadoActivo'>".$tabla["estado_usu"]."</td><td id=".$tabla["id_usu"]." class='modificar_usuario' onclick='modicar_usuario(".$tabla['id_usu'].")'>Modificar</td></tr>";
        }else{
            $tablaUsuarios[]="<td>".$tabla["id_usu"]."</td><td>".$tabla["nom_usu"]."</td><td>".$tabla["tipo"]."</td><td class='estadoInactivo'>".$tabla["estado_usu"]."</td><td id=".$tabla["id_usu"]." class='modificar_usuario' onclick='modicar_usuario(".$tabla['id_usu'].")'>Modificar</td></tr>";
        }
    }
    
}
echo implode("¬",$tablaUsuarios);
?>