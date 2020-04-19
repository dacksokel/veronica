<aside class="contenedor_izq_panelcontrol"> 
    <header>
        <h5>
            MENU
        </h5>   
    </header>
    <a id="enlace_atras" href="?c=Panel&a=Index">
        <img id="img_atras" src="assets/img/back.png" alt="Atras">
    </a>
        
    <nav class="menu_panel_control">
        <ul>      
            <li>
                <a href="periodoEscolar.php">
                    <span class="glyphicon glyphicon-calendar"></span>
                    Administrador de Periodo Escolar
                </a>
            </li>                                     
            <li>
                <a href="?c=Login&a=Loginout">
                    <span class="glyphicon glyphicon-off"></span>
                        Cerrar Sesión
                </a>
            </li>
    
        </ul>
    </nav>
</aside>
<section class="contenedor_panel_control">
    <header class="header_panelcontrol">
        <img id="Imagen_usuario" src="assets/img/usuario.png"> 
        <div id="datos_usuario">
            <p>
                Conectado como: <?php echo $_SESSION["usuario"]?>
            </p>
            <p>
                Tipo de Usuario: <?php echo $_SESSION["tipo"]?>
            </p>

        </div>
        <img id="logo_institucion" src="assets/img/LogoInstitucion.jpg.png">
        <div class="logo_nombre">
            
            <p>
                Sistema de Gestión de Estadística de Estudiantes (SGEE)
            </p>
            
        </div>   
        <button >
            <span class="glyphicon glyphicon-star">            
            </span>
            <span id="mostrar_periodo"></span>
        </button>        
    </header>
	<div class="contenedor_datos_panelcontrol">
    <div id="cabezera">
        <h1 >
            <span class="glyphicon glyphicon-list"></span>
            Gestiónar datos de los Estudiantes
        </h1>      
	</div>
    <header>
        <a class="enlace_atras_2" href="?c=Estudiante&a=Index">
                <img id="img_atras_2" src="assets/img/Atras.png" alt="Atras">
        </a>    
    </header>

    <link rel="stylesheet" href="assets/css/gestionar_estudiante_modificar.css">
    
    <form action="?c=Estudiante&a=Guardarestudiante" method="post">
    
    <div id="registrar_estudiante" class="form-group">
        <header>
            <h2>
                Datos del Estudiante
            </h2>
        </header>
        <p>
        <label for="primernombre">Primer Nombre</label>
        <input class="form-control"  type="text" name="primerNombreE" id="primerNombreE" placeholder="Primer Nombre" value="<?php echo $estudiante->nom1_estu;?>">
        </p>
        <p> 
        <label for="segundonombre">Segundo Nombre</label>
        <input class="form-control"  type="text" name="segundoNombreE" id="segundoNombreE" placeholder="Segundo Nombre" value="<?php echo $estudiante->nom2_estu;?>">
        </p>
        <p> 
        <label for="primerapellido">Primer Apellido</label>
        <input class="form-control"  type="text" name="primerApellidoE" id="primerApellidoE" placeholder="Primer Apelldo" value="<?php echo $estudiante->ape1_estu;?>">
        </p>
        <p> 
        <label for="segundoapellido">Segundo Apellido</label>
        <input class="form-control"  type="text" name="segundoApellidoE" id="segundoApellidoE" placeholder="Segundo Apelldo" value="<?php echo $estudiante->ape2_estu;?>">
        </p>
        <p>
        <label for="cedulaescolar">Cedula Escolar</label>
        <input class="form-control"  type="number" name="ci_escolar" id="ci_escolar" placeholder="Cedula Escolar" value="<?php echo $estudiante->ci_esco;?>">
        </p>
        <p>
        <label for="cedulaperonal">Cedula Personal</label>
        <input class="form-control"  type="number" name="ci_personal" id="ci_personal" placeholder="Cedula Personal" value="<?php echo $estudiante->c_identi;?>">
        </p>
        <select class="form-control" class="form-control" name="sexoE" id="sexoE">
            <?php
                if($estudiante->sexo == "M"){
                    echo '
                    <option selected value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    
                    ';
                }else if($estudiante->sexo == "F"){
                    echo '
                    <option value="M">Masculino</option>
                    <option selected value="F">Femenino</option>
                    
                    ';
                }
            
            
            ?>
        </select>
        <p> 
            <input onfocusout="edad_handler()" class="form-control"  type="date" name="fnacimientoE" id="fnacimientoE" value="<?php echo $estudiante->fnacimiento;?>">
        </p>
        
        <select class="form-control" onchange="discapacidad_handler()" name="preguntaDiscapacidad" id="preguntaDiscapacidad">

        <?php
            if($estudiante->discapacidad == "Si"){
                echo '
                    <option selected value="Si">Si es Discapacitado</option>
                    <option value="No">No es Discapacitado</option>
                
                ';
            }else{
                echo '
                    <option value="Si">Si es Discapacitado</option>
                    <option selected value="No">No es Discapacitado</option>
                
                ';
            }
        
        ?>
        </select>
        <?php
            if($estudiante->discapacidad == "Si"){
                echo '
                <div id="discapacidadSi" class="form-group">
                ';
            }else{
                echo '
                <div id="discapacidadSi" class="form-group" style="display:none;">
                ';
            }
        
        ?>
            <input type="text" class="from-control" name="descripcionDiscapacidad" id="descripcionDiscapacidad" placeholder="Describa la Discapacidad">
        </div>
        <select class="form-control" name="gradosE" id="gradosE">
            <?php
                if($estudiante->grado == "primernivel"){
                    echo '
                        <option selected value="primernivel">1° Nivel</option>
                    ';
                }else if($estudiante->grado == "segundonivel"){
                    echo '
                    <option selected value="segundonivel">2° Nivel</option>
                ';
                }
                if($estudiante->grado == "tercernivel"){
                    echo '
                    <option selected value="tercernivel">3° Nivel</option>
                ';
                }
                if($estudiante->grado == "primergrado"){
                    echo '
                    <option selected value="primergrado">1° Gredo</option>
                ';
                }
                if($estudiante->grado == "segundogrado"){
                    echo '
                    <option selected value="segundogrado">2° Gredo</option>
                ';
                }
                if($estudiante->grado == "tercergrado"){
                    echo '
                    <option selected value="tercergrado">3° Gredo</option>
                ';
                }
                if($estudiante->grado == "cuartogrado"){
                    echo '
                    <option selected value="cuartogrado">4° Gredo</option>
                ';
                }
                if($estudiante->grado == "quintogrado"){
                    echo '
                    <option selected value="quintogrado">5° Gredo</option>
                ';
                }
                if($estudiante->grado == "sextogrado"){
                    echo '
                    <option selected value="sextogrado">6° Gredo</option>
                ';
                }
            
            ?>
        </select>
        <select class="form-control" name="seccionE" id="seccionE">
            <?php
                if($estudiante->seccion == "A"){
                    echo '<option value="A">A</option>';
                }
                if($estudiante->seccion == "B"){echo '<option value="B">B</option>';}
                if($estudiante->seccion == "C"){echo '<option value="C">C</option>';}  
                if($estudiante->seccion == "D"){echo '<option value="D">D</option>';}
                if($estudiante->seccion == "E"){echo '<option value="E">E</option>';}
            ?>   
        </select>
        <select name="estado_estudiante" id="estado_estudiante" class="form-control">
        <?php
            if($estudiante->estado_estu == "Activo"){
                echo '
                <option selected value="Activo">El Estudiante Esta Activo</option>
                <option value="Inactivo">El Estudiante Esta Inactivo</option>
                <option value="Reingresado">El Estudiante Esta Reingresado</option>
                <option value="Retirado">El Estudiante Esta Retirado</option>
                ';
            }
            if($estudiante->estado_estu == "Inactivo"){

                echo '
                <option  value="Activo">El Estudiante Esta Activo</option>
                <option selected value="Inactivo">El Estudiante Esta Inactivo</option>
                <option value="Reingresado">El Estudiante Esta Reingresado</option>
                <option value="Retirado">El Estudiante Esta Retirado</option>
                ';
            }
            if($estudiante->estado_estu == "Reingresado"){
                
                echo '
                <option  value="Activo">El Estudiante Esta Activo</option>
                <option  value="Inactivo">El Estudiante Esta Inactivo</option>
                <option selected value="Reingresado">El Estudiante Esta Reingresado</option>
                <option value="Retirado">El Estudiante Esta Retirado</option>
                ';
            }
            if($estudiante->estado_estu == "Retirado"){
                echo '
                <option  value="Activo">El Estudiante Esta Activo</option>
                <option  value="Inactivo">El Estudiante Esta Inactivo</option>
                <option  value="Reingresado">El Estudiante Esta Reingresado</option>
                <option selected value="Retirado">El Estudiante Esta Retirado</option>
                ';
            }                
        ?>
    </div>
    <div id="egresar_estudiante">
        <header>
            <h2>
                Retirar Estudiante
            </h2>
        </header>
        <textarea class="form-control" name="motivo_egreso_estudiante" id="motivo_egreso_estudiante" cols="30" rows="10" placeholder="Escriba el Motivo del Egreso o Retiro" required></textarea>
    </div>
    <div id="botonera">
        <br>
        <input type="hidden" name="id_estudiante" id="id_estudiante" value="<?php echo $estudiante->id_estu;?>">
        <button onclick="retirar_estudiante()" style="display:none; margin:0.5 auto;" id="btn_retirar_estudiante">Retirar Estudiante</button>
        <button onclick="actualizar_estudiante()" style="display:block; margin:0.5 auto;" id="btn_actualizar_estudiante">Actulizar Datos Estudiante</button>
        <button onclick="crear_estudiante()" style="display:none; margin:0.5 auto;"  id="btn_agregar_representante_continual">Guardar Datos</button>
    </div>

        </form>
    </div>

</section>