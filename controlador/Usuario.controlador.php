<?php
require_once 'modelos/usuario.php';
require_once 'modelos/Persona.php';
class UsuarioControlador{
    private $modeloUsuario,$modeloPersona;
    function __construct(){
        $this->modeloUsuario = new Usuario();
        $this->modeloPersona = new Persona();
        session_start();
    }
    public function index(){
        $usuariosTabla = $this->modeloUsuario->getAll_tabla();
        $tbody = "";
        $contador = 0;
        foreach ($usuariosTabla as $datoUsuario) {
            $contador++;
            if($datoUsuario->estado_usu == "Activo"){
                $tbody .="
                <tr>
                    <td>".$contador."</td>
                    <td>".$datoUsuario->nom_usu."</td>
                    <td>".$datoUsuario->tipo_usu."</td>
                    <td class='estadoActivo'>".$datoUsuario->estado_usu."</td>
                    <td id=".$datoUsuario->id_usu." class='modificar_usuario'>
                        <a href='?c=Usuario&a=Modificarvista&id=".$datoUsuario->id_usu."'>                    
                            <center>
                                <span class='glyphicon glyphicon-pencil'></span>
                            </center>
                        </a>
                    </td>
                </tr>";
            }else{
                $tbody .="
                <tr>
                    <td>".$contador."</td><td>".$datoUsuario->nom_usu."</td>
                    <td>".$datoUsuario->tipo_usu."</td>
                    <td class='estadoInactivo'>".$datoUsuario->estado_usu."</td>
                    <td id=".$datoUsuario->id_usu." class='modificar_usuario' onclick='modicar_usuario(".$datoUsuario->id_usu.")'>
                        <a href='?c=Usuario&a=Modificarvista&id=".$datoUsuario->id_usu."'>  
                            <center>                                   
                                <span class='glyphicon glyphicon-pencil'></span>
                            </center>   
                        </a>
                    </td>
                </tr>";
            }

        }

        include 'vistas/layout/head.php';
        include 'vistas/usuarios/index.php';
        include 'vistas/layout/footer.php';
    }  

    public function modificarvista(){
        $usuario = new Usuario();
        $persona = new Persona();
        if(isset($_REQUEST["id"]) && $_REQUEST["id"] != "1"){
            $usuario = $this->modeloUsuario->getUsuId($_REQUEST['id']);
            $persona = $this->modeloPersona->getPersonaCedula($usuario->ci_perso);
        }
        if($_REQUEST["id"] == "1"){
            echo '
                <script>
                    alert("El administrador no se puede editar");
                    location.href ="?c=Usuario&a=Index";
                </script>
            ';
        }else{
            include 'vistas/layout/head.php';
            include 'vistas/usuarios/modificar.php';
            include 'vistas/layout/footer.php';
        }        

    }

    public function crearusuario(){        
        include 'vistas/layout/head.php';
        include 'vistas/usuarios/crear.php';
        include 'vistas/layout/footer.php';
    }

    public function guardarusuario(){
        $usuario = new Usuario();
        $persona = new Persona();

        $persona->setNombre($_REQUEST["nombre"]);
        $persona->setApellido($_REQUEST["apellido"]);
        $persona->setCedula($_REQUEST["cedula"]);
        $persona->setDireccion($_REQUEST["direccion"]);
        $persona->setFechan($_REQUEST["fnacimiento"]);
        if(isset($_REQUEST["id_perso"])){
            $persona->setId($_REQUEST["id_perso"]);
        }

        if(isset($_REQUEST["id_usu"])){
            $usuario->setIdusuario($_REQUEST["id_usu"]);
        }
        if(isset($_REQUEST["pass"])){
            $usuario->setPass($_REQUEST["pass"]);
        }
        if(isset($_REQUEST["estado"])){
            $usuario->setEstado($_REQUEST["estado"]);
        }
        $usuario->setUsuarioName($_REQUEST["usuario"]);
        $usuario->setTipo($_REQUEST["tipo"]);
        $usuario->setPregunta($_REQUEST["pregunta"]);
        $usuario->setRespuesta($_REQUEST["respuesta"]);
        $usuario->setCi_perso($_REQUEST["cedula"]);

        $persona->getId() > 0 
        ? $this->modeloPersona->actualizar_persona($persona):$this->modeloPersona->agregar_persona($persona);

        $usuario->getIdUsuario() > 0 
        ? $this->modeloUsuario->actualizar_usuario($usuario):$this->modeloUsuario->agregar_usuario($usuario);
       header("location: ?c=Usuario&a=Index");
    }

}

?>