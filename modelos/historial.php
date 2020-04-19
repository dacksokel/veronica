<?php

require_once 'database.php';
class Historial{


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

    public function getDatosH(){
        try
		{
			$datoH = $this->pdo->prepare("SELECT * FROM historial");
			$datoH->execute();

			return $datoH->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}

    }
}


?>