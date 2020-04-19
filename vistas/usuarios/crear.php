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
                <a href="#">
                    <span class="glyphicon glyphicon-hdd"></span> 
                    Respaldo del Sistema
                </a>
            </li>
            <li>
                <a href="historial.php">
                    <span class="glyphicon glyphicon-list-alt"></span> 
                    Historial del Sistema
                </a>
            </li>
            <li>
                <a href="cerrar_sesion.php">
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
         Gestiónar Usuarios del Sistema
        </h1>
	</div>
	
    <a class="enlace_atras_2" href="?c=Usuario&a=Index">
        <img id="img_atras_2" src="assets/img/Atras.png" alt="Atras">
    </a> 
    <form action="?c=Usuario&a=Guardarusuario" method="post">
    <div>
    <!--
        <h1 >
        <span class="glyphicon glyphicon-home"></span>
            Gestión de Usuarios del Sistema
        </h1>-->
    </div>
        <div id="formulario_persona">
            <header>
                <h2>
                <span class="glyphicon glyphicon-user"></span>
                    Agregar Persona
                </h2>
            </header>                        
            <p>
                <label for="NombreP">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombreP" placeholder="Ingrese Su Nombre" required> 
            </p>
            <p>
                <label for="ApellidoP">Apellido</label>
                <input class="form-control" type="text" name="apellido" id="apellidoP" placeholder="Ingrese Su Apellido" required>
            </p>
            <p>
                <label for="cedula">Cedula</label>
                <input onchange="validar_cedula_persona()" class="form-control" type="number" name="cedula" id="cedula" placeholder="Ingrese Su Numero De Cedula" min="1000000" max="30000000" required title="El Valor minimo Es 1millon y El maximo es 30millones">
            </p>
            <p>
                <label for="fnacimientoP">Fecha de Nacimiento</label>
                <input onchange="validar_edad_usuario()" class="form-control" type="date" name="fnacimiento" id="fnacimiento" required>
            </p>
            <p>
                <label for="direccionP">Direccion</label>
                <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Ingrese Su Direccion" required>
            </p>
            <div id="formulario_continual" onclick="continuar_formulario()">Continuar</div>
        </div>
        <div id="formulario_usuario">
        <header>
            <h2>
            <span class="glyphicon glyphicon-user"></span>
                Agregar Usuario
            </h2>
        </header>
        
            <p>
                <label for="NombreUsuario">Nombre de Usuario </label>
                <Input type="text" placeholder="Ingrese Su Nombre De Usuario" name="usuario" id="usuario"class="form-control input_agregar_usuario" minlength="4" maxlength="8"  required pattern="[A-Za-z]+" title="Por Favor solo letras " onchange="verificar_usuario()"/>
            </p>
            <p>
                <label for="passUsuario">Ingrese Su Contraseña </label>
                <Input type="password" placeholder="Ingrese Su Contraseña" name="pass" id="pass" class="form-control input_agregar_usuario" minlength="8" maxlength="15" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Por Favor incluya al menos 1 letra Mayuscula, 1 minuscula, y 1 Numero." required/>
            </p>
            <p>
                <label for="repitpassUsuario">Repita Contraseña</label>
                <Input type="password" placeholder="Repita Su Contraseña" name="repit_pass" id="repit_pass" class="form-control input_agregar_usuario"required/>
            </p>
            <p>
                <label for="tipoUsuario">Tipo de Usuario</label>
                <select name="tipo" id="tipoUsuario" class="form-control" Required>
                    <option value="Director">Directivo</option>
                    <option value="Operador">Operador</option>
                </select>
            </p>
            <p>
                <label for="pregunta">Pregunta de Seguridad</label>
                <select name="pregunta" id="pregunta" class="form-control" Required>
                    <option value="¿Como se llama su primera mascota?">¿Como se llama su primera mascota?</option>
                    <option value="¿Como se llama su primer hijo?">¿Como se llama su primer hijo?</option>
                    <option value="¿En que ciudad nacio?">¿En que ciudad nacio?</option>
                    <option value="¿En que mes nacio su hijo?">¿En que mes nacio su hijo?</option>
                </select>
            </p>
            <p>
                <label for="repuesta">Respuesta</label>
                <input name="respuesta" type="text" class="form-control" id="respuesta" placeholder="Ingrese su respuesta de seguridad" Required>
            </p>

            <button id="crear_usuario" type="submit">Guardar datos</button>        
        </div>

    </form>
        
</section>