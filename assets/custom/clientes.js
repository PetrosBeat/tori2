
function TablaClientes() {
    $.ajax({
        type: "GET",
        url: "tabla_cliente",
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                //            MensajeError(datos.message)
            } else if (datos.status == "success") {
                var Tablas = "";
                var Num = 1;
                $("#TablaClientes tbody tr").remove();

                if(datos.data != '0')
                {
                    $.each(datos.data, function () {
                    if (this.mostrar == 0) {
                        var boton = "<span   class='btn btn-danger dim' onclick='ActivarCliente(" + this.id + ",1)'>OCULTAR</span>";
                        var style = "";
                    } else {
                        var boton = "<span   class='btn btn-primary dim' onclick='ActivarCliente(" + this.id + ",0)'>MOSTRAR</span>";

                        var style = "style='color:red'";
                    }

                    Tablas +=
                        "<tr id=" +
                        this.id +
                        " " +
                        style +
                        "><td>" +
                        Num +
                        "</td><td>" +
                        this.rut +
                        "</td><td>" +
                        this.razonSocial +
                        "</td><td>" +
                        this.email +
                        "</td><td >" +
                        this.telefono +
                        "</td><td class ='hidden-print'><button type='button' class='btn btn-info dim editarcliente' onclick='DatosCliente(" +
                        this.id +
                        ")' ><li class='fa fa-edit'> </li> </button></td><td class ='hidden-print'>" +
                        boton +
                        " </li> </button></td></tr>";
                    Num++;
                });
                }
                ConvertMoneyText("precios");
                $("#TablaClientes").append(Tablas);
            }
            Tabla();
        },
    });
}
function ActivarCliente(id, dato) {
    $.ajax({
        type: "POST",
        url: "ocultarcliente",
        data: { id: id, dato: dato }, // serializes the form's elements.
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                if (dato == 0) {
                    MensajeExito("Se mostrara el sistema para el sistema ");
                } else {
                    MensajeExito("Se oculto el cliente del sistema ");
                }
                TablaClientes();
            }
        },
    });
}
function IngresarCliente() {
    $.ajax({
        type: "POST",
        url: "crear_cliente",
        data: $("#form_cliente").serialize(), // serializes the form's elements.
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                MensajeExito("Cliente Ingresado Correctamente");
                $("#Clientes").modal("hide");
                TablaClientes();
                Clientes();

            }
        },
    });
    return false;
}

function DatosCliente(id) {
    $.ajax({
        url: "datos_cliente",
        data: { id: id }, // serializes the form's elements.
        type: "POST",
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {


                $("#btnclienteadd").off("click");
                 $("#tab_cliente").show()
                $("#tab_tabla").hide()
                //  $(".form_cliente").attr("id","formeditarcliente")
                $("#btnclienteadd").attr("onclick", "return EditarCliente()");
                $("input, :input").attr("autocomplete", "off");
                $("#id_cliente").val(datos.data.id);
                $("#nombre_cliente").val(datos.data.razonSocial);
                $("#giro_cliente").val(datos.data.giro);
                $("#rut_cliente").val(datos.data.rut);
                $("#rut_cliente").attr("readonly", "readonly");
                $("#correo_cliente").val(datos.data.email);
                $("#telefono_cliente").val(datos.data.telefono);
                $("#direccion_cliente").val(datos.data.direccion);
                $("#comuna_cliente").val(datos.data.comuna);

                $("#cdgSIISucur").val(datos.data.cdgSIISucur);
                if(datos.data2 != '0')
                {
                     $.each(datos.data2, function () {
                    var tabla_precios = "<tr><td>"+this.fecha+"</td><td class=' precios'>"+this.precio+"</td><td>"+this.tipo+"</td><td>-</td></tr>"

                        $("#TablaClientePrecio").append(tabla_precios)
                 })
                 ConvertMoneyText('precios')
                }
            }
        },
    });
}
function EditarCliente() {
    $("#cantidad_precios_cliente").val($("#TablaClientePrecio tbody tr").length)
    $.ajax({
        type: "POST",
        url: "editar_cliente",
        data: $("#form_cliente").serialize(), // serializes the form's elements.
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                MensajeExito("Cliente Editado Correctamente");
                $("#Clientes").modal("hide");
                TablaClientes();
                 $("#tab_cliente").hide()
          $("#tab_tabla").show()
            }
        },
    });
    return false;
}

function EliminarCliente(id, rut) {
    swal(
        {
            title: "Estas seguro de eliminar este cliente?",
            text: "Eliminaras un cliente del sistema",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si,eliminar cliente",
            cancelButtonText: "No,Cancelar ",
            closeOnConfirm: false,
            closeOnCancel: false,
        },
        function (isConfirm) {
            if (isConfirm) {
                swal("Eliminado", "El cliente ha sido eliminado.", "success");

                $.ajax({
                    type: "POST",
                    url: "deleteclient",
                    data: { id: id, rut: rut },
                    success: function (response) {
                        var datos = $.parseJSON(response);
                        if (datos.status == "error") {
                            MensajeError(datos.message);
                        } else if (datos.status == "success") {
                            TablaClientes();
                        }
                    },
                });
            } else {
                swal("Cancelado", "El cliente no ha sido eliminado :)", "error");
            }
        }
    );
}
function BorrarPrecioCliente(dato)
{
    $("#trpre"+dato).remove()
    ReiniciarIds('tabla_precios')
}
function AgregarPrecios()
{
    var tabla_precios = "<tr class='trpre' id='trpre' name='trpre'><td><input type='date' class='form-control fecha_precio' id='fecha_precio' name='fecha_precio' /></td><td><input type='text' class='form-control numeros precio precio_cliente' id='precio_cliente' name='precio_cliente' /></td><td> <select name='tipo_precio' id='tipo_precio' class='form-control tipo_precio'> <option value='DIMENSIONADO'>DIMENSIONADO</option><option value='TAPA'>TAPA</option><option value='ASERRIN'>ASERRIN</option><option value='CHICOTE'>CHICOTE</option><option value='LAMPAZO'>LAMPAZO</option><option value='CUARTONES'>CUARTONES</option><option value='EXDENTE'>EXDENTE</option></select></td><td><button type='button' class='btn btn-danger dim eliminarpreciocliente' id='eliminarpreciocliente' name='eliminarpreciocliente' ><i class='fa fa-trash'> </i> </button></td></tr>"
    $("#TablaClientePrecio").append(tabla_precios)
    ReiniciarIds('tabla_precios')
}
$(document).ready(function () {
    $("#btncliente").show();

    TablaClientes();
    $(".cliente").hide();


    $("#btntablacliente").click(function (e) {
                $("#tab_cliente").hide()
          $("#tab_tabla").show()
    });
    $("#btncliente").click(function (e) {

         $("#tab_cliente").show()
          $("#tab_tabla").hide()

        $("#rut_cliente").removeAttr("readonly");

        $("#btnclienteadd").off("click");


        $("#btnclienteadd").attr("onclick", "IngresarCliente()");
        $("input, :input").attr("autocomplete", "off");

        e.preventDefault();
        e.stopPropagation(); // avoid to execute the actual submit of the form.
    });

    $("#rut_cliente").change(function (e) {
        $.ajax({
            url: "verificar_cliente",
            data: { rut_cliente: $("#rut_cliente").val() },
            type: "POST",
            success: function (response) {
                var datos = $.parseJSON(response);
                if (datos.status == "error") {
                    MensajeError(datos.message);
                    $("#rut_cliente").val("");
                }

                if (datos.status == "success") {
                    $.each(datos.data, function () {
                        if (typeof this.rut != "undefined") {
                            console.log(this.giro)
                            $("#rut_cliente").val(this.rut);
                            $("#nombre_cliente").val(this.razonSocial);
                            $("#direccion_cliente").val(this.direccion);
                            $("#correo_cliente").val(this.email);

                            $("#telefono_cliente").val(this.telefono);
                            $("#comuna_cliente").val(this.comuna);
                            $.each(this.sucursales, function () {
                                $("#cdgSIISucur").val(this.cdgSIISucur);
                            });
                            var opts_giro = ""
                             $.each(this.actividades, function () {
                                opts_giro+="<option value='"+this.actividadEconomica+"'>"+this.actividadEconomica+"</option>"


                            });
                             $("#giro_cliente").empty()
                             $("#giro_cliente").append(opts_giro)
                        } else {

                            $.each(this.error.details, function () {
                                MensajeError(this.issue);
                                $("#rut_cliente").val("");
                                $("#cdgSIISucur").val("");
                                $("#nombre_cliente").val("");
                                $("#direccion_cliente").val("");
                                $("#correo_cliente").val("");
                                $("#telefono_cliente").val("");
                                $("#comuna_cliente").val("");
                                 $("#giro_cliente").val("")
                            });
                        }
                    });
                } else {
                    if (datos.status != "error") {
                        $.each(datos.data, function () {
                            $.each(this.error.details, function () {
                                MensajeError(this.issue);
                            });
                        });
                    } else {
                        MensajeError(datos.message);
                        $("#rut_cliente").val("");
                        $("#cdgSIISucur").val("");
                        $("#nombre_cliente").val("");
                        $("#direccion_cliente").val("");
                        $("#correo_cliente").val("");
                        $("#telefono_cliente").val("");
                        $("#comuna_cliente").val("");
                        $("#giro_cliente").val("")
                    }
                }
            },
        });

        e.preventDefault();
        e.stopPropagation(); // avoid to execute the actual submit of the form.
    });
});
