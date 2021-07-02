function ViewRemuneracion()
{
TablaTrabajadores()
$("#generarrem").removeAttr('disabled')
}
function GenerarRemuneracion()
{
	$("#cant_trab").val($("#tabla_trabajadores tbody tr").length)
 $.ajax({
           type: "POST",
           url: "crearremuneracion",
           data: $("#form_remuneraciones").serialize(), // serializes the form's elements.
          success: function(response)
                                     {
                                         var datos =  $.parseJSON(response)
                                         if (datos.status == "error")
                                         {
                                            MensajeError(datos.message)
                                          }
                                          else if(datos.status =='success')
                                          {
                  MensajeExito('Remuneraciones Ingresadas Correctamente')
                  var table = $('#tabla_trabajadores').DataTable();
                  table.destroy()
                 $("#tabla_trabajadores tbody tr").remove()
                 $("#generarrem").attr('disabled',true)
                 $("#mes").val("")
                }
           }

         });
     return false;
}
function TablaTrabajadores()
{

    $.ajax({
           type: "GET",
           url: "tabla_trabajador",
            success: function(response)
           {
               var datos =  $.parseJSON(response)
               if (datos.status == "error")
               {
                  MensajeError(datos.message)
                }
                else if(datos.status =='success')
                {

                  var Num =1;
                  $("#tabla_trabajadores tbody tr").remove()


                   $.each(datos.data, function() {
                     if(this.mostrar === '0')
                    {

                   var	Tablas="<tr  id='tr"+this.id+"' name='tr"+this.id+"' class='trs'><input type='hidden' class='form-control rut_trabajador numeros' id='rut_trabajador"+Num+"' name='rut_trabajador"+Num+"' value='"+this.rut+"' /><td>"+Num+"</td><td>"+this.nombres +" "+this.apellidos+"</td><td><input type='text' class='form-control dias_trabajados numeros' id='dias_trabajados"+Num+"' name='dias_trabajados"+Num+"' value='30' /></td><td><input type='text' class='form-control dias_licencia numeros' id='dias_licencia"+Num+"' name='dias_licencia"+Num+"' value='0' /></td><td><input type='text' class='form-control dias_vacaciones numeros' id='dias_vacaciones"+Num+"' name='dias_vacaciones"+Num+"' value='0' /></td><td >-</td></tr>"
                   		$("#tabla_trabajadores").append(Tablas)
                        Num = Num + 1
                    }


                        })


                                        if ( $.fn.dataTable.isDataTable('#tabla_trabajadores') )
         {
            var table = $('#tabla_trabajadores').DataTable();
          }
          else
          {
             var table = $('#tabla_trabajadores').DataTable({
                     paging: true,
                     searching: true,
                      info: false,

                   dom: '<"html5buttons"B>lTfgitp',
                   buttons: [
                                          {extend: 'pdf', title: 'REMUNERACIONES TRABAJADORES - ASERRADERO SANTA ANA'},
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
                }

           }
         });

}

$(document).ready(function() {

 $(".precios").formatCurrency({
                    region: 'es-CL'
                    , roundToDecimalPlace: -1
                    })

})