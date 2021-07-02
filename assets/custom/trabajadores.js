function SumarHorasTrabajadas() {
    horas_sumar = 0;
    minutos_sumar = 0;
    colacion_sumar = 0;
     horas_extras_sumar = 0;
    $(".horas_sumar").each(function (index, value) {
        horas_sumar = horas_sumar + eval($(this).val());
    });
    $(".minutos_sumar").each(function (index, value) {
        minutos_sumar = minutos_sumar + eval($(this).val());
    });
    $(".colacion_sumar").each(function (index, value) {
        colacion_sumar = colacion_sumar + eval($(this).val());
    });
    $(".he_sumar").each(function (index, value) {
        horas_extras_sumar = parseFloat(horas_extras_sumar) + parseFloat(0.5);
    });
    $(".horas_trabajadas").empty();
    $(".horas_trabajadas").append(horas_sumar + " Hora(s) Trabajadas");
    $(".horas_trabajadas").append("<br>" + horas_extras_sumar + " Hora(s) Extras")
}
function SumaTiempo(dato) {
    //LUNES
    if (dato == 1) {
        var startTime = moment($("#hora_inicio_lunes").val(), "HH:mm:ss a");
        var endTime   = moment($("#hora_termino_lunes").val(), "HH:mm:ss a");

        var duration = moment.duration(endTime.diff(startTime));

        if (parseFloat(($(".colaciones_1").length * 30) / 60) <= 0) {

            var hours     = parseFloat(duration.asHours());
            var minutes   = parseFloat(duration.asMinutes()) % 60;
        } else {
            var hours   = parseFloat(duration.asHours()) - parseFloat(parseFloat((parseFloat($(".colaciones_1").length) * 30) / 60));
            var minutes = parseFloat(duration.asMinutes()) % 60;
        }
        $(".tiempo_lunes").empty();
        $(".tiempo_lunes").append(hours + " Hora(s) de Trabajo");
         var colacion = parseFloat((($(".colaciones_1").length) * 30) / 60);
          var horas_extras = parseFloat((($(".horas_extras_"+dato).length) * 30) / 60);

         $(".tiempo_lunes").append("<br>" + colacion + " Hora(s) de Colación");
         $(".tiempo_lunes").append("<br>" + horas_extras + " Hora(s) extras");
        $("#hora_lunes").val((hours));
        $("#horas_extras_lunes").val((horas_extras));
        $("#minutos_lunes").val(minutes);
        $("#colacion_lunes").val(colacion);
    }
     if (dato == 2) {
        var startTime = moment($("#hora_inicio_martes").val(), "HH:mm:ss a");
        var endTime   = moment($("#hora_termino_martes").val(), "HH:mm:ss a");

        var duration = moment.duration(endTime.diff(startTime));

        if (parseFloat(($(".colaciones_2").length * 30) / 60) <= 0) {

            var hours     = parseFloat(duration.asHours());
            var minutes   = parseFloat(duration.asMinutes()) % 60;
        } else {
            var hours   = parseFloat(duration.asHours()) - parseFloat(parseFloat((parseFloat($(".colaciones_2").length) * 30) / 60));
            var minutes = parseFloat(duration.asMinutes()) % 60;
        }
        $(".tiempo_martes").empty();
        $(".tiempo_martes").append(hours + " Hora(s) de Trabajo");
         var colacion = parseFloat((($(".colaciones_2").length) * 30) / 60);
          var horas_extras = parseFloat((($(".horas_extras_"+dato).length) * 30) / 60);

         $(".tiempo_martes").append("<br>" + colacion + " Hora(s) de Colación");
         $(".tiempo_martes").append("<br>" + horas_extras + " Hora(s) extras");
        $("#hora_martes").val((hours));
        $("#horas_extras_martes").val((horas_extras));
        $("#minutos_martes").val(minutes);
        $("#colacion_martes").val(colacion);
    }
     if (dato == 3) {
        var startTime = moment($("#hora_inicio_miercoles").val(), "HH:mm:ss a");
        var endTime   = moment($("#hora_termino_miercoles").val(), "HH:mm:ss a");

        var duration = moment.duration(endTime.diff(startTime));

        if (parseFloat(($(".colaciones_3").length * 30) / 60) <= 0) {

            var hours     = parseFloat(duration.asHours());
            var minutes   = parseFloat(duration.asMinutes()) % 60;
        } else {
            var hours   = parseFloat(duration.asHours()) - parseFloat(parseFloat((parseFloat($(".colaciones_3").length) * 30) / 60));
            var minutes = parseFloat(duration.asMinutes()) % 60;
        }
        $(".tiempo_miercoles").empty();
        $(".tiempo_miercoles").append(hours + " Hora(s) de Trabajo");
         var colacion = parseFloat((($(".colaciones_3").length) * 30) / 60);
          var horas_extras = parseFloat((($(".horas_extras_"+dato).length) * 30) / 60);

         $(".tiempo_miercoles").append("<br>" + colacion + " Hora(s) de Colación");
         $(".tiempo_miercoles").append("<br>" + horas_extras + " Hora(s) extras");
        $("#hora_miercoles").val((hours));
        $("#horas_extras_miercoles").val((horas_extras));
        $("#minutos_miercoles").val(minutes);
        $("#colacion_miercoles").val(colacion);
    }
     if (dato == 4) {
        var startTime = moment($("#hora_inicio_jueves").val(), "HH:mm:ss a");
        var endTime   = moment($("#hora_termino_jueves").val(), "HH:mm:ss a");

        var duration = moment.duration(endTime.diff(startTime));

        if (parseFloat(($(".colaciones_4").length * 30) / 60) <= 0) {

            var hours     = parseFloat(duration.asHours());
            var minutes   = parseFloat(duration.asMinutes()) % 60;
        } else {
            var hours   = parseFloat(duration.asHours()) - parseFloat(parseFloat((parseFloat($(".colaciones_4").length) * 30) / 60));
            var minutes = parseFloat(duration.asMinutes()) % 60;
        }
        $(".tiempo_jueves").empty();
        $(".tiempo_jueves").append(hours + " Hora(s) de Trabajo");
         var colacion = parseFloat((($(".colaciones_4").length) * 30) / 60);
          var horas_extras = parseFloat((($(".horas_extras_"+dato).length) * 30) / 60);

         $(".tiempo_jueves").append("<br>" + colacion + " Hora(s) de Colación");
         $(".tiempo_jueves").append("<br>" + horas_extras + " Hora(s) extras");
        $("#hora_jueves").val((hours));
        $("#horas_extras_jueves").val((horas_extras));
        $("#minutos_jueves").val(minutes);
        $("#colacion_jueves").val(colacion);
    }
     if (dato == 5) {
        var startTime = moment($("#hora_inicio_viernes").val(), "HH:mm:ss a");
        var endTime   = moment($("#hora_termino_viernes").val(), "HH:mm:ss a");

        var duration = moment.duration(endTime.diff(startTime));

        if (parseFloat(($(".colaciones_5").length * 30) / 60) <= 0) {

            var hours     = parseFloat(duration.asHours());
            var minutes   = parseFloat(duration.asMinutes()) % 60;
        } else {
            var hours   = parseFloat(duration.asHours()) - parseFloat(parseFloat((parseFloat($(".colaciones_5").length) * 30) / 60));
            var minutes = parseFloat(duration.asMinutes()) % 60;
        }
        $(".tiempo_viernes").empty();
        $(".tiempo_viernes").append(hours + " Hora(s) de Trabajo");
         var colacion = parseFloat((($(".colaciones_5").length) * 30) / 60);
          var horas_extras = parseFloat((($(".horas_extras_"+dato).length) * 30) / 60);

         $(".tiempo_viernes").append("<br>" + colacion + " Hora(s) de Colación");
         $(".tiempo_viernes").append("<br>" + horas_extras + " Hora(s) extras");
        $("#hora_viernes").val((hours));
        $("#horas_extras_viernes").val((horas_extras));
        $("#minutos_viernes").val(minutes);
        $("#colacion_viernes").val(colacion);
    }
     if (dato == 6) {
        var startTime = moment($("#hora_inicio_sabado").val(), "HH:mm:ss a");
        var endTime   = moment($("#hora_termino_sabado").val(), "HH:mm:ss a");

        var duration = moment.duration(endTime.diff(startTime));

        if (parseFloat(($(".colaciones_6").length * 30) / 60) <= 0) {

            var hours     = parseFloat(duration.asHours());
            var minutes   = parseFloat(duration.asMinutes()) % 60;
        } else {
            var hours   = parseFloat(duration.asHours()) - parseFloat(parseFloat((parseFloat($(".colaciones_6").length) * 30) / 60));
            var minutes = parseFloat(duration.asMinutes()) % 60;
        }
        $(".tiempo_sabado").empty();
        $(".tiempo_sabado").append(hours + " Hora(s) de Trabajo");
         var colacion = parseFloat((($(".colaciones_6").length) * 30) / 60);
          var horas_extras = parseFloat((($(".horas_extras_"+dato).length) * 30) / 60);

         $(".tiempo_sabado").append("<br>" + colacion + " Hora(s) de Colación");
         $(".tiempo_sabado").append("<br>" + horas_extras + " Hora(s) extras");
        $("#hora_sabado").val((hours));
        $("#horas_extras_sabado").val((horas_extras));
        $("#minutos_sabado").val(minutes);
        $("#colacion_sabado").val(colacion);
    }
     if (dato == 7) {
        var startTime = moment($("#hora_inicio_domingo").val(), "HH:mm:ss a");
        var endTime   = moment($("#hora_termino_domingo").val(), "HH:mm:ss a");

        var duration = moment.duration(endTime.diff(startTime));

        if (parseFloat(($(".colaciones_7").length * 30) / 60) <= 0) {

            var hours     = parseFloat(duration.asHours());
            var minutes   = parseFloat(duration.asMinutes()) % 60;
        } else {
            var hours   = parseFloat(duration.asHours()) - parseFloat(parseFloat((parseFloat($(".colaciones_7").length) * 30) / 60));
            var minutes = parseFloat(duration.asMinutes()) % 60;
        }
        $(".tiempo_domingo").empty();
        $(".tiempo_domingo").append(hours + " Hora(s) de Trabajo");
         var colacion = parseFloat((($(".colaciones_7").length) * 30) / 60);
          var horas_extras = parseFloat((($(".horas_extras_"+dato).length) * 30) / 60);

         $(".tiempo_domingo").append("<br>" + colacion + " Hora(s) de Colación");
         $(".tiempo_domingo").append("<br>" + horas_extras + " Hora(s) extras");
        $("#hora_domingo").val((hours));
        $("#horas_extras_domingo").val((horas_extras));
        $("#minutos_domingo").val(minutes);
        $("#colacion_domingo").val(colacion);
    }
    SumarHorasTrabajadas();
}

function cargafam() {
    if ($("#carga_familiar").val() == "2") {
        $(".carga_fam").show();
    } else {
        $(".carga_fam").hide();
    }
}

function MostrarT(dato) {
    if (dato == "0") {
        $("#tb_trab").hide();
        $("#form_trabajadores").show();
    } else {
        $("#tb_trab").show();
        $("#form_trabajadores").hide();
    }
}

function BorrarDocumentoBD(dato) {
    $.ajax({
        type: "POST",
        url: "borrar_documentos_trabajador",
        data: {
            id: $("#id_archivo" + dato).val()
        },
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status != "error") {
                $("#trdoc" + dato).remove();
                ReiniciarIds("documentos");
                MensajeExito("DOCUMENTACIÓN ELIMINADA CORRECTAMENTE");
            }
        },
    }); //ajax documentos
}

function BorrarDocumentoTabla(dato) {
    $("#trdoc" + dato).remove();
    ReiniciarIds("documentos");
}

function cargar_documentacion(dato) {
    var file_data = $("#archivo" + dato).prop("files")[0];
    var form_data = new FormData();
    form_data.append("file", file_data);
    form_data.append("tipo", $("#tipo_archivo" + dato).val());
    form_data.append("trabajador", $("#rut_trabajador").val());
    $.ajax({
        url: "subir_archivos_trabajador", // point to server-side controller method
        dataType: "text", // what to expect back from the server
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: "post",
        success: function (response) {
            MensajeExito("DOCUMENTACIÓN SUBIDA CORRECTAMENTE");
        },
        error: function (response) {
            //  MensajeExito("DOCUMENTACIÓN SUBIDA CORRECTAMENTE")
        },
    });
}

function add_documentos() {
    var documentos = "<tr class='trdoc' id='trdoc' name='trdoc'><td><input type='text'  id='tipo_archivo'  name='tipo_archivo' class='tipo_archivo form-control mayusculas' placeholder='ESCRIBA EL TIPO DE ARCHIVO QUE SUBIRA'></td><td><input type='file' accept='*' id='archivo'  name='archivo' class='archivo form-control'> </div></td><td><button type='button' class='btn btn-danger dim btnborrardoctab' id='btnborrardoctab' name='btnborrardoctab'><i class='fa fa-trash'></i></button></td> </tr>";
    $("#Documentacion tbody").append(documentos);
    ReiniciarIds("documentos");
}

function BorrarLicenciaTabla(dato) {
    $("#trlic" + dato).remove();
    ReiniciarIds("licencias");
}

function BorrarLicenciaBD(dato) {
    $.ajax({
        type: "POST",
        url: "borrar_licencia_trabajador",
        data: {
            id: $("#id_licencias" + dato).val()
        },
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status != "error") {
                $("#trlic" + dato).remove();
                ReiniciarIds("licencias2");
                MensajeExito("LICENCIA ELIMINADA CORRECTAMENTE");
            }
        },
    }); //ajax documentos
}

function add_licencias() {
    var licencias = "<tr class='trlic' id='trlic' name='trlic'><td><input type='text'  id='numero_licencia'  name='numero_licencia' class='numero_licencia form-control numeros' placeholder='ESCRIBA EL Nº DE LICENCIA'></td><td><input type='date' id='fecha_inicio_licencia'  name='fecha_inicio_licencia' class='fecha_inicio_licencia form-control'> </td><td><input type='date' id='fecha_termino_licencia'  name='fecha_termino_licencia' class='fecha_termino_licencia form-control'> </td><td><a target='_blank' href='https://www.lmempleador.cl/user/login/step2'>TRAMITAR LICENCIA</a></td><td><button type='button' class='btn btn-danger dim btnborrarlictab' id='btnborrarlictab' name='btnborrarlictab'><i class='fa fa-trash'></i></button></td> </tr>";
    $("#Licencias tbody").append(licencias);
    ReiniciarIds("licencias");
}

function BorrarVacacionesTabla(dato) {
    $("#trvac" + dato).remove();
    ReiniciarIds("vacaciones");
}

function BorrarVacacionesBD(dato) {
    $.ajax({
        type: "POST",
        url: "borrar_vacaciones_trabajador",
        data: {
            id: $("#id_vacaciones" + dato).val()
        },
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status != "error") {
                $("#trvac" + dato).remove();
                ReiniciarIds("licencias2");
                MensajeExito("LICENCIA ELIMINADA CORRECTAMENTE");
            }
        },
    }); //ajax documentos
}

function add_vacaciones() {
    var vacaciones = "<tr class='trvac' id='trvac' name='trvac'><td><input type='date' id='fecha_inicio_vacaciones'  name='fecha_inicio_vacaciones' class='fecha_inicio_vacaciones form-control'> </td><td><input type='date' id='fecha_termino_vacaciones'  name='fecha_termino_vacaciones' class='fecha_termino_vacaciones form-control'> </td><td>-</td><td><button type='button' class='btn btn-danger dim btnborrarvactab' id='btnborrarvactab' name='btnborrarvactab'><i class='fa fa-trash'></i></button></td> </tr>";
    $("#Vacaciones tbody").append(vacaciones);
    ReiniciarIds("vacaciones");
}

function BorrarAusenciasTabla(dato) {
    $("#traus" + dato).remove();
    ReiniciarIds("ausencias");
}

function BorrarAusenciasBD(dato) {
    $.ajax({
        type: "POST",
        url: "borrar_ausencias_trabajador",
        data: {
            id: $("#id_ausencias" + dato).val()
        },
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status != "error") {
                $("#traus" + dato).remove();
                ReiniciarIds("ausencias2");
                MensajeExito("LICENCIA ELIMINADA CORRECTAMENTE");
            }
        },
    }); //ajax documentos
}

function add_ausencias() {
    var ausencias = "<tr class='traus' id='traus' name='traus'><td><input type='date'  id='fecha_ausencia'  name='fecha_ausencia' class='fecha_ausencia form-control mayusculas' ></td><td><textarea  id='motivo_ausencia'  name='motivo_ausencia' class='motivo_ausencia form-control mayusculas' style='resize:none' placeholder='ESCRIBA EL MOTIVO DE LA AUSENCIA : EJ: PERMISO,OTROS'> </textarea></td><td><button type='button' class='btn btn-danger dim btnborrardoctab' id='btnborrardoctab' name='btnborrarauctab'><i class='fa fa-trash'></i></button></td> </tr>";
    $("#Ausencias tbody").append(ausencias);
    ReiniciarIds("ausencias");
}

function TablaTrabajadores() {
    $.ajax({
        type: "GET",
        url: "tabla_trabajador",
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                var Tablas = "";
                var Num = 1;
                $("#TablaTrabajadores tbody tr").remove();
                $.each(datos.data, function () {
                    if (this.mostrar != "2") {
                        var boton = "<button type='button'  class='btn btn-danger dim ' onclick='EliminarTrabajador(" + this.id + ")'><i class='fa fa-trash'></i> </button>";
                        var rut = this.rut;
                        var rut_r = rut.replace(".", "");
                        var rut_r = rut_r.replace(".", "");
                        $.ajax({
                            type: "POST",
                            url: "get_documentos_trabajador",
                            data: {
                                trabajador: rut_r
                            },
                            success: function (response) {
                                var datos = $.parseJSON(response);
                                if (datos.status != "error") {
                                    $.each(datos.data, function () {
                                        var documentos = "<br><a href='" + base_url + "files/trabajadores/documentos/" + this.documento + "' target='_blank'> <i class='fa fa-eye' > </i> " + this.tipo + " </a>";
                                        $(".td_doc" + this.trabajador).append(documentos);
                                    });
                                }
                            },
                        }); //ajax documentos
                        Tablas += "<tr  id=" + this.id + " ><td>" + Num + "</td><td>" + rut_r + "</td><td>" + this.nombres + " " + this.apellidos + "</td><td>" + this.cargo + "</td><td >" + this.fecha_nacimiento + "</td><td >" + this.telefono + "</td><td >" + this.direccion + "</td><td class='td_doc" + this.rut + "'><a href='ContratoPDF/" + this.id + "' target='_blank'> <i class='fa fa-eye' > </i> CONTRATO </a><br><a href='HorasExtrasPDF/" + this.id + "' target='_blank'> <i class='fa fa-eye' > </i> PACTO </a><br><a href='CertificadoPDF/" + this.id + "' target='_blank'> <i class='fa fa-eye' > </i> CERTIFICADO DE ANTIGUEDAD </a><br><a href='TerminoPDF/" + this.id + "' target='_blank'> <i class='fa fa-eye' > </i> TERMINO RELACION LABORAL </a><br><a href='Indumentaria/" + this.id + "' target='_blank'> <i class='fa fa-eye' > </i> ENTREGA INDUMENTARIA </a><br><a href='ReglamentoInterno/" + this.id + "' target='_blank'> <i class='fa fa-eye' > </i> RECEPCIÓN REGLAMENTO INTERNO </a></td><td><button type='button' class='btn btn-info dim editartrabajador' onclick='DatosTrabajador(" + this.id + ")' ><i class='fa fa-edit'> </i> </button></td><td>" + boton + "</td></tr>";
                        Num++;
                    }
                });
                $("#TablaTrabajadores").append(Tablas);
                if ($.fn.dataTable.isDataTable("#TablaTrabajadores")) {
                    var table = $("#TablaTrabajadores").DataTable();
                } else {
                    var table = $("#TablaTrabajadores").DataTable({
                        paging: true,
                        searching: true,
                        info: false,
                        dom: '<"html5buttons"B>lTfgitp',
                        buttons: [{
                            extend: "pdf",
                            title: "TRABAJADORES - ASERRADERO SANTA ANA",
                        }, ],
                        language: {
                            sProcessing: "Procesando...",
                            sLengthMenu: "Mostrar _MENU_ registros",
                            sZeroRecords: "No se encontraron resultados",
                            sEmptyTable: "Ningún dato disponible en esta tabla",
                            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                            sInfoPostFix: "",
                            sSearch: "Buscar:",
                            sUrl: "",
                            sInfoThousands: ",",
                            sLoadingRecords: "Cargando...",
                            oPaginate: {
                                sFirst: "Primero",
                                sLast: "Último",
                                sNext: "Siguiente",
                                sPrevious: "Anterior",
                            },
                            oAria: {
                                sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                                sSortDescending: ": Activar para ordenar la columna de manera descendente",
                            },
                        },
                    });
                }
            }
        },
    });
}

function contrato_inde() {
    if ($("#tipo_contrato").val() == "1") {
        $(".contrato_indef").hide();
    } else if ($("#tipo_contrato").val() == "2") {
        $(".contrato_indef").show();
    }
}

function sel_isapre() {
    if ($("#tipo_salud").val() == "1") {
        $(".div_isapre").hide();
    } else if ($("#tipo_salud").val() == "2") {
        $(".div_isapre").show();
    }
}

function ActivarTrabajador(id, dato) {
    $.ajax({
        type: "POST",
        url: "ocultartrabajador",
        data: {
            id: id,
            dato: dato,
        }, // serializes the form's elements.
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                if (dato == 0) {
                    MensajeExito("Se mostrara el sistema para el sistema ");
                } else {
                    MensajeExito("Se oculto el trabajador del sistema ");
                }
                TablaTrabajadores();
            }
        },
    });
}

function add_horario_colacion(dato) {
    $("#td_colacion_" + dato).append("<div class='input-group div_delete2" + dato + "' id='div_delete2' name='div_delete2'><input type='time' id='colaciones_" + dato + "' name='colaciones_" + dato + "' class='form-control colaciones_" + dato + "' value='" + this.hora + "' /> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btncolaciones2_" + dato + "' id='colaciones2_" + dato + "' name='colaciones2_" + dato + "'><i class='fa fa-trash'></i></button></span></div>")
    ReiniciarIds('colaciones', dato)
    SumaTiempo(dato)
}
function BorrarColacionTrabajador2(dato, dia) {
                $("#div_delete2" + dia + "" + dato).remove();
                ReiniciarIds("colaciones",dia);
                MensajeExito("COLACIÓN ELIMINADA CORRECTAMENTE");
}
function BorrarColacionTrabajador(dato, dia) {
    $.ajax({
        type: "POST",
        url: "borrar_colacion_trabajador",
        data: {
            id: $("#id_colacion_" + dia + "" + dato).val()
        },
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status != "error") {
                $("#div_delete" + dia + "" + dato).remove();
                ReiniciarIds("colaciones");
                MensajeExito("COLACIÓN ELIMINADA CORRECTAMENTE");
            }
        },
    }); //ajax documentos
}

function add_horario_hora_extra(dato) {
    if(dato == 1)
       {
             var startTime = moment($("#hora_termino_lunes").val(), "HH:mm a");
             if(parseInt($(".horas_extras_"+dato).length) == 0)
             {
                var minutos = 30
             }
             else
             {
                var minutos  = 30 * (parseInt($(".horas_extras_"+dato).length) +1)
             }
            var data = startTime.add(minutos, 'minutes')
            $("#td_hora_extra_" + dato).append("<div class='input-group he_borrar div_deletehe2" + dato + "' id='div_deletehe2' name='div_deletehe2'><input type='time' id='horas_extras_" + dato + "' name='horas_extras_" + dato + "' class='form-control he_sumar horas_extras_" + dato + "' value='"+moment(data, "HH:mm a").format('HH:mm')+"' readonly='true'/> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btnhoras_extras2_" + dato + "' id='horas_extras2_" + dato + "' name='horas_extras2_" + dato + "'><i class='fa fa-trash'></i></button></span></div>")
       }
         if(dato == 2)
       {
             var startTime = moment($("#hora_termino_martes").val(), "HH:mm a");
             if(parseInt($(".horas_extras_"+dato).length) == 0)
             {
                var minutos = 30
             }
             else
             {
                var minutos  = 30 * (parseInt($(".horas_extras_"+dato).length) +1)
             }
            var data = startTime.add(minutos, 'minutes')
            $("#td_hora_extra_" + dato).append("<div class='input-group he_borrar div_deletehe2" + dato + "' id='div_deletehe2' name='div_deletehe2'><input type='time' id='horas_extras_" + dato + "' name='horas_extras_" + dato + "' class='form-control he_sumar horas_extras_" + dato + "' value='"+moment(data, "HH:mm a").format('HH:mm')+"' readonly='true'/> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btnhoras_extras2_" + dato + "' id='horas_extras2_" + dato + "' name='horas_extras2_" + dato + "'><i class='fa fa-trash'></i></button></span></div>")
       }
         if(dato == 3)
       {
             var startTime = moment($("#hora_termino_miercoles").val(), "HH:mm a");
             if(parseInt($(".horas_extras_"+dato).length) == 0)
             {
                var minutos = 30
             }
             else
             {
                var minutos  = 30 * (parseInt($(".horas_extras_"+dato).length) +1)
             }
            var data = startTime.add(minutos, 'minutes')
            $("#td_hora_extra_" + dato).append("<div class='input-group he_borrar div_deletehe2" + dato + "' id='div_deletehe2' name='div_deletehe2'><input type='time' id='horas_extras_" + dato + "' name='horas_extras_" + dato + "' class='form-control he_sumar horas_extras_" + dato + "' value='"+moment(data, "HH:mm a").format('HH:mm')+"' readonly='true'/> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btnhoras_extras2_" + dato + "' id='horas_extras2_" + dato + "' name='horas_extras2_" + dato + "'><i class='fa fa-trash'></i></button></span></div>")
       }
         if(dato == 4)
       {
             var startTime = moment($("#hora_termino_jueves").val(), "HH:mm a");
             if(parseInt($(".horas_extras_"+dato).length) == 0)
             {
                var minutos = 30
             }
             else
             {
                var minutos  = 30 * (parseInt($(".horas_extras_"+dato).length) +1)
             }
            var data = startTime.add(minutos, 'minutes')
            $("#td_hora_extra_" + dato).append("<div class='input-group he_borrar div_deletehe2" + dato + "' id='div_deletehe2' name='div_deletehe2'><input type='time' id='horas_extras_" + dato + "' name='horas_extras_" + dato + "' class='form-control he_sumar horas_extras_" + dato + "' value='"+moment(data, "HH:mm a").format('HH:mm')+"' readonly='true'/> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btnhoras_extras2_" + dato + "' id='horas_extras2_" + dato + "' name='horas_extras2_" + dato + "'><i class='fa fa-trash'></i></button></span></div>")
       }
         if(dato == 5)
       {
             var startTime = moment($("#hora_termino_viernes").val(), "HH:mm a");
             if(parseInt($(".horas_extras_"+dato).length) == 0)
             {
                var minutos = 30
             }
             else
             {
                var minutos  = 30 * (parseInt($(".horas_extras_"+dato).length) +1)
             }
            var data = startTime.add(minutos, 'minutes')
            $("#td_hora_extra_" + dato).append("<div class='input-group he_borrar div_deletehe2" + dato + "' id='div_deletehe2' name='div_deletehe2'><input type='time' id='horas_extras_" + dato + "' name='horas_extras_" + dato + "' class='form-control he_sumar horas_extras_" + dato + "' value='"+moment(data, "HH:mm a").format('HH:mm')+"' readonly='true'/> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btnhoras_extras2_" + dato + "' id='horas_extras2_" + dato + "' name='horas_extras2_" + dato + "'><i class='fa fa-trash'></i></button></span></div>")
       }
         if(dato == 6)
       {
             var startTime = moment($("#hora_termino_sabado").val(), "HH:mm a");
             if(parseInt($(".horas_extras_"+dato).length) == 0)
             {
                var minutos = 30
             }
             else
             {
                var minutos  = 30 * (parseInt($(".horas_extras_"+dato).length) +1)
             }
            var data = startTime.add(minutos, 'minutes')
            $("#td_hora_extra_" + dato).append("<div class='input-group he_borrar div_deletehe2" + dato + "' id='div_deletehe2' name='div_deletehe2'><input type='time' id='horas_extras_" + dato + "' name='horas_extras_" + dato + "' class='form-control he_sumar horas_extras_" + dato + "' value='"+moment(data, "HH:mm a").format('HH:mm')+"' readonly='true'/> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btnhoras_extras2_" + dato + "' id='horas_extras2_" + dato + "' name='horas_extras2_" + dato + "'><i class='fa fa-trash'></i></button></span></div>")
       }
         if(dato == 7)
       {
             var startTime = moment($("#hora_termino_domingo").val(), "HH:mm a");
             if(parseInt($(".horas_extras_"+dato).length) == 0)
             {
                var minutos = 30
             }
             else
             {
                var minutos  = 30 * (parseInt($(".horas_extras_"+dato).length) +1)
             }
            var data = startTime.add(minutos, 'minutes')
            $("#td_hora_extra_" + dato).append("<div class='input-group he_borrar div_deletehe2" + dato + "' id='div_deletehe2' name='div_deletehe2'><input type='time' id='horas_extras_" + dato + "' name='horas_extras_" + dato + "' class='form-control he_sumar horas_extras_" + dato + "' value='"+moment(data, "HH:mm a").format('HH:mm')+"' readonly='true'/> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btnhoras_extras2_" + dato + "' id='horas_extras2_" + dato + "' name='horas_extras2_" + dato + "'><i class='fa fa-trash'></i></button></span></div>")
       }


    ReiniciarIds('horas_extras', dato)
    SumaTiempo(dato)
}

function BorrarHoraExtraTrabajador2(dato, dia) {
    $("#div_deletehe2" + dia + "" + dato).remove();
}
function BorrarHoraExtraTrabajador(dato, dia) {
    $.ajax({
        type: "POST",
        url: "borrar_hora_extra_trabajador",
        data: {
            id: $("#id_hora_extra_" + dia + "" + dato).val()
        },
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status != "error") {
                $("#div_deletehe" + dia + "" + dato).remove();
                ReiniciarIds("horas_extras");
                MensajeExito("HORA EXTRA ELIMINADA CORRECTAMENTE");
            }
        },
    }); //ajax documentos
}

function DatosTrabajador(id) {
    $.ajax({
        url: "datos_trabajador",
        data: {
            id: id,
        }, // serializes the form's elements.
        type: "POST",
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                $("#tb_trab").hide();
                $(".tiempo_lunes").empty()
                $(".tiempo_martes").empty()
                $(".horas_b").val("")
                $(".tiempo_miercoles").empty()
                $(".tiempo_jueves").empty()
                $(".tiempo_viernes").empty()
                $(".tiempo_sabado").empty()
                $(".tiempo_domingo").empty()
                 $(".horas_trabajadas").empty()
                $("#hora_lunes").val(0)
                $("#minutos_lunes").val(0)
                $("#colacion_lunes").val(0)
                $("#horas_extras_lunes").val(0)
                $("#hora_martes").val(0)
                $("#minutos_martes").val(0)
                $("#colacion_martes").val(0)
                $("#horas_extras_martes").val(0)
                $("#hora_miercoles").val(0)
                $("#minutos_miercoles").val(0)
                $("#colacion_miercoles").val(0)
                $("#horas_extras_miercoles").val(0)
                $("#hora_jueves").val(0)
                $("#minutos_jueves").val(0)
                $("#colacion_jueves").val(0)
                $("#horas_extras_jueves").val(0)
                $("#hora_viernes").val(0)
                $("#minutos_viernes").val(0)
                $("#colacion_viernes").val(0)
                $("#horas_extras_viernes").val(0)
                $("#hora_sabado").val(0)
                $("#minutos_sabado").val(0)
                $("#colacion_sabado").val(0)
                $("#horas_extras_sabado").val(0)
                $("#hora_domingo").val(0)
                $("#minutos_domingo").val(0)
                $("#colacion_domingo").val(0)
                $("#horas_extras_domingo").val(0)
                $("#documentacion_trabajador").show();
                $("#licencias_trabajador").show();
                $("#opciones_trabajador").show();
                $("#vacaciones_trabajador").show();
                $("#ausencias_trabajador").show();
                $("#horario_trabajador").show();
                $("#Licencias tbody tr").remove();
                $("#Vacaciones tbody tr").remove();
                $("#Documentacion tbody tr").remove();
                $("#Ausencias tbody tr").remove();
                 $(".he_borrar").remove()
                $(".td_colacion").empty()
                var nacionalidad = datos.data.nacionalidad;
                $("#form_trabajadores").show();
                $("#prever_delantera").empty();
                $("#prever_trasera").empty();
                $(".form_trabajador").off("onsubmit");
                $(".form_trabajador").attr("id", "form_trabajadores");
                $(".form_trabajador").attr("onsubmit", "return EditarTrabajador()");

                $("input, :input").attr("autocomplete", "off");
                $("#id_trabajador").val(datos.data.id);
                $("#nombres").val(datos.data.nombres);
                $("#apellidos").val(datos.data.apellidos);
                $("#rut_trabajador").val(datos.data.rut);
                //$("#rut_trabajador").attr('readonly','readonly')
                $("#correo").val(datos.data.correo);
                $("#telefono").val(datos.data.telefono);
                $("#ciudad").val(datos.data.ciudad);
                $("#direccion").val(datos.data.direccion);
                $("#fecha_ingreso").val(datos.data.fecha_ingreso);
                $("#fecha_nacimiento").val(datos.data.fecha_nacimiento);
                $("#estado_civil").val(datos.data.estado_civil);
                $("#cargo").val(datos.data.cargo);
                $("#tipo_salud").val(datos.data.tipo_salud);
                $("#isapre").val(datos.data.isapre);
                $("#sueldo").val(datos.data.sueldo);
                $("#afp").val(datos.data.afp);
                $("#select_area").val(datos.data.area);
                $("#tipo_contrato").val(datos.data.tipo_contrato);
                $("#carga_familiar").val(datos.data.carga_familiar);
                $("#contrato_indefinido").val(datos.data.contrato_indefinido);
                $("#duracion_contrato").val(datos.data.duracion_contrato);
                $("#modalidad_trabajo").val(datos.data.modalidad_trabajo);
                $("#trabaja_hora_extras").val(datos.data.trabaja_hora_extras);
                $("#fecha_pacto").val(datos.data.fecha_pacto);
                $("#colacion").val(datos.data.colacion);
                $("#movilizacion").val(datos.data.movilizacion);
                $("#sexo").val(datos.data.sexo);
                ConvertMoneyText("precio");
                $.ajax({
                    type: "GET",
                    url: "nacionalidad",
                    success: function (response) {
                        var datos = $.parseJSON(response);
                        $("#nacionalidad").select2("destroy");
                        $("#nacionalidad").empty();
                        $("#nacionalidad").append("<option value=''>SELECCIONE UNA OPCION</option>");
                        var Tablas2 = "";
                        $.each(datos, function () {
                            if (nacionalidad == this.GENTILICIO_NAC) {
                                Tablas2 += "<option value='" + this.GENTILICIO_NAC + "' selected='true'>" + this.GENTILICIO_NAC + "</option>";
                            } else {
                                Tablas2 += "<option value='" + this.GENTILICIO_NAC + "'>" + this.GENTILICIO_NAC + "</option>";
                            }
                        });
                        $("#nacionalidad").append(Tablas2);
                        $("#nacionalidad").select2({
                            placeholder: "SELECCIONE UNA NACIONALIDAD ",
                            allowClear: true,
                            width: "100%",
                        });
                    },
                });
                //ARCHIVOS SUBIDOS
                $.ajax({
                    type: "POST",
                    url: "get_documentos_trabajador",
                    data: {
                        trabajador: datos.data.rut
                    },
                    success: function (response) {
                        var datos = $.parseJSON(response);
                        if (datos.status != "error") {
                            $.each(datos.data, function () {
                                var documentos = "<tr class='trdoc' id='trdoc' name='trdoc'><td><a href='" + base_url + "files/trabajadores/documentos/" + this.documento + "' target='_blank'> <i class='fa fa-eye' > </i> " + this.tipo + " </a><input type='hidden'  id='id_archivo'  name='id_archivo' class='id_archivo'  value='" + this.id + "'></td><td>-</td><td><button type='button' class='btn btn-danger dim btnborrardoctab' id='btnborrardoctab' name='btnborrardoctab'><i class='fa fa-trash'></i></button></td> </tr>";
                                $("#Documentacion tbody").append(documentos);
                            });
                            ReiniciarIds("documentos2");
                        }
                    },
                }); //ajax documentos
                //LICENCIAS
                $.ajax({
                    type: "POST",
                    url: "get_licencias_trabajador",
                    data: {
                        trabajador: datos.data.rut
                    },
                    success: function (response) {
                        var datos = $.parseJSON(response);
                        if (datos.status != "error") {
                            $.each(datos.data, function () {
                                var licencias = "<tr class='trlic' id='trlic' name='trlic'><input type='hidden'  id='id_licencias'  name='id_licencias' class='id_licencias'  value='" + this.id + "'><td><input type='text'  id='numero_licencia'  name='numero_licencia' class='numero_licencia form-control numeros' placeholder='ESCRIBA EL Nº DE LICENCIA' value='" + this.numero_licencia + "'></td><td><input type='date' id='fecha_inicio_licencia'  name='fecha_inicio_licencia' class='fecha_inicio_licencia form-control' value='" + this.fecha_inicio + "'> </td><td><input type='date' id='fecha_termino_licencia'  name='fecha_termino_licencia' class='fecha_termino_licencia form-control' value='" + this.fecha_termino + "'> </td><td><a target='_blank' href='https://www.lmempleador.cl/user/login/step2'>TRAMITAR LICENCIA</a></td><td><button type='button' class='btn btn-danger dim btnborrarlictab2' id='btnborrarlictab2' name='btnborrarlictab2'><i class='fa fa-trash'></i></button></td> </tr>";
                                $("#Licencias tbody").append(licencias);
                            });
                            ReiniciarIds("licencias2");
                        }
                    },
                }); //ajax licencias
                //VACACIONES
                $.ajax({
                    type: "POST",
                    url: "get_vacaciones_trabajador",
                    data: {
                        trabajador: datos.data.rut
                    },
                    success: function (response) {
                        var datos = $.parseJSON(response);
                        if (datos.status != "error") {
                           if(datos.data != 0)
                           {
                             $.each(datos.data, function () {
                                var vacaciones = "<tr class='trvac' id='trvac' name='trvac'><input type='hidden'  id='id_vacaciones'  name='id_vacaciones' class='id_vacaciones'  value='" + this.id + "'><td><input type='date' id='fecha_inicio_vacaciones'  name='fecha_inicio_vacaciones' class='fecha_inicio_vacaciones form-control' value='" + this.fecha_inicio + "'> </td><td><input type='date' id='fecha_termino_vacaciones'  name='fecha_termino_vacaciones' class='fecha_termino_vacaciones form-control' value='" + this.fecha_termino + "'> </td><td>-</td><td><button type='button' class='btn btn-danger dim btnborrarvactab2' id='btnborrarvactab2' name='btnborrarvactab2'><i class='fa fa-trash'></i></button></td> </tr>";
                                $("#Vacaciones tbody").append(vacaciones);
                            });
                           }
                            ReiniciarIds("vacaciones2");
                        }
                    },
                }); //ajax VACACIONES
                //AUSENCIAS
                $.ajax({
                    type: "POST",
                    url: "get_ausencias_trabajador",
                    data: {
                        trabajador: datos.data.rut
                    },
                    success: function (response) {
                        var datos = $.parseJSON(response);
                        if (datos.status != "error") {
                            $.each(datos.data, function () {
                                var ausencias = "<tr class='traus' id='traus' name='traus'><td><input type='hidden'  id='id_ausencias'  name='id_ausencias' class='id_ausencias'  value='" + this.id + "'><input type='date'  id='fecha_ausencia'  name='fecha_ausencia' class='fecha_ausencia form-control mayusculas' value='" + this.fecha + "'></td><td><textarea  id='motivo_ausencia'  name='motivo_ausencia' class='motivo_ausencia form-control' placeholder='ESCRIBA EL MOTIVO DE LA AUSENCIA : EJ: PERMISO,OTROS' value='' style='resize:none' > " + this.motivo + "</textarea></td><td><button type='button' class='btn btn-danger dim btnborrardoctab2' id='btnborrardoctab2' name='btnborrarauctab2'><i class='fa fa-trash'></i></button></td> </tr>";
                                $("#Ausencias tbody").append(ausencias);
                            });
                            ReiniciarIds("ausencias2");
                        }
                    },
                }); //ajax AUSENCIAS
                $.ajax({
                    type: "POST",
                    url: "get_horario_trabajador",
                    data: {
                        trabajador: datos.data.rut,
                    }, // serializes the form's elements.
                    success: function (response) {
                        var datos = $.parseJSON(response);
                        if (datos.status == "error") {
                            //  MensajeError(datos.message)
                        } else if (datos.status == "success") {
                            if (datos.data2 != '0') {
                                $.each(datos.data2, function () {
                                    $("#td_colacion_" + this.dia + "").append("<div class='input-group div_delete" + this.dia + "' id='div_delete' name='div_delete'><input type='hidden' id='id_colacion_" + this.dia + "' name='id_colacion_" + this.dia + "' class='id_colacion_" + this.dia + "' value='" + this.id + "'><input type='time' id='colaciones_" + this.dia + "' name='colaciones_" + this.dia + "' class='form-control colaciones_" + this.dia + "' value='" + this.hora + "' /> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btncolaciones_" + this.dia + "' id='colaciones_" + this.dia + "' name='colaciones_" + this.dia + "'><i class='fa fa-trash'></i></button></span></div>")
                                    ReiniciarIds('colaciones', this.dia)
                                })
                            }
                            if (datos.data != 0) {
                                $.each(datos.data, function () {
                                    $("#colacion1_lunes").val(parseInt($(".colaciones_1").length) * 30)
                                    $("#colacion1_martes").val(parseInt($(".colaciones_2").length) * 30)
                                    $("#colacion1_miercoles").val(parseInt($(".colaciones_3").length) * 30)
                                    $("#colacion1_jueves").val(parseInt($(".colaciones_4").length) * 30)
                                    $("#colacion1_viernes").val(parseInt($(".colaciones_5").length) * 30)
                                    $("#colacion1_sabado").val(parseInt($(".colaciones_6").length) * 30)
                                    $("#colacion1_domingo").val(parseInt($(".colaciones_7").length) * 30)
                                    if (this.dia == "1") {
                                        if (this.hora_inicio != "00:00:00") {
                                            $("#hora_inicio_lunes").val(this.hora_inicio);
                                            $("#hora_termino_lunes").val(this.hora_termino);
                                            // $("#colacion1_lunes").val(this.colacion);
                                            $("#id_horario_1").val(this.id);
                                            SumaTiempo(1);
                                        }
                                    }
                                    if (this.dia == "2") {
                                        if (this.hora_inicio != "00:00:00") {
                                            $("#hora_inicio_martes").val(this.hora_inicio);
                                            $("#hora_termino_martes").val(this.hora_termino);
                                            //   $("#colacion1_martes").val(this.colacion);
                                            $("#id_horario_2").val(this.id);
                                            SumaTiempo(2);
                                        }
                                    }
                                    if (this.dia == "3") {
                                        if (this.hora_inicio != "00:00:00") {
                                            $("#hora_inicio_miercoles").val(this.hora_inicio);
                                            $("#hora_termino_miercoles").val(this.hora_termino);
                                            //  $("#colacion1_miercoles").val(this.colacion);
                                            $("#id_horario_3").val(this.id);
                                            SumaTiempo(3);
                                        }
                                    }
                                    if (this.dia == "4") {
                                        if (this.hora_inicio != "00:00:00") {
                                            $("#hora_inicio_jueves").val(this.hora_inicio);
                                            $("#hora_termino_jueves").val(this.hora_termino);
                                            // $("#colacion1_jueves").val(this.colacion);
                                            $("#id_horario_4").val(this.id);
                                            SumaTiempo(4);
                                        }
                                    }
                                    if (this.dia == "5") {
                                        if (this.hora_inicio != "00:00:00") {
                                            $("#hora_inicio_viernes").val(this.hora_inicio);
                                            $("#hora_termino_viernes").val(this.hora_termino);
                                            //  $("#colacion1_viernes").val(this.colacion);
                                            SumaTiempo(5);
                                            $("#id_horario_5").val(this.id);
                                        }
                                    }
                                    if (this.dia == "6") {
                                        if (this.hora_inicio != "00:00:00") {
                                            $("#hora_inicio_sabado").val(this.hora_inicio);
                                            $("#hora_termino_sabado").val(this.hora_termino);
                                            //  $("#colacion1_sabado").val(this.colacion);
                                            $("#id_horario_6").val(this.id);
                                            SumaTiempo(6);
                                        }
                                    }
                                    if (this.dia == "7") {
                                        if (this.hora_inicio != "00:00:00") {
                                            $("#hora_inicio_domingo").val(this.hora_inicio);
                                            $("#hora_termino_domingo").val(this.hora_termino);
                                            //  $("#colacion1_domingo").val(this.colacion);
                                            $("#id_horario_7").val(this.id);
                                            SumaTiempo(7);
                                        }
                                    }
                                    SumarHorasTrabajadas()
                                });
                            }
                            if (datos.data3 != '0') {

                                $.each(datos.data3, function () {

                                    $("#td_hora_extra_" + this.dia + "").append("<div class='input-group he_borrar div_deletehe" + this.dia + "' id='div_deletehe' name='div_deletehe'><input type='hidden' id='id_hora_extra_" + this.dia + "' name='id_hora_extra_" + this.dia + "' class='id_hora_extra_" + this.dia + "' value='" + this.id + "'><input readonly='true' type='time' id='horas_extras_" + this.dia + "' name='horas_extras_" + this.dia + "' class='he_sumar form-control horas_extras_" + this.dia + "' value='" + this.hora + "' /> <span class='input-group-btn'> <button type='button' class=' btn btn-danger btnhoras_extras_" + this.dia + "' id='horas_extras_" + this.dia + "' name='horas_extras_" + this.dia + "'><i class='fa fa-trash'></i></button></span></div>")
                                    ReiniciarIds('horas_extras', this.dia)
                                })
                            }
                            SumarHorasTrabajadas()
                        }
                    },
                });
            }
        },
    });
}

function GenerarTrabajador() {
    $.ajax({
        type: "POST",
        url: "crear_trabajador",
        data: $("#form_trabajadores").serialize(), // serializes the form's elements.
        success: function (response) {
            $("#documentacion_trabajador").hide();
            MensajeExito("Trabajador Creado Correctamente");
            $("#form_trabajadores").find("input").val("");
            $("#ModalTrabajadores").modal("hide");
            $(".form_trabajador").off("onsubmit");
            $(".form_trabajador").attr("id", "form_trabajadores");
            $(".form_trabajador").attr("onsubmit", "return GenerarTrabajador()");
            $("input, :input").attr("autocomplete", "off");
            MostrarT(1);
        },
    });
    return false;
}

function EditarTrabajador() {
    $("#vacaciones").val($("#Vacaciones tbody tr").length);
    $("#licencias").val($("#Licencias tbody tr").length);
    $("#ausencias").val($("#Ausencias tbody tr").length);
    $("#colaciones1").val($(".colaciones_1").length);
    $("#colaciones2").val($(".colaciones_2").length);
    $("#colaciones3").val($(".colaciones_3").length);
    $("#colaciones4").val($(".colaciones_4").length);
    $("#colaciones5").val($(".colaciones_5").length);
    $("#colaciones6").val($(".colaciones_6").length);
    $("#colaciones7").val($(".colaciones_7").length);
    $("#horas_extras1").val($(".horas_extras_1").length);
    $("#horas_extras2").val($(".horas_extras_2").length);
    $("#horas_extras3").val($(".horas_extras_3").length);
    $("#horas_extras4").val($(".horas_extras_4").length);
    $("#horas_extras5").val($(".horas_extras_5").length);
    $("#horas_extras6").val($(".horas_extras_6").length);
    $("#horas_extras7").val($(".horas_extras_7").length);
    $.ajax({
        type: "POST",
        url: "editar_trabajador",
        data: $("#form_trabajadores").serialize(),
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                MensajeExito("Trabajador Editado Correctamente");
                MostrarT(1);
                $("#documentacion_trabajador").hide();
                $("#licencias_trabajador").hide();
                $("#vacaciones_trabajador").hide();
                $("#ausencias_trabajador").hide();
                $("#horario_trabajador").hide();
                $("#opciones_trabajador").hide();
                $("#Licencias tbody tr").remove();
                $("#Vacaciones tbody tr").remove();
                $("#Documentacion tbody tr").remove();
                $("#Ausencias tbody tr").remove();
                $(".idhorario").remove()
                TablaTrabajadores();
                $(".form_trabajador").off("onsubmit");
                $(".form_trabajador").attr("id", "form_trabajadores");
                $(".form_trabajador").attr("onsubmit", "return GenerarTrabajador()");
                $("input, :input").attr("autocomplete", "off");
                $("#prever_delantera").empty();
                $("#prever_trasera").empty();
            }
        },
    });
    return false;
}

function EliminarTrabajador(id) {
    swal({
        title: "Estas seguro de eliminar este trabajador?",
        text: "Eliminaras un trabajador del sistema",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si,eliminar trabajador",
        cancelButtonText: "No,Cancelar ",
        closeOnConfirm: false,
        closeOnCancel: false,
    }, function (isConfirm) {
        if (isConfirm) {
            swal("Eliminado", "El trabajador ha sido eliminado.", "success");
            $.ajax({
                type: "POST",
                url: "delete_trabajador",
                data: {
                    id: id,
                },
                success: function (response) {
                    var datos = $.parseJSON(response);
                    if (datos.status == "error") {
                        MensajeError(datos.message);
                    } else if (datos.status == "success") {
                        TablaTrabajadores();
                    }
                },
            });
        } else {
            swal("Cancelado", "El trabajador no ha sido eliminado :)", "error");
        }
    });
}
$(document).ready(function () {
    TablaTrabajadores();
    nacionalidad("nacionalidad");
    afp("afp");
    $("#documentacion_trabajador").hide();
    $("#licencias_trabajador").hide();
    $("#opciones_trabajador").hide();
    $("#vacaciones_trabajador").hide();
    $("#ausencias_trabajador").hide();
    $("#horario_trabajador").hide();
    isapres("isapre");
    $(".trabajador").hide();
    $("#borrar").empty();
    $("#borrar2").empty();
    $.ajax({
        type: "GET",
        url: "area_empresa",
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {} else if (datos.status == "success") {
                $("#select_area").empty();
                var opts = "<option value=''>SELECCIONE UNA OPCIÓN</option>";
                $.each(datos.data, function () {
                    opts += "<option value='" + this.id + "'>" + this.nombre + "</option>";
                });
                $("#select_area").append(opts);
            }
        },
    });
    $(".form_trabajador").off("onsubmit");
    $(".form_trabajador").attr("id", "form_trabajadores");
    $(".form_trabajador").attr("onsubmit", "return GenerarTrabajador()");
    $("input, :input").attr("autocomplete", "off");
});