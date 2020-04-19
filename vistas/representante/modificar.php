<aside class="contenedor_izq_panelcontrol"> 
    <header>
        <h5>
            MENU
        </h5>   
    </header>
    <a id="enlace_atras" href="?c=Representante&a=Index">
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
    <!--<div id="cabezera">
    <h1 >
    <span class="glyphicon glyphicon-list"></span>
        Gestiónar datos de los Estudiantes
    </h1>      
	</div>
-->
	<form action="?c=Representante&a=Guardar" method="post">
    
    <div id="representante_no_registrado" class="form-group">
    <header>
        <h2>
            Ingrese Datos del Representante
        </h2>
    </header>
    <p>
        <label for="nombre_representante">Primer Nombre</label>
        <input class="form-control"  type="text" name="primerNombreR" id="primerNombreR" placeholder="Primer Nombre" required value="<?php echo $representante->nom1_repre;?>">
    </p>
    <p> 
        <label for="nombre_representante2">Segundo Nombre</label>
        <input class="form-control"  type="text" name="segundoNombreR" id="segundoNombreR" placeholder="Segundo Nombre" value="<?php echo $representante->nom2_repre;?>">
    </p>
    <p> <label for="primerapellido">Primer Apellido</label>
        <input class="form-control"  type="text" name="primerApellidoR" id="primerApellidoR" placeholder="Primer Apelldo" value="<?php echo $representante->ape1_repre;?>">
    </p>
    <p>
        <label for="segundoapelldio">Segundo Apellido</label>
        <input class="form-control"  type="text" name="segundoApellidoR" id="segundoApellidoR" placeholder="Segundo Apelldo" value="<?php echo $representante->ape2_repre;?>">
    </p>
    <p>
        <label for="cedular">Cedula</label>
        <input class="form-control"  type="number" name="cedulaR" id="cedulaR" placeholder="Cedula:" value="<?php echo $representante->ci_repre;?>">
    </p>
    <p> 
        <label for="direccion">Direccion</label>
        <input class="form-control"  type="text" name="direccionR" id="direccionR" placeholder="Direccion: " value="<?php echo $representante->direccion;?>">
    </p>
    <p>     
        <label for="telefono">Telefono</label>
        <input class="form-control"  type="number" name="telefonoR" id="telefonoR" placeholder="Telefono/Movil" value="<?php echo $representante->telefono;?>">
    </p>
    <br>
    <input type="hidden" name="id_repre" value="<?php echo $representante->id_repre;?>">
    <button type="submit" id="btn_agregar_representante"
    >Guardar Datos Representante</button>
</div>

    </form>
</section>
<script src="assets/js/gestionEstudiante.js"></script>