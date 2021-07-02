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
    .cuadrado-2 {
    width: 100px;
    height: 100px;
    border: 3px solid #555;
    margin-left: 120px
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
    <p style='text-align: right;'>Cauquenes,  <b><?= fechaCastellano($Datos_Trabajador['fecha_ingreso']); ?></b></p>
    <h1 style='text-align: center'>COMBPROBANTE DE RECEPCI&#211;N</h1>
    <h5 style='text-align: center'>REGLAMENTO INTERNO DE ORDEN HIGIENE Y SEGURIDAD</h5>
    <p>
      Yo,______________________________________________________ C.I ___._____._____-___ , declaro haber recibido una copia del Reglamento Interno de orden, Higiene y Seguridad de la Empresa Sociedad Maderera Garcias Ltda. de acuerdo a lo establecido en el art&#237;culo 156 inciso 2 del C&#243;digo del Trabajo , art&#237;culo 14 del Decreto Supremo N&#186; 40 de 1969 del Ministerio del Trabajo y Previsi&#243;n Social, publicado en el Diario Oficial el 07 de Marzo de 1969 como Reglamento de la Ley 16.744 de 1968.
    </p>
    <p>Asumo mi responsabilidad de dar lectura a su contenido y dar cumplimiento a las obligaciones, prohibiciones, normal de Orden, Higiene y Seguridd que en el est&#225;n escritas, como as&#237; tambi&#233;n a las disposiciones y procedimientos que en forma posterior se emitan y/o se modifiquen y que formen parte integral de este o que expresamente lo indique.</p>
    <div class="bloque" style="text-align: center;margin-top: 200px">
      <div class="A">
        ---------------------------------------------------------------<br>
        <b> NOMBRE TRABAJADOR</b>
      </div>
        <div class="B">
          ------------------------------------------------<br>
          FIRMA TRABAJADOR  <br><br><br><br>
          <div class="cuadrado-2">Huella <br>dactilar</div>
        </div>

      </div>
      <p style="text-align: center">(el trabajador debe escribir de su pu&#241;o y letra)<br></p>
         <p style="text-align: center">Este comprobante se archivara en la Carpeta personal de trabajador</p>
    </body>
  </html>