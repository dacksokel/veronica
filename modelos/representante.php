<?php
require_once 'modelos/database.php';
class Representante{
	private $id_repre,
	$nom1_repre,
	$nom2_repre,
	$ape1_repre,
	$ape2_repre,
	$ci_repre,
	$direccion,
	$telefono;
    function __construct(){
        try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
        }
	}
	/** Setter */
	public function setId($id){
		$this->id_repre = $id;
	}
	public function setNom1($nombre){
		$this->nom1_repre = $nombre;
	}
	public function setNom2($nombre){
		$this->nom2_repre = $nombre;
	}
	public function setApe1($apellido){
		$this->ape1_repre = $apellido;
	}
	public function setApe2($apellido){
		$this->ape2_repre = $apellido;
	}
	public function setCedula($cedula){
		$this->ci_repre = $cedula;
	}
	public function setDir($dir){
		$this->direccion = $dir;
	}
	public function setTlf($tlf){
		$this->telefono = $tlf;
	}

	/** Getter */
	public function getId(){
		return $this->id_repre;
	}
	public function getNom1(){
		return $this->nom1_repre;
	}
	public function getNom2(){
		return $this->nom2_repre;
	}
	public function getApe1(){
		return $this->ape1_repre;
	}
	public function getApe2(){
		return $this->ape2_repre;
	}
	public function getCedula(){
		return $this->ci_repre;
	}
	public function getDir(){
		return $this->direccion;
	}
	public function getTlf(){
		return $this->telefono;
	}

	public function getAllRepresentante(){
        try
		{
			$dato = $this->pdo->prepare("SELECT * FROM representante");
			$dato->execute();

			return $dato->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
    public function getRepresentanteCedula($id){
        try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM representante WHERE id_repre = ?");
			          

			$stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function actualizar_representante(Representante $datos){
		// echo "update";
		// foreach ($datos as $key => $value) {
		// 	echo $key.' '.$value.'<br>';
		// }
		try 
		{
			$sql = "UPDATE representante SET 
						nom1_repre = ?, 
                        nom2_repre = ?,
						ape1_repre = ?, 
						ape2_repre = ?,
                        ci_repre = ?,
                        direccion = ?,
						telefono = ?
						
				    WHERE id_repre = ?";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
						$datos->nom1_repre, 
						$datos->nom2_repre,
						$datos->ape1_repre,
						$datos->ape2_repre,
						$datos->ci_repre,
						$datos->direccion,
						$datos->telefono,
						$datos->id_repre                    
					)
                );                
		} catch (Exception $e) 
		{
			die($e->getMessage());
        }
	}

	public function agregar_representante(Representante $datos){
		try 
		{
		$sql = "INSERT INTO representante (nom1_repre,nom2_repre,ape1_repre,ape2_repre,ci_repre,direccion,telefono) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$datos->nom1_repre, 
					$datos->nom2_repre,
					$datos->ape1_repre,
					$datos->ape2_repre,
					$datos->ci_repre,
					$datos->direccion,
					$datos->telefono                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>