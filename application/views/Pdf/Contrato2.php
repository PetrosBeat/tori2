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
 <h3 style="text-align: center;margin-top: 0;"> CONTRATO DE TRABAJO.</h3>
 <p>
    En Cauquenes a <b><?= fechaCastellano($Datos_Trabajador['fecha_ingreso']); ?></b> entre <b>SOCIEDAD MADERERA GARC&#205;AS LIMITADA R.U.T. N&#186; 76.320.267-4</b> con domicilio en Cauquenes, Calle Balmaceda N&#186; 430 y Don <b> <?php echo utf8_encode( $Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b>  R.U.T N&#186; <b> <?php
    $rut = str_replace("-", "", $Datos_Trabajador['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b> de nacionalidad <?=$Datos_Trabajador['nacionalidad'] ?>, nacido, el <?= fechaCastellano($Datos_Trabajador['fecha_nacimiento']); ?> domiciliado en <?=$Datos_Trabajador['direccion'] ?> de estado civil <b><?php if($Datos_Trabajador['estado_civil'] == '1'){echo "SOLTERO(A)";}elseif ($Datos_Trabajador['estado_civil'] == '2') {
     echo "CASADO(A)";
    }elseif ($Datos_Trabajador['estado_civil'] == '3') {
      echo "SEPARADO(A)";
    }elseif ($Datos_Trabajador['estado_civil'] == '4') {
      echo "VIUDO(A)";
    } ?></b> y procedente de <?=$Datos_Trabajador['ciudad'] ?> se ha convenido el siguiente CONTRATO DE TRABAJO, para cuyos efectos las partes convienen denominarse, respectivamente, EMPLEADOR Y TRABAJADOR.
 </p>
<p>
1&#186;- El Trabajador se compromete a ejecutar el trabajo de <b>&#34;<?=$Datos_Trabajador['cargo'] ?>&#34;</b> en el establecimiento de <b>Aserradero</b> denominado <b>Aserradero Santa Ana</b> y ubicado en Cauquenes Kilómetro 4 , Camino a Chanco pudiendo ser trasladado a otro domicilio, o labores similares, dentro de la ciudad, por causa justificada, sin que ello importe menoscabo para el Trabajador.
</p>
<p>
<p>
  2&#186;- La jornada de trabajo ser&#225; la siguiente de Lunes a Viernes en la mañana de 08:00 a 13:00 horas y en la tarde de 14:00 a 18:00 horas
</p>
<p>3&#186;- El tiempo extraordinario se pagar&#225; con el recargo legal y se cancelar&#225; conjuntamente con el respectivo sueldo.</p>
<p>
 4&#186;- El Empleador se compromete a remunerar al Trabajador con la suma de <b>$<?=number_format( $Datos_Trabajador['sueldo'] , 0, ',', '.')  ?></b> (<?php $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
echo $formatterES->format($Datos_Trabajador['sueldo']); ?> pesos) como sueldo fijo por <b>Mes</b>.
  Las remuneraciones convenidas se pagar&#225;n por períodos mensuales vencidos, en dinero efectivo, moneda nacional del curso legal y del monto de ellas el Empleador podr&#225; efectuar los descuentos o deducciones que establecen las Leyes vigentes. El Trabajador firmar&#225; su liquidación de sueldos y otorgar&#225; el recibo correspondiente.
  El Trabajador declara estar afiliado al nuevo Sistema Previsional. Por consiguiente, se solicita que sus cotizaciones previsionales sean enteradas en la A.F.P. <b><?=$afp['nombre'] ?></b>.
</p>
<p>
 5&#186;- El presente contrato tendrá una duración <?php
 if($Datos_Trabajador['contrato_indefinido'] == 0){
  echo "<b>".$Datos_Trabajador['duracion_contrato']." Mes(es).</b>";
 }
 else
 {
  echo "<b>INDEFINIDO</b>";
 }
 ?>
 y podr&#225; pon&#233;rsele t&#233;rmino cuando concurran para ello causas justificadas que , en conformidad a la Ley, puedan producir su caducidad, o sea permitido dar al Trabajador el aviso de desahucio con 30 d&#237;as de anticipación, a lo menos.
  El Trabajador se compromete y obliga expresamente a cumplir las instrucciones que le sean impartidas por el Empleador a través de los Jefes inmediatos y a respetar las normas contenidas en el Reglamento Interno de Orden, Higiene y Seguridad (cuando exista en la Empresa) que declara conocer y que para estos efectos se consideran parte integrante del presente Contrato, recibiendo un ejemplar en este acto.
  El Trabajador se har&#225; responsable de los daños que ocasione a los bienes de la Empresa, como Maquinarias y otros que estén a su cargo.
</p>
<p>6&#186;- Se entienden incorporadas al presente contrato todas las disposiciones legales que se dicten con posterioridad a la fecha de suscripci&#243;n y que tengan relación con &#233;l.</p>

<p>7&#186;- Se deja constancia que don <b><?=$Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos'] ?></b> ingres&#243; al servicio el  <b><?= fechaCastellano($Datos_Trabajador['fecha_ingreso']); ?></b>.</p>
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
    <b>SOCIEDAD MADERERA GARC&#205;AS LIMITADA <br>R.U.T. N&#186; 76.320.267-4</b><br>  <br> <br>
    <b>PEDRO GARCIAS MEDEL</b><br>
    <b>R.U.T N&#186; 11.176.599-5</b><br>  <br>  <br>
     <b>FRANCISCO GARCIAS SEPULVEDA</b><br>
    <b>R.U.T N&#186; 17.417.614-0</b>
  </div>
</div>

</body>
</html>