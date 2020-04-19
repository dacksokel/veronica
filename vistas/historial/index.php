<aside class="contenedor_izq_panelcontrol"> 
    <header>
        <h5>
            MENU
        </h5>   
    </header>
    <a id="enlace_atras" href="?c=Usuario&a=Index">
        <img id="img_atras" src="assets/img/back.png" alt="Atras">
    </a>
        
    <nav class="menu_panel_control">
        <ul>                                           
            <li>
                <a href="?c=Historial&a=Descargar">
                    <span class="glyphicon glyphicon-hdd"></span> 
                    Descargar Historial
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
    <header>
        <center>
            <h2>
                Historial del Sistema    
            </h2>
        </center>
    </header>
        <table class="table table-bordered table-sm">
            <thead >
                <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Accion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tbody?>
            </tbody>
        </table>

    </div>
    <script src="./js/gestionUsuario.js">
    </script>        
</section>