 function EditarHora(dato) {
  $.ajax({
    type: "POST",
    url: "editar_hora_trabajador",
    data: {
      id: $("#id_turno" + dato).val(),
      opcion: $("#opcion_trabajador" + dato).val(),
      hora: $("#hora" + dato).val(),
      dia: $("#dia").val(),
       area: $("#select_area").val(),
      trabajador: $("#trabajador" + dato).val(),
      semana: $("#semana").val(),
    },
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        MensajeExito("DATOS MODIFICADOS CORRECTAMENTE")
        VerTurnoSemana($("#dia").val())
      }
    }
  })
 }


 function VerTurnoSemana(dia) {
  $.ajax({
    type: "POST",
    url: "get_trabajadores_area",
    data: {
      area: $("#select_area").val(),
    },
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        var table = ""
        $(".trabajadores").empty()
        $(".trabajadores").append("<th>Total T.</th><th></th>")
        let x = {
          slotInterval: 30,
          openTime: '10:00',
          closeTime: '00:00'
        };
        //Format the time
        let startTime = moment(x.openTime, "HH:mm");
        //Format the end time and the next day to it
        let endTime = moment(x.closeTime, "HH:mm").add(1, 'days');
        var tab = ""
          //Loop over the times - only pushes time with 30 minutes interval
        var opts = ""
        var opts2 = ""
        var opts3 = ""
        var opts4 = ""
        var horas_semanales = ""
        $("#TablaTurnoTrabajadores tbody").empty()
        $.each(datos.data, function () {
          var trabaja = this.id
          table += "<th><b>" + this.nombres + " " + this.apellidos + "</b></th>"
          //funcion que permite traer el contador de horas trabajadas, colacion, horas extras segun el trabajador
          $.ajax({
            type: "POST",
            url: "contar_horas_trabajador",
            data: {
              area: $("#select_area").val(),
              dia: $("#dia").val(),
              semana: $("#semana").val(),
              trabajador: trabaja
            },
            success: function (response) {
              var datos3 = $.parseJSON(response)
              if (datos3.status == "error") {} else if (datos3.status == 'success') {
                var clase = datos3.data.id_trabajador
                //DIA
                var libre_dia = datos3.data.horas_libres
                var trabaja_dia = datos3.data.horas_trabajadas
                var colacion_dia = datos3.data.horas_colacion
                var hora_extra_dia = datos3.data.horas_extras
                //SEMANA
                var libre_semana = datos3.data2.horas_libres
                var trabaja_semana = datos3.data2.horas_trabajadas
                var colacion_semana = datos3.data2.horas_colacion
                var hora_extra_semana = datos3.data2.horas_extras
                if (parseInt(trabaja_semana / 2) > 45) {
                  MensajeAdvertencia("EL TRABAJADOR SUPERA LAS 45 HORAS SEMANALES")
                }
                if (parseFloat(hora_extra_dia / 2) > 2) {
                  MensajeAdvertencia("EL TRABAJADOR SUPERA LAS 12 HORAS EXTRAORDINARIAS SEMANALES")
                }
                if (parseFloat(hora_extra_semana / 2) > 12) {
                  MensajeAdvertencia("EL TRABAJADOR SUPERA LAS 12 HORAS EXTRAORDINARIAS SEMANALES")
                }
                $("#horas_trabajador" + clase).empty()
                $("#horas_trabajador_semana" + clase).empty()
                $("#horas_trabajador" + clase).append("<h3><b>DIARIO</b></h3> <b>TRABAJA :</b>" + (parseFloat(trabaja_dia / 2)) + "<br> <b>COLACIÓN : </b>" + (parseFloat(colacion_dia / 2)) + "<br> <b>HORA EXTRA :</b> " + (parseFloat(hora_extra_dia / 2)) + "<input type='hidden' name='trabaja_dia" + clase + "' id='trabaja_dia" + clase + "' value='" + trabaja_dia + "' ><input type='hidden' name='colacion_dia" + clase + "' id='colacion_dia" + clase + "' value='" + colacion_dia + "' ><input type='hidden' name='hora_extra_dia" + clase + "' id='hora_extra_dia" + clase + "' value='" + hora_extra_dia + "' ><input type='hidden' name='libre_dia" + clase + "' id='libre_dia" + clase + "' value='" + libre_dia + "' >")

                $("#horas_trabajador_semana" + clase).append("<h3><b>SEMANAL</b></h3> <b>TRABAJA :</b>" + (parseFloat(trabaja_semana / 2)) + "<br><b>COLACIÓN :</b>" + (parseFloat(colacion_semana / 2)) + "<br> <b>HORA EXTRA :</b> " + (parseFloat(hora_extra_semana / 2)) + "<input type='hidden' name='trabaja_semana" + clase + "' id='trabaja_semana" + clase + "' value='" + trabaja_semana + "' ><input type='hidden' name='colacion_semana" + clase + "' id='colacion_semana" + clase + "' value='" + colacion_semana + "' ><input type='hidden' name='hora_extra_semana" + clase + "' id='hora_extra_semana" + clase + "' value='" + hora_extra_semana + "' ><input type='hidden' name='libre_semana" + clase + "' id='libre_semana" + clase + "' value='" + libre_semana + "' >")
              }
            }
          }) //ajax ver turno area
        })
        $(".trabajadores").append(table)
        while (startTime <= endTime) {
          opts = "<tr>"
          opts += "<td  id='cantidad_trabajadores" + startTime.format("HHmm") + "' name='cantidad_trabajadores" + startTime.format("HHmm") + "'></td><td ><b>" + startTime.format("HH:mm") + "</b></td>"
          opts2 = "<tr><td></td><td></td>"
          opts3 = "<tr><td></td><td></td>"
          //Add interval of 30 minutes
          $.each(datos.data, function () {
            opts += "<td class='td_trabaja' id='td_trabaja' name='td_trabaja'><input type='hidden' class='hora' id='hora' name='hora' value='" + startTime.format("HH:mm") + "'><input type='hidden' class='id_turno' id='id_turno' name='id_turno' value='0'><input type='hidden' id='trabajador' name='trabajador' class='trabajador' value='" + this.rut + "'><input type='hidden' id='dia_t' name='dia_t' class='dia_t' value='" + this.dia + "'><input type='hidden' id='trabajador_id' name='trabajador_id' class='trabajador_id' value='" + this.id + "'> <select id='opcion_trabajador' name='opcion_trabajador' class ='form-control vl_" + this.id + " opcion_trabajador' ><option value='F'>Libre</option><option value='C'>Colación</option><option value='T' >Trabaja</option><option value='E'>Hora Extra</option><option value='A'>Ausente</option><option value='L'>Licencia</option><option value='V'>Vacaciones</option></select></td>"
            opts2 += "<td id='horas_trabajador" + this.id + "'></td>"
            opts3 += "<td id='horas_trabajador_semana" + this.id + "'></td>"
          })
          $("#TablaTurnoTrabajadores tbody").append(opts + "</tr>")
          ReiniciarIds('Turnos')
          startTime.add(x.slotInterval, 'minutes');
        } //fin while
        // $('tr td:first-child').css('background', '#5ae');
        $("#TablaTurnoTrabajadores tbody").append(opts2 + "</tr>")
        $("#TablaTurnoTrabajadores tbody").append(opts3 + "</tr>")
        $.ajax({
          type: "POST",
          url: "ver_turno_area_dia",
          data: {
            area: $("#select_area").val(),
            dia: $("#dia").val(),
            semana: $("#semana").val()
          },
          success: function (response) {
            var datos2 = $.parseJSON(response)
            var libre = 0
            var trabaja = 0
            var colacion = 0
            var hora_extra = 0
            if (datos2.status == "error") {
              MensajeError("NO EXISTE TURNO CREADO EL DIA Y SEMANA SELECCIONADOS")
              TraerTurnoArea()
            } else if (datos2.status == 'success') {
              $.each(datos2.data, function () {
                console.log(this.valor_id+" "+this.id_turno)

                $("#opcion_trabajador" + this.valor_id + " option[value='" + this.opcion_trabajador + "']").attr("selected", true);
                $("#td_trabaja" + this.valor_id).removeClass('background')
                if (this.opcion_trabajador == 'L') {
                  libre++
                } else if (this.opcion_trabajador == 'T') {
                  trabaja++
                  $("#td_trabaja" + this.valor_id).css('background', "#77D127")
                } else if (this.opcion_trabajador == 'C') {
                  colacion++
                  $("#td_trabaja" + this.valor_id).css('background', "#0D2FEC")
                } else if (this.opcion_trabajador == 'E') {
                  hora_extra++
                  $("#td_trabaja" + this.valor_id).css('background', "#0D9EEC")
                }

                $("#id_turno" + this.valor_id).val(this.id_turno)
              })

            }
          }
        }) //ajax contar trabajadores
        $.ajax({
          type: "POST",
          url: "cantidad_trabajando_area",
          data: {
            area: $("#select_area").val(),
            dia: $("#dia").val(),
            semana: $("#semana").val()
          },
          success: function (response) {
            var datos3 = $.parseJSON(response)
            if (datos3.status == "error") {} else if (datos3.status == 'success') {
              $.each(datos3.data, function () {
                var str = this.hora
                var res = str.replace(":", "");
                $("#cantidad_trabajadores" + res).text(this.total_trabajadores)
              })
            }
          }
        }) //ajax ver turno area
      }
    }
  });
 }
function GenerarTurnoArea()
{

      $.ajax({
    type: "POST",
    url: "generar_turno_area",
    data: {area:$("#select_area").val(),semana:$("#semana").val()},
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
          MensajeExito("TURNO CREADO EXITOSAMENTE,SELECCIONE EL DIA PARA CONFIGURAR")
          $("#dias_div").show()
             $.ajax({
                type: "POST",
                url: "get_turno_area",
                data: {area:$("#select_area").val(),semana:$("#semana").val()},
                success: function (response) {
                  var datos = $.parseJSON(response)
                  if (datos.status == "error") {} else if (datos.status == 'success') {
                    if(datos.data != 0)
                    {
                      var botones = ""
                      $(".dia_semana").remove()
                       $.each(datos.data, function () {
                         if (this.dia == '1') {
                              var texto = "LUNES"
                            }
                            if (this.dia == '2') {
                              var texto = "MARTES"
                            }
                            if (this.dia == '3') {
                              var texto = "MIÉRCOLES"
                            }
                            if (this.dia == '4') {
                              var texto = "JUEVES"
                            }
                            if (this.dia == '5') {
                              var texto = "VIERNES"
                            }
                            if (this.dia == '6') {
                              var texto = "SABADO"
                            }
                            if (this.dia == '7') {
                              var texto = "DOMINGO"
                            }
                        botones+="<button type='button' class='btn btn-success dim dia_semana' value='"+this.dia+"' >"+texto+" "+this.fecha+"</button>"
                     })
                       $("#dias_div").append(botones)
                         $('.dia_semana').on('click', function () {
                                $("#dia").val($(this).val())

                                  VerTurnoSemana($(this).val())

                              })
                    }
                    else
                    {
                      MensajeAdvertencia("NO HAY TURNOS CREADOS ESTA SEMANA")
                    }

                  }
                }
              })
      }
    }
  })


}

 function TraerTurnoArea() {
  $(".mostrar").show()
  $.ajax({
    type: "POST",
    url: "get_trabajadores_area",
    data: {
      area: $("#select_area").val()
    },
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        var table = ""
        $(".trabajadores").empty()
        $(".trabajadores").append("<th></th>")
        let x = {
          slotInterval: 30,
          openTime: '10:00',
          closeTime: '00:00'
        };
        //Format the time
        let startTime = moment(x.openTime, "HH:mm");
        //Format the end time and the next day to it
        let endTime = moment(x.closeTime, "HH:mm").add(1, 'days');
        var tab = ""
          //Loop over the times - only pushes time with 30 minutes interval
        var opts = ""
        var opts2 = ""
        var opts3 = ""
        $("#TablaTurnoTrabajadores tbody").empty()
        $.each(datos.data, function () {
          table += "<th><b>" + this.nombres + " " + this.apellidos + "</b></th>"
        })
        $(".trabajadores").append(table)
        while (startTime <= endTime) {
          opts = "<tr>"
          opts2 = "<tr><td></td>"
          opts3 = "<tr><td></td>"
          opts += "<td><b>" + startTime.format("HH:mm") + "</b></td>"
          //Add interval of 30 minutes
          $.each(datos.data, function () {
            opts += "<td class='td_trabaja' id='td_trabaja' name='td_trabaja'><input type='hidden' class='hora' id='hora' name='hora' value='" + startTime.format("HH:mm") + "'><input type='hidden' id='trabajador' name='trabajador' class='trabajador' value='" + this.rut + "'><input type='hidden' id='trabajador_id' name='trabajador_id' class='trabajador_id' value='" + this.id + "'> <select id='opcion_trabajador' name='opcion_trabajador' class ='form-control vl_" + this.id + " opcion_trabajador' ><option value='L'>Libre</option><option value='C'>Colación</option><option value='T' >Trabaja</option><option value='E'>Hora Extra</option></select></td>"
            opts2 += "<td id='horas_trabajador" + this.id + "'></td>"
            opts3 += "<td id='horas_trabajador_semana" + this.id + "'></td>"
          })
          $("#TablaTurnoTrabajadores tbody").append(opts + "</tr>")
          startTime.add(x.slotInterval, 'minutes');
        } //fin while
        // $("#TablaTurnoTrabajadores tbody").append(tab)
        // $('tr td:first-child').css('background', '#fff');
        ReiniciarIds('Turnos')
        $("#TablaTurnoTrabajadores tbody").append(opts2 + "</tr>")
        $("#TablaTurnoTrabajadores tbody").append(opts3 + "</tr>")
        GuardarTurno()
      }
    }
  });
 }

 $(document).ready(function () {

  AreaEmpresa()
  //Data
 })