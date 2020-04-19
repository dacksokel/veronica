var datos_personas, datos_usuario;

function continuar_formulario() {
  if (
    $("#nombreP").val() != "" &&
    $("#apellidoP").val() != "" &&
    $("#cedulaP").val() != "" &&
    $("#direccionP").val() != "" &&
    $("#fnacimientoP").val() != ""
  ) {
    $("#formulario_usuario").css({
      display: "inline-block"
    });
    $("button#crear_usuario").css({
      display: "inline-block"
    });
    $("#formulario_continual").css({
      display: "none"
    });
    $("#formulario_persona").css({
      display: "none"
    });
  } else {
    alert("Debe llenar todos los campos!!");
  }
}
function descargar_historial() {
  e.preventdefault();
  alert("descargarndo historial");
}
function error_contrasenas(
  usuario,
  pass,
  tipo,
  pregunta,
  respuesta,
  nombre,
  apellido,
  cedula,
  direccion,
  fnacimiento
) {
  alert("Contraseña No Coinciden");
  $(".contenedor_datos_panelcontrol").load(
    "vista/panelcontrol/plantillas/agregar_usuario.php"
  );

  setTimeout(() => {
    $("#formulario_continual").css({
      display: "none"
    });
    $("#formulario_usuario").css({
      display: "block"
    });
    $("#pass").css({
      border: "solid",
      "border-color": "red"
    });
    $("#repit_pass").css({
      border: "solid",
      "border-color": "red"
    });

    $("#nombreP").val(nombre);
    $("#apellidoP").val(apellido);
    $("#cedulaP").val(cedula);
    $("#fnacimientoP").val(fnacimiento);
    $("#direccionP").val(direccion);

    $("#usuario").val(usuario);
    $("#tipousuario").val(tipo);
    $("#pregunta").val(pregunta);
    $("#respuesta").val(respuesta);
  }, 500);
}

function validar_cedula_persona() {
  $.each(datos_usuario, (index, elementos) => {
    //console.log(dato_persona);
    if (elementos["cedula"] == $("#cedula").val()) {
      alert(
        "Esta Persona esta Registrada con el Usuario: " + elementos["usuario"]
      );
      location.reload();
    }
  });
}
function verificar_usuario() {
  $.each(datos_usuario, (index, dato_persona) => {
    //console.log(dato_persona);
    if (dato_persona["usuario"] == $("#usuario").val()) {
      alert("Este Usuario ya existe");
    }
  });
}

function mensajes(mensaje) {
  alert(mensaje);
  location.href = "gestionarUsuarios.php";
}

function validar_director() {
  let cedula = $("#cedulaP").val();
  let estado_actual = $("#tipo").val();
  console.log(estado_actual);

  $.ajax({
    type: "POST",
    url: "php/obtener_datas_usuario_para_js.php",
    data: {
      peticion: "obtener_todos_datos_usuarios"
    }
  }).done(respuesta => {
    let datos_personas = JSON.parse(respuesta);
    $.each(datos_personas, (index, dato_persona) => {
      //console.log(dato_persona);
      if (
        dato_persona["tipo"] == "Director" &&
        dato_persona["estado"] == "Activo" &&
        estado_actual == "Director"
      ) {
        console.log(dato_persona["estado"]);
        //console.log("hay un director activo");
        $("#estado").prop("disabled", true);
        if ($("#estado").val() == "Activo" && estado_actual == "Director") {
          $("#estado").prop("disabled", false);
        }
      }
    });
  });
}

function validar_edad_usuario() {
  let fecha = $("#fnacimiento")
    .val()
    .split("-");
  let ano_actual = new Date().getFullYear();
  ano_actual = parseInt(ano_actual);
  let ano_usuario = parseInt(fecha[0]);
  if (ano_actual - ano_usuario <= 17) {
    alert("El Usuario debe ser Mayor de Edad para ser Creado edad min(18)");
    $("#crear_usuario").css({
      display: "none"
    });
  } else {
    $("#crear_usuario").css({
      display: "inline-block"
    });
  }
  console.log(ano_usuario);
}
(() => {
  $.ajax({
    type: "POST",
    url: "core/obtener_datas_usuario_para_js.php",
    data: {
      peticion: "obtener_todos_datos_usuarios"
    }
  }).done(respuesta => {
    datos_usuario = JSON.parse(respuesta);
    //console.log(datos_usuario);
  });
  $.ajax({
    type: "POST",
    url: "core/obtener_datas_usuario_para_js.php",
    data: {
      peticion: "obtener_todos_datos_persona"
    }
  }).done(respuesta => {
    datos_personas = JSON.parse(respuesta);
    //console.log(datos_personas);
  });
})();
