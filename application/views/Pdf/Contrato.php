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
  $dias_ES = array("Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $numeroDia." de ".$nombreMes." de ".$anio;
}
if($Datos_Trabajador['sexo'] == "F")
  {
      $sexo_trabajador = "La trabajadora";
  }
  else
  {
    $sexo_trabajador = "El trabajador";
  }
$formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
   ?>
 <h3 style="text-align: center;margin-top: 0;"> CONTRATO DE TRABAJO.</h3>
 <p>
   En Concepci&#243;n a <b><?= fechaCastellano($Datos_Trabajador['fecha_ingreso']); ?></b> entre <b>PEDRO DEL CAMPO E HIJOS SpA R.U.T. N&#186; 76.971.681-5</b> representado por don  Pedro Pablo del Campo Palacios R.U.N. N&#186; 9.123.345-2 ambos domiciliados en la ciudad y comuna de CONCEPCI&Oacute;N, calle O&#39;Higgins Poniente 77, Local 2 y Don <b> <?php echo utf8_encode( $Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b>  R.U.T N&#186; <b> <?php
    $rut = str_replace("-", "", $Datos_Trabajador['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b> de nacionalidad <?=$Datos_Trabajador['nacionalidad'] ?>, nacido, el <?= fechaCastellano($Datos_Trabajador['fecha_nacimiento']); ?> domiciliado en <b><?=$Datos_Trabajador['direccion'] ?></b> de estado civil <b><?php if($Datos_Trabajador['estado_civil'] == '1'){echo "SOLTERO(A)";}elseif ($Datos_Trabajador['estado_civil'] == '2') {
     echo "CASADO(A)";
    }elseif ($Datos_Trabajador['estado_civil'] == '3') {
      echo "SEPARADO(A)";
    }elseif ($Datos_Trabajador['estado_civil'] == '4') {
      echo "VIUDO(A)";
    } ?></b> y procedente de <?=$Datos_Trabajador['ciudad'] ?> se ha convenido el siguiente CONTRATO DE TRABAJO, para cuyos efectos las partes convienen denominarse, respectivamente, EMPLEADOR Y TRABAJADOR.
 </p>
<p>
<b>PRIMERO:</b> Mediante este instrumento, <b>Pedro del Campo e Hijos SpA</b> contrata a don <b><?php echo utf8_encode( $Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b> para que desempe&ntilde;e las funciones de <b><?php echo utf8_encode( $Datos_Trabajador['cargo'])   ?></b>
<?php
 $area = $this->Informacion_Model->Get_area_empresa($Datos_Trabajador['area']);

 if($area['id'] == '1')
 {
  echo "Porcionar
alimentos, realizar inventarios de productos alimenticios, preparaci&oacute;n y elaboraci&oacute;n
de alimentos, montaje y decoraci&oacute;n de platos, aplicaci&oacute;n de controles de calidad,
levantamiento de checklist para higiene del local; y en generales todas las funciones
que le sean propias, concernientes, relacionadas, similares, inherentes o necesarias
que le encomiende el empleador.";
 }
if($area['id'] == '2')
 {
  echo "Tomar, Revisar y Repartir pedidos. Preparar salsas u otros &iacute;tems que se requieran para los pedidos.";
 }
if($area['id'] == '3')
 {
  echo "Atenci&oacute;n de p&uacute;blico en restaurante o v&iacute;a telef&oacute;nica, revisado y armado de pedidos, control de inventario, preparaci&oacute;n y elaboraci&oacute;n de bebidas, y en general todas las funciones que le sean propias, concernientes, relacionadas, similares, inherentes o necesarias que le encomiende el empleador.";
 }
 if($area['id'] == '4')
 {
  echo "Tomar, Revisar y Repartir pedidos. Preparar salsas u otros &iacute;tems que se requieran para los pedidos.";
 }
 if($area['id'] == '5')
 {
  echo "Atenci&oacute;n de p&uacute;blico
en Restaurante (Garzona), preparaci&oacute;n y elaboraci&oacute;n de bebidas, y en general todas
las funciones que le sean propias, concernientes, relacionadas, similares, inherentes
o necesarias que le encomiende el empleador.";
 }
?>
<p>
  El trabajador se obliga adem&aacute;s a mantener limpio el lugar de trabajo y cualquier otra tarea que solicite  el empleador o las necesidades del servicio o del buen funcionamiento del establecimiento as&iacute; lo requieran. Adem&aacute;s deber&aacute; cumplir estrictamente las &oacute;rdenes de sus jefes y empleador, debiendo mantener una fluida comunicaci&oacute;n con &eacute;stos. Todo ello se entiende como obligaciones esenciales de este contrato y su incumplimiento constituye una infracci&oacute;n grave de las obligaciones en &eacute;l contenidas.
</p>

</p>
<p>
  Por &uacute;ltimo, el trabajador deber&aacute; participar de todas las reuniones, charlas y capacitaciones que se programen por la empresa para el mejor funcionamiento del local.
</p>
<p>
  <b>SEGUNDO:</b> <?=$sexo_trabajador ?> desempe&ntilde;ar&aacute; su trabajo en la Regi&oacute;n del B&iacute;o B&iacute;o, ciudad de Concepci&oacute;n, en el establecimiento denominado TORI SUSHI, ubicado en calle O&#39;Higgins Poniente 77, Local 2, comuna de Concepci&oacute;n, ciudad de Concepci&oacute;n.
Podr&aacute;, el empleador en virtud de lo establecido en el art&iacute;culo 12 del C&oacute;digo del Trabajo, trasladar al trabajador a cualquier otro establecimiento o local del empleador, con la sola limitaci&oacute;n de que el nuevo sitio o recinto se encuentre ubicado dentro de la ciudad de Concepci&oacute;n y comunas colindantes, sin que esto importe menoscabo alguno al trabajador.
</p>
<p>
<b>TERCERO:</b> La jornada de trabajo ser&aacute; de 45 horas semanales distribuidas en 6 d&iacute;as, de la manera que se indica a continuaci&oacute;n:

<ul><li>Lunes a Sabado de 11:30 horas a 19:30 horas, con &#189; hora de colaci&oacute;n.</li></ul>
<p>Seg&uacute;n la afluencia de p&uacute;blico, las cuales no se considerar&aacute;n como trabajados para efectos de contabilizar el n&uacute;mero de horas diarias trabajadas.</p>

</p>
<p>
  <b>CUARTO:</b> El empleador se obliga a pagar al trabajador, en moneda de curso legal, por los servicios prestados, los siguientes &iacute;tems:
 <?php $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
echo $formatterES->format($Datos_Trabajador['sueldo']); ?>
    <ul>
      <li>Sueldo Base mensual de <b>$<?=number_format( $Datos_Trabajador['sueldo'] , 0, ',', '.')  ?></b>
        (<?=  $formatterES->format($Datos_Trabajador['sueldo']); ?> pesos).</li>
<li>
  Gratificaci&oacute;n legal de un 25 por ciento, con el tope de 4,75 ingresos m&iacute;nimos mensuales establecido en el art&iacute;culo 50 del C&oacute;digo del Trabajo.
</li>
    </ul>

<p>
  Las deducciones que el empleador deber&aacute; practicar a las remuneraciones, son todas aqu&eacute;llas que establece el art&iacute;culo 58 del C&oacute;digo del Trabajo. El trabajador acepta y autoriza al empleador para que efect&uacute;e las deducciones que establece la legislaci&oacute;n vigente y para que descuente el tiempo no trabajado debido a atrasos, inasistencias o permisos.
El empleador se compromete a efectuar las retenciones correspondientes y entregarlas a las instituciones previsionales y de seguridad social, salvo que las partes se acojan a la Ley N&#186;18.156.

</p>
</p>
<p>
  <b>QUINTO:</b> Ser&aacute; obligaci&oacute;n del trabajador cumplir las instrucciones que se señalan en el presente Contrato de Trabajo y las instrucciones, normas y procedimientos que se dicten o impartan por sus superiores o jefe directo.
Constituyen obligaciones esenciales, cuya infracci&oacute;n autoriza al empleador a poner t&eacute;rmino al presente Contrato Individual de Trabajo, sin derecho a indemnizaci&oacute;n de ninguna especie:
    <ul>
      <li> Presentarse puntualmente a su trabajo al inicio de la jornada diaria o a la hora en que fuere citado, y en condiciones de servir cabalmente sus funciones y responsabilidades. Los atrasos reiterados ser&aacute;n causal inmediata de despido;</li>
      <li>Ser respetuosa con sus superiores y acatar las instrucciones que &eacute;stos impartan en relaci&oacute;n con el buen servicio y los fines o intereses de la empresa;</li>
      <li>Guardar relaciones de cordialidad con sus compañeros de trabajo, con sus subordinados y con las personas que concurran a las dependencias de la empresa; </li>
      <li>Emplear la m&aacute;xima diligencia en el cuidado de los bienes de la empresa;</li>
      <li>Dar aviso inmediato a su jefe directo de las p&eacute;rdidas, deterioros y descomposturas que sufran los objetos a su cargo; </li>
      <li>Registrar debidamente su hora de llegada y salida. Se considerar&aacute; falta grave que un trabajador firme el registro respectivo indebidamente por &eacute;l o por otros dependientes;</li>
      <li>Dar aviso dentro de 24 horas a su Jefe Directo o al Departamento de Personal de la empresa, en su caso, de cualquier inasistencia por enfermedad u otra causal que le impida concurrir transitoriamente a su trabajo; debiendo, en todo caso, presentar oportunamente los certificados que acrediten fehacientemente su situaci&oacute;n;  </li>
      <li>Dar aviso de inmediato de cualquier hecho delictivo ocurrido dentro de la empresa, en especial aquellos que digan relaci&oacute;n con la sustracci&oacute;n de materiales o productos de propiedad de ella. Ser&aacute; considerada falta grav&iacute;sima y causal de despido inmediato, si se probare que el trabajador ha tenido conocimiento de hechos de esta naturaleza y no lo informare como establece esta norma.  </li>
      <li>La trabajadora deber&aacute; cumplir con todas las normas de higiene y seguridad que le instruya su empleador, las que se contemplan el Reglamento Interno de Orden, Higiene y Seguridad de las empresa, y las instrucciones que emitan el organismo administrador de la Ley 16.744 y las autoridades respectivas.</li>
    </ul>
    <p>As&iacute; tambi&eacute;n, se deja constancia de que el trabajador se encontrar&aacute; especialmente afecto –sin que esta enumeraci&oacute;n sea taxativa- a las siguientes prohibiciones de orden:</p>
    <ul>
    <li>Trabajar sobretiempo sin autorizaci&oacute;n escrita de su jefe directo. </li>
    <li>Formar corrillos, leer diarios y ocuparse durante las horas de trabajo de asuntos personales, atender negocios ajenos a la empresa, o desempeñar cualquier funci&oacute;n o cargo en empresas del mismo rubro.</li>
    <li>Revelar datos o antecedentes que hayan conocido con motivo de sus relaciones con la empresa cuando se les hubiera encargado reserva de ellos.</li>
    <li>Dormir en las oficinas o lugares de trabajo durante la jornada de trabajo.  </li>
    <li>Introducir, vender o consumir bebidas alcoh&oacute;licas en el lugar de trabajo. </li>
    <li>Ingresar al lugar de trabajo o trabajar en manifiesto estado de embriaguez o con evidentes signos de estar bajo la influencia de sustancias estupefacientes o psicotr&oacute;picas.</li>
    <li>Adulterar el registro de hora de llegada y salida del trabajo.    </li>
    <li>Dar lugar a que ingrese al establecimiento cualquier persona extraña a &eacute;l, hombre o mujer, desconocidos, amigos o parientes.    </li>
    <li>Los atrasos reiterados se consideraran falta grave a las obligaciones que impone el contrato de trabajo, toda vez que ello ocasiona alteraciones importantes en los procesos productoivos de la empresa. Se entender&aacute; por atrasos reiterados, el llegar durante dos o m&aacute;s veces atrasado durante la semana y cuatro o m&aacute;s veces en el mes.     </li>
    </ul>
    <p>El incumplimiento reiterado por parte de la trabajadora de cualquiera de las obligaciones o prohibiciones establecidas en la presente cl&aacute;usula, facultar&aacute; al empleador para poner t&eacute;rmino inmediato al contrato de trabajo en conformidad a lo señalado en el art&iacute;culo 160 Nº 7 del C&oacute;digo del Trabajo, esto es, por incumplimiento grave de las obligaciones que impone el contrato de trabajo.</p>
</p>
<p>
 <b> SEXTO:</b>  Vigencia Se deja constancia expresa que la obligaci&oacute;n de prestar servicios emanada del presente contrato, solo podr&aacute; cumplirse una vez que la trabajadora haya obtenido la visaci&oacute;n de residencia correspondiente en Chile o el permiso especial de trabajo para extranjeros con visa en tr&aacute;mite
</p>
<p><b>SÉPTIMO:</b> El presente contrato tendr&aacute; una duraci&oacute;n de  <?php
 if($Datos_Trabajador['contrato_indefinido'] == 0){
  echo "<b>".$Datos_Trabajador['duracion_contrato']." Mes(es).</b>";
 }
 else
 {
  echo "<b>INDEFINIDO</b>";
 }
 ?> y podr&aacute; pon&eacute;rsele t&eacute;rmino cuando concurran para ello causas justificadas, en conformidad a la Ley mediante un aviso escrito dado con 30 d&iacute;as de anticipaci&oacute;n, a lo menos.
</p>
<p><b>OCTAVO:</b> Impuesto a la Renta El empleador tiene la obligaci&oacute;n de responder al pago de impuesto a la renta correspondiente en relaci&oacute;n con la remuneraci&oacute;n pagada.
</p>
<p>
  <b>NOVENO:</b>  El Trabajador declara estar afiliado al nuevo Sistema Previsional. Por consiguiente, se solicita que sus cotizaciones previsionales sean enteradas en la A.F.P. <b><?=$afp['nombre'] ?> y Salud
    <?php
    if($Datos_Trabajador['tipo_salud'] == '1')
      {
        echo "FONASA";
      }
      else
      {
        $isapre = $this->Informacion_Model->getIsapres($Datos_Trabajador['isapre']);
        echo "ISAPRE ".$isapre['nombre'];
      }
    ?></b>.
</p>
<p>
<b>D&Eacute;CIMO:</b> El trabajador se obliga a no divulgar a terceros, o usar en provecho propio, sin el consentimiento escrito del empleador, ninguna informaci&oacute;n relacionada con los trabajos que realice, ni respecto de aquellos antecedentes que se generen o reciban, tanto del empleador como de los terceros con que &eacute;ste se vincule, estipul&aacute;ndose que en general, toda informaci&oacute;n que el trabajador obtenga en el desempeño de sus labores es considerada confidencial.
</p>
<p>
 <b> D&Eacute;CIMO PRIMERO:</b> Se deja constancia que don <b><?=$Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos'] ?></b> ingres&#243; al servicio el  <b><?= fechaCastellano($Datos_Trabajador['fecha_ingreso']); ?></b>.
</p>
<p>
<b>D&Eacute;CIMO SEGUNDO:</b> Para todos los efectos legales derivados de este contrato, las partes fijan desde ya su domicilio en Concepci&oacute;n y se someten expresamente a la jurisdicci&oacute;n de los Tribunales de Justicia, prorrogando competencia a sus tribunales de justicia.

<?php if($Datos_Trabajador['nacionalidad'] !='CHILENA')
{
?>
<p>
  <b>D&Eacute;CIMO TERCERO:</b> <b>Viaje.</b> El empleador se compromete a pagar, al t&eacute;rmino de la relaci&oacute;n laboral (ya sea por t&eacute;rmino de contrato, despido o renuncia), el pasaje de regreso del trabajador y los miembros de su familia que se estipulen, a su pa&iacute;s de origen o al que oportunamente acuerden las partes, conforme a lo dispuesto en el inciso 2°, del art&iacute;culo 37 del D.S. N°597 del 1984. Al respecto, se tendr&aacute; presente que la señalada obligaci&oacute;n del empleador existir&aacute; hasta que el extranjero salga del pa&iacute;s u obtenga nueva visaci&oacute;n o permanencia definitiva.
</p>
<?php } ?>
<p>Se deja constancia que en virtud del art&iacute;culo 422 del C&oacute;digo del Trabajo, el Trabajador elige expresamente el domicilio antes señalado.
</p>
<p>
El presente contrato se extiende en dos ejemplares de igual tenor y efecto, quedando una copia en poder de cada una de las partes contratantes.
</p>
</p>

<div class="bloque" style="text-align: center;margin-top: 80px">


  <div class="A">
    <b><?php echo utf8_encode($Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b><br>
    <b>C.N.I N&#186; <?php
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