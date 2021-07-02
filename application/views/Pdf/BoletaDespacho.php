<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Comprobante Despacho N <?=$NumeroComprobante ?> </title>
            <style>
html{

  margin-top: 10px;
  margin-left: 10px;
  margin-right: 10px;
  margin-bottom: 10px;
 position: absolute;
}

body{

font:12px Arial;
 margin-right: 0;
  margin-top: 0;
/*background-color:#BECEDC;
color:#000;
*/
}
.logo{

 position: absolute;
}
.datos_empresa{
height:  80px;
margin-right: 0px;
margin-left: 95px;
max-width: 230px;
margin-bottom: 10px;
}

            </style>
  </head>
<body>
      <div >


  <div  class="logo" style="font-family: 'Helvetica';">
                          <img src="assets/imagenes/logo_empresa.jpg" alt="Logo de Empresa" align="left" width="12%">
                    </div>

                    <div class="datos_empresa" style="font-family: 'Helvetica';">
                            <p  style="margin:0;padding:0;font-family: 'Helvetica'; "><?=$Empresa['nombre_empresa'] ?></p>
                             <p  style="margin:0;padding:0;font-family: 'Helvetica'; width: 70%"><?=$Empresa['direccion'] ?></p>
                             <p  style="margin:0;padding:0;font-family: 'Helvetica';"><?=$Empresa['ciudad'] ?></p>
                             <p  style="margin:0;padding:0;font-family: 'Helvetica';"><?=$Empresa['rut'] ?></p>
                               <p  style="margin:0;padding:0;font-family: 'Helvetica';">FONO: <?=$Empresa['telefono'] ?></p>
                                 <p  style="margin:0;padding:0;font-family: 'Helvetica';"><?=$Empresa['correo'] ?></p>
                                 <p  style="margin:0;padding:0;font-family: 'Helvetica';"><?php $date = date_crear($Datos_Ventas['fecha']); echo date_format($date, 'd-m-Y H:i');?></p>
                    </div>



<div style="text-align: left;font-size: 16px;font-family: 'Helvetica';" >----------------------------------------------------</div>
<b style="text-align: center;font-size: 16px;margin-left: 70px;font-family: 'Helvetica';"> DESPACHO NRO  <?=$NumeroComprobante ?></b><br>
   <b style="text-align: center;font-size: 16px;margin-left: 70px;font-family: 'Helvetica';">  VENTA NRO <?=$Datos_Venta['numero_venta'] ?></b>
<div style="text-align: left;font-size: 16px;font-family: 'Helvetica';">----------------------------------------------------</div>
<div class="tabladetalles" style="font-size: 12px;font-family: 'Helvetica'; ">
              <table style="width: 38%;font-family: 'Helvetica';"  >
        <thead>
            <tr >
                  <th style="width: 1%;">CANT</th>
                   <th  style="width: 20%">PRODUCTO</th>
                <th style="width: 20%">PEND</th>

            </tr>
        </thead>
        <tbody>

      <?php foreach($Datos_Detalle_Venta as $DatosDetalleVenta) { ?>

                                    <tr >
                                          <?php if( $DatosDetalleVenta->cantidad_retiro < 0){ ?>
                                        <td valign="top" style="width: 1%;text-align: left"><?= number_format( $DatosDetalleVenta->cantidad_retiro, 0, ',', '.');   ?></td>
                                        <?php }else{ ?>
                                          <td valign="top"  style="width: 1%;text-align: left"><?=  $DatosDetalleVenta->cantidad_retiro;   ?></td>
                                          <?php } ?>
                                       <td style="width: 20%;text-align: left"><?=$DatosDetalleVenta->nombre_productoo;   ?></td>
                                      <td valign="top" style="width: 20%;text-align: right; padding-right: 50px"><?= number_format( $DatosDetalleVenta->cantidad_por_retirar, 0, ',', '.');   ?></td>
                                    </tr>
            <?php } ?>

        </tbody>
    </table>
  </div>
    <div style="text-align: left;font-size: 14px;font-family: 'Helvetica';">-----------------------------------------------------------</div>
    <div  style="text-align: right;font-family: 'Helvetica';">
                       </div>

<div style="margin-left: 60px;font-family: 'Helvetica';" ><b>DETALLE DESPACHO</b> </div>
<div style="text-align: left;font-size: 14px;font-family: 'Helvetica';">-----------------------------------------------------------</div>
<div style="text-align: left;font-size: 12px;margin-left: 0px;font-family: 'Helvetica';">
           <b><span style="text-align: left;font-family: 'Helvetica';">TIPO RETIRO :</span></b>
           <span style="text-align: right;font-family: 'Helvetica';"><?php
                                        if($Datos_Venta['tipo_despacho']  == 0)
                                        {
                                          echo "PARCIAL";
                                        }
                                        elseif($Datos_Venta['tipo_despacho']  == 1)
                                        {
                                          echo "PROGRAMADO";
                                        }
                                        elseif($Datos_Venta['tipo_despacho']  == 2)
                                        {
                                          echo "TOTAL";
                                        }
                                         elseif($Datos_Venta['tipo_despacho']  == 4)
                                        {
                                          echo "DESPACHO DOMICILIO";
                                        }
                                          elseif($Datos_Venta['tipo_despacho']  == 5)
                                        {
                                          echo "RETIRO EN TIENDA";
                                        }
           ?>
                                   </span>
                                   <br>

                                  <b> <span>DIRECCION DESPACHO:</span></b>
                                   <br>
                                   <span style="margin-right: 550px"><?php
                                      $direccionprint = $Datos_Venta['direccion'];
                                      echo strtoupper($direccionprint);

                                     ?></span><br>

                                  <b>   <span>NOMBRE CLIENTE : </span></b><br>
                                     <span><?=$Datos_Cliente['nombres']." ".$Datos_Cliente['apellidos']  ?></span><br>
                                    <b>  <span>TELEFONO CLIENTE : </span></b>
                                     <span><?=$Datos_Cliente['telefono'] ?></span>



</div>

<div style="text-align: left;font-size: 14px;font-family: 'Helvetica';">-----------------------------------------------------------</div>

<div >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRACIAS POR SU COMPRA</div>
<div >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMPROBANTE NO VALIDO</div>
<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COMO BOLETA</div>
<div style="text-align: left;font-size: 14px;font-family: 'Helvetica';">-----------------------------------------------------------</div>

</div>
</body>
</html>