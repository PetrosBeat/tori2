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
<p style="text-align: right;">CAUQUENES, a 31 de Marzo de 2021</p>
 <p>Señor:</p>
 <p>Don <b> <?php echo utf8_encode( $Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b></p>
 <p>PRESENTE</p>
 <p>De nuestra consideración, </p>
 <p>1.  Nos referimos al contrato de trabajo de fecha <b><?= fechaCastellano($Datos_Trabajador['fecha_ingreso']); ?></b>, que lo vincula con la empresa <b>SOCIEDAD MADERERA GARC&#205;AS LIMITADA R.U.T. N&#186; 76.320.267-4</b> de Cauquenes y conforme al cual usted se desempeña, actualmente, como <b>&#34;<?=$Datos_Trabajador['cargo'] ?>&#34;</b> </p>
 <p>   Por medio de la presente cumplimos con formalizar y comunicar por escrito la decisión de esta entidad edilicia en orden a poner término al contrato de trabajo antes indicado a contar del 30 de abril de 2021., por la cual contemplada en el artículo 161 del Código del Trabajo y esto es necesidades de la empresa, establecimiento o servicio.</p>

<p>
  Hacemos presente que a usted le corresponden los siguientes haberes:
<br> - Indemnización por año de servicio.
<br> - Vacaciones proporcionales.
</p>
<p>Saluda atentamente a usted y agradeciendo desde ya sus servicios prestados.</p>
<p style="text-align: center"><b>SOCIEDAD MADERERA GARC&#205;AS LIMITADA <br>R.U.T. N&#186; 76.320.267-4</b></p>

<div class="bloque" style="text-align: center;margin-top: 80px">


  <div class="A">
    <b><?=$Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos'] ?></b><br>
    <b>C.N.I N&#186;  <?php
    $rut = str_replace("-", "", $Datos_Trabajador['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b>
  </div>
  <div class="B">
    <b>SOCIEDAD MADERERA GARC&#205;AS LIMITADA <br>R.U.T. N&#186; 76.320.267-4</b><br>  <br> <br>
    <b>PEDRO GARCIAS MEDEL</b><br>
    <b>R.U.T N&#186; 11.176.599-5</b><br>  <br>  <br>

  </div>
</div>

</body>
</html>