<?php

require_once 'modelos/estudiante.php';
require_once 'modelos/representante.php';

class Estudiantecontrolador{

    private $modelosEstudiantes,
    $modelosRepresentantes;

    function __construct(){
        session_start();
        $this->modelosEstudiantes = new Estudiante();
        // $this->modelosRepresentantes = new Representante();
    }

    public function index(){
        $datosEstudiantes = $this->modelosEstudiantes->getAllE();
        $tbody = "";
        $contador = 0;
        foreach ($datosEstudiantes as $datosTabla) {
            $contador++;
            if($datosTabla->estado_estu == "Activo" || $datosTabla->estado_estu == "Reingresado"){
                $tbody .='
                    <tr>
                        <td>'.$contador.'</td>
                        <td>'.$datosTabla->ci_esco.'</td>
                        <td>'.$datosTabla->nom1_estu.' '.$datosTabla->nom2_estu.'</td>
                        <td >'.$datosTabla->ape1_estu.' '.$datosTabla->ape2_estu.'</td>
                        <td>'.$datosTabla->sexo.'</td>
                        <td>'.$datosTabla->grado.'</td>
                        <td>'.$datosTabla->seccion.'</td>
                        <td class="estado_estudiante_activo">'.$datosTabla->estado_estu.'</td>
                        <td id="'.$datosTabla->id_estu.'" class="modificar_estudiante modificar_usuario">
                            <a href="?c=Estudiante&a=Modificar&id='.$datosTabla->id_estu.'">
                                <center>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </center>
                            </a>
                        </td>
                    </tr>';
            }else if($datosTabla->estado_estu == "Retirado"){
                $tbody .='
                    <tr>
                        <td>'.$contador.'</td>
                        <td>'.$datosTabla->ci_esco.'</td>
                        <td>'.$datosTabla->nom1_estu.' '.$datosTabla->nom2_estu.'</td>
                        <td >'.$datosTabla->ape1_estu.' '.$datosTabla->ape2_estu.'</td>
                        <td>'.$datosTabla->sexo.'</td>
                        <td>'.$datosTabla->grado.'</td>
                        <td>'.$datosTabla->seccion.'</td>
                        <td class="estado_estudiante_retirado">'.$datosTabla->estado_estu.'</td>
                        <td id="'.$datosTabla->id_estu.'" class="modificar_estudiante modificar_usuario">
                            <a href="?c=Estudiante&a=Modificar&id='.$datosTabla->id_estu.'">
                                <center>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </center>
                            </a>
                        </td>
                    </tr>';
            }else if($datosTabla->estado_estu == "Inactivo"){
                $tbody .='
                    <tr>
                        <td>'.$contador.'</td>
                        <td>'.$datosTabla->ci_esco.'</td>
                        <td>'.$datosTabla->nom1_estu.' '.$datosTabla->nom2_estu.'</td>
                        <td >'.$datosTabla->ape1_estu.' '.$datosTabla->ape2_estu.'</td>
                        <td>'.$datosTabla->sexo.'</td>
                        <td>'.$datosTabla->grado.'</td>
                        <td>'.$datosTabla->seccion.'</td>
                        <td class="estado_estudiante_inactivo">'.$datosTabla->estado_estu.'</td>
                        <td id="'.$datosTabla->id_estu.'" class="modificar_estudiante modificar_usuario">
                            <a href="?c=Estudiante&a=Modificar&id='.$datosTabla->id_estu.'">
                                <center>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </center>
                            </a>
                        </td>
                    </tr>';
            }
        }


        include 'vistas/layout/head.php';
        include 'vistas/estudiante/index.php';
        include 'vistas/layout/footer.php';
    }
    public function crear(){
        include 'vistas/layout/head.php';
        include 'vistas/estudiante/crear.php';
        include 'vistas/layout/footer.php';
    }
    public function modificar(){
        $estudiante = new Estudiante();
        // $representante = new Representante();
        if(isset($_REQUEST["id"])){
            $estudiante = $this->modelosEstudiantes->getEstudianteId($_REQUEST["id"]);
            // $representante = $this->modelosRepresentantes->getRepresentanteCedula($estudiante->ci_repre);
        }

        include 'vistas/layout/head.php';
        include 'vistas/estudiante/modificar.php';
        include 'vistas/layout/footer.php';
    }

    public function guardarestudiante(){
        $estudiante = new Estudiante();

        /** Estudiante */
        if(isset($_REQUEST["id_estudiante"])){
            $estudiante->setId($_REQUEST["id_estudiante"]);
        }
        $estudiante->setNom1($_REQUEST["primerNombreE"]);
        $estudiante->setNom2($_REQUEST["segundoNombreE"]);
        $estudiante->setApe1($_REQUEST["primerApellidoE"]);
        $estudiante->setApe2($_REQUEST["segundoApellidoE"]);
        $estudiante->setCedulaEscolar($_REQUEST["ci_escolar"]);
        $estudiante->setCPersonal($_REQUEST["ci_personal"]);
        $estudiante->setSexo($_REQUEST["sexoE"]);
        $estudiante->setFecha($_REQUEST["fnacimientoE"]);
        $estudiante->setDisca($_REQUEST["preguntaDiscapacidad"]);
        $estudiante->setDescripDisca($_REQUEST["descripcionDiscapacidad"]);
        $estudiante->setGrado($_REQUEST["gradosE"]);
        $estudiante->setSeccion($_REQUEST["seccionE"]);
        $estudiante->setCedulaRepre($_REQUEST["ci_repre"]);
        $estudiante->setPeriodo(date("Y"));
        if(isset($_REQUEST["estado_estudiante"])){
            $estudiante->setEstado($_REQUEST["estado_estudiante"]);

        }
        
        $estudiante->getId() > 0 
        ? $this->modelosEstudiantes->actualizar_estudiante($estudiante):$this->modelosEstudiantes->agregar_estudiante($estudiante);
        if($_REQUEST["redict_repre"] == "No"){
            header("location: ?c=Usuario&a=Index");
        }else if($_REQUEST["redict_repre"] == "Si"){
            header("location: ?c=Representate&a=Crear");
        }
       


    }

}



?>