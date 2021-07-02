function TablaPaquetesIngredientes()
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
                   var table = $("#TablaPaquetesIngredientes").DataTable();
                 table.destroy();
                  $("#TablaPaquetesIngredientes tbody tr").remove()

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
                   $("#TablaPaquetesIngredientes").append(Tablas)
                }
                  if ( $.fn.dataTable.isDataTable('#TablaPaquetesIngredientes') ) {
    var table = $('#TablaPaquetesIngredientes').DataTable();

}
else {
   var table = $('#TablaPaquetesIngredientes').DataTable({
           paging: true,
           searching: true,
            info: false,

         dom: '<"html5buttons"B>lTfgitp',
         buttons: [
                                {extend: 'pdf', title: 'TORI SUSHI - INSUMOS'},
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


function IngresarPaqueteIngrediente()
{
$("#cant_paqig").val($("#TablaImpuestos tbody tr").length)
    $.ajax({
           type: "POST",
           url: "crear_paquetes_ingredientes",
           data: $("#form_paquetes_ingredientes").serialize(),
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
$(document).ready(function() {

TablaPaquetesIngredientes()

});