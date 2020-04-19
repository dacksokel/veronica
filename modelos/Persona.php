<?php

require_once 'database.php';
class Persona{
    private $id_perso,$nom_perso,$ape_perso,$ci_perso,$fnacimiento,$direccion;

    public function __construct(){
        try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function getNombre(){return $this->nom_perso;}
    public function getApellido(){return $this->ape_perso;}
    public function getCedula(){return $this->ci_perso;}
    public function getFechan(){return $this->fnacimiento;}
    public function getDireccion(){return $this->direccion;}
    public function getId(){return $this->id_perso;}


    public function setNombre($nombre){
        $this->nom_perso = $nombre;
    }
    public function setApellido($apellido){
        $this->ape_perso = $apellido;
    }
    public function setCedula($cedula){
        $this->ci_perso = $cedula;
    }
    public function setFechan($fn){
        $this->fnacimiento = $fn;
    }
    public function setDireccion($dir){
        $this->direccion = $dir;
    }
    public function setId($id){
        $this->id_perso = $id;
    }
    public function getPersonaCedula($cedula){
        try 
		{
			$personadatos = $this->pdo
			          ->prepare("SELECT * FROM personal WHERE ci_perso = ?");
			          

			$personadatos->execute(array($cedula));
			return $personadatos->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
    }

    public function actualizar_persona(Persona $datos){
        try 
		{
			$sql = "UPDATE personal SET 
						nom_perso = ?, 
						ape_perso = ?,
                        ci_perso = ?,
						fnacimiento = ?, 
						direccion = ?
				    WHERE id_perso = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $datos->nom_perso, 
                        $datos->ape_perso,
                        $datos->ci_perso,
                        $datos->fnacimiento,
                        $datos->direccion,
                        $datos->id_perso
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
        }
    }

    public function agregar_persona(Persona $datos)
	{
		try 
		{
		$sql = "INSERT INTO personal (nom_perso,ape_perso,ci_perso,fnacimiento,direccion) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                        $datos->nom_perso, 
                        $datos->ape_perso,
                        $datos->ci_perso,
                        $datos->fnacimiento,
                        $datos->direccion,                                       
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    

}


?>