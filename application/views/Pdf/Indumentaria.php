<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<style type="text/css" media="screen">
		.bloque{  /*padre*/
  width: 50%;
    margin: 0;
  padding: 0;
  padding-top: 0;


}
 body{
     font-family: Arial, Helvetica, sans-serif;
     text-align: justify;
     font-size: 16px;
     font-weight: bold;
    }
.bloque .A, .bloque .B{  /*hijos*/
  display: inline-block;

}
	</style>
</head>
<body>
	 <?php
     $datos_empresa = $this->Informacion_Model->getApp();
  $datos_representantes = $this->Informacion_Model->RepresentantesEmpresa();
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
							<p style='text-align: right;'><?php echo utf8_encode($datos_empresa['CmnaOrigen']) ?>,  <b><?= fechaCastellano($Datos_Trabajador['fecha_ingreso']); ?></b></p>

<h1 style='text-align: center'>Entrega de Indumentaria de Trabajo</h1>

<p> <b><?=$datos_empresa['RznSoc'] ?> R.U.T. N&#186; <?php

    $rut = str_replace("-", "", $datos_empresa['RUTEmisor']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b> hace entrega a  Don <b><?php echo utf8_encode($Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b> R.U.T N&#186; <b> <?php
    $rut = str_replace("-", "", $Datos_Trabajador['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b>,  la siguiente  indumentaria de trabajo:</p>

<ul>
	<b><li>Mascarilla</li>
	<li>Zapato de seguridad</li>
	<li>Oberol de trabajo</li>
	<li>Coleto</li>
	<li>Audifonos anti-ruido</li></b>
</ul>
<div class="bloque" style="text-align: center;margin-top: 350px">


  <div class="A">
    <b><?php echo utf8_encode($Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b><br>
    <b>C.N.I N&#186;  <?php
    $rut = str_replace("-", "", $Datos_Trabajador['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b>
  </div>
    <div class="B">
    <b><?=$datos_empresa['RznSoc'] ?> <br>R.U.T. N&#186; <?php

    $rut = str_replace("-", "", $datos_empresa['RUTEmisor']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b>  <br> <br><br>
     <?php foreach ($datos_representantes as $row) {
      ?><b></b>
          <b><?php echo utf8_encode($row['nombres']." ".$row['apellidos']); ?></b><br>
           <b>R.U.N N&#186;  <?php

    $rut = str_replace("-", "", $row['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b><br>  <br>  <br><br>
      <?php
     } ?>



  </div>
</div>


</body>
</html>