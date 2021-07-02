function CalcularTotal() {
  Sub_Totalv = 0
  $(".precio_producto_venta").each(function (index, value) {
    total = MoneyChangeClean($(this).val())
    Sub_Totalv = Sub_Totalv + eval(total)
  })
  if ($('.detalle_pedido').prop('checked')) {
    alert($(this).val());
  }
  $("#sub_total").val(Sub_Totalv)
  $("#total").val(Sub_Totalv)
  ConvertMoney('total')
  ConvertMoney('sub_total')
}

function CalcularTotal2() {
  Sub_Totalv = 0
  $(".precio_producto_venta").each(function (index, value) {
    total = MoneyChangeClean($(this).val())
    Sub_Totalv = Sub_Totalv + eval(total)
  })
  return Sub_Totalv
}

function CambiarEstado(numero_comprobante, estado) {
  $.ajax({
    type: "POST",
    url: "cambio_estado",
    data: {
      numero_comprobante: numero_comprobante,
      estado: estado
    },
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        if (datos.status == 'success') {
          CargarComandas()
        }
      }
    }
  })
}

function CategoriasPedidos() {
  /*
              0: productos
              1: ingrediente
              2: promociones
              3: delivery
           */
  $.ajax({
    type: "GET",
    url: "tabla_categorias",
    data: {
      tipo: 0
    },
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {
        MensajeAdvertencia("NO HAY CATEGORIAS,AGREGUE UNO ANTES DE CONTINUAR")
      } else if (datos.status == 'success') {
        $("#categorias").empty()
        var Tablas2 = "<button type='button' class='categoria_venta btn btn-block btn-dark dim' value='0'>TODAS LAS CATEGORIAS</button>"
        Tabla = "<h5>CATEGORIAS</h5>"
        $("#categorias").append(Tabla)
        $.each(datos.data, function () {
          if (this.estado == 1) {
            Tablas2 += "<button type='button' class='categoria_venta btn btn-block btn-dark dim' value='" + this.id + "'>" + this.nombre + " </button>"
          }
        })
        $("#categorias").append(Tablas2)
        //VALUE CATEGORIA PARA MOSTRAR LOS PRODUCTOS
        $('.categoria_venta').on('click', function () {
          $("#dt_producto").hide()
          $("#productos").show()
          $.ajax({
            type: "POST",
            url: "tabla_productos_categoria",
            data: {
              categoria: $(this).val()
            },
            success: function (response) {
              var datos = $.parseJSON(response)
              if (datos.status == "error") {
                MensajeAdvertencia("NO HAY PRODUCTOS,AGREGUE UNO ANTES DE CONTINUAR")
              } else if (datos.status == 'success') {
                $("#productos").empty()
                var Tablas2 = ""
                $.each(datos.data, function () {
                  Tablas2 += "<div class='row'><div class='col-md-4' style='height:45px'><input class='numero_producto' id='numero_producto' type='hidden'  value='" + this.numero_producto + "' name='numero_producto'  /> <input class='cantidad' id='cantidad' type='text' readonly='true' value='0' name='cantidad' class='form-control' style='max-width: 30%' /></div><div class='col-md-6'> <a href='#' class='detalle_producto" + this.id + "' id='detalle_producto" + this.id + "' name='detalle_producto" + this.id + "' onclick='ver_detalle_producto(" + this.id + ")' >" + this.nombre + "</a></div><div class='col-md-2'><div class='date precio'>" + this.precio_venta + "</div></div> </div>"
                })
                $("#productos").append(Tablas2)
                ReiniciarIds('detalle_productos_pedido')
                $("#modal").append("<div class='modal modal_pedidos' id='modal_pedidos' tabindex='-1' role='dialog' aria-labelledby='modal_pedidos' aria-hidden='true'><div class='modal-dialog modal-dialog-scrollable modal-xl'><div class='modal-content'><div class='modal-header'><h5 class='modal-title mt-0' id='titulo_modal_pedidos'></h5> <button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'> <span aria-hidden='true'>&times;</span> </button></div><div class='modal-body'></div><div class='modal-footer'> <button type='button' class='btn btn-secondary ' data-dismiss='modal'>Cerrar</button> <button type='button' id='guardar_cambios_modal' name='guardar_cambios_modal' class='btn btn-primary'>Guardar Cambios</button></div></div></div></div>")
                $(".cantidad").TouchSpin({
                  buttondown_class: 'btn btn-success ',
                  buttonup_class: 'btn btn-danger ',
                  min: 0,
                  max: 100,
                  initval: 1
                });
                //AGREGAMOS LOS DATOS AL MODAL Y DETALLE PRODUCTO
                $('.cantidad').on('touchspin.on.startspin', function () {
                    //  $(".modal_pedidos").modal('show')
                    var r = this.id
                    var r = r.replace('cantidad', "")
                    $.ajax({
                      type: "POST",
                      url: "ver_datos_producto",
                      data: {
                        numero: $("#numero_producto" + r).val()
                      },
                      success: function (response) {
                        var datos = $.parseJSON(response)
                        if (datos.status == "error") {} else if (datos.status == 'success') {
                          $("#titulo_modal_pedidos").empty()
                          $("#titulo_modal_pedidos").append("<h2>" + datos.data.nombre + "</h2>")
                          $("#detalle_pedido_cliente").append("<tr><input class='numero_producto_venta' id='numero_producto_venta' type='hidden'  value='" + $("#numero_producto" + r).val() + "' name='numero_producto_venta'  /><input class='precio_producto_venta' id='precio_producto_venta' type='hidden'  value='" + datos.data.precio_venta + "' name='precio_producto_venta'  /><td>1</td><td>" + datos.data.nombre + "</td>")
                          ReiniciarIds("productos_venta")
                          CalcularTotal()
                        }
                      }
                    })
                  } //fin touchpin change
                );
                $(".precio").formatCurrency({
                  region: 'es-CL',
                  roundToDecimalPlace: -1
                })
              }
            }
          })
        })
      }
    }
  })
}

function CargarComandas() {
  $.ajax({
    type: "POST",
    url: "cargar_pedidos",
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        if (datos.status == 'success') {
          var i = 0
          var totales = 0
          $(".comandas").empty()
          $(".direcciones").empty()
          $("#TablaPedidos tbody").empty()
          var td_comandas = ""
          var td_direcciones = ""
          $.each(datos.data, function () {
            var hora = this.hora
            totales = parseInt(totales) + parseInt(this.total)
            if (this.estado == 0) {
              td_comandas += "<td><div class='input-group mb-3'><div class='input-group-prepend'> <button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" + this.numero_pedido + "</button><div class='dropdown-menu'> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",1)'>Preparando</a> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",2)'>Despachado</a> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",3)'>Entregado</a></div></div></div> </td>"
            } else if (this.estado == 1) {
              td_comandas += "<td><div class='input-group mb-3'><div class='input-group-prepend'> <button class='btn btn-danger ' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" + this.numero_pedido + "</button><div class='dropdown-menu'> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",1)'>Preparando</a> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",2)'>Despachado</a> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",3)'>Entregado</a></div></div></div> </td>"
            } else if (this.estado == 2) {
              td_comandas += "<td><div class='input-group mb-3'><div class='input-group-prepend'> <button class='btn btn-info ' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" + this.numero_pedido + "</button><div class='dropdown-menu'> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",1)'>Preparando</a> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",2)'>Despachado</a> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",3)'>Entregado</a></div></div></div> </td>"
            } else if (this.estado == 3) {
              td_comandas += "<td><div class='input-group mb-3'><div class='input-group-prepend'> <button class='btn btn-success ' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" + this.numero_pedido + "</button><div class='dropdown-menu'> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",1)'>Preparando</a> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",2)'>Despachado</a> <a class='dropdown-item' href='#' onclick='CambiarEstado(" + this.numero_comprobante + ",3)'>Entregado</a></div></div></div> </td>"
            }
            td_direcciones += "<td>" + this.direccion_cliente + "</td>"
            i++
          })
          $.ajax({
            type: "POST",
            url: "horario_local",
            success: function (response) {
              var datos = $.parseJSON(response)
              if (datos.status == "error") {} else if (datos.status == 'success') {
                if (datos.status == 'success') {
                  var opt_hora=''
                  $.each(datos.data, function () {
                    opt_hora+="<option value='" + this+ "'>" +this+" </option>"

                    //if(this == hora)
                    // {

                  $("#TablaPedidos tbody").append("<tr><td> <input type='text' class='form-control input-lg' id='chef_"+this+"' name='chef_"+this+"'  style='width:40px;'></td><td>" + this + "</td>" + td_comandas + "  <td class='precio'>" + totales + "</td><td class='precio'>" + totales + "</td></tr><tr><td></td><td></td>" + td_direcciones + "<td></td><td></td><td></td><td></td></tr>")
                    //  }
                    ConvertMoneyText('precio')
                  })
                  $("#select_hora").empty()
                   $("#select_hora").append(opt_hora)
                }
              }
            }
          })
          ConvertMoneyText('precio')
          $(".comandastd").attr('colspan', i)
        }
      }
    }
  })
}

function ver_detalle_producto(dato) {
  $("#dt_producto").show()
  $("#productos").hide()
  $("#dt_producto").empty()
  $("#dt_producto").append("<div class='card'><div class='card-body'><h4 class='card-title'>Detalle del producto</h4><p class='card-title-desc'></p><div id='accordion' class='accordion'><div class='card shadow-none border mb-2'><div class='card-header p-3' id='headingOne'><h6 class='m-0'> <a href='#collapseOne' class='text-dark collapsed' data-toggle='collapse' aria-expanded='false' aria-controls='collapseOne'> Proteina (Elige hasta 1) </a></h6></div><div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordion' style=''><div class='card-body'><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='0'>Pollo +$0 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='0'>Salmon +$0 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='2000' >Pulpo +$2,000 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='4000' >Testing +$4,000 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='5000' id='testing2' name='testing2'>Testing 2 +$5,000 </label></div></div></div></div><div class='card shadow-none border mb-2'><div class='card-header p-3' id='headingTwo'><h6 class='m-0'> <a href='#collapseTwo' class='text-dark ' data-toggle='collapse' aria-expanded='true' aria-controls='collapseTwo'> Relleno(Elige hasta 3) </a></h6></div><div id='collapseTwo' class='collapse show' aria-labelledby='headingTwo' data-parent='#accordion'><div class='card-body'><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='0'>Queso Crema +$0 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='0'>Cebollin +$0 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='2000' >Palta +$2,000 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='4000' >Morron +$0 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='5000' id='testing2' name='testing2'>Testing 2 +$0 </label></div></div></div></div><div class='card shadow-none border mb-0'><div class='card-header p-3' id='headingThree'><h6 class='m-0'> <a href='#collapseThree' class='text-dark collapsed' data-toggle='collapse' aria-expanded='false' aria-controls='collapseThree'> Doble Proteina (Elige Hasta 1) </a></h6></div><div id='collapseThree' class='collapse show' aria-labelledby='headingThree' data-parent='#accordion'><div class='card-body'><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='0'>Pollo +$1,000 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='0'>Salmon +$1,000 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='2000' >Camaron Ecuatoriano +$2,000 </label></div><div class='form-check-inline'> <label class='form-check-label'> <input type='checkbox' class='form-check-input detalle_pedido' value='4000' >Machas +$1,000 </label></div></div></div></div></div></div></div>")
}

function AddChef(dato) {
  $("#modal_chef").modal('show')
}

function OrigenPedido(dato) {
  $("#origen_pedido").val(dato)
  $("#origen").empty()
  if (dato == 0) {
    $("#origen").append("<b>: LOCAL</b>")
  } else if (dato == 1) {
    $("#origen").append("<b>: WEB</b>")
  } else if (dato == 2) {
    $("#origen").append("<b>: FACEBOOK</b>")
  } else if (dato == 3) {
    $("#origen").append("<b>: INSTAGRAM</b>")
  } else if (dato == 4) {
    $("#origen").append("<b>: WHATSAPP</b>")
  }
}

function TipoRetiro(dato) {
  $("#tip_retiro").empty()
  if (dato == 0) {
    $("#tip_retiro").text(": RETIRO LOCAL")
    $("#tipo_retiro").val("LOCAL")
  } else {
    $("#tip_retiro").text(": DELIVERY")
    $("#tipo_retiro").val("DELIVERY")
  }
}
$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "horario_local",
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        if (datos.status == 'success') {}
      }
    }
  })
  Clientes()
  CategoriasPedidos()
  CargarComandas()
  $(".precio").formatCurrency({
    region: 'es-CL',
    roundToDecimalPlace: -1
  })
  $(".precio").keyup(function (e) {
    $(".precio").formatCurrency({
      region: 'es-CL',
      roundToDecimalPlace: -1
    })
  })
  ConvertMoney('estandar_chef')
  $(".detalle_pedido").hide()
  $(".orden").hide()
  $("#tab_pedido").hide()
  $(".orden").hide()
  $(".direccion_select").hide()
  $(".nueva_direccion").hide()
  $("#tab_delivery").hide()
  $("#tab_mesas").hide()
  $("#detalle").hide()
  //BUSCAR CLIENTE SEGUN TELEFONO
  $('#telefono_cliente').on('change', function () {
    $.ajax({
      type: "POST",
      url: "ver_datos_cliente",
      data: {
        telefono: $("#telefono_cliente").val()
      },
      success: function (response) {
        var datos = $.parseJSON(response)
        if (datos.status == "error") {} else if (datos.status == 'success') {
          $("#nombre_cliente").val(datos.data.nombres + " " + datos.data.apellidos)
          $("#direccion_cliente").empty()
          var Tablas2 = "<option value='x' selected='selected'>BUSCAR DIRECCIÓN...</option>"
          $("#direccion_cliente").append(Tabla)
          if (datos.data2 != 0) {
            $.each(datos.data2, function () {
              Tablas2 += "<option value='" + this.direccion + "'>" + this.direccion + " </option>"
            })
            $("#direccion_cliente").append(Tablas2)
            $(".direccion_select").show()
            /* $("#direccion_cliente").select2({
              language: {
                errorLoading: function () {
                  return "La carga falló"
                },
                inputTooLong: function (e) {
                  var t = e.input.length - e.maximum,
                    n = "Por favor, elimine " + t + " car";
                  return t == 1 ? n += "ácter" : n += "acteres", n
                },
                inputTooShort: function (e) {
                  var t = e.minimum - e.input.length,
                    n = "Por favor, introduzca " + t + " car";
                  return t == 1 ? n += "ácter" : n += "acteres", n
                },
                loadingMore: function () {
                  return "Cargando más resultados…"
                },
                maximumSelected: function (e) {
                  var t = "Sólo puede seleccionar " + e.maximum + " elemento";
                  return e.maximum != 1 && (t += "s"), t
                },
                noResults: function () {
                  return "No se encontraron resultados"
                },
                searching: function () {
                  return "Buscando…"
                }
              },
              placeholder: "SELECCIONE UNA DIRECCIÓN ",
              allowClear: true,
              width: "100%"
            });*/
          } else {
            MensajeAdvertencia("EL CLIENTE NO POSEE DIRECCIONES AGREGADAS")
            $(".agregar_nueva_direccion").show()
          }
        }
      }
    })
  })
  $('#nuevo_pedido').on('click', function () {
    $(".orden").show()
    $("#tab_todos").hide()
    $("#tab_all").hide()
    $("#tab_delivery").hide()
    $("#tab_mesas").hide()
    $("#tab_pedido").show()
    $("#detalle").show()
  })
  //VER MESAS
  $('#ver_mesas').on('click', function () {
    $(".orden").hide()
    $("#tab_mesas").show()
    $("#tab_todos").hide()
    $("#tab_all").hide()
    $("#tab_pedido").hide()
    $("#tab_delivery").hide()
    $("#detalle").hide()
  })
  $('#despacho').on('change', function () {
    var valor_despacho = MoneyChange('despacho')
    var subtotal = CalcularTotal2()
    var propina = MoneyChange('propina')
    $("#subtotal").val(parseInt(valor_despacho) + parseInt(subtotal) + parseInt(propina))
    $("#total").val(parseInt(valor_despacho) + parseInt(subtotal) + parseInt(propina))
    ConvertMoney('total')
  })
  $('#propina').on('change', function () {
    var valor_despacho = MoneyChange('despacho')
    var subtotal = CalcularTotal2()
    var propina = MoneyChange('propina')
    $("#subtotal").val(parseInt(valor_despacho) + parseInt(subtotal) + parseInt(propina))
    $("#total").val(parseInt(valor_despacho) + parseInt(subtotal) + parseInt(propina))
    ConvertMoney('total')
  })
  $('#descuento_porcentaje').on('change', function () {
    var valor_despacho = MoneyChange('despacho')
    var subtotal = CalcularTotal2()
    var propina = MoneyChange('propina')
    var sub_total = parseInt(valor_despacho) + parseInt(subtotal) + parseInt(propina)
    var descuento = eval(parseInt(sub_total) * parseFloat($(this).val() / 100))
    $("#descuento_valor").val(descuento)
    ConvertMoney('descuento_valor')
    $("#total").val((parseInt(valor_despacho) + parseInt(subtotal) + parseInt(propina)) - parseInt(descuento))
    ConvertMoney('total')
  })
  $('#descuento_valor').on('change', function () {
    var valor_despacho = MoneyChange('despacho')
    var subtotal = CalcularTotal2()
    var propina = MoneyChange('propina')
    var sub_total = parseInt(valor_despacho) + parseInt(subtotal) + parseInt(propina)
    var descuento = $(this).val()
    var descuento_porcentaje = eval(parseInt(sub_total) / parseInt($(this).val()))
    $("#descuento_valor").val(descuento)
    $("#descuento_porcentaje").val(parseInt(descuento_porcentaje) * 10)
    ConvertMoney('descuento_valor')
    $("#total").val((parseInt(valor_despacho) + parseInt(subtotal) + parseInt(propina)) - parseInt(descuento))
    ConvertMoney('total')
  })
  //VER DELIVERYS
  $('#ver_delivery').on('click', function () {
    $(".orden").hide()
    $("#tab_mesas").hide()
    $("#tab_delivery").show()
    $("#tab_todos").hide()
    $("#tab_all").hide()
    $("#tab_pedido").hide()
    $("#detalle").hide()
  })
  //VER PEDIDOS
  $('#ver_pedidos').on('click', function () {
    $(".orden").hide()
    $("#tab_todos").show()
    $("#tab_all").show()
    $("#tab_pedido").hide()
    $("#detalle").hide()
    $("#tab_delivery").hide()
    $("#tab_mesas").hide()
  })
  //AGREGAR NUEVA DIRECCION
  $('#agregar_nueva_direccion').on('click', function () {
    $(".nueva_direccion").show()
  })
  $('#avanzar_paso_3').on('click', function () {
    $(".cliente").hide()
    $(".detalle_pedido").show()
    $(".orden").hide()
  })
  $('#avanzar_paso_2').on('click', function () {
    $(".cliente").hide()
    $(".detalle_pedido").hide()
    $(".orden").show()
  })
  $('#guardar_pedido').on('click', function (e) {
    if (!e.detail || e.detail == 1) {
      $.ajax({
        type: "POST",
        url: "guardar_pedido",
        data: $("#form_pedidos").serialize(),
        success: function (response) {
          var datos = $.parseJSON(response)
          if (datos.status == "error") {} else if (datos.status == 'success') {
            if (datos.status == 'success') {
              $("#modal_pedidos").modal('hide')
              CargarComandas()
            }
          }
        }
      })
    }
  })
  $('#estandar_chef').on('change', function (e) {
    if (!e.detail || e.detail == 1) {
      $.ajax({
        type: "POST",
        url: "estandar_chef",
        data: {
          estandar: $("#estandar_chef").val()
        },
        success: function (response) {
          var datos = $.parseJSON(response)
          if (datos.status == "error") {} else if (datos.status == 'success') {
            if (datos.status == 'success') {
              MensajeExito("ESTANDAR EDITADO CORRECTAMENTE")
            }
          }
        }
      })
    }
  })
})