
function IngresoCaja()
{

      if($("#monto_apertura").val() == "")
      {
        MensajeError("Debes ingresar un monto de apertura")
      }
      else{
                                $.ajax({
                                     type: "POST",
                                     url: "caja_inicio",
                                     data:$("#formingresocaja").serialize() ,
                                     success: function(response)
                                     {
                                         var datos =  $.parseJSON(response)
                                         if (datos.status == "error")
                                         {
                                            MensajeError(datos.message)
                                          }
                                          else if(datos.status =='success')
                                          {
                                            MensajeExito('Se Inicio Correctamente La Caja')
                                                          $("#inicio_caja").hide()
                                                          $("#fin_caja").show()
                                                          $("#monto_apertura").val("")
                                                          $("#monto_cierre").val("")
                                                          // TablaCaja()
                                                          DetalleCaja()
                                          }
                                     }

                                   });

      }

}
function VerInformeCaja()
  {
    dato = Math.floor(Date.now() /1000);
   url=  'ResumenCaja?fecha='+dato
  window.open(url, '_blank');
  }
function CierreCaja()
{

                                $.ajax({
                                     type: "POST",
                                     url: "caja_fin",
                                     data:$("#formcierrecaja").serialize() ,
                                   success: function(response)
                                   {
                                       var datos =  $.parseJSON(response)
                                       if (datos.status == "error")
                                       {
                                          MensajeError(datos.message)
                                        }
                                        else if(datos.status =='success')
                                        {
                                            MensajeExito('Se Cerro Correctamente La Caja')
                                            $("#inicio_caja").show()
                                            $("#fin_caja").hide()
                                            $("#monto_apertura").val("")
                                            $("#monto_cierre").val("")
                                            DetalleCaja()
                                            //TablaCaja()
                                          }
                                     }

                                   });


}

function DetalleCaja()
{

   $.ajax({
           type: "POST",
           url: "detalle_caja",
          success: function(response)
           {
               var datos =  $.parseJSON(response)

               var i = 1
               $("#carga").hide()
              $(".row").show()

              if(datos.data != '0' )
              {

                $("#TablaCaja tbody tr").remove()
               $.each(datos.data, function() {
                if(this.fecha_apertura != undefined)
                {
                   if(i <= '10')
                  {

                           if(this.estado === '0')
                          {
                            var estado = "<b style='color:green'>SIN CERRAR</b>"
                          }
                          else
                          {
                            var estado = "<b style='color:red'>CERRADO</b>"
                          }
                          if(this.fecha_cierre == "00-00-0000")
                          {
                            var fecha_cierre ="-"
                          }
                          else
                          {
                            var fecha_cierre = this.fecha_cierre
                          }
                          var tabla="<tr><td>"+i+"</td><td>"+estado+"</td><td>"+this.fecha_apertura+"</td><td>"+fecha_cierre+"</td><td class='precio'>"+this.monto_inicial+"</td><td class='precio'>"+this.monto_entrega+"</td ><td class='precio'>"+parseInt(this.contado)+"</td><td class='precio'>"+parseInt(this.credito)+"</td><td class='precio'>"+parseInt(this.debito)+"</td><td class='precio'>"+parseInt(this.cheque)+"</td><td class='precio'>"+parseInt(this.transferencia)+"</td><td class='precio'>"+parseInt(this.pagos_cliente)+"</td><td class='precio'>"+parseInt(this.pagos_proveedor)+"</td></tr>"
                          $("#TablaCaja tbody").append(tabla)
                         ConvertMoneyText('precio')
                          i++
                          }
                }


                })
              }


                if ( $.fn.dataTable.isDataTable('#TablaCaja') ) {
                    var table = $('#TablaCaja').DataTable();

                }
                else {
                   var table = $('#TablaCaja').DataTable({
                           paging: true,
                           searching: true,
                            info: false,

                         dom: '<"html5buttons"B>lTfgitp',
                         buttons: [
                                                {extend: 'pdf', title: 'CAAJA -MADERAS DON JUAN', orientation: 'landscape',pageSize: 'LEGAL'},
                                                {extend: 'excel', title: 'CAAJA -MADERAS DON JUAN'},
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
         });

}


$(document).ready(function() {
DetalleCaja()

    $.ajax({
           type: "GET",
           url: "find_caja",
          success: function(response)
           {
               var datos =  $.parseJSON(response)
               if (datos.status == "error")
               {
                 //MensajeError(datos.message)
                   $("#monto_apertura").attr('required','true')
                    $("#monto_cierre").removeAttr('required')
                    $("#inicio_caja").show()
                    $("#fin_caja").hide()
                }
                else if(datos.status =='success')
                {
                   if(datos.data.estado == 1 )
                   {
                    $("#monto_apertura").attr('required','true')
                    $("#monto_cierre").removeAttr('required')
                    $("#inicio_caja").show()
                    $("#fin_caja").hide()
                   }
                   else
                   {
                    $("#inicio_caja").hide()
                    $("#fin_caja").show()
                     $("#monto_cierre").attr('required','true')
                     $("#monto_apertura").removeAttr('required')
                   }

                }

           }

         });
  //TablaCaja()

})