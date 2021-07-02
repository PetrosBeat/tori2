
var count2 = 1; //variable que almacena la cantidad de cheques
function AreaEmpresa()
{
    $.ajax({
    type: "GET",
    url: "area_empresa",
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        $("#select_area").empty()
        var opts = "<option value=''>SELECCIONE UNA OPCIÓN</option>"
        $.each(datos.data, function () {
          opts += "<option value='" + this.id + "'>" + this.nombre + "</option>"
        })
        $("#select_area").append(opts)
      }
    }
  });
}
function MoneyChange(id) {
  dinerorecibido = $("#" + id).val() //valor que no esta seteado
  //transformamos el valor no seteado a uno numerico
  dinero = dinerorecibido.replace(",", "")
  dinerofinal = dinero.replace("$", "")
  dineroseteado = dinerofinal.replace(",", "")
  return dineroseteado
}

function MoneyChangeText(id) {
  dinerorecibido = $("#" + id).text() //valor que no esta seteado
  //transformamos el valor no seteado a uno numerico
  dinero = dinerorecibido.replace(",", "")
  dinerofinal = dinero.replace("$", "")
  dineroseteado = dinerofinal.replace(",", "")
  return dineroseteado
}

function MoneyChangeText2(id) {
  dinerorecibido = $("." + id).text() //valor que no esta seteado
  //transformamos el valor no seteado a uno numerico
  dinero = dinerorecibido.replace(",", "")
  dinerofinal = dinero.replace("$", "")
  dineroseteado = dinerofinal.replace(",", "")
  return dineroseteado
}

function MoneyChangeClean(dinerorecibido) {
  //transformamos el valor no seteado a uno numerico
  console.log(dinerorecibido)
  dinero        = dinerorecibido.replace(",", "")
  dinerofinal   = dinero.replace("$", "")
  dineroseteado = dinerofinal.replace(",", "")
  return dineroseteado
}

function ConvertMoney(id) {
  $("#" + id).formatCurrency({
    region: 'es-CL',
    roundToDecimalPlace: -1
  })
}

function ConvertMoneyText(id) {
  $("." + id).formatCurrency({
    region: 'es-CL',
    roundToDecimalPlace: -1
  })
}

function ConvertMoneyText2(id) {
  $("#" + id).formatCurrency({
    region: 'es-CL',
    roundToDecimalPlace: -1
  })
}

function Ruts(id) {
  $("input#" + id).rut({
    formatOn: 'keyup',
    minimumLength: 8, // validar largo mínimo; default: 2
    validateOn: 'change' // si no se quiere validar, pasar null
  });
}

function formatDate(date) {
  var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();
  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;
  return [day, month, year].join('-');
}

function getNum(val) {
  if (isNaN(val)) {
    return 0;
  }
  return val;
}

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function RemoverDisable(id) {
  $("#" + id).removeAttr('disabled')
}

function Tabla() {
  if ($.fn.dataTable.isDataTable('.dataTables-example')) {
    table = $('.dataTables-example').DataTable();
  } else {
    table = $('.dataTables-example').DataTable({
      "paging": true,
      "ordering": true,
      "autoWidth": true
    });
  }
}

function Tablaid(ids) {
  if ($.fn.dataTable.isDataTable("#" + ids)) {
    table = $("#" + ids).DataTable();
  } else {
    table = $("#" + ids).DataTable({
      "paging": true,
      "ordering": true,
      "autoWidth": true
    });
  }
}

function formato_fecha(date) {
  var d = new Date(date)
  var month = d.getMonth()
  var day = d.getDate()
  var year = d.getFullYear();
  var minutes = d.getMinutes();
  var hour = d.getHours();
  if (parseInt(month.length) < 2) month = '0' + month;
  if (parseInt(day.length) < 2) day = '0' + day;
  if (parseInt(hour.length) < 2) hour = '0' + hour;
  if (parseInt(minutes.length) < 2) minutes = '0' + minutes;
  return [day, month, year].join('-') + " " + hour + ":" + minutes;
}

function formato_fecha2(date) {
  var d = new Date(date)
  var month = d.getMonth()
  var day = d.getDate()
  var year = d.getFullYear();
  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;
  return [day, month, year].join('-');
}

function Enlace(datos, dato2) {
  if (dato2 == '0') {
    var url = 'ActaPartido/' + datos
    window.open(url, '_blank');
  }
}

function MensajeError(obj) {
  setTimeout(function () {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "progressBar": true,
      "preventDuplicates": true,
      "positionClass": "toast-top-left",
      "onclick": null,
      "showDuration": "4000",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.error(obj, ' E R R O R ')
  }, 0)
}

function MensajeExito(obj) {
  setTimeout(function () {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "progressBar": true,
      "preventDuplicates": true,
      "positionClass": "toast-top-left",
      "onclick": null,
      "showDuration": "2000",
      "hideDuration": "1000",
      "timeOut": "3000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.success(obj, ' E X I T O ')
  }, 0)
}

function MensajeAdvertencia(obj) {
  setTimeout(function () {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "progressBar": true,
      "preventDuplicates": true,
      "positionClass": "toast-top-left",
      "onclick": null,
      "showDuration": "4000",
      "hideDuration": "1000",
      "timeOut": "7000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    toastr.warning(obj, ' C U I D A D O ')
  }, 0)
}

function ReiniciarIds(dato, dato2) {
  var a = 1;
  var b = 1;
  var c = 1;
  var d = 1;
  var e = 1;
  var f = 1;
  var g = 1;
  var h = 1;
  var i = 1;
  var j = 1;
  var k = 1;
  l = 1;
  m = 1;
  n = 1, o = 1, p = 1, q = 1, r = 1, s = 1, t = 1, u = 1, v = 1, w = 1, x = 1, y = 1, z = 1, ay = 1, aa = 1;
  //reinicio de id perteneciente al listado de ventas
if (dato === 'productos_venta') {
  $(".numero_producto_venta").each(function () {
      $("#" + this.id).attr("id", "numero_producto_venta" + a)
      $("#" + this.id).attr("name", "numero_producto_venta" + a)
      a = a + 1
    });
    $(".cantidad").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "cantidad" + b)
      $("#" + this.id).attr("name", "cantidad" + b)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      b = b + 1
    });
    $(".detalle_producto").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "detalle_producto" + c)
      $("#" + this.id).attr("name", "detalle_producto" + c)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      c = c + 1
    });

}else if (dato === 'detalle_productos_pedido') {
  $(".numero_producto").each(function () {
      $("#" + this.id).attr("id", "numero_producto" + a)
      $("#" + this.id).attr("name", "numero_producto" + a)
      a = a + 1
    });
    $(".cantidad").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "cantidad" + b)
      $("#" + this.id).attr("name", "cantidad" + b)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      b = b + 1
    });
    $(".detalle_producto").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "detalle_producto" + c)
      $("#" + this.id).attr("name", "detalle_producto" + c)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      c = c + 1
    });
 }else if (dato === 'ingredientesp') {
    $(".nombre_categoria").each(function () {
      $("#" + this.id).attr("id", "nombre_categoria" + a)
      $("#" + this.id).attr("name", "nombre_categoria" + a)
      a = a + 1
    });
    $(".repetible").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "repetible" + b)
      $("#" + this.id).attr("name", "repetible" + b)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      b = b + 1
    });
    $(".obligatorio").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "obligatorio" + c)
      $("#" + this.id).attr("name", "obligatorio" + c)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      c = c + 1
    });
    $(".minimo").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "minimo" + d)
      $("#" + this.id).attr("name", "minimo" + d)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      d = d + 1
    });
    $(".maximo").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "maximo" + e)
      $("#" + this.id).attr("name", "maximo" + e)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      e = e + 1
    });
    $(".ingredientes").each(function () {
      $("#" + this.id).off('change');
      $("#" + this.id).attr("id", "ingredientes" + f)
      $("#" + this.id).attr("name", "ingredientes" + f)
      $("#" + this.id).attr("onchange", "add_ingredientes(" + f + ")");
      f = f + 1
    });
    $(".div_ci").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "div_ci" + g)
      $("#" + this.id).attr("name", "div_ci" + g)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      g = g + 1
    });
    $(".ingredientes_seleccionados").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "ingredientes_seleccionados" + h)
      $("#" + this.id).attr("name", "ingredientes_seleccionados" + h)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      h = h + 1
    });
    $(".cantidad_ingredientes").each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "cantidad_ingredientes" + i)
      $("#" + this.id).attr("name", "cantidad_ingredientes" + i)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      i = i + 1
    });
    $(".btneliminar").each(function () {
      $("#" + this.id).off('click');
      $("#" + this.id).attr("id", "btneliminar" + j)
      $("#" + this.id).attr("name", "btneliminar" + j)
      $("#" + this.id).attr("onclick", "EliminarDT(" + j + ")");
      j = j + 1
    });
    $(".labelrepetible").each(function () {
      $("#" + this.id).attr("id", "labelrepetible" + k)
      $("#" + this.id).attr("name", "labelrepetible" + k)
      $("#" + this.id).attr("for", "repetible" + k)
      k = k + 1
    });
    $(".labelobligatorio").each(function () {
      $("#" + this.id).attr("id", "labelobligatorio" + l)
      $("#" + this.id).attr("name", "labelobligatorio" + l)
      $("#" + this.id).attr("for", "obligatorio" + l)
      l = l + 1
    });
    $(".id_detalle_producto").each(function () {
      $("#" + this.id).attr("id", "id_detalle_producto" + m)
      $("#" + this.id).attr("name", "id_detalle_producto" + m)

      m = m + 1
    });
  } else if (dato === 'detalle_ingredientes') {
    $(".div_eliminar" + dato2).each(function () {
      $("#" + this.id).attr("id", "div_eliminar" + dato2 + "_" + a)
      $("#" + this.id).attr("name", "div_eliminar" + dato2 + "_" + a)
      a = a + 1
    });
    $(".id_ingrediente" + dato2).each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "id_ingrediente" + dato2 + "_" + b)
      $("#" + this.id).attr("name", "id_ingrediente" + dato2 + "_" + b)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      b = b + 1
    });
    $(".nombre_ingrediente" + dato2).each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "nombre_ingrediente" + dato2 + "_" + c)
      $("#" + this.id).attr("name", "nombre_ingrediente" + dato2 + "_" + c)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      c = c + 1
    });
    $(".valor_ingrediente" + dato2).each(function () {
      // $("#"+this.id).off('change');
      $("#" + this.id).attr("id", "valor_ingrediente" + dato2 + "_" + d)
      $("#" + this.id).attr("name", "valor_ingrediente" + dato2 + "_" + d)
      //$("#"+this.id).attr("onchange","SumaIngredientes("+a+")");
      d = d + 1
    });
    $(".btn_eliminar_ingrediente" + dato2).each(function () {
      $("#" + this.id).off('click');
      $("#" + this.id).attr("id", "btn_eliminar_ingrediente" + dato2 + "_" + e)
      $("#" + this.id).attr("name", "btn_eliminar_ingrediente" + dato2 + "_" + e)
      $("#" + this.id).attr("onclick", "EliminarDIngrediente(" + dato2 + "," + e + ")");
      e = e + 1
    });
  }
            if(dato === 'f_pago')
                {
                          $(".trpago").each(function() {
                            $("#"+this.id).attr("id","trpago"+d)
                            $("#"+this.id).attr("name","trpago"+d)
                             d = d + 1
                      });
                  $(".totalfpago").each(function() {
                   // $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","total_pagar"+a)
                             $("#"+this.id).attr("name","total_pagar"+a)
                          //   $("#"+this.id).attr("onchange","suma_pagos("+a+")");
                             a = a + 1
                      });
                   $(".fpago").each(function() {
                          $("#"+this.id).off('change');
                          $("#"+this.id).attr("id","forma_pago"+b)
                           $("#"+this.id).attr("name","forma_pago"+b)
                             $("#"+this.id).attr("onchange","select_forma_pago("+b+")");



                             b = b + 1
                      });
                     $(".deletefpago").each(function() {
                      $("#"+this.id).off('click');
                            $("#"+this.id).attr("id","deletefpago"+c)
                             $("#"+this.id).attr("name","deletefpago"+c)
                             $("#"+this.id).attr("onclick","delete_fpago("+c+")");

                             c = c + 1
                      });
                          $(".otrosdiv").each(function() {
                            $("#"+this.id).attr("id","otrosdiv"+e)
                            $("#"+this.id).attr("name","otrosdiv"+e)
                             e = e + 1
                      });
                            $(".precio").formatCurrency({
                    region: 'es-CL'
                    , roundToDecimalPlace: -1
                    })
       $('.totalfpago').keyup(delay(function (e) {
  suma_pagos()
}, 1000));
         $(".precio").formatCurrency({
                    region: 'es-CL'
                    , roundToDecimalPlace: -1
                    })
                }
                else if(dato === 'ventas')
                {

                  $(".trs").each(function() {
                            $("#"+this.id).attr("id","trs"+d)
                            $("#"+this.id).attr("name","trs"+d)
                             d = d + 1
                      });
                  $(".codigo").each(function() {
                   // $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","codigo"+a)
                             $("#"+this.id).attr("name","codigo"+a)
                          //   $("#"+this.id).attr("onchange","suma_pagos("+a+")");
                             a = a + 1
                      });
                   $(".nombre").each(function() {
                          //$("#"+this.id).off('change');
                          $("#"+this.id).attr("id","nombre"+b)
                           $("#"+this.id).attr("name","nombre"+b)
                            // $("#"+this.id).attr("onchange","select_forma_pago("+b+")");
                             b = b + 1
                      });
                     $(".servicio_select").each(function() {
                      $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","select_servicio"+c)
                             $("#"+this.id).attr("name","select_servicio"+c)
                             $("#"+this.id).attr("onchange","CalculoDatos("+c+")");

                             c = c + 1
                      });
                          $(".tipoventa").each(function() {
                             $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","tipo_venta"+e)
                            $("#"+this.id).attr("name","tipo_venta"+e)
                              $("#"+this.id).attr("onchange","CalculoDatos("+e+")");
                             e = e + 1
                      });
                          $(".precio_venta").each(function() {
                             $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","precio"+f)
                            $("#"+this.id).attr("name","precio"+f)
                              $("#"+this.id).attr("onchange","CalcularNuevoPrecio("+f+")");
                             f = f + 1
                      });
                          $(".totalpulgadas").each(function() {
                           //  $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","total_pulgadas"+g)
                            $("#"+this.id).attr("name","total_pulgadas"+g)
                           //  $("#"+this.id).attr("onchange","CalculoDatos("+g+")");
                             g = g + 1
                      });

                          $(".medida").each(function() {
                           //  $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","medida"+i)
                            $("#"+this.id).attr("name","medida"+i)
                          //    $("#"+this.id).attr("onchange","CalculoDatos("+e+")");
                             i = i + 1
                      });
                           $(".totales").each(function() {
                           //  $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","total"+j)
                            $("#"+this.id).attr("name","total"+j)
                          //    $("#"+this.id).attr("onchange","CalculoDatos("+e+")");
                             j = j + 1
                      });
                            $(".cantidad").each(function() {
                             $("#"+this.id).off('change');
                            $("#"+this.id).attr("id","cantidad"+l)
                            $("#"+this.id).attr("name","cantidad"+l)
                              $("#"+this.id).attr("onchange","CalculoDatos("+l+")");
                             l = l + 1
                      });
                            $(".btnborrar").each(function() {
                             $("#"+this.id).off('click');
                            $("#"+this.id).attr("id","btnborrar"+k)
                            $("#"+this.id).attr("name","btnborrar"+k)
                              $("#"+this.id).attr("onclick","BorrarProductoVenta("+k+")");
                             k = k + 1
                      });


         $(".precio").formatCurrency({
                    region: 'es-CL'
                    , roundToDecimalPlace: -1
                    })
                }
        else if(dato == "cheque")
        {
             $(".brr").each(function() {
                $("#"+this.id).attr("id","borrar"+f)
                 $("#"+this.id).attr("value",f)
                    f = f + 1
              });
             $(".btneliminarcheque").each(function() {
                 $("#"+this.id).off('onclick');
                $("#"+this.id).attr("id","btneliminarcheque"+g)
                $("#"+this.id).attr("onclick","BorrarCheque("+g+")");
                    g = g + 1
              });
             $(".numero_cheque").each(function() {
                $("#"+this.id).attr("id","numero_cheque"+h)
                $("#"+this.id).attr("name","numero_cheque"+h)
                    h = h + 1
              });
             $(".fecha_cheque").each(function() {
                $("#"+this.id).attr("id","fecha_cheque"+i)
                $("#"+this.id).attr("name","fecha_cheque"+i)
                    i = i + 1
              });
              $(".monto_cheque").each(function() {
                    $("#"+this.id).off('change');
                $("#"+this.id).attr("id","monto_cheque"+j)
                $("#"+this.id).attr("name","monto_cheque"+j)
                 $("#"+this.id).attr("onchange","MontoPagoCheque("+j+")");
                    j = j + 1
              });
              $(".tipo_banco").each(function() {
                $("#"+this.id).attr("id","tipo_banco"+k)
                $("#"+this.id).attr("name","tipo_banco"+k)
                    k = k + 1
              });


                $('.fechas_sistema').datetimepicker({
                        i18n:{
                        de:{
                        months:[
                        'Enero','Febrero','Marzo','Abril',
                        'Mato','Junio','Julio','Agosto',
                        'Septiembre','Octubre','Noviembre','Diciembre',
                        ],
                        dayOfWeek:[
                        "LUN", "MAR", "MIE", "JUE",
                        "VIE", "SAB", "DOM.",
                        ]
                        }
                        },
                        locale:'es',
                        lang:'es',
                        format:'Y/m/d',
                        defaultDate: new Date(),
                        timepicker:false,
               });

        }


          else if(dato == "compras")
        {

               $(".brringredienteadd").each(function() {
                $("#"+this.id).attr("Columna"+a)
                    a = a + 1
              });
             $(".ingrediente").each(function() {
                $("#"+this.id).attr("id","ingrediente"+b)
                $("#"+this.id).attr("name","ingrediente"+b)
                    b = b + 1
              });
              $(".cant_ingrediente").each(function() {
                  $("#"+this.id).off('change');
                $("#"+this.id).attr("id","cantidad_ingrediente"+c)
                $("#"+this.id).attr("name","cantidad_ingrediente"+c)
                 $("#"+this.id).attr("onchange","Totales("+c+")");

                    c = c + 1
              });
               $(".btnborrarigprod").each(function() {
                $("#"+this.id).off('click');
                $("#"+this.id).attr("id","btnborrarigprod"+d)
                $("#"+this.id).attr("name","btnborrarigprod"+d)
                $("#"+this.id).attr("onclick","BorrarProductoCompra("+d+")");
                    d = d + 1

              });
               $(".totales").each(function() {

                $("#"+this.id).attr("id","totales"+h)
                $("#"+this.id).attr("name","totales"+h)

                    h = h + 1
              });


               $(".precio_compra").each(function() {
               $("#"+this.id).off('change');
                $("#"+this.id).attr("id","precio_compra"+y)
                $("#"+this.id).attr("name","precio_compra"+y)
                $("#"+this.id).attr("onchange","Totales("+y+")");
                    y = y + 1
              });
                      $(".precio").formatCurrency({
                    region: 'es-CL'
                    , roundToDecimalPlace: -1
                    })
          }
           else if(dato == "Turnos")
        {


             $(".trabajador").each(function() {
                $("#"+this.id).attr("id","trabajador"+a)
                $("#"+this.id).attr("name","trabajador"+a)
                    a = a + 1
              });
              $(".opcion_trabajador").each(function() {
                  $("#"+this.id).off('change');
                  $("#"+this.id).attr("id","opcion_trabajador"+b)
                  $("#"+this.id).attr("name","opcion_trabajador"+b)
                  $("#"+this.id).attr("onchange","EditarHora("+b+")");

                    b = b + 1
              });
               $(".hora").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","hora"+c)
                  $("#"+this.id).attr("name","hora"+c)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    c = c + 1

              });
               $(".id_turno").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","id_turno"+d)
                  $("#"+this.id).attr("name","id_turno"+d)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    d = d + 1

              });
                   $(".trabajador_id").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","trabajador_id"+e)
                  $("#"+this.id).attr("name","trabajador_id"+e)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    e = e + 1

              });
                        $(".td_trabaja").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","td_trabaja"+f)
                  $("#"+this.id).attr("name","td_trabaja"+f)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    f = f + 1

              });
                         $(".cantidad_trabajadores").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","cantidad_trabajadores"+g)
                  $("#"+this.id).attr("name","cantidad_trabajadores"+g)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    g = g + 1

              });
                         $(".dia_t").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","dia_t"+h)
                  $("#"+this.id).attr("name","dia_t"+h)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    h = h + 1

              });


          }
            else if(dato == "documentos")
        {


             $(".archivo").each(function() {
                $("#"+this.id).off('change');
                $("#"+this.id).attr("id","archivo"+a)
                $("#"+this.id).attr("name","archivo"+a)
                $("#"+this.id).attr("onchange","cargar_documentacion("+a+")");
                 a = a + 1
              });
              $(".tipo_archivo").each(function() {

                  $("#"+this.id).attr("id","tipo_archivo"+b)
                  $("#"+this.id).attr("name","tipo_archivo"+b)


                    b = b + 1
              });
              $(".btnborrardoctab").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrardoctab"+c)
                  $("#"+this.id).attr("name","btnborrardoctab"+c)
                /$("#"+this.id).attr("onclick","BorrarDocumentoTabla("+c+")");

                    c = c + 1
              });
              $(".trdoc").each(function() {
                $("#"+this.id).attr("id","trdoc"+d)
                $("#"+this.id).attr("name","trdoc"+d)
                    d = d + 1
              });

        }
           else if(dato == "documentos2")
        {

            $(".id_archivo").each(function() {
               // $("#"+this.id).off('change');
                $("#"+this.id).attr("id","id_archivo"+a)
                $("#"+this.id).attr("name","id_archivo"+a)
              //  $("#"+this.id).attr("onchange","cargar_documentacion("+a+")");
                 a = a + 1
              });

              $(".tipo_archivo").each(function() {

                  $("#"+this.id).attr("id","tipo_archivo"+b)
                  $("#"+this.id).attr("name","tipo_archivo"+b)


                    b = b + 1
              });
              $(".btnborrardoctab").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrardoctab2"+c)
                  $("#"+this.id).attr("name","btnborrardoctab2"+c)
                /$("#"+this.id).attr("onclick","BorrarDocumentoBD("+c+")");

                    c = c + 1
              });
              $(".trdoc").each(function() {
                $("#"+this.id).attr("id","trdoc"+d)
                $("#"+this.id).attr("name","trdoc"+d)
                    d = d + 1
              });

        }
          else if(dato == "licencias")
        {


             $(".fecha_inicio_licencia").each(function() {

                $("#"+this.id).attr("id","fecha_inicio_licencia"+a)
                $("#"+this.id).attr("name","fecha_inicio_licencia"+a)

                 a = a + 1
              });
              $(".fecha_termino_licencia").each(function() {

                  $("#"+this.id).attr("id","fecha_termino_licencia"+b)
                  $("#"+this.id).attr("name","fecha_termino_licencia"+b)


                    b = b + 1
              });
              $(".btnborrarlictab").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrarlictab"+c)
                  $("#"+this.id).attr("name","btnborrarlictab"+c)
                /$("#"+this.id).attr("onclick","BorrarLicenciaTabla("+c+")");

                    c = c + 1
              });
              $(".trlic").each(function() {
                $("#"+this.id).attr("id","trlic"+d)
                $("#"+this.id).attr("name","trlic"+d)
                    d = d + 1
              });
              $(".numero_licencia").each(function() {
                $("#"+this.id).attr("id","numero_licencia"+e)
                $("#"+this.id).attr("name","numero_licencia"+e)
                    e = e + 1
              });

        }
        else if(dato == "licencias2")
        {


             $(".fecha_inicio_licencia").each(function() {

                $("#"+this.id).attr("id","fecha_inicio_licencia"+a)
                $("#"+this.id).attr("name","fecha_inicio_licencia"+a)

                 a = a + 1
              });
              $(".fecha_termino_licencia").each(function() {

                  $("#"+this.id).attr("id","fecha_termino_licencia"+b)
                  $("#"+this.id).attr("name","fecha_termino_licencia"+b)


                    b = b + 1
              });
              $(".btnborrarlictab2").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrarlictab2"+c)
                  $("#"+this.id).attr("name","btnborrarlictab2"+c)
                /$("#"+this.id).attr("onclick","BorrarLicenciaBD("+c+")");

                    c = c + 1
              });
              $(".trlic").each(function() {
                $("#"+this.id).attr("id","trlic"+d)
                $("#"+this.id).attr("name","trlic"+d)
                    d = d + 1
              });
               $(".id_licencias").each(function() {

                $("#"+this.id).attr("id","id_licencias"+e)
                $("#"+this.id).attr("name","id_licencias"+e)

                 e = e + 1
              });
               $(".numero_licencia").each(function() {
                $("#"+this.id).attr("id","numero_licencia"+f)
                $("#"+this.id).attr("name","numero_licencia"+f)
                    f = f + 1
              });

        }
        else if(dato == "vacaciones")
        {


             $(".fecha_inicio_vacaciones").each(function() {

                $("#"+this.id).attr("id","fecha_inicio_vacaciones"+a)
                $("#"+this.id).attr("name","fecha_inicio_vacaciones"+a)

                 a = a + 1
              });
              $(".fecha_termino_vacaciones").each(function() {

                  $("#"+this.id).attr("id","fecha_termino_vacaciones"+b)
                  $("#"+this.id).attr("name","fecha_termino_vacaciones"+b)


                    b = b + 1
              });
              $(".btnborrarvactab").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrarvactab"+c)
                  $("#"+this.id).attr("name","btnborrarvactab"+c)
                /$("#"+this.id).attr("onclick","BorrarVacacionesTabla("+c+")");

                    c = c + 1
              });
              $(".trvac").each(function() {
                $("#"+this.id).attr("id","trvac"+d)
                $("#"+this.id).attr("name","trvac"+d)
                    d = d + 1
              });

        }
        else if(dato == "vacaciones2")
        {


             $(".fecha_inicio_vacaciones").each(function() {

                $("#"+this.id).attr("id","fecha_inicio_vacaciones"+a)
                $("#"+this.id).attr("name","fecha_inicio_vacaciones"+a)

                 a = a + 1
              });
              $(".fecha_termino_vacaciones").each(function() {

                  $("#"+this.id).attr("id","fecha_termino_vacaciones"+b)
                  $("#"+this.id).attr("name","fecha_termino_vacaciones"+b)


                    b = b + 1
              });
              $(".btnborrarvactab2").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrarvactab2"+c)
                  $("#"+this.id).attr("name","btnborrarvactab2"+c)
                /$("#"+this.id).attr("onclick","BorrarVacacionesBD("+c+")");

                    c = c + 1
              });
              $(".trvac").each(function() {
                $("#"+this.id).attr("id","trvac"+d)
                $("#"+this.id).attr("name","trvac"+d)
                    d = d + 1
              });
              $(".id_vacaciones").each(function() {

                $("#"+this.id).attr("id","id_vacaciones"+e)
                $("#"+this.id).attr("name","id_vacaciones"+e)

                 e = e + 1
              });

        }
        else if(dato == "ausencias")
        {


             $(".motivo_ausencia").each(function() {

                $("#"+this.id).attr("id","motivo_ausencia"+a)
                $("#"+this.id).attr("name","motivo_ausencia"+a)

                 a = a + 1
              });
              $(".fecha_ausencia").each(function() {

                  $("#"+this.id).attr("id","fecha_ausencia"+b)
                  $("#"+this.id).attr("name","fecha_ausencia"+b)


                    b = b + 1
              });
              $(".btnborrarauctab").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrarauctab"+c)
                  $("#"+this.id).attr("name","btnborrarauctab"+c)
                /$("#"+this.id).attr("onclick","BorrarAusenciasTabla("+c+")");

                    c = c + 1
              });
              $(".trvac").each(function() {
                $("#"+this.id).attr("id","traus"+d)
                $("#"+this.id).attr("name","traus"+d)
                    d = d + 1
              });

        }
         else if(dato == "ausencias2")
        {


             $(".motivo_ausencia").each(function() {

                $("#"+this.id).attr("id","motivo_ausencia"+a)
                $("#"+this.id).attr("name","motivo_ausencia"+a)

                 a = a + 1
              });
              $(".fecha_ausencia").each(function() {

                  $("#"+this.id).attr("id","fecha_ausencia"+b)
                  $("#"+this.id).attr("name","fecha_ausencia"+b)


                    b = b + 1
              });
              $(".btnborrarauctab2").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrarauctab2"+c)
                  $("#"+this.id).attr("name","btnborrarauctab2"+c)
                /$("#"+this.id).attr("onclick","BorrarAusenciasBD("+c+")");

                    c = c + 1
              });
              $(".trvac").each(function() {
                $("#"+this.id).attr("id","traus"+d)
                $("#"+this.id).attr("name","traus"+d)
                    d = d + 1
              });
              $(".id_ausencias").each(function() {

                $("#"+this.id).attr("id","id_ausencias"+e)
                $("#"+this.id).attr("name","id_ausencias"+e)

                 e = e + 1
              });

        }
           else if(dato == "tabla_precios")
        {
             $(".trpre").each(function() {
                $("#"+this.id).attr("id","trpre"+a)
                $("#"+this.id).attr("name","trpre"+a);
                 a = a + 1
              });
              $(".fecha_precio").each(function() {

                  $("#"+this.id).attr("id","fecha_precio"+b)
                  $("#"+this.id).attr("name","fecha_precio"+b)
                    b = b + 1
              });
              $(".precio_cliente").each(function() {
                 // $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","precio_cliente"+c)
                  $("#"+this.id).attr("name","precio_cliente"+c)
                  //$("#"+this.id).attr("onclick","BorrarDocumentoTabla("+c+")");
                    c = c + 1
              });

              $(".eliminarpreciocliente").each(function() {
                $("#"+this.id).off('click');
                $("#"+this.id).attr("id","eliminarpreciocliente"+d)
                $("#"+this.id).attr("name","eliminarpreciocliente"+d)
                $("#"+this.id).attr("onclick","BorrarPrecioCliente("+d+")");
                    d = d + 1
              });
              $(".tipo_precio").each(function() {
                 // $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","tipo_precio"+e)
                  $("#"+this.id).attr("name","tipo_precio"+e)
                  //$("#"+this.id).attr("onclick","BorrarDocumentoTabla("+c+")");

                    e = e + 1
              });

        }
         else if(dato == "tabla_preciosp")
        {
             $(".trpre").each(function() {
                $("#"+this.id).attr("id","trpre"+a)
                $("#"+this.id).attr("name","trpre"+a);
                 a = a + 1
              });
              $(".fecha_precio").each(function() {

                  $("#"+this.id).attr("id","fecha_precio"+b)
                  $("#"+this.id).attr("name","fecha_precio"+b)
                    b = b + 1
              });
              $(".precio_proveedor").each(function() {
                 // $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","precio_proveedor"+c)
                  $("#"+this.id).attr("name","precio_proveedor"+c)
                  //$("#"+this.id).attr("onclick","BorrarDocumentoTabla("+c+")");
                    c = c + 1
              });

              $(".eliminarprecioproveedor").each(function() {
                $("#"+this.id).off('click');
                $("#"+this.id).attr("id","eliminarprecioproveedor"+d)
                $("#"+this.id).attr("name","eliminarprecioproveedor"+d)
                $("#"+this.id).attr("onclick","BorrarPrecioProveedor("+d+")");
                    d = d + 1
              });
              $(".tipo_precio").each(function() {
                 // $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","tipo_precio"+e)
                  $("#"+this.id).attr("name","tipo_precio"+e)
                  //$("#"+this.id).attr("onclick","BorrarDocumentoTabla("+c+")");

                    e = e + 1
              });

        }
         else if(dato == "colaciones")
        {
             $(".colaciones_"+dato2).each(function() {
                $("#"+this.id).attr("id","colaciones_"+dato2+""+a)
                $("#"+this.id).attr("name","colaciones_"+dato2+""+a);
                 a = a + 1
              });
             $(".btncolaciones_"+dato2).each(function() {
                $("#"+this.id).off('click');
                $("#"+this.id).attr("id","btncolaciones_"+dato2+""+b)
                $("#"+this.id).attr("name","btncolaciones_"+dato2+""+b);
                $("#"+this.id).attr("onclick","BorrarColacionTrabajador("+b+","+dato2+")");
                 b = b + 1
              });

             $(".id_colacion_"+dato2).each(function() {
                $("#"+this.id).attr("id","id_colacion_"+dato2+""+c)
                $("#"+this.id).attr("name","id_colacion_"+dato2+""+c);
                 c = c + 1
              });
              $(".div_delete"+dato2).each(function() {
                $("#"+this.id).attr("id","div_delete"+dato2+""+d)
                $("#"+this.id).attr("name","div_delete"+dato2+""+d);
                 d = d + 1
              });
               $(".div_delete2"+dato2).each(function() {
                $("#"+this.id).attr("id","div_delete2"+dato2+""+f)
                $("#"+this.id).attr("name","div_delete2"+dato2+""+f);
                 f = f + 1
              });
              $(".btncolaciones2_"+dato2).each(function() {
                $("#"+this.id).off('click');
                $("#"+this.id).attr("id","btncolaciones2_"+dato2+""+e)
                $("#"+this.id).attr("name","btncolaciones2_"+dato2+""+e);
                $("#"+this.id).attr("onclick","BorrarColacionTrabajador2("+e+","+dato2+")");
                 e = e + 1
              });

            }
             else if(dato == "horas_extras")
        {
             $(".horas_extras_"+dato2).each(function() {
                $("#"+this.id).attr("id","horas_extras_"+dato2+""+a)
                $("#"+this.id).attr("name","horas_extras_"+dato2+""+a);
                 a = a + 1
              });
             $(".btnhoras_extras_"+dato2).each(function() {
                $("#"+this.id).off('click');
                $("#"+this.id).attr("id","btnhoras_extras_"+dato2+""+b)
                $("#"+this.id).attr("name","btnhoras_extras_"+dato2+""+b);
                $("#"+this.id).attr("onclick","BorrarHoraExtraTrabajador("+b+","+dato2+")");
                 b = b + 1
              });
             $(".id_hora_extra_"+dato2).each(function() {
                $("#"+this.id).attr("id","id_hora_extra_"+dato2+""+c)
                $("#"+this.id).attr("name","id_hora_extra_"+dato2+""+c);
                 c = c + 1
              });
              $(".div_deletehe"+dato2).each(function() {
                $("#"+this.id).attr("id","div_deletehe"+dato2+""+d)
                $("#"+this.id).attr("name","div_deletehe"+dato2+""+d);
                 d = d + 1
              });
              $(".div_deletehe2"+dato2).each(function() {
                $("#"+this.id).attr("id","div_deletehe2"+dato2+""+e)
                $("#"+this.id).attr("name","div_deletehe2"+dato2+""+e);
                 e = e + 1
              });
              $(".btnhoras_extras2_"+dato2).each(function() {
                $("#"+this.id).off('click');
                $("#"+this.id).attr("id","btnhoras_extras2_"+dato2+""+f)
                $("#"+this.id).attr("name","btnhoras_extras2_"+dato2+""+f);
                $("#"+this.id).attr("onclick","BorrarHoraExtraTrabajador2("+f+","+dato2+")");
                 f = f + 1
              });
            }
        else if(dato == "Inventario")
        {


             $(".total_pulgadas").each(function() {
                $("#"+this.id).attr("id","total_pulgadas"+a)
                $("#"+this.id).attr("name","total_pulgadas"+a)
                    a = a + 1
              });
              $(".btnborrar").each(function() {
                  $("#"+this.id).off('click');
                  $("#"+this.id).attr("id","btnborrar"+b)
                  $("#"+this.id).attr("name","btnborrar"+b)
                  $("#"+this.id).attr("onclick","BorrarProductoInventario("+b+");");

                    b = b + 1
              });
               $(".tipo_venta").each(function() {
                  $("#"+this.id).off('change');
                  $("#"+this.id).attr("id","tipo_venta"+c)
                  $("#"+this.id).attr("name","tipo_venta"+c)
                  $("#"+this.id).attr("onchange","CalculoPulgadas("+c+")");
                    c = c + 1

              });
               $(".cantidad").each(function() {
                 $("#"+this.id).off('change');
                  $("#"+this.id).attr("id","cantidad"+d)
                  $("#"+this.id).attr("name","cantidad"+d)
                  $("#"+this.id).attr("onchange","CalculoPulgadas("+d+")");
                    d = d + 1

              });
                   $(".nombre").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","nombre"+e)
                  $("#"+this.id).attr("name","nombre"+e)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    e = e + 1

              });
                        $(".codigo").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","codigo"+f)
                  $("#"+this.id).attr("name","codigo"+f)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    f = f + 1

              });
                $(".trs").each(function() {
                  //$("#"+this.id).off('click');
                  $("#"+this.id).attr("id","trs"+g)
                  $("#"+this.id).attr("name","trs"+g)
                  //$("#"+this.id).attr("onclick","BorrarProductoCompra("+c+")");
                    g = g + 1

              });

          }

 $('.mayusculas').blur(function () {
      $(this).val($(this).val().toUpperCase());
  });

$(".letras").keypress(function (key) {

            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú

                )
                return false;
        });
$(".precio").keyup(function () {
                     $(".precio").formatCurrency({
                    region: 'es-ES'
                    , roundToDecimalPlace: -1
                    })

})


$(".numeros").keydown(function (event) {

        if ( event.keyCode == 8 || event.keyCode == 9 || (event.keyCode >= 37 && event.keyCode <= 40)
            || event.keyCode == 188 || event.keyCode == 190 ) {
        } else {
          if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
            event.preventDefault()
          }
      }

})
}

function MoneyChange(id) {
  dinerorecibido = $("#" + id).val() //valor que no esta seteado
  //transformamos el valor no seteado a uno numerico
  dinero = dinerorecibido.replace(",", "")
  dinerofinal = dinero.replace("$", "")
  dineroseteado = dinerofinal.replace(",", "")
  return dineroseteado
}

function MoneyChangeText(id) {
  dinerorecibido = $("#" + id).text() //valor que no esta seteado
  //transformamos el valor no seteado a uno numerico
  dinero = dinerorecibido.replace(",", "")
  dinerofinal = dinero.replace("$", "")
  dineroseteado = dinerofinal.replace(",", "")
  return dineroseteado
}

function MoneyChangeText2(id) {
  dinerorecibido = $("." + id).text() //valor que no esta seteado
  //transformamos el valor no seteado a uno numerico
  dinero = dinerorecibido.replace(",", "")
  dinerofinal = dinero.replace("$", "")
  dineroseteado = dinerofinal.replace(",", "")
  return dineroseteado
}

function MoneyChangeClean(dinerorecibido) {
  //transformamos el valor no seteado a uno numerico
  dinero = dinerorecibido.replace(",", "")
  dinerofinal = dinero.replace("$", "")
  dineroseteado = dinerofinal.replace(",", "")
  return dineroseteado
}
function nacionalidad(id)
{
   $.ajax({
           type: "GET",
           url: "nacionalidad",
        success: function(response)
           {
               var datos =  $.parseJSON(response)
              $("#"+id).empty()
                  $("#"+id).append("<option value=''>SELECCIONE UNA OPCION</option>")

                                         var Tablas2 = ""


                                         $.each(datos, function()
                                         {

                                          Tablas2+="<option value='"+this.GENTILICIO_NAC+"'>"+this.GENTILICIO_NAC+"</option>"

                                         })
                                         $("#"+id).append(Tablas2)
                                          $("#"+id).select2({
                                            placeholder: "SELECCIONE UNA NACIONALIDAD ",
                                            allowClear: true,
                                            width : "100%"

                                        });
                                          $("#"+id).select2("destroy");
                                            $("#"+id).select2({
                                            placeholder: "SELECCIONE UNA NACIONALIDAD ",
                                            allowClear: true,
                                            width : "100%"

                                        });
             }
        })
}
function afp(id)
{
   $.ajax({
           type: "GET",
           url: "afp",
        success: function(response)
           {
               var datos =  $.parseJSON(response)
               $("#"+id).empty()
                   $("#"+id).append("<option value=''>SELECCIONE UNA OPCION</option>")
                                         var Tablas2 = ""


                                         $.each(datos, function()
                                         {

                                           Tablas2+="<option value='"+this.id+"'>"+this.nombre+"</option>"
                                         })
                                         $("#"+id).append(Tablas2)
/*
                                         $("#"+id).select2({
                                            placeholder: "SELECCIONE UNA AFP ",
                                            allowClear: true,
                                            width : "100%"

                                        });
                                         $("#"+id).select2("destroy");
                                          $("#"+id).select2({
                                            placeholder: "SELECCIONE UNA AFP ",
                                            allowClear: true,
                                            width : "100%"

                                        });*/
             }
        })
}
function isapres(id)
{
   $.ajax({
           type: "GET",
           url: "isapres",
        success: function(response)
           {
               var datos =  $.parseJSON(response)
               $("#"+id).empty()
                   $("#"+id).append("<option value=''>SELECCIONE UNA OPCION</option>")
                                         var Tablas2 = ""


                                         $.each(datos, function()
                                         {

                                           Tablas2+="<option value='"+this.id+"'>"+this.nombre+"</option>"
                                         })
                                         $("#"+id).append(Tablas2)

                                        /* $("#"+id).select2({
                                            placeholder: "SELECCIONE UNA ISAPRE ",
                                            allowClear: true,
                                            width : "100%"

                                        });
                                         $("#"+id).select2("destroy");
                                          $("#"+id).select2({
                                            placeholder: "SELECCIONE UNA ISAPRE ",
                                            allowClear: true,
                                            width : "100%"

                                        });*/
             }
        })
}
function fecha_format(date)
{
                                moment.locale('es');
//
var dateTime = moment(date);
// formato de fecha miercoles 1, junio 2016
var full = dateTime.format('dddd D, MMMM YYYY');
return full;
}
function Insumos(input) {
  $.ajax({
    type: "GET",
    url: "tabla_ingredientes",
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {
        MensajeAdvertencia("NO HAY INSUMOS,AGREGUE UNO ANTES DE CONTINUAR")
      } else if (datos.status == 'success') {
        $("#" + input).empty()
        var Tablas2 = "<option value='x' selected='selected'>BUSCAR INGREDIENTES...</option>"
        $("#" + input).append(Tabla)
        $.each(datos.data, function () {
          Tablas2 += "<option value='" + this.id + "'>" + this.nombre + " </option>"
        })
        $("#" + input).append(Tablas2)
        $("#" + input).select2({
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
          placeholder: "SELECCIONE UN INGREDIENTE ",
          allowClear: true,
          width: "100%"
        });
      }
    }
  })
}

function Categorias(input, tipo) {
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
      tipo: tipo
    },
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {
        MensajeAdvertencia("NO HAY CATEGORIAS,AGREGUE UNO ANTES DE CONTINUAR")
      } else if (datos.status == 'success') {
        $("#" + input).empty()
        var Tablas2 = ""
        $("#" + input).append(Tabla)
        $.each(datos.data, function () {
          if (this.estado == 1) {
            Tablas2 += "<option value='" + this.id + "'>" + this.nombre + " </option>"
          }
        })
        $("#" + input).append(Tablas2)
      }
    }
  })
}

function Clientes() {
  $.ajax({
    type: "POST",
    url: "tabla_cliente",
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {
        MensajeAdvertencia("NO HAY CLIENTES,AGREGUE UNO ANTES DE CONTINUAR")
      } else if (datos.status == 'success') {
        $("#clientes").empty()
        var Tablas2 = "<option value=''>SELECCIONE UN CLIENTE</option>"
        $.each(datos.data, function () {
          if (this.es_empresa == 1) {
            nombres = this.nombres + " " + this.apellidos
          } else {
            nombres = this.nombres
          }
          if (this.mostrar == 0) {
            Tablas2 += "<option value='" + this.rut + "'>" + nombres + "</option>"
          }
        })
        $("#clientes").append(Tablas2)
        $("#clientes").val("111111111")
        $("#clientes").select2({
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
          placeholder: "SELECCIONE UN CLIENTE ",
          allowClear: true,
          width: "100%"
        });
      }
    }
  })
}
function AreaEmpresa()
{
    $.ajax({
    type: "GET",
    url: "area_empresa",
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        $("#select_area").empty()
        var opts = "<option value=''>SELECCIONE UNA OPCIÓN</option>"
        $.each(datos.data, function () {
          opts += "<option value='" + this.id + "'>" + this.nombre + "</option>"
        })
        $("#select_area").append(opts)
      }
    }
  });
}
function GuardarPanel() {
  $.ajax({
    type: "POST",
    url: "save_panel",
    data: $("#formdatosempresa").serialize(),
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {
        MensajeAdvertencia("NO HAY CATEGORIAS,AGREGUE UNO ANTES DE CONTINUAR")
      } else if (datos.status == 'success') {
        MensajeExito("DATOS GUARDADOS CORRECTAMENTE")
      }
    }
  })
}
$(document).ready(function () {
  $(".ruts").keyup(function () {
    $(".ruts").Rut({
      on_error: function () {
        $(".ruts").val("")
        $(".ruts").css("border", "1px solid red")
        MensajeError("Rut Incorrecto")
      }
    })
    $(".ruts").css("border", "1px solid #d2d6de")
  })
  $(".numeros").keydown(function (event) {
    if (event.keyCode == 8 || event.keyCode == 9 || (event.keyCode >= 37 && event.keyCode <= 40) || event.keyCode == 188 || event.keyCode == 190) {} else {
      if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
        event.preventDefault()
      }
    }
  })
  $(".limpiar").click(function (event) {
    clase = $('form').attr('id');
    $('#' + clase).find('input:text, input:password,input:hidden, select, textarea').val('');
  });
  $('.mayusculas').blur(function () {
    $(this).val($(this).val().toUpperCase());
  });
  $(".letras").keypress(function (key) {
    if ((key.charCode < 97 || key.charCode > 122) //letras mayusculas
      && (key.charCode < 65 || key.charCode > 90) //letras minusculas
      && (key.charCode != 45) //retroceso
      && (key.charCode != 241) //ñ
      && (key.charCode != 209) //Ñ
      && (key.charCode != 32) //espacio
      && (key.charCode != 225) //á
      && (key.charCode != 233) //é
      && (key.charCode != 237) //í
      && (key.charCode != 243) //ó
      && (key.charCode != 250) //ú
      && (key.charCode != 193) //Á
      && (key.charCode != 201) //É
      && (key.charCode != 205) //Í
      && (key.charCode != 211) //Ó
      && (key.charCode != 218) //Ú
    ) return false;
  });
  // this is the id of the form
  $("#formconectar").submit(function (e) {
    e.preventDefault();
    e.stopPropagation(); // avoid to execute the actual submit of the form.
    $.ajax({
      type: "POST",
      url: "login",
      data: $("#formconectar").serialize(), // serializes the form's elements.
      dataType: 'json',
      success: function (data) {
        if (data.status == 'success') {
          $(location).attr("href", 'Inicio')
        } else if (data.status == 'error') {
          MensajeError(data.message)
        }
      }
    });
  });
})