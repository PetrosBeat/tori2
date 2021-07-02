function TablaIngredientes()
{

    $.ajax({
           type: "GET",
           url: "tabla_ingredientes",
           success: function(response)
           {
               var datos =  $.parseJSON(response)
               if (datos.status == "error")
               {
                  MensajeError(datos.message)
                }
                else if(datos.status =='success')
                {
                  var Tablas = ""
                  var Num =1;
                   var table = $("#TablaIngredientes").DataTable();
                 table.destroy();
                  $("#TablaIngredientes tbody tr").remove()

                   $.each(datos.data, function() {
                      if(this.mostrar == 1)
                            {
                              var boton = "<span   class='btn btn-danger dim' onclick='ActivarIngrediente("+this.id+",0)'>OCULTAR</span>"
                               var style=""
                            }
                            else
                            {
                              var boton = "<span   class='btn btn-primary dim' onclick='ActivarIngrediente("+this.id+",1)'>MOSTRAR</span>"
                                var style = "style='color:red'"
                            }
                            if(this.stock > this.stock_minimo)
                            {
                              var estado = "<button class='label label-primary'><h4>En Stock</h4></button>"
                            }
                            else if(this.stock <= this.stock_minimo)
                            {
                              var estado = "<button class='label label-warning'><h4>Stock Crítico</h4></button>"
                            }
                            else if(this.stock == 0)
                            {
                              var estado = "<button class='label label-danger'><h4>Sin Stock</h4></button>"
                            }

                        Tablas+="<tr "+style+"><td>"+Num+"</td><td>"+this.nombre+" ("+this.abreviatura+")</td><td>"+this.stock+"</td><td>"+estado+"</td><td><button type='button' class='btn btn-info dim' onclick='CargarDatosInsumo("+this.id+",0)' ><i class='fa fa-eye'> </i> </button></td><td><button type='button' class='btn btn-info dim' onclick='CargarDatosInsumo("+this.id+",1)' ><i class='fa fa-edit'> </i> </button></td><td>"+boton+"</td></tr>"
                        Num++
                        })
                   $("#TablaIngredientes").append(Tablas)
                }
                  if ( $.fn.dataTable.isDataTable('#TablaIngredientes') ) {
    var table = $('#TablaIngredientes').DataTable();

}
else {
   var table = $('#TablaIngredientes').DataTable({
           paging: true,
           searching: true,
            info: false,

         dom: '<"html5buttons"B>lTfgitp',
         buttons: [
                                {extend: 'pdf', title: 'TORI SUSHI - INGREDIENTES '},
                            ],
                    "language":
    {
     "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
    }
              });


}

                 $("#carga").hide()
                 $("#tab_ingrediente").show()
           }
         });

}
function ActivarIngrediente(id,dato)
{

                                $.ajax({
                                     type: "POST",
                                     url: "ocultaringrediente",
                                     data: {id:id,dato:dato},
                                      success: function(response)
                                     {
                                         var datos =  $.parseJSON(response)
                                         if (datos.status == "error")
                                         {
                                            MensajeError(datos.message)
                                          }
                                          else if(datos.status =='success')
                                          {
                                            if(dato == 0)
                                            {
                                               MensajeExito("Se mostrara el cliente para el sistema ")

                                            }
                                            else
                                            {
                                             MensajeExito("Se oculto el cliente del sistema ")
                                            }
                                            TablaIngredientes()
                                          }
                                     }

                                   });
}

function IngresarIngrediente()
{
$("#cant_imp").val($("#TablaImpuestos tbody tr").length)
    $.ajax({
           type: "POST",
           url: "createingrediente",
           data: $("#formagregaringrediente").serialize(),
            success: function(response)
             {
               var datos =  $.parseJSON(response)
                if (datos.status == "error")
                {
                   MensajeError(datos.message)
                 }
                 else if(datos.status =='success')
                 {
                      MensajeExito('Insumo Ingresado Correctamente')
                      $("#Ingredientes").modal('hide')
                      $("#formagregaringrediente").find("input").val("")
                      $("#formagregaringrediente").find("select").val("x")
                      TablaIngredientes()
                      Cantidad= 1
                      contact = 1
                      $("medida_equivalencia").val("0");
                      $("#medida_igrediente").val("x");

                }
           }

         });
     return false;
}
function EditarIngrediente()
{
$("#cant_imp").val($("#TablaImpuestos tbody tr").length)
    $.ajax({
           type: "POST",
           url: "editingrediente",
           data: $("#formeditaringrediente").serialize(),
            success: function(response)
             {
               var datos =  $.parseJSON(response)
                if (datos.status == "error")
                {
                   MensajeError(datos.message)
                 }
                 else if(datos.status =='success')
                 {
                      MensajeExito('Insumo Editado Correctamente')
                      $("#Ingredientes").modal('hide')
                       $("#formagregaringrediente").find("select").val("x")
                      $("#formagregaringrediente").find("input").val("")
                      TablaIngredientes()
                      Cantidad= 1
                      contact = 1

                }
           }

         });
     return false;
}
function CargarDatosInsumo(dato,dato2)
{
                   $.ajax({
                    url:  'datosingrediente',
                    type: 'POST',
                    data:{id:dato},
                    success: function(result)
                    {
                            var obj = $.parseJSON(result)
                            if(dato2 == 0)
                            {
                              $('.form_ingredientes ').find('input, textarea, button, select').attr('disabled','disabled');
                              $(".modal-title").text("DATOS DEL INSUMO "+obj.data.nombre)
                            }
                            else
                            {

                               $('.form_ingredientes ').find('input, textarea, button, select').removeAttr('disabled');
                               $('.form_ingredientes ').find('input, textarea, button, select').val('');
                               $(".modal-title").text("EDITAR EL INSUMO "+obj.data.nombre)
                               $(".font-bold").text("RECUERDE LLENAR TODOS LOS CAMPOS REQUERIDOS")
                               $(".form_ingredientes").attr("id","formeditaringrediente")
                               $(".form_ingredientes").attr("onsubmit","return EditarIngrediente()")

                            }

                            $("#id_ingrediente").val(obj.data.id)
                              $.ajax({
                                   url: "impuesto_producto",
                                   type: "POST",
                                   data: {inusmo:obj.data.id},
                                 success: function(response)
                                 {
                                      var datos = $.parseJSON(response)
                                      $("#impuesto_div").empty()
                                      $("#TablaImpuestos tbody").empty()
                                      if(datos.status == "error")
                                      {
                                        $("#TablaImpuestos").hide()
                                        $("#impuesto_div").append("<h3>EL PRODUCTO NO TIENE IMPUESTOS ASOCIADOS</h3>")
                                        $("#impuesto_div").append("<button type='button' id='btnimpadd' name='btnimpadd' class='btn btn-primary dim btn-block' onclick='add_impuesto()' ><i class='fa fa-plus'></i> ASOCIAR IMPUESTO</button>")
                                      }
                                      else
                                      {
                                        $("#impuesto_div").append("<button type='button' id='btnimpadd' name='btnimpadd' class='btn btn-primary dim btn-block' onclick='add_impuesto()' ><i class='fa fa-plus'></i> ASOCIAR IMPUESTO</button>")
                                         $("#TablaImpuestos").show()
                                           $.each(datos.data, function()
                                         {

                                            $("#TablaImpuestos tbody").append("<tr id='tr_imp' class='tr_imp' name='tr_imp'><input type='hidden' id='dsds' name='sda' value='"+this.id+"' class='id_impbd' /><td >"+this.nombre+" "+this.porcentaje+"%</td><td><button type='button' class='btn btn-danger dim btnimp_db ' onclick='delete_impuesto()' id='btnimp_db' name='btnimp_db'><i class='fa fa-trash'></i></button></td></tr>")
                                         })
                                           ReiniciarIds('impuestos2')

                                      }
                                 }

                               })
                            $("#nombre_ingrediente").val(obj.data.nombre)
                             $("#medida_equivalencia").val(obj.data.medida_equivalencia)
                            // $("#delivery").val(obj.data.delivery)
                            $("#cantidad_ingrediente").val(obj.data.stock)
                            $("#medida_igrediente").val(obj.data.medida)
                             $("#porcentaje_merma").val(obj.data.porcentaje_merma)
                            $("#cantidad_ingrediente").val(obj.data.stock)
                            $("#stock_minimo").val(obj.data.stock_minimo)
                             $("#cantida_unidad_compra").val(obj.data.cantida_unidad_compra)
                              $("#abreviatura").val(obj.data.abreviatura)
                             /* $.ajax({
                                   type: "GET",
                                   url: "tabla_categoria",
                                success: function(response)
                                   {
                                       var datos =  $.parseJSON(response)
                                       if (datos.status == "error")
                                       {
                                          MensajeAdvertencia("NO HAY CATEGORIAS,AGREGUE UNO ANTES DE CONTINUAR")
                                        }
                                        else if(datos.status =='success')
                                        {
                                          $("#select_categoria").empty()
                                                                 var Tablas2 = ""


                                                                 $.each(datos.data, function()
                                                                 {

                                                                  if(this.tipo == 3 && this.estado == 1)
                                                                  {

                                                                    if(obj.data.id_categoria == this.id)
                                                                    {
                                                                      Tablas2+="<option value='"+this.id+"' selected='selected'>"+this.nombre+"</option>"
                                                                    }
                                                                    else
                                                                    {
                                                                      Tablas2+="<option value='"+this.id+"'>"+this.nombre+"</option>"
                                                                    }

                                                                  }
                                                                 })
                                                                 $("#select_categoria").append(Tablas2)


                                        }
                                     }
                                })*/
//$("#select_categoria").val(obj.data.id_categoria)

                            $("#para_venta").val(obj.data.para_venta)
                                      if(obj.data.para_venta == 0)
                                      {
                                        $(".venta_ingrediente").show()
                                        $("#precio_venta_ingrediente").val(obj.data.precio_venta)
                                        $("#abreviatura").val(obj.data.abreviatura)
                                        $("#gramo_ingrediente_venta").val(obj.data.gramos_venta)
                                        $("#precio_venta_ingrediente_delivery").val(obj.data.precio_venta_ingrediente_delivery)
                                        $("#gramo_ingrediente_venta_delivery").val(obj.data.gramo_ingrediente_venta_delivery)


                                        $('#lugar_venta  option[value="' + obj.data.lugar_venta + '"]').prop('selected', true);
                                      }
                                      else
                                      {
                                         $(".venta_ingrediente").hide()
                                         $("#precio_venta_ingrediente").val("$0")
                                         $("#gramo_ingrediente_venta").val(0)
                                      }

                            $("#precio_compra").val(obj.data.precio)
                            ConvertMoney('precio_compra')
                             ConvertMoney('precio_venta_ingrediente')
                               ConvertMoney('precio_venta_ingrediente_delivery')
                            $("#Ingredientes").modal("show")

                    }
                });
}

$(document).ready(function() {

TablaIngredientes()
$("#btningrediente").click(function(e) {
 $('#medida_equivalencia option[value=0]').attr('selected','selected');
  $(".modal-title").text("CREAR UN INSUMO")
  $(".font-bold").text("RECUERDE LLENAR TODOS LOS CAMPOS REQUERIDOS")
   $(".form_ingredientes").attr("id","formagregaringrediente")
   $(".form_ingredientes").attr("onsubmit","return IngresarIngrediente()")
               $("#precio_venta_ingrediente").val("$0")
                                         $("#gramo_ingrediente_venta").val(0)
                                          $('.form_ingredientes #cantida_unidad_compra,#cantidad_ingrediente,#stock_minimo,#precio_compra').find('input:text').val('0');
$('.form_ingredientes ').find('input, textarea, button, select').val('');
    $("#Ingredientes").modal('show')

    $( "#medida_igrediente" ).val("x");
     $(".venta_ingrediente").hide()



    CategoriasIngredientes()

     e.preventDefault();
 e.stopPropagation(); // avoid to execute the actual submit of the form.
});
$("#para_venta").change(function(e) {
  $("#precio_venta_ingrediente").val("")
   $("#gramo_ingrediente_venta").val("")

    if(this.value == 0)
    {
      $(".venta_ingrediente").show()
    }
    else
    {
      $("#precio_venta_ingrediente").val("$0")
      $("#gramo_ingrediente_venta").val(0)
       $(".venta_ingrediente").hide()
    }
});
$("medida_equivalencia").val("0");

});