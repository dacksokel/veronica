
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
        <h2>
            Inicio de Sesión            
        </h2>
        <div id="contenedor_real_login_img_login" class="sinlogiar">
        <div class="sinlogiar" id="cont_img_sinlogin">
            <img src="assets/img/usuario.png">
        </div>    
        <div class="sinlogiar">
            <form method="post" action="">
                <p class="input-group input-group-ml">
                    <span class="input-group-addon" id="sizing-addon1">
                        U
                    </span>
                    <input name="usuario" value="" type="text" class="form-control" placeholder="Nombre de Usuario" aria-describedby="sizing-addon1" required>
                </p>

                <p class="input-group input-group-ml">
                    <span class="input-group-addon" id="sizing-addon2">
                        C
                    </span>
                    <input name="pass" type="password" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon1" required>
                </p>

                <button type="submit" id="boton_entrar" required>Entrar</button>
            </form>
        </div>
              
    </div>
</section>