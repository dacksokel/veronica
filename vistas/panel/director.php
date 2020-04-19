
<aside class="contenedor_izq_panelcontrol"> 
<header>
    <h5>
        MENU
    </h5>   
    </header>
    <nav class="menu_panel_control"> 
        <ul>                
            <li>
                <a href="gestionarEstudiantes.php">
                    <span class="glyphicon glyphicon-list"></span>
                    Gestionar Datos de los Estudiantes
                </a>
            </li>
            <li>
            <a href="gestionarprofesor.php">
                <span class="glyphicon glyphicon-check"></span>
                Gestionar Datos de los Profesores
            </a>
        </li>
            <li>
                <a  href="vistareportes.php">
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
        <div>
            <img id="logo_institucion2" src="assets/img/LogoInstitucion.jpg.png">            
        </div>
        <div>
            <p>
                <a class="btn btn-info" href="?c=Panel&a=Mision">
                    Misión
                </a>
            </p>

            <p >
                <a class="btn btn-info" href="?c=Panel&a=Vision">
                    Visión
                </a>
            </p>
            <p >
                <a class="btn btn-info"  href="?c=Panel&a=Resena">
                    Reseña Historica
                </a>
            </p>
    </div>
	</div>
</section>