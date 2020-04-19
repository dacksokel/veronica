<?php
/**
 * conexion a base de dato
 * variables de conexion
 */
$usuario_db = "root";
$passUsuario_db = "";
$base_de_dato = "colegio";
$url = "localhost";

/**
 * variable de conexion a base de dato
 */
$con = new mysqli($url,$usuario_db,$passUsuario_db,$base_de_dato);

/**
 * verificacion de conexion a la ase de dato
 */
if($con->connect_errno){
    echo "error al conectar la base de dato";
}
?>
