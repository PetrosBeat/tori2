function TablaUsuarios()
{

    $.ajax({
           type: "GET",
           url: "tabla_usuario",
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
                   var table = $("#TablaUsuarios").DataTable();
                 table.destroy();
                  $("#TablaUsuarios tbody tr").remove()
                   $.each(datos.data, function() {
                    if(this.rango == 0)
                    {
                      var rango = 'ADMINISTRADOR'
                    }
                    else if(this.rango == 1)
                    {
                      var rango = 'VENDEDOR'
                    }
                    else if(this.rango == 2)
                    {
                      var rango ='CAJERO'
                    }

                     var boton = "<span  class='btn btn-danger ' onclick='OcultaUsuario("+this.id+",2)'>ELIMINAR </span>"
                       if(this.mostrar != 2)
                       {
                         Tablas+="<tr id="+this.id+"><td>"+Num+"</td><td>"+this.nombres+" "+this.apellidos+"</td><td>"+rango+"</td><td><button type='button' class='btn btn-info dim editar_usuario' onclick='DatosUsuario("+this.id+")' ><i class='fa fa-edit'> </i> </button></td><td><button type='button' class='btn btn-warning dim editar_clave_usuario' onclick='DatosUsuarioClave("+this.id+")' ><i class='fa fa-edit'> </i> </button></td><td >"+boton+"</td></tr>"
                        Num++
                       }
                        })

                   $("#TablaUsuarios").append(Tablas)
                }
                $("#carga").hide()
                 $(".cambio_clave").hide()
                     $("#data_user").hide()
                     $("#tabla_user").show()
                     $("#btnguardar").off('click');
  $("#btnguardar").attr("onclick","CrearUsuario()")

           }
         });

}
function ComprobarUsuario()
{

  $.ajax({

             url: "comprobar_usuario",
             data:{rut:$("#rut_usuario").val()} , // serializes the form's elements.
             type: "POST",
              success: function(response)
             {
                var datos =  $.parseJSON(response)
                if (datos.status == "error")
                {
                   MensajeError(datos.message)
                   $("#rut_usuario").val("")
                 }
                 else if(datos.status =='success')
                 {



                }

           }
         });
}

 function CrearUsuario()
{

 $("#carga").show()
                     $.ajax({

                    url:  "crearusuario",
                    type: 'POST',
                    data : $('#form_usuarios').serialize(),//llamamos a la funcion con el nombre que le dimos en el archivo routes
                     success: function(response)
                                     {
                                         var datos =  $.parseJSON(response)
                                         if (datos.status == "error")
                                         {
                                            MensajeError(datos.message)
                                          }
                                          else if(datos.status =='success')
                                          {
                         $('#form_usuarios')[0].reset();
                           $("#carga").hide()
                             MensajeExito("USUARIO CREADO CORRECTAMENTE")

                              TablaUsuarios()

                            }
                    }
                })
              return false
}

function DatosUsuario(id)
{
 $("#dat_text_user").empty()
 $("#carga").show()
  $.ajax({

             url: "datos_usuario",
             data:{id:id} , // serializes the form's elements.
             type: "POST",
              success: function(response)
                                     {
                                         var datos =  $.parseJSON(response)
                                         if (datos.status == "error")
                                         {
                                            MensajeError(datos.message)
                                          }
                                          else if(datos.status =='success')
                                          {
                  $("#rut_usuario").off('change');
                  $(".clave").hide()
                   $("#carga").hide()
                  $("#id_usuario").val(datos.data.id)
                  $("#rut_usuario").val(datos.data.rut)
                  $("#nombres_usuario").val(datos.data.nombres)
                  $("#apellidos_usuario").val(datos.data.apellidos)
                  $("#rango_usuario").val(datos.data.rango)
                  $("#btnguardar").off('click');
                  $("#btnguardar").attr("onclick","EditarUsuario()")

                  $("#data_user").show()
                  $("#tabla_user").hide()
                  $(".clave").hide()
                   $(".cambio_clave").hide()
                        $(".ruts").Rut({

                    on_error: function(){

                      $(".ruts").val("")
                     $(".ruts").css("border", "1px solid red")
                       MensajeError("Rut Incorrecto")
                   }
                })
                }

           }
         });
}
function DatosUsuarioClave(id)
{
$("#dat_text_user").empty()
 $("#carga").show()
  $.ajax({

             url: "datos_usuario",
             data:{id:id} , // serializes the form's elements.
             type: "POST",
              success: function(response)
               {
                   var datos =  $.parseJSON(response)
                    if (datos.status == "error")
                   {
                      MensajeError(datos.message)
                    }
                    else if(datos.status =='success')
                    {
                       $("#carga").hide()
                       $(".datuser").hide()
                       $("#data_user").show()
                       $("#tabla_user").hide()
                       $(".clave").hide()
                       $(".cambio_clave").show()
                       $("#id_usuario").val(datos.data.id)
                       $("#dat_text_user").append("<h2 class ='text-center'><b>CAMBIO DE CLAVE DEL USUARIO "+datos.data.nombres+" "+datos.data.apellidos+"</b></h2>")
                       $("#btnguardar").off('click');
                       $("#btnguardar").attr("onclick","CambioClave()")
                }

           }
         });
}
function CambioClave()
{
$("#carga").show()
$("#data_user").hide()
  $.ajax({

             url: "editar_clave",
             type: 'POST',
             data : $('#form_usuarios').serialize(),
              success: function(response)
                                     {
                                         var datos =  $.parseJSON(response)
                                         if (datos.status == "error")
                                         {
                                            MensajeError(datos.message)
                                             $("#carga").hide()
                                             $("#data_user").show()

                                          }
                                          else if(datos.status =='success')
                                          {


                   $("#carga").hide()
                   TablaUsuarios()
                    $(".clave").hide()
                     $(".cambio_clave").hide()
                     $("#dat_text_user").empty()


                }

           }
         });
}
function Mostrar(dato)
{
  $('#form_usuarios')[0].reset();
  $(".datuser").show()
  $(".cambio_clave").hide()
  if(dato == '0')
  {
    $("#data_user").hide()
    $("#tabla_user").show()
     $("#rut_usuario").off('change');

  }
  else if(dato == '1')
  {
    $("#rut_usuario").attr('onchange','ComprobarUsuario()')
    $("#data_user").show()
    $("#tabla_user").hide()
    $(".clave").show()
  }

}
function EditarUsuario()
{


     $("#carga").show()
      $("#rut_usuario").off('change');
                     $.ajax({

                    url:  "editarusuario",
                    type: 'POST',
                    data : $('#form_usuarios').serialize(),//llamamos a la funcion con el nombre que le dimos en el archivo routes
                    success: function(response)
                                     {
                                         var datos =  $.parseJSON(response)
                                         if (datos.status == "error")
                                         {
                                            MensajeError(datos.message)
                                          }
                                          else if(datos.status =='success')
                                          {
                                            $("#rut_usuario").off('change');
                         $('#form_usuarios')[0].reset();
                          $("#carga").hide()
                          $("#dat_text_user").empty()
                             MensajeExito("DATOS EDITADOS CORRECTAMENTE")


                              TablaUsuarios()
                            }
                    }
                })
              return false
}
function OcultaUsuario(id,dato)
{
   $.ajax({

                                  url:  "eliminarusuario",
                                  type: 'POST',
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
                                             $("#dat_text_user").empty()
                                     TablaUsuarios()
                                          MensajeExito("USUARIO ELIMINADO CORRECTAMENTE")

                                          }

                                  }
                              })
}

$(document).ready(function() {
  TablaUsuarios()
  $("#dat_text_user").empty()
  $('#usuario').on('click', function () {
  $("#btnguardar").off('click');
  $("#btnguardar").attr("onclick","CrearUsuario()")

})

})