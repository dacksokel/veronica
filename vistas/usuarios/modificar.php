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
        <div id="modificar_formulario_persona">
            <header>
                <h2>
                <span class="glyphicon glyphicon-user"></span>
                    Datos Personales
                </h2>
            </header>                        
            <p>
                <label for="NombreP">Nombre</label>
                <input type="text" id="nombre"  name="nombre" placeholder="Ingrese Su Nombre" value="<?php echo $persona->nom_perso?>" required>
            </p>
            <p>
                <label for="ApellidoP">Apellido</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingrese Su Apellido" value="<?php echo $persona->ape_perso?>" required>
            </p>
            <p>
                <label for="cedulaP">Cedula</label>
                <input type="text" id="cedula" name="cedula" placeholder="Ingrese Su Numero De Cedula" value="<?php echo $persona->ci_perso?>" required>
            </p>
            <p>
                <label for="fnacimientoP">Fecha de Nacimiento</label>
                <input onchange="validar_edad_usuario()" type="date" id="fnacimiento" name="fnacimiento" value="<?php echo $persona->fnacimiento?>"required>
            </p>
            <p>
                <label for="direccionP">Direccion</label>
                <input type="text" id="direccion" name="direccion" placeholder="Ingrese Su Direccion" value="<?php echo $persona->direccion?>" required>
            </p>
        
        </div>
        <div id="modificar_formulario_usuario">
        <header>
            <h2>
            <span class="glyphicon glyphicon-user"></span>
                Datos Usuarios
            </h2>
        </header>
        
            <p>
                <label for="NombreUsuario">Nombre de Usuario: </label>
                <Input id="usuario" type="text" placeholder="Ingrese Su Nombre De Usuario" name="usuario" class="input_agregar_usuario" maxlength="8"  required pattern="[A-Za-z]+" title="Por Favor incluya al menos 1 letra Mayuscula, 1 minuscula, y 1 Numero." value="<?php echo $usuario->nom_usu?>"/>
            </p>
            <p>
                <label for="tipoUsuario">Tipo de Usuario</label>
                <select id="tipo" name="tipo" class="form-control"  Required>
                    <option>-Tipo de Usuario-</option>
                    <option selected="<?php echo $usuario->tipo_usu?>" value="Director">Directivo</option>
                    <option selected="<?php echo $usuario->tipo_usu?>" value="Operador">Operador</option>
                </select>
            </p>
            <p>
                <label for="pregunta">Pregunta de Seguridad</label>
                <select id="pregunta" name="pregunta" class="form-control"  Required>
                    <option>-Seleccione-</option>
                    <option selected="<?php echo $usuario->pregunta?>" value="¿Como se llama su primera mascota?">¿Como se llama su primera mascota?</option>
                    <option selected="<?php echo $usuario->pregunta?>" value="¿Como se llama su primer hijo?">¿Como se llama su primer hijo?</option>
                    <option selected="<?php echo $usuario->pregunta?>" value="¿En que ciudad nacio?">¿En que ciudad nacio?</option>
                    <option selected="<?php echo $usuario->pregunta?>" value="¿En que mes nacio su hijo?">¿En que mes nacio su hijo?</option>
                </select>
            </p>
            <p>
                <label for="repuesta">Respuesta de Seguridad</label>
                <input id="respuesta" name="respuesta" type="text" class="form-control" id="respuesta"placeholder="Ingrese su respuesta de seguridad" value="<?php echo $usuario->respuesta?>" Required>
            </p>
            <p>
                <label for="estado">Estado del Usuario</label>
                <select id="estado" name="estado" class="form-control" >
                    <?php
                    if($usuario->estado_usu == "Activo"){
                        echo '
                            <option selected value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        ';
                    }else{
                        echo '
                            <option value="Activo">Activo</option>
                            <option selected value="Inactivo">Inactivo</option>
                        ';
                    }
                    
                    ?>
                </select>
            </p>            
            <input type="hidden" id="id_usuario" name="id_usu" value="<?php echo $usuario->id_usu?>"/ >
            <input type="hidden" id="id_personal" name="id_perso" value="<?php echo $persona->id_perso?>"/ >
            <br>
            <button id="modificar_usuario" type="submit">Actualizar datos del usuario</button>       
        </div>
    </form>
    <!--<button id="resetUsuario" onclick="resetUsuario()">Reset Usuario</button>-->
        
</section>