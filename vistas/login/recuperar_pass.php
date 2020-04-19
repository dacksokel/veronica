<aside class="contenedor_izq_panelcontrol">
    <header>
        <h5>
            Menu de  Inicio 
        </h5>
    </header>
    <nav class="menu_panel_control">
        <ul>
            <li>
                <a href="/">
                <span class="glyphicon glyphicon-log-in"></span>
                    Inicio de Sesión
                </a>
            </li>
            <li>
                <a href="?c=Recuperarpass&a=Index">
                <span class="glyphicon glyphicon-cog"></span>
                Recuperar Mi Contraseña
                </a>
            </li>
        </ul>
    </nav>
</aside>
<section class="contenedor_panel_control">
    <header class="header_panelcontrol">
        <div id="datos_usuario">
            <p>
                
            </p>
            <p>
               
            </p>

        </div>
        <img id="logo_institucion" src="assets/img/LogoInstitucion.jpg.png">
        <div class="logo_nombre">
            
            <p>
                Sistema de Gestión de Estadística de Estudiantes (SGEE)
            </p>
            
        </div>   
    </header>
    <div class="cabeceras_uso_2">
        <center>
            <h2>
                Recuperar Mi Contraseña        
            </h2>
        </center>    
        <div class="sinlogiar" id="cont_img_sinlogin">
            <div>
                <img src="assets/img/usuario.png">
            </div>
        </div>
        <div class="sinlogiar">
            <label for="usuario">Usuario</label>
            <input type="text" onchange="verificar_usuario()" class="form-control" id="usuaurio_recuperar_pass" placeholder="Ingrese El Nombre De Usuario"  required pattern="[A-Za-z]+">
            <br>
            <label for="passr">Nueva Contraseña</label>
            <input type="password" class="form-control" id="pwd" placeholder="Ingrese La Nueva Contraseña"  minlength="8" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Por Favor incluya al menos 1 letra Mayuscula, 1 minuscula, y 1 Numero." required>
            <br>
            <label for="pregunta">Pregunta Secreta</label>
            <select class="form-control" name="pregunta_seguridad_recuperar_pass" id="pregunta_seguridad_recuperar_pass">                    
                <option>-Seleccione-</option>
                <option value="¿Como se llama su primera mascota?">¿Como se llama su primera mascota?</option>
                <option value="¿Como se llama su primer hijo?">¿Como se llama su primer hijo?</option>
                <option value="¿En que ciudad nacio?">¿En que ciudad nacio?</option>
                <option value="¿En que mes nacio su hijo?">¿En que mes nacio su hijo?</option>
            </select>
            <br>
            <label for="respuesta">Respuesta Secreta</label>
            <input class="form-control" type="text" name="respuesta_secreta" id="respuesta_secreta" placeholder="Ingrese Su Respuesta Secreta">
        </div>
        
        <div class="sinlogin">
            <button onclick ="guardar_recuperar()" id="btn_cambiar_pass">Guardar</button>
        </div>    
    </div>
    
</section>
<script src="js/recuperarpass.js"></script>