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
    <!--<div id="cabezera">
    <h1 >
    <span class="glyphicon glyphicon-list"></span>
        Gestiónar datos de los Estudiantes
    </h1>      
	</div>
-->
	<form action="?c=Estudiante&a=Guardarestudiante" method="post">
    
    <link rel="stylesheet" href="assets/css/gestion_estudiante_style.css">
<a class="enlace_atras_2" href="?c=Estudiante&a=Index">
            <img id="img_atras_2" src="assets/img/Atras.png" alt="Atras">
    </a> 
<header>
    <center>
        <h2>
        <span class="glyphicon glyphicon-user"></span>
            Agregar datos del estudiante
        </h2>
    </center>
</header>
<div id="registrar_estudiante" class="form-group">
<header>
    <h2>
        Ingrese Datos del Estudiante
    </h2>
    </header>
    <p>
        <label for="primernombre">Primer Nombre *</label>
    <input class="form-control"  type="text" name="primerNombreE" id="primerNombreE" placeholder="Primer Nombre" required>
    </p>
    <p> 
    <label for="segundonombre">Segundo Nombre *</label>
    <input class="form-control"  type="text" name="segundoNombreE" id="segundoNombreE" placeholder="Segundo Nombre" required>
    </p>
    <p> 
        <label for="primerapellido">Primer Apellido * </label>
    <input class="form-control"  type="text" name="primerApellidoE" id="primerApellidoE" placeholder="Primer Apelldo" required>
    </p>
    <p> 
        <label for="segundoapellido">Segundo Apellido * </label>
    <input class="form-control"  type="text" name="segundoApellidoE" id="segundoApellidoE" placeholder="Segundo Apelldo" required>
    </p>
    <p>
    <label for="cedulaescolar">Cedula Escolar * </label>
    <input onchange="verificar_ci_escolar()" class="form-control"  type="text" name="ci_escolar" id="ci_escolar" placeholder="Cedula Escolar" required>
    </p>
    <p>
    <label for="cedulapersonal">Cedula Personal</label>
    <input class="form-control"  type="text" name="ci_personal" id="ci_personal" placeholder="Cedula Personal" value="">
    </p>
    <p>
    <label for="cedularepresentante">Cedula Representante *</label>
    <input class="form-control"  type="text" onchange="verificar_representate()" name="ci_repre" id="ci_repre" placeholder="Cedula Representante" value="" required>
    </p>
    <p>
    <label for="sexo">Seleccione un Sexo * </label>
    <select name="sexoE" id="sexoE" class="form-control" required>
        <option>Sexo del Estudiante</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select>
</p>
<p>
    <label for="preguntanivel">Selecciones una Opcion *</label>
    <select class="form-control" onchange="preguntanivelgrado_handler()" name="preguntanivelgrado" id="preguntanivelgrado" required>
        <option>¿Ha Cursado el Estudiante un Nivel o Grado Antes?</option>
        <option value="Si">Si a Cursado un Nivel o Grado</option>
        <option value="No">No a Cursado un Nivel o Grado</option>
    </select>

</p>
    
    <select class="form-control" name="respuestanivelgrado" id="respuestanivelgrado" onchange="preguntanivelgrado_handler()">
        <option value="nograde">Grado que el Estudiante Curso</option>
        <option value="primernivel">1° Nivel</option>
        <option value="segundonivel">2° Nivel</option>
        <option value="tercernivel">3° Nivel</option>
        <option value="primergrado">1° Grado</option>
        <option value="segundogrado">2° Grado</option>
        <option value="tercergrado">3° Grado</option>
        <option value="cuartogrado">4° Grado</option>
        <option value="quintogrado">5° Grado</option>
        <option value="sextogrado">6° Grado</option>
        <option value="noaplica">No Aplica</option>
    </select>
    <p> 
    <label for="fehcanacimiento">Fecha de Nacimiento *</label>
        <input onfocusout="edad_handler()" class="form-control"  type="date" name="fnacimientoE" id="fnacimientoE" required>
    </p>
    <div>
    <label for="preguntanivel">Selecciones una Opcion</label>
    <select class="form-control" onchange="discapacidad_handler()" name="preguntaDiscapacidad" id="preguntaDiscapacidad">
        <option>¿Discapacidad?</option>
        <option value="Si">Si es Discapacitado</option>
        <option value="No">No es Discapacitado</option>
    </select>
    </div>
    
    
    <div id="discapacidadSi" class="form-group">
        <label for="descipcion_discapacidad">Describa la Discapacidad</label>
        <input type="text" class="from-control" id="descripcionDiscapacidad" name="descripcionDiscapacidad" placeholder="Describa la Discapacidad" value="">
    </div>
    <label for="grado_2">Grado</label>
    <select class="form-control" name="gradosE" id="gradosE" >
        <option value="">Grado del Estudiante</option>
        <option value="primernivel">1° Nivel</option>
        <option value="segundonivel">2° Nivel</option>
        <option value="tercernivel">3° Nivel</option>
        <option value="primergrado">1° Grado</option>
        <option value="segundogrado">2° Grado</option>
        <option value="tercergrado">3° Grado</option>
        <option value="cuartogrado">4° Grado</option>
        <option value="quintogrado">5° Grado</option>
        <option value="sextogrado">6° Grado</option>
        <option value="noaplica">No Aplica</option>
    </select>
    <label for="seccion">Secciones</label>
    <select class="form-control" name="seccionE" id="seccionE">
        <option value="">Seccion del Estudiante</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>    
    </select>
    <br>
    <input type="hidden" name="redict_repre" id="redict_repre" value="No">
    <button type="submit" id="btn_agregar_representante_continual">Guardar Datos del Estudiante</button>
</div>

    </form>
</section>
<script src="assets/js/gestionEstudiante.js"></script>