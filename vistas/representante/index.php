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
        <h1 >
        <span class="glyphicon glyphicon-home"></span>
         Gestiónar Representantes del Sistema
        </h1>
	</div>
	
	
	<div class="cabeceras_uso">
        <h5>
            <input class="form-control" id="myInput" type="text" placeholder="Buscar..">    
                <span class="glyphicon glyphicon-user"></span>
                Administrador de Representante
            <a href="?c=Representante&a=Crear"> 
            <button id="agregar_usuario">
            <span class="glyphicon glyphicon-plus"></span>
            Agregar Usuario</button>
            </a>
        </h5>             
        <input type="hidden" id="buscar" placeholder="Busqueda:" />
        

        
    </div>
	<table id="tabla_usuarios" class="table table-striped table-bordered" >
		<thead style="background: #1F618D; color: #dddddd">
	    	<tr>
	    		<th>#</th>
			 	<th>Nombre y Apellido</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Modificar</th>
			</tr>
		</thead>
        <tbody id="cuerpo_tabla">
            <?php 
                echo $tbody
            ?>
        </tbody>
        </table>
        <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#cuerpo_tabla tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
        </div>
        
    </section>