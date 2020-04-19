<?php
require_once 'modelos/representante.php';
class RepresentanteControlador{

    private $modeloRepresentante;
    function __construct(){
        session_start();
        $this->modeloRepresentante = new Representante();
    }
    public function index(){
        $datosRepresentante = $this->modeloRepresentante->getAllRepresentante();
        $tbody = "";
        $contador = 0;
        foreach ($datosRepresentante as $datosTabla) {
            $contador++;
            $tbody .='
                    <tr>
                        <td>'.$contador.'</td>
                        <td>'.$datosTabla->nom1_repre.' '.$datosTabla->nom2_repre .' '
                        .$datosTabla->ape1_repre.' '.$datosTabla->ape2_repre.'</td>
                        <td >'.$datosTabla->ci_repre.'</td>
                        <td>'.$datosTabla->telefono.'</td>
                        <td id="'.$datosTabla->id_repre.'"">
                            <a href="?c=Representante&a=Modificar&id='.$datosTabla->id_repre.'">
                                <center>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </center>
                            </a>
                        </td>
                    </tr>';
        }

        include 'vistas/layout/head.php';
        include 'vistas/representante/index.php';
        include 'vistas/layout/footer.php';
    }

    public function crear(){

        include 'vistas/layout/head.php';
        include 'vistas/representante/crear.php';
        include 'vistas/layout/footer.php';
    }
    public function modificar(){
        $representante = new Representante();
        
        if(isset($_REQUEST["id"])){
            $representante = $this->modeloRepresentante->getRepresentanteCedula($_REQUEST["id"]);
            // $representante = $this->modelosRepresentantes->getRepresentanteCedula($estudiante->ci_repre);
        }
        include 'vistas/layout/head.php';
        include 'vistas/representante/modificar.php';
        include 'vistas/layout/footer.php';
    }
    public function guardar(){
        $representante = new Representante();

        /**Representante */
        $representante->setNom1($_REQUEST["primerNombreR"]);
        $representante->setNom2($_REQUEST["segundoNombreR"]);
        $representante->setApe1($_REQUEST["primerApellidoR"]);
        $representante->setApe2($_REQUEST["segundoApellidoR"]);
        $representante->setCedula($_REQUEST["cedulaR"]);
        $representante->setDir($_REQUEST["direccionR"]);
        $representante->setTlf($_REQUEST["telefonoR"]);
        if(isset($_REQUEST["id_repre"])){
            $representante->setId($_REQUEST["id_repre"]);
        }
        
        $representante->getId() > 0 
        ? $this->modeloRepresentante->actualizar_representante($representante):$this->modeloRepresentante->agregar_representante($representante);
        header("location: ?c=Representante&a=Index");
    }

}




?>