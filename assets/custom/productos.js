function cambio_tipo(dato)
{
  $("#tipo_add").val(dato)
}
function agregar_tipo()
{
  if($("#tipo_add").val() == 0)
  {

  }
  else  if($("#tipo_add").val() == 1)
  {

  }
  else  if($("#tipo_add").val() == 2)
  {
     var total = parseInt($(".div_ci").length) + 1
    $("#paquetes_ingredientes").append("<div class='overflow-auto col-md-12 alert alert-info div_ci row' id='div_ci' name='div_ci'><div class='col-md-12 '><button class='btn btn-danger dim float-left btneliminar' id='btneliminar' name='btneliminar'><i class='fa fa-trash'></i> ELIMINAR CATEGORIA INGREDIENTE</button></div><input type='hidden' id='cantidad_ingredientes' name='cantidad_ingredientes' class='cantidad_ingredientes' value='0'><div class='row'><div class='form-group col-md-4'> <label>NOMBRE</label> <input type='text' placeholder='Ej: Salsas' class='form-control mayusculas nombre_categoria' id='nombre_categoria' name='nombre_categoria' required=''></div><div class='form-group col-md-2'><p>REPETIBLE</p> <input type='checkbox' id='repetible' name='repetible' class='repetible' switch='none' /> <label class='labelrepetible' id='labelrepetible' name='labelrepetible' for='repetible"+total+"' data-on-label='Si' data-off-label='No'></label></div><div class='form-group col-md-2'><p>OBLIGATORIO</p> <input type='checkbox' id='obligatorio' name='obligatorio' class='obligatorio' switch='none' /> <label for='obligatorio"+total+"' class='labelobligatorio' id='labelobligatorio' name='labelobligatorio' data-on-label='Si' data-off-label='No'></label></div><div class='form-group col-md-2'> <label>MÍNIMO</label> <input type='number' class='form-control numeros minimo' id='minimo' name='minimo' required='' value='0' min='0'></div><div class='form-group col-md-2'> <label>MÁXIMO</label> <input type='number' class='form-control numeros maximo' id='maximo' name='maximo' required='' value='1' min='0'></div><div class='form-group col-md-12 '><div class='row ingredientes_seleccionados' id='ingredientes_seleccionados' name='ingredientes_seleccionados'></div></div><div class='form-group col-md-12'> <label for='ingredientes'>INGREDIENTES</label> <select id='ingredientes' name='ingredientes' class='form-control ingredientes'></select></div></div></div>")
    Insumos('ingredientes' + total)
    ReiniciarIds('ingredientesp')
  }
}
function TablaProductos() {
  $.ajax({
    type: "GET",
    url: "ver_todos_productos",
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {
        // MensajeAdvertencia("NO HAY PRODUCTOS AGREGADOS")
      } else if (datos.status == 'success') {
        var Tablas = ""
        var Num = 1;
         $("#TablaProductos tbody").empty()
        $.each(datos.data, function () {
          Tablas += "<tr id=" + this.id + " ><td>" + Num + "</td><td>" + this.nombre_producto + "</td><td><img src='" + baseurl + "assets/productos/" + this.imagen + "' class='img-responsive img-thumbnail' style='max-width:100px;min-width:100px;max-height:100px;min-height:100px'></td></td><td>" + this.nombre_categoria + "</td><td class='precios'>" + this.precio_venta + "</td><td><button type='button' class='btn btn-info' onclick='EditarProducto("+this.numero_producto+")'><i class='fa fa-edit'></i></button></td></tr>"
          Num++
        })
        $("#TablaProductos").append(Tablas)
        ConvertMoneyText('precios')
        $("#tab_prod").show()
        $("#form_productos").hide()
      }
      if ($.fn.dataTable.isDataTable('#TablaProductos')) {
        var table = $('#TablaProductos').DataTable();
      } else {
        var table = $('#TablaProductos').DataTable({
          paging: true,
          searching: true,
          info: false,
          dom: 'Bfrtip',
          buttons: ['csv', 'excel', 'pdf'],
          "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          }
        });
      }
    }
  });
}
function EditarProducto(producto) {

  $.ajax({
    type: "POST",
    url: "ver_datos_producto",
    data: {numero:producto},
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        $("#tab_prod").hide()
        $("#form_productos").show()
        $("#guardarproducto").hide()
        $("#editarproducto").show()
        //datos
        $("#nombre_producto").val(datos.data.nombre)
$("#precio_venta").val(datos.data.precio_venta)
$("#happy_hour").val(datos.data.es_happy)
if(datos.data.es_happy == '1')
{
    $("#hhour").show()
    $("#hora_inicio").val(datos.data.hora_inicio_hh)
    $("#hora_termino").val(datos.data.hora_termino_hh)
    $("#precio_venta_hh").val(datos.data.precio_venta_hh)
}
else
{
  $("#hhour").hide()
}
$("#categoria").val(datos.data.id_categoria)
$("#codigo_producto").val(datos.data.codigo_producto)
$("#producto_barra").val(datos.data.barra)
$("#informacion").val(datos.data.informacion)
$("#numero_producto").val(datos.data.numero_producto)
ConvertMoney('precio_venta')
ConvertMoney('precio_venta_hh')
var total = parseInt($(".div_ci").length) + 1
 $.each(datos.data2, function () {

$("#categorias_ingredientes").append("<div class='overflow-auto col-md-12 alert alert-info div_ci row' id='div_ci' name='div_ci'><div class='col-md-12 '><input type='hidden' id='id_detalle_producto' name='id_detalle_producto' class='id_detalle_producto' value='"+this.id_detalle_producto+"'><button class='btn btn-danger dim float-left btneliminar' id='btneliminar' name='btneliminar'><i class='fa fa-trash'></i> ELIMINAR CATEGORIA INGREDIENTE</button></div><input type='hidden' id='cantidad_ingredientes' name='cantidad_ingredientes' class='cantidad_ingredientes' value='0'><div class='row'><div class='form-group col-md-4'> <label>NOMBRE</label> <input type='text' placeholder='Ej: Salsas' class='form-control mayusculas nombre_categoria' id='nombre_categoria' name='nombre_categoria' required=''></div><div class='form-group col-md-2'><p>REPETIBLE</p> <input type='checkbox' id='repetible' name='repetible' class='repetible' switch='none' /> <label class='labelrepetible' id='labelrepetible' name='labelrepetible' for='repetible"+this.id_detalle_producto+"' data-on-label='Si' data-off-label='No'></label></div><div class='form-group col-md-2'><p>OBLIGATORIO</p> <input type='checkbox' id='obligatorio' name='obligatorio' class='obligatorio' switch='none' /> <label for='obligatorio"+this.id_detalle_producto+"' class='labelobligatorio' id='labelobligatorio' name='labelobligatorio' data-on-label='Si' data-off-label='No'></label></div><div class='form-group col-md-2'> <label>MÍNIMO</label> <input type='number' class='form-control numeros minimo' id='minimo' name='minimo' required='' value='0' min='0'></div><div class='form-group col-md-2'> <label>MÁXIMO</label> <input type='number' class='form-control numeros maximo' id='maximo' name='maximo' required='' value='1' min='0'></div><div class='form-group col-md-12 '><div class='row ingredientes_seleccionados' id='ingredientes_seleccionados"+this.id_detalle_producto+"' name='ingredientes_seleccionados"+this.id_detalle_producto+"'></div></div><div class='form-group col-md-12'> <label for='ingredientes'>INGREDIENTES</label> <select id='ingredientes' name='ingredientes' class='form-control ingredientes'></select></div></div></div>")
var dato = this.id_detalle_producto



$.each(datos.data3, function () {
  if(this.numero_detalle_producto == dato)
  {
       $("#ingredientes_seleccionados" + dato).append("<div class='col-md-4 div_eliminar" + dato + "' id='div_eliminar" + dato + "' name='div_eliminar" + dato + "' style='height: 45px'><input type='hidden' id='id_ingrediente" + dato + "' name='id_ingrediente" + dato + "' class='id_ingrediente" + dato + "' value='"+this.id_detalle_producto_ingrediente+"'><div class='input-group '> <input type='text' class='form-control nombre_ingrediente" + dato + "' value='"+this.nombre_ingrediente+"' id='nombre_ingrediente' name='nombre_ingrediente' readonly=''> <input type='text' class='form-control numeros precio valor_ingrediente" + dato + "' placeholder='$' id='valor_ingrediente" + dato + "' name='valor_ingrediente" + dato + "' value='"+this.valor+"'><div class='input-group-append'> <button class='btn btn-danger btn_eliminar_ingrediente" + dato + "' id='btn_eliminar_ingrediente" + dato + "' name='btn_eliminar_ingrediente' type='button'><i class='fa fa-trash'></i></button></div></div></div>")
       $("#cantidad_ingredientes" + dato).val($(".id_ingrediente" + dato).length)

   ReiniciarIds('detalle_ingredientes', dato)
   ConvertMoneyText('precio')
  }



 })


 Insumos('ingredientes' + this.id_detalle_producto)

 })
ReiniciarIds('ingredientesp')
      }
    }
  })
}
function CrearProducto() {
  $("#cant_insumos").val($(".div_ci").length)
  $.ajax({
    type: "POST",
    url: "crear_producto",
    data: $("#form_productos").serialize(),
    success: function (response) {
      var datos = $.parseJSON(response)
      if (datos.status == "error") {} else if (datos.status == 'success') {
        MensajeExito("PRODUCTO CREADO CORRECTAMENTE")
        $("#form_productos").find('input').val("")
        TablaProductos()
        Insumos('ingredientes')
        $("#tab_prod").show()
        $("#form_productos").hide()
        Categorias('categoria', 0)
        $("#tablaproducto").hide()
      }
    }
  })
}

function EliminarDIngrediente(dato, dato2) {
  $("#div_eliminar" + dato + "_" + dato2).remove()
  ReiniciarIds('detalle_ingredientes', dato2)
}
function EliminarDT(dato) {
  $("#div_ci" + dato).remove()
   ReiniciarIds('ingredientesp')
    ReiniciarIds('detalle_ingredientes', dato)
}
function add_ingredientes(dato) {
  $("#ingredientes_seleccionados" + dato).append("<div class='col-md-4 div_eliminar" + dato + "' id='div_eliminar" + dato + "' name='div_eliminar" + dato + "' style='height: 45px'><input type='hidden' id='id_ingrediente" + dato + "' name='id_ingrediente" + dato + "' class='id_ingrediente" + dato + "' value='" + $("#ingredientes" + dato).find('option:selected').val() + "'><div class='input-group '> <input type='text' class='form-control nombre_ingrediente" + dato + "' value='" + $("#ingredientes" + dato).find('option:selected').text() + "' id='nombre_ingrediente' name='nombre_ingrediente' readonly=''> <input type='text' class='form-control numeros precio valor_ingrediente" + dato + "' placeholder='$' id='valor_ingrediente" + dato + "' name='valor_ingrediente" + dato + "'><div class='input-group-append'> <button class='btn btn-danger btn_eliminar_ingrediente" + dato + "' id='btn_eliminar_ingrediente" + dato + "' name='btn_eliminar_ingrediente' type='button'><i class='fa fa-trash'></i></button></div></div></div>")
  ReiniciarIds('detalle_ingredientes', dato)
  $("#cantidad_ingredientes" + dato).val($(".id_ingrediente" + dato).length)
}
$(document).ready(function () {

  TablaProductos()
  Insumos('ingredientes')
  $("#tab_prod").show()
  $("#form_productos").hide()
  Categorias('categoria', 0)
  $("#tablaproducto").hide()

  $('#nuevoproducto').on('click', function () {
    $("#guardarproducto").off('click');
    $("#form_productos").attr("id", "form_productos")
    $("#guardarproducto").attr("onclick", " CrearProducto()")
    $("#tab_prod").hide()
    $("#form_productos").show()
    $("#tablaproducto").show()
    $("#nuevoproducto").hide()
    $('input').attr('autocomplete', 'off')
    $('.precios').keyup(function () {
      $(".precios").formatCurrency({
        region: 'es-CL',
        roundToDecimalPlace: -1
      })
    });
    $("#guardarproducto").show()
    $("#editarproducto").hide()
  })
  $('#tablaproducto').on('click', function () {
    $("#tab_prod").show()
    $("#form_productos").hide()
    $("#nuevoproducto").show()
    $("#tablaproducto").hide()
  })
  $('#nueva_categoria_ingrediente').on('click', function () {
    var total = parseInt($(".div_ci").length) + 1
    $("#categorias_ingredientes").append("<div class='overflow-auto col-md-12 alert alert-info div_ci row' id='div_ci' name='div_ci'><div class='col-md-12 '><button class='btn btn-danger dim float-left btneliminar' id='btneliminar' name='btneliminar'><i class='fa fa-trash'></i> ELIMINAR CATEGORIA INGREDIENTE</button></div><input type='hidden' id='cantidad_ingredientes' name='cantidad_ingredientes' class='cantidad_ingredientes' value='0'><div class='row'><div class='form-group col-md-4'> <label>NOMBRE</label> <input type='text' placeholder='Ej: Salsas' class='form-control mayusculas nombre_categoria' id='nombre_categoria' name='nombre_categoria' required=''></div><div class='form-group col-md-2'><p>REPETIBLE</p> <input type='checkbox' id='repetible' name='repetible' class='repetible' switch='none' /> <label class='labelrepetible' id='labelrepetible' name='labelrepetible' for='repetible"+total+"' data-on-label='Si' data-off-label='No'></label></div><div class='form-group col-md-2'><p>OBLIGATORIO</p> <input type='checkbox' id='obligatorio' name='obligatorio' class='obligatorio' switch='none' /> <label for='obligatorio"+total+"' class='labelobligatorio' id='labelobligatorio' name='labelobligatorio' data-on-label='Si' data-off-label='No'></label></div><div class='form-group col-md-2'> <label>MÍNIMO</label> <input type='number' class='form-control numeros minimo' id='minimo' name='minimo' required='' value='0' min='0'></div><div class='form-group col-md-2'> <label>MÁXIMO</label> <input type='number' class='form-control numeros maximo' id='maximo' name='maximo' required='' value='1' min='0'></div><div class='form-group col-md-12 '><div class='row ingredientes_seleccionados' id='ingredientes_seleccionados' name='ingredientes_seleccionados'></div></div><div class='form-group col-md-12'> <label for='ingredientes'>INGREDIENTES</label> <select id='ingredientes' name='ingredientes' class='form-control ingredientes'></select></div></div></div>")
    Insumos('ingredientes' + total)
    ReiniciarIds('ingredientesp')
  })
  //VERIFICAMOS SI EL CODIGO DEL PRODUCTO EXISTE O NO EN LA BD
  $('#codigo_producto').on('change', function () {
    $.ajax({
      type: "POST",
      url: "verificar_codigo",
      data: {
        codigo: $(this).val()
      },
      success: function (response) {
        var datos = $.parseJSON(response)
        if (datos.status == "error") {} else if (datos.status == 'success') {
          if (datos.data == true) {
            MensajeAdvertencia("EL CODIGO INGRESADO YA ESTA EN USO")
            $("#codigo_producto").val("")
          }
        }
      }
    })
  })
  //subimos la imagen del producto al servidor
  $('#imagen_producto').on('change', function () {
    var file_data = $('#imagen_producto').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
      url: "imagen_producto", // point to server-side controller method
      dataType: 'text', // what to expect back from the server
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function (response) {
        $("#resultado_imagen").empty()
        $('#resultado_imagen').html(response); // display success response from the server
      },
      error: function (response) {
        $("#resultado_imagen").empty()
        $('#resultado_imagen').html(response); // display error response from the server
      }
    });
  });
  $('#happy_hour').on('change', function () {
    if ($("#happy_hour").val() == 0) {
      $(".hhour").hide()
    } else {
      $(".hhour").show()
    }
  })
})