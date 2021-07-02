
function TablaProveedores() {
    $.ajax({
        type: "GET",
        url: "tabla_proveedor",
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                //            MensajeError(datos.message)
            } else if (datos.status == "success") {
                var Tablas = "";
                var Num = 1;
                $("#TablaProveedores tbody tr").remove();

               if(datos.data != '0')
               {
                 $.each(datos.data, function () {
                    if (this.mostrar == 0) {
                        var boton = "<span   class='btn btn-danger dim' onclick='ActivarProveedor(" + this.id + ",1)'>OCULTAR</span>";
                        var style = "";
                    } else {
                        var boton = "<span   class='btn btn-primary dim' onclick='ActivarProveedor(" + this.id + ",0)'>MOSTRAR</span>";

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
                        "</td><td class ='hidden-print'><button type='button' class='btn btn-info dim editarproveedor' onclick='DatosProveedor(" +
                        this.id +
                        ")' ><li class='fa fa-edit'> </li> </button></td><td class ='hidden-print'>" +
                        boton +
                        " </li> </button></td></tr>";
                    Num++;
                });
               }
                ConvertMoneyText("precios");
                $("#TablaProveedores").append(Tablas);
            }
            Tabla();
        },
    });
}
function ActivarProveedor(id, dato) {
    $.ajax({
        type: "POST",
        url: "ocultarproveedor",
        data: { id: id, dato: dato }, // serializes the form's elements.
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                if (dato == 0) {
                    MensajeExito("Se mostrara el sistema para el sistema ");
                } else {
                    MensajeExito("Se oculto el proveedor del sistema ");
                }
                TablaProveedores();
            }
        },
    });
}
function IngresarProveedor() {
    $.ajax({
        type: "POST",
        url: "crear_proveedor",
        data: $("#form_proveedor").serialize(), // serializes the form's elements.
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                MensajeExito("Proveedor Ingresado Correctamente");
                $("#Proveedores").modal("hide");
                TablaProveedores();
                Proveedores();

            }
        },
    });
    return false;
}

function DatosProveedor(id) {
    $.ajax({
        url: "datos_proveedor",
        data: { id: id }, // serializes the form's elements.
        type: "POST",
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {


                $("#btnproveedoradd").off("click");
                 $("#tab_proveedor").show()
                $("#tab_tabla").hide()
                //  $(".form_proveedor").attr("id","formeditarproveedor")
                $("#btnproveedoradd").attr("onclick", "return EditarProveedor()");
                $("input, :input").attr("autocomplete", "off");
                $("#id_proveedor").val(datos.data.id);
                $("#nombre_proveedor").val(datos.data.razonSocial);
                $("#giro_proveedor").val(datos.data.giro);
                $("#rut_proveedor").val(datos.data.rut);
                $("#rut_proveedor").attr("readonly", "readonly");
                $("#correo_proveedor").val(datos.data.email);
                $("#telefono_proveedor").val(datos.data.telefono);
                $("#direccion_proveedor").val(datos.data.direccion);
                $("#comuna_proveedor").val(datos.data.comuna);

                $("#cdgSIISucur").val(datos.data.cdgSIISucur);
                if(datos.data2 != '0')
                {
                     $.each(datos.data2, function () {
                    var tabla_precios = "<tr><td>"+this.fecha+"</td><td class=' precios'>"+this.precio+"</td><td>-</td></tr>"

                        $("#TablaProveedorPrecio").append(tabla_precios)
                 })
                 ConvertMoneyText('precios')
                }
            }
        },
    });
}
function EditarProveedor() {
    $("#cantidad_precios_proveedor").val($("#TablaProveedorPrecio tbody tr").length)
    $.ajax({
        type: "POST",
        url: "editar_proveedor",
        data: $("#form_proveedor").serialize(), // serializes the form's elements.
        success: function (response) {
            var datos = $.parseJSON(response);
            if (datos.status == "error") {
                MensajeError(datos.message);
            } else if (datos.status == "success") {
                MensajeExito("Proveedor Editado Correctamente");
                $("#Proveedores").modal("hide");
                TablaProveedores();
                 $("#tab_proveedor").hide()
          $("#tab_tabla").show()
            }
        },
    });
    return false;
}

function EliminarProveedor(id, rut) {
    swal(
        {
            title: "Estas seguro de eliminar este proveedor?",
            text: "Eliminaras un proveedor del sistema",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si,eliminar proveedor",
            cancelButtonText: "No,Cancelar ",
            closeOnConfirm: false,
            closeOnCancel: false,
        },
        function (isConfirm) {
            if (isConfirm) {
                swal("Eliminado", "El proveedor ha sido eliminado.", "success");

                $.ajax({
                    type: "POST",
                    url: "deleteclient",
                    data: { id: id, rut: rut },
                    success: function (response) {
                        var datos = $.parseJSON(response);
                        if (datos.status == "error") {
                            MensajeError(datos.message);
                        } else if (datos.status == "success") {
                            TablaProveedores();
                        }
                    },
                });
            } else {
                swal("Cancelado", "El proveedor no ha sido eliminado :)", "error");
            }
        }
    );
}
function BorrarPrecioProveedor(dato)
{
    $("#trpre"+dato).remove()
    ReiniciarIds('tabla_preciosp')
}
function AgregarPrecios()
{
    var tabla_precios = "<tr class='trpre' id='trpre' name='trpre'><td><input type='date' class='form-control fecha_precio' id='fecha_precio' name='fecha_precio' /></td><td><input type='text' class='form-control numeros precio precio_proveedor' id='precio_proveedor' name='precio_proveedor' /></td><td><button type='button' class='btn btn-danger dim eliminarprecioproveedor' id='eliminarprecioproveedor' name='eliminarprecioproveedor' ><i class='fa fa-trash'> </i> </button></td></tr>"
    $("#TablaProveedorPrecio").append(tabla_precios)
    ReiniciarIds('tabla_preciosp')
}
$(document).ready(function () {
    $("#btnproveedor").show();

    TablaProveedores();
    $(".proveedor").hide();


    $("#btntablaproveedor").click(function (e) {
                $("#tab_proveedor").hide()
                $("#tab_tabla").show()
    });
    $("#btnproveedor").click(function (e) {

         $("#tab_proveedor").show()
          $("#tab_tabla").hide()

        $("#rut_proveedor").removeAttr("readonly");

        $("#btnproveedoradd").off("click");


        $("#btnproveedoradd").attr("onclick", "IngresarProveedor()");
        $("input, :input").attr("autocomplete", "off");

        e.preventDefault();
        e.stopPropagation(); // avoid to execute the actual submit of the form.
    });

    $("#rut_proveedor").change(function (e) {
        $.ajax({
            url: "verificar_proveedor",
            data: { rut_proveedor: $("#rut_proveedor").val() },
            type: "POST",
            success: function (response) {
                var datos = $.parseJSON(response);
                if (datos.status == "error") {
                    MensajeError(datos.message);
                    $("#rut_proveedor").val("");
                }

                if (datos.status == "success") {
                    $.each(datos.data, function () {
                        if (typeof this.rut != "undefined") {
                          //  console.log(this.giro)
                            $("#rut_proveedor").val(this.rut);
                            $("#nombre_proveedor").val(this.razonSocial);
                            $("#direccion_proveedor").val(this.direccion);
                            $("#correo_proveedor").val(this.email);

                            $("#telefono_proveedor").val(this.telefono);
                            $("#comuna_proveedor").val(this.comuna);
                            $.each(this.sucursales, function () {
                                $("#cdgSIISucur").val(this.cdgSIISucur);
                            });
                            var opts_giro = ""
                             $.each(this.actividades, function () {
                                opts_giro+="<option value='"+this.actividadEconomica+"'>"+this.actividadEconomica+"</option>"


                            });
                             $("#giro_proveedor").empty()
                             $("#giro_proveedor").append(opts_giro)
                        } else {

                            $.each(this.error.details, function () {
                                MensajeError(this.issue);
                                $("#rut_proveedor").val("");
                                $("#cdgSIISucur").val("");
                                $("#nombre_proveedor").val("");
                                $("#direccion_proveedor").val("");
                                $("#correo_proveedor").val("");
                                $("#telefono_proveedor").val("");
                                $("#comuna_proveedor").val("");
                                 $("#giro_proveedor").val("")
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
                        $("#rut_proveedor").val("");
                        $("#cdgSIISucur").val("");
                        $("#nombre_proveedor").val("");
                        $("#direccion_proveedor").val("");
                        $("#correo_proveedor").val("");
                        $("#telefono_proveedor").val("");
                        $("#comuna_proveedor").val("");
                        $("#giro_proveedor").val("")
                    }
                }
            },
        });

        e.preventDefault();
        e.stopPropagation(); // avoid to execute the actual submit of the form.
    });
});
