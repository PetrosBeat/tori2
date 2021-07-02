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
    <img src="1.jpg" alt="Logo de Empresa" id="logo" name="logo" width="10%"  >
 <h3 style="text-align: center;margin-top: 0;"> CERTIFICADO DE RELACION LABORAL.</h3>
 <p>
    <b><?=$datos_empresa['RznSoc'] ?> R.U.T. N&#186; <?php

    $rut = str_replace("-", "", $datos_empresa['RUTEmisor']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b> con domicilio en <?php echo utf8_encode($datos_empresa['CmnaOrigen']) ?>, <?php echo utf8_encode($datos_empresa['DirOrigen']) ?> Certifica que  Don <b> <?php echo utf8_encode( $Datos_Trabajador['nombres']." ".$Datos_Trabajador['apellidos']) ?></b>  R.U.T N&#186; <b> <?php
    $rut = str_replace("-", "", $Datos_Trabajador['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b> de nacionalidad <?=$Datos_Trabajador['nacionalidad'] ?>, nacido, el <?= fechaCastellano($Datos_Trabajador['fecha_nacimiento']); ?> domiciliado en <?=$Datos_Trabajador['direccion'] ?> </b> y procedente de <b><?=$Datos_Trabajador['ciudad'] ?></b> realiza sus funciones como <b><?=$Datos_Trabajador['cargo'] ?></b> funcion esencial dentro de la empresa para su funcionamiento.
 </p>
<p><b style="text-align: justify;">Se extiende el presente certificado para presentar junto al Permiso Unico Colectivo en caso de
ser requerido por la autoridad, en su desplazamiento a su lugar de trabajo o en su retorno a su
domicilio.</b></p>

<div class="bloque" style="text-align: center;margin-top: 400px;margin-left: 200px">



  <div class="B">
    <b><?=$datos_empresa['RznSoc'] ?> <br>R.U.T. N&#186; <?php

    $rut = str_replace("-", "", $datos_empresa['RUTEmisor']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b>  <br> <br><br> <br>
     <?php foreach ($datos_representantes as $row) {
      ?><b></b>
          <b><?php echo utf8_encode($row['nombres']." ".$row['apellidos']); ?></b><br>
           <b>R.U.N N&#186;  <?php

    $rut = str_replace("-", "", $row['rut']);

      echo $this->Informacion_Model->formateo_rut($rut);

     ?></b><br>  <br>  <br><br> <br>
      <?php
     } ?>



  </div>
</div>

</body>
</html>