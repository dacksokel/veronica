<?php
require_once 'database.php';
class LoginModelo{

    private $pdo;
    
    function __construct(){
        try{
            $this->pdo = Database::StartUp();
        }    
        catch(Exception $e){
            die($e->getMenssage());
        }
    }

    public function loginOn(){
        try{
            $resul = array();
            $v = false;
            $datosUsuarios = $this->pdo->prepare("SELECT * FROM usuario");
            $datosUsuarios->execute();

           //return $datosUsuarios->fetchAll(PDO::FETCH_OBJ);
           foreach ($datosUsuarios->fetchAll(PDO::FETCH_OBJ) as $datoUsuario) {
               # code...
               if($datoUsuario->nom_usu == $_REQUEST["usuario"] && $datoUsuario->pass == md5($_REQUEST["pass"])){
                    session_start();
                    $_SESSION["usuario"] = $datoUsuario->nom_usu; 
                    $_SESSION["tipo"] = $datoUsuario->tipo_usu;  
                    $_SESSION["cedula"] = $datoUsuario->ci_perso; 
                    return true;
               }                          
           }
        }catch(Exceuted $e){
            die($e->getMessage());
        }
    }

}


?>

