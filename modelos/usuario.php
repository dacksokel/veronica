<?php
require_once 'database.php';
class Usuario{

    private $id_usu,$nom_usu,$pass,$tipo_usu,$estado_usu,$pregunta,$respuesta,$ci_perso;

    function __construct(){
        try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
        }
        $this->estado_usu = "Inacivo";
    }

    public function setUsuarioName($usuario){
        $this->nom_usu = $usuario;
    }
    public function setPass($pass){
        $this->pass = $pass;
    }
    public function setTipo($tipo){
        $this->tipo_usu = $tipo;
    }
    public function setPregunta($pregunta){
        $this->pregunta = $pregunta;
    }
    public function setRespuesta($respuesta){
        $this->respuesta = $respuesta;
    }
    public function setCi_perso($cedula){
        $this->ci_perso = $cedula;
    }
    public function setEstado($estado){
        $this->estado_usu = $estado;
    }
    public function setIdusuario($id){
        $this->id_usu = $id;
    }

    public function getUsuarioName(){return $this->usu_nom;}
    public function getTipo(){return $this->tipo;}
    public function getPregunta(){return $this->pregunta;}
    public function getRespuesta(){return $this->respuesta;}
    public function getIdUsuario(){return $this->id_usu;}
    public function getCedula(){return $this->ci_perso;}
    public function getEstado(){return $this->estado_usu;}


    public function getAll_tabla(){
        try
		{
			$datosUsuarios = $this->pdo->prepare("SELECT * FROM usuario");
			$datosUsuarios->execute();

			return $datosUsuarios->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
    public function getUsuId($id){
        try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE id_usu = ?");
			          

			$stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

    public function actualizar_usuario(Usuario $datos){
        try 
		{
			$sql = "UPDATE usuario SET 
						nom_usu = ?, 
                        tipo_usu = ?,
						estado_usu = ?, 
						pregunta = ?,
                        respuesta = ?,
                        ci_perso = ?
				    WHERE id_usu = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $datos->nom_usu, 
                        $datos->tipo_usu,
                        $datos->estado_usu,
                        $datos->pregunta,
                        $datos->respuesta,
                        $datos->ci_perso,
                        $datos->id_usu
					)
                );                
		} catch (Exception $e) 
		{
			die($e->getMessage());
        }
    }

    public function agregar_usuario(Usuario $datos)
	{
		try 
		{
		$sql = "INSERT INTO usuario (nom_usu,pass,tipo_usu,estado_usu,pregunta,respuesta,ci_perso) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $datos->nom_usu, 
                        $datos->pass,
                        $datos->tipo_usu,
                        $datos->estado_usu,
                        $datos->pregunta,
                        $datos->respuesta,
                        $datos->ci_perso                        
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


}


?>