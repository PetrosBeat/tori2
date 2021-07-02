<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?= $titulo ?> </title>

    <style type="text/css">
/* Layout de Objetos Globales */
html{
font-family: 'Helvetica';
  margin-top: auto;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: auto;
    text-transform: uppercase;
    font:12px;
}

body{


/*background-color:#BECEDC;
color:#000;
*/
}


#logo{
  margin-top: 5px;
  width: 10%;
  height:  0px;
margin-right: auto;
margin-left: 10px;
 position: relative;
}
#datos_empresa{
margin-right: 0px;
margin-left: 120px;
margin-top: 10px;
position: fixed;

}
#datos_empresa p {
  margin-top: 40px;
  margin: 0px;
  padding: 0px;
  margin-left: 20px;

}
.direccion{
  width: 39%;
}
.giro{
  width: 50%;
}
#tabla_comprobante{
  margin-top: 10px;
margin-right: 30px;
margin-left: 450px;
 border: 3px solid red;
text-align: center;
}
.fecha{
margin-right: 0px;
margin-left: 450px;
margin-top: 20px;
text-align: center;
}
.contenedor2{
width: 420px;
margin-top: 10px;
margin-left: 10px;
border: 3px solid black;
}
.contenedor2 p{
  margin:0;
  padding:0;
}
.detalles{
    border: 3px solid black;
        margin-top: 5px;
    margin-right: 5px;
    margin-left: 10px;
  margin-bottom: auto;
}
.detalleiva{
margin-top: 10px;
margin-left: 500px;
margin-right: 5px;
text-align: center;
border: 3px solid black;

}
.detalleiva p{
margin:10;
padding:0;
}
#textderecha{

  text-align: right;
  float: left;
  margin-left: 70px;
}
#textizquerda{

  text-align: right;
  float: left;
 margin-left: 10px;
}
.detallefirma{
border: 3px solid black;
margin-top: 10px;
margin-right: 5px;
margin-left: 10px;
}
.detallefirma p{
  margin-left: 10px;
}
.footer {
    position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  text-align: center;
}
 #inferior{

position:absolute; /*El div será ubicado con relación a la pantalla*/
left:0px; /*A la derecha deje un espacio de 0px*/
right:0px; /*A la izquierda deje un espacio de 0px*/
bottom:0px; /*Abajo deje un espacio de 0px*/
height:300px; /*alto del div*/
z-index:0;
 }
table tr td{

    page-break-inside: avoid !important;
}

    </style>
</head>
<body >
       <div class="contenedor" style=" text-align: left">
     <img src="logo_empresa.jpg" alt="Logo de Empresa" id="logo" name="logo" style="display: none" >
                            <div id="datos_empresa" style="">



                                   <p  > <h1 style='margin-left: 20px'><?=$Empresa['nombre_empresa'] ?></h1></p>
                                    <p  class="giro"><b></b> <?=$Empresa['giro'] ?></p>

                                     <p  class="direccion"><b></b> <?=$Empresa['direccion'] ?></p>
                               <p> <b>  </b><?=$Empresa['ciudad'] ?></p>
                                   <p><b> </b> <?=$Empresa['correo'] ?></p>
                            </div>
                               <div id="tabla_comprobante" style="">
                                 <h2>    <strong>   <?=$rut_empresa ?></strong><br>
                                 <strong>COTIZACION</strong><br>
                                  <strong>N&deg; <?= $NumeroComprobante ?></strong><br></h2>
                            </div>

                     <div class="fecha" style="">
             <p  ><h3>FECHA DE EMISION  <?php $date = date_crear($Datos_Cotizacion['fecha_emision']); echo date_format($date, 'd-m-Y');?></h3></p>
        </div>
       </div>

       <div class="contenedor2" style="">

                  <?php if($Datos_Cotizador != NULL)
                            {
                                if($Datos_Cotizador['es_empresa'] == 1)
                                {
                                    $cliente = $Datos_Cotizador['razonSocial'];
                                }
                                else
                                {
                                    $cliente = $Datos_Cotizador['razonSocial']." ".$Datos_Cotizador['apellidos'];
                                }
                  ?>


                   <b>  <p  >SEÑORES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$cliente?></p>
                    <p  >RUT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$rut_cliente ?></p>
                    <p  >GIRO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Datos_Cotizador['giro'] ?></p>

                    <p  >TELÉFONO&nbsp;&nbsp;&nbsp;&nbsp;<?=$Datos_Cotizador['telefono']?></p>
                    <p  >CORREO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Datos_Cotizador['correo']?></p></b>
                          <?php
                            }
                            else
                            {
                          ?>
                           <b>  <p  >SEÑORES: &nbsp;&nbsp;&nbsp; <?=$Datos_Cotizacion['razonSocial']?></p>
                              <p  >RUT:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$Datos_Cotizacion['rut'] ?></p></b>
                          <?php
                            }
                          ?>
       </div>

       <div class="detalles" style="">
            <table style="width: 100%" >
        <thead >
            <tr >
                <th style ="text-align: right;">CÓDIGO</th>
                <th style ="text-align: right;">CANTIDAD</th>
                <th style ="text-align: right">NOMBRE PRODUCTO</th>
                <th style ="text-align: right;">PRECIO UNITARIO</th>
                <th style ="text-align: right;">SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
      <?php $total = 0 ; $i = 1; foreach($Datos_Detalle_Cotizacion as $DatosDetalleCotizacion) {  $subtotal = $DatosDetalleCotizacion['precio'] * $DatosDetalleCotizacion['cantidad'];




       ?>


                <tr style='page-break-before:always;'>
                     <td style ="text-align: right"><?= $DatosDetalleCotizacion['codigo_productoo'];   ?></td>
                     <td style ="text-align: right"><?= number_format( $DatosDetalleCotizacion['cantidad'] , 0, ',', '.');   ?></td>
                     <td style ="text-align: right"><?= $DatosDetalleCotizacion['nombre_productoo'];   ?></td>
                     <td style ="text-align: right;">$<?= number_format( $DatosDetalleCotizacion['precio'] , 0, ',', '.');   ?></td>
                     <td style ="text-align: right;">$<?= number_format($subtotal , 0, ',', '.');   ?></td>
                   </tr>


            <?php $total = $total + ($subtotal); }   ?>

        </tbody>
    </table>

       </div>



<div id="inferior" style="">
  <div class="detalleiva" style="text-align: center;">
            <br><br>
                       <b>
                        <table>
                          <thead>

                          </thead>
                          <tbody style="font-size: 14px">


                           <?php  if($Datos_Cotizacion['tipo_documento'] == "FACTURA" AND $Empresa['tipo_precio'] == '1'){
                                     $neto        =  intval($total) - (($Empresa['iva']/100) *  intval($total));
                                     $iva         =  intval($total) * ($Empresa['iva']/100);
                                     $total_final = $neto + $iva; ?>
                                       <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NETO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td align="right"><?=number_format( $neto, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IVA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td align="right"><?=number_format( $iva, 0, ',', '.'); ?></td>
                            </tr>

                            <?php }elseif(($Datos_Cotizacion['tipo_documento'] == "FACTURA") AND ($Empresa['tipo_precio'] == '0')){
                                     $neto        =  intval($total);
                                     $iva         =  ($Empresa['iva']/100) *   intval($total);
                                     $total_final = $neto + $iva;

                             ?>
                              <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NETO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td align="right"><?=number_format( $neto, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IVA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td align="right"><?=number_format( $iva, 0, ',', '.'); ?></td>
                            </tr>

                            <?php

                               } ?>
                            <tr>
                              <td>&nbsp;&nbsp;&nbsp;TOTAL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td align="right"><?=number_format($total_final, 0, ',', '.'); ?></td>
                            </tr>
                          </tbody>
                        </table>


                       </b></span><br>
                       <br><br>
                     </b>

       </div>
    <br><br>
            <table style="width: 100%;" >
        <thead>

        </thead>
        <tbody>
              <tr style="text-align: center">
                                      <td >
                                              <div style="border: 4px solid red;">
                                                    <p>VALIDEZ COTIZACION</p>
                                                    <p style="font-size: 16px"><?php $date = date_crear($Datos_Cotizacion['fecha_expiracion']); echo date_format($date, 'd-m-Y');?>  O HASTA AGOTAR STOCK</p>
                                              </div>
                                        </td>


                                        <td >
                                            <div style="border: 4px solid red;">
                                                    <p>FORMA DE PAGO</p>
                                                    <p style="font-size: 16px"><?=$Datos_Cotizacion['forma_pago'] ?></p>
                                              </div>
                                        </td>
                                    <td >
                                              <div style="border: 4px solid red;">
                                                    <p>TIPO DE DOCUMENTO</p>
                                                    <p style="font-size: 16px"><?=$Datos_Cotizacion['tipo_documento'] ?></p>
                                              </div>
                                        </td>


                                    </tr>
          </tbody>
        </table>
       </div>


<br>

                    </body>
</html>