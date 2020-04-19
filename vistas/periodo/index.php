<aside class="contenedor_izq_panelcontrol"> 
    <header>
        <h5>
            MENU
        </h5>   
    </header>
    <a id="enlace_atras" href="?c=Estudiante&a=Index">
        <img id="img_atras" src="assets/img/back.png" alt="Atras">
    </a>
        
    <nav class="menu_panel_control">
        <ul>                                           
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
    <div id="contenido" class="row">
        <h2 id="InformacionContenido">
            <span class="glyphicon glyphicon-calendar"></span>
             Administrador de Periodo Escolar
        </h2>   
        
        <button id="agregar_periodo" onclick="agregar_periodo()">Agregar Periodo</button>
        
    </div>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead style="background: #1F618D; color: #dddddd">
	    	<tr>
	    		<th>Periodo Escolar</th>
			 	<th>Estado</th>                               
			</tr>
		</thead>
        <tbody>
            <?php
                echo $tbody;
            ?>
        </tbody>
        </table>
    </div>
</section>
<script src="./js/periodo_escolar.js">
</section>