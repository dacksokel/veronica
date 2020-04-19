
<aside class="contenedor_izq_panelcontrol"> 
<header>
    <h5>
        MENU
    </h5>   
    </header>
    <nav class="menu_panel_control"> 
        <ul>                
            <li>
                <a href="?c=Usuario&a=Index">
                    <span class="glyphicon glyphicon-home"></span>
                    Gestionar Usuarios Del Sistema
                </a>
            </li>
            <li>
                <a href="?c=Estudiante&a=Index">
                    <span class="glyphicon glyphicon-list"></span>
                    Gestionar Datos de los Estudiantes
                </a>
            </li>
            <li>
            <a href="?c=Representante&a=Index">
                <span class="glyphicon glyphicon-check"></span>
                Gestionar Datos de los Representante
            </a>
        </li>
            <!--<li>
            <a href="?c=Profe&a=Index">
                <span class="glyphicon glyphicon-check"></span>
                Gestionar Datos de los Profesores
            </a>
        </li>-->
            <li>
                <a  href="?c=Reportes&a=Index">
                    <span class="glyphicon glyphicon-user"></span>
                    Generar Reporte De La Estadistica Escolar
                </a>
            </li>
            <li>
                <a  href="?c=Login&a=Loginout">
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
                Conectado como: <?php echo $_SESSION["usuario"] ?>
            </p>
            <p>
                Tipo de Usuario: <?php echo $_SESSION["tipo"] ?>
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
    <header>
        <div class="cabeceras_uso">
            <h5>
                <span class="glyphicon glyphicon-retweet"></span>
                Gestionar Reportes
            </h5>                     
        </div>
    </header>
    <div>
        <img id="gex" style="width:20%;" src="assets/img/general.png">
    </div>
    <div>
        <a href="?c=Reportes&a=General">
            <button class="btn_reportes">
                Mensual
                (Todo en General)
            </button>
        </a>
        <a href="?c=Reportes&a=Inicial">
            <button class="btn_reportes">
                Mensual
                Educacion Inicial
            </button>
        </a>
        <a href="?c=Reportes&a=Primaria">
            <button class="btn_reportes">
                Mensual
                Educacion Primaria
            </button>
        </a>
            <button class="btn_reportes" onclick="reportes_personalizados()">
                Generar Reporte Personalizado
            </button>
    </div>    

    <div id="reportes_personalizados" style="display:none">
        <form action="vista/reportepersonalizado.php" methor="post">
            <label><input name ="masculino" type="checkbox" value="masculino">Sexo Masculino</label>
            <label><input name="femenino" type="checkbox" value="femenino">Sexo Femenino</label>   
            <label><input name="grados" type="checkbox" value="grados">Grados</label>
            <label><input name="secciones" type="checkbox" value="secciones">Secciones</label>    
            <label><input name="fnacimiento" type="checkbox" value="fnacimiento">Fecha de Nacimiento</label>   
            <label><input name="nombres" type="checkbox" value="nombres">Nombre</label>   
            <label><input name="estados" type="checkbox" value="estados">Estado</label>  
            <div id="seleccion_grado">
                <select class="form-control" name="grados_e" id="gradosE">                    
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
                <select class="form-control" name="seccionE" id="seccionE">
                    <option value="">Seccion del Estudiante</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>    
                </select>
            </div>
            <br>     
            <button onclick="descargar_reporte_personalizado()" id="btn_reporte_personalizado" type="submit">
                Descargar
            </button>
        </form>        
    </div>
	</div>
</section>