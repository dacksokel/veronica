function agregar_periodo() {
  let ano_inicio = new Date().getFullYear();
  ano_inicio = parseInt(ano_inicio);
  let ano_culmina = ano_inicio + 1;

  $.ajax({
    type: "POST",
    url: "php/datos_periodo_escolar.php",
    data: {
      inicio: ano_inicio,
      final: ano_culmina,
      peticion: "crear_periodo_escolar"
    }
  }).done(respuesta => {
    alert(respuesta);
  });
}
function inicio() {
  $.ajax({
    type: "POST",
    url: "php/datos_periodo_escolar.php",
    data: {
      peticion: "obtener_periodo_escolar"
    }
  }).done(respuesta => {
    let periodo = JSON.parse(respuesta);
    let ano_actual = new Date().getFullYear();
    if (periodo["inicio"] == ano_actual) {
      $("#cuerpo_tabla").html(`
        <td style="text-align: center">
            ${periodo["inicio"]} - ${periodo["final"]}
        </td>
        <td id="estado_perido_activo" style="text-align: center">
            Activo
        </td>
      `);
    } else {
      $("#cuerpo_tabla").html(`
        <td>
            ${periodo["inicio"]} - ${periodo["final"]}
        </td>
        <td id="estado_perido_inactivo">
            Inactivo
        </td>
      `);
    }
  });
}

inicio();
