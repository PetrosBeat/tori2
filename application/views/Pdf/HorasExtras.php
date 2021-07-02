<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
  <style type="text/css" media="screen">
    body{
     font-family: Arial, Helvetica, sans-serif;
     text-align: justify;
     font-size: 14px;
     margin-top: 0;
    }
    .bloque{  /*padre*/
  width: 50%;
    margin: 0;
  padding: 0;
  padding-top: 0;

}
.bloque .A, .bloque .B{  /*hijos*/
  display: inline-block;

}
  </style>
</head>
<body >
  <?php
function fechaCastellano ($fecha) {
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $numeroDia." de ".$nombreMes." de ".$anio;
}
   ?>
 <h3 style="text-align: center;margin-top: 0;"> PACTO HORAS EXTRAORDINARIAS.</h3>
 <p>
    En Concepci&#243;n a <b><?= fechaCastellano($Datos_Trabajador['fecha_pacto']); ?></b> entre <b>PEDRO DEL CAMPO E HIJOS SpA R.U.T. N&#186; 76.971.681-5</b> representado por don  Pedro Pablo del Campo Palacios R.U.N. N&#186; 9.123.345-2 ambos domiciliados en la ciudad y comuna de CONCEPCI&Oacute;N, calle O&#39;Higgins Poniente 77, Local 2 y Don <b> <?php echo utf8_encode( $Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b>  R.U.T N&#186; <b> <?php
    $rut = str_replace("-", "", $Datos_Trabajador['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b> de nacionalidad <?=$Datos_Trabajador['nacionalidad'] ?>, nacido, el <?= fechaCastellano($Datos_Trabajador['fecha_nacimiento']); ?> domiciliado en <b><?=$Datos_Trabajador['direccion'] ?></b> y procedente de <b><?=$Datos_Trabajador['ciudad'] ?></b>, se ha convenido en el siguiente <b>Pacto de Horas Extraordinarias</b> que tendr&#225; una duraci&oacute;n de 3 meses a contar de la fecha inicial.
 </p>
<p>
1&#186;- En conformidad con lo establecido por el art&iacute;culo 32 del C&oacute;digo del Trabajo, el trabajador individualizado anteriormente acepta  un trato de horas extraordinarias, con el objeto de prestar servicios en sobretiempo,  a   raz&oacute;n de  1,5 horas diarias, de  lunes  a s&aacute;bado durante los 3 meses subsiguientes a la fecha inicial.
</p>
<p>
<p>
  2&#186;- Dichas horas se trabajar&aacute;n como una prolongaci&oacute;n de su horario normal de trabajo, de acuerdo a lo que ese establece en el art&iacute;culo 31 inciso primero del C&oacute;digo del Trabajo y en ning&uacute;n caso exceder&aacute;n de un m&aacute;ximo de 10 horas semanales.
</p>
<p>3&#186;- Las partes acuerdan que este pacto de horas extraordinarias tiene vigencia transitoria, que se deriva de sucesos o acontecimientos ocasionales o de factores que no es posible evitar y que se extender&aacute; hasta la fecha antes señalada, y siempre que se encuentre vigente su contrato de trabajo.</p>
<p>
 4&#186;- Las horas extraordinarias deber&aacute;n quedar registradas en el sistema de control de asistencia de la empresa y se pagar&aacute;n con un recargo del 50% sobre su remuneraci&oacute;n ordinaria.
</p>
<p>
 5&#186;- El acuerdo consignado en este documento se considerar&aacute; como parte integrante del contrato de trabajo, y como un anexo del mismo, para todos los efectos legales contractuales.</p>
<p>6&#186;- No se considerar&aacute;n horas extras las que se efect&uacute;en antes de la hora de llegada, si no, las que se trabajen después de iniciada la jornada laboral o en d&iacute;as s&aacute;bados, ni tampoco las que se trabajen en compensaci&oacute;n de un permiso.</p>

<p>7&#186;- Este pacto se suscribe en dos ejemplares, uno de los cuales queda en poder del empleador y el otro del trabajador.</p>
</p>
<div class="bloque" style="text-align: center;margin-top: 80px">


  <div class="A">
    <b><?=$Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos'] ?></b><br>
    <b>C.N.I N&#186;  <?php
    $rut = str_replace("-", "", $Datos_Trabajador['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b>
  </div>
  <div class="B">
    <b>PEDRO DEL CAMPO E HIJOS SPA <br>R.U.T. N&#186; 76.320.267-4</b><br>  <br> <br>
    <b>PEDRO PABLO DEL CAMPO PALACIOS</b><br>
    <b>R.U.T N&#186;  9.123.345-2 </b><br>  <br>  <br>
     <b>PABLO NICOLAS DEL CAMPO PARRA</b><br>
    <b>R.U.T N&#186; 18.807.356-5</b>
  </div>
</div>

</body>
</html>