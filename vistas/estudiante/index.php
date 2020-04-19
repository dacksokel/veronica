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
                <a href="?c=Periodo&a=Index">
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
        <input type="hidden" name="tipoUsuario" id="tipoUsuario" value="'.$_SESSION["tipo"].'">      
    </header>
	<div class="contenedor_datos_panelcontrol">
    <div id="cabezera">
    <h1 >
    <span class="glyphicon glyphicon-list"></span>
        Gestiónar datos de los Estudiantes
    </h1>      
	</div>
	<div class="cabeceras_uso">
        <h5>
            <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
            <span class="glyphicon glyphicon-user"></span>
             Administrador de Estudiantes
             <?php
             $retorno ='';
             if($_SESSION["tipo"] == "Operador" || $_SESSION["tipo"] == "Administrador"){
                 $retorno = '
                 <a href="?c=Estudiante&a=Crear">
                 <button id="agregar_estudiante">
                 <span class="glyphicon glyphicon-plus"></span>
                 Agregar Estudiante</button>
                 </a>
                 ';
             }
             echo $retorno;
             ?>
        </h5>         
            <input  type="hidden" id="buscar" placeholder="Busqueda:"/>
    </div>
	<table  class="table table-striped table-bordered" cellspacing="0">
		<thead style="background: #1F618D; color: #dddddd">
	    	<tr>
	    		<th>#</th>
			 	<th>Cedula Escolar</th>
                <th>Nombre</th>                
                <th>Apellido</th>                
                <th>Sexo</th>
                <th>Grado</th>                
                <th>Seccion</th>
                <th>Estado</th>
                <th>Modificar</th>
			</tr>
		</thead>
        <tbody id="cuerpo_tabla_e">
            <?php
                echo $tbody;            
            ?>
        </tbody>
        </table>
        <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#cuerpo_tabla_e tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
    </div>
</section>