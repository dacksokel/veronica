var datos_estudiantes, datos_representate;
// const verificar_ci_r = () => {
//   let ci_r = $("#cirepresentante").val();
//   if (ci_r != "" && ci_r.length >= 7 && ci_r.length <= 8) {
//     $.ajax({
//       type: "POST",
//       url: "core/obtener_datos_usuario_para_js.php",
//       data: {
//         cedula: ci_r,
//         peticion: "cedula"
//       }
//     }).done(respuesta => {
//       //console.log(respuesta);
//       if (respuesta == "no existe") {
//         alert("Este Representante No Existe guarde los Datos para continuar");
//         $("#cedulaR").val($("#cirepresentante").val());
//         $("#btn_agregar_representante_continual").css({
//           display: "none"
//         });
//         $("#btn_verificarR_continual").css({
//           display: "block"
//         });
//       } else {
//         alert("Este Representante YA Existe Continue Agregando al estudiante");
//         $("#cirepresentante").prop("disabled", true);
//         // $("#representante_no_registrado").css({
//         //   display: "block"
//         // });
//         $("#btn_agregar_representante_continual").css({
//           display: "inline-block"
//         });
//         obtener_datos_representante($("#cirepresentante").val());
//       }
//     });
//   } else {
//     alert("Escriba una Cedula Valida");
//   }
// };
// function continuar_representante() {
//   if (
//     $("#ci_escolar").val().length == 11 &&
//     $("#primerNombreE").val() != "" &&
//     $("#primerApellidoE").val() != "" &&
//     $("#cirepresentante").val() != ""
//   ) {
//     $("#representante_no_registrado").css({
//       display: "block"
//     });
//     $("#registrar_estudiante").css({
//       display: "none"
//     });
//   } else {
//     if ($("#ci_escolar").val().length != 11) {
//       alert("Verifique la cedula escolar");
//     } else {
//       alert("LLene los campos requeridos");
//     }
//   }
// }

// function crear_representante() {
//   if (
//     $("#primerNombreR").val() != "" &&
//     $("#primerApellidoR").val() != "" &&
//     $("#cedulaR").val() != "" &&
//     $("#direccionR").val() != "" &&
//     $("#telefonoR").val() != ""
//   ) {
//     $.ajax({
//       type: "POST",
//       url: "php/datos_representate.php",
//       data: {
//         peticion: "crear_representante",
//         nombre1: $("#primerNombreR").val(),
//         nombre2: $("#segundoNombreR").val(),
//         apellido1: $("#primerApellidoR").val(),
//         apellido2: $("#segundoApellidoR").val(),
//         cedula: $("#cedulaR").val(),
//         direccion: $("#direccionR").val(),
//         telefono: $("#telefonoR").val()
//       }
//     }).done(respuesta => {
//       //console.log(respuesta);
//       if (respuesta == "exito") {
//         alert("Representante Creado Exitosamente");
//         crear_estudiante();
//         // window.location.reload();
//       } else {
//         alert(respuesta);
//       }
//     });
//   } else {
//     alert("LLene Los Campos Obligatorios");
//     $("#primerNombreR").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#primerApellidoR").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#cedulaR").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#direccionR").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#telefonoR").css({
//       border: "solid",
//       "border-color": "red"
//     });
//   }
// }

function verificar_ci_escolar() {
  let ci_E = $("#ci_escolar").val();
  let veri = false;
  if (ci_E != "" && ci_E.length == 11) {
    $.each(datos_estudiantes, (index, elementos) => {
      //console.log(elementos["ci_esco"]);
      if (elementos["ci_esco"] == ci_E) {
        alert("Estudiante ya Existe");
        //window.location.reload();
        $("#btn_agregar_representante_continual").css({
          display: "none"
        });
        veri = true;
      } else if (index == "vacio" && !veri) {
        console.log("bandera");
        $("#btn_agregar_representante_continual").css({
          display: "inline-block"
        });
      }
    });
  } else {
    alert("Escriba Un Cedula Valida debe terner 11 digitos");
  }
}

function verificar_representate() {
  let veri = false;
  $.each(datos_representate, (index, representate) => {
    if (representate["ci_repre"] == $("#ci_repre").val()) {
      alert(
        "El estudiante se asociara con el representate " +
          representate["nom1_repre"] +
          " " +
          representate["ape1_repre"]
      );
      veri = true;
    } else if (index == "vacio" && !veri) {
      alert("Representate no existe");
      $("#redict_repre").va("Si");
    }
  });
}
// function obtener_datos_estudiante(cedula_estudiante) {
//   // console.log("aqui entro" + cedula_estudiante);
//   $.ajax({
//     type: "POST",
//     url: "php/datos_estudiantes.php",
//     data: {
//       peticion: "obtener_datos_estudiante",
//       cedula: cedula_estudiante
//     }
//   }).done(respuesta => {
//     // console.log(respuesta);
//     let datos_estudiante = JSON.parse(respuesta);
//     //console.log(datos_estudiante);
//     $("button#btn_agregar_representante_continual").css({
//       display: "none"
//     });
//     $("#btn_actualizar_estudiante").css({
//       display: "block"
//     });
//     $("#primerNombreE").val(datos_estudiante["nombre1"]);
//     $("#segundoNombreE").val(datos_estudiante["nombre2"]);
//     $("#primerApellidoE").val(datos_estudiante["apellido1"]);
//     $("#segundoApellidoE").val(datos_estudiante["apellido2"]);
//     $("#ci_escolar").val(datos_estudiante["cedula_escolar"]);
//     $("#ci_personal").val(datos_estudiante["cedula_persona"]);
//     $("#sexoE").val(datos_estudiante["sexo"]);
//     $("#fnacimientoE").val(datos_estudiante["fnacimiento"]);

//     if (datos_estudiante["discapacidad"] == "Si") {
//       $("#discapacidadSi").css({
//         display: "block"
//       });
//     } else {
//       $("#preguntaDiscapacidad").val(datos_estudiante["discapacidad"]);
//     }
//     if (datos_estudiante["grado"] != "") {
//       $("#respuestanivelgrado").css({
//         display: "block"
//       });
//     }
//     $("#respuestanivelgrado").val(datos_estudiante["grado"]);
//     setTimeout(() => {
//       edad_handler();
//     }, 1000);
//   });
// }

// const crear_estudiante = () => {
//   let anoinicio = new Date().getFullYear();
//   anoinicio = parseInt(anoinicio);
//   let periodo = anoinicio + "-" + (anoinicio + 1);
//   let ci_escolar = $("#ci_escolar").val();
//   if (
//     ci_escolar.length == 11 &&
//     $("#primerNombreE").val() != "" &&
//     $("#primerApellidoE").val() != "" &&
//     $("#segundoNombreE").val() != "" &&
//     $("#cirepresentante").val() != "" &&
//     $("#segundoApellidoE").val() != "" &&
//     $("#fnacimientoE").val() != "" &&
//     $("#preguntaDiscapacidad").val() != "" &&
//     $("#sexoE").val() != ""
//   ) {
//     $.ajax({
//       type: "POST",
//       url: "php/datos_estudiantes.php",
//       data: {
//         peticion: "crear_estudiantes",
//         nombre1: $("#primerNombreE").val(),
//         nombre2: $("#segundoNombreE").val(),
//         apellido1: $("#primerApellidoE").val(),
//         apellido2: $("#segundoApellidoE").val(),
//         cedula_escolar: ci_escolar,
//         cedula_personal: $("#ci_personal").val(),
//         sexo: $("#sexoE").val(),
//         fnacimiento: $("#fnacimientoE").val(),
//         discapacidad_pregunta: $("#preguntaDiscapacidad").val(),
//         descripcion_discapacidad: $("#descripcionDiscapacidad").val(),
//         grado: $("#gradosE").val(),
//         seccion: $("#seccionE").val(),
//         periodo: periodo,
//         cedula_representante: $("#cedulaR").val()
//       }
//     }).done(respuesta => {
//       //console.log(respuesta);
//       if (respuesta == "exito") {
//         alert("Estudiante Creado Exitosamente");
//         if ($("#cirepresentante").val() != "") {
//           window.location.reload();
//         }
//       } else {
//         alert(respuesta);
//       }
//     });
//   } else {
//     alert(
//       "Error la cedula escolar Debe contener 11 Digitos, y ademas verifique los campos requeridos "
//     );
//     $("#ci_escolar").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#primerNombreE").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#primerApellidoE").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#segundoNombreE").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#cirepresentante").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#segundoApellidoE").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#fnacimientoE").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#preguntaDiscapacidad").css({
//       border: "solid",
//       "border-color": "red"
//     });
//     $("#sexoE").css({
//       border: "solid",
//       "border-color": "red"
//     });
//   }
// };

function discapacidad_handler() {
  let pre_discapacidad = $("#preguntaDiscapacidad").val();
  if (pre_discapacidad == "Si") {
    $("#discapacidadSi").css({
      display: "block"
    });
  } else {
    $("#discapacidadSi").css({
      display: "none"
    });
  }
}

function preguntanivelgrado_handler() {
  let pre_nivelgrado = $("#preguntanivelgrado").val();
  if (pre_nivelgrado == "Si") {
    $("#respuestanivelgrado").css({
      display: "block"
    });
  } else {
    $("#respuestanivelgrado").css({
      display: "none"
    });
  }
}

function edad_handler() {
  let d = new Date();
  let ano_actual = parseInt(d.getFullYear());
  let arreglo_fnacimiento = $("#fnacimientoE")
    .val()
    .split("-");
  let gradonivel_cursados = $("#respuestanivelgrado").val();
  let ano_fnacimiento = parseInt(arreglo_fnacimiento[0]);
  let mes_fnacimiento = parseInt(arreglo_fnacimiento[1]);
  let edad_E = ano_actual - ano_fnacimiento;
  console.log(" esta es la edad :" + edad_E);

  /** PRIMER NIVEL */
  if (edad_E >= 2 && edad_E <= 4 && gradonivel_cursados == "nograde") {
    if (
      (edad_E == 2 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 3 && edad_E <= 4)
    ) {
      $("#gradosE").val("primernivel");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      `);
    } else {
      console.log("No apto para entrar al primer nivel");
      $("#gradosE").val("noaplica");
      $("#seccionE").html(`
      <option value="">No Aplica</option>
      `);
    }
  }
  /** SEGUNDO NIVEL */
  if (edad_E >= 3 && edad_E <= 5 && gradonivel_cursados == "primernivel") {
    if (
      (edad_E == 3 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 4 && edad_E <= 5)
    ) {
      $("#gradosE").val("segundonivel");
      $("#seccionE").html(`
      <option value="B">Seccion B</option>
      `);
    } else {
      console.log("No apto para entrar al segundo nivel");
      $("#gradosE").val("primernivel");
      $("#seccionE").html(`
        <option value="A">Seccion A</option>
      `);
    }
  }
  /** TERCER NIVEL */
  if (edad_E >= 4 && edad_E <= 6 && gradonivel_cursados == "segundonivel") {
    if (
      (edad_E == 4 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 5 && edad_E <= 6)
    ) {
      $("#gradosE").val("tercernivel");
      $("#seccionE").html(`
      <option value="C">Seccion C</option>
      <option value="D">Seccion D</option>
      `);
    } else {
      console.log("No apto para entrar al tercer nivel nivel");
      $("#gradosE").val("segundonivel");
      $("#seccionE").html(`
        <option value="B">Seccion B</option>
      `);
    }
  }

  /** 1° GRADO */
  if (edad_E >= 5 && edad_E <= 7 && gradonivel_cursados == "tercernivel") {
    if (
      (edad_E == 5 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 6 && edad_E <= 7)
    ) {
      $("#gradosE").val("primergrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      <option value="D">Seccion D</option>
      `);
    } else {
      console.log("No apto para entrar al primer grado nivel");
      $("#gradosE").val("tercernivvel");
      $("#seccionE").html(`
      <option value="C">Seccion C</option>
      <option value="D">Seccion D</option>
      `);
    }
  }

  /** 2° GRADO */
  if (edad_E >= 6 && edad_E <= 8 && gradonivel_cursados == "primergrado") {
    if (
      (edad_E == 6 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 7 && edad_E <= 8)
    ) {
      $("#gradosE").val("segundogrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      <option value="D">Seccion D</option>
      `);
    } else {
      console.log("No apto para entrar al segundo grado nivel");
      $("#gradosE").val("primergrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      <option value="D">Seccion D</option>
      `);
    }
  }
  /** 3° GRADO */
  if (edad_E >= 7 && edad_E <= 9 && gradonivel_cursados == "segundogrado") {
    if (
      (edad_E == 7 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 7 && edad_E <= 8)
    ) {
      $("#gradosE").val("tercergrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      
      `);
    } else {
      console.log("No apto para entrar al tercer grado nivel");
      $("#gradosE").val("segundogrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      <option value="D">Seccion D</option>
      `);
    }
  }
  /** 4° GRADO */
  if (edad_E >= 8 && edad_E <= 10 && gradonivel_cursados == "tercergrado") {
    if (
      (edad_E == 8 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 9 && edad_E <= 10)
    ) {
      $("#gradosE").val("cuartogrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      `);
    } else {
      console.log("No apto para entrar al cuarto grado nivel");
      $("#gradosE").val("tercergrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      
      `);
    }
  }
  /** 5° GRADO */
  if (edad_E >= 9 && edad_E <= 11 && gradonivel_cursados == "cuartogrado") {
    if (
      (edad_E == 9 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 10 && edad_E <= 11)
    ) {
      $("#gradosE").val("quintogrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      `);
    } else {
      console.log("No apto para entrar al quinto grado nivel");
      $("#gradosE").val("cuartogrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      `);
    }
  }

  /** 6° GRADO */
  if (edad_E >= 10 && edad_E <= 12 && gradonivel_cursados == "quintogrado") {
    if (
      (edad_E == 10 && (mes_fnacimiento > 0 && mes_fnacimiento < 4)) ||
      (edad_E >= 11 && edad_E <= 12)
    ) {
      $("#gradosE").val("sextogrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      `);
    } else {
      console.log("No apto para entrar al sexto grado nivel");
      $("#gradosE").val("quintogrado");
      $("#seccionE").html(`
      <option value="A">Seccion A</option>
      <option value="B">Seccion B</option>
      <option value="C">Seccion C</option>
      `);
    }
  }
}

// function modicar_estudiante(e) {
//   let id = e;
//   $.ajax({
//     type: "POST",
//     url: "php/datos_estudiantes.php",
//     data: {
//       id: id,
//       peticion: "entrar_modificar_estudiante"
//     }
//   }).done(respuesta => {
//     console.log(respuesta);
//     let estudiante = JSON.parse(respuesta);
//     console.log(estudiante);
//     $(".contenedor_datos_panelcontrol").load(
//       "vista/panelcontrol/plantillas/modificar_estudiante.php"
//     );
//     setTimeout(() => {
//       $("#primerNombreE").val(estudiante["nombre1"]);
//       $("#segundoNombreE").val(estudiante["nombre2"]);
//       $("#primerApellidoE").val(estudiante["apellido1"]);
//       $("#segundoApellidoE").val(estudiante["apellido2"]);
//       $("#ci_escolar").val(estudiante["cedula_escolar"]);
//       $("#ci_personal").val(estudiante["cedula_persona"]);
//       $("#sexoE").val(estudiante["sexo"]);
//       if (estudiante["grado"] != "") {
//         $("#preguntanivelgrado").val("Si");
//         $("#respuestanivelgrado").val(estudiante["grado"]);
//         $("#respuestanivelgrado").css({
//           display: "block"
//         });
//       } else {
//         $("#respuestanivelgrado").css({
//           display: "none"
//         });
//       }
//       $("#fnacimientoE").val(estudiante["fnacimiento"]);
//       if (estudiante["discapacidad"] != "No") {
//         $("#preguntaDiscapacidad").val(estudiante["discapacidad"]);
//         $("#descripcionDiscapacidad").val(estudiante["espe_discapacidad"]);
//         $("#descripcionDiscapacidad").css({
//           display: "block"
//         });
//       } else {
//         $("#preguntaDiscapacidad").val(estudiante["discapacidad"]);
//         $("#descripcionDiscapacidad").css({
//           display: "none"
//         });
//       }
//       if (estudiante["estado"] != "Retirado") {
//         $("#egresar_estudiante").css({
//           display: "none"
//         });
//       } else {
//         $("#egresar_estudiante").css({
//           display: "none"
//         });
//       }
//       $("#estado_estudiante").val(estudiante["estado"]);
//       $("#id_estudiante").val(estudiante["id"]);

//       if ($("#tipoUsuario").val() == "Operador") {
//         $("#estado_estudiante").css({
//           display: "none"
//         });
//       }

//       edad_handler();
//       obtener_datos_representante(estudiante["ci_representante"]);
//     }, 700);
//   });
// }

// function obtener_datos_representante(cedula) {
//   $.ajax({
//     type: "POST",
//     url: "php/datos_representate.php",
//     data: {
//       cedula: cedula,
//       peticion: "obtener_datos_representante"
//     }
//   }).done(respuesta => {
//     //console.log(respuesta);
//     let representante = JSON.parse(respuesta);
//     $("#id_representante").val(representante["id"]);
//     $("#primerNombreR").val(representante["nombre1"]);
//     $("#segundoNombreR").val(representante["nombre2"]);
//     $("#primerApellidoR").val(representante["apellido1"]);
//     $("#segundoApellidoR").val(representante["apellido2"]);
//     $("#cedulaR").val(representante["cedula"]);
//     $("#direccionR").val(representante["direccion"]);
//     $("#telefonoR").val(representante["telefono"]);
//   });
// }

// function actualizar_representante() {
//   $.ajax({
//     type: "POST",
//     url: "php/datos_representate.php",
//     data: {
//       nombre1: $("#primerNombreR").val(),
//       nombre2: $("#segundoNombreR").val(),
//       apellido1: $("#primerApellidoR").val(),
//       apellido2: $("#segundoApellidoR").val(),
//       cedula: $("#cedulaR").val(),
//       direccion: $("#direccionR").val(),
//       telefono: $("#telefonoR").val(),
//       id: $("#id_representante").val(),
//       peticion: "actualizar_datos_representante"
//     }
//   }).done(respuesta => {
//     console.log(respuesta);
//     if (respuesta == "exito") {
//       alert("Representante Actualizado Exitosamente");
//       Window.location.reload();
//     } else {
//       alert(respuesta);
//     }
//   });
// }

// function actualizar_estudiante() {
//   let anoinicio = new Date().getFullYear();
//   anoinicio = parseInt(anoinicio);
//   let periodo = anoinicio + "-" + (anoinicio + 1);
//   let fecha = new Date();
//   let fecha_actual = `${fecha.getFullYear}-${fecha.getMonth}-${fecha.getDay}`;
//   if ($("#estado_estudiante").val() == "Retirado") {
//     $("#egresar_estudiante").css({
//       display: "block"
//     });
//     $("#registrar_estudiante").css({
//       display: "none"
//     });
//     $("#representante_no_registrado").css({
//       display: "none"
//     });
//     $("#btn_retirar_estudiante").css({
//       display: "block"
//     });
//     $("#btn_actualizar_estudiante").css({
//       display: "none"
//     });
//   } else {
//     if ($("#ci_escolar").val().length == 11) {
//       // confirm("esta es la Cedula escolar? " + $("#ci_escolar").val());
//       $.ajax({
//         type: "POST",
//         url: "php/datos_estudiantes.php",
//         data: {
//           nombre1: $("#primerNombreE").val(),
//           nombre2: $("#segundoNombreE").val(),
//           apellido1: $("#primerApellidoE").val(),
//           apellido2: $("#segundoApellidoE").val(),
//           cedula_escolar: $("#ci_escolar").val(),
//           cedula_personal: $("#ci_personal").val(),
//           sexo: $("#sexoE").val(),
//           fnacimiento: $("#fnacimientoE").val(),
//           discapacidad_pregunta: $("#preguntaDiscapacidad").val(),
//           descripcion_discapacidad: $("#descripcionDiscapacidad").val(),
//           grado: $("#gradosE").val(),
//           seccion: $("#seccionE").val(),
//           periodo: periodo,
//           cedula_representante: $("#cedulaR").val(),
//           peticion: "actualizar_datos_estudiante",
//           estado_estudiante: $("#estado_estudiante").val(),
//           id: $("#id_estudiante").val()
//         }
//       }).done(respuesta => {
//         console.log(respuesta);
//         if (respuesta == "exito") {
//           if ($("#estado_estudiante").val() == "Reingresado") {
//             alert("Se a reincorporado el estudiante exitosamente");
//           } else {
//             alert("Estudiante Actualizado Exitosamente");
//           }

//           location.reload();
//         } else {
//           alert(respuesta);
//         }
//       });
//     } else {
//       alert("la cedula Escolar debe tener 11 Digitos");
//     }
//   }
// }

// function retirar_estudiante() {
//   let anoinicio = new Date().getFullYear();
//   anoinicio = parseInt(anoinicio);
//   let periodo = anoinicio + "-" + (anoinicio + 1);
//   let fecha = new Date();
//   let fecha_actual = `${fecha.getFullYear()}-${fecha.getMonth()}-${fecha.getDay()}`;
//   // console.log(fecha_actual);
//   if ($("#motivo_egreso_estudiante").val() != "") {
//     $.ajax({
//       type: "POST",
//       url: "php/datos_estudiantes.php",
//       data: {
//         nombre1: $("#primerNombreE").val(),
//         nombre2: $("#segundoNombreE").val(),
//         apellido1: $("#primerApellidoE").val(),
//         apellido2: $("#segundoApellidoE").val(),
//         cedula_escolar: $("#ci_escolar").val(),
//         cedula_personal: $("#ci_personal").val(),
//         sexo: $("#sexoE").val(),
//         fnacimiento: $("#fnacimientoE").val(),
//         discapacidad_pregunta: $("#preguntaDiscapacidad").val(),
//         descripcion_discapacidad: $("#descripcionDiscapacidad").val(),
//         grado: $("#gradosE").val(),
//         seccion: $("#seccionE").val(),
//         periodo: periodo,
//         cedula_representante: $("#cedulaR").val(),
//         peticion: "motivo_egreso_estudiante",
//         estado_estudiante: $("#estado_estudiante").val(),
//         id: $("#id_estudiante").val(),
//         m_e_e: $("#motivo_egreso_estudiante").val(),
//         fecha_actual: fecha_actual
//       }
//     }).done(res => {
//       if (res == "exito") {
//         alert(
//           "Estudiante Retirado Exitosamente en la fecha: " +
//             fecha_actual +
//             " y en el periodo Escolar " +
//             periodo
//         );
//         window.location.reload();
//       } else {
//         console.log(res);
//         alert(res);
//       }
//     });
//   } else {
//     alert("Ingrese un motivo de egreso");
//   }
// }
(() => {
  $.ajax({
    type: "POST",
    url: "core/obtener_datas_usuario_para_js.php",
    data: {
      peticion: "obtener_todos_estudiantes"
    }
  }).done(respuesta => {
    //console.log(respuesta);
    datos_estudiantes = JSON.parse(respuesta);
    console.log(datos_estudiantes);
  });
  $.ajax({
    type: "POST",
    url: "core/obtener_datas_usuario_para_js.php",
    data: {
      peticion: "obtener_todos_representante"
    }
  }).done(respuesta => {
    // console.log(respuesta);
    datos_representate = JSON.parse(respuesta);
    console.log(datos_representate);
  });
})();
