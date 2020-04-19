
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
    <div class="cabeceras_uso">
<h5>   
        <span class="glyphicon glyphicon-info-sign"></span>
        Vision
</h5>             



</div>

<div>
<img id="gex" style="width:20%;" src="assets/img/vision.png">
</div>

<div>
Garantizar una educación democrática, participativa, protagónica, multiétnica y pluricultural que permita formar integralmente a niñas, niños y adolescentes sin ningún tipo de discriminación; rescatando el ideario bolivariano en función de reivindicar el papel de Nación y su historia, para asumir los retos del momento.<br><br>

Transforma la institución en el sitio donde los estudiantes se formen o se capaciten en un oficio que lo ayude a satisfacer sus necesidades en el futuro inmediato.<br><br>

Convertirla en un eje de producción económica sustentable y sostenible para la comunidad y la autogestión escolar.<br><br>

Que las comunidades tomen como referencia los proyectos socio productivo realizados en la escuela como paradigma socio-ecológico.<br><br>

Trasmitir las experiencias adquiridas a las demás instituciones educativa y así fortalecer las redes-escolares.<br><br>
 
</div>
	</div>
</section>