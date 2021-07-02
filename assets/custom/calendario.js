
function ViewCalendario() {
  $("#calendario").fullCalendar('destroy')
  $.post('getCalendario', function (data) {
    //alert(data);
    $('#calendario').fullCalendar({
      events: $.parseJSON(data),
      locale: 'es',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'agendaDay,agendaWeek,month'
      },
      // aspectRatio: 40.5,
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre ', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
      dayNames: ['Domingo ', 'Lunes ', 'Martes ', 'Miércoles ', 'Jueves ', 'Viernes ', 'Sábado '],
      dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
      selectable: true,
      editable: false,
      eventResize: function (event, jsEvent, ver) {},
      dayClick: function (start, end, jsEvent) {
        // leemos las fechas de inicio de evento y hoy
        var check = moment(start).format('YYYY-MM-DD');
        var today = moment(new Date()).format('YYYY-MM-DD');
        // si el inicio de evento ocurre hoy o en el futuro mostramos el modal
        if (check >= today) {
          // si el inicio de evento ocurre hoy o en el futuro mostramos el modal
          start = moment(start).format();
          $("#fecha").val(start)
        } else {
          alert("No se pueden crear eventos en el pasado!");
        }
      },
      eventClick: function (event, jsEvent, ver) {
        $.ajax({
          url: "verdatoscalendarioid",
          type: 'POST',
          data: {
            id: event.id
          },
          success: function (result) {
            var datos = $.parseJSON(result)
            $("#fecha").val(datos.data.fecha)
            $("#hora").val(datos.data.hora)
            $("#id_evento").val(event.id)
            $("#descripcion").val(datos.data.descripcion)
             $("#color").val(datos.data.color)
             $("#titulo").val(datos.data.titulo)
             $("#saveevento").hide()
			$("#eventoeditar").show()
			$("#eventoeliminar").show()
			$("#nuevoevento").show()
          }
        })
        //$("#form_cita_terapeuta")[0].reset();
      },
    });
  });
}

function CrearEvento() {
  $.ajax({
    url: "crearevento",
    type: 'POST',
    data: $('#form_eventos').serialize(), //llamamos a la funcion con el nombre que le dimos en el archivo routes
    success: function (result) {
    	ViewCalendario()
      $("#form_eventos").find('input').val("")
	  $("#form_eventos").find('textarea').val("")
      $("#id_evento").val(0)
      $("#color").val("#5367ce")
        var today = new Date();
		  var dd = today.getDate();
		  var mm = today.getMonth() + 1;
		  var yyyy = today.getFullYear();
		  if (dd < 10) {
		    dd = '0' + dd;
		  }
		  if (mm < 10) {
		    mm = '0' + mm;
		  }
		  today = dd + '/' + mm + '/' + yyyy;
		  $("#fecha").val(today)
      MensajeExito("SE AGREGO EL EVENTO CORRECTAMENTE AL CALENDARIO")


    }
  })
  return false
}

function NuevoEvento() {

  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yyyy = today.getFullYear();
  if (dd < 10) {
    dd = '0' + dd;
  }
  if (mm < 10) {
    mm = '0' + mm;
  }
  today = dd + '/' + mm + '/' + yyyy;

  $("#form_eventos").find('input').val("")
	  $("#form_eventos").find('textarea').val("")
  $("#id_evento").val(0)
  $("#saveevento").show()
			$("#eventoeditar").hide()
			$("#eventoeliminar").hide()
			$("#nuevoevento").hide()
  $("#fecha").val(today)
}

function EditarEvento() {
  $.ajax({
    url: "editarevento",
    type: 'POST',
    data: $('#form_eventos').serialize(), //llamamos a la funcion con el nombre que le dimos en el archivo routes
    success: function (result) {
     var today = new Date();
	  var dd = today.getDate();
	  var mm = today.getMonth() + 1;
	  var yyyy = today.getFullYear();
	  if (dd < 10) {
	    dd = '0' + dd;
	  }
	  if (mm < 10) {
	    mm = '0' + mm;
	  }
	  today = dd + '/' + mm + '/' + yyyy;
	  MensajeExito("SE EDITO EL EVENTO CORRECTAMENTE ")
	  $("#form_eventos").find('input').val("")
	  $("#form_eventos").find('textarea').val("")
	  $("#id_evento").val(0)
	   ViewCalendario()
	  $("#fecha_ingreso").val(today)
    }
  })
  return false
}

function EliminarEvento() {
  swal({
    title: "Estas seguro de eliminar este evento?",
    text: "Eliminaras un evento del sistema",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Si,Eliminar evento",
    cancelButtonText: "No,Cancelar ",
    closeOnConfirm: false,
    closeOnCancel: false
  }, function (isConfirm) {
    if (isConfirm) {
      swal("Eliminado", "El evento ha sido eliminado.", "success");

      $("#cargando").css("display", "inline")
      $.ajax({
        url: "eliminarevento",
        type: 'POST',
        data: {
          id: $("#id_evento").val()
        },
        success: function (result) {
           var today = new Date();
	  var dd = today.getDate();
	  var mm = today.getMonth() + 1;
	  var yyyy = today.getFullYear();
	  if (dd < 10) {
	    dd = '0' + dd;
	  }
	  if (mm < 10) {
	    mm = '0' + mm;
	  }
	  today = dd + '/' + mm + '/' + yyyy;
	  MensajeExito("SE ELIMINO EL EVENTO CORRECTAMENTE ")
	  $("#form_eventos").find('input').val("")
	  $("#form_eventos").find('textarea').val("")
	  $("#id_evento").val(0)
	   ViewCalendario()
	  $("#fecha_ingreso").val(today)
	  $("#saveevento").show()
			$("#eventoeditar").hide()
			$("#eventoeliminar").hide()
			$("#nuevoevento").hide()
			$("#color").val("#5367ce")
        }
      })
      return false
    } else {
      swal("Cancelado", "el evento no ha sido eliminado :)", "error");
    }
  });
}



$(document).ready(function() {

ViewCalendario()
$('.color_evento').colorpicker();
})