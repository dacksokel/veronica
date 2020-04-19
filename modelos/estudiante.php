<?php
require_once 'database.php';
class Estudiante{

	private $id_estu,
	$nom1_estu,
	$nom2_estu,
	$ape1_estu,
	$ape2_estu,
	$ci_esco,
	$c_identi,
	$sexo,
	$fnacimiento,
	$discapacidad,
	$espe_discapacidad,
	$grado,
	$seccion,
	$id_periodo,
	$estado_estu,
	$ci_repre;

    function __construct(){
        try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
		$this->estado_estu = "Inactivo";
	}
	/**setter */
	public function setId($id){
		$this->id_estu = $id;
	}
	public function setNom1($nombre){
		$this->nom1_estu = $nombre;
	}
	public function setNom2($nombre){
		$this->nom2_estu = $nombre;
	}
	public function setApe1($ape){
		$this->ape1_estu = $ape;
	}
	public function setApe2($ape){
		$this->ape2_estu = $ape;
	}
	public function setCedulaEscolar($cedula){
		$this->ci_esco = $cedula;
	}
	public function setCPersonal($cedula){
		$this->c_identi =$cedula;
	}
	public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	public function setFecha($fecha){
		$this->fnacimiento = $fecha;
	}
	public function setDisca($disca){
		$this->discapacidad = $disca;
	}
	public function setDescripDisca($descri){
		$this->espe_discapacidad = $descri;
	}
	public function setGrado($grado){
		$this->grado = $grado;
	}
	public function setSeccion($seccion){
		$this->seccion = $seccion;
	}
	public function setPeriodo($periodo){
		$this->id_periodo = $periodo;
	}
	public function setEstado($estado){
		$this->estado_estu = $estado;
	}
	public function setCedulaRepre($cedula){
		$this->ci_repre = $cedula;
	}

	/**getter */
	public function getId(){
		return $this->id_estu;
	}
	public function getNom1(){
		return $this->nom1_estu;
	}
	public function getNom2(){
		return $this->nom2_estu;
	}
	public function getApe1(){
		return $this->ape1_estu;
	}
	public function getApe2(){
		return $this->ape2_estu;
	}
	public function getCedulaEscolar(){
		return $this->ci_esco;
	}
	public function getCPersonal(){
		return $this->c_identi;
	}
	public function getSexo(){
		return $this->sexo = $sexo;
	}
	public function getFecha(){
		return $this->fnacimiento;
	}
	public function getDisca(){
		return $this->discapacidad;
	}
	public function getDescripDisca(){
		return $this->espe_discapacidad;
	}
	public function getGrado(){
		return $this->grado;
	}
	public function getSeccion(){
		return $this->seccion;
	}
	public function getPeriodo(){
		return $this->id_periodo;
	}
	public function getEstado(){
		return $this->estado_estu;
	}
	public function getCedulaRepre(){
		return $this->ci_repre;
	}

	/**otras funciones */
    public function getAllE(){
        try
		{
			$datosEstudiante = $this->pdo->prepare("SELECT * FROM estudiante");
			$datosEstudiante->execute();

			return $datosEstudiante->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function getEstudianteId($id){
        try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM estudiante WHERE id_estu = ?");
			          

			$stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}
	
	public function actualizar_estudiante(Estudiante $datos){
        try 
		{
			$sql = "UPDATE estudiante SET 
						nom1_estu = ?, 
                        nom2_estu = ?,
						ape1_estu = ?, 
						ape2_estu = ?,
                        ci_esco = ?,
                        c_identi = ?,
						sexo = ?,
						fnacimiento = ?,
						discapacidad =?,
						espe_discapacidad = ?,
						grado = ?,
						seccion = ?,
						id_periodo = ?,
						estado_estu = ?,
						ci_repre = ?
				    WHERE id_estu = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $datos->nom1_estu, 
                        $datos->nom2_estu,
                        $datos->ape1_estu,
                        $datos->ape2_estu,
                        $datos->ci_esco,
                        $datos->c_identi,
						$datos->sexo,
						$datos->fnacimiento, 
                        $datos->discapacidad,
                        $datos->espe_discapacidad,
                        $datos->grado,
                        $datos->seccion,
                        $datos->id_periodo,
						$datos->estado_estu,
						$datos->ci_repre,
						$datos->id_estu
					)
                );                
		} catch (Exception $e) 
		{
			die($e->getMessage());
        }
    }

    public function agregar_estudiante(Estudiante $datos){
		try 
		{
		$sql = "INSERT INTO estudiante (nom1_estu,nom2_estu,ape1_estu,ape2_estu,ci_esco,c_identi,sexo,fnacimiento,discapacidad,espe_discapacidad,grado,seccion,id_periodo,estado_estu,ci_repre) 
		        VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$datos->nom1_estu, 
					$datos->nom2_estu,
					$datos->ape1_estu,
					$datos->ape2_estu,
					$datos->ci_esco,
					$datos->c_identi,
					$datos->sexo,
					$datos->fnacimiento, 
					$datos->discapacidad,
					$datos->espe_discapacidad,
					$datos->grado,
					$datos->seccion,
					$datos->id_periodo,
					$datos->estado_estu,
					$datos->ci_repre                     
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}
?>