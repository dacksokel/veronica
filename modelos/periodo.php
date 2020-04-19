<?php
require_once 'database.php';
class Periodo{

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

    public function getALL(){
        try
		{
			$d = $this->pdo->prepare("SELECT * FROM periodo_escolar");
			$d->execute();

			return $d->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }


}


?>