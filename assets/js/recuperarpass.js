var datos_usuario;
function guardar_recuperar() {
  $.ajax({
    type: "POST",
    url: "lostPass.php",
    data: {
      peticion: "guardar_nuevo_pass",
      usuario: $("#usuaurio_recuperar_pass").val(),
      nuevo_pass: $("#pwd").val(),
      pregunta_secreta: $("#pregunta_seguridad_recuperar_pass").val(),
      respuesta: $("#respuesta_secreta").val()
    }
  }).done(respuesta => {
    if (respuesta == "exito") {
      alert("Cambio de Contraseña Exitoso");
      window.location.href = "/";
    } else {
      console.log(respuesta);
      alert(respuesta);
    }
  });
}

function verificar_usuario() {
  let v = false;
  $.each(datos_usuario, (index, elementos) => {
    if (elementos["usuario"] == $("#usuaurio_recuperar_pass").val()) {
      v = true;
    }
  });
  if (v) {
    $("#btn_cambiar_pass").css({
      display: "inline-block"
    });
  } else {
    alert("Este Usuario No existe");
    $("#btn_cambiar_pass").css({
      display: "none"
    });
  }
}

(() => {
  $.ajax({
    type: "POST",
    url: "php/obtener_datas_usuario_para_js.php",
    data: {
      peticion: "obtener_todos_datos_usuarios"
    }
  }).done(respuesta => {
    datos_usuario = JSON.parse(respuesta);
  });
})();
