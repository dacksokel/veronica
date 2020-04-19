
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
        Mision
</h5>             



</div>

<div>
<img id="gex" style="width:20%;" src="assets/img/mision.png">
</div>

<div>
a Unidad Educativa Bolivariana Pedro Elías Aristeguieta, orienta su formación integral hacia la transformación del nuevo ciudadano que necesita la nación, con sentido de pertenencia hacia su entorno escolar donde la escuela sea el sitio por excelencia para el desarrollo de las actividades pedagógicas y el intercambio de saberes que viene produciéndose de generación en generación; revolucionando hacia una cultura pluricultural multiétnica e incluyente propugnando los valores éticos y morales establecidos en el preámbulo de la Constitución de la República Bolivariana de Venezuela y en la declaración universal de los derechos humanos, fundamentada en la filosofía de los grandes pesadores pedagogos y forjadores de la independencia de Venezuela tomando los más recientes maestros de nuestra historia (Simón Rodríguez, Andrés Bello, Luís Beltrán Prieto Figueroa entre otras figuras).<br><br>

	Con una larga experiencia en materia educativa y pedagógica se ha consolidado como una institución de renombre a lo largo de las comunidades carupaneras por tener un equipo de trabajo consolidado bajo los estándares de excelencia educativa más elevados, considerando al estudiante como la razón de ser de nuestra institución educativa  y de las futuras generación, involucrando a la comunidad en el quehacer educativo para así poseer una trilogía bien consolidad donde todos los actores del hecho educativo convergen para la solución de los problemas comunitarios. 


</div>
    </div>
	</div>
</section>