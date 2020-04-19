const start = () => {
  $.ajax({
    type: "POST",
    url: "core/datos_periodo_escolar.php",
    data: {
      peticion: "obtener_periodo_escolar"
    }
  }).done(respuesta => {
    let periodo = JSON.parse(respuesta);
    $("#mostrar_periodo").text(`
            ${periodo["inicio"]}
            - 
            ${periodo["final"]}
        `);
  });
};

function reportes_personalizados() {
  if (
    document.querySelector("#reportes_personalizados").style.display === "none"
  ) {
    $("#reportes_personalizados").css({
      display: "inline-block"
    });
  } else {
    $("#reportes_personalizados").css({
      display: "none"
    });
  }
}

function descargar_reporte_personalizado() {
  $.ajax({
    type: "POST",
    url: "php/datos_periodo_escolar.php",
    data: {
      peticion: "obtener_periodo_escolar"
    }
  }).done(respuesta => {
    let periodo = JSON.parse(respuesta);
    $("#mostrar_periodo").text(`
            ${periodo["inicio"]}
            - 
            ${periodo["final"]}
        `);
  });
}

/***cosas para el profesor */
function agregar_profesor() {
  $(".contenedor_datos_panelcontrol").load(
    "vista/panelcontrol/plantillas/agregar_profesor.php"
  );
}
function mensajes_profesor(mensaje) {
  alert(mensaje);
  location.href = "gestionarprofesor.php";
}
function modicar_profe(id_profesor) {
  $.ajax({
    type: "POST",
    url: "php/obtener_datos_profesor.php",
    data: {}
  }).done(respuesta => {
    let profesores = JSON.parse(respuesta);
    console.log(profesores);

    $(".contenedor_datos_panelcontrol").load(
      "vista/panelcontrol/plantillas/modificar_profesor.php"
    );
    setTimeout(() => {
      $.each(profesores, (index, profesor) => {
        if (id_profesor == index) {
          $("#nombre").val(profesor["nombre"]);
          $("#apellido").val(profesor["apellido"]);
          $("#cedula").val(profesor["cedula"]);
          $("#grado").val(profesor["grado"]);
          $("#seccion").val(profesor["seccion"]);
          $("#estado").val(profesor["estado"]);
          $("#id").val(index);
        }
      });
    }, 1000);
  });
}
/***fin de cosas par ael profesor */
start();
